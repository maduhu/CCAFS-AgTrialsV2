<?php
use_javascript('batchuploadtrials.js');
use_javascript('trial.js');
?>
<div class="row">
    <div class="col-md-2 left-column">
        <div class="MenuTrials">
            <div onclick="window.location.href = '/searchtrials'" class="MenuTrialsButton">Search Trials</div>
            <div onclick="window.location.href = '/trial/new'" class="MenuTrialsButton">Add new Trial </div>
            <div onclick="window.location.href = '/batchuploadtrials'" class="MenuTrialsButton selected">Batch Upload Trials</div>
        </div>
    </div>
    <div class="col-md-10 sf_admin_form" style="margin-top: 13px;">
        <?php if ($Form == "Step1") { ?>
            <?php use_javascript('introJs/batchUploadTrialsStep1.js'); ?>
            <?php echo ModuleHelp('Batch Upload Trials Step 1'); ?>
            <span class="Title">Batch Upload Trials</span>
            <div class="Session">
                <form class="form-horizontal" id="FormStep1" name="FormStep1" action="" enctype="multipart/form-data" method="post" autocomplete="off">
                    <fieldset>
                        <div id="DivCrop1" class="form-group control-type-text" style="margin-bottom: 0px; margin-left: 0px; margin-right: 0px;">
                            <div id="information-block">
                                <fieldset style="margin-top: 10px; margin-left: 13px;">
                                    <span>Templates Files must have <b>.xls</b> extension and must be smaller than <b>5 MB</b> maximum size.</span></br>
                                    <span>Compressed File must have <b>.zip</b> extension and must be smaller than <b>20 MB</b> maximum size.</span></br>
                                    <span>Exact number of columns <b>'12'</b> for Trial Template File.</span></br>
                                    <span>Exact number of columns <b>'17'</b> for Trial Info Template File.</span></br>
                                    <span>Max. <b>300</b> trials with result templates files data.</span></br>
                                    <span>Max. <b>1000</b> trials without result templates files data.</span></br>
                                    <span>Don't close the window during the process.</span>
                                </fieldset>
                            </div>
                            <br>
                            <div id="crop-block">
                                <fieldset style="margin-top: 10px; margin-left: 13px;">
                                    <div class="form-group control-type-text">
                                        <div class="col-sm-2">Crop:</div>      
                                        <div class="col-sm-4 control-type-text">
                                            <?php echo select_from_table("id_crop1", "TbCrop", "id_crop", "crpname", null, null, "onchange='ValidaCrop(1);' class='form-control'"); ?>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <fieldset id="varieties-block">
                                <div class="panel panel-default">
                                    <!-- Default panel contents -->
                                    <div class="panel-heading Title1" style="color:#595959;">Varieties</div>
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
                            <fieldset id="variablesMeasured-block">
                                <div class="panel panel-default" style="margin-bottom: 5px;">
                                    <!-- Default panel contents -->
                                    <div class="panel-heading Title1" style="color:#595959;">Variables Measured</div>
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
                        </div>
                        <?php for ($i = 2; $i <= 10; $i++) { ?>
                            <div id="DivCrop<?php echo $i; ?>" class="form-group control-type-text" style="margin-bottom: 0px; margin-left: 0px; margin-right: 0px; display:none;">
                                <p style=" border-bottom-color:#6CB662; border-bottom-style:dashed; border-bottom-width:2px; border-top-width:1px;"></p>
                                <fieldset>
                                    <div class="form-group control-type-text">
                                        <div class="col-sm-2">Crop:</div>      
                                        <div class=" col-sm-4 control-type-text">
                                            <?php echo select_from_table("id_crop$i", "TbCrop", "id_crop", "crpname", null, null, "onchange='ValidaCrop($i);' class='form-control'"); ?>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
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
                                <fieldset>
                                    <div class="panel panel-default" style="margin-bottom: 5px;">
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
                                    <div class="col-sm-12 form-group control-type-text" style="margin-bottom: 10px; margin-left: 0px;">
                                        <button title="Remove Crop" id="deletecrop" name="deletecrop" type="button" class="btn btn-action" onclick="DeleteNewCrop(<?php echo $i; ?>);"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span> Remove Crop</button>
                                    </div>
                                </fieldset>

                            </div>
                        <?php } ?>
                        <br>

                        <p style=" border-bottom-color:#6CB662; border-bottom-style:dashed; border-bottom-width:2px; border-top-width:1px;"></p>
                        <div class="col-sm-12 form-group control-type-text" style="margin-left: 0px;">
                            <button class="btn btn-action" type="button" name="nuevocrop" id="nuevocrop" title="Add New Crop"><span aria-hidden="true" class="glyphicon glyphicon-plus"></span> Add New Crop</button>
                            <input type="hidden" value="1" id="filacrop" name="filacrop">
                        </div>
                        <br><br><br>
                        <div id="buttons-block1">
                            <div style="margin-left: 0px; padding-left: 15px;">
                                <button class="btn btn-action" type="button" title=" Next step " id="NextStep" neme="NextStep"><span class="glyphicon glyphicon-play" aria-hidden="true"></span>&ensp;Next step&ensp;</button>
                                <button class="btn btn-action" type="button" title=" Skip this step " id="SkipStep" neme="SkipStep"><span class="glyphicon glyphicon-step-forward" aria-hidden="true"></span>&ensp;Skip this step&ensp;</button>
                                <input type="hidden" value="" id="FormAction" name="FormAction"/>
                            </div>
                        </div>
                        <br>
                    </fieldset>
                </form>
            </div>

        <?php } else if ($Form == "Step2") { ?>
            <?php use_javascript('introJs/batchUploadTrialsStep2.js'); ?>
            <?php echo ModuleHelp('Batch Upload Trials Step 2'); ?>
            <span class="Title">Batch Upload Trials</span>
            <div id="div_loading" class="loading" align="center" style="display:none;">
                <?php echo image_tag('loading.gif'); ?>
                <br>Copying files to the server, please wait...
            </div>
            <div class="Session">
                <form class="form-horizontal" id="FormStep2" name="FormStep2" action="<?php echo url_for('@UploadTemplates'); ?>" enctype="multipart/form-data" method="post" autocomplete="off">
                    <div id="Information-block">
                        <fieldset style="margin-top: 10px; margin-left: 13px; padding-top: 10px;">
                            <span>Templates Files must have <b>.xls</b> extension and must be smaller than <b>5 MB</b> maximum size.</span></br>
                            <span>Compressed File must have <b>.zip</b> extension and must be smaller than <b>20 MB</b> maximum size.</span></br>
                            <span>Exact number of columns <b>'12'</b> for Trial Template File.</span></br>
                            <span>Exact number of columns <b>'17'</b> for Trial Info Template File.</span></br>
                            <span>Max. <b>300</b> trials with result templates files data.</span></br>
                            <span>Max. <b>1000</b> trials without result templates files data.</span></br>
                            <span>Don't close the window during the process.</span>
                        </fieldset>
                    </div>
                    <br>
                    <?php if ($Template) { ?>
                        <div id="TemplatePack-block">
                            <fieldset style="margin-top: 10px; margin-left: 13px;">
                                <div class="form-group control-type-text">
                                    <div class="col-sm-3">Template Pack:</div>
                                    <div class=" col-sm-4 control-type-text">
                                        <button class="btn btn-action" type="button" name="DownloadDataTemplate" id="DownloadDataTemplate"  onclick="window.location.href = '/trial/templatepack/'" title="Download Template Pack"><span aria-hidden="true" class="glyphicon glyphicon-download"></span> Download</button>      
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    <?php } ?>
                    <div id="TrialTemplateFile-block">
                        <fieldset style="margin-top: 10px; margin-left: 13px;">
                            <div class="form-group control-type-text">
                                <div class="col-sm-3">Trial Template File:</div>
                                <div class=" col-sm-4 control-type-text">
                                    <input type="file" name="TrialTemplateFile" id="TrialTemplateFile" value=""/>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div id="TrialInfoTemplateFile-block">
                        <fieldset style="margin-top: 10px; margin-left: 13px;">
                            <div class="form-group control-type-text">
                                <div class="col-sm-3">Trial Info Template File:</div>
                                <div class=" col-sm-4 control-type-text">
                                    <input type="file" name="TrialInfoTemplateFile" id="TrialInfoTemplateFile" value=""/>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div id="ZipFileTrialInfoDataTemplates-block">
                        <fieldset style="margin-top: 10px; margin-left: 13px;">
                            <div class="form-group control-type-text">
                                <div class="col-sm-3">Zip File Trial Info Data Templates:</div>
                                <div class=" col-sm-4 control-type-text">
                                    <input type="file" name="CompressedFileTrialInfoDataTemplates" id="CompressedFileTrialInfoDataTemplates" value=""/>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div id="ZipFiles-block">
                        <fieldset style="margin-top: 10px; margin-left: 13px;">
                            <div class="form-group control-type-text">
                                <div class="col-sm-3">Zip Files:</div>
                                <div class=" col-sm-4 control-type-text">
                                    <input type="file" name="CompressedFiles" id="CompressedFiles" value=""/>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div id="Buttons-block">
                        <fieldset style="margin-top: 10px; margin-left: 13px;">
                            <div class="form-group control-type-text" style="margin-left: 0px;">
                                <button class="btn btn-action" type="button" title=" Back " id="Back" neme="Back" onclick="history.back();"> <span class ="glyphicon glyphicon-step-backward" aria-hidden="true"></span>&ensp;Back&ensp;</button>
                                <button class="btn btn-action" type="button" title=" Execute " id="Execute" neme="Execute"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>&ensp;Execute&ensp;</button>
                                <input type="hidden" value="" id="FormAction" name="FormAction"/>
                            </div>
                        </fieldset>
                    </div>
                </form>
            </div>
        <?php } ?>
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
