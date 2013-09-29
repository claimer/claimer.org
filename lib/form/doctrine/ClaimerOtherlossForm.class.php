<?php

/**
 * ClaimerOtherloss form.
 *
 * @package    claimer
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ClaimerOtherlossForm extends BaseClaimerOtherlossForm
{
  public function configure()
  {
    $this->widgetSchema['description'] = new sfWidgetFormTextarea();
    $this->setDefault('description', $this->getObject()->getDamage()->getDescription());
    $this->validatorSchema['description'] = new sfValidatorString(array(
      'max_length' => 255,
      'required' => false));
    
    $this->embedRelation('ValueBetween');
    $this->embedRelation('ValuePerYear');
    
    $this->widgetSchema->setLabels(array(
      'description'           => 'Please describe your loss',
      'ValueBetween'          => 'How much money did you lose between the damaging event and today?',
      'ValuePerYear'          => 'How much money will you lose for the same reason per year in the future?',
      'otherloss_years_until' => 'For how many years do you think you will continue to lose the same amount?'));
    
    unset($this['id'],
          $this['damage_id'],
          $this['otherloss_value_between_id'],
          $this['otherloss_value_peryear_id']);
  }
}
