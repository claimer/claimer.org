<?php

require_once dirname(__FILE__).'/../bootstrap/doctrine.php';

function getUser($username)
{
  return Doctrine_Core::getTable('sfGuardUser')->findOneByUsername($username);
}

function getDamage($id)
{
  return Doctrine_Core::getTable('ClaimerDamage')->find($id);
}

function getDamageType($type)
{
  return Doctrine_Core::getTable('ClaimerDamageType')->findOneByType($type);
}

function getDamageCause($name)
{
  return Doctrine_Core::getTable('ClaimerCause')->findOneByName($name);
}

function newTestDamage($claimant, $type, $cause) {
  $damage = new ClaimerDamage();
  $damage->init($claimant);
  $damage->setType(getDamageType($type));
  $damage->setCause(getDamageCause($cause));
  
  return $damage;
}

$t = new lime_test();

// load fixtures
Doctrine_Core::loadData(sfConfig::get('sf_test_dir').'/fixtures/sfGuard.yml');
Doctrine_Core::loadData(sfConfig::get('sf_test_dir').'/fixtures/damagetypes.yml');
Doctrine_Core::loadData(sfConfig::get('sf_test_dir').'/fixtures/damagecauses.yml');
Doctrine_Core::loadData(sfConfig::get('sf_test_dir').'/fixtures/currencies.yml');

// users
$registrant = getUser('registrant');
$claimant = getUser('claimant');

// test damage init
$t->comment('damage init :');

$damage = new ClaimerDamage();
$damage->init($claimant);

$t->ok($damage->getClaimant() !== null, 'claimant is set');
$t->ok($damage->getCreatedBy() !== null, 'created by user is set');
$t->ok($damage->getImportance() > 0, 'damage importance is set');

// test importance
$t->comment('damage importance by claimant :');

$damage1 = newTestDamage($claimant, 'realestate', 'Storm');
$damage1->save();
$damage2 = newTestDamage($claimant, 'realestate', 'Storm');
$damage2->save();

$t->is($damage1->getImportance(), 1, 'damage 1 is most important damage');
$t->is($damage2->getImportance(), 2, 'damage 2 is 2nd most important damage');
$damage1->delete();
$damage2->refresh();
$t->is($damage2->getImportance(), 1, 'after damage 1 delete, damage 2 is most important damage');
$damage2->delete();

// test validation code generation
$t->comment('damage validation code :');

$damage1 = newTestDamage($claimant, 'realestate', 'Storm');
$damage1->save();
$registrant->manageUser($claimant);
$damage2 = newTestDamage($claimant, 'business', 'Storm');
$damage2->save();
$damage3 = newTestDamage($claimant, 'business', 'Storm');
$damage3->save();

$t->is($damage1->getValidationcode(), '000-'.$claimant->getId().'-1-R-1', 'validation code for non-managed user');
$t->is($damage2->getValidationcode(), $registrant->getId().'-'.$claimant->getId().'-2-B-1', 'validation code for managed user');
$t->is($damage3->getValidationcode(), $registrant->getId().'-'.$claimant->getId().'-3-B-2');

$damage2->delete();
$damage4 = newTestDamage($claimant, 'business', 'Storm');
$damage4->save();

$t->is($damage4->getValidationcode(), $registrant->getId().'-'.$claimant->getId().'-3-B-3', 'last number is damage count since beginning by claimant and type');

$damage1->delete();
$damage3->delete();
$damage4->delete();

// test damage type details
$t->comment('damage type details :');

$damage = new ClaimerDamage();
$damage->setType(getDamageType('realestate'));
$t->is($damage, $damage->getDetails()->getDamage(), 'has a details class');
