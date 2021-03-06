<?php use_helper('I18N', 'Date') ?>
<?php include_partial('traitclass/assets') ?>
<div class="row">
    <div class="col-md-2 left-column">
        <?php include_partial('admin/ModuleMenu') ?>
    </div>
    <div class="col-md-10 sf_admin_form" style="margin-top: 13px;">
        <?php $Notice = MessageNotice(); ?>
        <?php if ($Notice != ""): ?>
            <div class="alert alert-danger alert-block">
                <a href="#" class="close fade" data-dismiss="alert">&times;</a>
                <?php echo $Notice; ?>
            </div>
        <?php endif; ?>
        <span class="Title">Trait class</span>
        <div class="pull-right">
            <a href="#filterPopup" class="btn btn-action" data-toggle="modal"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Filter</a>
        </div>
        <div class="Session" style="margin-top: 10px; margin-bottom: 10px;">
            <div id="sf_admin_container" style="margin-top: -15px;">
                <?php
                $filterValues = $sf_user->getRawValue()->getAttribute($this->getModuleName() . '.filters', array(), 'admin_module');
                if (!empty($filterValues)):
                    ?>
                    <div class="alert alert-info alert-block">
                        <a href="#" class="close fade" data-dismiss="alert">&times;</a>
                        These results are filtered. <a href="#filterPopup" data-toggle="modal">Modify filter</a>
                    </div>
                <?php endif; ?>
                <?php include_partial('traitclass/flashes') ?>
                <?php include_partial('traitclass/list_header', array('pager' => $pager)) ?>
                <div id="sf_admin_content">
                    <form action="<?php echo url_for('tb_traitclass_collection', array('action' => 'batch')) ?>" method="post">
                        <?php include_partial('traitclass/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
                    </form>
                </div>
                <div id="sf_admin_footer">
                    <?php include_partial('traitclass/list_footer', array('pager' => $pager)) ?>
                </div>
                <?php include_partial('traitclass/filters', array('form' => $filters, 'configuration' => $configuration)) ?>
            </div>
        </div>
        <?php include_partial('traitclass/list_actions', array('helper' => $helper)) ?>
    </div>
</div>