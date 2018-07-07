<!DOCTYPE html>
<html>
<head>
	<title>BeStMan 2 FAQs</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<p><a href="index.html">Back to BeStMan Home</a></p>
<h1>BeStMan 2 Frequently Asked Questions</h1>
<ul>
<li>Support email : srm<img src="https://www.symbols.com/gi.php?type=1&id=419&i=1" width="15px" height="15px">lbl.gov</li>
</ul>
<h3>Jump to:</h3>
<ul>
	<li><a href="#introduction">Introduction</a></li>
	<li><a href="#happens">What happens when BeStMan2 server configuration parameter is not recognized?</a></li>
	<li><a href="#srmcp">Does BeStMan2 work with srmcp from FNAL dCache?</a></li>
	<li><a href="#lcg">Does BeStMan2 work with lcg-cp or lcg-ls from lcg-utils?</a></li>
	<li><a href="#fts">Does BeStMan2 work with FTS?</a></li>
	<li><a href="#where">Where can I find BeStMan2?</a></li>
	<li><a href="#gums">GUMS connection from BeStMan2 is not working.</a></li>
	<li><a href="#can">Can BeStMan2 server handle large numbers in file size or space reservation?</a></li>
	<li><a href="#i">I have a customized mass storage system. Can I use BeStMan2 on top of our MSS?</a></li>
	<li><a href="#memory">How much memory does srm-copy use?</a></li>
	<li><a href="#provide">How can I provide multiple sources to srm-ls?</a></li>
	<li><a href="#server">How do I do for our SRM server to be monitored for its functionality and inter-operation?</a></li>
	<li><a href="#firewall">I have a firewall. What needs to be done extra?</a></li>
	<li><a href="#configure">How do I configure BeStMan2 scalable?</a></li>
	<li><a href="#external">How to provide external commands for space token usage?</a></li>
	<li><a href="#gridftp">I have a customized gridftp server with DSI backend. Can I have BeStMan2 use my gridftp server?</a></li>
	<li><a href="#gridftpservers">I have a few gridftp servers to work with. Can I have BeStMan2 use the all of those gridftp servers?</a></li>
	<li><a href="#protocols">I have other transfer protocols to work with. Can I have BeStMan2 use the other transfer protocols such as root?</a></li>
</ul>

<a name="introduction"><h2>Introduction</h2>
<p><a href="WebHome.html">BeStMan2</a> is a full implementation of SRM v2.2, developed by Lawrence Berkeley National Laboratory, for disk based storage systems and mass storage systems such as HPSS. End users may have their own personal <a href="WebHome.html">BeStMan2</a> that manages and provides an SRM interface to their local disks or storage systems. It works on top of existing disk-based unix file system, and has been reported so far to work on file systems such as NFS, PVFS, AFS, GFS, GPFS, PNFS, HFS+, <a href="BeStMan2Guide.BeStMan2FAQ;nowysiwyg=0.html">LustrE</a>, Ibrix, and <a href="BeStMan2Guide.BeStMan2FAQ;nowysiwyg=0.html">XrootdFS</a>. It also works with any file transfer service, such as gsiftp, http, https and ftp, as supported file transfer protocols. It requires minimal administrative efforts on the deployment and maintenance. <a href="WebHome.html">BeStMan2</a> also has a gateway mode by configuration that would provide a full SRM interface with small footprints on any existing file system without queuing or space management.</p>

<p><a href="WebHome.html">SRM</a><a href="http://sdm.lbl.gov/srm-wg/doc/SRM.v2.2.html"> v2.2 specification can be found <a href="http://sdm.lbl.gov/srm-wg/doc/SRM.v2.2.html">here</a>. BeStMan2 downloads and instructions can be found here.</p>


<a name="happens"><h2>What happens when BeStMan2 server configuration parameter is not recognized?</h2>
<p>Those unrecognized entries in the bestman2.rc configuration file would be ignored when running <a href="WebHome.html">BeStMan2</a> server. So, having conf parameters for full management mode would not affect the server running on gateway mode.</p>

<a name="srmcp"><h2>Does BeStMan2 work with srmcp from FNAL dCache?</h2>
<p>Yes. Refer to sections 7.5-7.9 on <a href="WebHome.html">BeStMan2 guide</a> for sample commands.</p>

<a name="lgc"><h2>Does BeStMan2 work with lcg-cp or lcg-ls from lcg-utils?</h2>
<p>Yes. Refer to sections 7.10-7.11 on <a href="WebHome.html">BeStMan2 guide</a> for sample commands.</p>

