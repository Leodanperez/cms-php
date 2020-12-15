<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>DataTables</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">
            <a href="#">Home</a>
          </li>
          <li class="breadcrumb-item active">DataTables</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">

        <div class="card">
          <div class="card-header">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddUser">Agregar Usuarios</button>
          </div>

          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Image</th>
                  <th>Nombre</th>
                  <th>Usuario</th>
                  <th>Perfil</th>
                  <th>Estado</th>
                  <th class="text-center">Acciones</th>
                </tr>
              </thead>
              <tbody>

                <?php
                  $item = null;
                  $valor = null;
                  $user = UserController::showUser($item,$valor);  
                  
                  foreach ($user as $key => $value) {
                    echo '<tr>
                          <td>'.$key.'</td>
                          <td class="text-center">';
                          if ($value["foto"] != "") {
                            echo '<img src="'.$value["foto"].'" class="img-fluid" width="50px">';
                          } else {
                            echo '<img src="https://thumbs.dreamstime.com/b/default-avatar-profile-image-vector-social-media-user-icon-potrait-182347582.jpg" class="img-fluid" width="50px">';
                          }                            
                          echo '</td>
                          <td>'.$value["nombre"].'</td>
                          <td>'.$value["usuario"].'</td>
                          <td>'.$value["perfil"].'</td>';

                          if($value["estado"] != 0){
                            echo '<td>
                                  <button class="btn btn-success btn-xs btnActivar" idUser="'.$value["id"].'" estadoUser="0">Activado</button>
                                </td>';
                          } else {
                            echo '<td>
                                  <button class="btn btn-danger btn-xs btnActivar" idUser="'.$value["id"].'" estadoUser="1">Desactivado</button>
                                </td>';
                          }
                          echo '
                          <td class="text-center">
                            <a href="" class="btn btn-info">
                              <i class="fas fa-edit"></i>
                            </a>
                            <a href="" class="btn btn-danger">
                              <i class="fas fa-trash-alt"></i>
                            </a>
                          </td>
                        </tr>';
                  }
                ?>                  

              </tbody>
              <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Image</th>
                  <th>Nombre</th>
                  <th>Usuario</th>
                  <th>Perfil</th>
                  <th>Estado</th>
                  <th class="text-center">Acciones</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>

      </div>

    </div>

  </div>

</section>

<div class="modal fade" id="modalAddUser">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h4 class="modal-title">Agregar Usuario</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" enctype="multipart/form-data">
        <div class="modal-body">

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="fas fa-user"></i>
              </span>
            </div>
            <input type="text" class="form-control" name="newName" placeholder="Ingrese su nombre">
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="fas fa-key"></i>
              </span>
            </div>
            <input type="text" class="form-control" name="newUser" id="newUser" placeholder="Ingresar usuario">            
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="fas fa-lock"></i>
              </span>
            </div>
            <input type="password" class="form-control" name="newPassword" placeholder="Ingresar contraseña">
          </div>
          
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="fas fa-users"></i>
              </span>
            </div>
            <select class="form-control" name="newPerfil">
              <option>-- Seleccione --</option>
              <option value="Administrador">Administrador</option>
              <option value="Especial">Especial</option>
              <option value="Vendedor">Vendedor</option>
            </select>
          </div>

          <h5 class="mt-4 mb-2">SUBIR FOTO</h5>
          <div class="input-group">
            <div class="custom-file">
              <input type="file" class="custom-file-input nuevaFoto" name="nuevaFoto">
              <label class="custom-file-label" for="nuevaFoto">Subir archivo</label>
            </div>
          </div>

          <p class="help-block">Peso Máximo de la foto es de 2MB</p>
          <img src="" class="img-thumbnail prevImageFoto" style="width:100px">

          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismis="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
          </div>
        </div>
        <?php 
          $user = new UserController();
          $user -> createUser();
        ?>
      </form>
    </div>
  </div>
</div>