<?php

require_once dirname(__FILE__).'/../bootstrap/unit.php';

$configuration = ProjectConfiguration::getApplicationConfiguration('frontend', 'test', true);

new sfDatabaseManager($configuration);
