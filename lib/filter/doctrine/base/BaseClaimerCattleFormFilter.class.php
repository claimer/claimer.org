<?php

/**
 * ClaimerCattle filter form base class.
 *
 * @package    claimer
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseClaimerCattleFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'damage_id'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Damage'), 'add_empty' => true)),
      'cattle_first_animal'    => new sfWidgetFormFilterInput(),
      'cattle_first_eachyear'  => new sfWidgetFormFilterInput(),
      'cattle_first_loses'     => new sfWidgetFormFilterInput(),
      'cattle_first_value_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ValueFirst'), 'add_empty' => true)),
      'cattle_second_animal'   => new sfWidgetFormFilterInput(),
      'cattle_second_eachyear' => new sfWidgetFormFilterInput(),
      'cattle_second_loses'    => new sfWidgetFormFilterInput(),
      'cattle_second_value_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ValueSecond'), 'add_empty' => true)),
      'cattle_third_animal'    => new sfWidgetFormFilterInput(),
      'cattle_third_eachyear'  => new sfWidgetFormFilterInput(),
      'cattle_third_loses'     => new sfWidgetFormFilterInput(),
      'cattle_third_value_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ValueThird'), 'add_empty' => true)),
      'cattle_fourth_animal'   => new sfWidgetFormFilterInput(),
      'cattle_fourth_eachyear' => new sfWidgetFormFilterInput(),
      'cattle_fourth_loses'    => new sfWidgetFormFilterInput(),
      'cattle_fourth_value_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ValueFourth'), 'add_empty' => true)),
      'cattle_fifth_animal'    => new sfWidgetFormFilterInput(),
      'cattle_fifth_eachyear'  => new sfWidgetFormFilterInput(),
      'cattle_fifth_loses'     => new sfWidgetFormFilterInput(),
      'cattle_fifth_value_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ValueFifth'), 'add_empty' => true)),
      'cattle_ground_details'  => new sfWidgetFormFilterInput(),
      'cattle_living_today'    => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'damage_id'              => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Damage'), 'column' => 'id')),
      'cattle_first_animal'    => new sfValidatorPass(array('required' => false)),
      'cattle_first_eachyear'  => new sfValidatorPass(array('required' => false)),
      'cattle_first_loses'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cattle_first_value_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ValueFirst'), 'column' => 'id')),
      'cattle_second_animal'   => new sfValidatorPass(array('required' => false)),
      'cattle_second_eachyear' => new sfValidatorPass(array('required' => false)),
      'cattle_second_loses'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cattle_second_value_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ValueSecond'), 'column' => 'id')),
      'cattle_third_animal'    => new sfValidatorPass(array('required' => false)),
      'cattle_third_eachyear'  => new sfValidatorPass(array('required' => false)),
      'cattle_third_loses'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cattle_third_value_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ValueThird'), 'column' => 'id')),
      'cattle_fourth_animal'   => new sfValidatorPass(array('required' => false)),
      'cattle_fourth_eachyear' => new sfValidatorPass(array('required' => false)),
      'cattle_fourth_loses'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cattle_fourth_value_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ValueFourth'), 'column' => 'id')),
      'cattle_fifth_animal'    => new sfValidatorPass(array('required' => false)),
      'cattle_fifth_eachyear'  => new sfValidatorPass(array('required' => false)),
      'cattle_fifth_loses'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cattle_fifth_value_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ValueFifth'), 'column' => 'id')),
      'cattle_ground_details'  => new sfValidatorPass(array('required' => false)),
      'cattle_living_today'    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('claimer_cattle_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ClaimerCattle';
  }

  public function getFields()
  {
    return array(
      'id'                     => 'Number',
      'damage_id'              => 'ForeignKey',
      'cattle_first_animal'    => 'Text',
      'cattle_first_eachyear'  => 'Text',
      'cattle_first_loses'     => 'Number',
      'cattle_first_value_id'  => 'ForeignKey',
      'cattle_second_animal'   => 'Text',
      'cattle_second_eachyear' => 'Text',
      'cattle_second_loses'    => 'Number',
      'cattle_second_value_id' => 'ForeignKey',
      'cattle_third_animal'    => 'Text',
      'cattle_third_eachyear'  => 'Text',
      'cattle_third_loses'     => 'Number',
      'cattle_third_value_id'  => 'ForeignKey',
      'cattle_fourth_animal'   => 'Text',
      'cattle_fourth_eachyear' => 'Text',
      'cattle_fourth_loses'    => 'Number',
      'cattle_fourth_value_id' => 'ForeignKey',
      'cattle_fifth_animal'    => 'Text',
      'cattle_fifth_eachyear'  => 'Text',
      'cattle_fifth_loses'     => 'Number',
      'cattle_fifth_value_id'  => 'ForeignKey',
      'cattle_ground_details'  => 'Text',
      'cattle_living_today'    => 'Text',
    );
  }
}
