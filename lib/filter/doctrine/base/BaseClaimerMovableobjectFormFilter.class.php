<?php

/**
 * ClaimerMovableobject filter form base class.
 *
 * @package    claimer
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseClaimerMovableobjectFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'damage_id'                     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Damage'), 'add_empty' => true)),
      'movableobject_kind'            => new sfWidgetFormFilterInput(),
      'movableobject_value_before_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ValueBefore'), 'add_empty' => true)),
      'movableobject_value_after_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ValueAfter'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'damage_id'                     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Damage'), 'column' => 'id')),
      'movableobject_kind'            => new sfValidatorPass(array('required' => false)),
      'movableobject_value_before_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ValueBefore'), 'column' => 'id')),
      'movableobject_value_after_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ValueAfter'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('claimer_movableobject_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ClaimerMovableobject';
  }

  public function getFields()
  {
    return array(
      'id'                            => 'Number',
      'damage_id'                     => 'ForeignKey',
      'movableobject_kind'            => 'Text',
      'movableobject_value_before_id' => 'ForeignKey',
      'movableobject_value_after_id'  => 'ForeignKey',
    );
  }
}
