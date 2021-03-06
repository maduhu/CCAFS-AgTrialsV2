<?php
use_javascript('trial.js');
use_javascript('introJs/newTrial.js');
?> 
<?php use_helper('Thickbox') ?>
<?php
$user = sfContext::getInstance()->getUser();
$id_trial = $form->getObject()->get('id_trial');
$session_user_id = $user->getAttribute('user_id');
$session_user_name = $user->getAttribute('user_name');
$selected = "";
if (isset($session_user_id)) {
    foreach ($session_user_id as $key => $id_user) {
        $selecteduser .= '{id:' . intval($id_user) . ',title:"' . htmlspecialchars(str_replace(',', '-', $session_user_name[$key]), ENT_QUOTES, 'UTF-8') . '"},';
    }
}


$session_group_id = $user->getAttribute('group_id');
$session_group_name = $user->getAttribute('group_name');
$selected = "";
if (isset($session_group_id)) {
    foreach ($session_group_id as $key => $id_group) {
        $selectedgroup .= '{id:' . intval($id_group) . ',title:"' . htmlspecialchars(str_replace(',', '-', $session_group_name[$key]), ENT_QUOTES, 'UTF-8') . '"},';
    }
}
?>

<script>$('.mitooltip').tooltip();</script>
<link href="/autocompletemultiple/autocomplete.css" rel="stylesheet" type="text/css" />
<script src="/autocompletemultiple/lib/jquery.1.7.1.js"></script>
<script src="/autocompletemultiple/lib/jquery.ui.1.8.16.js"></script>
<script src="/autocompletemultiple/autocomplete.js" type="text/javascript"></script>
<script type="text/javascript" src="/jqueryConfirm/jquery-confirm.min.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="/jqueryConfirm/jquery-confirm.min.css" />
<script type="text/javascript" src="/jquery.qtip/jquery.qtip.min.js"></script>
<script type="text/javascript" src="/jquery.qtip/jquery.qtip.js"></script>
<script type="text/javascript" src="/js/help.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="/jquery.qtip/jquery.qtip.min.css" />


<script type="text/javascript">
    $(function () {
        $('#user_id').autocompleteusers({
            selected: [<?php if ($selecteduser) echo $selecteduser; ?>]
        });

        $('#group_id').autocompletegroups({
            selected: [<?php if ($selectedgroup) echo $selectedgroup; ?>]
        });
    });

