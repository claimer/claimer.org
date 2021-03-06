<?php

/**
 * ClaimerAddress filter form base class.
 *
 * @package    claimer
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseClaimerAddressFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'street'     => new sfWidgetFormFilterInput(),
      'number'     => new sfWidgetFormFilterInput(),
      'postbox'    => new sfWidgetFormFilterInput(),
      'city'       => new sfWidgetFormFilterInput(),
      'postcode'   => new sfWidgetFormFilterInput(),
      'province'   => new sfWidgetFormFilterInput(),
      'state'      => new sfWidgetFormFilterInput(),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'street'     => new sfValidatorPass(array('required' => false)),
      'number'     => new sfValidatorPass(array('required' => false)),
      'postbox'    => new sfValidatorPass(array('required' => false)),
      'city'       => new sfValidatorPass(array('required' => false)),
      'postcode'   => new sfValidatorPass(array('required' => false)),
      'province'   => new sfValidatorPass(array('required' => false)),
      'state'      => new sfValidatorPass(array('required' => false)),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('claimer_address_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ClaimerAddress';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'street'     => 'Text',
      'number'     => 'Text',
      'postbox'    => 'Text',
      'city'       => 'Text',
      'postcode'   => 'Text',
      'province'   => 'Text',
      'state'      => 'Text',
      'created_at' => 'Date',
      'updated_at' => 'Date',
    );
  }
}
