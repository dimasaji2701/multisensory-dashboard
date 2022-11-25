<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Grafik Kecepatan Air Sungai Sibolahotang</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
	<link href="<?=base_url('assets/');?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
	<!-- Custom styles for this template-->
    <link href="<?=base_url('assets/');?>css/sb-admin-2.min.css" rel="stylesheet">
	</head>
<body>

	<h1 style = "text-align: center">Kecepatan Arus Sungai Sibolahotang</h1>
	<p style = "text-align: center">(Menampilkan data setiap 60 menit)</p>

	<div class="container">
		<div class="row mt-4">
			<div class="col-16" style="text-align:center"><h1></h1>
				<canvas id="line" height="100"></canvas>
			</div>
		</div>
		<div class="row mt-2">
			<div class="col-8">
				<canvas id="bar"></canvas>
			</div>
			<div class="col-4">
				
				<canvas id="pie"></canvas>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
	<script>

		const baseUrl = "<?php echo base_url();?>"
		const myChart = (chartType) => {
				$.ajax({
					url: baseUrl+'admin/chart_datasensor',
					dataType: 'json',
					method: 'get',
					success: data => {
						let chartX = []
						// let chartZ = []
						let chartY = []
						// let chartW = []
						data.map( data => {
							chartX.push(data.tanggal)
							chartY.push(data.waterflow)
							// chartZ.push(data.segment2)
							// chartW.push(data.segment3)
						})
						const chartData = {
							labels: chartX,
							datasets: [
								{
									label: 'Kecepatan Arus (m/s)',
									data: chartY,
									backgroundColor: ['lightcoral'],
									borderColor: ['lightcoral'],
									borderWidth: 4
								}
								

							]
						}
						const ctx = document.getElementById(chartType).getContext('2d')
						const config = {
							type: chartType,
							data: chartData
						}
						switch(chartType) {
							case 'pie':
								const pieColor = ['salmon','red','green','blue','aliceblue','pink','orange','gold','plum','darkcyan','wheat','silver']
								chartData.datasets[0].backgroundColor = pieColor
								chartData.datasets[0].borderColor = pieColor
								break;
							case 'bar':
								chartData.datasets[0].backgroundColor = ['skyblue']
								chartData.datasets[0].borderColor = ['skyblue']
								break;
							default :
								config.options = {
									scales: {
										y: {
											beginAtZero: false
										}
									}
								}
						}
						const chart = new Chart(ctx, config)
					}
				})
		}

		

		//myChart('pie')
		myChart('line')
		// myChart('bar')

	</script>





</body>
</html>
