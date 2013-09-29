<?php

class myUser extends sfGuardSecurityUser
{
  public function signIn($user, $remember = false, $con = null)
  {
    $this->getAttributeHolder()->clear();
    
    parent::signIn($user, $remember, $con);
  }
  
  public function signOut()
  {
    $this->getAttributeHolder()->clear();
    
    parent::signOut();
  }
  
  public function getRedirectTo($default = '@homepage')
  {
    if ($this->hasAttribute('redirect_to'))
    {
      return $this->getAttributeHolder()->remove('redirect_to');
    }
    
    return $default;
  }
  
  public function setRedirectTo($route)
  {
    if (! $route)
    {
      throw new sfException("The route must be defined.");
    }

    $this->setAttribute('redirect_to', $route);
  }
  
  public function getFormCurrent()
  {
    return $this->getAttribute('form_current');
  }
  
  public function getFormCurrentStep($formId)
  {
    if (! $formId)
    {
      throw new sfException("The form id must be defined.");
    }
    
    return $this->getAttribute($formId, 1);
  }
  
  public function setFormCurrentStep($formId, $value)
  {
    if (! $formId)
    {
      throw new sfException("The form id must be defined.");
    }
    
    if (! is_int($value))
    {
      throw new sfException("Invalid value.");
    }
    
    $currentForm = $this->getFormCurrent();
    
    if ($formId != $currentForm && $this->hasAttribute($currentForm))
    {
      $this->getAttributeHolder()->remove($currentForm);
    }
    
    $this->setAttribute($formId, $value);
    $this->setAttribute('form_current', $formId);
  }
  
  public function hasCredentialOnUser(sfGuardUser $user)
  {
    if (! $this->isAuthenticated())
    {
      return false;
    }
    
    if ($this->hasCredential('administer_any_user'))
    {
      return true;
    }
    
    if ($this->getGuardUser()->getId() == $user->getId())
    {
      return true;
    }
    
    if ($this->hasCredential('administer_managed_user') &&
        $this->getGuardUser()->isManagerOfUser($user))
    {
      return true;
    }
    
    if ($this->hasCredential('administer_granted_user') &&
        $this->hasGrantOnUser($user))
    {
      return true;
    }
    
    return false;
  }

  protected function hasGrantOnUser(sfGuardUser $user)
  {
    $groups = $user->getGroups()->toArray();
     
    if (empty($groups))
    {
      return false;
    }
    
    foreach ($groups as $group)
    {
      if (! $this->hasCredential('grant_'.$group['name'].'_user'))
      {
        return false;
      }
    }
    
    return true;
  }
  
  public function getGrantedGroups()
  {
    $grants = array();
    $groups = Doctrine_Core::getTable('sfGuardGroup')->getGroupsName();
    
    foreach ($groups as $group)
    {
      if ($this->hasCredential('grant_'.$group.'_user'))
      {
        $grants[] = $group;
      }
    }
    
    return $grants;  
  }
  
  public function hasCredentialOnDamage(ClaimerDamage $damage)
  {
    if (! $this->isAuthenticated())
    {
      return false;
    }
    
    return $this->hasCredentialOnUser($damage->getClaimant());
  }
  
  public function hasCredentialOnMail(ClaimerMail $mail)
  {
    if (! $this->isAuthenticated())
    {
      return false;
    }
    
    return $this->hasCredentialOnUser($mail->getSender());
  }
}
