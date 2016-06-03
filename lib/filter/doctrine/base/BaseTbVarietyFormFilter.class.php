<?php

/**
 * TbVariety filter form base class.
 *
 * @package    AgTrials
 * @subpackage filter
 * @author     Herlin R. Espinosa G. - herlin25@gmail.com - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTbVarietyFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_crop'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TbCrop'), 'add_empty' => true)),
      'vrtorigin'      => new sfWidgetFormFilterInput(),
      'vrtname'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'vrtsynonymous'  => new sfWidgetFormFilterInput(),
      'vrtdescription' => new sfWidgetFormFilterInput(),
      'id_genebank'    => new sfWidgetFormFilterInput(),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'id_user'        => new sfWidgetFormFilterInput(),
      'id_user_update' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id_crop'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TbCrop'), 'column' => 'id_crop')),
      'vrtorigin'      => new sfValidatorPass(array('required' => false)),
      'vrtname'        => new sfValidatorPass(array('required' => false)),
      'vrtsynonymous'  => new sfValidatorPass(array('required' => false)),
      'vrtdescription' => new sfValidatorPass(array('required' => false)),
      'id_genebank'    => new sfValidatorPass(array('required' => false)),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'id_user'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'id_user_update' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('tb_variety_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TbVariety';
  }

  public function getFields()
  {
    return array(
      'id_variety'     => 'Number',
      'id_crop'        => 'ForeignKey',
      'vrtorigin'      => 'Text',
      'vrtname'        => 'Text',
      'vrtsynonymous'  => 'Text',
      'vrtdescription' => 'Text',
      'id_genebank'    => 'Text',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
      'id_user'        => 'Number',
      'id_user_update' => 'Number',
    );
  }
}
