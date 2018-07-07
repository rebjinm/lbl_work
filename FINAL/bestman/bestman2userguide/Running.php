<!DOCTYPE html>
<html>
<head>
<title>Running</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<h1>Running BeStMan2 server</h1>
<h2>Running BeStMan2 server manually</h2>
<p>From the bestman2 installation directory, run sbin/bestman.server.</p>
<p>SXXbestman.personal may be used for testing purpose only that it saves all screen outputs to /tmp/bestman-.log. SXXbestman.personal has four options: start, stop, check and checkjava.</p>
<ul>
<li>&ldquo;SXXbestman.personal start&rdquo; will run the bestman2 server and output goes into /tmp/bestman-.log as well as on the screen.</li>
<li>&ldquo;SXXbestman.personal stop&rdquo; will stop the running server.</li>
<li>&ldquo;SXXbestman.personal check&rdquo; will check the process to see if it is running.</li>
<li>&ldquo;SXXbestman.personal checkjava&rdquo; will check java version that the server runs with.</li>
</ul>
<h2>Running BeStMan2 server from VDT installation</h2>
<p>From the bestman2 installation directory (bestman2/sbin/SXXbestman), VDT-control will run BeStMan2 server process under daemon by default.</p>
<h2>Running BeStMan2 server under root or installing as a startup process</h2>
<p>As root, make a link or a copy of bestman2/sbin/SXXbestman in /etc/rc3.d as S97bestman.</p>
<p>SXXbestman has three options: start, stop and check.</p>
<ul>
<li>&ldquo;SXXbestman start&rdquo; will run the bestman server in the background.</li>
<li>&ldquo;SXXbestman stop&rdquo; will stop the running server.</li>
<li>&ldquo;SXXbestman check&rdquo; will check the process to see if it is running.</li>
</ul>
<p>SXXbestman has the BeStMan2 server process owner login embedded. By default, &ldquo;root&rdquo; will be used. <br>If --with-srm-owner were defined during the configuration, the specific login will be used. <br>If a modification is needed later, edit bestman2/sbin/SXXbestman, and modify for SRM_OWNER.</p>
<br>
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>