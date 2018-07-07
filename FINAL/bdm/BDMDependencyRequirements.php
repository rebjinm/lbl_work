<!DOCTYPE html>
<html>
<head>
	<title>BDM Dependency Requirements</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<p><a href="index.html">Back to BDM Home</a></p>
<h1>Dependency requirements</h1>
<h2>GSI usage</h2>
<ul>
	<li>We assume that an agreement between all sites on the use of GSI will take place. That includes coordination and trust establishment between certificate authorities in different countries/institutions</li>
</ul>

<h2>GridFTP usage</h2>
<ul>
	<li>We assume that all site will use !GridFTP clients when they pull data (could be bundled into BDM client)</li>
	<li>We assume that all nodes providing data will support a !GridFTP server accessible through open ports (in order for clients to pull data from them)</li>
	<li>Note: in case that other protocols will have to be supported the BDM client will have to support these</li>
</ul>

<h2>Other</h2>
<ul>
	<li>Source sites have grid-enabled transfer servers such as !GridFTP servers.</li>
	<li>Destination sites have grid CA certificates in place.</li>
	<li>The user already has grid certificate and mapped at the source sites.</li>
	<li>The user has obtained a full qualified transfer URL for a directory or files of the type(protocol://&lt;hostname&gt;:&lt;port&gt;/&lt;data_file_path&gt;) by some means. For example, by browsing the published directory, by searching the ESG metadata collection on the ESG gateway portal, or by getting notified by someone.</li>
</ul>
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>