<a name="fts"><h2>Does BeStMan2 work with FTS?</h2>
<p>Yes. It works with FTS with or without space token. glite-url-copy also works.</p>

<a name="where"><h2>Where can I find BeStMan2?</h2>
<p><a href="http://sdm.lbl.gov/bestman">http://sdm.lbl.gov/bestman</a> contains the latest gzipped tar pkg for direct downloading and installation. VDT contains the BeStMan2 package, and pacman installation includes gridftp server. Sample pacman command is following: pacman -get <a href="http://vdt.cs.wisc.edu/vdt_1101_cache:Bestman">http://vdt.cs.wisc.edu/vdt_1101_cache:Bestman</a>. Pacman BeStMan2 installation does not include EDG-mkgridmap, and you can install it separately: pacman -get <a href="http://vdt.cs.wisc.edu/vdt_1101_cache:EDG-Make-Gridmap">http://vdt.cs.wisc.edu/vdt_1101_cache:EDG-Make-Gridmap</a>. OSG BeStMan2 VDT installation guide can be found <a href="Bestman.html">here</a>.</p>

<a name="gums"><h2>GUMS connection from BeStMan2 is not working.</h2>
<ul>
<li>When GUMS connection is successful, srm-ping to the BeStMan2 server will display the properly mapped local id. When GUMS connection is not working, localIDMapped will be null instead. e.g.</li>
<pre>
Key=clientDN
Value=/DC=org/DC=doegrids/OU=People/CN=Arie Shoshani 12345
Key=localIDMapped
Value=osgatlas004
</pre>
<li>Check proper GUMSserviceURL in conf/bestman.rc.</li>
<ul>
<li>e.g. GUMSserviceURL=<a href="https://gums.lbl.gov:8443/gums/services/gumsauthorizationserviceport/">https://gums.lbl.gov:8443/gums/services/GUMSAuthorizationServicePort</a> </li>
</ul>
<li>GUMSCurrHostDN should be the DN that GUMS server allows to decide which mapping group you are in. Many times, it’s the host DN where BeStMan server runs: e.g. openssl x509 -in /etc/grid-security/hostcert.pem -noout -subject returns subject=/DC=org/DC=doegrids/OU=Services/CN=srm.lbl.gov.</li>
<li>An example of host mapping on a typical GUMS server is: /?.lbl.gov</li>
<li>The local mapping can be checked on the web to your GUMS server by clicking on the “host to group mappings” link or directly at <a href="https://yourgumsserver.domain.tld:8443/gums/hosttogroupmappings.jsp/">https://yourgumsserver.domain.tld:8443/gums/hostToGroupMappings.jsp</a></li>
<li>Sometimes, local system where BeStMan2 server runs needs the existence of the following path: /etc/grid-security/vomsdir/vdt_empty.pem. Try the following two commands:</li>
<pre>
% mkdir /etc/grid-security/vomsdir
% touch /etc/grid-security/vomsdir/vdt_empty.pem
</pre>
<li>BeStMan2 GUMS connection does not depend on /etc/grid-security/gsi-authz.conf and /etc/grid-security/prima-authz.conf files.</li>
</ul>

<a name="can"><h2>Can BeStMan2 server handle large numbers in file size or space reservation?</h2>
<p>As long as there is enough space on the storage, BeStMan2 can handle as much as java allows. Currently it is 18,446,744,073,709,551,615.</p>

<a name="i"><h2>I have a customized mass storage system. Can I use BeStMan2 on top of our MSS?</h2>
<p>If your customized mass storage system has POSIX compliant file system, BeStMan2 as is would work on top of your MSS. If you have special clients for your MSS access, you can extend BeStMan MSS plugin library to support your customized MSS as custodial quality storage. For more info on how to extend the plugin library, send an email to srm<img src="https://www.symbols.com/gi.php?type=1&id=419&i=1" width="15px" height="15px">lbl.gov.</p>

<a name="memory"><h2>How much memory does srm-copy use?</h2>
<p>Because LBNL BeStMan SRM-Client tools are based on java, there is a java vm overhead. However, when one file is requested, it is somewhat optimized so that less memory (about 30MB) is used. It is still more than C-based SRM copy client such as lcg-cp, but considering modern computer hardware systems, this memory usage would be okay. Our work on the memory usage optimization will be done continuously.</p>

