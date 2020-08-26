<?php
//Conexión

$connect = mysqli_connect( "localhost","root", "", "morris");
$query = "SELECT * FROM ventas";
$result = mysqli_query($connect, $query);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
	
	$chart_data .= "{ año: '".$row["año"]."', ventas:".$row["ventas"].", descuentos:".$row["descuentos"].", ganancias:".$row["ganancias"]."}, ";
}
$chart_data = substr($chart_data, 0, -2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--ESTILOS CSS-->
	<link rel="stylesheet" href="libs/morris.css">
	<link rel="stylesheet" href="libs/bootstrap.min.css">
	<!--JS-->
	<script src="libs/jquery.min.js"></script>
	<script src="libs/raphael-min.js"></script>
	<script src="libs/bootstrap.min.js"></script>
	<script src="libs/morris.min.js" ></script>
	<title>Gráficas de líneas</title>
</head>
<body>
	<br>

	<div class="container">
		<h1 align="center">Gráficas</h1>
		<hr>
		<!--Gráfica-->

		<div class="row">
			
			<div class="col-lg-12 col-md-12 col-sm-6  col-xs-4">
			<h2>Gráfica de línea</h2>
			<hr>
			<div class="col-lg-12 col-md-12 col-sm-6  col-xs-4" id="chart"	></div>
			</div>
		</div>

	
</body>
</html>
<!--DATA traida a la gráfica-->
<script >
	Morris.Line({
	element: 'chart',
	data: [<?php echo $chart_data; ?>],
	xkey: 'año',
	ykeys:['ventas', 'descuentos','ganancias'],
	labels: ['ventas', 'descuentos','ganancias'],
	hideHover: 'auto',
	resize: true
});	
</script>