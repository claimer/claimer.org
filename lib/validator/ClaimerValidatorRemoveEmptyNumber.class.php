<?php

class ClaimerValidatorRemoveEmptyNumber extends sfValidatorBase
{
  public function configure($options = array(), $messages = array())
  {
    $this->addOption('fields', array());
  }
  
  protected function doClean($values)
  {
    foreach($this->getOption('fields') as $fieldName)
    {
      if (isset($values[$fieldName]) &&
          ! is_numeric($values[$fieldName]))
      {
        unset($values[$fieldName]);
      }
    }
    
    return $values;
  }
}
