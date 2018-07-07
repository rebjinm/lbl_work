<!DOCTYPE html>
<html>
<head>
	<title>Optimized Parallel I/O for Big Data Analytics at a Trillion Particle Scale</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
	<h1>Optimized Parallel I/O for Big Data Analytics at a Trillion Particle Scale</h1>
	<p></p>
	<p><strong>Investigators:</strong> Suren Byna (LBNL), P. Carns (ANL)</p>
	<p><strong>Program Manager:</strong> Lucy Nowell</p>
	
	<h2>Scientific Achievement</h2>
	<p>Using Big Data analytics algorithms to analyze the tens of terabytes produced by trillion particle scale cosmology and plasma physics simulations needs high-performance data read/write (I/O) functions, where the time spent in I/O must be minimized. LBNL researchers developed I/O methods and optimizations to drive the I/O time down to a minimum.</p>
	
	<img src="opt-io.jpg" style="width:40%">
	<p>Clusters identified in 1.4 trillion particle space weather simulation: Spatial distribution of clusters identified by the clustering algorithm developed in this work. The high-density clusters are mainly localized within the current sheet and appear as narrow structures elongated along the direction of local magnetic field. Scientists interpret that the particles comprising the clusters have been accelerated in a process where they gain a fixed amount of energy in a relatively narrow region of space. This observation helped the scientists understand principles of plasma interactions in space weather. (Image Credit: V. Roytershteyn, LANL/SSI)</p>
	
	<h2>Significance and Impact</h2>
	<p>Researchers achieved near-peak I/O performance on NERSC file systems, enabling DBScan & K-nearest neighbor algorithms scale to 100,000 cores and leading to first-of-a-kind data analysis and visualizations that helped scientists understand principles of space weather.</p>

	<h2>Research Details</h2>
	<ul>
		<li>Used HDF5 for reading raw data and writing clustering analysis results, which are tens of terabytes in size</li>
		<li>Work was performed using NERSC systems, in collaboration with scientists from Intel Labs</li>
		<li>Tuned data layout of files on Lustre file system to improve parallelism when reading and writing data</li>
	</ul>
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>