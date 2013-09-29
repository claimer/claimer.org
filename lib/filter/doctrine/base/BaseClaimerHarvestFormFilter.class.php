<?php

/**
 * ClaimerHarvest filter form base class.
 *
 * @package    claimer
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseClaimerHarvestFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'damage_id'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Damage'), 'add_empty' => true)),
      'harvest_crops'           => new sfWidgetFormFilterInput(),
      'harvest_feed_before'     => new sfWidgetFormFilterInput(),
      'harvest_feed_after'      => new sfWidgetFormFilterInput(),
      'harvest_value_before_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ValueBefore'), 'add_empty' => true)),
      'harvest_value_after_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ValueAfter'), 'add_empty' => true)),
      'harvest_permanent'       => new sfWidgetFormFilterInput(),
      'harvest_living_today'    => new sfWidgetFormFilterInput(),
      'harvest_value_month_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ValueMonth'), 'add_empty' => true)),
      'harvest_value_need_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ValueNeed'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'damage_id'               => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Damage'), 'column' => 'id')),
      'harvest_crops'           => new sfValidatorPass(array('required' => false)),
      'harvest_feed_before'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'harvest_feed_after'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'harvest_value_before_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ValueBefore'), 'column' => 'id')),
      'harvest_value_after_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ValueAfter'), 'column' => 'id')),
      'harvest_permanent'       => new sfValidatorPass(array('required' => false)),
      'harvest_living_today'    => new sfValidatorPass(array('required' => false)),
      'harvest_value_month_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ValueMonth'), 'column' => 'id')),
      'harvest_value_need_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ValueNeed'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('claimer_harvest_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ClaimerHarvest';
  }

  public function getFields()
  {
    return array(
      'id'                      => 'Number',
      'damage_id'               => 'ForeignKey',
      'harvest_crops'           => 'Text',
      'harvest_feed_before'     => 'Number',
      'harvest_feed_after'      => 'Number',
      'harvest_value_before_id' => 'ForeignKey',
      'harvest_value_after_id'  => 'ForeignKey',
      'harvest_permanent'       => 'Text',
      'harvest_living_today'    => 'Text',
      'harvest_value_month_id'  => 'ForeignKey',
      'harvest_value_need_id'   => 'ForeignKey',
    );
  }
}
