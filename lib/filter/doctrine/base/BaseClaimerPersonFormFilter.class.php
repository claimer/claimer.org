<?php

/**
 * ClaimerPerson filter form base class.
 *
 * @package    claimer
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseClaimerPersonFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'damage_id'                 => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Damage'), 'add_empty' => true)),
      'person_name'               => new sfWidgetFormFilterInput(),
      'person_firstname'          => new sfWidgetFormFilterInput(),
      'person_relationship_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PersonType'), 'add_empty' => true)),
      'person_relationship_other' => new sfWidgetFormFilterInput(),
      'person_death_where'        => new sfWidgetFormFilterInput(),
      'person_death_reason'       => new sfWidgetFormFilterInput(),
      'person_value_med_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ValueMed'), 'add_empty' => true)),
      'person_value_funeral_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ValueFuneral'), 'add_empty' => true)),
      'person_value_care_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ValueCare'), 'add_empty' => true)),
      'person_value_work_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ValueWork'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'damage_id'                 => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Damage'), 'column' => 'id')),
      'person_name'               => new sfValidatorPass(array('required' => false)),
      'person_firstname'          => new sfValidatorPass(array('required' => false)),
      'person_relationship_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('PersonType'), 'column' => 'id')),
      'person_relationship_other' => new sfValidatorPass(array('required' => false)),
      'person_death_where'        => new sfValidatorPass(array('required' => false)),
      'person_death_reason'       => new sfValidatorPass(array('required' => false)),
      'person_value_med_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ValueMed'), 'column' => 'id')),
      'person_value_funeral_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ValueFuneral'), 'column' => 'id')),
      'person_value_care_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ValueCare'), 'column' => 'id')),
      'person_value_work_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ValueWork'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('claimer_person_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ClaimerPerson';
  }

  public function getFields()
  {
    return array(
      'id'                        => 'Number',
      'damage_id'                 => 'ForeignKey',
      'person_name'               => 'Text',
      'person_firstname'          => 'Text',
      'person_relationship_id'    => 'ForeignKey',
      'person_relationship_other' => 'Text',
      'person_death_where'        => 'Text',
      'person_death_reason'       => 'Text',
      'person_value_med_id'       => 'ForeignKey',
      'person_value_funeral_id'   => 'ForeignKey',
      'person_value_care_id'      => 'ForeignKey',
      'person_value_work_id'      => 'ForeignKey',
    );
  }
}
