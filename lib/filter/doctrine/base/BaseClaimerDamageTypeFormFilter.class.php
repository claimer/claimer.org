<?php

/**
 * ClaimerDamageType filter form base class.
 *
 * @package    claimer
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseClaimerDamageTypeFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'type'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'name'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'tbl_name'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'has_coowners'  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'has_documents' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'type'          => new sfValidatorPass(array('required' => false)),
      'name'          => new sfValidatorPass(array('required' => false)),
      'tbl_name'      => new sfValidatorPass(array('required' => false)),
      'has_coowners'  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'has_documents' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('claimer_damage_type_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ClaimerDamageType';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'type'          => 'Text',
      'name'          => 'Text',
      'tbl_name'      => 'Text',
      'has_coowners'  => 'Boolean',
      'has_documents' => 'Boolean',
    );
  }
}
