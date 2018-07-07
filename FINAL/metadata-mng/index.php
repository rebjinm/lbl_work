<!DOCTYPE html>
<html>
<head>
	<title>Scalable Object-centric Metadata Management for HPC Storage</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
	<h1>Scalable Object-centric Metadata Management for HPC Storage</h1>
	<p><strong>Investigators:</strong> Suren Byna (LBNL), P. Carns (ANL)</p>
	<p><strong>Program Manager:</strong> Lucy Nowell</p>
	
	<h2>Scientific Achievement</h2>
	<p>LBNL researchers developed a scalable, object-centric metadata management system targeting high-performance computing (HPC) systems, called SoMeta, that achieved 15X to 40X faster performance than Lustre in searching the metadata stored in ~277,000 data objects from Sloan Digital Sky Survey (SDSS) data. SoMeta is also 10X to 90X faster than distributed database technologies, such as SciDB, in searching the SDSS metadata.</p>
	
	<img src="metadata-mng1.jpg" style="width:40%">
	<p><strong>An overview of SoMeta system:</strong> Scalable service threads are placed in user space, one per compute node. Uses a combination distributed hash table and bloom filter for accelerating metadata object search process.</p>
	
	<img src="metadata-mng2.jpg" style="width:40%">
	<p><strong>Performance of SoMeta:</strong> In searching SDSS metadata objects, SoMeta outperforms Lustre by up to 40X, and SciDB and MongoDB by up to 90X (Y-axis is in log-scale.)</p>
	
	<h2>Significance and Impact</h2>
	<p>Scientific experiments and simulations produce massive number of data files with numerous variables. When the files and data variables are stored as objects with extensive metadata attached to them, existing file systems are incapable of locating the data scientists require in a scalable way.</p>
	
	<h2>Research Details</h2>
	<ul>
		<li>SoMeta provides a flat namespace metadata management strategy suitable for upcoming object-centric HPC storage</li>
		<li>Metadata objects can store extensive attribute information, such as relationships to other data objects, etc.</li>
		<li>Distributed, in-memory metadata management for fast metadata access</li>
	</ul>
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>