<?php

/**
 * BaseClaimerPersonType
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $type
 * @property string $name
 * @property Doctrine_Collection $Persons
 * 
 * @method string              getType()    Returns the current record's "type" value
 * @method string              getName()    Returns the current record's "name" value
 * @method Doctrine_Collection getPersons() Returns the current record's "Persons" collection
 * @method ClaimerPersonType   setType()    Sets the current record's "type" value
 * @method ClaimerPersonType   setName()    Sets the current record's "name" value
 * @method ClaimerPersonType   setPersons() Sets the current record's "Persons" collection
 * 
 * @package    claimer
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseClaimerPersonType extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('claimer_person_type');
        $this->hasColumn('type', 'string', 255, array(
             'type' => 'string',
             'unique' => true,
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'unique' => true,
             'notnull' => true,
             'length' => 255,
             ));

        $this->option('collate', 'utf8_unicode_ci');
        $this->option('charset', 'utf8');
        $this->option('type', 'INNODB');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('ClaimerPerson as Persons', array(
             'local' => 'id',
             'foreign' => 'person_relationship_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}