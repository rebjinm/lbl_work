<!DOCTYPE html>
<html>
<head>
<title>Installation</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<p><a href="index.html">Back to BeStMan Client Tools User's Guide</a></p>
<h1>BeStMan SRM-Client Tools User's Guide</h1>
<h1>Installation</h1>
<ul>
<li>Manual installation from a web downloadable file</li>
<li>After <a href="https://codeforge.lbl.gov/frs/?group_id=54">downloading from the web</a>, expand from the gzipped tar file, and it creates bestman-client directory.</li>
</ul>
<ul>
<li><a href="https://twiki.grid.iu.edu/bin/view/ReleaseDocumentation/LBNLSrmClient">VDT packman installation</a> <br>VDT (http://vdt.cs.wisc.edu) provides a package SRM-Client-LBNL for installing, using pacman.</li>
</ul>
<h2>Installation Preparation</h2>
<ul>
<li>Java 1.5.0_x or higher Java home path</li>
<ul>
<li>e.g. /sandbox/jdk1.5.0_12</li>
</ul>
<li>BeStMan SRM-Client Tools  installation directory</li>
<ul>
<li>This directory may be created during the installation process,</li>
<li>e.g. /opt/bestman2</li>
</ul>
<li>User Grid Certificate and valid grid mapping on the server side</li>
<ul>
<li>The existing user certificate can be used, or a new user certificate can be obtained.</li>
<ul>
<li>e.g. /DC=org/DC=doegrids/OU=People/CN=Arie Shoshani 123456</li>
<li>e.g. in /etc/grid-security/grid-mapfile,  ì/DC=org/DC=doegrids/OU=People/CN=Arie Shoshani 123456î osg</li>
<li>e.g. GUMS mapping for /DC=org/DC=doegrids/OU=People/CN=Arie Shoshani 123456î</li>
</ul>
</ul>
<li>Grid CA certificate directory and valid CRLs</li>
<ul>
<li>The existing CA certificate directory must be used, and /etc/grid-security/certificates is used by default.</li>
<ul>
<li>e.g. /etc/grid-security/certificates</li>
</ul>
</ul>
<li>GLOBUS_TCP_PORT_RANGE</li>
<ul>
<li>These ports have to be opened when there is a firewall on the system.</li>
<ul>
<li>e.g. GLOBUS_TCP_PORT_RANGE=62001,62999</li>
</ul>
</ul>
</ul>
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>