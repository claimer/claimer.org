<?php

/**
 * ClaimerCattle form.
 *
 * @package    claimer
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ClaimerCattleForm extends BaseClaimerCattleForm
{
  public function configure()
  {
    $this->embedRelation('ValueFirst');
    $this->embedRelation('ValueSecond');
    $this->embedRelation('ValueThird');
    $this->embedRelation('ValueFourth');
    $this->embedRelation('ValueFifth');
    
    $this->validatorSchema['cattle_first_loses'] = new sfValidatorInteger(array('min' => 0));
    $this->validatorSchema['cattle_second_loses'] = new sfValidatorInteger(array('min' => 0));
    $this->validatorSchema['cattle_third_loses'] = new sfValidatorInteger(array('min' => 0));
    $this->validatorSchema['cattle_fourth_loses'] = new sfValidatorInteger(array('min' => 0));
    $this->validatorSchema['cattle_fifth_loses'] = new sfValidatorInteger(array('min' => 0));
    
    $this->widgetSchema->setLabels(array(
      'cattle_first_animal'     => 'What is the most important animal you had before the damage?',
      'cattle_first_eachyear'   => 'How many of them could you sell or eat each year before the damage?',
      'cattle_first_loses'      => 'How many of them did you loose due to the damage?',
      'ValueFirst'              => 'What was the price for each animal at the time of the damage?',
      'cattle_second_animal'    => 'What is the second most important animal you had before the damage?',
      'cattle_second_eachyear'  => 'How many of them could you sell or eat each year before the damage?',
      'cattle_second_loses'     => 'How many of them did you loose due to the damage?',
      'ValueSecond'             => 'What was the price for each animal at the time of the damage?',
      'cattle_third_animal'     => 'What is the third most important animal you had before the damage?',
      'cattle_third_eachyear'   => 'How many of them could you sell or eat each year before the damage?',
      'cattle_third_loses'      => 'How many of them did you loose due to the damage?',
      'ValueThird'              => 'What was the price for each animal at the time of the damage?',
      'cattle_fourth_animal'    => 'What is the fourth most important animal you had before the damage?',
      'cattle_fourth_eachyear'  => 'How many of them could you sell or eat each year before the damage?',
      'cattle_fourth_loses'     => 'How many of them did you loose due to the damage?',
      'ValueFourth'             => 'What was the price for each animal at the time of the damage?',
      'cattle_fifth_animal'     => 'What is the fifth most important animal you had before the damage?',
      'cattle_fifth_eachyear'   => 'How many of them could you sell or eat each year before the damage?',
      'cattle_fifth_loses'      => 'How many of them did you loose due to the damage?',
      'ValueFifth'              => 'What was the price for each animal at the time of the damage?',
      'cattle_ground_details'   => 'Have you permanently lost the ground or the buildings necessary to elevate your cattle? If yes, please give details.',
      'cattle_living_today'     => 'Are you still living from your cattle today?'));
    
    unset($this['id'],
          $this['damage_id'],
          $this['cattle_first_value_id'],
          $this['cattle_second_value_id'],
          $this['cattle_third_value_id'],
          $this['cattle_fourth_value_id'],
          $this['cattle_fifth_value_id']);
  }
}
