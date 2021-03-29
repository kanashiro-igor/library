<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sign In</title>

  <!-- Bootstrap core CSS -->
  <link href="/res/plus/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="/res/css/simple-sidebar.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="\res\css\registerStyle.css">

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <div class="container-fluid">
        <div class="imgcontainer">
            <h1 class="mt-4"><img src="\res\images\corujaLendo.jpg" alt="Avatar" class="avatar"> Login:</h1>
        </div>
        <p>Please insert your username and password to sign in.</p>
      </div>

      <div class="container-fluid">
        <form action="/" method="post">
          
          
            <label for="login"><b>Login</b></label>
            <input type="text" placeholder="Login" name="login" required>
            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>
            <button type="submit" class="btn btn-primary">Login</button>
          
        </form>
      </div>

    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="/res/plus/jquery/jquery.min.js"></script>
  <script src="/res/plus/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
