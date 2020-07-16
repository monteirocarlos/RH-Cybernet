<?php
session_start();
include ("../model/verifica_login.php");
include ("../model/banco.php");
?>
    <body>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="painel.php">CYBERNET - PAINEL RH</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button><!-- Navbar Search-->
            <!-- Navbar-->
            <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" >
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../model/logout.php">Sair</a>
                    </div>
                </li>
            </ul>
        </div>
        </nav>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">INICIO</div>
                            <a class="nav-link" href="../view/painel.php"
                                ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Visão Geral</a
                            >
                            <div class="sb-sidenav-menu-heading">RECURSOS</div>
                            
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts"
                                ><div class="sb-nav-link-icon"><i class="fas fa-address-card"	></i></div>
                                Gestão de pessoas
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="colaboradores.php">Colaboradores</a>
                                <a class="nav-link" href="setores.php">Setores</a><a class="nav-link" href="cargos.php">Cargos</a><a class="nav-link" href="promocoes.php">Promoções</a><a class="nav-link" href="aniversariantes.php">Aniversariantes</a>
                                <a class="nav-link" href="ferias.php">Controle de Férias</a>
                                </nav>
                            </div>
                            
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages"
                             ><div class="sb-nav-link-icon"><i class="fas  fa-users"></i></div>
                                Administração
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                        <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="usuarios.php">Registrar usuário</a><a class="nav-link" href="password.html">Custos com beneficios</a></nav>
                                    </div>
                            </div> 
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small"><h4>Boas-vindas:</h4></div>
                        <h5><?php echo $_SESSION['usuario']; ?><h5>
                    </div>
                </nav>
            </div>
