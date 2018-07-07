<!DOCTYPE html>
<html>
<head>
<title>BeStManFAQ</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<p><a href="index.html">Back to BeStMan Home</a></p>
<h1>Frequently Asked Questions</h1>
<ul>
<li>Support email : srm@lbl.gov</li>
</ul>
<h2>1. Introduction</h2>
 <a href="Software/BeStMan.WebHome">BeStMan</a> is a full implementation of SRM v2.2, developed by Lawrence Berkeley National Laboratory, for disk based storage systems and mass storage systems such as HPSS. End users may have their own personal <a href="Software/BeStMan.WebHome">BeStMan</a> that manages and provides an SRM interface to their local disks or storage systems. It works on top of existing disk-based unix file system, and has been reported so far to work on file systems such as NFS, PVFS, AFS, GFS, GPFS, PNFS, HFS+ and Lustre. It also works with any file transfer service, such as gsiftp, http, https and ftp, as supported file transfer protocols. It requires the minimal administrative efforts on the deployment and maintenance. <a href="Software/BeStMan.WebHome">BeStMan</a> also has a gateway mode by configuration that would provide a lightweight SRM interface on any existing file system without queuing or space management.

<a href="Projects.SRMwg.WebHome">SRM</a> v2.2 specification can be found on http://sdm.lbl.gov/srm-wg/doc/SRM.v2.2.html. <a href="Software/BeStMan.WebHome">BeStMan</a> downloads and instructions can be found on http://sdm.lbl.gov/bestman.

<h2>2.1 What happens when BeStMan server configuration parameter is not recognized?</h2>
 Those unrecognized entries in the bestman.rc configuration file would be ignored when running <a href="Software/BeStMan.WebHome">BeStMan</a> server. So, having conf parameters for full management mode would not affect the server running on gateway mode.

<h2>2.2 Does BeStMan work with srmcp from FNAL dCache?</h2>
 Yes. Refer to sections 7.5-7.9 on <a href="Software/BeStMan/BeStManGuide.WebHome">BeStMan guide</a> for sample commands.

<h2>2.3 Does BeStMan work with lcg-cp or lcg-ls from lcg-utils?</h2>
 Yes. Refer to sections 7.10-7.11 on <a href="Software/BeStMan/BeStManGuide.WebHome">BeStMan guide</a> for sample commands.

<h2>2.4 Does BeStMan work with FTS?</h2>
<p>Yes. It works with FTS with or without space token. glite-url-copy also works.</p>
<h2>2.5 Where can I find BeStMan?</h2>
 http://sdm.lbl.gov/bestman contains the latest gzipped tar pkg for direct downloading and installation. VDT contains the BeStMan package, and pacman installation includes gridftp server. Sample pacman command is following: pacman -get http://vdt.cs.wisc.edu/vdt_1101_cache:Bestman. Pacman BeStMan installation does not include EDG-mkgridmap, and you can install it separately: pacman -get http://vdt.cs.wisc.edu/vdt_1101_cache:EDG-Make-Gridmap. OSG BeStMan VDT installation guide can be found on <a href="https://twiki.grid.iu.edu/bin/view/ReleaseDocumentation/Bestman">here</a>.

<h2>2.6 GUMS connection from BeStMan is not working.</h2>
<ul>
<li>When GUMS connection is successful, srm-ping to the BeStMan server will display the properly mapped local id. When GUMS connection is not working, localIDMapped will be null instead. e.g.</li>
</ul>
<pre>
         Key=clientDN
         Value=/DC=org/DC=doegrids/OU=People/CN=Arie Shoshani 12345
         Key=localIDMapped
         Value=osgatlas004
</pre>
<ul>
<li>Check proper GUMSserviceURL in conf/bestman.rc.</li>
<ul>
<li>e.g. GUMSserviceURL=https://gums.lbl.gov:8443/gums/services/GUMSAuthorizationServicePort</li>
</ul>
<li>Check proper GUMSCurrHostDN in conf/bestman.rc.</li>
<ul>
<li>e.g. GUMSCurrHostDN=/DC=org/DC=doegrids/OU=Services/CN=srm.lbl.lbl.gov</li>
</ul>
<li>GUMSCurrHostDN should be the DN that GUMS server allows to decide which mapping group you are in. Many times, it&rsquo;s the host DN where BeStMan server runs: e.g. openssl x509 -in /etc/grid-security/hostcert.pem -noout -subject returns subject=/DC=org/DC=doegrids/OU=Services/CN=srm.lbl.gov.</li>
<p>* An example of host mapping on a typical GUMS server is: */?*.lbl.gov</p>
<li>The local mapping can be checked on the web to your GUMS server by clicking on the &ldquo;host to group mappings&rdquo; link or directly at https://yourgumsserver.domain.tld:8443/gums/hostToGroupMappings.jsp</li>
<li>Sometimes, local system where BeStMan server runs needs the existence of the following path: /etc/grid-security/vomsdir/vdt_empty.pem. Try the following two commands:</li>
</ul>
<pre>
       % mkdir /etc/grid-security/vomsdir
       % touch /etc/grid-security/vomsdir/vdt_empty.pem
