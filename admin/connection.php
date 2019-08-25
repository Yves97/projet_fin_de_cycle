<?php
    session_start();
    require '../php/database.php';
    require '../php/functions.php';
    if(isset($_POST) && !empty($_POST)){
        $admin_name = $_POST['admin_name'];
        $admin_password = $_POST['admin_password'];
        if($admin_name == null || $admin_password == null){
            $err =<<<JSON_HEX_TAG
             <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <strong>Connection impossible, vous n'etes surement pas l'administrateur</strong>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                       </div>
JSON_HEX_TAG;

        }
        else
        {
            $request = $connection->prepare("SELECT * FROM admin WHERE admin_name = ? AND admin_password = ?");
            $tab = $request->execute(array($admin_name,$admin_password));
            $success = $request->fetch(PDO::FETCH_ASSOC);
            $_SESSION = $success;
            if($_SESSION['admin_name'] != $admin_name && $_SESSION['admin_password'] != $admin_password){

                $err =<<<JSON_HEX_TAG
             <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <strong>Connection impossible, vous n'etes surement pas l'administrateur</strong>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                       </div>
JSON_HEX_TAG;
            }else
                header('location:accueil.php?id='.$_SESSION['id']);
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

    <link rel="stylesheet" href="../css/navbars.css">
    <!-- <link rel="stylesheet" href="cards.css"> -->
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Poppins" rel="stylesheet">
    <!--     <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> -->
    <style>
        form{
            margin-top: 20vh;
            margin-bottom: 10vh;
        }
    </style>
    <title>Admin | Login</title>
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
                            <h3><i class="fa fa-edit"></i>Connection Admin</h3>
                        </div>
                    </div>
                    <div class="card-body p-3">

                        <!--Body-->
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-edit text-black"></i></div>
                                </div>
                                <input type="text" class="form-control" id="" name="admin_name" placeholder="Nom..." >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-eye text-black"></i></div>
                                </div>
                                <input type="password" class="form-control" id="" name="admin_password" placeholder="Password here...">
                            </div>
                        </div>
                        <div class="text-center">
                            <input type="submit" value="Se connecter" class="btn  btn-block rounded-0 py-2">
                            <?php if(isset($err)){echo $err;} ?>
                        </div>
                    </div>
                </div>
            </form>
            <!--Form with header-->
        </div>
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
