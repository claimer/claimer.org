<?php

/**
 * ClaimerDocumentType form base class.
 *
 * @method ClaimerDocumentType getObject() Returns the current form's model object
 *
 * @package    claimer
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseClaimerDocumentTypeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'damage_type_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('DamageType'), 'add_empty' => false)),
      'name'           => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'damage_type_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('DamageType'))),
      'name'           => new sfValidatorString(array('max_length' => 255)),
    ));

    $this->widgetSchema->setNameFormat('claimer_document_type[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ClaimerDocumentType';
  }

}
