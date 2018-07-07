<!DOCTYPE html>
<html>
<head>
	<title>SDS-Sort</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
	<h1>SDS-Sort: Scalable Dynamic Skew-Aware Parallel Sorting</h1>
	<h3></h3>
	<p><strong>Investigators:</strong> John Wu, Suren Byna, Bin Dong</p>
	
	<h2>Challenge</h2>
	<p>Parallel sorting is an essential tool for scientific data management, but existing algorithms in several large-scale distributed data analytic systems are ineffective with skewed data, where there are many duplicate values.</p>
	
	<h2>Our Solution</h2>
	<p>We designed and developed novel, skew-aware, and highly-scalable parallel sorting.</p>
	<img src="sds-sort.jpg" style="width:60%">
	<p>HykSort is the fastest known parallel sorting algorithm, but when the sorting key is skewed, it could have a very significant load imbalance that causes it to run out of memory on some nodes. In contrast, SDS-Sort can maintain a good load balance (theoretically bounded by O(4N/p)) and reduce the execution time. SDS-Sort also provides stable sorting.</p>
	
	<h2>Outcome</h2>
	<p>A more efficient sorting algorithm in the Scientific Data Services (SDS) framework</p>
	
	<h2>Applications</h2>
	<p>Cosmology datasets from a simulation (GADGET-2) and from an observation (Palomar Transient Factory-PTF)</p>
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>