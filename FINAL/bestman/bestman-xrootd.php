<!DOCTYPE html>
<html>
<head>
	<title>BeStMan-Xrootd</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<p><a href="index.html">Back to BeStMan Home</a></p>
<h1>BeStMan-Xrootd</h1>
<ul>
	<li>BeStMan-Xrootd is combined with BeStMan as gateway mode as of Aug. 1, 2008.</li><br>
	<li>BeStMan-Xrootd is a generic SRM v2.2 load balancing front-end for GridFTP servers. It works with any Posix-like file systems. It is specifically tested with gLite File Transfer Service (FTS) and glite-url-copy, a componment of gLite software used by the ATLAS experiment on the Large Hadron Collider. BeStMan-Xrootd only provides SRM interface as a thin layer to its underlying storage system, and doesn't do any request queuing or space management, nor does it transfer data. BeStMan-Xrootd requires one or more file transfer servers. BeStMan-Xrootd was originally designed for the Xrootd storage system. However, it can be used with any storage system that has a GridFTP server and a Posix-like file system interface.</li><br>
	<li><a href="http://wt2.slac.stanford.edu/xrootdfs/bestman-gateway.html">BeStMan-Xrootd Guide at SLAC</a></li>
</ul>
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>
