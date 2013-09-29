<?php

/**
 * ClaimerHarvest form.
 *
 * @package    claimer
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ClaimerHarvestForm extends BaseClaimerHarvestForm
{
  public function configure()
  {
    $this->embedRelation('ValueBefore');
    $this->embedRelation('ValueAfter');
    $this->embedRelation('ValueMonth');
    $this->embedRelation('ValueNeed');
    
    $this->validatorSchema['harvest_feed_before'] = new sfValidatorInteger(array('min' => 0));
    $this->validatorSchema['harvest_feed_before'] = new sfValidatorInteger(array('min' => 0));
    
    $this->widgetSchema->setLabels(array(
      'harvest_crops'         => 'What kind of crops did you plant before the damage?',
      'harvest_feed_before'   => 'How many people of your family could you feed before the damage?',
      'harvest_feed_after'    => 'How many people of your family can you feed today?',
      'ValueBefore'           => 'How much money did you make before the damage each year by selling a part of the harvest?',
      'ValueAfter'            => 'How much money do you make now each year by selling a part of the harvest?',
      'harvest_permanent'     => 'Have you permanently lost the ground necessary to grow crops? If yes, please give details.',
      'harvest_living_today'  => 'Are you still living from your harvests today? If no, what do you do for a living today?',
      'ValueMonth'            => 'How much do you earn today per month?',
      'ValueNeed'             => 'How much would you need to earn per month to have a life at the same level as before the damage?'));
    
    unset($this['id'],
          $this['damage_id'],
          $this['harvest_value_before_id'],
          $this['harvest_value_after_id'],
          $this['harvest_value_month_id'],
          $this['harvest_value_need_id']);
  }
}
