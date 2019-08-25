<?php
    session_start();
    require 'database.php';
    $request =  $connection->prepare("SELECT etudiant.*,classe.nom_classe as classe,filiere.nom_filiere as filiere,annee_scolaire.annee as Annee_scolaire  FROM etudiant,classe,filiere,annee_scolaire WHERE etudiant.id=? AND etudiant.classe_id=classe.id and etudiant.filiere_id=filiere.id");
    $succ = $request->execute(array($_SESSION['id']));
    if($succ){
        $tab = $request->fetch(PDO::FETCH_ASSOC);
        $_SESSION = $tab;
    }
    else
    {
        $err=<<<TAG
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
           <strong>une erreur est survenue</strong>
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
        </div>
TAG;
    }
//die(var_dump($_SESSION['id']));
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

     <link rel="stylesheet" href="../css/inscription.css">
   <!-- <link rel="stylesheet" href="cards.css"> -->
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Poppins" rel="stylesheet">
<!--     <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> -->
    <style>
        a.nav-link:hover{
            background-color: #fff;
        }
        .container{
            margin-top: 5vh;
            margin-bottom: 3vh;
            border: 1px solid #000;
            padding: 10px;
            border-radius: 3px;
            background: rgba(0,0,0,.3);
        }
    </style>
    <title>Espace Etudiant | Impression</title>
</head>
<body>
    <!-- navbar -->
    <nav class="main-navigation" style="background-color: lightgray;">
        <div class="navbar-header animated fadeInUp">
            <a class="navbar-brand" href="#">Impression | Espace Etudiant</a>
        </div>
        <ul class="nav-list">
            <li class="nav-list-item">
                <a href="../index.php" class="nav-link">ACCUEUIL</a>
            </li>
            <li class="nav-list-item">
                <a href="inscription.php" class="nav-link">INSCRIPTION</a>
            </li>
            <li class="nav-list-item">
                <a href="re_inscription.php" class="nav-link">REINSCRIPTION</a>
            </li>
            <li class="nav-list-item">
                <a href="impression.php" class="nav-link">IMPRESSION DE RECU</a>
            </li>
        </ul>
    </nav>
    <div class="container">
        <h1 align="center">RECAPITULATIF</h1>
        <?php if(isset($err) && !empty($err)) echo $err; ?>
        <?php
                unset($tab["classe_id"]) ;unset($tab['filiere_id']);unset($tab['id']);unset($tab['annee_id']);
                foreach($tab as $k => $v):

            ?>
                <div class="notice" style="border-color: #000;">
                    <strong><?= $k ?> : </strong> <?= $v ?>
                </div>
        <?php endforeach; ?>
        <a href="reçu.php" class="btn btn-success btn-lg" style="margin-left: 75vh;">Imprimer le reçu</a>
    </div>


  <!--Bottom Footer-->
        <div class="bottom section-padding">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="copyright">
                            <p>© <span>2019</span> <a href="#" class="transition">YvesKouadio</a> All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  <!--Bottom Footer-->
    

<!-- <script src="https//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
</body>
</html>