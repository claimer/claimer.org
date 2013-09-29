<?php

/**
 * ClaimerCoowners form.
 *
 * @package    claimer
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ClaimerCoownersForm extends BaseClaimerDamageForm
{
  public function configure()
  {
    $this->embedRelation('Coowners');
    
    $this->widgetSchema['new_coowner'] = new sfWidgetFormInputHidden();
    $this->validatorSchema['new_coowner'] = new sfValidatorInteger(array('required' => false));
    
    $this->widgetSchema['delete_coowner'] = new sfWidgetFormInputHidden();
    $this->validatorSchema['delete_coowner'] = new sfValidatorInteger(array('required' => false));
    
    $this->useFields(array('Coowners'));
    
    unset($this['id']);
  }
}
