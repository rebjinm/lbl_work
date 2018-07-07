<!DOCTYPE html>
<html>
<head>
	<title>PPDG Request Interpreter</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<p><a href="index.html">Back to PPDG Home</a></p>
<h1>PPDG Request Interpreter</h1>
<ul>
	<li>Accepts estimate requests based on property predicated</li>
	<li>Accepts execute requests for:</li>
	<ul>
	<li>Property predicates</li>
	<li>Set of events</li>
	<li>Set of files</li>
</ul>
	<li>Sends request inquiry to Logical Index Service</li>
	<li>Consults Matchmaker and Resource Planner for estimation</li>
	<li>Passes entire logical file request to Request Manager</li>
</ul>
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>
