
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="../assets/bootstrap/img/profile.png" />
    <title>Paco Garden</title>    


    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../assets/bootstrap/css/freelancer.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../assets/bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!--<link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">	-->	
		
    <link rel="stylesheet" type="text/css" href="../assets/css/estilos_alta.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/estilos_paginador.css">
</head>

<body id="page-top" class="index" text="#000000">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <a class="navbar-brand" href="?ctrl=principal"> <span class="glyphicon glyphicon-home"></span> Home</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">                
                   
                    
                <ul class="nav navbar-nav navbar-right" style=" float: right;">
                    
                    <?php
                        if(isset($_SESSION['loginok'])) :?>
                                <span style=" float: right; color: #18BC9C;"> 
                                    <a href="?ctrl=cerrarsesion"><span class="glyphicon glyphicon-log-out"></span> Cerrar sesión,</a>    
                                    <?php echo $_SESSION['horainicio']; ?> 
                                </span>
                            <br>
                    <?php endif; ?>
                   
                        <li class="page-scroll">
                            <a href="?ctrl=alta"><span class="glyphicon glyphicon-plus"></span> Añadir Tarea</a>
                        </li>
                        <li class="page-scroll">
                            <a href="?ctrl=lista"><span class="glyphicon glyphicon-th-list"></span> Lista de Tareas</a>
                        </li>
                        <li class="page-scroll">
                            <a href="?ctrl=buscar"><span class="glyphicon glyphicon-search"></span> Buscar</a>
                        </li>

                        <li class="page-scroll">
                            <a href="?ctrl=login"><span class="glyphicon glyphicon-user"></span> Login</a>
                        </li>
                   
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
