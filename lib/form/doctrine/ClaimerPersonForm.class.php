<?php

/**
 * ClaimerPerson form.
 *
 * @package    claimer
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ClaimerPersonForm extends BaseClaimerPersonForm
{
  public function configure()
  {
    $this->embedForm('address', new ClaimerAddressForm($this->getObject()->getDamage()->getWhere()));
    
    $this->embedRelation('ValueMed');
    $this->embedRelation('ValueFuneral');
    $this->embedRelation('ValueCare');
    $this->embedRelation('ValueWork');
    
    $this->widgetSchema->setLabels(array(
      'person_name'                 => 'Name(s)',
      'person_firstname'            => 'First name(s)',
      'address'                     => 'Last address data',
      'person_relationship_id'      => 'Was this person your mother, your father, your child, your husband, your wife, your grand-father, your grand-mother, your grand-child?',
      'person_relationship_other'   => 'If not, please specify',
      'person_death_where'          => 'Where did this person die?',
      'person_death_reason'         => 'What was the concrete reason for the death?',
      'ValueMed'                    => 'How much did you have to pay for medical treatment prior to the death of this person?',
      'ValueFuneral'                => 'How much did you have to pay for the funeral of this person?',
      'ValueCare'                   => 'How much money did you lose because you could not work during the time you had to care for this person?',
      'ValueWork'                   => 'How much money did the dead person lose because he or she could not work before dying?'));
    
    $this->widgetSchema->setHelp('person_name', 'indicate all the names of the person you lost (mandatory)');
    $this->widgetSchema->setHelp('person_firstname', 'indicate all the first names of the person you lost (mandatory)');
    
    unset($this['id'],
          $this['damage_id'],
          $this['person_value_med_id'],
          $this['person_value_funeral_id'],
          $this['person_value_care_id'],
          $this['person_value_work_id']);
  }
}
