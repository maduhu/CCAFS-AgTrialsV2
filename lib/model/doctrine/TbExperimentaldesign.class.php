<?php

/**
 * TbExperimentaldesign
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    AgTrials
 * @subpackage model
 * @author     Herlin R. Espinosa G. - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class TbExperimentaldesign extends BaseTbExperimentaldesign {

    //INICIO FUNCION PARA GRABAR O ACTUALIZAR
    public function save(Doctrine_Connection $conn = null) {

        //REGISTRO DE USUARIO DE CREACION O ACTUALIZACION
        $id_user = sfContext::getInstance()->getUser()->getAttribute('user_id', '', 'sfGuardSecurityUser');
        $NowDate = date("Y-m-d") . " " . date("H:i:s");
        if ($this->isNew()) {
            $this->setIdUser($id_user);
            $this->setCreatedAt($NowDate);
        } else {
            $this->setIdUserUpdate($id_user);
            $this->setUpdatedAt($NowDate);
        }
        return parent::save($conn);
    }

}
