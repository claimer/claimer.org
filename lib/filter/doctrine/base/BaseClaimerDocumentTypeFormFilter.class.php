<?php

/**
 * ClaimerDocumentType filter form base class.
 *
 * @package    claimer
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseClaimerDocumentTypeFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'damage_type_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('DamageType'), 'add_empty' => true)),
      'name'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'damage_type_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('DamageType'), 'column' => 'id')),
      'name'           => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('claimer_document_type_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ClaimerDocumentType';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'damage_type_id' => 'ForeignKey',
      'name'           => 'Text',
    );
  }
}
