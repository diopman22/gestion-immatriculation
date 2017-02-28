<?php 
	$bdd = new PDO("mysql:host=localhost;dbname=gondwana","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
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
	echo $male; 
?>
<body>
	<div id="container"></div>
	<script type="text/javascript" src="dist/js/jquery.js"></script>
	
	<script type="text/javascript" src="dist/js/jshighchart/highcharts.js"></script>

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
		        $('#container').highcharts({
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
