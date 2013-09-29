<?php

/**
 * ClaimerDamage form base class.
 *
 * @method ClaimerDamage getObject() Returns the current form's model object
 *
 * @package    claimer
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseClaimerDamageForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'validationcode' => new sfWidgetFormInputText(),
      'importance'     => new sfWidgetFormInputText(),
      'type_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Type'), 'add_empty' => false)),
      'cause_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Cause'), 'add_empty' => false)),
      'cause_other'    => new sfWidgetFormInputText(),
      'description'    => new sfWidgetFormTextarea(),
      'occurred_at'    => new sfWidgetFormDateTime(),
      'address_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Where'), 'add_empty' => true)),
      'value_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Value'), 'add_empty' => false)),
      'story'          => new sfWidgetFormTextarea(),
      'claimant_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Claimant'), 'add_empty' => false)),
      'created_by'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CreatedBy'), 'add_empty' => false)),
      'updated_by'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('UpdatedBy'), 'add_empty' => false)),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'validationcode' => new sfValidatorString(array('max_length' => 255)),
      'importance'     => new sfValidatorInteger(array('required' => false)),
      'type_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Type'))),
      'cause_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Cause'))),
      'cause_other'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'description'    => new sfValidatorString(array('max_length' => 4000, 'required' => false)),
      'occurred_at'    => new sfValidatorDateTime(),
      'address_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Where'), 'required' => false)),
      'value_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Value'))),
      'story'          => new sfValidatorString(array('max_length' => 10000, 'required' => false)),
      'claimant_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Claimant'))),
      'created_by'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CreatedBy'))),
      'updated_by'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('UpdatedBy'))),
      'created_at'     => new sfValidatorDateTime(),
      'updated_at'     => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'ClaimerDamage', 'column' => array('validationcode')))
    );

    $this->widgetSchema->setNameFormat('claimer_damage[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ClaimerDamage';
  }

}
