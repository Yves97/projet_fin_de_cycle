<?php
    //session_start();
    require 'database.php';
    require 'functions.php';
    if(isset($_POST) && !empty($_POST)) {
        $matricule = checkInput($_POST['matricule']);
        $query = $connection->prepare("SELECT * FROM etudiant WHERE matricule = ? ");
        $succ = $query->execute(array($matricule));
        $tab = $query->fetch();
        //var_dump($tab);
        if($matricule != $tab['matricule']){
            $err = <<<TAG
                     <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <strong>Ce matricule ne peut pas effectuer une reinscription !</strong>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                       </div>
TAG;
        }
        else
        {
            $request = $connection->prepare("SELECT etudiant.matricule,etudiant.nom,etudiant.prenom,classe.id,filiere.id,classe.nom_classe,filiere.nom_filiere FROM etudiant,classe,filiere WHERE etudiant.matricule = ? AND etudiant.classe_id = classe.id AND etudiant.filiere_id = filiere.id");
            $tab2 = $request->execute(array($matricule));
            $success = $request->fetch(PDO::FETCH_ASSOC);
            //var_dump($success);
        }
    }


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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css">

    <style>
        .container{
            margin-top: 20vh;
        }
    </style>
    <title>Espace Etudiant | Re_Inscription</title>
</head>
<body>
<!--recherche du matricule -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6 pb-5">
            <!--Form with header-->
            <form action="" method="post" class="animated shake">
                <div class="card border-light rounded-0">
                    <div class="card-header p-0">
                        <div class=" text-black text-center py-2">
                            <h3><i class="fa fa-edit"></i> Votre reinscription ici</h3>
                        </div>
                    </div>
                    <div class="card-body p-3">

                        <!--Body-->
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-history text-black"></i></div>
                                </div>
                                <input type="text" class="form-control" id="" name="matricule" placeholder="Saisir matricule..." required>
                            </div>
                        </div>
                        <div class="text-center">
                            <input type="submit" value="Envoyer" class="btn  btn-block rounded-0 py-2">
                            <?php if(isset($err)) {echo $err; } ?>
                        </div>
                    </div>
                </div>
            </form>
            <!--Form with header-->
        </div>
    </div>
</div>
<!--  *********-->
<?php if(isset($success)){

        echo $val =<<<TAG
    <div class="container" style="margin-top:-5vh;">
        <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6 pb-5">
            <!--Form with header-->
            <form action="inscription.php" method="post" class="animated fadeInLeft">
                <div class="card border-light rounded-0">
                    <div class="card-header p-0">
                        <div class=" text-black text-center py-2">
                            <h3><i class="fa fa-user"></i>Vos Informations</h3>
                            <small>vous aurez la possibilite de changer votre matricule lors de la reinscription</small>
                        </div>
                    </div>
                    <div class="card-body p-3">

                        <!--Body-->
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <table>
                                    <tr>
                                        <td> Nom : $success[nom] </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                           <div class="form-group">
                            <div class="input-group mb-2">
                                <table>
                                    <tr>
                                        <td> Prenom : $success[prenom] </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                           <div class="form-group">
                            <div class="input-group mb-2">
                                <table>
                                    <tr>
                                        <td> Filiere : $success[nom_filiere] </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                           <div class="form-group">
                            <div class="input-group mb-2">
                                <table>
                                    <tr>
                                        <td> Classe : $success[nom_classe] </td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="text-center">
                            <input type="submit" value="Reinscrire" class="btn  btn-block rounded-0 py-2">
                        </div>
                    </div>
                </div>
            </form>
            <!--Form with header-->
        </div>
    </div>
</div>


TAG;
        //echo $value."<br>";
    
} ?>




<!--<script src="https//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
</body>
</html>