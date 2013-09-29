<?php

class ClaimerValidatorValidationCodeAuth extends sfGuardValidatorUser
{
  public function configure($options = array(), $messages = array())
  {
    parent::configure($options, $messages);
    
    $this->addOption('validationcode_field', 'validationcode');
    $this->setMessage('invalid', 'The validation code and/or password is invalid.');
  }
  
  protected function doClean($values)
  {
    $validationCode = isset($values[$this->getOption('validationcode_field')]) ? $values[$this->getOption('validationcode_field')] : '';
    
    if ($validationCode &&
        $damage = Doctrine_Core::getTable('ClaimerDamage')->findOneByValidationcode($validationCode))
    {
      $values[$this->getOption('username_field')] = $damage->getClaimant()->getUsername();
      
      try
      {
        $values = parent::doClean($values);
        return array_merge($values, array('damage' => $damage));
      }
      catch(sfValidatorError $e)
      {
        throw new sfValidatorErrorSchema($this, array($this->getOption('validationcode_field') => new sfValidatorError($this, 'invalid')));
      }
    }
    
    throw new sfValidatorErrorSchema($this, array($this->getOption('validationcode_field') => new sfValidatorError($this, 'invalid')));
  }
}
