<?php

/**
 * ClaimerOtherloss form base class.
 *
 * @method ClaimerOtherloss getObject() Returns the current form's model object
 *
 * @package    claimer
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseClaimerOtherlossForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                         => new sfWidgetFormInputHidden(),
      'damage_id'                  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Damage'), 'add_empty' => false)),
      'otherloss_value_between_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ValueBetween'), 'add_empty' => true)),
      'otherloss_value_peryear_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ValuePerYear'), 'add_empty' => true)),
      'otherloss_years_until'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'damage_id'                  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Damage'))),
      'otherloss_value_between_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ValueBetween'), 'required' => false)),
      'otherloss_value_peryear_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ValuePerYear'), 'required' => false)),
      'otherloss_years_until'      => new sfValidatorInteger(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'ClaimerOtherloss', 'column' => array('damage_id')))
    );

    $this->widgetSchema->setNameFormat('claimer_otherloss[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ClaimerOtherloss';
  }

}
