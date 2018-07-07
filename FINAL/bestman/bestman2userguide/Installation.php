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
<h1>Installation</h1>
<ul>
<li>Manual installation from a web downloadable file <br>After downloading from the web (https://codeforge.lbl.gov/projects/bestman/) and expanding from the gzipped tar file, it creates bestman2 directory.</li>
<li>VDT packman installation</li>
<ul>
<li>VDT (http://vdt.cs.wisc.edu) provides a package for installing BeStMan2, using pacman.</li>
<li>Refer to OSG VDT installation pages<br></li>
<ul>
<li><a href="https://twiki.grid.iu.edu/bin/view/ReleaseDocumentation/Bestman">OSG VDT BeStMan full mode installation page</a></li>
<li><a href="https://twiki.grid.iu.edu/bin/view/ReleaseDocumentation/BestmanGateway">OSG VDT BeStMan gateway mode installation page</a></li>
<li><a href="https://twiki.grid.iu.edu/bin/view/ReleaseDocumentation/BestmanGatewayXrootd">OSG VDT BeStMan gateway mode with Xrootd installation page</a></li>
<li><a href="https://twiki.grid.iu.edu/bin/view/ReleaseDocumentation/Hadoop#4_5_SRM_server">OSG Hadoop installation page for BeStMan gateway mode</a></li>
</ul>
</ul>
</ul>
<h2>Installation Preparation</h2>
<ul>
<li>Java 1.6.0_x or higher Java home path</li>
<ul>
<li>e.g. /sandbox/jdk1.6.0_12</li>
</ul>
<li>BeStMan2 installation directory</li>
<ul>
<li>This directory may be created during the installation process,</li>
<li>e.g. /opt/bestman2</li>
</ul>
<li>Grid Service Certificate</li>
<ul>
<li>The existing host certificate can be used, or a new service certificate can be obtained.</li>
<li>These service certificates must be accessible by the BeStMan2 process owner.</li>
<li>Note: WLCG experiments require host certificates.</li>
<ul>
<li>e.g. /DC=org/DC=doegrids/OU=Services/CN=myhost.lbl.gov</li>
</ul>
<li>in /etc/grid-security/hostcert.pem and /etc/grid-security/hostkey.pem</li>
<ul>
<li>e.g. /DC=org/DC=doegrids/OU=Services/CN=srm/myhost.lbl.gov</li>
</ul>
<li>in /opt/srm/demo/srmcert.pem and /opt/srm/demo/srmkey.pem</li>
</ul>
<li>Grid CA certificate directory</li>
<ul>
<li>The existing CA certificate directory must be used, and /etc/grid-security/certificates is used by default.</li>
<ul>
<li>e.g. /etc/grid-security/certificates</li>
</ul>
</ul>
<li>GridFTP server hostname and port number if different from 2811</li>
<ul>
<li>This is needed for putting files into BeStMan2 managed storage system.</li>
<ul>
<li>e.g. srm.lbl.gov</li>
</ul>
</ul>
<li>GLOBUS_TCP_PORT_RANGE</li>
<ul>
<li>These ports have to be opened when there is a firewall on the system.</li>
<ul>
<li>e.g. GLOBUS_TCP_PORT_RANGE=48001,48999</li>
</ul>
</ul>
<li>One open port number to be assigned to BeStMan2</li>
<ul>
<li>This port has to be opened when there is a firewall on the system.</li>
<ul>
<li>e.g. https=8443</li>
</ul>
</ul>
<li>Local disk path and size information to be managed by BeStMan2</li>
<ul>
<li>e.g. /data/bestman/cache : 20000MB</li>
</ul>
<li>log file path information for BeStMan2 (recommended using different disk partition from the cache)</li>
<ul>
<li>e.g. /data2/bestman/log</li>
</ul>
<li>Decision to run BeStMan2 in gateway mode without any managements or in full management mode (default: gateway mode)</li>
</ul>
<h2>Installing and Running BeStMan for the impatients</h2>
<h3>Getaway mode</h3>
<p>For those who do not have time to follow the whole page and whose host machine meets the following assumptions, the easy three steps will have BeStMan2 server ready on the host machine.</p>
<ul>
<li>Assumptions</li>
<ul>
<li>root is being used to configure and run the BeStMan2 server in gateway mode</li>
<li>host certificate exists in /etc/grid-security/hostcert.pem</li>
<li>the machine does not have a firewall</li>
<li>all default configurable values are used</li>
</ul>
<li>Run configure in bestman2/setup directory:</li>
<ul>
<li>e.g. % ./configure</li>
</ul>
<li>Start the server in bestman2/sbin directory:</li>
<ul>
<li>e.g. % SXXbestman start</li>
</ul>
<li>Check the server:</li>
<ul>
<li>e.g. % bestman2/bin/srm-ping srm://hostname:8443/srm/v2/server</li>
</ul>
<li>When checking the server prints out BeStMan2 server version information, it is up and running and ready for your work.</li>
</ul>
<h3>Full management mode</h3>
<p>For those who do not have time to follow the whole page and whose host machine meets the following assumptions, the easy three steps will have BeStMan2 server ready on the host machine.</p>
<ul>
<li>Assumptions</li>
<ul>
<li>root is being used to configure and run the BeStMan2 server</li>
<li>host certificate exists in /etc/grid-security/hostcert.pem</li>
<li>the machine does not have a firewall</li>
<li>all default configurable values are used</li>
</ul>
<li>Decide your BeStMan2 managed cache path and its size and run configure in bestman2/setup directory:</li>
<ul>
<li>e.g. % ./configure --with-replica-storage-path=/data/bestman/cache --with-replica-storage-size=20000</li>
</ul>
<li>Start the server in bestman2/sbin directory:</li>
<ul>
<li>e.g. % SXXbestman start</li>
</ul>
<li>Check the server:</li>
<ul>
<li>e.g. % bestman2/bin/srm-ping srm://hostname:8443/srm/v2/server</li>
</ul>
<li>When checking the server prints out BeStMan2 server version information, it is up and running and ready for your work.</li>
</ul>
<br>

</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>