<!DOCTYPE html>
<html>
<head>
	<title>Examining Job Exit Status Reveals Surprising Information about Computer Operations</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
	<h1>Examining Job Exit Status Reveals Surprising Information about Computer Operations</h1>
	<p><strong>Investigators:</strong> A Sim, W Yoo</p>
	
	<h2>Source Data</h2>
	<p>NERSC genepool cluster batch queue job exit status plus memory usage, CPU usage and so on</p>
	
	<h2>What We Found</h2>
	<ul>
		<li>Clustering reveals strange outliers as red circles on the right. Outliers can detect the performance anomalies.</li>
		<li>Job exit status could be predicted with 99% accuracy</li>
		<li>Dips in exit status prediction rate coincide with known system-wide failures</li>
	</ul>
	
	<div>
	<img src="jobexit-status1.png" style="width:40%">
	<img src="jobexit-status2.png" style="width:40%">
	</div>
	
	<h2>What's Next</h2>
	<ul>
		<li>Performance prediction (time, I/O, resource consumption) by job characterization and modeling</li>
		<li>Online failure detection using runtime measurements for early actions on jobs expected to fail</li>
	</ul>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>