</script>
<div class="row">
    <div class="col-md-2 left-column">
        <div class="MenuTrials">
            <div onclick="window.location.href = '/searchtrials'" class="MenuTrialsButton"> Search Trials</div>
            <div onclick="window.location.href = '/trial/new'" class="MenuTrialsButton selected"> Add new Trial
                <ul class="subMenu">
                    <li><a class="page-scroll" href="#ProjectTrialGroups">Project / Trial Groups</a></li>
                    <li><a class="page-scroll" href="#LeadofProject">Lead of Project</a></li>
                    <li><a class="page-scroll" href="#ProjectImplementingInstitutions">Project Implementing</a></li>
                    <li><a class="page-scroll" href="#FundingforProject">Funding for Project</a></li>
                    <li><a class="page-scroll" href="#ProjectInformation">Project Information</a></li>
                    <li><a class="page-scroll" href="#TrialManager">Trial Manager</a></li>
                    <li><a class="page-scroll" href="#TrialLocation">Trial Location</a></li>
                    <li><a class="page-scroll" href="#TrialCharacteristics">Trial Characteristics</a></li>
                    <li><a class="page-scroll" href="#AccesstoInformation">Access to Information</a></li>
                    <li><a class="page-scroll" href="#License">License</a></li>
                    <li><a class="page-scroll" href="#TrialCropInfo">Trial Crop Info</a></li>
                </ul>
            </div>
            <div onclick="window.location.href = '/batchuploadtrials'" class="MenuTrialsButton"> Batch Upload Trials</div>            
        </div>
    </div>
    <div class="col-md-10 sf_admin_form">
        <?php echo form_tag_for($form, '@tb_trial', array('enctype' => 'multipart/form-data', 'id' => 'FormTrial', 'name' => 'FormTrial')); ?>
        <?php echo $form->renderHiddenFields(); ?>
        <?php echo ModuleHelp('Trial'); ?>
        <div id="ProjectTrialGroups" class="label ui-helper-clearfix">
            <span class="Title">Project / Trial Groups</span>
        </div>
        <div class="Session">
            <div class="form-group control-type-text" style="margin-left: 10px;">All fields marked with <span class="Mandatory">*</span> are required.</div>
            <div id="nameofproject-block" class="form-group control-type-text">
                <table class="TableModule"> 
                    <tr>
                        <td><span class="Mandatory">*</span> 
                            Name of the Project:<?php echo FieldHelp('HelpTrial1'); ?>
                        </td>
                        <td>
                            <div>
                                <?php
                                $DisabledFieldProject = "";
                                $InfoProject = GetInfoProject($form->getObject()->get('id_project'));
                                if ($InfoProject['id_project'] != '')
                                    $DisabledFieldProject = "Disabled";
                                ?>
                                <input name="tb_trial[id_project]" id="id_project" type="hidden" value="<?php echo $InfoProject['id_project']; ?>">
                                <input class="SearchInput form-control" name="prjname" id="prjname" type="text" size="36" maxlength="255" value="<?php echo $InfoProject['prjname']; ?>">
                            </div>
                        </td>
                    </tr>
                </table>
            </div>


            <div id="projectleader-block" class="form-group control-type-text">
                <div id="LeadofProject" class="form-group control-type-text Title0">
                    <span class="Title1">Project Lead</span>
                </div>
                <hr class="LineModule">

                <table class="TableModule">
                    <tr>
                        <td style="width: 100px;">Name:<?php echo FieldHelp('HelpTrial2'); ?></td>
                        <td>&ensp;&ensp;</td>
                        <td>
                            <div class="DivName"><span class="Mandatory">*</span> First name</div>
                            <div>
                                <input name="id_leadofproject" id="id_leadofproject" type="hidden" value="<?php echo $InfoProject['id_leadofproject']; ?>">
                                <input class="SearchInput form-control" name="cnprfirstname" id="cnprfirstname" type="text" size="36" maxlength="100" value="<?php echo $InfoProject['cnprfirstname']; ?>" <?php echo $DisabledFieldProject; ?>>
                            </div>
                        </td>
                        <td>&ensp;&ensp;</td>
                        <td>
                            <div class="DivName">Middle name</div>
                            <div>
                                <input class="form-control" name="cnprmiddlename" id="cnprmiddlename" type="text" size="36" maxlength="100" value="<?php echo $InfoProject['cnprmiddlename']; ?>" <?php echo $DisabledFieldProject; ?>>
                            </div>
                        </td>
                        <td>&ensp;&ensp;</td>
                        <td>
                            <div class="DivName"><span class="Mandatory">*</span> Last name</div>
                            <div><input class="form-control" name="cnprlastname" id="cnprlastname" type="text" size="36" maxlength="100" value="<?php echo $InfoProject['cnprlastname']; ?>" <?php echo $DisabledFieldProject; ?>></div>
                        </td>
                    </tr>
                    <tr>
                        <td>Institution:<?php echo FieldHelp('HelpTrial3'); ?></td>
                        <td>&ensp;&ensp;</td>
                        <td>
                            <div class="DivName"><span class="Mandatory">*</span> Name</div>
                            <div>
                                <input name="id_institutionleadofproject" id="id_institutionleadofproject" type="hidden" value="<?php echo $InfoProject['id_institutionleadofproject']; ?>">
                                <input class="SearchInput form-control" name="insnameleadofproject" id="insnameleadofproject" type="text" size="36" maxlength="150" value="<?php echo $InfoProject['insnameleadofproject']; ?>" <?php echo $DisabledFieldProject; ?>>
                            </div>
                        </td>
                        <td>&ensp;&ensp;</td>
                        <td>
                            <div class="DivName"><span class="Mandatory">*</span> Country</div>
                            <div>
                                <input name="id_countryinstitutionleadofproject" id="id_countryinstitutionleadofproject" type="hidden" value="<?php echo $InfoProject['id_countryinstitutionleadofproject']; ?>">
                                <input class="SearchInput form-control" name="namecountryinstitutionleadofproject" id="namecountryinstitutionleadofproject" type="text" size="32" maxlength="50" value="<?php echo $InfoProject['namecountryinstitutionleadofproject']; ?>" <?php echo $DisabledFieldProject; ?>>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="Mandatory">*</span> Email:<?php echo FieldHelp('HelpTrial4'); ?></td>
                        <td>&ensp;&ensp;</td>
                        <td>
                            <div><input class="EmailInput form-control" name="cnpremail" id="cnpremail" type="text" size="36" maxlength="150" value="<?php echo $InfoProject['cnpremail']; ?>" onblur="ValidaEmail(this);" <?php echo $DisabledFieldProject; ?>></div>
                        </td>
                    </tr>
                    <tr>
                        <td> Telephone:<?php echo FieldHelp('HelpTrial5'); ?></td>
                        <td>&ensp;&ensp;</td>
                        <td>
                            <div><input class="PhoneInput form-control" name="cnprtelephone" id="cnprtelephone" type="text" size="36" maxlength="20" value="<?php echo $InfoProject['cnprtelephone']; ?>" <?php echo $DisabledFieldProject; ?>></div>
                        </td>
                    </tr>
                </table>
            </div>


            <div id="projectinstitutions-block" class="form-group control-type-text">
                <div id="ProjectImplementingInstitutions" class="form-group control-type-text Title0">
                    <span class="Title1">Project Implementing Institutions</span>
                </div>
                <hr class="LineModule">

                <table class="TableModule">
                    <tr>
                        <td> Institution:<?php echo FieldHelp('HelpTrial6'); ?></td>
                        <td>&ensp;&ensp;</td>
                        <td>
                            <div class="DivName"><span class="Mandatory">*</span> Name</div>
                            <div>
                                <input name="id_projectimplementinginstitutions" id="id_projectimplementinginstitutions" type="hidden" value="<?php echo $InfoProject['id_projectimplementinginstitutions']; ?>">
                                <input class="SearchInput form-control" name="insnameprojectimplementinginstitutions" id="insnameprojectimplementinginstitutions" type="text" size="36" maxlength="150" value="<?php echo $InfoProject['insnameprojectimplementinginstitutions']; ?>" <?php echo $DisabledFieldProject; ?>>
                            </div>
                        </td>
                        <td>&ensp;&ensp;</td>
                        <td>
                            <div class="DivName"><span class="Mandatory">*</span> Country</div>
                            <div>
                                <input name="id_countryprojectimplementinginstitutions" id="id_countryprojectimplementinginstitutions" type="hidden" value="<?php echo $InfoProject['id_countryprojectimplementinginstitutions']; ?>">
                                <input class="SearchInput form-control" name="namecountryprojectimplementinginstitutions" id="namecountryprojectimplementinginstitutions" type="text" size="32" maxlength="150" value="<?php echo $InfoProject['namecountryprojectimplementinginstitutions']; ?>" <?php echo $DisabledFieldProject; ?>>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>

            <div id="projectperiod-block" class="form-group control-type-text">
                <div id="ProjectImplementingPeriod" class="form-group control-type-text Title0">
                    <span class="Title1">Project Implementing Period</span>
                </div>
                <hr class="LineModule">

                <table class="TableModule">
                    <tr>
                        <td><span class="Mandatory">*</span> Start Date:<?php echo FieldHelp('HelpTrial7'); ?>&ensp;</td>
                        <td>
                            <div>
                                <input class="DateInput form-control" placeholder="yyyy-mm-dd" name="prjprojectimplementingperiodstartdate" id="prjprojectimplementingperiodstartdate" type="text" size="11" maxlength="10" onkeyup="ValidaEscrituraFecha(this);" onblur="ValidaFecha(this);" value="<?php echo $InfoProject['prjprojectimplementingperiodstartdate']; ?>" <?php echo $DisabledFieldProject; ?>></div>
                        </td>
                        <td>&ensp;&ensp;</td>
                        <td><span class="Mandatory">*</span> End Date:<?php echo FieldHelp('HelpTrial8'); ?>&ensp;</td>
                        <td>
                            <div>
                                <input class="DateInput form-control" placeholder="yyyy-mm-dd" name="prjprojectimplementingperiodenddate" id="prjprojectimplementingperiodenddate" type="text" size="11" maxlength="10" onkeyup="ValidaEscrituraFecha(this);" onblur="ValidaFecha(this);" value="<?php echo $InfoProject['prjprojectimplementingperiodenddate']; ?>" <?php echo $DisabledFieldProject; ?>></div>
                        </td>
                    </tr>
                </table>
            </div>

            <div id="projectfunding-block" class="form-group control-type-text">
                <div id="FundingforProject" class="form-group control-type-text Title0">
                    <span class="Title1">Funding for Project</span>
                </div>
                <hr class="LineModule">

                <table class="TableModule">
                    <tr>
                        <td><span class="Mandatory">*</span> Donor Name:<?php echo FieldHelp('HelpTrial9'); ?>&ensp;</td>
                        <td>
                            <div>
                                <input name="id_donor" id="id_donor" type="hidden" value="<?php echo $InfoProject['id_donor']; ?>">
                                <input class="SearchInput form-control" name="dnrname" id="dnrname" type="text" size="36" maxlength="150" value="<?php echo $InfoProject['dnrname']; ?>" <?php echo $DisabledFieldProject; ?>>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>

            <div id="projectinformation-block" class="form-group control-type-text">
                <div id="ProjectInformation" class="form-group control-type-text Title0">
                    <span class="Title1">Project Information</span>
                </div>
                <hr class="LineModule">

                <table class="TableModule">
                    <tr>
                        <td><span class="Mandatory">*</span> Abstract:<?php echo FieldHelp('HelpTrial10'); ?>&ensp;</td>
                        <td>
                            <div><textarea class="form-control" id="prjabstract" name="prjabstract" cols="36" rows="3" <?php echo $DisabledFieldProject; ?>><?php echo $InfoProject['prjabstract']; ?></textarea></div>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="Mandatory">*</span> Keywords:<?php echo FieldHelp('HelpTrial11'); ?>&ensp;</td>
                        <td>
                            <div><input class="form-control" name="prjkeywords" id="prjkeywords" type="text" size="40" value="<?php echo $InfoProject['prjkeywords']; ?>" <?php echo $DisabledFieldProject; ?>></div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="form-group control-type-text">
            <span class="Title">Trial Info</span>
        </div>
        <div class="Session">

            <div id="projecttrialmanager-block" class="form-group control-type-text">
                <div id="TrialManager" class="form-group control-type-text Title0" style="padding-top: 15px;">
                    <span class="Title1">Trial Manager</span>
                </div>
                <hr class="LineModule">

                <table class="TableModule">
                    <tr>
                        <td> Name:<?php echo FieldHelp('HelpTrial12'); ?></td>
                        <td>&ensp;&ensp;</td>
                        <td>
                            <div class="DivName"><span class="Mandatory">*</span> First name</div>
                            <div>
                                <?php
                                $DisabledFieldTrialManager = "";
                                $InfoTrialManager = GetInfoTrialManager($form->getObject()->get('id_contactperson'));
                                if ($InfoTrialManager['id_contactperson'] != '')
                                    $DisabledFieldTrialManager = "Disabled";
                                ?>
                                <input name="tb_trial[id_contactperson]" id="id_contactperson" type="hidden" value="<?php echo $InfoTrialManager['id_contactperson']; ?>">
                                <input class="SearchInput form-control" name="cnprfirstnametrialmanager" id="cnprfirstnametrialmanager" type="text" size="36" maxlength="100" value="<?php echo $InfoTrialManager['cnprfirstname']; ?>">
                            </div>
                        </td>
                        <td>&ensp;&ensp;</td>
                        <td>
                            <div class="DivName">Middle name</div>
                            <div>
                                <input class="form-control" name="cnprmiddlenametrialmanager" id="cnprmiddlenametrialmanager" type="text" size="36" maxlength="100" value="<?php echo $InfoTrialManager['cnprmiddlename']; ?>" <?php echo $DisabledFieldTrialManager; ?>>
                            </div>
                        </td>
                        <td>&ensp;&ensp;</td>
                        <td>
                            <div class="DivName"><span class="Mandatory">*</span> Last name</div>
                            <div><input class="form-control" name="cnprlastnametrialmanager" id="cnprlastnametrialmanager" type="text" size="36" maxlength="100" value="<?php echo $InfoTrialManager['cnprlastname']; ?>" <?php echo $DisabledFieldTrialManager; ?>></div>
                        </td>
                    </tr>
                    <tr>
                        <td> Institution:<?php echo FieldHelp('HelpTrial13'); ?></td>
                        <td>&ensp;&ensp;</td>
                        <td>
                            <div class="DivName"><span class="Mandatory">*</span> Name</div>
                            <div>
                                <input name="id_institutiontrialmanager" id="id_institutiontrialmanager" type="hidden" value="<?php echo $InfoTrialManager['id_institution']; ?>">
                                <input class="SearchInput form-control" name="insnametrialmanager" id="insnametrialmanager" type="text" size="36" maxlength="150" value="<?php echo $InfoTrialManager['insname']; ?>" <?php echo $DisabledFieldTrialManager; ?>>
                            </div>
                        </td>
                        <td>&ensp;&ensp;</td>
                        <td>
                            <div class="DivName"><span class="Mandatory">*</span> Country</div>
                            <div>
                                <input name="id_countryinstitutiontrialmanager" id="id_countryinstitutiontrialmanager" type="hidden" value="<?php echo $InfoTrialManager['id_countryinstitution']; ?>">
                                <input class="SearchInput form-control" name="namecountryinstitutiontrialmanager" id="namecountryinstitutiontrialmanager" type="text" size="32" maxlength="150" value="<?php echo $InfoTrialManager['namecountryinstitution']; ?>" <?php echo $DisabledFieldTrialManager; ?>>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="Mandatory">*</span> Email:<?php echo FieldHelp('HelpTrial14'); ?></td>
                        <td>&ensp;&ensp;</td>
                        <td>
                            <div><input class="EmailInput form-control" name="cnpremailtrialmanager" id="cnpremailtrialmanager" type="text" size="36" maxlength="150" onblur="ValidaEmail(this);" value="<?php echo $InfoTrialManager['cnpremail']; ?>" <?php echo $DisabledFieldTrialManager; ?>></div>
                        </td>
                    </tr>
                    <tr>
                        <td> Telephone:<?php echo FieldHelp('HelpTrial15'); ?></td>
                        <td>&ensp;&ensp;</td>
                        <td>
                            <div><input class="PhoneInput form-control" name="cnprtelephonetrialmanager" id="cnprtelephonetrialmanager" type="text" size="36" maxlength="20" value="<?php echo $InfoTrialManager['cnprtelephone']; ?>" <?php echo $DisabledFieldTrialManager; ?>></div>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="Mandatory">*</span> Primary Role of Contact Person:<?php echo FieldHelp('HelpTrial16'); ?></td>
                        <td>&ensp;&ensp;</td>
                        <td>
                            <?php echo select_from_table("tb_trial[id_rolecontactperson]", "TbRolecontactperson", "id_rolecontactperson", "rcpname", null, $form->getObject()->get('id_rolecontactperson'), "class='form-control'"); ?>
                        </td>
                    </tr>
                </table>
            </div>

            <div id="projecttrialperiod-block" class="form-group control-type-text">
                <div id="TrialImplementingPeriod" class="form-group control-type-text Title0">
                    <span class="Title1">Trial Implementing Period</span>
                </div>
                <hr class="LineModule">

                <table class="TableModule">
                    <tr>
                        <td><span class="Mandatory">*</span> Start Date:<?php echo FieldHelp('HelpTrial17'); ?>&ensp;</td>
                        <td>
                            <div><input class="DateInput form-control" placeholder="yyyy-mm-dd" name="tb_trial[trlimplementingperiodstartdate]" id="trlimplementingperiodstartdate" type="text" size="11" maxlength="10" onkeyup="ValidaEscrituraFecha(this);" onblur="ValidaFecha(this);" value="<?php echo $form->getObject()->get('trlimplementingperiodstartdate'); ?>"></div>
                        </td>
                        <td>&ensp;&ensp;</td>
                        <td><span class="Mandatory">*</span> End Date:<?php echo FieldHelp('HelpTrial18'); ?>&ensp;</td>
                        <td>
                            <div><input class="DateInput form-control" placeholder="yyyy-mm-dd" name="tb_trial[trlimplementingperiodenddate]" id="trlimplementingperiodenddate" type="text" size="11" maxlength="10" onkeyup="ValidaEscrituraFecha(this);" onblur="ValidaFecha(this);" value="<?php echo $form->getObject()->get('trlimplementingperiodenddate'); ?>"></div>
                        </td>
                    </tr>
                </table>
            </div>

            <div id="projecttriallocation-block" class="form-group control-type-text">
                <div id="TrialLocation" class="form-group control-type-text Title0">
                    <span class="Title1">Trial Location</span>
                </div>
                <hr class="LineModule">

                <table class="TableModule">
                    <tr>
                        <td><span class="Mandatory">*</span> Name:<?php echo FieldHelp('HelpTrial19'); ?></td>
                        <td>&ensp;&ensp;</td>
                        <td>
                            <div>
                                <?php
                                $DisabledFieldTrialLocation = "";
                                $InfoTrialLocation = GetInfoTrialLocation($form->getObject()->get('id_triallocation'));
                                if ($InfoTrialLocation['id_triallocation'] != '')
                                    $DisabledFieldTrialLocation = "Disabled";
                                ?>
                                <input name="tb_trial[id_triallocation]" id="id_triallocation" type="hidden" value="<?php echo $InfoTrialLocation['id_triallocation']; ?>">
                                <input class="SearchInput form-control" name="trlcname" id="trlcname" type="text" size="36" maxlength="150" value="<?php echo $InfoTrialLocation['trlcname']; ?>">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="Mandatory">*</span> Country:<?php echo FieldHelp('HelpTrial20'); ?></td>
                        <td>&ensp;&ensp;</td>
                        <td>
                            <div class="DivRow">
                                <div class="col-sm-10">
                                    <?php $PartCountry = explode(",", $InfoTrialLocation['country'], 2); ?>
                                    <input name="id_countrytriallocation" id="id_countrytriallocation" type="hidden" value="<?php echo $PartCountry[0]; ?>">
                                    <input class="SearchInput form-control" name="countrytriallocation" id="countrytriallocation" type="text" size="36" maxlength="150" value="<?php echo $PartCountry[1]; ?>" <?php echo $DisabledFieldTrialLocation; ?>>
                                </div>
                                <div class="DivColIcon">
                                    <span id='CheckCountrytriallocation'></span>                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td> District/Satate/Province Level:<?php echo FieldHelp('HelpTrial21'); ?></td>
                        <td>&ensp;&ensp;</td>
                        <td>
                            <div class="DivRow">
                                <div class="col-sm-10">
                                    <?php $PartDistrict = explode(",", $InfoTrialLocation['district'], 2); ?>
                                    <input name="id_districttriallocation" id="id_districttriallocation" type="hidden" value="<?php echo $PartDistrict[0]; ?>">
                                    <input class="SearchInput form-control" name="districttriallocation" id="districttriallocation" type="text" size="36" maxlength="150" value="<?php echo $PartDistrict[1]; ?>" <?php echo $DisabledFieldTrialLocation; ?> Readonly>

                                </div>
                                <div class="DivColIcon">
                                    <span id='CheckDistricttriallocation'></span>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td> Sub-district/Division Level:<?php echo FieldHelp('HelpTrial22'); ?></td>
                        <td>&ensp;&ensp;</td>
                        <td>
                            <div class="DivRow">
                                <div class="col-sm-10">
                                    <?php $PartSubdistrict = explode(",", $InfoTrialLocation['subdistrict'], 2); ?>
                                    <input name="id_subdistricttriallocation" id="id_subdistricttriallocation" type="hidden" value="<?php echo $PartSubdistrict[0]; ?>">
                                    <input class="SearchInput form-control" name="subdistricttriallocation" id="subdistricttriallocation" type="text" maxlength="150" value="<?php echo $PartSubdistrict[1]; ?>"size="36" <?php echo $DisabledFieldTrialLocation; ?> ReadOnly>
                                </div>
                                <div class="DivColIcon">
                                    <span id='CheckSubdistricttriallocation'></span>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td> Village Level:<?php echo FieldHelp('HelpTrial23'); ?></td>
                        <td>&ensp;&ensp;</td>
                        <td>
                            <div class="DivRow">
                                <div class="col-sm-10">
                                    <?php $PartVillage = explode(",", $InfoTrialLocation['village'], 2); ?>
                                    <input name="id_villagetriallocation" id="id_villagetriallocation" type="hidden" value="<?php echo $PartVillage[0]; ?>">
                                    <input class="SearchInput form-control" name="villagetriallocation" id="villagetriallocation" type="text" size="36" maxlength="150" value="<?php echo $PartVillage[1]; ?>" <?php echo $DisabledFieldTrialLocation; ?> ReadOnly>

                                </div>
                                <div class="DivColIcon">
                                    <span id='CheckVillagetriallocation'></span>
                                    <span id='AddVillage' title="Add"></span>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Coordinates:<?php echo FieldHelp('HelpTrial24'); ?></td>
                        <td>&ensp;&ensp;</td>
                        <td>
                            <div class="DivName"><span class="Mandatory">*</span> Latitude</div>
                            <div>
                                <div class="col-sm-10">
                                    <input class="form-control" name="trlclatitude" id="trlclatitude" type="text" size="36" onkeyup="ValidaEscrituraNumero(this);" onblur="ValidaValorNumerico(this);" value="<?php echo $InfoTrialLocation['trlclatitude']; ?>" <?php echo $DisabledFieldTrialLocation; ?>>
                                </div>
                                <div class="DivColIcon">
                                    <?php echo thickbox_iframe(image_tag('map.gif'), '/trial/triallocationcoordinates/', array('pop' => '1'), array('title' => 'View in map'), array('width' => '800', 'height' => '600')) ?>
                                </div>
                            </div>
                        </td>
                        <td>&ensp;&ensp;</td>
                        <td>
                            <div class="DivName"><span class="Mandatory">*</span> Longitude</div>
                            <div>
                                <div class="col-sm-10">
                                    <input class="form-control" name="trlclongitude" id="trlclongitude" type="text" size="36" onkeyup="ValidaEscrituraNumero(this);" onblur="ValidaValorNumerico(this);" value="<?php echo $InfoTrialLocation['trlclongitude']; ?>" <?php echo $DisabledFieldTrialLocation; ?>>
                                </div>
                                <div class="DivColIcon">
                                    <?php echo thickbox_iframe(image_tag('map.gif'), '/trial/triallocationcoordinates/', array('pop' => '1'), array('title' => 'View in map'), array('width' => '800', 'height' => '600')) ?>
                                </div>
                            </div>
                        </td>
                        <td>&ensp;&ensp;</td>
                        <td>
                            <div class="DivName"><span class="Mandatory">*</span> Altitude</div>
                            <div>
                                <div class="col-sm-10">
                                    <input class="form-control" name="trlcaltitude" id="trlcaltitude" type="text" size="36" onkeyup="ValidaEscrituraNumero(this);" onblur="ValidaValorNumerico(this);" value="<?php echo $InfoTrialLocation['trlcaltitude']; ?>" <?php echo $DisabledFieldTrialLocation; ?>>
                                </div>
                            </div>
                        </td>
                    </tr>

                </table>
            </div>

            <div id="projecttrialchar-block" class="form-group control-type-text">
                <div id="TrialCharacteristics" class="form-group control-type-text Title0">
                    <span class="Title1">Trial Characteristics</span>
                </div>
                <hr class="LineModule">

                <table class="TableModule">
                    <tr>
                        <td><span class="Mandatory">*</span> Trial Name:<?php echo FieldHelp('HelpTrial25'); ?></td>
                        <td>&ensp;&ensp;</td>
                        <td>
                            <div>
                                <input class="form-control" name="tb_trial[trltrialname]" id="trltrialname" type="text" size="36" maxlength="150" value="<?php echo $form->getObject()->get('trltrialname'); ?>">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="Mandatory">*</span> Trial Objectives:<?php echo FieldHelp('HelpTrial26'); ?></td>
                        <td>&ensp;&ensp;</td>
                        <td>
                            <div>
                                <input class="form-control" name="tb_trial[trltrialobjectives]" id="trltrialobjectives" type="text" size="69" value="<?php echo $form->getObject()->get('trltrialobjectives'); ?>">
                            </div>
                        </td>
                    </tr>
                </table>
            </div>

            <div id="projectaccessinfo-block" class="form-group control-type-text">
                <div id="AccesstoInformation" class="form-group control-type-text Title0">
                    <span class="Title1">Access to Information</span>
                </div>
                <hr class="LineModule">

                <table class="TableModule">
                    <?php
                    $trltrialpermissions = $form->getObject()->get('trltrialpermissions');
                    $DisplayPermissionsUsers = "none";
                    $DisplayPermissionsGroups = "none";
                    if ($trltrialpermissions == 'Open to specified users')
                        $DisplayPermissionsUsers = "block";
                    if ($trltrialpermissions == 'Open to specified groups')
                        $DisplayPermissionsGroups = "block";
                    ?>
                    <tr>
                        <td>
                            <div>
                                <input type="radio" <?php echo CheckedOption($trltrialpermissions, 'Open to all users'); ?> checked="checked" id="tb_trial_trltrialpermissions_open_to_all_users" value="Open to all users" name="tb_trial[trltrialpermissions]"><span> Open to all users <?php echo FieldHelp('HelpTrial27'); ?> </span><br>
                                <input type="radio" <?php echo CheckedOption($trltrialpermissions, 'Open to specified users'); ?> id="tb_trial_trltrialpermissions_open_to_specified_users" value="Open to specified users" name="tb_trial[trltrialpermissions]"><span> Open to specified users <?php echo FieldHelp('HelpTrial28'); ?> </span><br>
                                <input type="radio" <?php echo CheckedOption($trltrialpermissions, 'Open to specified groups'); ?> id="tb_trial_trltrialpermissions_open_to_specified_groups" value="Open to specified groups" name="tb_trial[trltrialpermissions]"><span> Open to specified groups <?php echo FieldHelp('HelpTrial29'); ?> </span><br>
                                <input type="radio" <?php echo CheckedOption($trltrialpermissions, 'Public domain'); ?> id="tb_trial_trltrialpermissions_public_domain" value="Public domain" name="tb_trial[trltrialpermissions]"><span> Public domain <?php echo FieldHelp('HelpTrial30'); ?> </span>
                            </div>
                        </td>
                        <td>&ensp;&ensp;</td>
                        <td>
                            <div id="PermissionsUsers" style="display: <?php echo $DisplayPermissionsUsers; ?>;">
                                <div>
                                    <fieldset id="users">
                                        <legend>
                                            <label class="Title1">Specified Users</label>
                                            <div>
                                                <input type="text" value="" size="11" id="user_id" name="user_id" class="SearchInput form-control form-control-inline" placeholder="e.g.: Danilo Perez">
                                            </div>  
                                        </legend>
                                    </fieldset>
                                </div>
                            </div>
                            <div id="PermissionsGroups" style="display: <?php echo $DisplayPermissionsGroups; ?>" >
                                <div>
                                    <fieldset id="groups">
                                        <legend>
                                            <label class="Title1">Specified Groups</label>
                                            <div>
                                                <input type="text" value="" size="11" id="group_id" name="group_id" class="SearchInput form-control form-control-inline" placeholder="e.g.: CIMMYT">
                                            </div>  
                                        </legend>
                                    </fieldset>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>

            <div id="projectlicense-block" class="form-group control-type-text">
                <div id="License" class="form-group control-type-text">
                    <span class="Title1">License <?php echo FieldHelp('HelpTrial31'); ?></span>
                </div>
                <table class="TableModule">
                    <tr>
                        <td>
                            <div class="DivRow-2">
                                <div class="col-sm-7">
                                    <textarea class="form-control" id="tb_trial_trltriallicense" name="tb_trial[trltriallicense]" cols="58" rows="5"><?php echo $form->getObject()->get('trltriallicense'); ?></textarea>        
                                </div>
                                <div class="col-sm-4" style="padding-top: 100px;">
                                    <span title="Go to Licence" onclick="GoToLicence();" style="cursor: pointer;">
                                        <img src="/images/licence-icon.png">Creative Commons License Generator
                                    </span>                               
                                </div>
                            </div>
                            <div><values><?php echo $form->getObject()->get('trltriallicense'); ?></values></div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="clearfix"></div>

        <div id="TrialCropInfo" id="TrialCropInfo" class="form-group control-type-text">
            <span class="Title">Trial Crop Info</span>
        </div>

        <div id="projecttrialcropinfo-block" class="Session">

            <div id="TrialCharacteristics" class="form-group control-type-text Title0" style="padding-top: 15px;">
                <span class="Title1">Trial Design</span>
            </div>
            <hr class="LineModule">
            <!--inicio: VISUALIZACION DE INFORMACION GUARDA-->
            <?php
            $user = sfContext::getInstance()->getUser();
            $ArrTrialInfo = $user->getAttribute('TrialInfo');
            ?>
            <?php
            if (count($ArrTrialInfo)) {
                foreach ($ArrTrialInfo AS $TrialInfo) {
                    $id_trialinfo = $TrialInfo['id_trialinfo'];
                    ?>
                    <div id="DivResults">
                        <div id="DivCrop1" class="form-group control-type-text" style="margin-bottom: 0px;">
                            <fieldset class="cropInfo">
                                <div class="col-sm-12 form-group control-type-text">
                                    <div class="col-sm-2">Crop:</div> 
                                    <div class="col-sm-4 control-type-text">
                                        <input class="form-control" name="crpname" id="crpname" type="text" value="<?php echo $TrialInfo['crpname']; ?>" disabled="true">
                                    </div>
                                </div>
                                <div class="col-sm-12 form-group control-type-text">
                                    <div class="col-sm-2">Number of Replicates:</div> 
                                    <div class="col-sm-1 control-type-text">
                                        <input class="form-control" name="trnfnumberofreplicates" id="trnfnumberofreplicates" type="text" value="<?php echo $TrialInfo['trnfnumberofreplicates']; ?>" disabled="true">
                                    </div>                                
                                </div>
                                <div class="col-sm-12 form-group control-type-text">
                                    <div class="col-sm-2">Experimental Design:</div> 
                                    <div class="col-sm-4 control-type-text">
                                        <input class="form-control" name="xpdsname" id="xpdsname" type="text" value="<?php echo $TrialInfo['xpdsname']; ?>" disabled="true">                                    
                                    </div>
                                </div>
                                <div class="col-sm-12 form-group control-type-text">
                                    <div class="col-sm-2">Treatment Number:</div> 
                                    <div class=" col-sm-1 control-type-text">
                                        <input class="form-control" name="trnftreatmentnumber" id="trnftreatmentnumber" type="text" value="<?php echo $TrialInfo['trnftreatmentnumber']; ?>" disabled="true">
                                    </div>
                                </div>
                                <div class="col-sm-12 form-group control-type-text">
                                    <div class="col-sm-2">Treatment Name and Code:</div> 
                                    <div class=" col-sm-4 control-type-text">
                                        <input class="form-control" name="trnftreatmentnameandcode" id="trnftreatmentnameandcode" type="text" value="<?php echo $TrialInfo['trnftreatmentnameandcode']; ?>" disabled="true">                                   
                                    </div>
                                </div>
                                <div class="col-sm-6 form-group control-type-text">
                                    <div class="col-sm-4">Planting/Sowing Start Date:</div> 
                                    <div class=" col-sm-4 control-type-text">
                                        <input class="DateInput form-control" placeholder="yyyy-mm-dd" name="trnfplantingsowingstartdate" id="trnfplantingsowingstartdate" type="text" value="<?php echo $TrialInfo['trnfplantingsowingstartdate']; ?>" disabled="true">                                
                                    </div>
                                </div>
                                <div class="col-sm-6 form-group control-type-text">
                                    <div class="col-sm-4">Planting/Sowing End Date:</div> 
                                    <div class=" col-sm-4 control-type-text">
                                        <input class="DateInput form-control" placeholder="yyyy-mm-dd" name="trnfplantingsowingenddate" id="trnfplantingsowingenddate" type="text" value="<?php echo $TrialInfo['trnfplantingsowingenddate']; ?>" disabled="true">
                                    </div>
                                </div>
                                <div class="col-sm-6 form-group control-type-text">
                                    <div class="col-sm-4">Physiological Maturity Start Date:</div> 
                                    <div class=" col-sm-4 control-type-text">
                                        <input class="DateInput form-control" placeholder="yyyy-mm-dd" name="trnfphysiologicalmaturitystardate" id="trnfphysiologicalmaturitystardate" type="text" value="<?php echo $TrialInfo['trnfphysiologicalmaturitystardate']; ?>" disabled="true">                                
                                    </div>
                                </div>
                                <div class="col-sm-6 form-group control-type-text">
                                    <div class="col-sm-4">Physiological Maturity End Date:</div> 
                                    <div class=" col-sm-4 control-type-text">
                                        <input class="DateInput form-control" placeholder="yyyy-mm-dd" name="trnfphysiologicalmaturityenddate" id="trnfphysiologicalmaturityenddate" type="text" value="<?php echo $TrialInfo['trnfphysiologicalmaturityenddate']; ?>" disabled="true">
                                    </div>
                                </div>
                                <div class="col-sm-6 form-group control-type-text">
                                    <div class="col-sm-4">Harvest Start Date:</div> 
                                    <div class=" col-sm-4 control-type-text">
                                        <input class="DateInput form-control" placeholder="yyyy-mm-dd" name="trnfharveststartdate" id="trnfharveststartdate" type="text" value="<?php echo $TrialInfo['trnfharveststartdate']; ?>" disabled="true">                                
                                    </div>
                                </div>
                                <div class="col-sm-6 form-group control-type-text">
                                    <div class="col-sm-4">Harvest End Date:</div> 
                                    <div class=" col-sm-4 control-type-text">
                                        <input class="DateInput form-control" placeholder="yyyy-mm-dd" name="trnfharvestenddate" id="trnfharvestenddate" type="text" value="<?php echo $TrialInfo['trnfharvestenddate']; ?>" disabled="true">
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="varieties">
                                <div class="panel panel-default">
                                    <div class="panel-heading Title1" style="color:#595959;">Varieties</div>
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <tr style="background: #EEEEEE;">
                                                <th>Name</th>
                                                <th>Origin</th>
                                                <th>Synonymous</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php echo GetVariety($id_trialinfo); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </fieldset>
                            <fieldset class="variablesMeasured">
                                <div class="panel panel-default">
                                    <div class="panel-heading Title1" style="color:#595959;">Variables Measured</div>
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <tr style="background: #EEEEEE;">
                                                <th>Name</th>
                                                <th>Trait class</th>
                                                <th>Definition</th>
                                                <th>Unit</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php echo GetVariablesMeasured($id_trialinfo); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </fieldset>
                            <fieldset class="dataInformation">
                                <div class="panel panel-default" style="margin-bottom: 0px;">
                                    <div class="panel-heading Title1" style="color:#595959;">Data Information</div>
                                    <div class="panel-body" style="padding-top: 15px; padding-bottom: 5px; padding-left: 0px; background: #EEEEEE;">
                                        <?php if ($TrialInfo['trnfdatafile'] != '') { ?>

                                            <div class="col-sm-12 form-group control-type-text">
                                                <div class="col-sm-3">Data:</div>
                                                <div class=" col-sm-4 control-type-text">
                                                    <span class="Span-Action-Link" name="Download" id="Download" title="Download Data File" onclick="DownloadFileTrial(<?php echo $id_trial; ?>,<?php echo $TrialInfo['id_crop']; ?>, 'Data File');"><?php echo image_tag("/images/download-icon.png", array('size' => '13x13')); ?> Download</span>
                                                </div>
                                            </div>
                                        <?php } if ($TrialInfo['trnfdataorresultsfile'] != '') { ?>
                                            <div class="col-sm-12 form-group control-type-text">
                                                <div class="col-sm-3">Results File:</div>
                                                <div class=" col-sm-4 control-type-text">
                                                    <span class="Span-Action-Link" name="Download" id="Download" title="Download Results File" onclick="DownloadFileTrial(<?php echo $id_trial; ?>,<?php echo $TrialInfo['id_crop']; ?>, 'Results File');"><?php echo image_tag("/images/download-icon.png", array('size' => '13x13')); ?> Download</span>
                                                </div>
                                            </div>
                                        <?php } if ($TrialInfo['trnfsuppplementalinformationfile'] != '') { ?>
                                            <div class="col-sm-12 form-group control-type-text">
                                                <div class="col-sm-3">Suppplemental Information File:</div>
                                                <div class=" col-sm-4 control-type-text">
                                                    <span class="Span-Action-Link" name="Download" id="Download" title="Download Suppplemental Information File" onclick="DownloadFileTrial(<?php echo $id_trial; ?>,<?php echo $TrialInfo['id_crop']; ?>, 'Suppplemental Information File');"><?php echo image_tag("/images/download-icon.png", array('size' => '13x13')); ?> Download</span>
                                                </div>
                                            </div>
                                        <?php } if ($TrialInfo['trnfweatherdatafile'] != '') { ?>
                                            <div class="col-sm-12 form-group control-type-text">
                                                <div class="col-sm-3">Weather File:</div>
                                                <div class=" col-sm-4 control-type-text">
                                                    <span class="Span-Action-Link" name="Download" id="Download" title="Download Weather File" onclick="DownloadFileTrial(<?php echo $id_trial; ?>,<?php echo $TrialInfo['id_crop']; ?>, 'Weather File');"><?php echo image_tag("/images/download-icon.png", array('size' => '13x13')); ?> Download</span>
                                                </div>
                                            </div>
                                        <?php } if ($TrialInfo['trnfsoildatafile'] != '') { ?>
                                            <div class="col-sm-12 form-group control-type-text">
                                                <div class="col-sm-3">Soil File:</div>
                                                <div class=" col-sm-4 control-type-text">
                                                    <span class="Span-Action-Link" name="Download" id="Download" title="Download Soil File" onclick="DownloadFileTrial(<?php echo $id_trial; ?>,<?php echo $TrialInfo['id_crop']; ?>, 'Soil File');"><?php echo image_tag("/images/download-icon.png", array('size' => '13x13')); ?> Download</span>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
            <!--fin: VISUALIZACION DE INFORMACION GUARDA-->

            <!--inicio: INGRESO NUEVA INFORMACION POR CULTIVO-->
            <div id="DivCrop1" class="form-group control-type-text" style="margin-bottom: 0px;">
                <fieldset class="cropInfo">
                    <div class="col-sm-12 form-group control-type-text" style="margin-top: 10px;">
                        <div class="col-sm-2">Crop: <?php echo FieldHelp('HelpTrial32'); ?></div>      
                        <div class="col-sm-4 control-type-text">
                            <?php echo select_from_table("id_crop1", "TbCrop", "id_crop", "crpname", null, null, "onchange='ValidaCrop(1);' class='form-control'"); ?>
                        </div>
                    </div>
                    <div class="col-sm-12 form-group control-type-text">
                        <div class="col-sm-2">Number of Replicates: <?php echo FieldHelp('HelpTrial33'); ?></div>      
                        <div class=" col-sm-2 control-type-text">
                            <select class="form-control" size="1" id="trnfnumberofreplicates1" name="trnfnumberofreplicates1">
                                <?php
                                for ($a = 1; $a <= 25; $a++) {
                                    ?>
                                    <option value="<?php echo $a; ?>" title="<?php echo $a; ?>"><?php echo $a; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 form-group control-type-text">
                        <div class="col-sm-2">Experimental Design: <?php echo FieldHelp('HelpTrial34'); ?></div>      
                        <div class="col-sm-4 control-type-text">
                            <?php echo select_from_table("id_experimentaldesign1", "TbExperimentaldesign", "id_experimentaldesign", "xpdsname", null, null, "class='form-control'"); ?>
                        </div>
                    </div>
                    <div class="col-sm-12 form-group control-type-text">
                        <div class="col-sm-2">Treatment Number: <?php echo FieldHelp('HelpTrial35'); ?></div>      
                        <div class=" col-sm-2 control-type-text">
                            <select class="form-control" size="1" id="trnftreatmentnumber1" name="trnftreatmentnumber1">
                                <?php
                                for ($a = 1; $a <= 100; $a++) {
                                    ?>
                                    <option value="<?php echo $a; ?>" title="<?php echo $a; ?>"><?php echo $a; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 form-group control-type-text">
                        <div class="col-sm-2">Treatment Name and Code: <?php echo FieldHelp('HelpTrial36'); ?></div>      
                        <div class=" col-sm-4 control-type-text">
                            <input class="form-control" name="trnftreatmentnameandcode1" id="trnftreatmentnameandcode1" type="text" size="36" maxlength="255" value="">
                        </div>
                    </div>
                    <div class="col-sm-6 form-group control-type-text">
                        <div class="col-sm-4">Planting/Sowing Start Date: <?php echo FieldHelp('HelpTrial37'); ?></div>      
                        <div class=" col-sm-4 control-type-text">
                            <input class="DateInput form-control" placeholder="yyyy-mm-dd" name="trnfplantingsowingstartdate1" id="trnfplantingsowingstartdate1" type="text" size="11" maxlength="10" onkeyup="ValidaEscrituraFecha(this);" onblur="ValidaFecha(this);" value="">                                </div>
                    </div>
                    <div class="col-sm-6 form-group control-type-text">
                        <div class="col-sm-4">Planting/Sowing End Date: <?php echo FieldHelp('HelpTrial38'); ?></div>      
                        <div class=" col-sm-4 control-type-text">
                            <input class="DateInput form-control" placeholder="yyyy-mm-dd" name="trnfplantingsowingenddate1" id="trnfplantingsowingenddate1" type="text" size="11" maxlength="10" onkeyup="ValidaEscrituraFecha(this);" onblur="ValidaFecha(this);" value="">
                        </div>
                    </div>
                    <div class="col-sm-6 form-group control-type-text">
                        <div class="col-sm-4">Physiological Maturity Start Date: <?php echo FieldHelp('HelpTrial39'); ?></div>      
                        <div class=" col-sm-4 control-type-text">
                            <input class="DateInput form-control" placeholder="yyyy-mm-dd" name="trnfphysiologicalmaturitystardate1" id="trnfphysiologicalmaturitystardate1" type="text" size="11" maxlength="10" onkeyup="ValidaEscrituraFecha(this);" onblur="ValidaFecha(this);" value="">                                </div>
                    </div>
                    <div class="col-sm-6 form-group control-type-text">
                        <div class="col-sm-4">Physiological Maturity End Date: <?php echo FieldHelp('HelpTrial40'); ?></div>      
                        <div class=" col-sm-4 control-type-text">
                            <input class="DateInput form-control" placeholder="yyyy-mm-dd" name="trnfphysiologicalmaturityenddate1" id="trnfphysiologicalmaturityenddate1" type="text" size="11" maxlength="10" onkeyup="ValidaEscrituraFecha(this);" onblur="ValidaFecha(this);" value="">
                        </div>
                    </div>
                    <div class="col-sm-6 form-group control-type-text">
                        <div class="col-sm-4">Harvest Start Date: <?php echo FieldHelp('HelpTrial41'); ?></div>      
                        <div class=" col-sm-4 control-type-text">
                            <input class="DateInput form-control" placeholder="yyyy-mm-dd" name="trnfharveststartdate1" id="trnfharveststartdate1" type="text" size="11" maxlength="10" onkeyup="ValidaEscrituraFecha(this);" onblur="ValidaFecha(this);" value="">                                </div>
                    </div>
                    <div class="col-sm-6 form-group control-type-text">
                        <div class="col-sm-4">Harvest End Date: <?php echo FieldHelp('HelpTrial42'); ?></div>      
                        <div class=" col-sm-4 control-type-text">
                            <input class="DateInput form-control" placeholder="yyyy-mm-dd" name="trnfharvestenddate1" id="trnfharvestenddate1" type="text" size="11" maxlength="10" onkeyup="ValidaEscrituraFecha(this);" onblur="ValidaFecha(this);" value="">
                        </div>
                    </div>
                </fieldset>
                <fieldset class="varieties">
                    <div class="panel panel-default">
                        <!-- Default panel contents -->
                        <div class="panel-heading" style="color:#595959;"><b>Varieties <?php echo FieldHelp('HelpTrial43'); ?></b></div>
                        <div class="panel-body" style="padding-top: 5px; padding-bottom: 5px; background: #EEEEEE;">
                            <div class="col-sm-1" style="padding-left: 0px; padding-right: 0px; width: 50px;">Search:</div> 
                            <div class=" col-sm-4 control-type-text">
                                <input class="SearchInput form-control"  name="Variety1" id="Variety1" onkeyup="FilterVariety(this, 1);" type="text" size="36" maxlength="255" value="">
                            </div>

                            <div class="DivColIcon">
                                <span id="DivFilterVariety1" style="display:none;"><?php echo image_tag('loading4.gif', array('size' => '18x18')); ?></span>
                                <!--<span id="DivFilterVarietyOK1" style="display:none;"><?php echo image_tag('success.png', array('size' => '18x18')); ?></span>-->
                                <span id="DivClearFilterVariety1" style="display:none;" class="Span-Action-Link" onclick="ClearFilterVariety(1);" title="Clear"><?php echo image_tag("/images/cross.png", array('size' => '18x18')); ?></span>
                                <span id="DivCreateNewVariety" title="Create new Variety" data-toggle="modal" onclick="GetInfoRowV(1);" data-target="#ModalCreateNewVariety"><?php echo image_tag("/images/add-icon.png", array('size' => '18x18')); ?></span>
                            </div>
                        </div>
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr style="background: #D6D6D6;">
                                    <th>Name</th>
                                    <th>Origin</th>
                                    <th>Synonymous</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody  id="InfoVariety1"></tbody>
                            <tbody  id="InfoVarietySelected1"></tbody>
                        </table>
                    </div>
                </fieldset>
                <fieldset class="variablesMeasured">
                    <div class="panel panel-default">
                        <!-- Default panel contents -->
                        <div class="panel-heading Title1" style="color:#595959;">Variables Measured <?php echo FieldHelp('HelpTrial44'); ?></div>
                        <div class="panel-body" style="padding-top: 5px; padding-bottom: 5px; background: #EEEEEE;">
                            <div class="col-sm-1" style="padding-left: 0px; padding-right: 0px; width: 50px;">Search:</div> 
                            <div class=" col-sm-4 control-type-text">
                                <input class="SearchInput form-control"  name="VariablesMeasured1" id="VariablesMeasured1" onkeyup="FilterVariablesMeasured(this, 1);" type="text" size="36" maxlength="255" value="">
                            </div>
                            <div class="DivColIcon">
                                <span id="DivFilterVariablesMeasured1" style="display:none;"><?php echo image_tag('loading4.gif', array('size' => '18x18')); ?></span>
                                <!--<span id="DivFilterVariablesMeasuredOK1" style="display:none;"><?php echo image_tag('success.png', array('size' => '18x18')); ?></span>-->
                                <span id="DivClearFilterVariablesMeasured1" style="display:none;" class="Span-Action-Link" onclick="ClearFilterVariablesMeasured(1);" title="Clear"><?php echo image_tag("/images/cross.png", array('size' => '18x18')); ?></span>
                                <span id="DivCreateNewVariablesMeasured" title="Create new variable measured" data-toggle="modal" onclick="GetInfoRowVM(1);" data-target="#ModalCreateNewVariablesMeasured"><?php echo image_tag("/images/add-icon.png", array('size' => '18x18')); ?></span>
                            </div>
                        </div>
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr style="background: #D6D6D6;">
                                    <th>Name</th>
                                    <th>Trait class</th>
                                    <th>Definition</th>
                                    <th>Unit</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody  id="InfoVariablesMeasured1"></tbody>
                            <tbody  id="InfoVariablesMeasuredSelected1"></tbody>
                        </table>
                    </div>
                </fieldset>
                <fieldset class="dataInformation">
                    <div class="panel panel-default" style="margin-bottom: 0px;">
                        <div class="panel-heading Title1" style="color:#595959;">Data Information</div>
                        <div class="panel-body" style="padding-top: 15px; padding-bottom: 5px; padding-left: 0px; background: #EEEEEE;">
                            <div id="DivData1" style="display:none;" class="DivDataCrop col-sm-12 form-group control-type-text">
                                <div class="col-sm-3">Download Data Template:</div>
                                <div class=" col-sm-4 control-type-text">
                                    <button class="btn btn-action" type="button" name="DownloadDataTemplate" id="DownloadDataTemplate" onclick="DownloadDataTemplateCrop(1);" title="Download Data Template"><span aria-hidden="true" class="glyphicon glyphicon-download"></span> Download</button>      
                                </div>
                            </div>
                            <div class="col-sm-12 form-group control-type-text">
                                <div class="col-sm-3">Upload Data Template: <?php echo FieldHelp('HelpTrial45'); ?></div>
                                <div class=" col-sm-4 control-type-text">
                                    <input type="file" id="TemplateData1" name="TemplateData1">
                                </div>
                            </div>
                            <div class="col-sm-12 form-group control-type-text">
                                <div class="col-sm-3">Results File: <?php echo FieldHelp('HelpTrial46'); ?></div>
                                <div class=" col-sm-4 control-type-text">
                                    <input type="file" id="trnfdataorresultsfile1" name="trnfdataorresultsfile1">        
                                </div>
                            </div>
                            <div class="col-sm-12 form-group control-type-text">
                                <div class="col-sm-3">Suppplemental Information File: <?php echo FieldHelp('HelpTrial47'); ?></div>
                                <div class=" col-sm-4 control-type-text">
                                    <input type="file" id="trnfsuppplementalinformationfile1" name="trnfsuppplementalinformationfile1">        
                                </div>
                            </div>
                            <div class="col-sm-12 form-group control-type-text">
                                <div class="col-sm-3">Weather File: <?php echo FieldHelp('HelpTrial48'); ?></div>
                                <div class=" col-sm-4 control-type-text">
                                    <input type="file" id="trnfweatherdatafile1" name="trnfweatherdatafile1">        
                                </div>
                            </div>
                            <div class="col-sm-12 form-group control-type-text">
                                <div class="col-sm-3">Soil File: <?php echo FieldHelp('HelpTrial49'); ?></div>
                                <div class=" col-sm-4 control-type-text">
                                    <input type="file" id="trnfsoildatafile1" name="trnfsoildatafile1">        
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>

            <?php
            for ($i = 2; $i <= 10; $i++) {
                ?>
                <div id="DivCrop<?php echo $i; ?>" style="display:none; margin-bottom: 0px;"> <br>
                    <p style=" border-bottom-color:#6CB662; border-bottom-style:dashed; border-bottom-width:2px; border-top-width:1px;"></p>
                    <fieldset class="cropInfo">
                        <div class="col-sm-12 form-group control-type-text" style="margin-top: 10px;">
                            <div class="col-sm-2">Crop:</div>      
                            <div class="col-sm-4 control-type-text">
                                <?php echo select_from_table("id_crop$i", "TbCrop", "id_crop", "crpname", null, null, "onchange='ValidaCrop($i);' class='form-control'"); ?>
                            </div>
                        </div>
                        <div class="col-sm-12 form-group control-type-text">
                            <div class="col-sm-2">Number of Replicates:</div>      
                            <div class=" col-sm-2 control-type-text">
                                <select class="form-control" size="1" id="trnfnumberofreplicates<?php echo $i; ?>" name="trnfnumberofreplicates<?php echo $i; ?>">
                                    <?php
                                    for ($a = 1; $a <= 25; $a++) {
                                        ?>
                                        <option value="<?php echo $a; ?>" title="<?php echo $a; ?>"><?php echo $a; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 form-group control-type-text">
                            <div class="col-sm-2">Experimental Design:</div>      
                            <div class="col-sm-4 control-type-text">
                                <?php echo select_from_table("id_experimentaldesign$i", "TbExperimentaldesign", "id_experimentaldesign", "xpdsname", null, null, "class='form-control'"); ?>
                            </div>
                        </div>
                        <div class="col-sm-12 form-group control-type-text">
                            <div class="col-sm-2">Treatment Number:</div>      
                            <div class=" col-sm-2 control-type-text">
                                <select class="form-control" size="1" id="trnftreatmentnumber<?php echo $i; ?>" name="trnftreatmentnumber<?php echo $i; ?>">
                                    <?php
                                    for ($a = 1; $a <= 100; $a++) {
                                        ?>
                                        <option value="<?php echo $a; ?>" title="<?php echo $a; ?>"><?php echo $a; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 form-group control-type-text">
                            <div class="col-sm-2">Treatment Name and Code:</div>      
                            <div class=" col-sm-4 control-type-text">
                                <input class="form-control" name="trnftreatmentnameandcode<?php echo $i; ?>" id="trnftreatmentnameandcode<?php echo $i; ?>" type="text" size="36" maxlength="255" value="">
                            </div>
                        </div>
                        <div class="col-sm-6 form-group control-type-text">
                            <div class="col-sm-4">Planting/Sowing Start Date:</div> 
                            <div class=" col-sm-4 control-type-text">
                                <input class="DateInput form-control" placeholder="yyyy-mm-dd" name="trnfplantingsowingstartdate<?php echo $i; ?>" id="trnfplantingsowingstartdate<?php echo $i; ?>" type="text" size="11" maxlength="10" onkeyup="ValidaEscrituraFecha(this);" onblur="ValidaFecha(this);" value="">                                </div>
                        </div>
                        <div class="col-sm-6 form-group control-type-text">
                            <div class="col-sm-4">Planting/Sowing End Date:</div> 
                            <div class=" col-sm-4 control-type-text">
                                <input class="DateInput form-control" placeholder="yyyy-mm-dd" name="trnfplantingsowingenddate<?php echo $i; ?>" id="trnfplantingsowingenddate<?php echo $i; ?>" type="text" size="11" maxlength="10" onkeyup="ValidaEscrituraFecha(this);" onblur="ValidaFecha(this);" value="">
                            </div>
                        </div>
                        <div class="col-sm-6 form-group control-type-text">
                            <div class="col-sm-4">Physiological Maturity Start Date:</div> 
                            <div class=" col-sm-4 control-type-text">
                                <input class="DateInput form-control" placeholder="yyyy-mm-dd" name="trnfphysiologicalmaturitystardate<?php echo $i; ?>" id="trnfphysiologicalmaturitystardate<?php echo $i; ?>" type="text" size="11" maxlength="10" onkeyup="ValidaEscrituraFecha(this);" onblur="ValidaFecha(this);" value="">                                </div>
                        </div>
                        <div class="col-sm-6 form-group control-type-text">
                            <div class="col-sm-4">Physiological Maturity End Date:</div> 
                            <div class=" col-sm-4 control-type-text">
                                <input class="DateInput form-control" placeholder="yyyy-mm-dd" name="trnfphysiologicalmaturityenddate<?php echo $i; ?>" id="trnfphysiologicalmaturityenddate<?php echo $i; ?>" type="text" size="11" maxlength="10" onkeyup="ValidaEscrituraFecha(this);" onblur="ValidaFecha(this);" value="">
                            </div>
                        </div>
                        <div class="col-sm-6 form-group control-type-text">
                            <div class="col-sm-4">Harvest Start Date:</div> 
                            <div class=" col-sm-4 control-type-text">
                                <input class="DateInput form-control" placeholder="yyyy-mm-dd" name="trnfharveststartdate<?php echo $i; ?>" id="trnfharveststartdate<?php echo $i; ?>" type="text" size="11" maxlength="10" onkeyup="ValidaEscrituraFecha(this);" onblur="ValidaFecha(this);" value="">                                </div>
                        </div>
                        <div class="col-sm-6 form-group control-type-text">
                            <div class="col-sm-4">Harvest End Date:</div> 
                            <div class=" col-sm-4 control-type-text">
                                <input class="DateInput form-control" placeholder="yyyy-mm-dd" name="trnfharvestenddate<?php echo $i; ?>" id="trnfharvestenddate<?php echo $i; ?>" type="text" size="11" maxlength="10" onkeyup="ValidaEscrituraFecha(this);" onblur="ValidaFecha(this);" value="">
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="varieties">
                        <div class="panel panel-default">
                            <!-- Default panel contents -->
                            <div class="panel-heading Title1" style="color:#595959;">Varieties</div>
                            <div class="panel-body" style="padding-top: 5px; padding-bottom: 5px; background: #EEEEEE;">
                                <div class="col-sm-1" style="padding-left: 0px; padding-right: 0px; width: 50px;">Search:</div> 
                                <div class=" col-sm-4 control-type-text">
                                    <input class="SearchInput form-control"  name="Variety<?php echo $i; ?>" id="Variety<?php echo $i; ?>" onkeyup="FilterVariety(this, <?php echo $i; ?>);" type="text" size="36" maxlength="255" value="">
                                </div>
                                <div class="DivColIcon">
                                    <span id="DivFilterVariety<?php echo $i; ?>" style="display:none;"><?php echo image_tag('loading4.gif', array('size' => '18x18')); ?></span>
                                    <!--<span id="DivFilterVarietyOK<?php echo $i; ?>" style="display:none;"><?php echo image_tag('success.png', array('size' => '18x18')); ?></span>-->
                                    <span id="DivClearFilterVariety<?php echo $i; ?>" style="display:none;" class="Span-Action-Link" onclick="ClearFilterVariety(<?php echo $i; ?>);" title="Clear"><?php echo image_tag("/images/cross.png", array('size' => '18x18')); ?></span>
                                    <span id="DivCreateNewVariety" title="Create new Variety" data-toggle="modal" onclick="GetInfoRowV(<?php echo $i; ?>);" data-target="#ModalCreateNewVariety"><?php echo image_tag("/images/add-icon.png", array('size' => '18x18')); ?></span>

                                </div>
                            </div>
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr style="background: #D6D6D6;">
                                        <th>Name</th>
                                        <th>Origin</th>
                                        <th>Synonymous</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody  id="InfoVariety<?php echo $i; ?>"></tbody>
                                <tbody  id="InfoVarietySelected<?php echo $i; ?>"></tbody>
                            </table>
                        </div>
                    </fieldset>
                    <fieldset class="variablesMeasured">
                        <div class="panel panel-default">
                            <!-- Default panel contents -->
                            <div class="panel-heading Title1" style="color:#595959;">Variables Measured</div>
                            <div class="panel-body" style="padding-top: 5px; padding-bottom: 5px; background: #EEEEEE;">
                                <div class="col-sm-1" style="padding-left: 0px; padding-right: 0px; width: 50px;">Search:</div> 
                                <div class=" col-sm-4 control-type-text">
                                    <input class="SearchInput form-control"  name="VariablesMeasured<?php echo $i; ?>" id="VariablesMeasured<?php echo $i; ?>" onkeyup="FilterVariablesMeasured(this, <?php echo $i; ?>);" type="text" size="36" maxlength="255" value="">
                                </div>
                                <div class="DivColIcon">
                                    <span id="DivFilterVariablesMeasured<?php echo $i; ?>" style="display:none;"><?php echo image_tag('loading4.gif', array('size' => '18x18')); ?></span>
                                    <!--<span id="DivFilterVariablesMeasuredOK<?php echo $i; ?>" style="display:none;"><?php echo image_tag('success.png', array('size' => '18x18')); ?></span>-->
                                    <span id="DivClearFilterVariablesMeasured<?php echo $i; ?>" style="display:none;" class="Span-Action-Link" onclick="ClearFilterVariablesMeasured(<?php echo $i; ?>);" title="Clear"><?php echo image_tag("/images/cross.png", array('size' => '18x18')); ?></span>
                                    <span id="DivCreateNewVariablesMeasured" title="Create new variable measured" data-toggle="modal" onclick="GetInfoRowVM(<?php echo $i; ?>);" data-target="#ModalCreateNewVariablesMeasured"><?php echo image_tag("/images/add-icon.png", array('size' => '18x18')); ?></span>

                                </div>
                            </div>
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr style="background: #D6D6D6;">
                                        <th>Name</th>
                                        <th>Trait class</th>
                                        <th>Definition</th>
                                        <th>Unit</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody  id="InfoVariablesMeasured<?php echo $i; ?>"></tbody>
                                <tbody  id="InfoVariablesMeasuredSelected<?php echo $i; ?>"></tbody>
                            </table>
                        </div>
                    </fieldset>
                    <fieldset class="dataInformation">
                        <div class="panel panel-default" style="margin-bottom: 5px;">
                            <div class="panel-heading Title1" style="color:#595959;">Data Information</div>
                            <div class="panel-body" style="padding-top: 15px; padding-bottom: 5px; padding-left: 0px; background: #EEEEEE;">
                                <div id="DivData<?php echo $i; ?>" style="display:none;" class="DivDataCrop col-sm-12 form-group control-type-text">
                                    <div class="col-sm-3">Download Data Template:</div>
                                    <div class=" col-sm-4 control-type-text">
                                        <button class="btn btn-action" type="button" name="DownloadDataTemplate" id="DownloadDataTemplate" onclick="DownloadDataTemplateCrop(<?php echo $i; ?>);" title="Download Data Template"><span aria-hidden="true" class="glyphicon glyphicon-download"></span> Download</button>      
                                    </div>
                                </div>

                                <div class="col-sm-12 form-group control-type-text">
                                    <div class="col-sm-3">Upload Data Template:</div>
                                    <div class=" col-sm-4 control-type-text">
                                        <input type="file" id="TemplateData<?php echo $i; ?>" name="TemplateData<?php echo $i; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-12 form-group control-type-text">
                                    <div class="col-sm-3">Results File:</div>
                                    <div class=" col-sm-4 control-type-text">
                                        <input type="file" id="trnfdataorresultsfile<?php echo $i; ?>" name="trnfdataorresultsfile<?php echo $i; ?>">        
                                    </div>
                                </div>
                                <div class="col-sm-12 form-group control-type-text">
                                    <div class="col-sm-3">Suppplemental Information File:</div>
                                    <div class=" col-sm-4 control-type-text">
                                        <input type="file" id="trnfsuppplementalinformationfile<?php echo $i; ?>" name="trnfsuppplementalinformationfile<?php echo $i; ?>">        
                                    </div>
                                </div>
                                <div class="col-sm-12 form-group control-type-text">
                                    <div class="col-sm-3">Weather File:</div>
                                    <div class=" col-sm-4 control-type-text">
                                        <input type="file" id="trnfweatherdatafile<?php echo $i; ?>" name="trnfweatherdatafile<?php echo $i; ?>">        
                                    </div>
                                </div>
                                <div class="col-sm-12 form-group control-type-text">
                                    <div class="col-sm-3">Soil File:</div>
                                    <div class=" col-sm-4 control-type-text">
                                        <input type="file" id="trnfsoildatafile<?php echo $i; ?>" name="trnfsoildatafile<?php echo $i; ?>">        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 form-group control-type-text">
                            <button title="Remove Crop" id="deletecrop" name="deletecrop" type="button" class="btn btn-action" onclick="DeleteNewCrop(<?php echo $i; ?>);"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span> Remove Crop</button>
                        </div>
                    </fieldset>
                </div>
            <?php } ?>
            </br>
            <p style=" border-bottom-color:#6CB662; border-bottom-style:dashed; border-bottom-width:2px; border-top-width:1px;"></p>

            <div class="col-sm-6 form-group control-type-text">
                <button class="btn btn-action" type="button" name="nuevocrop" id="nuevocrop" title="Add New Crop"><span aria-hidden="true" class="glyphicon glyphicon-plus"></span> Add New Crop</button>
                <input type="hidden" value="1" id="filacrop" name="filacrop">
            </div>
            <div class="clearfix"></div>
            <!--fin: INGRESO NUEVA INFORMACION POR CULTIVO-->
        </div>
    </div>

    <div class="clearfix"></div>
    <div id="buttons-block" class="BotonAcciones">
        <?php include_partial('trial/form_actions', array('tb_trial' => $tb_trial, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
    </div>
</div>

<!-- Modal Create New Variables Measured-->
<div class="container">
    <div class="modal fade" id="ModalCreateNewVariablesMeasured" role="dialog">
        <div class="modal-content">
            <div style="margin-top: 13px;" class="col-md-12 sf_admin_form">
                <span class="Title">New Variables measured</span>
                <form id="FormCreateNewVariablesMeasured" class="form-horizontal" action="">
                    <div style="margin-top: 10px; margin-bottom: 10px;" class="Session">
                        <div style="margin-left: 0px;" class="form-group control-type-text">All fields marked with <span class="Mandatory">*</span> are required.</div>
                        <fieldset>
                            <div class="form-group col-md-12">
                                <div class="col-sm-3"><span class="Mandatory">*</span> Crop:</div>
                                <div class="col-sm-6 control-type-text control-name-vrmsshortname">
                                    <?php echo select_from_table("id_crop_variablesmeasured", "TbCrop", "id_crop", "crpname", null, null, "class='form-control'"); ?>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="col-sm-3"><span class="Mandatory">*</span> Trait class:</div>
                                <div class="col-sm-6 control-type-text control-name-vrmsshortname">
                                    <?php echo select_from_table("id_traitclass", "TbTraitclass", "id_traitclass", "trclname", null, null, "class='form-control'"); ?>                   
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="col-sm-3"><span class="Mandatory">*</span> Name:</div>
                                <div class="col-sm-6 control-type-text control-name-vrmsshortname">
                                    <input type="text" name="vrmsname" class="form-control" id="vrmsname">                                   
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="col-sm-3">Short name:</div>
                                <div class="col-sm-6 control-type-text control-name-vrmsshortname">
                                    <input type="text" name="vrmsshortname" class="form-control" id="vrmsshortname">                                   
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="col-sm-3">Definition:</div>
                                <div class="col-sm-6 control-type-text control-name-vrmsdefinition">
                                    <input type="text" name="vrmsdefinition" class="form-control" id="vrmsdefinition">                                   
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="col-sm-3">Method:</div>
                                <div class="col-sm-6 control-type-text control-name-vrmnmethod">
                                    <input type="text" name="vrmnmethod" class="form-control" id="vrmnmethod">                                    
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="col-sm-3"><span class="Mandatory">*</span> Unit:</div>
                                <div class="col-sm-6 control-type-text control-name-vrmsunit">
                                    <input type="text" name="vrmsunit" class="form-control" id="vrmsunit">                                   
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="modal-footer">
                        <button title="Save" id="SaveAddVariablesMeasured" name="SaveAddVariablesMeasured" type="button" class="btn btn-action" onclick="AddVariablesMeasured();"><span class="glyphicon glyphicon-save" aria-hidden="true"></span> Save</button>
                        <button title="Close" id="CloseAddVariablesMeasured" name="CloseAddVariablesMeasured" type="button" class="btn btn-action" data-dismiss="modal"> Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Modal Create New Variety--> 
<div class="container">
    <div class="modal fade" id="ModalCreateNewVariety" role="dialog">
        <div class="modal-content">
            <div style="margin-top: 13px;" class="col-md-12 sf_admin_form">
                <span class="Title">New Variety</span>
                <form id="FormCreateNewVariety" class="form-horizontal" action="">
                    <div style="margin-top: 10px; margin-bottom: 10px;" class="Session">
                        <div style="margin-left: 0px;" class="form-group control-type-text">All fields marked with <span class="Mandatory">*</span> are required.</div>
                        <fieldset>
                            <div class="form-group col-md-12">
                                <div class="col-sm-3"><span class="Mandatory">*</span> Crop:</div>
                                <div class="col-sm-6 control-type-text control-name-vrmsshortname">
                                    <?php echo select_from_table("id_crop_variety", "TbCrop", "id_crop", "crpname", null, null, "class='form-control'"); ?>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="col-sm-3"><span class="Mandatory">*</span> Origin:</div>
                                <div class="col-sm-6 control-type-text control-name-vrmsshortname">
                                    <input type="text" name="vrtorigin" class="form-control" id="vrtorigin">                                   
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="col-sm-3"><span class="Mandatory">*</span> Name:</div>
                                <div class="col-sm-6 control-type-text control-name-vrmsshortname">
                                    <input type="text" name="vrtname" class="form-control" id="vrtname">                                   
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="col-sm-3">Synonymous:</div>
                                <div class="col-sm-6 control-type-text control-name-vrmsshortname">
                                    <input type="text" name="vrtsynonymous" class="form-control" id="vrtsynonymous">                                   
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="col-sm-3">Description:</div>
                                <div class="col-sm-6 control-type-text control-name-vrmsshortname">
                                    <input type="text" name="vrtdescription" class="form-control" id="vrtdescription">                                   
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="modal-footer">
                        <button title="Save" id="SaveAddVariety" name="SaveAddVariety" type="button" class="btn btn-action" onclick="AddVariety();"><span class="glyphicon glyphicon-save" aria-hidden="true"></span> Save</button>
                        <button title="Close" id="CloseAddVariety" name="CloseAddVariety" type="button" class="btn btn-action" data-dismiss="modal"> Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>