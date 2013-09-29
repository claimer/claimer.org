<?php

/**
 * ClaimerHarvest form base class.
 *
 * @method ClaimerHarvest getObject() Returns the current form's model object
 *
 * @package    claimer
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseClaimerHarvestForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                      => new sfWidgetFormInputHidden(),
      'damage_id'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Damage'), 'add_empty' => false)),
      'harvest_crops'           => new sfWidgetFormInputText(),
      'harvest_feed_before'     => new sfWidgetFormInputText(),
      'harvest_feed_after'      => new sfWidgetFormInputText(),
      'harvest_value_before_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ValueBefore'), 'add_empty' => true)),
      'harvest_value_after_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ValueAfter'), 'add_empty' => true)),
      'harvest_permanent'       => new sfWidgetFormTextarea(),
      'harvest_living_today'    => new sfWidgetFormInputText(),
      'harvest_value_month_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ValueMonth'), 'add_empty' => true)),
      'harvest_value_need_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ValueNeed'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'                      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'damage_id'               => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Damage'))),
      'harvest_crops'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'harvest_feed_before'     => new sfValidatorInteger(array('required' => false)),
      'harvest_feed_after'      => new sfValidatorInteger(array('required' => false)),
      'harvest_value_before_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ValueBefore'), 'required' => false)),
      'harvest_value_after_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ValueAfter'), 'required' => false)),
      'harvest_permanent'       => new sfValidatorString(array('max_length' => 4000, 'required' => false)),
      'harvest_living_today'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'harvest_value_month_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ValueMonth'), 'required' => false)),
      'harvest_value_need_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ValueNeed'), 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'ClaimerHarvest', 'column' => array('damage_id')))
    );

    $this->widgetSchema->setNameFormat('claimer_harvest[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ClaimerHarvest';
  }

}
