<?php

/**
 * ClaimerCattle form base class.
 *
 * @method ClaimerCattle getObject() Returns the current form's model object
 *
 * @package    claimer
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseClaimerCattleForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                     => new sfWidgetFormInputHidden(),
      'damage_id'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Damage'), 'add_empty' => false)),
      'cattle_first_animal'    => new sfWidgetFormInputText(),
      'cattle_first_eachyear'  => new sfWidgetFormInputText(),
      'cattle_first_loses'     => new sfWidgetFormInputText(),
      'cattle_first_value_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ValueFirst'), 'add_empty' => true)),
      'cattle_second_animal'   => new sfWidgetFormInputText(),
      'cattle_second_eachyear' => new sfWidgetFormInputText(),
      'cattle_second_loses'    => new sfWidgetFormInputText(),
      'cattle_second_value_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ValueSecond'), 'add_empty' => true)),
      'cattle_third_animal'    => new sfWidgetFormInputText(),
      'cattle_third_eachyear'  => new sfWidgetFormInputText(),
      'cattle_third_loses'     => new sfWidgetFormInputText(),
      'cattle_third_value_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ValueThird'), 'add_empty' => true)),
      'cattle_fourth_animal'   => new sfWidgetFormInputText(),
      'cattle_fourth_eachyear' => new sfWidgetFormInputText(),
      'cattle_fourth_loses'    => new sfWidgetFormInputText(),
      'cattle_fourth_value_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ValueFourth'), 'add_empty' => true)),
      'cattle_fifth_animal'    => new sfWidgetFormInputText(),
      'cattle_fifth_eachyear'  => new sfWidgetFormInputText(),
      'cattle_fifth_loses'     => new sfWidgetFormInputText(),
      'cattle_fifth_value_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ValueFifth'), 'add_empty' => true)),
      'cattle_ground_details'  => new sfWidgetFormTextarea(),
      'cattle_living_today'    => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'                     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'damage_id'              => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Damage'))),
      'cattle_first_animal'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cattle_first_eachyear'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cattle_first_loses'     => new sfValidatorInteger(array('required' => false)),
      'cattle_first_value_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ValueFirst'), 'required' => false)),
      'cattle_second_animal'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cattle_second_eachyear' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cattle_second_loses'    => new sfValidatorInteger(array('required' => false)),
      'cattle_second_value_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ValueSecond'), 'required' => false)),
      'cattle_third_animal'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cattle_third_eachyear'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cattle_third_loses'     => new sfValidatorInteger(array('required' => false)),
      'cattle_third_value_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ValueThird'), 'required' => false)),
      'cattle_fourth_animal'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cattle_fourth_eachyear' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cattle_fourth_loses'    => new sfValidatorInteger(array('required' => false)),
      'cattle_fourth_value_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ValueFourth'), 'required' => false)),
      'cattle_fifth_animal'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cattle_fifth_eachyear'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cattle_fifth_loses'     => new sfValidatorInteger(array('required' => false)),
      'cattle_fifth_value_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ValueFifth'), 'required' => false)),
      'cattle_ground_details'  => new sfValidatorString(array('max_length' => 4000, 'required' => false)),
      'cattle_living_today'    => new sfValidatorString(array('max_length' => 4000, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'ClaimerCattle', 'column' => array('damage_id')))
    );

    $this->widgetSchema->setNameFormat('claimer_cattle[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ClaimerCattle';
  }

}
