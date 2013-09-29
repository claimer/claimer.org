<?php

/**
 * ClaimerRealestate form base class.
 *
 * @method ClaimerRealestate getObject() Returns the current form's model object
 *
 * @package    claimer
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseClaimerRealestateForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                         => new sfWidgetFormInputHidden(),
      'damage_id'                  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Damage'), 'add_empty' => false)),
      'realestate_type_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('RealestateType'), 'add_empty' => true)),
      'realestate_type_other'      => new sfWidgetFormInputText(),
      'realestate_value_before_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ValueBefore'), 'add_empty' => true)),
      'realestate_value_after_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ValueAfter'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'                         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'damage_id'                  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Damage'))),
      'realestate_type_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('RealestateType'), 'required' => false)),
      'realestate_type_other'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'realestate_value_before_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ValueBefore'), 'required' => false)),
      'realestate_value_after_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ValueAfter'), 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'ClaimerRealestate', 'column' => array('damage_id')))
    );

    $this->widgetSchema->setNameFormat('claimer_realestate[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ClaimerRealestate';
  }

}
