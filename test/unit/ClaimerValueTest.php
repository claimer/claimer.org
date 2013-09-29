<?php

require_once dirname(__FILE__).'/../bootstrap/doctrine.php';

class testRate extends ClaimerRate
{
  public function getRate()
  {
    return 2;
  }
}

class testCurrency extends ClaimerCurrency
{
  public function getCode()
  {
    return 'EUR';
  }
  
  public function getRate($to)
  {
    return new testRate();
  }
}

class testValue extends ClaimerValue
{
  public function getCurrency()
  {
    return new testCurrency();
  }
}

$t = new lime_test();

// load fixtures
Doctrine_Core::loadData(sfConfig::get('sf_test_dir').'/fixtures/currencies.yml');

// default currency
$defaultCurrency = 'EUR';

// test set currency by code
$t->comment('set currency by code :');

$value = new ClaimerValue();

$value->setCurrencyByCode();
$t->is($value->getCurrency()->getCode(), $defaultCurrency, 'default currency is set');

$value->setCurrencyByCode('USD');
$t->is($value->getCurrency()->getCode(), 'USD', 'currency is set');

// test get currency converted value
$t->comment('convert value in currency :');

$value = new ClaimerValue();
$value->setCurrencyByCode();
$value->setValue(1);

$t->is($value, $value->getCurrencyValue(), 'value is in default currency');

$value = new testValue();
$t->is($value->getCurrencyValue('USD')->getValue(), $value->getValue() * 2, 'convert value based on currency rate');
