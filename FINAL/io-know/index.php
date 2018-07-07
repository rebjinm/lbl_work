<!DOCTYPE html>
<html>
<head>
	<title>Total Knowledge of I/O Through Holistic I/O Performance Analysis</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
	<h1>Total Knowledge of I/O Through Holistic I/O Performance Analysis</h1>
	<p><strong>Investigators:</strong> Suren Byna (LBNL), P. Carns (ANL)</p>
	<p><strong>Program Manager:</strong> Lucy Nowell</p>
	
	<h2>Scientific Accomplishment</h2>
	<p>We developed the Total Knowledge of I/O (TOKIO) framework to synthesize performance data from HPC I/O components into a holistic view of I/O behavior. The Unified Monitoring and Metrics Interface (UMAMI) to TOKIO, shown below, leverages this technology to explore application performance in its broader historical and platform context. UMAMI illustrates performance trends, quantifies variability, and reveals previously hidden interactions that can adversely affect the performance of data-intensive scientific applications.</p>
	
	<img src="io-know.jpg" style="width:40%">
	<p>Unified Monitoring and Metrics Interface (UMAMI) is a visualization technique for displaying performance data from many components of the I/O system in a normalized and coherent way. By plotting historic performance data of similar I/O motifs over time, we establish a statistical approach to identifying "bad" performance throughout the I/O subsystem.</p>
	<h2>Significance and Impact</h2>
	<p>TOKIO and UMAMI provide a holistic view of the entire I/O subsystem and reduce users' reliance on institutional I/O experts to understand and improve I/O performance and mitigate variability. These tools and methods provide context for the performance data generated on complex I/O subsystems in a generalized, portable fashion.</p>
	
	<h2>Research Details</h2>
	<ul>
		<li>Ran four benchmark applications daily on both NERSC Edison and ALCF Mira to establish I/O variability on each system</li>
		<li>Analyzed variability using UMAMI diagrams to identify poor performance caused by bandwidth contention, metadata contention, and file system health issues</li>
		<li>Determined that architecture, application I/O pattern, and overall file system climate all can affect variation, but none represents a surefire way to predict performance.</li>
	</ul>
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>