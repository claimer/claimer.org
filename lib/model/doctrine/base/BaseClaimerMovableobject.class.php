<?php

/**
 * BaseClaimerMovableobject
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $damage_id
 * @property string $movableobject_kind
 * @property integer $movableobject_value_before_id
 * @property integer $movableobject_value_after_id
 * @property ClaimerDamage $Damage
 * @property ClaimerValue $ValueBefore
 * @property ClaimerValue $ValueAfter
 * 
 * @method integer              getDamageId()                      Returns the current record's "damage_id" value
 * @method string               getMovableobjectKind()             Returns the current record's "movableobject_kind" value
 * @method integer              getMovableobjectValueBeforeId()    Returns the current record's "movableobject_value_before_id" value
 * @method integer              getMovableobjectValueAfterId()     Returns the current record's "movableobject_value_after_id" value
 * @method ClaimerDamage        getDamage()                        Returns the current record's "Damage" value
 * @method ClaimerValue         getValueBefore()                   Returns the current record's "ValueBefore" value
 * @method ClaimerValue         getValueAfter()                    Returns the current record's "ValueAfter" value
 * @method ClaimerMovableobject setDamageId()                      Sets the current record's "damage_id" value
 * @method ClaimerMovableobject setMovableobjectKind()             Sets the current record's "movableobject_kind" value
 * @method ClaimerMovableobject setMovableobjectValueBeforeId()    Sets the current record's "movableobject_value_before_id" value
 * @method ClaimerMovableobject setMovableobjectValueAfterId()     Sets the current record's "movableobject_value_after_id" value
 * @method ClaimerMovableobject setDamage()                        Sets the current record's "Damage" value
 * @method ClaimerMovableobject setValueBefore()                   Sets the current record's "ValueBefore" value
 * @method ClaimerMovableobject setValueAfter()                    Sets the current record's "ValueAfter" value
 * 
 * @package    claimer
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseClaimerMovableobject extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('claimer_movableobject');
        $this->hasColumn('damage_id', 'integer', null, array(
             'type' => 'integer',
             'unique' => true,
             'notnull' => true,
             ));
        $this->hasColumn('movableobject_kind', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('movableobject_value_before_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('movableobject_value_after_id', 'integer', null, array(
             'type' => 'integer',
             ));

        $this->option('collate', 'utf8_unicode_ci');
        $this->option('charset', 'utf8');
        $this->option('type', 'INNODB');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('ClaimerDamage as Damage', array(
             'local' => 'damage_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('ClaimerValue as ValueBefore', array(
             'local' => 'movableobject_value_before_id',
             'foreign' => 'id',
             'onDelete' => 'RESTRICT',
             'cascade' => array(
             0 => 'delete',
             )));

        $this->hasOne('ClaimerValue as ValueAfter', array(
             'local' => 'movableobject_value_after_id',
             'foreign' => 'id',
             'onDelete' => 'RESTRICT',
             'cascade' => array(
             0 => 'delete',
             )));
    }
}