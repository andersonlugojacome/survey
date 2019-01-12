
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">Nuevo empleado</h4>
            </div>
            <div class="card-content table-responsive">


                <form class="form-horizontal" method="post" id="addproduct" action=".\?view=addclient" role="form">

                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 control-label">Nombre*</label>
                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 control-label">Apellido*</label>
                        <div class="col-md-6">
                            <input type="text" name="lastname" required class="form-control" id="lastname" placeholder="Apellido">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputcc" class="col-lg-2 control-label">C.C.*</label>
                        <div class="col-md-6">
                            <input type="text" name="cc" required class="form-control" id="cc" placeholder="cc">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 control-label">Direccion*</label>
                        <div class="col-md-6">
                            <input type="text" name="address" class="form-control" required id="address" placeholder="Direccion">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 control-label">Email*</label>
                        <div class="col-md-6">
                            <input type="text" name="email" class="form-control" id="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 control-label">Telefono*</label>
                        <div class="col-md-6">
                            <input type="text" name="phone" class="form-control" id="phone" placeholder="Telefono">
                        </div>
                    </div>
                    <div class="form-group">
              <label for="isDr" class="col-lg-2 control-label">Es Abogado</label>
              <div class="col-md-6">
                  <div class="checkbox">
                      <label>
                          <input type="checkbox" name="is_dr">
                      </label>
                  </div>
              </div>
          </div>

                    <p class="alert alert-info">* Campos obligatorios</p>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button type="submit" class="btn btn-primary">Agregar Cliente</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
