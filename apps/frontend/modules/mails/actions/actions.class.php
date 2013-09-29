<?php

class mailsActions extends filterAndSortActions
{
  public function executeList(sfWebRequest $request)
  {
    $this->pager = new ClaimerMailPager('ClaimerMail', sfConfig::get('app_claimer_pager_items', 100));
    
    $this->pager->setQuery($this->getMailsQuery());
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();

    $this->applySort('mails_sort', $request);
 
    $this->setTemplate("list");
  }
  
  public function executeMailUsers(sfWebRequest $request)
  {
    $mail = new ClaimerMail();
    
    $this->form = new ClaimerMailUsersForm($mail, array('user' => $this->getUser()));
    
    $this->processForm($request);
    
    $this->setTemplate("mailUsers");
  }
  
  public function executeMailManaged(sfWebRequest $request)
  {
    if (! $this->getUser()->getGuardUser()->hasManagedUsers())
    {
      $this->getUser()->setFlash('notice',
        $this->getContext()->getI18N()->__('No recipient'));
      
      $this->redirect($this->generateUrl('mails'));
    }
    else
    {
      $mail = new ClaimerMail();
      
      $this->form = new ClaimerMailManagedUsersForm($mail, array('user' => $this->getUser()));
      
      $this->processForm($request);
      
      $this->setTemplate("mailManagedUsers");
    }
  }
  
  protected function processForm(sfWebRequest $request)
  {
    if (($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT)) &&
        $this->form->bindAndSave($request->getParameter($this->form->getName())))
    {
      if (! $this->form->getObject()->hasRecipients())
      {
        $this->getUser()->setFlash('notice',
          $this->getContext()->getI18N()->__('No recipient'));
      }
      else
      {
        // send mails
        $this->sendMails($this->form->getObject());
        
        $this->getUser()->setFlash('notice',
          $this->getContext()->getI18N()->__('Email is being sent.'));
      }
      
      $this->redirect($this->generateUrl('mails'));
    }
  }
  
  public function executeView(sfWebRequest $request)
  {
    $this->forward404Unless($mail = $this->getRoute()->getObject());
    $this->forward404Unless($this->getUser()->hasCredentialOnMail($mail));
    
    $this->mail = $mail;
    
    $this->setTemplate("view");
  }
  
  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();
    $this->forward404Unless($mail = $this->getRoute()->getObject());
    $this->forward404Unless($this->getUser()->hasCredentialOnMail($mail));
    
    $mail->delete();
    
    $this->getUser()->setFlash('notice',
      $this->getContext()->getI18N()->__('Email %subject has been deleted.',
      array('%subject' => $mail->getSubject())));
    
    $this->redirect('@mails');
  }
  
  protected function sendMails($mail)
  {
    foreach ($mail->getRecipients() as $recipient)
    {
      $this->getMailer()->composeAndSend(
        $mail->getSender()->getEmailAddress(),
        $recipient,
        $mail->getSubject(),
        $mail->getMessage()
      );
    }
  }
  
  protected function getMailsQuery()
  {
    return $this->getUser()->getGuardUser()->getMailsQuery();
  }
}
