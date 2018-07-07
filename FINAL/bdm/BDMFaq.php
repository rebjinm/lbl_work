<!DOCTYPE html>
<html>
<head>
	<title>BDM FAQs</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<p><a href="index.html">Back to BDM Home</a></p>
<h1>BDM Frequently Asked Questions</h1>
<ul>
<li>Support email : srm@lbl.gov </li>
</ul>
<h2>Introduction</h2>
<p>[[WebHome][BDM]] is a scalable data transfer management tool. The goal is to manage as much as 1+ PB with millions of files transfers reliably. 
Refer to NCAR page for more project description: https://wiki.ucar.edu/display/esgcet/Bulk+Data+Movement.</p>

Client is behind a firewall, what needs to be done extra ?
<p>Please try the following:<br>
The gridftp port range should be properly set.</p>
<ol>
<li>Contact your network administrator to open up a range of ports (for GridFTP data channel connections) for the incomming connections. If the firewall blocks the outgoing connections, open up a range of ports for outgoing connections as well.</li>
<li>Set the environment variable GLOBUS_TCP_PORT_RANGE</li>
<pre>
edit ${BDM_HOME}/tester/bin/bdmclient 
</pre>
<p>add the following line in the script</p>
<pre>
GLOBUS_TCP_PORT_RANGE=min,max
</pre>
<p>where min,max specify the port range that you have opened for the incoming connections on the firewall. This restricts the listening ports of the GridFTP client to this range. Recommended range is 1000 (e.g., 50000-51000) but it really depends on how much use you expect.</p>
<li>If you have a firewall blocking the outgoing connections and you have opened a range of ports, set the environment variable</li>
<pre>
GLOBUS_TCP_SOURCE_RANGE: 

${BDM_HOME}/tester/bin/bdmclient 
</pre>
<p>add the following line in the script</p>
<pre>
GLOBUS_TCP_SOURCE_RANGE=min,max
</pre>
</ol>

<h2>Run BDM with passive mode connection</h2>
<p>If the site is strictly behind the firewall and gridftp port range 
cannot be set. Run BDM with passive mode connection, with -usepassive flag turned on.
however there is a limitation, parallelism > 1 cannot be used and BDM opens new port connections for each file transfers.</p>

<h2>Please don't set any gridftp port range.</h2>
<p>If you are not sure, whether your machine is inside a firewall, please don't set any gridftp port range.</p>

<h2>Does BDM provide API's to be called from another program?</h2>
<p>Yes. Please see the sample programs, sample command and other details <a href="BDMOptions.html">here</a>.</p>

<h2>Can we transfer multiple source dirs/multiple files with BDM?</h2>
<p>Yes. BDM supports -f <inputfile> for transfering multiple source dirs/multiple files.  Please see the format for the inputfiles and other details <a href="BDMOptions.html">here</a>.</p>
	
h2>Can we resume the transfer later for the same request?</h2>
<p>Yes. BDM supports -resume <requesttoken> option. When a transfer has to discontinue for some reason, the same request can be resumed later with -resume <requesttoken> option.</p>

<h2>How to check the status of a request, when a transfer is going on?</h2>
<p>Use ${BDM_HOME}/tester/bin/bdmstatus script, it will show the current status of the latest request.</p>
<ul>
	<li>to see status of another request, use -requesttoken <requesttoken> alongwith bdmstatus.</li>
	<li>to list all requesttokens use -list option.</li>
	<li>to check status of BDM using an api, please refer to the full sample program <a href="BDMOptions.html">here</a>.</li>
</ul>

<h2>Does BDM only works with gsiftp protocol?</h2>
<p>Yes. currently it only supports gsiftp protocol.</p>

<h2>Can multiple transfer servers be used?</h2>
<p>Yes. -transferserver <gsiftp://host1...., gsiftp://host2.....> where host1 and host2 have the same file structure, in this example, bdm transfers approx. 50% files from host1 and approx. 50% files from host2.</p>

<h2>Can -usercert and -userkey pair be used instead of proxy?</h2>
<p>Yes. -usercert <path_to_user_cert> -userkey <path_to_user_key> can be used instead of proxy for BDM transfers.</p>

<h2>How to report to the srm list in case if there is a fix needed?</h2>
<p>Please locate the event log file, by default it write the event log file in ${BDM_HOME}/tester/bin location. Please also locate the server_debug.log in the ${BDM_HOME}/tester/bin location.
Please provide the exact command you have used and the client console output,
along with the attachments of the above file.</p>

<h2>How to compute the checksum for the files in the request?</h2>
<p>${BDM_HOME}/tester/bin/bdmclient -checksum will compare the checksum for the files if it is provided in the input file, if the checksum is not provided it calculates the checksum and writes in the database.</p>

<h2>How to get the publish report for the request?</h2>
<p>${BDM_HOME}/tester/bin/bdmstatus -publish ./test.xml
will only generate report for the completed files.</p>
<p>${BDM_HOME}/tester/bin/bdmstatus -erroredoutput ./test.xml
will only generate report for the error/failed files.</p>
<p>${BDM_HOME}/tester/bin/bdmstatus -alldetailedoutput ./test.xml
will generate report for the all files (success and failed files).</p>

<h2>Can any other relational db be used at the backend for BDM?</h2>
<p>Yes. All relational db's which supports JDBC api's.</p>

<h2>Do we need to download any other software in addition to BDM?</h2>
<p>No. BDM comes with all necessary libs.</p>

<h2>BDM hangs during callbacks. What do I do?</h2>
<p>If you are running on a machine with DHCP enabled, the local
IP address of the machine might be incorrectly detected by
Java.  Most commonly the IP address detected might be the
local loop-back address - 127.0.0.1.  </p>
<p>You can fix it by configure bdm with --with-globus-hostname option</p>

<p>example: --with-globus-hostname=64.34.58.128<br>
or --with-globus-hostname=myhost.mydomain.com</p>

<h2>What version of JDK does BDM work with?</h2>
<p>Currently, BDM is tested with Sun/Oracle version of JDK.
BDM is not tested with IBM version of JDK and OpenJDK.</p>

</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>