</pre>
<ul>
<li>BeStMan GUMS connection does not depend on /etc/grid-security/gsi-authz.conf and /etc/grid-security/prima-authz.conf files.</li>
</ul>
<h2>2.7 I have a customized gridftp server with DSI backend. Can I have BeStMan use my gridftp server?</h2>
<p>Yes, for full management mode and for gateway mode. <br>During the configuration, provide your customized gridftp server url --with-transfer-servers.</p>
<p><br> E.g. --with-transfer-servers=gsiftp://mygsiftp.domain.tld:2812 You can confirm or modify by checking conf/bestman.rc for entry:</p>
<p><br> supportedProtocolList=gsiftp://mygsiftp.domain.tld:2812</p>
<h2>2.8 I have a few gridftp servers to work with. Can I have BeStMan use the all of those gridftp servers?</h2>
<p>Yes, for full management mode and for gateway mode. During the configuration, provide your gridftp server urls --with-transfer-servers with semi-colon separated entries. Those gsiftp servers would be used in round-robin bases for TURLs.</p>
<p><br> E.g. --with-transfer-servers="gsiftp://gsiftp1.domain.tld;gsiftp://gsiftp2.domain.tld;gsiftp://gsiftp3.domain.tld"; You can confirm or modify by checking conf/bestman.rc for entry:</p>
<p><br> supportedProtocolList=gsiftp://gsiftp1.domain.tld;gsiftp://gsiftp2.domain.tld;gsiftp://gsiftp3.domain.tld</p>
<h2>2.9 Can BeStMan server handle large numbers in file size or space reservation?</h2>
<p>As long as there is enough space on the storage, BeStMan can handle as much as java allows. Currently it is 18,446,744,073,709,551,615.</p>
<h2>2.10 I have a customized mass storage system. Can I use BeStMan on top of our MSS?</h2>
<p>If your customized mass storage system has POSIX compliant file system, BeStMan as is would work on top of your MSS. If you have special clients for your MSS access, you can extend BeStMan MSS plugin library to support your customized MSS as custodial quality storage. For more info on how to extend the plugin library, send an email to srm<img alt="" src="/images/image_at_14.gif" />lbl.gov.</p>
<h2>2.11 How much memory does srm-copy use?</h2>
<p>Because LBNL SRM-Client tools are based on java, there is a java vm overhead. However, when one file is requested, it is somewhat optimized so that less memory (about 30MB) is used. It is still more than C-based SRM copy client such as lcg-cp, but considering modern computer hardware systems, this memory usage would be okay. Our work on the memory usage optimization will be done continuously.</p>
<h2>2.12 How can I provide multiple sources to srm-ls?</h2>
 LBNL <a href="Software.SRMClients.WebHome">SRM-Client tools</a> support multiple "-s' options so that users can provide multiple source urls.

<h2>2.13 How do I do for our SRM server to be monitored for its functionality and inter-operation?</h2>
 <a href="http://datagrid.lbl.gov/sitereg">Register</a> your SRM endpoint here and follow the instruction. There would be daily testing and results would be posted on the web: http://datagrid.lbl.gov/v22 or http://datagrid.lbl.gov/osg

<h2>2.14 I have a firewall. What needs to be done extra?</h2>
<p>If you have firewall, the gridftp port range should be properly set in VDT installation. In order to do so, you need to modify vdt-local-setup.sh.</p>
<p>edit =$VDT_LOCATION/vdt/etc/vdt-local-setup.sh=</p>
<p><pre></p>
<p>GLOBUS_TCP_SOURCE_RANGE= low_port,high_port</p>
<p>GLOBUS_TCP_PORT_RANGE= low_port,high_port</p>
<p>export GLOBUS_TCP_SOURCE_RANGE</p>
<p>export GLOBUS_TCP_PORT_RANGE</p>
<p></pre></p>
<p>Where low_port,high_port - controls all outbound globus connections for gridftp (e.g GLOBUS_TCP_PORT_RANGE=40000,49150).<br></p>
<p>This low_port,high_port must correspond to --globus-tcp-port-range of VDT configuration of BeStMan (or --with-globus-tcp-port-range and --with-globus-tcp-source-range from the BeStMan manual configuration).<br></p>
<p>Also, make sure that two ports for BeStMan (--http-port and --https-port from the VDT configuration) are open.<br></p>
<br>

</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>