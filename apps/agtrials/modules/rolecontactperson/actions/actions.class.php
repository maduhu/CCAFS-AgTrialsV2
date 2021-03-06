<?php

/*
 *  This file is part of AgTrials
 *
 *  AgTrials is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  at your option) any later version.
 *
 *  AgTrials is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with DMSP.  If not, see <http://www.gnu.org/licenses/>.
 *
 * Copyright 2012 (C) Climate Change, Agriculture and Food Security (CCAFS)
 * 
 * Created on : OCT - 2014
 * @author    :  Herlin R. Espinosa G. - herlin25@gmail.com
 * @version   :  ~
 */

require_once dirname(__FILE__) . '/../lib/rolecontactpersonGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/rolecontactpersonGeneratorHelper.class.php';
require_once '../lib/functions/function.php';

/**
 * rolecontactperson actions.
 *
 * @package    AgTrials
 * @subpackage rolecontactperson
 * @author     Herlin R. Espinosa G. - herlin25@gmail.com - CIAT-CCAFS-DAPA
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class rolecontactpersonActions extends autoRolecontactpersonActions {

    public function executeDelete(sfWebRequest $request) {

        //VERIFICAMOS LOS PERMISOS DE MODIFICACION
        $id_user = $this->getUser()->getGuardUser()->getId();
        $id_rolecontactperson = $request->getParameter("id_rolecontactperson");
        $Query00 = Doctrine::getTable('TbRolecontactperson')->findOneByIdRolecontactperson($id_rolecontactperson);
        $id_user_registro = $Query00->getIdUser();

        //VERIFICA SI ES EL USUARIO CREADOR Ó TIENE PERMISOS DE ADMIN(1)
        if (!($id_user == $id_user_registro || (CheckUserPermission($id_user, "1")))) {
            $this->getUser()->setAttribute('Notice', "<b>Error: </b>Not have permission to Delete!");
            $this->redirect('@tb_rolecontactperson');
        } else {
            $request->checkCSRFProtection();
            $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));
            if ($this->getRoute()->getObject()->delete()) {
                $this->getUser()->setFlash('notice', 'The item was deleted successfully.');
            }
            $this->redirect('@tb_rolecontactperson');
        }
    }

    public function executeEdit(sfWebRequest $request) {
        $this->rolecontactperson = $this->getRoute()->getObject();
        $this->form = $this->configuration->getForm($this->rolecontactperson);

        //VERIFICAMOS LOS PERMISOS DE MODIFICACION
        $id_user = $this->getUser()->getGuardUser()->getId();
        $id_rolecontactperson = $request->getParameter("id_rolecontactperson");
        $Query00 = Doctrine::getTable('TbRolecontactperson')->findOneByIdRolecontactperson($id_rolecontactperson);
        $id_user_registro = $Query00->getIdUser();

        //VERIFICA SI ES EL USUARIO CREADOR Ó TIENE PERMISOS DE ADMIN(1)
        if (!($id_user == $id_user_registro || (CheckUserPermission($id_user, "1")))) {
            $this->getUser()->setAttribute('Notice', "<b>Error: </b>Not have permission to Edit!");
            $this->redirect('@tb_rolecontactperson');
        }
    }

}
