<!DOCTYPE html>
<html>
<head>
	<title>PPDG Request Planner</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<p><a href="index.html">Back to PPDG Home</a></p>
<h1>PPDG Request Planner</h1>
<ul>
	<li>Accepts logical file request and notifies Application module</li>
	<li>Consults Matchmaker and Resource Planner to generate request plan</li>
	<li>Accepts get next events (files) requests from Client module</li>
	<li>Coordinates multi-application requests to share files</li>
	<li>Issues cache files request to Cache Manager</li>
	<li>Notifies Client module when a bundle of files is available in some cache (Can be on remote sites)</li>
	<li>Notifies Cache Manager when a Client is finished with files</li>
</ul>
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>
