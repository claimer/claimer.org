<?php

/**
 * BaseClaimerRate
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $currency_from_id
 * @property integer $currency_to_id
 * @property decimal $rate
 * @property ClaimerCurrency $CurrencyFrom
 * @property ClaimerCurrency $CurrencyTo
 * 
 * @method integer         getCurrencyFromId()   Returns the current record's "currency_from_id" value
 * @method integer         getCurrencyToId()     Returns the current record's "currency_to_id" value
 * @method decimal         getRate()             Returns the current record's "rate" value
 * @method ClaimerCurrency getCurrencyFrom()     Returns the current record's "CurrencyFrom" value
 * @method ClaimerCurrency getCurrencyTo()       Returns the current record's "CurrencyTo" value
 * @method ClaimerRate     setCurrencyFromId()   Sets the current record's "currency_from_id" value
 * @method ClaimerRate     setCurrencyToId()     Sets the current record's "currency_to_id" value
 * @method ClaimerRate     setRate()             Sets the current record's "rate" value
 * @method ClaimerRate     setCurrencyFrom()     Sets the current record's "CurrencyFrom" value
 * @method ClaimerRate     setCurrencyTo()       Sets the current record's "CurrencyTo" value
 * 
 * @package    claimer
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseClaimerRate extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('claimer_rate');
        $this->hasColumn('currency_from_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('currency_to_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('rate', 'decimal', 18, array(
             'type' => 'decimal',
             'scale' => 3,
             'length' => 18,
             ));


        $this->index('rate', array(
             'fields' => 'rate',
             ));
        $this->option('collate', 'utf8_unicode_ci');
        $this->option('charset', 'utf8');
        $this->option('type', 'INNODB');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('ClaimerCurrency as CurrencyFrom', array(
             'local' => 'currency_from_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('ClaimerCurrency as CurrencyTo', array(
             'local' => 'currency_to_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}