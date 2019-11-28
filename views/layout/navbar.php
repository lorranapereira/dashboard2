<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="/cssdash/sb-admin.css" rel="stylesheet">
    <link href="/cssdash/style.css" rel="stylesheet">
    <script src = "https://cdn.jsdelivr.net/npm/chart.js@2/dist/Chart.min.js"> </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.css"> 
    <link rel="stylesheet" 
    href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Serif&display=swap" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>


</head>
<body>
<? if(!isset($_SESSION['nome'])){
		header("Location:/index.php/Usuario/"); 
   }
?>

<nav style="background-color:#540a58!important;" class="navbar navbar-expand navbar-dark bg-dark static-top">

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->


      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">

      </ul>

  </nav>
  <div  id="wrapper">
  <ul style="background-color:#1e012b!important;"  class="sidebar navbar-nav">
        <li class="nav-item <? if($_SERVER['REQUEST_URI'] == '/index.php/Lancamentos/dashboard') { echo 'active'; } ?> ">
            <a class="nav-link"  href="/index.php/Lancamentos/dashboard">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item <? if($_SERVER['REQUEST_URI'] == '/index.php/Lancamentos/inserir') { echo 'active'; } ?>" >
            <a class="nav-link" href="/index.php/Lancamentos/inserir">
                <i class="fas fa-fw fa-folder"></i>
                <span>Upload de Arquivos</span>
            </a>         
        </li>
        <li class="nav-item <? if($_SERVER['REQUEST_URI'] == '/index.php/Usuario/aprovar') { echo 'active'; } ?>" >
            <a class="nav-link" href="/index.php/Usuario/aprovar">
                <i class="fas fa-fw fa-folder"></i>
                <span>Aprovar Usuário</span>
            </a>         
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-cog"></i>
                <span>Minha conta</span>
            </a> 
            <div class="dropdown-menu" aria-labelledby="alertsDropdown">
                <a class="dropdown-item" href="#">Alterar</a>
                <a class="dropdown-item" href="#">Sair</a>
            </div>
        </li>        
  </ul>