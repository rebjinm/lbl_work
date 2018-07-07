<!DOCTYPE html>
<html>
<head>
	<title>ArrayUDF</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
	<h1>ArrayUDF: Custom Analyses with Automated Data Management</h1>
	<p>Open source at: <a href="https://bitbucket.org/arrayudf/">https://bitbucket.org/arrayudf/</a></p>
	
	<h2>Challenge</h2>
	<p>Scientific data analysis code spends a lot of effort on data management and other common tasks, but performs a wide variety of operations. Can we automate the data management without restricting analysis operations?</p>
	
	<h2>Solution</h2>
	<p>Demonstrate a novel scalable framework to perform user-defined custom data analysis on massive datasets on supercomputers</p>
	
	<h2>Signficance and Impact</h2>
	<p><strong><u>Tens to thousands of times faster</u></strong> than the state-of-the-art Big Data systems</p>
	
	<h2>Research Details</h2>
	<ul>
		<li>An efficient and scalable user-defined function (UDF) execution framework that allows users to define their operations on the familiar array data</li>
		<li>Optimized data management and execution on supercomputers; scale to larger datasets where Spark ran out of memory</li>
		<li><strong>Tested on operations from large DOE science applications</strong></li>
	</ul>
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>