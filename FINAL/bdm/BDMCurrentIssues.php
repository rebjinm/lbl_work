<!DOCTYPE html>
<html>
<head>
	<title>BDM Current Issues</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<p><a href="index.html">Back to BDM Home</a></p>
<h1>BDM Current Issues and Discussion Items</h1>
<ul>
	<li>Data Access Authentication and Authorization - Nov, 2009 </li>
	<li>Current discussion: http://www.ci.uchicago.edu/wiki/bin/view/ESGProject/BDMSecurityModel</li>
	<li>Currently we assume that each site replication user has his/her own grid credential, and is properly mapped at the source for read permissions.</li>
	<li>BDM client can be packaged in such a way that the replication user does not need any grid software installed locally.</li>
	<li>This scenario assumes there are not many replication users.</li>
	<li>If GSI is problematic, we can have scp/sftp implemented as one of the supported transfer protocols sooner than later. However, scp/sftp also needs a proper mapping at the source such as pass-phrase insert in authorized_keys for a designated login or a user's own login.</li>
	<li>If some kind of authorization scheme would be used, it should be handled at the connection level, not at the file level for scalability issues. Also, the authorization should be valid for multiple connections over time.</li>
	<li>Role-based authorization attachment Could be used with GSI proxy.</li>
	<li>All these authorization mechanisms should be simple and easy for replication users in usage and maintenance.</li>
</ul>
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>