Claimer.org - Environmental Damage Claims Software
==================================================

Licence
-------

Claimer.org software is licensed under the conditions of http://www.claimer.org/legalconditions

Installation
------------

### Introduction

Claimer.org is developed on the Symfony 1.4 web framework and its
included Doctrine 1.2 ORM.

This README focus on a basic LAMP architecture with Apache 2 and MySQL5.
But it's up to you to choose which webserver and database fit your needs.

> More information about Symfony : http://www.symfony-project.org

### Requirements

* Apache 2

* MySQL 5

* \>= PHP 5.2.4, check if your PHP configuration meets the Symfony requirements :
  `$ wget http://sf-to.org/1.4/check.php`
  `$ php check.php`
  `remove the file afterwards`

### Claimer.org Setup

1. Download from https://github.com/claimer/claimer.org/tarball/master
   or clone git repository
   `$ git clone git://github.com/claimer/claimer.org.git`

2. Set up a new Apache virtual host
   `as in [Symfony Jobeet Tutorial](http://symfony.com/legacy/doc/jobeet/1_4/en/01?orm=Doctrine#chapter_01_web_server_configuration_the_secure_way)`

3. create a new MySQL user & database
   `$ mysql -u root -p`
   `mysql> CREATE DATABASE claimer;`
   `mysql> CREATE USER 'claimer'@'localhost' IDENTIFIED BY 'PASSWORD';`
   `mysql> GRANT ALL PRIVILEGES ON claimer.* TO 'claimer'@'localhost';`
   `mysql> quit;`

4. modify the following YAML file according to your newly configured database
  `/config/databases.yml`

5. build database from schema and load fixtures
   `$ php symfony doctrine:build --all --and-load`

6. fix permissions
   `$ php symfony project:permissions`

7. clear cache
   `$ php symfony cc`

8. restart Apache and Claimer.org should now be running on
   `http://localhost:8080`

9. login as superadmin user
   `(login: superadmin, password: superadmin)`

Claimer.org overview
--------------------

### A single Symfony app composed of modules and extended by plugins and libraries

1. frontend app modules :
   
    * claimants : Manage claimants
    * damages : Damages registration
    * default : Content pages and contact form
    * mails : Mail group of users or managed claimants
    * sfGuardAuth : extends sfGuardAuth with alternate login method
    * users : Users administration

2. plugins :
   
    * [sfDoctrineGuardPlugin](http://www.symfony-project.org/plugins/sfDoctrineGuardPlugin) (v5.0.0) : Identity management
    * [sfFormExtraPlugin](http://www.symfony-project.org/plugins/sfFormExtraPlugin) (v1.1.3) : Validators, widgets and forms
    * [sfGenExtraPlugin](http://www.symfony-project.org/plugins/sfGenExtraPlugin) (v0.9.0) : Validators, widgets and forms
    * [sfRatePlugin](http://www.symfony-project.org/plugins/sfRatePlugin) (v1.0.0) : Currency rates through Yahoo! finance

3. libraries :
   
    * [jQuery](http://www.jquery.com) (v1.10.1)
    * [jqPlot](http://www.jqplot.com) (v1.0.8)

### Database

The database schema is defined through an YAML file
`/config/doctrine/schema.yml`

Fixtures are loaded as initial data and can be customized
`/data/fixtures/*.yml`

### Users management and authentication

User management and access controls are handled through sfDoctrineGuardPlugin
(Users<->Profiles, Groups, Permissions) and Symfony credential system.

Fixtures include four default users in
`/data/fixtures/sfGuard.yml`

### Configuration

> Please view [Symfony: The Reference Book](http://symfony.com/legacy/doc/reference)
  for more information on configuration files

#### Symfony configuration

The system configuration can be edited through an YAML file
`/apps/frontend/config/settings.yml`

* .settings :
  * csrf_secret: a_randomly_generated_secret (enables CSRF protection for forms)
  * default_timezone: [a PHP supported timezone](http://php.net/manual/en/timezones.php)

#### Frontend app configuration

The frontend app configuration can be edited through an YAML file
`/apps/frontend/config/app.yml`

* recaptcha: public and private key (used in contact form)
* claimer:
  * default_currency: default currency of damage values
    `currencies: /data/fixtures/currencies.yml`
  * pager_items: number of items to show in list paginations
  * start_date: start date in dates form fields
  * files_damages_dir: damages document directory path
    `the path should not be accessible through webserver to prevent unauthorized access`
  * contact_recipients: list of contact form recipients (as email address => name)

