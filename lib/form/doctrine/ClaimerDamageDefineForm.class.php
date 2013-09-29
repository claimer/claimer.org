<?php

/**
 * ClaimerDamage form.
 *
 * @package    claimer
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ClaimerDamageDefineForm extends BaseClaimerDamageForm
{
  public function configure()
  {
    // type
    if ($this->getObject()->isNew())
    {
      $this->widgetSchema['type_id'] = new sfWidgetFormDoctrineChoice(array(
        'model'  => $this->getRelatedModelName('Type'),
        'expanded' => true));
    }
    
    // when
    $years = range(date('Y'), sfConfig::get('app_claimer_start_date', 1970));
    $years = array_combine($years, $years);
    $this->widgetSchema['occurred_at'] = new sfWidgetFormDate(array('years'=> $years));
  
    // where
    $this->embedRelation('Where', 'ClaimerAddressForm', array(array('state_only' => true)));
    
    $this->widgetSchema->setLabels(array(
      'cause_id'    => 'What was the event that caused the damage?',
      'cause_other' => 'Please specify',
      'occurred_at' => 'When?',
      'Where'     => 'Where?',));
    
    $this->useFields(array('type_id', 'cause_id', 'cause_other', 'occurred_at', 'Where'));
    
    if (! $this->getObject()->isNew())
    {
      unset($this['type_id']);
    }
    
    unset($this['id']);
  }

  public function saveEmbeddedForms($con = null, $forms = null)
  {
    if ($forms === null)
    {
      $forms = $this->getEmbeddedForms();
    }

    if (! $forms['Where']->getObject()->isModified())
    {
      unset($forms['Where']);
    }

    parent::saveEmbeddedForms($con, $forms);
  }
}
