<style type="text/css">
    div.sidebar, nav.navbar, footer {
        display: none;
    }

    div.main-panel {
        float: none;
        width: 100%;
    }

    .general {
        background-image: url(themes/notaria62web/css/images/background.jpg);
        background-size: cover;
        background-position: center;
        position: absolute;
        width: 100%;
    }

    .logo {
        background-image: url(themes/notaria62web/css/images/logonotaria62azul.png);
        background-size: cover;
        width: 77px;
        height: 80px;
        margin-top: 15px;
        margin-bottom: 15px;
    }

    .transparencia {
        height: 150px;
        background-color: rgba(0, 0, 0, 0.30);
    }

    .main-panel > .content {
        margin-top: 0px;
        padding: 0;
    }
</style>
<div class="row">
    <div class="general">
        <div class="container">
            <div class="logo"></div>
        </div>
        <div class="transparencia"></div>
    </div>
</div>
<div class="row" style="margin-top:100px;">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">
                    Envianos un email
                </h4>
            </div>
            <div class="card-content table-responsive">
                <form id="formSendEmailTo" role="form" method="post" action="./?action=sendemailto">
                    <input type="hidden" name="action" value="sendemailto" />

                            <div class="row">
                                <div class="form-group col-xs-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="" class="bmd-label-floating">Correo electrónico</label>
                                        <input type="email" class="form-control" id="emailFrom" name="emailFrom" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="bmd-label-floating">Titulo / Radicado / E.P.</label>
                                        <input type="text" class="form-control" id="subjet" name="subjet" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="bmd-label-floating">Mensaje</label>
                                        <textarea rows="2" class="form-control" id="message" name="message" required ></textarea>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-xs-12 col-sm-12">
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </div>
                            </div>

                    <div class="nota">
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
