<?php

/**
 * ClaimerPerson form base class.
 *
 * @method ClaimerPerson getObject() Returns the current form's model object
 *
 * @package    claimer
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseClaimerPersonForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                        => new sfWidgetFormInputHidden(),
      'damage_id'                 => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Damage'), 'add_empty' => false)),
      'person_name'               => new sfWidgetFormInputText(),
      'person_firstname'          => new sfWidgetFormInputText(),
      'person_relationship_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PersonType'), 'add_empty' => true)),
      'person_relationship_other' => new sfWidgetFormInputText(),
      'person_death_where'        => new sfWidgetFormInputText(),
      'person_death_reason'       => new sfWidgetFormInputText(),
      'person_value_med_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ValueMed'), 'add_empty' => true)),
      'person_value_funeral_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ValueFuneral'), 'add_empty' => true)),
      'person_value_care_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ValueCare'), 'add_empty' => true)),
      'person_value_work_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ValueWork'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'                        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'damage_id'                 => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Damage'))),
      'person_name'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'person_firstname'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'person_relationship_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('PersonType'), 'required' => false)),
      'person_relationship_other' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'person_death_where'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'person_death_reason'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'person_value_med_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ValueMed'), 'required' => false)),
      'person_value_funeral_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ValueFuneral'), 'required' => false)),
      'person_value_care_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ValueCare'), 'required' => false)),
      'person_value_work_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ValueWork'), 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'ClaimerPerson', 'column' => array('damage_id')))
    );

    $this->widgetSchema->setNameFormat('claimer_person[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ClaimerPerson';
  }

}
