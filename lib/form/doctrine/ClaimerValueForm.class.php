<?php

/**
 * ClaimerValue form.
 *
 * @package    claimer
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ClaimerValueForm extends BaseClaimerValueForm
{
  public function configure()
  {
    $this->widgetSchema['currency_id'] = new sfWidgetFormDoctrineChoice(array(
      'model'  => $this->getRelatedModelName('Currency')));
    
    if (is_numeric($this->getObject()->getValue()))
    {
      $this->widgetSchema['value']->setAttribute('value', (int) $this->getObject()->getValue());
    }
    
    $this->validatorSchema['value'] = new sfValidatorInteger(array('required' => false));
    
    $this->validatorSchema->setPostValidator(new ClaimerValidatorRemoveEmptyNumber(array('fields' => array('value'))));
    
    unset($this['id'],
          $this['created_at'],
          $this['updated_at']);
  }
}
