<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="https://fonts.googleapis.com/css?family=Lora&display=swap" rel="stylesheet">

  <title>Dadhboard - GX</title>
  
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <style>
    .carousel-item {
      height: 65vh;
      min-height: 300px;
      background: no-repeat center center scroll;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
    }

    .portfolio-item {
      margin-bottom: 30px;
    }
  </style>
</head>
<body style="background-attachment: fixed;  background-size: cover;

width:100%;height:70%;background-repeat:no-repeat;background-position:center center;
background-image:url(/cssdash/fundo.jpg)">
<header class="masthead"
    <div class="container h-100">
      <div class="row h-100 align-items-center justify-content-center text-center">
        <div class="col-lg-10 align-self-end">
          <br/>
          <br/> 
          <br/>
          <br/>
          <br/>
          <br/>
          <h1 style="background-color:white!important;font-family: 'Lora', serif;font-size:25px;" class="text-uppercase bg-danger font-weight-bold" class="text-dark">Escritório Virtual</h1>
          <hr class="divider my-4">
        </div>
      </div>
    </div>
  </header>
    <div class="container">
      <div class="row">
        <div class="col-sm-9 col-md-12 col-lg-8 mx-auto">
            <div >
                <?php
                    if ($this->session->flashdata('error')) {
                    ?>
                        <div class="alert alert-danger text-center" style="margin-top:20px;">
                            <?php echo $this->session->flashdata('error'); ?>
                        </div>
                        <?php
                    }
                ?> 
              <form class="form-signin" style="color:white!important;" action="/index.php/Usuario/logar" method="POST">
                  <div class="form-label-group">
                    <label for="inputEmail">
                    <strong>Email</strong></label>                        
                    <input type="name" id="inputEmail" name="nome" class="form-control" placeholder="Email" required autofocus>
                  </div>
                  <br/>
                  <div class="form-label-group">
                    <label for="inputPassword">
                    <strong>Senha</strong></label>                        
                    <input type="password" id="inputPassword" name="senha" class="form-control" placeholder="Password" required>
                  </div>
                  <br/>
                  <button class="btn btn-outline-primary btn-block text-uppercase" type="submit">Logar</button>

             </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  <!--
  <footer class="py-5 bg-dark" style="position:relative;top:4em">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    
  </footer>-->

  <!-- Bootstrap core JavaScript -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>