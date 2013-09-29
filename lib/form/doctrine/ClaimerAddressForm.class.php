<?php

/**
 * ClaimerAddress form.
 *
 * @package    claimer
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ClaimerAddressForm extends BaseClaimerAddressForm
{
  public function configure()
  { 
    $this->widgetSchema['state'] = new sfWidgetFormI18nChoiceCountry(array('add_empty' => true));

    $this->widgetSchema->setLabels(array(
        'state'    => 'Country / State'));
    
    $this->validatorSchema['state'] = new sfValidatorI18nChoiceCountry(array('required' => false));
    
    if ($this->getOption('state_only', false))
    {
      $this->useFields(array('state'));
    }
    
    unset($this['id'],
          $this['created_at'],
          $this['updated_at']);
  }
}
