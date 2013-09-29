<?php

/**
 * BaseClaimerValue
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $currency_id
 * @property decimal $value
 * @property ClaimerCurrency $Currency
 * @property ClaimerDamage $ClaimerDamage
 * @property ClaimerRealestate $ClaimerRealestate
 * @property ClaimerMovableobject $ClaimerMovableobject
 * @property ClaimerBusiness $ClaimerBusiness
 * @property ClaimerPerson $ClaimerPerson
 * @property ClaimerCattle $ClaimerCattle
 * @property ClaimerHarvest $ClaimerHarvest
 * @property ClaimerOtherloss $ClaimerOtherloss
 * 
 * @method integer              getCurrencyId()           Returns the current record's "currency_id" value
 * @method decimal              getValue()                Returns the current record's "value" value
 * @method ClaimerCurrency      getCurrency()             Returns the current record's "Currency" value
 * @method ClaimerDamage        getClaimerDamage()        Returns the current record's "ClaimerDamage" value
 * @method ClaimerRealestate    getClaimerRealestate()    Returns the current record's "ClaimerRealestate" value
 * @method ClaimerMovableobject getClaimerMovableobject() Returns the current record's "ClaimerMovableobject" value
 * @method ClaimerBusiness      getClaimerBusiness()      Returns the current record's "ClaimerBusiness" value
 * @method ClaimerPerson        getClaimerPerson()        Returns the current record's "ClaimerPerson" value
 * @method ClaimerCattle        getClaimerCattle()        Returns the current record's "ClaimerCattle" value
 * @method ClaimerHarvest       getClaimerHarvest()       Returns the current record's "ClaimerHarvest" value
 * @method ClaimerOtherloss     getClaimerOtherloss()     Returns the current record's "ClaimerOtherloss" value
 * @method ClaimerValue         setCurrencyId()           Sets the current record's "currency_id" value
 * @method ClaimerValue         setValue()                Sets the current record's "value" value
 * @method ClaimerValue         setCurrency()             Sets the current record's "Currency" value
 * @method ClaimerValue         setClaimerDamage()        Sets the current record's "ClaimerDamage" value
 * @method ClaimerValue         setClaimerRealestate()    Sets the current record's "ClaimerRealestate" value
 * @method ClaimerValue         setClaimerMovableobject() Sets the current record's "ClaimerMovableobject" value
 * @method ClaimerValue         setClaimerBusiness()      Sets the current record's "ClaimerBusiness" value
 * @method ClaimerValue         setClaimerPerson()        Sets the current record's "ClaimerPerson" value
 * @method ClaimerValue         setClaimerCattle()        Sets the current record's "ClaimerCattle" value
 * @method ClaimerValue         setClaimerHarvest()       Sets the current record's "ClaimerHarvest" value
 * @method ClaimerValue         setClaimerOtherloss()     Sets the current record's "ClaimerOtherloss" value
 * 
 * @package    claimer
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseClaimerValue extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('claimer_value');
        $this->hasColumn('currency_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('value', 'decimal', 18, array(
             'type' => 'decimal',
             'scale' => 3,
             'length' => 18,
             ));


        $this->index('value', array(
             'fields' => 'value',
             ));
        $this->option('collate', 'utf8_unicode_ci');
        $this->option('charset', 'utf8');
        $this->option('type', 'INNODB');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('ClaimerCurrency as Currency', array(
             'local' => 'currency_id',
             'foreign' => 'id',
             'onDelete' => 'RESTRICT'));

        $this->hasOne('ClaimerDamage', array(
             'local' => 'id',
             'foreign' => 'value_id'));

        $this->hasOne('ClaimerRealestate', array(
             'local' => 'id',
             'foreign' => 'realestate_value_before_id'));

        $this->hasOne('ClaimerMovableobject', array(
             'local' => 'id',
             'foreign' => 'movableobject_value_before_id'));

        $this->hasOne('ClaimerBusiness', array(
             'local' => 'id',
             'foreign' => 'business_value_before_turnover_id'));

        $this->hasOne('ClaimerPerson', array(
             'local' => 'id',
             'foreign' => 'person_value_med_id'));

        $this->hasOne('ClaimerCattle', array(
             'local' => 'id',
             'foreign' => 'cattle_first_value_id'));

        $this->hasOne('ClaimerHarvest', array(
             'local' => 'id',
             'foreign' => 'harvest_value_before_id'));

        $this->hasOne('ClaimerOtherloss', array(
             'local' => 'id',
             'foreign' => 'otherloss_value_between_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}