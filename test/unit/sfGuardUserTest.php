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
$superadmin = getUser('superadmin');
$admin = getUser('admin');
$registrant = getUser('registrant');
$claimant = getUser('claimant');

// test add groups to new user
$t->comment('a new user can have groups :');

$user = new sfGuardUser();
$user->setUsername('test');

$user->addGroupByName('claimants');
$user->addGroupByName('claimants'); // accept duplicates
try
{
  $user->addGroupByName('claimantstest');
  $t->fail('group must exists');
}
catch(Exception $e)
{
  $t->pass('group must exists');
}
$t->ok($user->hasGroup('claimants'), 'user has group before save');
$user->save();
$t->ok($user->hasGroup('claimants'), 'user has group after save');
$user->delete();

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
