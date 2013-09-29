<?php

/**
 * ClaimerBusiness filter form base class.
 *
 * @package    claimer
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseClaimerBusinessFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'damage_id'                         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Damage'), 'add_empty' => true)),
      'business_kind'                     => new sfWidgetFormFilterInput(),
      'business_name'                     => new sfWidgetFormFilterInput(),
      'business_value_before_turnover_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ValueBT'), 'add_empty' => true)),
      'business_value_before_profit_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ValueBP'), 'add_empty' => true)),
      'business_value_today_turnover_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ValueTT'), 'add_empty' => true)),
      'business_value_today_profit_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ValueTP'), 'add_empty' => true)),
      'business_value_before_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ValueBefore'), 'add_empty' => true)),
      'business_value_after_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ValueAfter'), 'add_empty' => true)),
      'business_value_total_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ValueTotal'), 'add_empty' => true)),
      'business_address_now_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AddressNow'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'damage_id'                         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Damage'), 'column' => 'id')),
      'business_kind'                     => new sfValidatorPass(array('required' => false)),
      'business_name'                     => new sfValidatorPass(array('required' => false)),
      'business_value_before_turnover_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ValueBT'), 'column' => 'id')),
      'business_value_before_profit_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ValueBP'), 'column' => 'id')),
      'business_value_today_turnover_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ValueTT'), 'column' => 'id')),
      'business_value_today_profit_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ValueTP'), 'column' => 'id')),
      'business_value_before_id'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ValueBefore'), 'column' => 'id')),
      'business_value_after_id'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ValueAfter'), 'column' => 'id')),
      'business_value_total_id'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ValueTotal'), 'column' => 'id')),
      'business_address_now_id'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('AddressNow'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('claimer_business_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ClaimerBusiness';
  }

  public function getFields()
  {
    return array(
      'id'                                => 'Number',
      'damage_id'                         => 'ForeignKey',
      'business_kind'                     => 'Text',
      'business_name'                     => 'Text',
      'business_value_before_turnover_id' => 'ForeignKey',
      'business_value_before_profit_id'   => 'ForeignKey',
      'business_value_today_turnover_id'  => 'ForeignKey',
      'business_value_today_profit_id'    => 'ForeignKey',
      'business_value_before_id'          => 'ForeignKey',
      'business_value_after_id'           => 'ForeignKey',
      'business_value_total_id'           => 'ForeignKey',
      'business_address_now_id'           => 'ForeignKey',
    );
  }
}
