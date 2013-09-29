<?php

/**
 * ClaimerRealestate form.
 *
 * @package    claimer
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ClaimerRealestateForm extends BaseClaimerRealestateForm
{
  public function configure()
  {
    $this->embedForm('address', new ClaimerAddressForm($this->getObject()->getDamage()->getWhere()));
    
    $this->widgetSchema['description'] = new sfWidgetFormTextarea();
    $this->setDefault('description', $this->getObject()->getDamage()->getDescription());
    $this->validatorSchema['description'] = new sfValidatorString(array('max_length' => 255, 'required' => false));
    
    $this->embedRelation('ValueBefore');
    $this->embedRelation('ValueAfter');
    
    // coowners
    $hasCoowners = $this->getObject()->getDamage()->hasCoowners();
    $this->widgetSchema['coowners'] = new sfWidgetFormChoiceCoowners(array(
      'has_coowners' => $hasCoowners));
    $this->validatorSchema['coowners'] = new sfValidatorChoice(array(
      'required'=> ! $hasCoowners,
      'choices' => array_keys($this->widgetSchema['coowners']->getOption('choices'))));
    $this->setDefault('coowners', $this->widgetSchema['coowners']->getDefaultValue($hasCoowners));
    
    $this->widgetSchema->setLabels(array(
      'address'                 => 'Where was the real estate property?',
      'description'             => 'Please describe the damage',
      'realestate_type_id'      => 'Type of real estate',
      'realestate_type_other'   => 'If other, please specify',
      'ValueBefore'             => 'Estimated value of your real estate property before the damage',
      'ValueAfter'              => 'Estimated value of your real estate property after the damage',
      'coowners'                => 'Is the property coowned by somebody else?'));
    
    unset($this['id'],
          $this['damage_id'],
          $this['realestate_value_before_id'],
          $this['realestate_value_after_id']);
  }
}
