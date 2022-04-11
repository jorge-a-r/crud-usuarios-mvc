
<!-- CONTENT HEADER -->
<section class="content-header">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h2>Administrar usuarios</h2>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right bg-white">
                <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                <li class="breadcrumb-item active">Gestor usuarios</li>
            </ol>
        </div>
    </div>
    <hr>
</section>

<!-- CONTENT -->
<section class="content">
    <div class="row mb-2">
            <div class="col-sm-6">
                <div class="btn-agregar-usuario">
                    <button type="button" class="btn btn-primary btn-sm mb-4" data-toggle="modal" data-target="#modal-actualizar-usuario" data-dismiss="modal">Agregar Usuario</button>
                </div>
            </div>
            <div class="col-sm-3"></div>
            <div class="col-sm-3">
                <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Buscar</span>
                    </div>
                    <input type="text" name="Buscar" id="buscar-usuario" class="form-control">
                </div>
            </div>
        </div>
    <div class="table-responsive">
        <table id="tabla-usuarios" class="table table-striped table-bordered table-sm">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Nombre del usuario</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="tabla-usuarios-body">

            </tbody>
        </table>
    </div>
</section>

<!-- Modal alta usuario -->
<div class="modal fade" id="modal-actualizar-usuario">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar un Usuario</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="" name="Alta-usuarios" id="form-alta-usuarios">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese el nombre de la persona" required minlength="6" maxlength="100" autocomplete="off">
                            </div>
                            <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Ingrese el e-mail del usuario" required autocomplete="off">
                            </div>
                            <div class="form-group">
                            <input type="text" name="username" id="username" class="form-control" placeholder="Ingrese un nombre de usuario" required minlength="3" maxlength="50" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="password" name="user-password" id="user-password" class="form-control" placeholder="Ingrese la contraseña (8 caracteres o más)" required minlength="8">
                            </div>
                            <div class="form-group">
                                <input type="password" name="user-password-conf" id="user-password-conf" class="form-control" placeholder="Confirmar contraseña" required minlength="8">
                            </div>
                            <div class="form-group">
                                <select name="roles" id="roles" class="form-control" required>
                                    <option value="0" disabled selected>Asignar un rol...</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success float-left" value="Aceptar">
                    <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){

        //Inserta los elementos a la tabla de usuarios
        function cargar_lista_usuarios(response){
            let obj;
            let tabla_usuarios_body = document.querySelector('#tabla-usuarios-body');

            for (let i = 0; i < response.length; i++) {
                obj = response[i];
                tabla_usuarios_body.innerHTML += 
                "<tr>"+
                    "<td>"+obj.id_user+"</td>"+
                    "<td>"+obj.nombre+"</td>"+
                    "<td>"+obj.email+"</td>"+
                    "<td>"+obj.username+"</td>"+
                    "<td>"+obj.nombre_rol+"</td>"+
                    "<td class='px-4'>"+"<a onclick=\"cargar_contenido('content-wrapper', 'VISTA UPDATE AQUI')\" class='btn btn-sm btn-info' href='#'>Modificar</a>"+
                    "<a onclick=\"cargar_contenido('content-wrapper', 'VISTA ELIMINAR AQUI')\" class='btn btn-sm btn-danger' href='#'>Eliminar</a>"+"</td>"+
                "</tr>";  
            }
        }

        /*function filtrarUsuarios(response){
            let obj;
            let tabla_usuarios_body = document.querySelector('#tabla-usuarios-body');

            for (let i = 0; i < response.length; i++) {
                obj = response[i];
                tabla_usuarios_body.innerHTML = "";
                tabla_usuarios_body.innerHTML += 
                "<tr>"+
                    "<td>"+obj.id_user+"</td>"+
                    "<td>"+obj.nombre+"</td>"+
                    "<td>"+obj.email+"</td>"+
                    "<td>"+obj.username+"</td>"+
                    "<td>"+obj.nombre_rol+"</td>"+
                    "<td class='px-4'>"+"<a onclick=\"cargar_contenido('content-wrapper', 'VISTA UPDATE AQUI')\" class='btn btn-sm btn-info' href='#'>Modificar</a>"+
                    "<a onclick=\"cargar_contenido('content-wrapper', 'VISTA ELIMINAR AQUI')\" class='btn btn-sm btn-danger' href='#'>Eliminar</a>"+"</td>"+
                "</tr>";  
            }
        }*/

        //ajax get request para cargar la lista de usuarios en la tabla
        $.ajax({
            url: "ajax/usuarios.ajax.php/a_get_usuarios",
            method: "GET",
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta){
                let res = $.parseJSON(respuesta);
                cargar_lista_usuarios(res);
            }
        });

        //ajax get request para cargar la lista de roles en el select
        $.ajax({
            url: 'ajax/roles.ajax.php/a_get_roles',
            method: 'GET',
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta){
                let res = $.parseJSON(respuesta);
                let obj;
                let select = document.querySelector('#roles');
                //console.log(tabla_usuarios_body);

                for (let i = 0; i < res.length; i++) {
                    obj = res[i];
                    roles.innerHTML += 
                        "<option value=\""+obj.rol_id+"\">"+
                        obj.nombre_rol+
                        "</option>";
                }
            }
        });

        //ajax POST request para crear usuario nuevo
        let form_submit = document.querySelector('#form-alta-usuarios');
        let pwd_input = document.querySelector('#user-password');
        let pwd_input_2= document.querySelector('#user-password-conf');

        $(form_submit).on('submit', function(){
            let usuario = {
                nombre: document.querySelector('#nombre').value,
                email: document.querySelector('#email').value,
                username: document.querySelector('#username').value,
                user_password: pwd_input.value,
                user_password_2: pwd_input_2.value,
                rol_id: document.querySelector('#roles').value
            };

            console.log(usuario);

            if (usuario.user_password_2 != usuario.user_password) {
                pwd_input_2.setCustomValidity('Las contraseñas deben coincidir');  
                return false; 
            }
            else{
                pwd_input_2.setCustomValidity('');
            }
            
            //console.log(usuario);
            //return false;

           /* $.ajax({
            url:'controllers/c_usuarios/create_usuario',
            method: 'POST',
            data:{
                nombre: nombre_user.value,
                email: email_user.value,
                username: username.value,
                user_password: pwd_user.value,
                rol_id: rol.value
            },
            dataType: 'text',
            succes: function(respuesta){

            }
            });*/
        });

        /*Filtrar usuarios en la lista
        let buscar_usuario = document.querySelector('#buscar-usuario');

        $(buscar_usuario).keyup(function(){
            let valor = this.value;

            $.ajax({
                url: 'ajax/usuarios.ajax.php/a_get_usuario_by_nombre',
                method: 'POST',
                data: {
                    search: 1,
                    q: valor
                },
                dataType: 'text',
                success: function(respuesta){
                    let res = $.parseJSON(respuesta);
                    filtrarUsuarios(res);
                }
            });
        });*/
    })
</script>