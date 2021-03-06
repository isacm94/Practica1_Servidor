<!-- Cabecera de la aplicación, mostrada en todas las páginas -->
<head>

    <meta charset="utf-8">

    <link rel="icon" type="image/png" href="../assets/bootstrap/img/profile.png" />
    <title>Paco Garden</title>   

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">    

    <!-- Custom CSS -->
    <link href="../assets/bootstrap/css/freelancer.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../assets/bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">	

    <link rel="stylesheet" type="text/css" href="../assets/css/estilos.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/estilos_paginador.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/estilos_opcionesusuarios.css">
</head>

<body id="page-top" class="index" text="#000000">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <a class="navbar-brand" href="index.php"> <span class="glyphicon glyphicon-home"></span> Home</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">              


                <ul class="nav navbar-nav navbar-right" style=" float: right;">

                    <?php if (isset($_SESSION['loginok'])) : //Si está iniciada sesión ?>

                        <span style=" float: right; color: #18BC9C;"> 
                            <span class="glyphicon glyphicon-user"> </span>  
                            <?php
                            if ($_SESSION['tipousuario'] == 'A') //Si es el usuario es de tipo Administrador
                                echo "Administrador: " . $_SESSION['usuario'];
                            else
                                echo "Operario: " . $_SESSION['usuario']; //Si es el usuario es de tipo Operario
                            ?> 

                        </span>
                        <br>
                        <span style=" float: right; color: #18BC9C;"> 
                            <a href="?ctrl=cerrarsesion" style="color: #18BC9C;"><span class="glyphicon glyphicon-log-out"></span> Cerrar sesión,</a>    
                            <?php echo $_SESSION['horainicio']; ?> 
                        </span>
                        <br>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['tipousuario']) && $_SESSION['tipousuario'] == 'A'):  //Si es el usuario es de tipo Administrador?>
                        <li class="page-scroll">
                            <a href="?ctrl=alta" title="Añadir una tarea"><span class="glyphicon glyphicon-plus"></span> Añadir</a>
                        </li>
                    <?php endif; ?>
                    <li class="page-scroll">
                        <a href="?ctrl=lista" title="Lista de tareas"><span class="glyphicon glyphicon-th-list"></span> Lista</a>
                    </li>
                    <li class="page-scroll">
                        <a href="?ctrl=buscar" title="Buscar tareas"><span class="glyphicon glyphicon-search"></span> Buscar</a>
                    </li>

                    <?php if (!isset($_SESSION['loginok'])) : //Si está iniciada sesión ?>    
                        <li class="page-scroll">
                            <a href="?ctrl=login" title="Login"><span class="glyphicon glyphicon-log-in"></span> Login</a>
                        </li>
                    <?php endif; ?>    

                    <?php if (isset($_SESSION['tipousuario']) && $_SESSION['tipousuario'] == 'A'):  //Si es el usuario es de tipo Administrador?>
                        <li class="page-scroll">
                            <a href="?ctrl=listausuarios" title="Opciones de usuario"><span class="glyphicon glyphicon-cog"></span></a>
                        </li>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['tipousuario']) && $_SESSION['tipousuario'] == 'O'):  //Si es el usuario es de tipo Opeario ?>
                        <li class="page-scroll">
                            <a href="?ctrl=modificarusuarioOPE&id=<?= $_SESSION['idusuario'] ?>" title="Opciones de usuario"><span class="glyphicon glyphicon-cog"></span></a>
                        </li>
                    <?php endif; ?>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>