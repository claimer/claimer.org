<?php

/**
 * ClaimerMovableobject form.
 *
 * @package    claimer
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ClaimerMovableobjectForm extends BaseClaimerMovableobjectForm
{
  /**
   * @see ClaimerDamageForm
   */
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
      'movableobject_kind'    => 'What kind of object has been damaged?',
      'address'               => 'Where was the object when it was damaged?',
      'description'           => 'Please describe the damage',
      'ValueBefore'           => 'Estimated value of your object before it was damaged',
      'ValueAfter'            => 'Estimated value of your object after it was damaged',
      'coowners'              => 'Is the object coowned by somebody else?'));
    
    unset($this['id'],
          $this['damage_id'],
          $this['movableobject_value_before_id'],
          $this['movableobject_value_after_id']);
  }
}
