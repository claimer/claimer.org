<?php

/**
 * ClaimerDamage filter form base class.
 *
 * @package    claimer
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseClaimerDamageFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'validationcode' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'importance'     => new sfWidgetFormFilterInput(),
      'type_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Type'), 'add_empty' => true)),
      'cause_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Cause'), 'add_empty' => true)),
      'cause_other'    => new sfWidgetFormFilterInput(),
      'description'    => new sfWidgetFormFilterInput(),
      'occurred_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'address_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Where'), 'add_empty' => true)),
      'value_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Value'), 'add_empty' => true)),
      'story'          => new sfWidgetFormFilterInput(),
      'claimant_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Claimant'), 'add_empty' => true)),
      'created_by'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CreatedBy'), 'add_empty' => true)),
      'updated_by'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('UpdatedBy'), 'add_empty' => true)),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'validationcode' => new sfValidatorPass(array('required' => false)),
      'importance'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'type_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Type'), 'column' => 'id')),
      'cause_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Cause'), 'column' => 'id')),
      'cause_other'    => new sfValidatorPass(array('required' => false)),
      'description'    => new sfValidatorPass(array('required' => false)),
      'occurred_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'address_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Where'), 'column' => 'id')),
      'value_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Value'), 'column' => 'id')),
      'story'          => new sfValidatorPass(array('required' => false)),
      'claimant_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Claimant'), 'column' => 'id')),
      'created_by'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CreatedBy'), 'column' => 'id')),
      'updated_by'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('UpdatedBy'), 'column' => 'id')),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('claimer_damage_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ClaimerDamage';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'validationcode' => 'Text',
      'importance'     => 'Number',
      'type_id'        => 'ForeignKey',
      'cause_id'       => 'ForeignKey',
      'cause_other'    => 'Text',
      'description'    => 'Text',
      'occurred_at'    => 'Date',
      'address_id'     => 'ForeignKey',
      'value_id'       => 'ForeignKey',
      'story'          => 'Text',
      'claimant_id'    => 'ForeignKey',
      'created_by'     => 'ForeignKey',
      'updated_by'     => 'ForeignKey',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
    );
  }
}
