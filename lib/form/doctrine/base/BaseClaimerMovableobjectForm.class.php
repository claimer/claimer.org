<?php

/**
 * ClaimerMovableobject form base class.
 *
 * @method ClaimerMovableobject getObject() Returns the current form's model object
 *
 * @package    claimer
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseClaimerMovableobjectForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                            => new sfWidgetFormInputHidden(),
      'damage_id'                     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Damage'), 'add_empty' => false)),
      'movableobject_kind'            => new sfWidgetFormInputText(),
      'movableobject_value_before_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ValueBefore'), 'add_empty' => true)),
      'movableobject_value_after_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ValueAfter'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'                            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'damage_id'                     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Damage'))),
      'movableobject_kind'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'movableobject_value_before_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ValueBefore'), 'required' => false)),
      'movableobject_value_after_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ValueAfter'), 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'ClaimerMovableobject', 'column' => array('damage_id')))
    );

    $this->widgetSchema->setNameFormat('claimer_movableobject[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ClaimerMovableobject';
  }

}
