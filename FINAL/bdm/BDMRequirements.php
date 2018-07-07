<!DOCTYPE html>
<html>
<head>
	<title>BDM Requirements</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<p><a href="index.html">Back to BDM Home</a></p>
<h1>Requirements and Rational</h1>
<h2>Space verification at target</h2>
<ul>
	<li>BDM client at target should find size from source node, and check space availability at target node</li>
	<li>Note: this applies to use case 1; could also be a requirement for use case 2.</li>
</ul>

<h2>Recovery and restart</h2>
<ul>
	<li>Recovery for transfer failure is a requirement for BDM client</li>
	<li>Restart mechanism should be provided by BDM client</li>
</ul>

<h2>Size of transfer request</h2>
<ul>
	<li>BDM client should support any size, even if it takes it days to complete.</li>
	<li>Initial goal: 50 TBs, 5,000 files (up to 10 GBs each)</li>
</ul>

<h2>On-demand transfer request status</h2>
<ul>
	<li>Should be supported asynchronously</li>
	<li>Mechanism: use request status to be used at anytime</li>
	<li>Only command line support needed</li>
	<li>Only summary needed (number of files and total size transferred/remaining, failures)</li>
	<li>Web access to summary status to be considered at a later stage</li>
</ul>

<h2>Support for checksum</h2>
<ul>
	<li>Should be available by default</li>
	<li>Requires checksums to be pre-computed and available at source nodes</li>
	<li>Not decided where checksums will be stored (metadata?)</li>
	<li>Option to disable checksum</li>
</ul>

<h2>Statistics collection</h2>
<ul>
	<li>Statistics should be collected at target site by BDM client</li>
	<li>At first - stored locally</li>
	<li>Later - may be provided to statistics server (metrix group issue)</li>
	<li>To be used for request estimation</li>
</ul>

<h2>Request estimation</h2>
<ul>
	<li>Prior to transfer - use recent statistics</li>
	<li>In-progress request estimation - use statistics of transfers so far to predict "time to completion"</li>
	<li>This feature is desirable - should be developed last</li>
</ul>

<h2>Take advantage of ESnet provisioning</h2>
<ul>
	<li>Highly desirable, start experimenting, add later</li>
</ul>

<h2>All bulk data movement (BDM) will be done in "pull mode"</h2>
<ul>
	<li>Allows "client BDM" to work behind a firewall</li>
	<li>Client DBM is lightweight and can include a transfer client</li>
	<li>Leaves control to target site</li>
</ul>

<h2>For writing data only disk-to-disk transfers will be supported</h2>
<ul>
	<li>Applies to use case 1</li>
	<li>Writing to data archiving is left as a local task</li>
</ul>

<h2>Some sites may support reading from archives</h2>
<ul>
	<li>Applies to use case 2</li>
	<li>Such sites may have to setup special security arrangements</li>
	<li>Site URLs may be used in such cases as the physical locations</li>
</ul>
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>
