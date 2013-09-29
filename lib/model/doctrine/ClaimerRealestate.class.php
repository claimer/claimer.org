<?php

/**
 * ClaimerRealestate
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    claimer
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class ClaimerRealestate extends BaseClaimerRealestate
{
  public function preSave($event)
  {
    if ($this->getRealestateType()->getType() != "other")
    {
      $this->setRealestateTypeOther(null);
    }
  }
  
  public function postSave($event)
  {
    $damageValue = $this->calculateValue($this->getDamage()->getValue()->getCurrency()->getCode());
    
    $this->getDamage()->getValue()->setValue($damageValue);
    $this->getDamage()->getValue()->save();
  }
  
  protected function calculateValue($currency)
  {
    if (! is_numeric($this->getValueBefore()->getValue()) ||
        ! is_numeric($this->getValueAfter()->getValue()))
    {
      return 0;
    }
    
    return $this->getValueBefore()->getCurrencyValue($currency)->getValue() - $this->getValueAfter()->getCurrencyValue($currency)->getValue();
  }
}
