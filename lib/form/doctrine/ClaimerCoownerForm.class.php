<?php

/**
 * ClaimerCoowner form.
 *
 * @package    claimer
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ClaimerCoownerForm extends BaseClaimerCoownerForm
{
  public function configure()
  {
    $addressForm = new ClaimerAddressForm($this->getObject()->getAddress());
    $this->embedForm('address', $addressForm);
    
    $this->widgetSchema->setLabels(array(
      'percentage'    => 'What is the percentage of ownership?'));
    
    unset($this['id'],
          $this['damage_id'],
          $this['address_id'],
          $this['coownercode'],
          $this['created_at'],
          $this['updated_at']);
  }
}
