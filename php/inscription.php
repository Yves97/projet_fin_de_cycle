<?php 
    session_start();
    require 'database.php';
    require 'functions.php';
    $filiere = $connection->query('SELECT * FROM filiere');
    $filiere = $filiere->fetchAll();
    $classes = $connection->query('SELECT * FROM classe');
    $classes = $classes->fetchAll();
    $annees = $connection->query('SELECT * FROM annee_scolaire');
    $annees = $annees->fetchAll();

    if(!empty($_POST) && isset($_POST))
    {
        $_POST = checkArray($_POST);
        extract($_POST,EXTR_OVERWRITE);

        
        if($matricule == null || $nom == null || $prenom == null || $tel == null || $email == null || $nom_filiere == null)
        {
            $err=<<<DEMO
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <strong>Il est obligatoire de remplir tout ces champs !</strong>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                       </div>
DEMO;
        }
        else
        {
            $request = $connection->prepare("INSERT INTO etudiant(matricule,nom,prenom,tel,email,annee_id,classe_id,filiere_id) VALUES(?,?,?,?,?,?,?,?)");
            $result = $request->execute(array($matricule,$nom,$prenom,$tel,$email,$annee_scolaire,$nom_classe,$nom_filiere));
            if($result == true){
                $_SESSION['id'] = $connection->lastInsertId();
                header('location:impression.php');
            }else
            {
                $err=<<<TAG
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <strong>une erreur est survenue</strong>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                       </div>`;
TAG;
            }

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
<!--     <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> -->
    <style>
        a.nav-link:hover{
            background-color: #fff;
        }
    </style>
    <title>Espace Etudiant | Inscription</title>
</head>
<body>
    <!-- navbar -->
    <nav class="main-navigation" style="background-color: lightgray;">
        <div class="navbar-header animated fadeInUp">
            <a class="navbar-brand" href="#">Inscription | Espace Etudiant</a>
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
                <a href="error.php" class="nav-link">IMPRESSION DE RECU</a>
            </li>
        </ul>
    </nav>
    
<!--form indcription-->

<div class="container">

    <div class="form-sec animated fadeInRight" style="margin: 5vh 0 10vh 50vh;box-shadow: 0 0 3px 3px lightgray;border-radius: 5px;">
      <h4 align="center">Inscription</h4>
        <small style="color: red;"><i>veuiller a ne pas oublier toutes les informations remplies</i></small>
      <?php if(isset($err)){echo $err;} ?>
      <form  method="post" action="" name="form">
        <div class="form-group">
          <label>Matricule:</label>
          <input type="text" class="form-control" placeholder="Entrez votre matricule" name="matricule" value="<?php  ?>">
          <label>Nom:</label>
          <input type="text" class="form-control"  placeholder="Votre nom" name="nom">
          <label>Prenoms:</label>
          <input type="text" class="form-control" placeholder="Votre prenom" name="prenom">
          <label>Numero de telephone:</label>
          <input type="text" class="form-control" placeholder="Votre Numero de telephone" name="tel">
          <label>Email:</label>
          <input type="email" class="form-control" placeholder="Entrez votre Email" name="email">
        </div>
         <div class="form-group">
             <label for="nom_filiere">Filiere:</label>
          <select name="nom_filiere" id="nom_filiere" class="form-control">
              <?php foreach($filiere as $fil): ?>
                  <option value="<?= $fil['id'] ?>"><?= $fil['nom_filiere'] ?></option>
              <?php endforeach; ?>
          </select>
             <label for="classe">Classe:</label>
          <select name="nom_classe" id="classe" class="form-control">
              <?php foreach($classes as $class): ?>
              <option value="<?= $class['id'] ?>"><?= $class['nom_classe'] ?></option>
              <?php endforeach; ?>
          </select>
             <label for="annee_scolaire">Annee Scolaire:</label>
             <select name="annee_scolaire" id="annee_scolaire" class="form-control">
                 <?php foreach($annees as $annee): ?>
                     <option value="<?= $annee['id'] ?>"><?= $annee['annee'] ?></option>
                 <?php endforeach; ?>
             </select>
        </div>
        <button type="submit" class="btn btn-success">Valider l'inscription</button>
      </form>
    </div>
</div>
<!--  *********-->


    <!--Bottom Footer-->
        <div class="bottom section-padding">
            <div class="container">
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