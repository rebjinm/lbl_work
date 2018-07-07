<!DOCTYPE html>
<html>
<head>
	<title>Berkeley Storage Manager (BeStMan)</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
	<h1>Berkeley Storage Manager (BeStMan)</h1>
	
	<h2>What It Does</h2>
	<ul>
		<li>Manages underlying storage for files.</li>
		<li>Supports multiple storage partitions.</li>
		<li>Works on existing storages with posix-compatible file systems, and adaptable to special file systems and storages with customized plug-in.</li>
		<li>Supports multiple transfer protocols and load balancing for multiple transfer servers</li>
		<li>Optional Data Movement Broker mode.</li>
		<li>Implements Storage Resource Management (SRM) interface v2.2, and compatible and interoperable with other 4 SRM implementations in WLCG.</li>
	</ul>
	
	<img src="bestman.png" style="width:40%">
	<p>Daily data transfer volume in OSG from 3/1/2015 to 4/15/2015. BeStMan is used for significant amount of transfer jobs in OSG.</p>
	
	<img src="bestman1.jpg" style="width:40%">
	<p>BeStMan as Data Movement Broker manages long running storage-to-storage file replications, enabling recovery of transient failures. (318 file replications from BNL HPSS to NERSC HPSS for STAR experiment)</p>
	
	<h2>Accomplishments</h2>
	<ul>
		<li>RPM distribution through OSG software stack as well as a packaged download.</li>
		<li>Highly customizable and pluggable for the storage needs.</li>
		<li>Open source under BSD license.</li>
		<li>Scalable performance with some file systems and storages, such as Xrootd and Hadoop.</li>
		<li>Organized an international standard through OFG - GFD.129, 2008.</li>
		<li>US Patent 8,705,342 B2, 2014. Co-scheduling of network resource provisioning and host-to-host bandwidth reservation on high-performance network and storage systems.</li>
	</ul>
	
	<h2>Impact</h2>
	<ul>
		<li>Enable scientific collaborations with uniform interface to the distributed storage resources.</li>
		<li>Enable storage accessibility and improve science productivity.</li>
		<li>43 BeStMan deployments worldwide and 5 backend deployments for CERN EOS system, as of 4/16/2015.</li>
		<li>Being used in scientific collaborations such as ESGF, OSG, and WLCG.</li>
	</ul>

</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>