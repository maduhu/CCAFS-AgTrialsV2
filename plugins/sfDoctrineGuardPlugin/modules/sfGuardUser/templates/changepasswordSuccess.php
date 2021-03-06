<script>
    $(document).ready(function () {
        //DEFINICION DE CAMPOS OBLIGATORIOS
        var CamposObligatorios = {
            'newpassword': 'Password',
            'confirmnewpassword': 'Repeat password'
        };

        //inicio: VALIDAMOS EL ENVIO DEL FORMULARIO
        $("#SubmitChangepassword").click(function (event) {
            var Ico = "<img src='/images/bullet-black-icon.png'> ";
            var BanderaFaltantes = false;
            var MensajeFaltantes = "";
            $.each(CamposObligatorios, function (Id, Campo) {
                if ($('#' + Id).val() == '') {
                    BanderaFaltantes = true;
                    MensajeFaltantes += "&ensp;&ensp;&ensp; " + Ico + Campo + " <br>";
                    CampoObligatorio(Id);
                } else {
                    CampoNormalObligatorio(Id);
                }
            });

            //VERIFICACION MENSAJE DE ALERTA
            if (BanderaFaltantes) {
                Mensaje(MensajeFaltantes);
                event.preventDefault();
            } else {
                $('#div_loading').show();
                $('#FormChangepassword').submit();
            }
        });

        $("#newpassword").blur(function () {
            ValidaPassword();
        });
        $("#confirmnewpassword").blur(function () {
            ValidaPassword();
        });

        function ValidaPassword() {
            var Icon = "<img width='13' height='13' src='/images/bullet-black-icon.png'> ";
            var newpassword = $('#newpassword').val();
            var confirmnewpassword = $('#confirmnewpassword').val();
            if ((newpassword != '') && (confirmnewpassword != '')) {
                if (newpassword != confirmnewpassword) {
                    alerts.show({css: 'error', title: 'Required Fields', message: Icon + " The two passwords must be the same"});
                    $('#newpassword').val('');
                    $('#confirmnewpassword').val('');
                }
            }
        }
    });
</script>

<div style="margin-top: 10px;">
    <span class="Title">Change Password</span>
</div>
<?php if (isset($Notice)) { ?>
    <span>
        <div class="alert alert-success">
            <?php echo $Notice; ?>
        </div>
    </span>
<?php } ?>
<div id="div_loading" class="loading" align="center" style="display:none;">
    <?php echo image_tag('loading.gif'); ?>
    <br>Please Wait...
</div>
<div class="Session" style="margin-top: 10px; margin-bottom: 10px; border-bottom-width: 0px; padding: 10px; border-top-width: 10px;">
    <form class="form-horizontal" id="FormChangepassword" name="FormChangepassword" action="" enctype="multipart/form-data" method="post" autocomplete="off">
        <fieldset>
            <div class="form-group control-type-text">
                <div class="col-sm-2">Username:</div>

                <div class=" col-sm-4 control-type-text">
                    <input class="form-control" type="text" name="username" id="username" value="<?php echo sfContext::getInstance()->getUser()->getUsername(); ?>" readonly/>   
                </div>
            </div>
            <div class="form-group control-type-text">
                <div class="col-sm-2">Password:</div>

                <div class=" col-sm-4 control-type-text">
                    <input class="form-control" type="password" name="newpassword" id="newpassword"/>                           
                </div>
            </div>
            <div class="form-group control-type-text">
                <div class="col-sm-2">Repeat password:</div>

                <div class=" col-sm-4 control-type-text">
                    <input class="form-control" type="password" name="confirmnewpassword" id="confirmnewpassword"/>                           
                </div>
            </div>
        </fieldset>
    </form>
</div>
<div class="form-group control-type-text" style="margin-left: 10px; margin-right: 0px;">
    <button class="btn btn-action" type="button" title=" Submit " id="SubmitChangepassword" neme="SubmitChangepassword"><span class="glyphicon glyphicon-saved" aria-hidden="true"></span>&ensp;Submit&ensp;</button>
</div>