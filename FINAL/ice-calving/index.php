<!DOCTYPE html>
<html>
<head>
	<title>In Situ Real-time Ice Calving Event Detection</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
	<h1>In Situ Real-time Ice Calving Event Detection</h1>
	<p><strong>Investigators:</strong> Nagiza Samatova, Suren Byna, John Wu, Chris Zou, Dan Martin</p>
	
	<h2>Problem</h2>
	<p>Ice calving, i.e., a process of ice breaking off an ice sheet creating massive icebergs, is highly important to global sea level changes. Detecting ice calving events and removing floating ice in real time is necessary to avoid mathematical divergence in AMR-based ice sheet model simulation codes such as BISICLES.</p>
	
	<img src="ice-calving.png" style="width:30%">
	<p>An example of ice calving event on the Pine Island Glacier ice shelf</p>
	
	<h2>Approach</h2>
	<ul>
		<li>Develop a novel AMR-aware Parallel Connected Component Labeling (PCCL) algorithm</li>
		<li>PCCL identifies connectivity at each AMR level in parallel, propagates “grounded-ness” across AMR levels, and performs communication-efficient hierarchical aggregation among MPI processes</li>
	</ul>
	
	<h2>Achievements</h2>
	<ul>
		<li>PCCL is capable of real-time detection of ice calving events in BISICLES code</li>
		<li><strong>6X faster</strong> than the existing detection algorithm</li>
		<li>Integration of PCCL into Chombo-based BISICLES code</li>
		<li>Paper presented at CCGrid 2015</li>
	</ul>
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>