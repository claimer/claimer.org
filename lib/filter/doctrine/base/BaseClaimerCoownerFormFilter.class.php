<?php

/**
 * ClaimerCoowner filter form base class.
 *
 * @package    claimer
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseClaimerCoownerFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'damage_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Damage'), 'add_empty' => true)),
      'percentage'  => new sfWidgetFormFilterInput(),
      'lastname'    => new sfWidgetFormFilterInput(),
      'firstname'   => new sfWidgetFormFilterInput(),
      'email'       => new sfWidgetFormFilterInput(),
      'email_alt'   => new sfWidgetFormFilterInput(),
      'phone'       => new sfWidgetFormFilterInput(),
      'phone_alt'   => new sfWidgetFormFilterInput(),
      'address_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Address'), 'add_empty' => true)),
      'coownercode' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'damage_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Damage'), 'column' => 'id')),
      'percentage'  => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'lastname'    => new sfValidatorPass(array('required' => false)),
      'firstname'   => new sfValidatorPass(array('required' => false)),
      'email'       => new sfValidatorPass(array('required' => false)),
      'email_alt'   => new sfValidatorPass(array('required' => false)),
      'phone'       => new sfValidatorPass(array('required' => false)),
      'phone_alt'   => new sfValidatorPass(array('required' => false)),
      'address_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Address'), 'column' => 'id')),
      'coownercode' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('claimer_coowner_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ClaimerCoowner';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'damage_id'   => 'ForeignKey',
      'percentage'  => 'Number',
      'lastname'    => 'Text',
      'firstname'   => 'Text',
      'email'       => 'Text',
      'email_alt'   => 'Text',
      'phone'       => 'Text',
      'phone_alt'   => 'Text',
      'address_id'  => 'ForeignKey',
      'coownercode' => 'Number',
      'created_at'  => 'Date',
      'updated_at'  => 'Date',
    );
  }
}
