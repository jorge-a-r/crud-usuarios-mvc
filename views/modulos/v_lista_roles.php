<!-- CONTENT HEADER -->
<section class="content-header">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h2>Administrar roles</h2>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right bg-white">
                <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                <li class="breadcrumb-item active">Gestor roles</li>
            </ol>
        </div>
    </div>
</section>
<hr>

<!-- CONTENT -->
<section class="content">
    <div class="row mb-2">
        <div class="col-sm-6">
            <div class="btn-agregar-rol">
                <button type="button" class="btn btn-primary btn-sm mb-4" data-toggle="modal" data-target="#modal-actualizar-rol" data-dismiss="modal">Agregar Rol</button>
            </div>
        </div>
        <div class="col-sm-3"></div>
        <div class="col-sm-3">
            <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                    <span class="input-group-text">Buscar</span>
                </div>
                <input type="text" name="Buscar" id="buscar_rol" class="form-control">
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table id="tabla-roles" class="table table-striped table-bordered table-sm">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="tabla-roles-body">

            </tbody>
        </table>
    </div>
</section>

<script>
    $(document).ready(function(){
        //Llamado a ajax para cargar la lista de roles en la tabla
        $.ajax({
            url: "ajax/roles.ajax.php/a_get_roles",
            method: "GET",
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta){
                let res = $.parseJSON(respuesta);
                let obj;
                let tabla_usuarios_body = document.querySelector('#tabla-roles-body');
                //console.log(tabla_usuarios_body);

                for (let i = 0; i < res.length; i++) {
                    obj = res[i];
                    tabla_usuarios_body.innerHTML += 
                    "<tr>"+
                        "<td>"+obj.rol_id+"</td>"+
                        "<td>"+obj.nombre_rol+"</td>"+
                        "<td class='px-4'>"+"<a onclick=\"cargar_contenido('content-wrapper', 'VISTA UPDATE AQUI')\" class='btn btn-sm btn-info' href='#'>Modificar</a>"+
                        "<a onclick=\"cargar_contenido('content-wrapper', 'VISTA ELIMINAR AQUI')\" class='btn btn-sm btn-danger' href='#'>Eliminar</a>"+"</td>"+
                    "</tr>";
                    //console.log(obj);    
                }
            }
        })
    })
</script>