<div class="col-md-3 mb-5 mb-sm-5">
    <nav id="accordion">
        <div class="card">
        <a data-toggle="collapse" href="#collapse-users" class="card-link">
                <div class="card-header bg-primary text-white">
                    Usuarios
                </div>
            </a>
            <div class="collapse" id="collapse-users" data-parent="#accordion">
                <div class="card-body">
                    <d class="list-group-flush">
                        <a href="#" class="list-group-item list-group-item-action" onclick="cargar_contenido('content-wrapper', 'views/modulos/v_lista_usuarios.php')">Lista de Usuarios</a>
                        <a href="#" class="list-group-item list-group-item-action">Usuarios dados de baja</a>
                    </d>
                </div>
            </div>
        </div>
        <div class="card">
            <a data-toggle="collapse" href="#collapse-roles" class="card-link">
                <div class="card-header bg-primary text-white">
                    Roles
                </div>
            </a>
            <div class="collapse" id="collapse-roles" data-parent="#accordion">
                <div class="card-body">
                    <d class="list-group-flush">
                        <a href="#" class="list-group-item list-group-item-action" onclick="cargar_contenido('content-wrapper', 'views/modulos/v_lista_roles.php')">Lista de Roles</a>
                        <a href="#" class="list-group-item list-group-item-action">Roles dados de baja</a>
                    </d>
                </div>
            </div>
        </div>
    </nav>
</div>
