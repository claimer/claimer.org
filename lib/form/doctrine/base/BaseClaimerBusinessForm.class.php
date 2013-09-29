<?php

/**
 * ClaimerBusiness form base class.
 *
 * @method ClaimerBusiness getObject() Returns the current form's model object
 *
 * @package    claimer
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseClaimerBusinessForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                                => new sfWidgetFormInputHidden(),
      'damage_id'                         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Damage'), 'add_empty' => false)),
      'business_kind'                     => new sfWidgetFormInputText(),
      'business_name'                     => new sfWidgetFormInputText(),
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
      'id'                                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'damage_id'                         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Damage'))),
      'business_kind'                     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'business_name'                     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'business_value_before_turnover_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ValueBT'), 'required' => false)),
      'business_value_before_profit_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ValueBP'), 'required' => false)),
      'business_value_today_turnover_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ValueTT'), 'required' => false)),
      'business_value_today_profit_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ValueTP'), 'required' => false)),
      'business_value_before_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ValueBefore'), 'required' => false)),
      'business_value_after_id'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ValueAfter'), 'required' => false)),
      'business_value_total_id'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ValueTotal'), 'required' => false)),
      'business_address_now_id'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AddressNow'), 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'ClaimerBusiness', 'column' => array('damage_id')))
    );

    $this->widgetSchema->setNameFormat('claimer_business[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ClaimerBusiness';
  }

}
