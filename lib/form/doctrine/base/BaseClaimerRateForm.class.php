<?php

/**
 * ClaimerRate form base class.
 *
 * @method ClaimerRate getObject() Returns the current form's model object
 *
 * @package    claimer
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseClaimerRateForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'currency_from_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CurrencyFrom'), 'add_empty' => false)),
      'currency_to_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CurrencyTo'), 'add_empty' => false)),
      'rate'             => new sfWidgetFormInputText(),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'currency_from_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CurrencyFrom'))),
      'currency_to_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CurrencyTo'))),
      'rate'             => new sfValidatorNumber(array('required' => false)),
      'created_at'       => new sfValidatorDateTime(),
      'updated_at'       => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('claimer_rate[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ClaimerRate';
  }

}
