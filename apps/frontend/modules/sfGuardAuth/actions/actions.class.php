<?php
 
require_once(sfConfig::get('sf_plugins_dir').'/sfDoctrineGuardPlugin/modules/sfGuardAuth/lib/BasesfGuardAuthActions.class.php');
 
class sfGuardAuthActions extends BasesfGuardAuthActions
{
  public function executeValidationCodeAuth(sfWebRequest $request)
  {
    $this->form = new ClaimerValidationCodeAuthForm();
    
    if ($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT))
    {
      $this->form->bind($request->getParameter($this->form->getName()));
      
      if ($this->form->isValid())
      {
        $this->getUser()->signin($this->form->getObject()->getClaimant(), false);
        
        $this->redirect($this->generateUrl('damage_edit', $this->form->getObject()));
      }
    }
  }
}
