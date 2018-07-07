<!DOCTYPE html>
<html>
<head>
	<title>BeStMan 2 User's Guide</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<p><a href="index.html">Back to BeStMan Home</a></p>
<h1>Berkeley Storage Manager (BeStMan) version 2.2.2.x.x Users Guide</h1>
<p>BeStMan version 2.2.2.x.x (a.k.a. v2.x.x) is a full implementation of SRM v2.2, developed by Lawrence Berkeley National Laboratory, for disk based storage systems and mass storage systems such as HPSS. End users may have their own personal BeStMan that manages and provides an SRM interface to their local disks or storage systems. It works on top of existing disk-based unix file system, and has been reported so far to work on file systems such as NFS, PVFS, AFS, GFS, GPFS, PNFS, HFS+, HDFS, Ibrix, Lustre and XrootdFS. It also works with any file transfer service, such as gsiftp, http, https and ftp, as supported file transfer protocols. It requires the minimal administrative efforts on the deployment and maintenance. BeStMan also has a Gateway mode by configuration that would provide the same SRM interface on any existing file system without queuing or space management and provide great performance. SRM v2.2 specification can be found on <a href="http://sdm.lbl.gov/srm-wg/doc/SRM.v2.2.html">http://sdm.lbl.gov/srm-wg/doc/SRM.v2.2.html</a>.</p>
<ul>
	<li><a href="Requirements.html">Requirements</a></li>
	<li><a href="Installation.html">Installation</a></li>
	<li><a href="Configuration.html">Configuration and Notes</a></li>
	<li><a href="Running.html">Running BeStMan2 server</a></li>
	<li><a href="SampleConf.html">Sample configuration files</a></li>
	<li><a href="SampleClients.html">Sample SRM client commands related to BeStMan2 configuration</a></li>
	<li><a href="Customize.html">Customizations and Plug-ins</a></li>
	<li><a href="BeStMan2FAQ.html">Frequently Asked Questions</a></li>
	<li><a href="ScalabilityNotes.html">Notes for Scalability</a></li>
	<li><a href="Reference.html">Reference</a></li>
</ul>

<h3>Support</h3>
<ul>
	<li>Email: srmlbl.gov</li>
	<li>Alex Sim, Junmin Gu, Vijaya Natarajan, Arie Shoshani</li>
	Lawrence Berkeley National Laboratory
</ul>
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>
