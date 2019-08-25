<?php session_start();
        require '../php/database.php';
    if(isset($_SESSION['id'])){
        $request = $connection->prepare("SELECT * FROM admin");
        $tab = $request->execute(array($_SESSION['id']));
        $success = $request->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--Responsive meta Tag -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

    <!-- Animate CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <!--bootsnipp css -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <link rel="stylesheet" href="../css/sidebar.css">
    <!-- <link rel="stylesheet" href="cards.css"> -->
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Poppins" rel="stylesheet">
    <!--     <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> -->
    <style>
        .nav-item a{
            color: lightgrey;
        }
        .nav-item a:hover{
            background-color: lightgrey;
            color: black;
        }
    </style>
    <title>Admin | Accueil</title>
</head>
<body>
<div class="container-fluid fixed-top py-3" style="background: #1A1B18;">
    <div class="row collapse show no-gutters d-flex h-100 position-relative">
        <div class="col-3 px-0 w-sidebar navbar-collapse collapse d-none d-md-flex">
            <!-- spacer col -->
        </div>
        <div class="col px-3 px-md-0">
            <!-- toggler -->
            <a data-toggle="collapse" href="#" data-target=".collapse" role="button" class="text-white p-1">
                <i class="fa fa-bars fa-lg"></i>
            </a>
        </div>
    </div>
</div>
<div class="container-fluid px-0">
    <div class="row collapse show no-gutters d-flex h-100 position-relative">
        <div class="col-3 p-0 h-100 w-sidebar navbar-collapse collapse d-none d-md-flex sidebar">
            <!-- fixed sidebar -->
            <div class="navbar-dark text-white position-fixed h-100 align-self-start w-sidebar" style="background:#1A1B16;">
                <h6 class="px-3 pt-3"> <a data-toggle="collapse" class="px-1 d-inline d-md-none text-white" href="#" data-target=".collapse"><i class="fa fa-bars"></i></a></h6>
                <ul class="nav flex-column flex-nowrap text-truncate">
                    <li class="nav-item">
                        <a class="nav-link" href="filiere.php">NOUVELLE FILIERE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="classe.php">NOUVELLE CLASSE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="annee_scolaire.php">NOUVELLE ANNEE SCOLAIRE</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="inscrit.php">LISTE DES INSCRITS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="deconnection.php">DECONNECTION</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col p-3">
            <h3></h3>
        </div>
    </div>
</div>


<!-- <script src="https//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
</body>
</html>
<?php }
else
{
    header('location:error2.php');
}

?>