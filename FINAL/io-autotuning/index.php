<!DOCTYPE html>
<html>
<head>
	<title>Auto-Tuning Parallel I/O</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
	<h1>Auto-Tuning Parallel I/O</h1>
	<p><strong>Investigators:</strong> Suren Byna and Prabhat (LBNL), Quincey Koziol (The HDF Group), Venkat Vishwanath (ANL)</p>
	
	<h2>Problem</h2>
	<p>Obtaining good I/O performance on modern HPC systems is challenging due to complex hardware and software dependencies.</p>
	
	<h2>Approach</h2>
	<p>We are developing a auto-tuning system for obtaining a significant fraction of peak I/O performance.</p>
	
	<img src="io-autotuning.jpg" style="width:65%">
	
	<h2>Accomplishments</h2>
	<ul>
		<li>Developed a genetic algorithm and statistical framework for efficiently searching parameter space. Published results at SC’13 and HPDC’14.</li>
		<li>Tested framework on 3 scientific benchmarks on Cray, IBM and Sun platforms</li>
		<li> Demonstrated 2-50X improvement in write performance over default system settings</li>
	</ul>
	
	<h2>Impact</h2>
	<ul>
		<li>Enables science codes to obtain high I/O resource utilization without code modification </li>
	</ul>
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>