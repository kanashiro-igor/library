<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Alter Selected Book</title>

  <!-- Bootstrap core CSS -->
  <link href="/res/plus/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="/res/css/simple-sidebar.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="\res\css\registerStyle.css">

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Menu </div>
      <div class="list-group list-group-flush">
        <a href="/menu" class="list-group-item list-group-item-action bg-light">Home</a>
        <a href="/menu/register" class="list-group-item list-group-item-action bg-light">Register a New Book</a>
        <a href="/menu/borrowed" class="list-group-item list-group-item-action bg-light">Borrow A Book</a>
        <a href="/menu/list" class="list-group-item list-group-item-action bg-light">List Borrowed Books</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item">
              <a class="nav-link bg-light" href="/menu/logout">Sign Out</a>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid">
        <div class="imgcontainer">
            <h1 class="mt-4"><img src="\res\images\corujaLendo.jpg" alt="Avatar" class="avatar"> Alter Selected Book:</h1>
        </div>
        <p>Updating book's data.</p>
      </div>

      <div class="container-fluid">
        <form role="form" action="/menu/register-update/<?php echo htmlspecialchars( $books["idbook"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="destitles">Title</label>
              <input type="text" class="form-control" id="destitle" name="destitle" placeholder="Type Book's Title" value="<?php echo htmlspecialchars( $books["destitle"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="desauthor">Author</label>
              <input type="text" class="form-control" id="desauthor" name="desauthor" placeholder="Type Book's Author" value="<?php echo htmlspecialchars( $books["desauthor"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
            <div class="form-group">
              <label for="descategory">Category</label>
              <input type="text" class="form-control" id="descategory" name="descategory" placeholder="Type Book's Category" value="<?php echo htmlspecialchars( $books["descategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-success">Change Data</button>
          </div>
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
