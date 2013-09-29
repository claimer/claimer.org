<?php

class ClaimerValidatorUserGroups extends sfValidatorBase
{
  public function configure($options = array(), $messages = array())
  {
    $this->addOption('user', null);
    $this->setMessage('invalid', 'A group must be set.');
    $this->addMessage('invalid_has_managed_users', 'The user has claimants, registrants group must be set.');
    $this->addMessage('invalid_has_manager', 'The user has a registrant, claimants group must be set.');
    $this->addMessage('invalid_has_damages', 'The user has damages, registrants or claimants group must be set.');
  }
  
  protected function doClean($values)
  {
    $user = $this->getOption('user');
    
    if ($user === null  || ! $user instanceof sfGuardUser)
    {
      throw new sfException("The user must be defined.");
    }
    
    if (is_array($values) && ! empty($values))
    {
      $registrantsGroup = $this->getGroupId('registrants');
      $claimantsGroup = $this->getGroupId('claimants');
      
      if (! in_array($registrantsGroup, $values) && $user->hasManagedUsers())
      {
        throw new sfValidatorError($this, 'invalid_has_managed_users');
      }
      
      if (! in_array($claimantsGroup, $values) && $user->hasManager())
      {
        throw new sfValidatorError($this, 'invalid_has_manager');
      }
      
      if ((! in_array($registrantsGroup, $values) || ! in_array($claimantsGroup, $values)) &&
          $user->hasDamages())
      {
        throw new sfValidatorError($this, 'invalid_has_damages');
      }

      return $values;
    }
    
    throw new sfValidatorError($this, 'invalid');
  }
  
  protected function getGroupId($groupName)
  {
    if (! $group = Doctrine_Core::getTable('sfGuardGroup')->findOneByName($groupName))
    {
      throw new sfException(sprintf("The group %s does not exist.", $group));
    }
    
    return $group->getId();
  }
}
