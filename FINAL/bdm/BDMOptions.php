<!DOCTYPE html>
<html>
<head>
	<title>BDM Options</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
	<p><a href="index.html">Back to BDM Home</a></p>
<h1>Interaction specification</h1>

<ul>
	<li>User (or another client) calls BDM (Bulk Data Mover) to copy files </li>
	<ul>
	<li>User provides a pair of source directory/files location (source URL) and target directory/files location (target URL), and estimated total size (optional)</li>
	<li>BDM returns a "request_token"</li>
	<li>BDM returns time estimate to completion (only if estimated total size was provided)</li>
	<li>Default is that checksum is checked. Option to disable checksum checks</li>
	</ul>
	<li>User calls BDM to find out status of request </li>
	<ul>
	<li>User provides "request_token"</li>
	<li>BDM returns total size and number of files already moved, total size and number of files remaining, and time estimate to completion.</li>
	</ul>
	<li>User calls BDM to restart a previous failed request </li>
	<ul>
	<li>User provides "request_token"</li>
	<li>BDM returns total size and number of files already moved, total size and number of files remaining, and time estimate to completion</li>
	</ul>
	<li>User calls BDM to abort request </li>
	<ul>
	<li>User provides "request_token"</li>
	</ul>
</ul>

<h2>Input XML Validation</h2>
<ul>
	<li><a href="http://xmlsoft.org/">libxml2</a> was used to validate the XSD and sample XML files </li>
	<li>e.g. xmllint --noout --schema bdm_input.xsd sample1.xml</li>
</ul>

<h2>Java API</h2>
<ul>
<li>Limitations
<ul>
<li>There must be only one active request at a time for the same instance (per DB).</li>
</ul>
<li>Sample compilation</li>
<ul>
<li><verbatim>CLASSPATH=.:${BDM_HOME}/lib/bdm.jar:${BDM_HOME}/lib/util.jar:${BDM_HOME}/lib/h2/h2-1.1.118.jar:${BDM_HOME}/lib/globus/cog-jglobus-1.7.0.jar:${BDM_HOME}/lib/globus/cog-url-1.7.0.jar:${BDM_HOME}/lib/globus/commons-logging-1.1.jar:${BDM_HOME}/lib/globus/cryptix-asn1.jar:${BDM_HOME}/lib/globus/cryptix.jar:${BDM_HOME}/lib/globus/cryptix32.jar:${BDM_HOME}/lib/globus/jce-jdk13-131.jar:${BDM_HOME}/lib/globus/jgss.jar:${BDM_HOME}/lib/globus/junit.jar:${BDM_HOME}/lib/globus/log4j-1.2.15.jar:${BDM_HOME}/lib/globus/puretls.jar:${BDM_HOME}/lib/globus/xercesImpl.jar 
javac -classpath $CLASSPATH BDMClientAPISample.java </verbatim>
</li>
</ul>
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>
