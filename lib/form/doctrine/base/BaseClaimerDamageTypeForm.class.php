<?php

/**
 * ClaimerDamageType form base class.
 *
 * @method ClaimerDamageType getObject() Returns the current form's model object
 *
 * @package    claimer
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseClaimerDamageTypeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'type'          => new sfWidgetFormInputText(),
      'name'          => new sfWidgetFormInputText(),
      'tbl_name'      => new sfWidgetFormInputText(),
      'has_coowners'  => new sfWidgetFormInputCheckbox(),
      'has_documents' => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'type'          => new sfValidatorString(array('max_length' => 255)),
      'name'          => new sfValidatorString(array('max_length' => 255)),
      'tbl_name'      => new sfValidatorString(array('max_length' => 255)),
      'has_coowners'  => new sfValidatorBoolean(array('required' => false)),
      'has_documents' => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'ClaimerDamageType', 'column' => array('type'))),
        new sfValidatorDoctrineUnique(array('model' => 'ClaimerDamageType', 'column' => array('tbl_name'))),
      ))
    );

    $this->widgetSchema->setNameFormat('claimer_damage_type[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ClaimerDamageType';
  }

}
