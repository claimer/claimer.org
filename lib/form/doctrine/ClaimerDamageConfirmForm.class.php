<?php

/**
 * ClaimerDamage form.
 *
 * @package    form
 * @subpackage ClaimerDamage
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
class ClaimerDamageConfirmForm extends BaseClaimerDamageForm
{
  public function configure()
  {
    $this->widgetSchema->setLabels(array(
      'story' => 'If you want to share your story, please describe what happened to you here'));
    
    $this->useFields(array('story'));
    
    unset($this['id']);
  }
}
