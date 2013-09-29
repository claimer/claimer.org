<?php

/**
 * ClaimerBusiness form.
 *
 * @package    claimer
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ClaimerBusinessForm extends BaseClaimerBusinessForm
{
  public function configure()
  {
    $this->embedForm('address', new ClaimerAddressForm($this->getObject()->getDamage()->getWhere()));
    $this->embedForm('address_now', new ClaimerAddressForm($this->getObject()->getAddressNow()));
    
    $this->widgetSchema['description'] = new sfWidgetFormTextarea();
    $this->setDefault('description', $this->getObject()->getDamage()->getDescription());
    $this->validatorSchema['description'] = new sfValidatorString(array('max_length' => 255, 'required' => false));
    
    $this->embedRelation('ValueBT');
    $this->embedRelation('ValueBP');
    $this->embedRelation('ValueTT');
    $this->embedRelation('ValueTP');
    $this->embedRelation('ValueBefore');
    $this->embedRelation('ValueAfter');
    $this->embedRelation('ValueTotal');
    
    // coowners
    $hasCoowners = $this->getObject()->getDamage()->hasCoowners();
    $this->widgetSchema['coowners'] = new sfWidgetFormChoiceCoowners(array(
      'has_coowners' => $hasCoowners));
    $this->validatorSchema['coowners'] = new sfValidatorChoice(array(
      'required'=> ! $hasCoowners,
      'choices' => array_keys($this->widgetSchema['coowners']->getOption('choices'))));
    $this->setDefault('coowners', $this->widgetSchema['coowners']->getDefaultValue($hasCoowners));
    
    $this->widgetSchema->setLabels(array(
      'business_kind'           => 'What kind of business has been damaged?',
      'business_name'           => 'What is/was the name of the business?',
      'address'                 => 'Where was the business located?',
      'address_now'             => 'Where is the business located today?',
      'description'             => 'Please describe the damage',
      'ValueBT'                 => 'What was the annual business turn-over prior to the damage?',
      'ValueBP'                 => 'What was the annual profit prior to the damage?',
      'ValueTT'                 => 'What is the annual turn-over today?',
      'ValueTP'                 => 'What is the annual profit today?',
      'ValueBefore'             => 'Estimated purchase value of your business before being damaged?',
      'ValueAfter'              => 'Estimated value of your business after being damaged?',
      'ValueTotal'              => 'Total amount of the damage',
      'coowners'                => 'Is the business coowned by somebody else?'));
      
    unset($this['id'],
          $this['damage_id'],
          $this['business_value_before_turnover_id'],
          $this['business_value_before_profit_id'],
          $this['business_value_today_turnover_id'],
          $this['business_value_today_profit_id'],
          $this['business_value_before_id'],
          $this['business_value_after_id'],
          $this['business_value_total_id'],
          $this['business_address_now_id']);
  }
}
