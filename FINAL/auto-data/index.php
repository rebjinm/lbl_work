<!DOCTYPE html>
<html>
<head>
	<title>Autonomous Data Management and Integrating Distributed Data</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
	<h1>Autonomous Data Management and Integrating Distributed Data</h1>
	<p>Alex Sim</p>
	
	<h2>Autonomous Data Managment</h2>
	<p>We have worked on a number of techniques such as indexing and reshaping arrays automatically for accessing information in large data efficiently. To better support scientific data analytics without placing burden on scientists, we are currently working on strategies for autonomous and efficient parallelization of workloads, exchanging data neighbors, execution of analytics operations over deep memory and storage hierarchies.</p>
	
	<h2>Integrating Distributed Data</h2>
	<p>On top of autonomous data management, we are working on methods for data integration by collecting features and patterns into searchable indexes. Performing feature- and pattern-based searches on a variety of data types and a range of different query operations, with novel indexing and querying methods.For example, we have applied one of our pattern-based data search methods on data reduction.</p>
	
	<h2>Pattern-Based Streaming Data Reduction</h2>
	<p>Applications such as power grid sensor monitoring generate so much data very quickly, which presents a challenging storage requirement, or network transmission capacity. Our pattern-based statistical similarity method can be applied for data reduction, using a lossy compression method for some repeated information. They are primarily designed to minimize the Euclidean distance between the original data and the compressed data, and this measure of distance severely limits either reconstruction quality or compression performance.</p>
	<p>Our method (IDEALEM) based on block-based pattern search redefines the distance measure with a statistical concept known
as exchangeability. In our study with a set of power grid monitoring data, it can reduce the volume of data much more than the best-known compression method while maintaining the quality of the compressed data, far exceeding 100. It also has a small memory footprint (64K memory).</p>
	
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>