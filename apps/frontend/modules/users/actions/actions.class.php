<?php

class usersActions extends filterAndSortActions
{
  public function executeList(sfWebRequest $request)
  {
    $this->pager = new ClaimerUserPager('sfGuardUser', sfConfig::get('app_claimer_pager_items', 100));
    
    $q = $this->getUsersQuery();
    
    $this->pager->setQuery($q);
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
    
    $this->applySort('users_sort', $request);
    
    $this->getUser()->setRedirectTo('@users');
  }

  public function executeNew(sfWebRequest $request)
  {
    $user = new sfGuardUser();
    
    $this->form = new sfGuardUserForm($user, array('user' => $this->getUser()));
    
    if (($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT)) &&
        $this->form->bindAndSave($request->getParameter($this->form->getName())))
    {
      $this->getUser()->setFlash('notice',
        $this->getContext()->getI18N()->__('%user is created.',
        array('%user' => $this->form->getObject()->getUsername())));
      
      $this->redirect('@users');
    }
    
    $this->setTemplate('new');
  }
  
  public function executeView(sfWebRequest $request)
  {
    $this->forward404Unless($user = $this->getRoute()->getObject());
    $this->forward404Unless($this->getUser()->hasCredentialOnUser($user));
    
    $this->user = $user;
    
    $this->setTemplate('view');
  }
  
  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($user = $this->getRoute()->getObject());
    $this->forward404Unless($this->getUser()->hasCredentialOnUser($user));
    
    $this->form = new sfGuardUserForm($user, array('user' => $this->getUser()));
    
    if (($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT)) &&
        $this->form->bindAndSave($request->getParameter($this->form->getName())))
    {
      $this->getUser()->setFlash('notice',
        $this->getContext()->getI18N()->__('%user is edited.',
        array('%user' => $this->form->getObject()->getUsername())));
      
      $this->redirect($this->getUser()->getRedirectTo('@users'));
    }
    
    $this->setTemplate('edit');
  }
  
  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();
    $this->forward404Unless($user = $this->getRoute()->getObject());
    $this->forward404Unless($this->getUser()->hasCredentialOnUser($user));
    
    $user->delete();
    
    if ($this->getUser()->getGuardUser()->getId() == $user->getId())
    {
      $this->getUser()->signOut();
      $this->getUser()->setFlash('notice',
        $this->getContext()->getI18N()->__('Your account is deleted.'));
      
      $this->redirect('@homepage');
    }
    else
    {
      $this->getUser()->setFlash('notice',
        $this->getContext()->getI18N()->__('%user is deleted.',
        array('%user' => $user->getUsername())));
      
      $this->redirect($this->getUser()->getRedirectTo('@users'));
    }
  }
  
  public function executeNewDamage(sfWebRequest $request)
  {
    $this->forward404Unless($user = $this->getRoute()->getObject());
    $this->forward404Unless($this->getUser()->hasCredentialOnUser($user));
    $this->forward404Unless($user->hasPermission('create_damage'));
    
    $damage = new ClaimerDamage();
    $damage->init($user, $this->getUser()->getGuardUser());
    
    $this->form = new ClaimerDamageForm($damage, array('user' => $this->getUser()));
    
    if (($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT)) &&
        $this->form->bindAndSave($request->getParameter($this->form->getName())))
    {
      $this->form->nextStep();
      $this->redirect($this->generateUrl('damage_edit', $this->form->getObject()));
    }
    
    $this->step = $this->form->getCurrentStep();
    $this->setTemplate("damage_new");
  }
  
  protected function getUsersQuery()
  {
    if ($this->getUser()->hasCredential('administer_any_user'))
    {
      return Doctrine_Core::getTable('sfGuardUser')->getUsersQuery();
    }
    elseif ($this->getUser()->hasCredential('administer_granted_user'))
    {
      return Doctrine_Core::getTable('sfGuardUser')->getUsersInGrantedGroupsQuery($this->getUser()->getGrantedGroups());
    }
    
    throw new sfSecurityException("Unsufficient credentials");
  }
}
