<?php

/**
 * BaseClaimerDocument
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $damage_id
 * @property integer $type_id
 * @property string $filename
 * @property string $description
 * @property ClaimerDamage $Damage
 * @property ClaimerDocumentType $DocumentType
 * 
 * @method integer             getDamageId()     Returns the current record's "damage_id" value
 * @method integer             getTypeId()       Returns the current record's "type_id" value
 * @method string              getFilename()     Returns the current record's "filename" value
 * @method string              getDescription()  Returns the current record's "description" value
 * @method ClaimerDamage       getDamage()       Returns the current record's "Damage" value
 * @method ClaimerDocumentType getDocumentType() Returns the current record's "DocumentType" value
 * @method ClaimerDocument     setDamageId()     Sets the current record's "damage_id" value
 * @method ClaimerDocument     setTypeId()       Sets the current record's "type_id" value
 * @method ClaimerDocument     setFilename()     Sets the current record's "filename" value
 * @method ClaimerDocument     setDescription()  Sets the current record's "description" value
 * @method ClaimerDocument     setDamage()       Sets the current record's "Damage" value
 * @method ClaimerDocument     setDocumentType() Sets the current record's "DocumentType" value
 * 
 * @package    claimer
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseClaimerDocument extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('claimer_document');
        $this->hasColumn('damage_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('type_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('filename', 'string', 255, array(
             'type' => 'string',
             'unique' => true,
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('description', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));


        $this->index('filename', array(
             'fields' => 'filename',
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

        $this->hasOne('ClaimerDocumentType as DocumentType', array(
             'local' => 'type_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}