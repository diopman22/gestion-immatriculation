<?php
session_start();
if(!(isset($_SESSION["login"])))
{
  header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="author" content="Mansour Baro DIOP & Mohamed SAMB"/>
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
    
    <!-- HEADER END-->

    <div class="navbar navbar-inverse set-radius-zero" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>

            <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1">
                 
                <div class="user-settings-wrapper">
                    <ul class="nav">
                        <div class="row">
                            <div class="col-md-offset-1 col-md-10">
                               <li><a href="accueil.php"><h4><i class="fa fa-spinner fa-spin"></i> ACCUEIL</h4></a></li>&nbsp;&nbsp;&nbsp;&nbsp;
                            </div>
                            <div class="col-md-1">
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                        <span class="glyphicon glyphicon-user" style="font-size: 25px;"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-settings">
                                    <hr />
                                    <a href="deconnexion.php" class="btn btn-info "><i class="fa fa-edit">&nbsp;&nbsp;Déconnexion</i></a>
                                    <hr />
                                    </div>
                                </li>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>

        </div>
    </div>

     <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Statistiques par tranches d'âge</h4>
                </div>
                <?php
                include 'connexion.php';
                $req = $bdd->query("select date_naissance from etat_civil");
                $tranche1 = 0;
                $tranche2 = 0;
                $tranche3 = 0;
                $tranche4 = 0;
                while ($rep = $req->fetch()) {
                    $age = date('Y') - intval(substr($rep["date_naissance"], 0, 4));

                    if (($age>=1) and ($age<=15))
                        $tranche1+=1;

                    if (($age>15) and ($age<=30))
                        $tranche2+=1;

                    if (($age>30) and ($age<=60))
                        $tranche3+=1;

                    if ($age>60)
                        $tranche4+=1;
                }
            ?>

        <div class="row">
            <div class="col-md-12" id="statistic">
                
            </div>
        </div>

        <?php 
    include 'connexion.php';
    $req = $bdd->query("select sexe,date_naissance from etat_civil");
    $sexe_trance = array(array());
    for ($i=0;$i<2;$i++)
        for($j=0;$j<10;$j++)
            $sexe_trance[$i][$j]=0;

    while ($rep = $req->fetch()) {
        $sexe = $rep["sexe"];
        $age = date('Y') - intval(substr($rep["date_naissance"], 0, 4));

        if ($sexe=="M"){
            //$sexe_trance[0]+=1;
            if ($age>=0 and $age<10)
                $sexe_trance[0][0] -= 1; 

            if ($age>=10 and $age<20)
                $sexe_trance[0][1] -= 1; 

            if ($age>=20 and $age<30)
                $sexe_trance[0][2] -= 1; 

            if ($age>=30 and $age<40)
                $sexe_trance[0][3] -= 1; 
            if ($age>=40 and $age<50)
                $sexe_trance[0][4] -= 1; 
            if ($age>=50 and $age<60)
                $sexe_trance[0][5] -= 1; 
            if ($age>=60 and $age<70)
                $sexe_trance[0][6] -= 1; 
            if ($age>=70 and $age<80)
                $sexe_trance[0][7] -= 1; 
            if ($age>=80 and $age<90)
                $sexe_trance[0][8] -= 1; 
            if ($age>=90 and $age<100)
                $sexe_trance[0][9] -= 1; 
        }

        if ($sexe=="F"){

            if ($age>=0 and $age<10)
                $sexe_trance[0][0] += 1; 

            if ($age>=10 and $age<20)
                $sexe_trance[1][1] += 1; 

            if ($age>=20 and $age<30)
                $sexe_trance[1][2] += 1; 

            if ($age>=30 and $age<40)
                $sexe_trance[1][3] += 1; 
            if ($age>=40 and $age<50)
                $sexe_trance[1][4] += 1; 
            if ($age>=50 and $age<60)
                $sexe_trance[1][5] += 1; 
            if ($age>=60 and $age<70)
                $sexe_trance[1][6] += 1; 
            if ($age>=70 and $age<80)
                $sexe_trance[1][7] += 1; 
            if ($age>=80 and $age<90)
                $sexe_trance[1][8] += 1; 
            if ($age>=90 and $age<100)
                $sexe_trance[1][9] += 1; 
            
        }
    }

    $male = "[";
    $fem = "[";
    for($j=0;$j<10;$j++){
        $male .="".$sexe_trance[0][$j].",";
        $fem .="".$sexe_trance[1][$j].",";
    }

    $male = substr($male, 0, strlen($male)-1);
    $fem = substr($fem, 0, strlen($fem)-1);
    $male.="]";
    $fem.="]";

?>
        <hr>
        
        <div class="row">
            <div class="col-md-12">
                    <h4 class="page-head-line">Statistiques par tranches d'âge et sexe</h4>
            </div>
            <div class="col-md-12" id="statistic2">
                
            </div>
        </div>
    </div>
</div>
</div>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    © 2015 67C | By : Mansour Baro DIOP & Mohamed SAMB
                </div>
            </div>
        </div>
    </footer>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    
    <script type="text/javascript" src="assets/js/highcharts.js"></script>

    <script type="text/javascript">
        $(function () {
    $('#statistic').highcharts({
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: 'Statistiques par tranches d\'age'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    enabled: true,
                    format: '{point.name}'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'age',
            data: [
                ['1 - 15 ans',   <?php echo $tranche1?>],
                ['16 - 30 ans',       <?php echo $tranche2?>],
              
                ['31 - 60 ans',    <?php echo $tranche3?>],
                ['61 et plus',   <?php echo $tranche4?>]
            ]
        }]
    });
});
    </script>


<script type="text/javascript">

        $(function () {
            // Age categories
            var male = eval(<?php echo $male ?>);
            console.log(male);
            var fem = eval(<?php echo $fem?>);
            console.log(fem);
            
            var categories = ['0-10', '10-20', '20-30', '30-40',
                    '40-50', '50-60', '60-70', '80-90', '90-100'
                    ];
            $(document).ready(function () {
                $('#statistic2').highcharts({
                    chart: {
                        type: 'bar'
                    },
                  
                    title: {
                        text: 'Repartition par tranches d\'age suivant le sexe'
                    },
                    xAxis: [{
                        text: 'sexe',
                        categories: categories,
                        reversed: false,
                        labels: {
                            step: 1
                        }
                    }, { // mirror axis on right side
                        opposite: true,
                        reversed: false,
                        categories: categories,
                        linkedTo: 0,
                        labels: {
                            step: 1
                        }
                    }],
                    yAxis: {
                        title: {
                            text: 'Tranches d\'age'
                        },
                        labels: {
                            formatter: function () {
                                return Math.abs(this.value) + '%';
                            }
                        }
                    },

                    plotOptions: {
                        series: {
                            stacking: 'normal'
                        }
                    },

                    tooltip: {
                        formatter: function () {
                            return '<b>' + this.series.name + ', age ' + this.point.category + '</b><br/>' +
                                'Population: ' + Highcharts.numberFormat(Math.abs(this.point.y), 0);
                        }
                    },

                    series: [{
                        name: 'Male',
                        data: male
                    }, {
                        name: 'Femelle',
                        data: fem
                    }]
                });
            });

        });
    </script>

</body>
</html>
