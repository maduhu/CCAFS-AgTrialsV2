<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('TbTrialinfo', 'doctrine');

/**
 * BaseTbTrialinfo
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_trialinfo
 * @property integer $id_trial
 * @property integer $trnfnumberofreplicates
 * @property integer $id_experimentaldesign
 * @property integer $trnftreatmentnumber
 * @property string $trnftreatmentnameandcode
 * @property date $trnfplantingsowingstartdate
 * @property date $trnfplantingsowingenddate
 * @property date $trnfphysiologicalmaturitystardate
 * @property date $trnfphysiologicalmaturityenddate
 * @property date $trnfharveststartdate
 * @property date $trnfharvestenddate
 * @property integer $id_crop
 * @property string $trnfdatafile
 * @property string $trnfdataorresultsfile
 * @property string $trnfsuppplementalinformationfile
 * @property string $trnfweatherdatafile
 * @property string $trnfsoildatafile
 * @property timestamp $created_at
 * @property timestamp $updated_at
 * @property integer $id_user
 * @property integer $id_user_update
 * @property TbCrop $TbCrop
 * @property TbExperimentaldesign $TbExperimentaldesign
 * @property TbTrial $TbTrial
 * @property Doctrine_Collection $TbTrialinfodata
 * 
 * @method integer              getIdTrialinfo()                       Returns the current record's "id_trialinfo" value
 * @method integer              getIdTrial()                           Returns the current record's "id_trial" value
 * @method integer              getTrnfnumberofreplicates()            Returns the current record's "trnfnumberofreplicates" value
 * @method integer              getIdExperimentaldesign()              Returns the current record's "id_experimentaldesign" value
 * @method integer              getTrnftreatmentnumber()               Returns the current record's "trnftreatmentnumber" value
 * @method string               getTrnftreatmentnameandcode()          Returns the current record's "trnftreatmentnameandcode" value
 * @method date                 getTrnfplantingsowingstartdate()       Returns the current record's "trnfplantingsowingstartdate" value
 * @method date                 getTrnfplantingsowingenddate()         Returns the current record's "trnfplantingsowingenddate" value
 * @method date                 getTrnfphysiologicalmaturitystardate() Returns the current record's "trnfphysiologicalmaturitystardate" value
 * @method date                 getTrnfphysiologicalmaturityenddate()  Returns the current record's "trnfphysiologicalmaturityenddate" value
 * @method date                 getTrnfharveststartdate()              Returns the current record's "trnfharveststartdate" value
 * @method date                 getTrnfharvestenddate()                Returns the current record's "trnfharvestenddate" value
 * @method integer              getIdCrop()                            Returns the current record's "id_crop" value
 * @method string               getTrnfdatafile()                      Returns the current record's "trnfdatafile" value
 * @method string               getTrnfdataorresultsfile()             Returns the current record's "trnfdataorresultsfile" value
 * @method string               getTrnfsuppplementalinformationfile()  Returns the current record's "trnfsuppplementalinformationfile" value
 * @method string               getTrnfweatherdatafile()               Returns the current record's "trnfweatherdatafile" value
 * @method string               getTrnfsoildatafile()                  Returns the current record's "trnfsoildatafile" value
 * @method timestamp            getCreatedAt()                         Returns the current record's "created_at" value
 * @method timestamp            getUpdatedAt()                         Returns the current record's "updated_at" value
 * @method integer              getIdUser()                            Returns the current record's "id_user" value
 * @method integer              getIdUserUpdate()                      Returns the current record's "id_user_update" value
 * @method TbCrop               getTbCrop()                            Returns the current record's "TbCrop" value
 * @method TbExperimentaldesign getTbExperimentaldesign()              Returns the current record's "TbExperimentaldesign" value
 * @method TbTrial              getTbTrial()                           Returns the current record's "TbTrial" value
 * @method Doctrine_Collection  getTbTrialinfodata()                   Returns the current record's "TbTrialinfodata" collection
 * @method TbTrialinfo          setIdTrialinfo()                       Sets the current record's "id_trialinfo" value
 * @method TbTrialinfo          setIdTrial()                           Sets the current record's "id_trial" value
 * @method TbTrialinfo          setTrnfnumberofreplicates()            Sets the current record's "trnfnumberofreplicates" value
 * @method TbTrialinfo          setIdExperimentaldesign()              Sets the current record's "id_experimentaldesign" value
 * @method TbTrialinfo          setTrnftreatmentnumber()               Sets the current record's "trnftreatmentnumber" value
 * @method TbTrialinfo          setTrnftreatmentnameandcode()          Sets the current record's "trnftreatmentnameandcode" value
 * @method TbTrialinfo          setTrnfplantingsowingstartdate()       Sets the current record's "trnfplantingsowingstartdate" value
 * @method TbTrialinfo          setTrnfplantingsowingenddate()         Sets the current record's "trnfplantingsowingenddate" value
 * @method TbTrialinfo          setTrnfphysiologicalmaturitystardate() Sets the current record's "trnfphysiologicalmaturitystardate" value
 * @method TbTrialinfo          setTrnfphysiologicalmaturityenddate()  Sets the current record's "trnfphysiologicalmaturityenddate" value
 * @method TbTrialinfo          setTrnfharveststartdate()              Sets the current record's "trnfharveststartdate" value
 * @method TbTrialinfo          setTrnfharvestenddate()                Sets the current record's "trnfharvestenddate" value
 * @method TbTrialinfo          setIdCrop()                            Sets the current record's "id_crop" value
 * @method TbTrialinfo          setTrnfdatafile()                      Sets the current record's "trnfdatafile" value
 * @method TbTrialinfo          setTrnfdataorresultsfile()             Sets the current record's "trnfdataorresultsfile" value
 * @method TbTrialinfo          setTrnfsuppplementalinformationfile()  Sets the current record's "trnfsuppplementalinformationfile" value
 * @method TbTrialinfo          setTrnfweatherdatafile()               Sets the current record's "trnfweatherdatafile" value
 * @method TbTrialinfo          setTrnfsoildatafile()                  Sets the current record's "trnfsoildatafile" value
 * @method TbTrialinfo          setCreatedAt()                         Sets the current record's "created_at" value
 * @method TbTrialinfo          setUpdatedAt()                         Sets the current record's "updated_at" value
 * @method TbTrialinfo          setIdUser()                            Sets the current record's "id_user" value
 * @method TbTrialinfo          setIdUserUpdate()                      Sets the current record's "id_user_update" value
 * @method TbTrialinfo          setTbCrop()                            Sets the current record's "TbCrop" value
 * @method TbTrialinfo          setTbExperimentaldesign()              Sets the current record's "TbExperimentaldesign" value
 * @method TbTrialinfo          setTbTrial()                           Sets the current record's "TbTrial" value
 * @method TbTrialinfo          setTbTrialinfodata()                   Sets the current record's "TbTrialinfodata" collection
 * 
 * @package    AgTrials
 * @subpackage model
 * @author     Herlin R. Espinosa G. - herlin25@gmail.com - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTbTrialinfo extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('tb_trialinfo');
        $this->hasColumn('id_trialinfo', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'sequence' => 'tb_trialinfo_id_trialinfo',
             'length' => 8,
             ));
        $this->hasColumn('id_trial', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => 8,
             ));
        $this->hasColumn('trnfnumberofreplicates', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => 8,
             ));
        $this->hasColumn('id_experimentaldesign', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => 8,
             ));
        $this->hasColumn('trnftreatmentnumber', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => 8,
             ));
        $this->hasColumn('trnftreatmentnameandcode', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => '',
             ));
        $this->hasColumn('trnfplantingsowingstartdate', 'date', 25, array(
             'type' => 'date',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => 25,
             ));
        $this->hasColumn('trnfplantingsowingenddate', 'date', 25, array(
             'type' => 'date',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => 25,
             ));
        $this->hasColumn('trnfphysiologicalmaturitystardate', 'date', 25, array(
             'type' => 'date',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => 25,
             ));
        $this->hasColumn('trnfphysiologicalmaturityenddate', 'date', 25, array(
             'type' => 'date',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => 25,
             ));
        $this->hasColumn('trnfharveststartdate', 'date', 25, array(
             'type' => 'date',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => 25,
             ));
        $this->hasColumn('trnfharvestenddate', 'date', 25, array(
             'type' => 'date',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => 25,
             ));
        $this->hasColumn('id_crop', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => 8,
             ));
        $this->hasColumn('trnfdatafile', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => '',
             ));
        $this->hasColumn('trnfdataorresultsfile', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => '',
             ));
        $this->hasColumn('trnfsuppplementalinformationfile', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => '',
             ));
        $this->hasColumn('trnfweatherdatafile', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => '',
             ));
        $this->hasColumn('trnfsoildatafile', 'string', null, array(
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
        $this->hasColumn('id_user', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => 8,
             ));
        $this->hasColumn('id_user_update', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => 8,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('TbCrop', array(
             'local' => 'id_crop',
             'foreign' => 'id_crop'));

        $this->hasOne('TbExperimentaldesign', array(
             'local' => 'id_experimentaldesign',
             'foreign' => 'id_experimentaldesign'));

        $this->hasOne('TbTrial', array(
             'local' => 'id_trial',
             'foreign' => 'id_trial'));

        $this->hasMany('TbTrialinfodata', array(
             'local' => 'id_trialinfo',
             'foreign' => 'id_trialinfo'));
    }
}