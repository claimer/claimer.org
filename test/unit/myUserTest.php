<?php

require_once dirname(__FILE__).'/../bootstrap/doctrine.php';

function getUser($username)
{
  return Doctrine_Core::getTable('sfGuardUser')->findOneByUsername($username);
}

$t = new lime_test();

// load fixtures
Doctrine_Core::loadData(sfConfig::get('sf_test_dir').'/fixtures/sfGuard.yml');

// init session
sfContext::createInstance($configuration);
$_SERVER['session_id'] = 'test';
$dispatcher = new sfEventDispatcher();
$sessionPath = sys_get_temp_dir().'/sessions_'.rand(11111, 99999);
$storage = new sfSessionTestStorage(array('session_path' => $sessionPath));

// init session user
$user = new myUser($dispatcher, $storage);

// users
$superadmin = getUser('superadmin');
$superadmin2 = getUser('superadmin2');
$admin = getUser('admin');
$admin2 = getUser('admin2');
$registrant = getUser('registrant');
$registrant2 = getUser('registrant2');
$claimant = getUser('claimant');
$claimant2 = getUser('claimant2');

// test basic credentials
$t->comment('a user must be authenticated :');
$t->ok(! $user->hasCredentialOnUser($superadmin));

$t->comment('an authenticated user can edit :');
$user->signIn($superadmin);
$t->ok($user->hasCredentialOnUser($superadmin), 'himself');

// test super administrators
$t->comment('a super administrator can edit :');
$user->signOut();
$user->signIn($superadmin);
$t->ok($user->hasCredentialOnUser($superadmin2), 'super_administrators');
$t->ok($user->hasCredentialOnUser($admin), 'administrators');
$t->ok($user->hasCredentialOnUser($registrant), 'registrants');
$t->ok($user->hasCredentialOnUser($claimant), 'claimants');

// test administrators
$t->comment('an administrator can edit :');
$user->signOut();
$user->signIn($admin);
$t->ok(! $user->hasCredentialOnUser($superadmin), 'no super_administrators');
$t->ok(! $user->hasCredentialOnUser($admin2), 'no administrators');
$t->ok($user->hasCredentialOnUser($registrant), 'registrants');
$t->ok($user->hasCredentialOnUser($claimant), 'claimants');

// test registrants 
$t->comment('a registrant can edit :');
$user->signOut();
$user->signIn($registrant);
$t->ok(! $user->hasCredentialOnUser($superadmin), 'no super_administrators');
$t->ok(! $user->hasCredentialOnUser($admin), 'no administrators');
$t->ok(! $user->hasCredentialOnUser($registrant2), 'no registrants');
$t->ok(! $user->hasCredentialOnUser($claimant), 'no claimants');
$claimant->setManager($registrant);
$t->ok($user->hasCredentialOnUser($claimant), 'except his managed claimants');
$claimant->setManager(null);

// test claimants 
$t->comment('a claimant can edit :');
$user->signOut();
$user->signIn($claimant);
$t->ok(! $user->hasCredentialOnUser($superadmin), 'no super_administrators');
$t->ok(! $user->hasCredentialOnUser($admin), 'no administrators');
$t->ok(! $user->hasCredentialOnUser($registrant), 'no registrants');
$t->ok(! $user->hasCredentialOnUser($claimant2), 'no claimants');

// test damages
$damage = new ClaimerDamage();

$damage->setClaimant($claimant);

$t->comment('a super administrator can edit :');
$user->signOut();
$user->signIn($superadmin);
$t->ok($user->hasCredentialOnDamage($damage), 'any damage');

$t->comment('an administrator can edit :');
$user->signOut();
$user->signIn($admin);
$t->ok($user->hasCredentialOnDamage($damage), 'any damage');

$t->comment('a registrant can edit :');
$damage->setClaimant($claimant);
$user->signOut();
$user->signIn($registrant);
$claimant->setManager($registrant);
$t->ok($user->hasCredentialOnDamage($damage), 'his managed claimant damages');
$claimant->setManager(null);

$t->comment('a claimant can edit :');
$damage->setClaimant($claimant);
$user->signOut();
$user->signIn($claimant);
$t->ok($user->hasCredentialOnDamage($damage), 'own damages');

// test current form session
$user = new myUser($dispatcher, $storage);

$form1Id= "form_test1";
$form2Id= "form_test2";

$t->comment('a user has only one current form in session :');
$user->setFormCurrentStep($form1Id, 1);
$user->setFormCurrentStep($form2Id, 1);
$t->is($user->getFormCurrent(), $form2Id, 'current form is form #2');
$t->is($user->getFormCurrentStep($form2Id), 1, 'current step is #1');
$t->ok(! $user->hasAttribute($form1Id), 'form #1 is not in session');
$t->ok($user->hasAttribute($form2Id), 'form #2 is in session');
