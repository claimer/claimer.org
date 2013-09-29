<?php

/**
 * ClaimerOtherloss filter form base class.
 *
 * @package    claimer
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseClaimerOtherlossFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'damage_id'                  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Damage'), 'add_empty' => true)),
      'otherloss_value_between_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ValueBetween'), 'add_empty' => true)),
      'otherloss_value_peryear_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ValuePerYear'), 'add_empty' => true)),
      'otherloss_years_until'      => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'damage_id'                  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Damage'), 'column' => 'id')),
      'otherloss_value_between_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ValueBetween'), 'column' => 'id')),
      'otherloss_value_peryear_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ValuePerYear'), 'column' => 'id')),
      'otherloss_years_until'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('claimer_otherloss_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ClaimerOtherloss';
  }

  public function getFields()
  {
    return array(
      'id'                         => 'Number',
      'damage_id'                  => 'ForeignKey',
      'otherloss_value_between_id' => 'ForeignKey',
      'otherloss_value_peryear_id' => 'ForeignKey',
      'otherloss_years_until'      => 'Number',
    );
  }
}
