<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD usuarios</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Popper JS -->
    <script  src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script  src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <?php
    //Header
    include('views/modulos/layout/header.php');

    echo ("<div class=\"container-fluid\" style=\"min-height:100vh\">");
    echo ("<div class=\"row\">");
    
    //Sidebar
    include('views/modulos/layout/sidebar.php');

    //Div content-wrapper donde se carca el contenido de forma dinámica
    echo ("<div class='col-md-9 content-wrapper'>");
        include('views/modulos/pagina_en_blanco.php');
    echo("</div>");

    echo("</div>"); //Cierra el div row de bootstrap
    echo("</div>"); //Cierra el diva container-fluid

    //Footer
    include('views/modulos/layout/footer.php');
    ?>


<script>
    function cargar_contenido(contenedor, contenido){
        $("."+contenedor).load(contenido);
    }
</script>
</body>
</html>