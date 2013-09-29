<?php

/**
 * ClaimerAddress form base class.
 *
 * @method ClaimerAddress getObject() Returns the current form's model object
 *
 * @package    claimer
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseClaimerAddressForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'street'     => new sfWidgetFormInputText(),
      'number'     => new sfWidgetFormInputText(),
      'postbox'    => new sfWidgetFormInputText(),
      'city'       => new sfWidgetFormInputText(),
      'postcode'   => new sfWidgetFormInputText(),
      'province'   => new sfWidgetFormInputText(),
      'state'      => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'street'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'number'     => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'postbox'    => new sfValidatorString(array('max_length' => 25, 'required' => false)),
      'city'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'postcode'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'province'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'state'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('claimer_address[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ClaimerAddress';
  }

}
