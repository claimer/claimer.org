<?php

/**
 * ClaimerCurrency
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    claimer
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class ClaimerCurrency extends BaseClaimerCurrency
{
  public function getRate($code = null)
  {
    if (! $to = Doctrine_Core::getTable('ClaimerCurrency')->getByCode($code))
    {
      throw new sfException(sprintf("The currency code %s does not exist.", $code));
    }
    
    if ($this->getCode() == $to->getCode())
    {
      $claimerRate = new ClaimerRate();
      $claimerRate->setCurrencyFromId($this->getId());
      $claimerRate->setCurrencyToId($to->getId());
      $claimerRate->setRate(1);
      
      return $claimerRate;
    }
    
    if (! $claimerRate = Doctrine_Core::getTable('ClaimerRate')->findRate($this->getCode(), $to->getCode()))
    {
      $claimerRate = new ClaimerRate();
      $claimerRate->setCurrencyFromId($this->getId());
      $claimerRate->setCurrencyToId($to->getId());
      $claimerRate->save();
    }
    
    return $claimerRate;
  }
}