<?php

/**
 * TbContactperson filter form base class.
 *
 * @package    AgTrials
 * @subpackage filter
 * @author     Herlin R. Espinosa G. - herlin25@gmail.com - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTbContactpersonFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cnprfirstname'    => new sfWidgetFormFilterInput(),
      'cnprmiddlename'   => new sfWidgetFormFilterInput(),
      'cnprlastname'     => new sfWidgetFormFilterInput(),
      'id_institution'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbInstitution'), 'add_empty' => true)),
      'cnpremail'        => new sfWidgetFormFilterInput(),
      'cnprtelephone'    => new sfWidgetFormFilterInput(),
      'created_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'id_user'          => new sfWidgetFormFilterInput(),
      'id_user_update'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'cnprfirstname'    => new sfValidatorPass(array('required' => false)),
      'cnprmiddlename'   => new sfValidatorPass(array('required' => false)),
      'cnprlastname'     => new sfValidatorPass(array('required' => false)),
      'id_institution'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbInstitution'), 'column' => 'id_institution')),
      'cnpremail'        => new sfValidatorPass(array('required' => false)),
      'cnprtelephone'    => new sfValidatorPass(array('required' => false)),
      'created_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'id_user'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_user_update'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('tb_contactperson_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbContactperson';
  }

  public function getFields()
  {
    return array(
      'id_contactperson' => 'Number',
      'cnprfirstname'    => 'Text',
      'cnprmiddlename'   => 'Text',
      'cnprlastname'     => 'Text',
      'id_institution'   => 'ForeignKey',
      'cnpremail'        => 'Text',
      'cnprtelephone'    => 'Text',
      'created_at'       => 'Date',
      'updated_at'       => 'Date',
      'id_user'          => 'Number',
      'id_user_update'   => 'Number',
    );
  }
}
