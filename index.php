<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="author" content="Mansour Baro DIOP"/>
    <meta name="contact state" content="SENEGAL"/>
    <title>Gondwana Sénégal</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
</head>
<body>
    <div class="container">
            <div class="row" style="margin-top:20px">
                <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                    <form role="form" method="POST" action="index.php">
                        <fieldset>
                            <h2>CONNEXION</h2>
                            <hr class="colorgraph">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user fa-spin"></i></span>
                                <input type="login" name="login" id="login" class="form-control input-lg" required placeholder="Login">
                            </div></br></br>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key fa-spin"></i></span>
                                <input type="password" name="password" id="password" class="form-control input-lg" required placeholder="Password">
                            </div>
                            <hr class="colorgraph">
                            <div class="row">
                                <div class="col-xs-8 col-sm-8 col-md-12">
                                    <input type="submit" name="connexion"class="btn btn-lg btn-info btn-block" value="CONNEXION">
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <?php
            include ("authentification.php");
        ?>

        
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <script type="text/javascript">
        $(function(){
        $("div.alert").show("slow").delay(2000).hide("slow");
        });
    </script>
</body>
</html>