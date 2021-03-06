<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('SfGuardUserInformation', 'doctrine');

/**
 * BaseSfGuardUserInformation
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $user_id
 * @property integer $id_institution
 * @property integer $id_country
 * @property string $city
 * @property string $state
 * @property string $address
 * @property string $telephone
 * @property string $motivation
 * @property timestamp $created_at
 * @property timestamp $updated_at
 * @property string $key
 * @property integer $visits
 * @property sfGuardUser $sfGuardUser
 * 
 * @method integer                getId()             Returns the current record's "id" value
 * @method integer                getUserId()         Returns the current record's "user_id" value
 * @method integer                getIdInstitution()  Returns the current record's "id_institution" value
 * @method integer                getIdCountry()      Returns the current record's "id_country" value
 * @method string                 getCity()           Returns the current record's "city" value
 * @method string                 getState()          Returns the current record's "state" value
 * @method string                 getAddress()        Returns the current record's "address" value
 * @method string                 getTelephone()      Returns the current record's "telephone" value
 * @method string                 getMotivation()     Returns the current record's "motivation" value
 * @method timestamp              getCreatedAt()      Returns the current record's "created_at" value
 * @method timestamp              getUpdatedAt()      Returns the current record's "updated_at" value
 * @method string                 getKey()            Returns the current record's "key" value
 * @method integer                getVisits()         Returns the current record's "visits" value
 * @method sfGuardUser            getSfGuardUser()    Returns the current record's "sfGuardUser" value
 * @method SfGuardUserInformation setId()             Sets the current record's "id" value
 * @method SfGuardUserInformation setUserId()         Sets the current record's "user_id" value
 * @method SfGuardUserInformation setIdInstitution()  Sets the current record's "id_institution" value
 * @method SfGuardUserInformation setIdCountry()      Sets the current record's "id_country" value
 * @method SfGuardUserInformation setCity()           Sets the current record's "city" value
 * @method SfGuardUserInformation setState()          Sets the current record's "state" value
 * @method SfGuardUserInformation setAddress()        Sets the current record's "address" value
 * @method SfGuardUserInformation setTelephone()      Sets the current record's "telephone" value
 * @method SfGuardUserInformation setMotivation()     Sets the current record's "motivation" value
 * @method SfGuardUserInformation setCreatedAt()      Sets the current record's "created_at" value
 * @method SfGuardUserInformation setUpdatedAt()      Sets the current record's "updated_at" value
 * @method SfGuardUserInformation setKey()            Sets the current record's "key" value
 * @method SfGuardUserInformation setVisits()         Sets the current record's "visits" value
 * @method SfGuardUserInformation setSfGuardUser()    Sets the current record's "sfGuardUser" value
 * 
 * @package    AgTrials
 * @subpackage model
 * @author     Herlin R. Espinosa G. - herlin25@gmail.com - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseSfGuardUserInformation extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('sf_guard_user_information');
        $this->hasColumn('id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'sequence' => 'sf_guard_user_information_id',
             'length' => 8,
             ));
        $this->hasColumn('user_id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => true,
             'primary' => false,
             'length' => 8,
             ));
        $this->hasColumn('id_institution', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => 8,
             ));
        $this->hasColumn('id_country', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => 8,
             ));
        $this->hasColumn('city', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => '',
             ));
        $this->hasColumn('state', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => '',
             ));
        $this->hasColumn('address', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => '',
             ));
        $this->hasColumn('telephone', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => '',
             ));
        $this->hasColumn('motivation', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => '',
             ));
        $this->hasColumn('created_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => 25,
             ));
        $this->hasColumn('updated_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => 25,
             ));
        $this->hasColumn('key', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => '',
             ));
        $this->hasColumn('visits', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'default' => '0',
             'primary' => false,
             'length' => 8,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser', array(
             'local' => 'user_id',
             'foreign' => 'id'));
    }
}