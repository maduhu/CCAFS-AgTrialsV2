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
?>
<div class="page-header">
    <h1 class="title-module">Batch Upload Trials (Error in the Template Files)</h1>
</div>
<br>
<fieldset>
    <legend>&ensp;<b>Info</b>&ensp;</legend>
    <span><img src='/images/attention-icon.png'><b>Trial Template File:</b> <?php echo "$TrialFileName ($TrialFileSizeMB)MB"; ?></span><br>
    <?php if ($TrialDataFileName != '') { ?>
        <span><img src='/images/attention-icon.png'><b>Trial Data Template File:</b> <?php echo "$TrialDataFileName ($TrialDataFileSizeMB)MB"; ?></span><br>
    <?php } ?>
</fieldset>
<br><br>
<fieldset>
    <legend>&ensp;<b>Remember</b>&ensp;</legend>
    <span><img src='/images/attention-icon.png'> Templates Files must have <b>.xls</b> extension and must be smaller than <b>5 MB</b> maximum size </span><br>
    <span><img src='/images/attention-icon.png'> Compressed File must have <b>.zip</b> extension and must be smaller than <b>20 MB</b> maximum size </span><br>
    <span><img src='/images/attention-icon.png'> Max. <b>300</b> trials with result templates files data </span><br>
    <span><img src='/images/attention-icon.png'> Max. <b>1000</b> trials without result templates files data </span><br>
</fieldset>
<br><br>
<fieldset>
    <div class="form-group control-type-text" style="margin-left: 0px; margin-right: 0px;">
        <button class="btn btn-action" type="button" title=" Back " id="Back" neme="Back" onclick="history.back();"> <span class ="glyphicon glyphicon-step-backward" aria-hidden="true"></span>&ensp;Back&ensp;</button>
    </div>
</fieldset>