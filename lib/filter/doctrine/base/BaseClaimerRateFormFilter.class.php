<?php

/**
 * ClaimerRate filter form base class.
 *
 * @package    claimer
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseClaimerRateFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'currency_from_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CurrencyFrom'), 'add_empty' => true)),
      'currency_to_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CurrencyTo'), 'add_empty' => true)),
      'rate'             => new sfWidgetFormFilterInput(),
      'created_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'currency_from_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CurrencyFrom'), 'column' => 'id')),
      'currency_to_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CurrencyTo'), 'column' => 'id')),
      'rate'             => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'created_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('claimer_rate_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ClaimerRate';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'currency_from_id' => 'ForeignKey',
      'currency_to_id'   => 'ForeignKey',
      'rate'             => 'Number',
      'created_at'       => 'Date',
      'updated_at'       => 'Date',
    );
  }
}
