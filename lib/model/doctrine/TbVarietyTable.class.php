<?php

class TbVarietyTable extends Doctrine_Table {

    public static function getInstance() {
        return Doctrine_Core::getTable('TbVariety');
    }

    public static function retrieveForSelect($dato, $limit) {
        $dato = ucfirst(strtolower($dato));
        $consulta = Doctrine_Query::create()
                ->from('TbVariety')
                ->andWhere('vrtname like ?', '%' . $dato . '%')
                ->addOrderBy('vrtname')
                ->limit($limit);
        $valores = array();
        foreach ($consulta->execute() as $valor) {
            $valores[$valor->getIdVariety()] = (string) $valor;
        }
        return $valores;
    }

    public static function addVariety($id_crop, $vrtorigin, $vrtname, $vrtsynonymous, $vrtdescription, $id_user) {
        $id_variety = "";
        $QUERY00 = Doctrine_Query::create()
                ->from("TbVariety T")
                ->where("UPPER(T.vrtname) = UPPER('$vrtname')");
        $Resultado00 = $QUERY00->execute();
        if (count($Resultado00) < 1) {
            $Variety = new TbVariety();
            $Variety->setIdCrop($id_crop);
            $Variety->setVrtorigin($vrtorigin);
            $Variety->setVrtname($vrtname);
            $Variety->setVrtsynonymous($vrtsynonymous);
            $Variety->setVrtdescription($vrtdescription);
            $Variety->setIdUser($id_user);
            $Variety->save();
            $id_variety = $Variety->getIdVariety();
        }
        return $id_variety;
    }

}
