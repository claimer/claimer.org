<?php

require_once dirname(__FILE__).'/../bootstrap/doctrine.php';

function getCurrency($currency) {
  return Doctrine_Core::getTable('ClaimerCurrency')->findOneByCode($currency);
}

$t = new lime_test();

// load fixtures
Doctrine_Core::loadData(sfConfig::get('sf_test_dir').'/fixtures/currencies.yml');

// test update rate
$t->comment('update rate :');

$rate = new ClaimerRate();
$rate->setCurrencyFrom(getCurrency('EUR'));
$rate->setCurrencyTo(getCurrency('USD'));

try {
  $rate->save();
  $t->pass('updated');
}
catch (sfException $e)
{
  $t->fail('update error');
}
$t->ok(is_numeric($rate->getRate()));
$t->ok($rate->getRate() > 0);

// test one rate per day
$rate->setDateTimeObject('updated_at', new DateTime('-23 hours'));

$t->ok(! $rate->updateRate(), 'one rate per day');

$rate->setDateTimeObject('updated_at', new DateTime('yesterday'));

$t->ok($rate->updateRate());

$rate->delete();
