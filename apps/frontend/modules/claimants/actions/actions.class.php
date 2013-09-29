<?php

class claimantsActions extends filterAndSortActions
{
  public function executeList(sfWebRequest $request)
  {
    $this->pager = new ClaimerClaimantPager('sfGuardUser', sfConfig::get('app_claimer_pager_items', 100));
    
    $this->pager->setQuery($this->getUser()->getGuardUser()->getManagedUsersQuery());
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();

    $this->applySort('claimants_sort', $request);
    
    $this->getUser()->setRedirectTo('@claimants');
  }
  
  public function executeNew(sfWebRequest $request)
  {
    $user = new sfGuardUser();
        
    $this->form = new sfGuardUserForm($user, array('user' => $this->getUser()));
    
    if (($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT)) &&
        $this->form->bindAndSave($request->getParameter($this->form->getName())))
    {
      $user->addGroupByName('claimants');
      $this->getUser()->getGuardUser()->manageUser($user);
      $user->save();
      
      $this->getUser()->setFlash('notice',
        $this->getContext()->getI18N()->__('%user is created.',
        array('%user' => $this->form->getObject()->getUsername())));
      
      $this->redirect('claimants');
    }
  }
}
