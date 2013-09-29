<?php

/**
  * Damage registration form is composed of following steps
  * step 0 : register form
  * step 1 : define damage type
  * step 2 : define damage details
  * step 2 (optional) : define co-owners
  * step 2 (optional) : upload damage documents
  * step 3 : confirmation page
  *
  * @param $request A request object
  */
class damagesActions extends filterAndSortActions
{
  /**
   * List damages
   *
   * @param $request A request object
   */
  public function executeList(sfWebRequest $request)
  {
    if ($this->getUser()->hasCredential('filter_damages'))
    {
      $this->forward('damages', 'filter');
    }
    
    $damagesQuery = $this->getDamagesQuery();
    
    $this->pager = new ClaimerDamagePager('ClaimerDamage', sfConfig::get('app_claimer_pager_items', 100));
    $this->pager->setQuery($damagesQuery);
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
    
    $this->totalValue = Doctrine_Core::getTable('ClaimerDamage')->getDamagesTotalForQuery($damagesQuery);
    
    $this->applySort('damages_filter', $request);
    
    $this->setTemplate("list");
  }
  
  /**
   * List damages with filters
   *
   * @param $request A request object
   */
  public function executeFilter(sfWebRequest $request)
  {
    $this->form = new ClaimerDamageFormFilter(array(), array('user' => $this->getUser()));
    $this->form->setQuery($q = $this->getDamagesQuery());
    
    $this->applyFilters('damages_filter', $request);
    
    $this->pager = new ClaimerDamagePager('ClaimerDamage', sfConfig::get('app_claimer_pager_items', 100));
    $this->pager->setQuery(clone ($this->form->isValid() ? $this->form->getQuery() : $q));
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->setSortOptions(array('manager' => isset($this->form['manager']),
                                       'claimant' => isset($this->form['claimant'])));
    $this->pager->init();
    
    $this->applySort('damages_sort', $request);
    
    $damagesQuery = $this->form->isValid() ? $this->form->getQuery() : $q;
    
    $chartByType = Doctrine_Core::getTable('ClaimerDamage')->getDamagesByTypeForQuery($damagesQuery);
    
    $this->chartByType = array('ticks' => array_keys($chartByType),
                               'data'  => array_values($chartByType));
    
    $this->totalValue = Doctrine_Core::getTable('ClaimerDamage')->getDamagesTotalForQuery($damagesQuery);
    
    $this->setTemplate("filter");
  }
  
  public function executeRegisterOrNew(sfWebRequest $request)
  {
    if (! $this->getUser()->isAuthenticated())
    {
      $this->forward('damages', 'register');
    }
    else
    {
      $this->forward('damages', 'new');
    }
  }
 
  /**
   * Step 0 : register form
   *
   * @param $request A request object
   */
  public function executeRegister(sfWebRequest $request)
  {
    $user = new sfGuardUser();
    
    $this->form = new sfGuardUserForm($user);
    
    if (($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT)) &&
        $this->form->bindAndSave($request->getParameter($this->form->getName())))
    {
      $user->addGroupByName("claimants");
      $user->save();
      
      $user->refresh(true);
      $this->getUser()->signIn($this->form->getObject());
      
      $this->redirect('@damage_new');
    }
    
    $this->step = 0;
    $this->setTemplate("step0_register");
  }
     
  /**
   * New damage
   *
   * @param $request A request object
   */
  public function executeNew(sfWebRequest $request)
  {
    $damage = new ClaimerDamage();
    $damage->init($this->getUser()->getGuardUser());
    
    $this->form = new ClaimerDamageForm($damage, array('user' => $this->getUser()));
    
    if (($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT)) &&
        $this->form->bindAndSave($request->getParameter($this->form->getName())))
    {
      $this->form->nextStep();
      $this->redirect($this->generateUrl('damage_edit', $this->form->getObject()));
    }
    
    $this->step = $this->form->getCurrentStep();
    $this->setTemplate($this->form->getCurrentStepName());
  }
  
  /**
   * View damage
   *
   * @param $request A request object
   */
  public function executeView(sfWebRequest $request)
  {
    $this->forward404Unless($damage = $this->getRoute()->getObject());
    $this->forward404Unless($this->getUser()->hasCredentialOnDamage($damage));
    
    $this->damage = $damage;
    
    $this->setTemplate('view');
  }
  
  /**
   * Edit damage
   *
   * @param $request A request object
   */
  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($damage = $this->getRoute()->getObject());
    $this->forward404Unless($this->getUser()->hasCredentialOnDamage($damage));
    
    $this->form = new ClaimerDamageForm($damage, array('user' => $this->getUser()));
    
    if ($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT))
    {
      if ($this->form->isMultiPart())
      {
        $this->form->bindAndSave($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));
      }
      else
      {
        $this->form->bindAndSave($request->getParameter($this->form->getName()));
      }
      
      if ($this->form->isValid())
      {
        if ($request->hasParameter('next'))
        {
          $this->form->nextStep();
        }
        elseif ($request->hasParameter('previous'))
        {
          $this->form->prevStep();
        }
        
        $this->redirect($this->generateUrl('damage_edit', $damage));
      }
    }
    
    $this->setTemplate($this->form->getCurrentStepName());
  }
  
  /**
   * Delete damage
   *
   * @param $request A request object
   */
  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();
    $this->forward404Unless($damage = $this->getRoute()->getObject());
    $this->forward404Unless($this->getUser()->hasCredentialOnDamage($damage));
    
    $damage->delete();
    
    if ($this->getUser()->getGuardUser() !== $damage->getClaimant())
    {
      $this->getUser()->setFlash('notice',
        $this->getContext()->getI18N()->__('%user\'s damage has been deleted',
        array('%user' => $damage->getClaimant()->getUsername())));
      
      $this->redirect($this->generateUrl('claimant_damages', $damage->getClaimant()));
    }
    else
    {
      $this->getUser()->setFlash('notice',
        $this->getContext()->getI18N()->__('Your damage has been deleted'));
      
      $this->redirect('@damages');
    }
  }
  
  /**
   * Download document
   *
   * @param $request A request object
   */
  public function executeDocumentView(sfWebRequest $request)
  {
    $this->forward404Unless($document = $this->getRoute()->getObject());
    $this->forward404Unless($this->getUser()->hasCredentialOnDamage($document->getDamage()));
    
    $this->forward404Unless(is_file($documentFile = sfConfig::get('app_claimer_files_damages_dir').$document->getFilename()));
    
    $this->getResponse()->clearHttpHeaders();
    $this->getResponse()->setStatusCode(200);
    $this->getResponse()->setContentType('application/octet-stream');
    $this->getResponse()->setHttpHeader('Content-Disposition', 'attachment; filename='.$document->getFilename());
    $this->getResponse()->setHttpHeader('Content-Length', filesize($documentFile));
    $this->getResponse()->sendHttpHeaders();
    $this->getResponse()->setContent(readfile($documentFile));
    
    return sfView::NONE;
  }
  
  protected function getDamagesQuery()
  {
    if ($this->getUser()->hasCredential('administer_any_user'))
    {
      return Doctrine_Core::getTable('ClaimerDamage')->getDamagesQuery();
    }
    elseif ($this->getUser()->hasCredential('administer_granted_user'))
    {
      return Doctrine_Core::getTable('ClaimerDamage')->getGrantedUsersDamagesQuery($this->getUser()->getGrantedGroups());
    }
    elseif ($this->getUser()->hasCredential('administer_managed_user'))
    {
      return $this->getUser()->getGuardUser()->getManagedDamagesQuery();
    }
    
    return $this->getUser()->getGuardUser()->getDamagesQuery();
 }
}
