<?php

/**
 * ClaimerCoowner form base class.
 *
 * @method ClaimerCoowner getObject() Returns the current form's model object
 *
 * @package    claimer
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseClaimerCoownerForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'damage_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Damage'), 'add_empty' => false)),
      'percentage'  => new sfWidgetFormInputText(),
      'lastname'    => new sfWidgetFormInputText(),
      'firstname'   => new sfWidgetFormInputText(),
      'email'       => new sfWidgetFormInputText(),
      'email_alt'   => new sfWidgetFormInputText(),
      'phone'       => new sfWidgetFormInputText(),
      'phone_alt'   => new sfWidgetFormInputText(),
      'address_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Address'), 'add_empty' => true)),
      'coownercode' => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'damage_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Damage'))),
      'percentage'  => new sfValidatorNumber(array('required' => false)),
      'lastname'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'firstname'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'email'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'email_alt'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'phone'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'phone_alt'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'address_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Address'), 'required' => false)),
      'coownercode' => new sfValidatorInteger(),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('claimer_coowner[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ClaimerCoowner';
  }

}
