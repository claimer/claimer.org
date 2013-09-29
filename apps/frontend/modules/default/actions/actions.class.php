<?php

class defaultActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
  }
  
  public function executeError404(sfWebRequest $request)
  {
  }
  
  public function executeWhyregister(sfWebRequest $request)
  {
  }
  
  public function executeHowwill(sfWebRequest $request)
  {
  }
  
  public function executeSetupa(sfWebRequest $request)
  {
  }
  
  public function executeTakeitover(sfWebRequest $request)
  {
  }
  
  public function executeBusiness(sfWebRequest $request)
  {
  }
  
  public function executeLegalconditions(sfWebRequest $request)
  {
  }
  
  public function executeContact(sfWebRequest $request)
  {
    $this->form = new ContactForm();
    
    if (($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT)))
    {
      $captcha = array(
        'recaptcha_challenge_field' => $request->getParameter('recaptcha_challenge_field'),
        'recaptcha_response_field'  => $request->getParameter('recaptcha_response_field'));
      
      $this->form->bind(array_merge($request->getParameter($this->form->getName()), array('captcha' => $captcha)));
      
      if ($this->form->isValid())
      {
        $values = $this->form->getValues();
        
        $this->getUser()->setFlash('notice',
          $this->getContext()->getI18N()->__('Thank you for your message.'));
        
        $message = $this->getMailer()->compose(
          array($values['email'] => $values['gender'].' '.$values['name']),
          sfConfig::get('app_claimer_contact_recipients'),
          $values['subject'],
          $values['message']);
        
        $this->getMailer()->send($message);
      }
    }
  }
}
