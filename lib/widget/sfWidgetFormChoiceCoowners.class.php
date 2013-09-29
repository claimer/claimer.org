<?php

class sfWidgetFormChoiceCoowners extends sfWidgetFormChoice
{
  public function configure($options = array(), $attributes = array())
  {
    parent::configure($options, $attributes);
    
    $this->setOption('expanded', true);
    $this->setOption('choices', array(
      0 => 'Yes',
      1 => 'No'
    ));
    $this->addOption('has_coowners', false);
    
    if ($this->getOption('has_coowners') !== null)
    {
      $this->setOption('default',
                       $this->getDefaultValue($options['has_coowners']));
    }
    
    if ($this->getOption('has_coowners', false))
    {
      $this->setAttribute('disabled', 'true');
    }
  }
  
  public function getDefaultValue($hasCoowners)
  {
    return $hasCoowners ? 0 : 1;
  }
}
