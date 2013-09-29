<?php

/**
 * ClaimerRealestate filter form base class.
 *
 * @package    claimer
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseClaimerRealestateFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'damage_id'                  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Damage'), 'add_empty' => true)),
      'realestate_type_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('RealestateType'), 'add_empty' => true)),
      'realestate_type_other'      => new sfWidgetFormFilterInput(),
      'realestate_value_before_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ValueBefore'), 'add_empty' => true)),
      'realestate_value_after_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ValueAfter'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'damage_id'                  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Damage'), 'column' => 'id')),
      'realestate_type_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('RealestateType'), 'column' => 'id')),
      'realestate_type_other'      => new sfValidatorPass(array('required' => false)),
      'realestate_value_before_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ValueBefore'), 'column' => 'id')),
      'realestate_value_after_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ValueAfter'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('claimer_realestate_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ClaimerRealestate';
  }

  public function getFields()
  {
    return array(
      'id'                         => 'Number',
      'damage_id'                  => 'ForeignKey',
      'realestate_type_id'         => 'ForeignKey',
      'realestate_type_other'      => 'Text',
      'realestate_value_before_id' => 'ForeignKey',
      'realestate_value_after_id'  => 'ForeignKey',
    );
  }
}