<a name="provide"><h2>How can I provide multiple sources to srm-ls?</h2>
<p>LBNL <a href="WebHome.html">BeStMan SRM-Client tools</a> support multiple "-s' options so that users can provide multiple source urls.</p>

<a name="server"><h2>How do I do for our SRM server to be monitored for its functionality and inter-operation?</h2>
<p><a href="http://datagrid.lbl.gov/sitereg">Register</a> your SRM endpoint here and follow the instructions. There would be daily testing and results would be posted on the web.<a href="http://datagrid.lbl.gov/v22">http://datagrid.lbl.gov/v22</a> or <a href="http://datagrid.lbl.gov/osg">http://datagrid.lbl.gov/osg</a></p>

<a name="firewall"><h2>I have a firewall. What needs to be done extra?</h2>
<p>If you have firewall, the gridftp port range should be properly set in VDT installation. In order to do so, you need to modify vdt-local-setup.sh.</p>
<pre>
edit $VDT_LOCATION/vdt/etc/vdt-local-setup.sh
GLOBUS_TCP_SOURCE_RANGE= low_port,high_port
GLOBUS_TCP_PORT_RANGE= low_port,high_port
export GLOBUS_TCP_SOURCE_RANGE
export GLOBUS_TCP_PORT_RANGE
</pre>
<p>Where low_port,high_port - controls all outbound globus connections for gridftp (e.g GLOBUS_TCP_PORT_RANGE=40000,49150). This low_port,high_port must correspond to --globus-tcp-port-range of VDT configuration of BeStMan2 (or --with-globus-tcp-port-range and --with-globus-tcp-source-range from the BeStMan2 manual configuration). Also, make sure that two ports for BeStMan2 (--http-port and --https-port from the VDT configuration) are open.</p>

<a name="configure"><h2>How do I configure BeStMan2 scalable?</h2>
<p>Refer to <a href="ScalabilityNotes.html">Notes for Scalability</a>.</p>

<a name="external"><h2>How to provide external commands for space token usage?</h2>
<p>If staticTokenList is used for space tokens in Gateway mode, [usedBytesCommand:External_command] and [totalBytesCommand:External_command] can be used to provide the size information from the external commands. For example:</p>
<pre>
staticTokenList=ATLASHOTDISK[desc:ATLASHOTDISK][retention:REPLICA][latency:ONLINE][path:/data2/atlasdata/atlashotdisk][usedBytesCommand:/bin/echo
</pre>
<ul>
<li>Note that /bin/echo with ` and ` around the external command provides a way to java based bestman process to capture the displayed information.</li>
<li>Note that the path information given in the option per space token is appended to the external command. If the external command does not require the path information, do not set the [path:...] option.</li>
</ul>

<a name="gridftp"><h2>I have a customized gridftp server with DSI backend. Can I have BeStMan2 use my gridftp server?</h2>
<p>Yes, for full management mode and for gateway mode. During the configuration, provide your customized gridftp server url --with-transfer-servers. E.g. --with-transfer-servers=gsiftp://mygsiftp.domain.tld:2812 You can confirm or modify by checking conf/bestman.rc for entry: supportedProtocolList=gsiftp://mygsiftp.domain.tld:2812</p>

<a name="gridftpservers"><h2>I have a few gridftp servers to work with. Can I have BeStMan2 use the all of those gridftp servers?</h2>
<p>Yes, for full management mode and for gateway mode. During the configuration, provide your gridftp server urls --with-transfer-servers with semi-colon separated entries. Those gsiftp servers would be used in round-robin bases for TURLs. E.g.</p> </p>--with-transfer-servers="gsiftp://gsiftp1.domain.tld;gsiftp://gsiftp2.domain.tld;gsiftp://gsiftp3.domain.tld"; You can confirm or modify by checking conf/bestman.rc for entry:</p>
<p>supportedProtocolList=gsiftp://gsiftp1.domain.tld;gsiftp://gsiftp2.domain.tld;gsiftp://gsiftp3.domain.tld</p>

<a name="protocols"><h2>I have other transfer protocols to work with. Can I have BeStMan2 use the other transfer protocols such as root?</h2>
<p>Yes, add root://-style URLs to supportedProtocolList, as well as matching entry in acceptProtocols. E.g.</p>
<p>supportedProtocolList=gsiftp://eosppsftp.cern.ch;root://eospps.cern.ch</p>
<p>acceptProtocols=root[/eos /eos]</p>
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>
