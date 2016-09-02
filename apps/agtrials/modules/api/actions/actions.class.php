<?php

include("../lib/functions/function.php");

/**
 * api actions.
 *
 * @package    trialsites
 * @subpackage api
 * @author     Herlin R. Espinosa G. - CIAT-DAPA
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class apiActions extends sfActions {

    public function executeIndex(sfWebRequest $request) {
        
    }

    public function executeApitrials(sfWebRequest $request) {
        $key = $request->getParameter('key');
        $trial = $request->getParameter('trial');
        $trialgroup = $request->getParameter('trialgroup');
        $contactperson = $request->getParameter('contactperson');
        $country = $request->getParameter('country');
        $trialsite = $request->getParameter('trialsite');
        $technology = $request->getParameter('technology');
        $latitude = $request->getParameter('latitude');
        $longitude = $request->getParameter('longitude');
        $varieties = $request->getParameter('varieties');
        $variablesmeasureds = $request->getParameter('variablesmeasureds');
        $latest = $request->getParameter('latest');
        $dates = $request->getParameter('dates');
        $PartDates = explode("|", $dates);
        $date1 = $PartDates[0];
        $date2 = $PartDates[1];

        if (!CheckAPI($key)) {
            die("*** Error Key ***");
        } else {
            $Limit = "";
            $Where = "";
            if ($latest != '')
                $Limit = "LIMIT $latest ";
            if (($date1 != '') && ($date2 != ''))
                $Where .= "AND T.created_at BETWEEN '$date1' AND '$date2' ";
            if ($trial != '')
                $Where .= "AND T.id_trial IN ($trial) ";
            if ($trialgroup != '')
                $Where .= "AND TG.id_trialgroup IN ($trialgroup) ";
            if ($contactperson != '')
                $Where .= "AND CP.id_contactperson IN ($contactperson) ";
            if ($country != '')
                $Where .= "AND CN.id_country IN ($country) ";
            if ($trialsite != '')
                $Where .= "AND TS.id_trialsite IN ($trialsite) ";
            if ($technology != '')
                $Where .= "AND C.id_crop IN ($technology) ";
            if ($latitude != '') {
                $ArrLatitude = explode("|", $latitude);
                if (is_numeric($ArrLatitude[0]))
                    $latitude1 = $ArrLatitude[0];
                if (is_numeric($ArrLatitude[1]))
                    $latitude2 = $ArrLatitude[1];
                if (($latitude1 != '') && ($latitude2 != ''))
                    $Where .= "AND TS.trstlatitudedecimal BETWEEN '$latitude1' AND '$latitude2' ";
            }
            if ($longitude != '') {
                $ArrLongitude = explode("|", $longitude);
                if (is_numeric($ArrLongitude[0]))
                    $longitude1 = $ArrLongitude[0];
                if (is_numeric($ArrLongitude[1]))
                    $longitude2 = $ArrLongitude[1];
                if (($longitude1 != '') && ($longitude2 != ''))
                    $Where .= "AND TS.trstlongitudedecimal BETWEEN '$longitude1' AND '$longitude2' ";
            }
            if ($varieties != '')
                $Where .= "AND TV.id_variety IN ($varieties) ";
            if ($variablesmeasureds != '')
                $Where .= "AND TVM.id_variablesmeasured IN ($variablesmeasureds) ";

            if ($Where != '' || $Limit != '') {
                $connection = Doctrine_Manager::getInstance()->connection();
                $QUERY00 = "SELECT T.id_trial AS id,TG.trgrname AS trialgroup,(CP.cnprfirstname||' '||CP.cnprlastname) AS contactperson,CN.cntname AS country,TS.trstname AS trialsite,TS.trstlatitudedecimal AS latitude,TS.trstlongitudedecimal AS longitude,C.crpname AS crop, ";
                $QUERY00 .= "T.trlname AS trialname,fc_listtrialvariety(T.id_trial) AS varieties,fc_listtrialvariablesmeasured(T.id_trial) AS variablesmeasured,T.trlsowdate AS sowdate,T.trlharvestdate AS harvestdate,T.trltrialtype AS trialtype,T.trlirrigation AS irrigation,T.created_at AS recorddate,'http://www.agtrials.org/tbtrial/'||T.id_trial AS url ";
                $QUERY00 .= "FROM tb_trial T ";
                $QUERY00 .= "INNER JOIN tb_trialgroup TG ON T.id_trialgroup = TG.id_trialgroup ";
                $QUERY00 .= "INNER JOIN tb_contactperson CP ON T.id_contactperson = CP.id_contactperson ";
                $QUERY00 .= "INNER JOIN tb_country CN ON T.id_country = CN.id_country ";
                $QUERY00 .= "INNER JOIN tb_trialsite TS ON T.id_trialsite = TS.id_trialsite ";
                $QUERY00 .= "INNER JOIN tb_crop C ON T.id_crop = C.id_crop ";
                if ($variablesmeasureds != '')
                    $QUERY00 .= "LEFT JOIN tb_trialvariablesmeasured TVM ON T.id_trial = TVM.id_trial ";
                if ($varieties != '')
                    $QUERY00 .= "LEFT JOIN tb_trialvariety TV ON T.id_trial = TV.id_trial ";
                $QUERY00 .= "WHERE true $Where";
                $QUERY00 .= "ORDER BY T.id_trial $Limit";
                $st = $connection->execute($QUERY00);
                $Result = $st->fetchAll(PDO::FETCH_ASSOC);
                $JSON = json_encode($Result);
                header('Content-type: text/json');
                header('Content-type: application/json');
                die($JSON);
            } else {
                die("*** Error Options ***");
            }
        }
    }

    public function executeApiproject(sfWebRequest $request) {
        $key = $request->getParameter('key');
        if (!CheckAPI($key)) {
            die("*** Error Key ***");
        } else {
            $connection = Doctrine_Manager::getInstance()->connection();

            $QUERY00 = "SELECT  P.id_project AS id,P.prjname AS name,fc_completename(CP.cnprfirstname, CP.cnprmiddlename, CP.cnprlastname) AS leadofproject,INS.insname AS institution,DN.dnrname AS donor,P.prjabstract AS abstract,P.prjkeywords AS keywords ";
            $QUERY00 .= "FROM tb_project  P ";
            $QUERY00 .= "INNER JOIN tb_trial T ON  P. id_project = T. id_project ";
            $QUERY00 .= "INNER JOIN tb_contactperson CP ON P.id_leadofproject = CP.id_contactperson ";
            $QUERY00 .= "INNER JOIN tb_institution INS ON P.id_projectimplementinginstitutions = INS.id_institution ";
            $QUERY00 .= "LEFT JOIN tb_donor DN ON P.id_donor = DN.id_donor ";
            $QUERY00 .= "GROUP BY P.id_project,P.prjname,CP.cnprfirstname,CP.cnprmiddlename,CP.cnprlastname,INS.insname,DN.dnrname,P.prjabstract,P.prjkeywords ";
            $QUERY00 .= "ORDER BY P.prjname ";

            $st = $connection->execute($QUERY00);
            $Result = $st->fetchAll(PDO::FETCH_ASSOC);
            $JSON = json_encode($Result);
            header('Content-type: text/json');
            header('Content-type: application/json');
            die($JSON);
        }
    }

    public function executeApicontactperson(sfWebRequest $request) {
        $key = $request->getParameter('key');
        if (!CheckAPI($key)) {
            die("*** Error Key ***");
        } else {
            $connection = Doctrine_Manager::getInstance()->connection();
            $QUERY00 = "SELECT CP.id_contactperson AS id,CP.cnprfirstname AS firstname,CP.cnprmiddlename AS middlename,CP.cnprlastname AS lastname,INS.insname AS institution ";
            $QUERY00 .= "FROM tb_contactperson CP ";
            $QUERY00 .= "INNER JOIN tb_institution INS ON CP.id_institution = INS.id_institution ";
            $QUERY00 .= "INNER JOIN tb_trial T ON CP.id_contactperson = T.id_contactperson ";
            $QUERY00 .= "GROUP BY CP.id_contactperson,CP.cnprfirstname,CP.cnprmiddlename,CP.cnprlastname,INS.insname ";
            $QUERY00 .= "ORDER BY CP.cnprfirstname,CP.cnprmiddlename,CP.cnprlastname,INS.insname ";

            $st = $connection->execute($QUERY00);
            $Result = $st->fetchAll(PDO::FETCH_ASSOC);
            $JSON = json_encode($Result);
            header('Content-type: text/json');
            header('Content-type: application/json');
            die($JSON);
        }
    }

    public function executeApicountry(sfWebRequest $request) {
        $key = $request->getParameter('key');
        if (!CheckAPI($key)) {
            die("*** Error Key ***");
        } else {
            $connection = Doctrine_Manager::getInstance()->connection();
            $QUERY00 = "SELECT AD.id_administrativedivision AS id,AD.dmdvname AS countryname ";
            $QUERY00 .= "FROM tb_administrativedivision AD ";
            $QUERY00 .= "INNER JOIN tb_triallocationadministrativedivision TLAD ON AD.id_administrativedivision = TLAD.id_administrativedivision ";
            $QUERY00 .= "INNER JOIN tb_triallocation TL ON TLAD.id_triallocation = TL.id_triallocation ";
            $QUERY00 .= "INNER JOIN tb_trial T ON TL.id_triallocation = T.id_triallocation ";
            $QUERY00 .= "WHERE AD.id_administrativedivisiontype = 1 ";
            $QUERY00 .= "GROUP BY AD.id_administrativedivision,AD.dmdvname ";
            $QUERY00 .= "ORDER BY AD.dmdvname ";

            $st = $connection->execute($QUERY00);
            $Result = $st->fetchAll(PDO::FETCH_ASSOC);
            $JSON = json_encode($Result);
            header('Content-type: text/json');
            header('Content-type: application/json');
            die($JSON);
        }
    }

    public function executeApitriallocation(sfWebRequest $request) {
        $key = $request->getParameter('key');
        $date = $request->getParameter('date');
        $now = date("Y-m-d");
        $Where = "";
        if (!CheckAPI($key)) {
            die("*** Error Key ***");
        } else {

            if ($date != '')
                $Where .= "AND TL.created_at BETWEEN '$date' AND '$now' ";

            $connection = Doctrine_Manager::getInstance()->connection();
            $QUERY00 = "SELECT  TL.id_triallocation AS id,TL.trlcname AS name,TL.trlclatitude AS latitude,TL.trlclongitude AS longitude,TL.trlcaltitude AS altitude,fc_triallocationadministrativedivisionname(TL.id_triallocation, 1) AS country,fc_triallocationadministrativedivisionname(TL.id_triallocation, 2) AS districtsatate,fc_triallocationadministrativedivisionname(TL.id_triallocation, 3) AS subdistrictsatate,fc_triallocationadministrativedivisionname(TL.id_triallocation, 4) AS village ";
            $QUERY00 .= "FROM tb_triallocation  TL ";
            $QUERY00 .= "INNER JOIN tb_trial T ON  TL. id_triallocation = T. id_triallocation ";
            $QUERY00 .= "WHERE true $Where ";
            $QUERY00 .= "GROUP BY TL.id_triallocation,TL.trlcname,TL.trlclatitude,TL.trlclongitude,TL.trlcaltitude ";
            $QUERY00 .= "ORDER BY TL.trlcname ";

            $st = $connection->execute($QUERY00);
            $Result = $st->fetchAll(PDO::FETCH_ASSOC);
            $JSON = json_encode($Result);
            header('Content-type: text/json');
            header('Content-type: application/json');
            die($JSON);
        }
    }

    public function executeApitechnology(sfWebRequest $request) {
        $key = $request->getParameter('key');
        if (!CheckAPI($key)) {
            die("*** Error Key ***");
        } else {
            $connection = Doctrine_Manager::getInstance()->connection();
            $QUERY00 = "SELECT CRP.id_crop AS id,CRP.crpname AS technologyname,CRP.crpscientificname AS scientificname ";
            $QUERY00 .= "FROM tb_crop CRP ";
            $QUERY00 .= "INNER JOIN tb_trialinfo T ON CRP.id_crop = T.id_crop ";
            $QUERY00 .= "GROUP BY CRP.id_crop,CRP.crpname,CRP.crpscientificname ";
            $QUERY00 .= "ORDER BY CRP.crpname ";
            $st = $connection->execute($QUERY00);
            $Result = $st->fetchAll(PDO::FETCH_ASSOC);
            $JSON = json_encode($Result);
            header('Content-type: text/json');
            header('Content-type: application/json');
            die($JSON);
        }
    }

    public function executeApivariety(sfWebRequest $request) {
        $key = $request->getParameter('key');
        $technology = $request->getParameter('technology');
        if (!CheckAPI($key)) {
            die("*** Error Key ***");
        } else {
            if ($technology != '') {
                $connection = Doctrine_Manager::getInstance()->connection();
                $QUERY00 = "SELECT V.id_variety AS id,C.crpname AS technology,V.vrtorigin  AS origin,V.vrtname AS varietyname,V.vrtsynonymous AS synonymous,V.vrtdescription AS description ";
                $QUERY00 .= "FROM tb_variety V ";
                $QUERY00 .= "INNER JOIN tb_trialinfodata  TID ON V.id_variety =  TID.id_variety ";
                $QUERY00 .= "INNER JOIN tb_crop C ON V.id_crop = C.id_crop ";
                $QUERY00 .= "WHERE V.id_crop IN($technology) ";
                $QUERY00 .= "GROUP BY V.id_variety,C.crpname,V.vrtorigin ,V.vrtname,V.vrtsynonymous,V.vrtdescription ";
                $QUERY00 .= "ORDER BY V.vrtname,C.crpname,V.vrtorigin  ";
                $st = $connection->execute($QUERY00);
                $Result = $st->fetchAll(PDO::FETCH_ASSOC);
                $JSON = json_encode($Result);
                header('Content-type: text/json');
                header('Content-type: application/json');
                die($JSON);
            } else {
                die("*** Error Options ***");
            }
        }
    }

    public function executeApivarietytrials(sfWebRequest $request) {
        $key = $request->getParameter('key');
        $variety = $request->getParameter('variety');
        if (!CheckAPI($key)) {
            die("*** Error Key ***");
        } else {
            if ($variety != '') {
                $connection = Doctrine_Manager::getInstance()->connection();
                $id_variety = SearchIdVariety($variety);
                $QUERY00 = "SELECT id_trial AS id_trial,fc_listtrialvariety(id_trial) AS varieties,fc_listtrialvariablesmeasured(id_trial) AS variablesmeasured ";
                $QUERY00 .= "FROM tb_trialvariety ";
                $QUERY00 .= "WHERE id_variety = $id_variety ";
                $st = $connection->execute($QUERY00);
                $Result = $st->fetchAll(PDO::FETCH_ASSOC);
                $JSON = json_encode($Result);
                header('Content-type: text/json');
                header('Content-type: application/json');
                die($JSON);
            } else {
                die("*** Error Options ***");
            }
        }
    }

    public function executeApivariablesmeasured(sfWebRequest $request) {
        $key = $request->getParameter('key');
        $technology = $request->getParameter('technology');
        if (!CheckAPI($key)) {
            die("*** Error Key ***");
        } else {
            if ($technology != '') {
                $connection = Doctrine_Manager::getInstance()->connection();

                $QUERY00 = "SELECT VM.id_variablesmeasured AS id,C.crpname AS technology,TC.trclname AS traitclass,VM.vrmsname AS variablesmeasuredname,VM.vrmsshortname AS shortname,VM.vrmsdefinition AS definition,VM.vrmsunit AS unit ";
                $QUERY00 .= "FROM tb_variablesmeasured VM ";
                $QUERY00 .= "INNER JOIN tb_trialinfodata  TID ON VM.id_variablesmeasured =  TID.id_variablesmeasured ";
                $QUERY00 .= "INNER JOIN tb_crop C ON VM.id_crop = C.id_crop ";
                $QUERY00 .= "INNER JOIN tb_traitclass TC ON VM.id_traitclass = TC.id_traitclass ";
                $QUERY00 .= "WHERE VM.id_crop IN(10) ";
                $QUERY00 .= "GROUP BY VM.id_variablesmeasured,C.crpname,TC.trclname,VM.vrmsname,VM.vrmsshortname,VM.vrmsdefinition,VM.vrmsunit ";
                $QUERY00 .= "ORDER BY VM.vrmsname,C.crpname,TC.trclname ";

                $st = $connection->execute($QUERY00);
                $Result = $st->fetchAll(PDO::FETCH_ASSOC);
                $JSON = json_encode($Result);
                header('Content-type: text/json');
                header('Content-type: application/json');
                die($JSON);
            } else {
                die("*** Error Options ***");
            }
        }
    }

    public function executeApiAgMIP(sfWebRequest $request) {
        $key = $request->getParameter('key');
        $date = $request->getParameter('date');
        $now = date("Y-m-d");
        $Where = "";
        if (!CheckAPI($key)) {
            die("*** Error Key ***");
        } else {

            if ($date != '')
                $Where .= "AND TS.created_at BETWEEN '$date' AND '$now' ";

            $connection = Doctrine_Manager::getInstance()->connection();
            $QUERY00 = "SELECT T.id_trial AS id, TG.trgrname AS suite_id, T.trlvarieties as cul_name, T.trlname as exname, T.trlsowdate as pdate, T.trlharvestdate as hdate, C.crpname as crid, ";
            $QUERY00 .= "TS.trstlatitudedecimal AS fl_lat,TS.trstlongitudedecimal as fl_long ,TS.trstaltitude as flele, I.insname as institution ";
            $QUERY00 .= "FROM tb_trial T ";
            $QUERY00 .= "INNER JOIN tb_trialgroup TG ON T.id_trialgroup = TG.id_trialgroup ";
            $QUERY00 .= "INNER JOIN tb_crop C ON T.id_crop = C.id_crop ";
            $QUERY00 .= "INNER JOIN tb_trialsite TS ON T.id_trialsite = TS.id_trialsite ";
            $QUERY00 .= "INNER JOIN tb_institution I ON TS.id_institution = I.id_institution ";
            $QUERY00 .= "WHERE true $Where ";

            $st = $connection->execute($QUERY00);
            $Result = $st->fetchAll(PDO::FETCH_ASSOC);
            $JSON = json_encode($Result);
            header('Content-type: text/json');
            header('Content-type: application/json');
            die($JSON);
        }
    }

    public function executeApimap(sfWebRequest $request) {
        $key = $request->getParameter('key');
        $limit = $request->getParameter('cant');
        $crop = $request->getParameter('crop');


        if (!CheckAPI($key)) {
            die("*** Error Key ***");
        } else {
            $connection = Doctrine_Manager::getInstance()->connection();

            $QUERY00 = "SELECT T.id_trial, TS.trstname, TS.trstlatitudedecimal AS latitude, TS.trstlongitudedecimal AS longitude, INS.insname, trlvarieties, trlname, trlvariablesmeasured, CR.crpname ";
            $QUERY00 .= "FROM tb_trial T ";
            $QUERY00 .= "INNER JOIN tb_trialsite TS ON T.id_trialsite = TS.id_trialsite ";
            $QUERY00 .= "INNER JOIN tb_institution INS ON TS.id_institution = INS.id_institution ";
            $QUERY00 .= "INNER JOIN tb_crop CR ON T.id_crop = CR.id_crop ";
            if ($crop != '')
                $QUERY00 .= "WHERE T.id_crop IN ($crop) ";
            if (is_numeric($limit))
                $QUERY00 .= "LIMIT $limit ";

            $st = $connection->execute($QUERY00);
            $Result = $st->fetchAll(PDO::FETCH_ASSOC);
            //$rows = count($Result);
            //die("rows: $rows");
            $JSON = json_encode($Result);
            $JSONApimap = "agtrialWS = " . $JSON . ";";
            header('Content-type: text/json');
            header('Content-type: application/json');
            die($JSONApimap);
        }
    }

}
