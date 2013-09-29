<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $sf_user->getCulture() ?>" lang="<?php echo $sf_user->getCulture() ?>">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <title><?php echo $sf_response->getTitle() ?><?php if (has_slot('title')):?> | <?php include_slot('title') ?><?php endif; ?></title>
    <link type="image/x-icon" href="/images/favicon.ico" rel="shortcut icon" />
    <?php include_stylesheets() ?>
    <?php if (has_slot('include_head')): ?>
    <?php include_slot('include_head') ?>
    <?php endif; ?>
  </head>
  <body>
    <div id="wrapper"> 
        <div id="header"> 
          <a href="/" title="Claimer"><img src="/images/banner.png" width="901" height="126" border="0" alt="Claimer" /></a>
          <span><?php echo __('promoting climate damage compensation worldwide'); ?></span>
        </div> 
        <div id="menu" class="left">
          <ul>
            <li><?php echo link_to_active(__('About Us'), '@homepage') ?></li>
            <li><?php echo link_to_active(__('Why Register'), '@whyregister') ?></li>
            <li><?php echo link_to_active(__('How it works'), '@howwill') ?></li>
            <li><?php echo link_to(__('Test software'), 'http://demo.claimer.org') ?></li>
          </ul>
          <ul>
            <?php if (! $sf_user->isAuthenticated() || $sf_user->hasCredential('create_damage')) : ?>
            <li><?php echo link_to_active(__('Register damages here'), '@damage_new') ?></li>
            <?php endif; ?>
            <li><?php echo link_to_active(__('Use software on your server'), '@setupa') ?></li>
            <li><?php echo link_to_active(__('Business models'), '@business') ?></li>
            <li><?php echo link_to_active(__('Help us'), '@takeitover') ?></li>
            <li><?php echo link_to(__('News'), 'http://news.claimer.org') ?></li>
            <li><?php echo link_to_active(__('Contact'), '@contact') ?></li>
          </ul> 
          <ul>
            <?php if ($sf_user->isAuthenticated()) : ?>
            <?php if ($sf_user->hasCredential('list_users')): ?>
            <li><?php echo link_to_active(__('Users'), '@users') ?></li>
            <?php endif; ?>
            <?php if ($sf_user->hasCredential('administer_managed_user')): ?>
            <li><?php echo link_to_active(__('Claimants'), '@claimants') ?></li>
            <?php endif; ?>
            <?php if ($sf_user->hasCredential(array('list_damages', 'filter_damages'), true)): ?>
            <li><?php echo link_to_active(__('Damages'), '@damages') ?></li>
            <?php elseif ($sf_user->hasCredential('list_damages')): ?>
            <li><?php echo link_to_active(__('Your damages'), '@damages') ?></li>
            <?php endif; ?>
            <?php if ($sf_user->hasCredential('list_mails')): ?>
            <li><?php echo link_to_active(__('Emails'), '@mails') ?></li>
            <?php endif; ?>
            <li><?php echo link_to_active(__('Your profile'), array('sf_route' => 'user_view', 'sf_subject' => $sf_user->getGuardUser())) ?></li>
            <li><?php echo link_to_active(__('Logout'), '@sf_guard_signout') ?></li>
            <?php else: ?>
            <li><?php echo link_to_active(__('Login'), '@sf_guard_signin') ?></li>
            <?php endif; ?>
          </ul>
        </div> 
        <div id="content">
          <?php if (has_slot('title')): ?>
          <h1><?php include_slot('title') ?></h1>
          <?php endif; ?>
          
          <?php include_slot('steps') ?>
          
          <?php if ($sf_user->hasFlash('notice')): ?>
          <div class="flash"><?php echo $sf_user->getFlash('notice') ?></div>
          <?php endif; ?>
          
          <?php if ($sf_user->hasFlash('error')): ?>
          <div class="flash"><?php echo $sf_user->getFlash('error') ?></div>
          <?php endif; ?>
          
          <?php if (has_slot('subtitle')): ?>
          <h2<?php if (has_slot('subtitle_class')): ?> class="<?php include_slot('subtitle_class') ?>"<?php endif ?>><?php include_slot('subtitle') ?></h2>
          <?php endif; ?>
          
          <?php echo $sf_content ?>
        </div> 
        <div id="footer"> 
          Developed with <a href="http://www.symfony-project.com" target="_blank" style="text-transform: none;">Symfony</a> by <a href="http://www.foxydemon.com" target="_blank" style="text-transform: none;">Foxy Prod.</a> for Claimer.org &copy; All rights reserved - <a href="/legalconditions"><?php echo __('Legal Conditions') ?></a>
        </div>
    </div>
    <?php include_javascripts() ?>
    <?php if (has_slot('include_js')): ?>
    <?php include_slot('include_js') ?>
    <?php endif; ?>
  </body> 
</html>
