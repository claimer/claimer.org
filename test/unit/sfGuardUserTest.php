<?php

require_once dirname(__FILE__).'/../bootstrap/doctrine.php';

function getUser($username)
{
  return Doctrine_Core::getTable('sfGuardUser')->findOneByUsername($username);
}

$t = new lime_test();

// load fixtures
Doctrine_Core::loadData(sfConfig::get('sf_test_dir').'/fixtures/sfGuard.yml');

// users
$registrant = getUser('registrant');
$claimant = getUser('claimant');

// test manage user
$t->comment('an user can manage another user :');

$t->ok(! $claimant->hasManager(), 'user has no manager');
$t->ok($registrant->manageUser($claimant), 'manage user');
$t->ok($registrant->isManagerOfUser($claimant), 'is manager of user');
$t->ok($claimant->hasManager(), 'user has a manager');
$t->ok(! $registrant->manageUser($registrant), 'user can not manage himself');
$t->ok(! $claimant->manageUser($registrant), 'managed user can not manage his manager');
$user = new sfGuardUser();
$t->ok(! $claimant->manageUser($user), 'managed user can not manage another user');
