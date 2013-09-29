<?php

class frontendConfiguration extends sfApplicationConfiguration
{
  public function initialize()
  {
    if (! in_array(sfConfig::get('app_claimer_default_currency'), array('EUR', 'USD')))
    {
      throw new sfException(sprintf("The %s default currency in app.yml is invalid.", sfConfig::get('app_claimer_default_currency')));
    }
  }
}
