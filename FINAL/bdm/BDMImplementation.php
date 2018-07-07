<!DOCTYPE html>
<html>
<head>
	<title>BDM Implementation</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<p><a href="index.html">Back to BDM Home</a></p>
<h1>BDM Implementation Details</h1>

The architectural diagram (see below/attachments) has 12 modules that fall into three categories: initialization, execution, and interactive functions. The functionality of each of these modules is described below.

<h2>Initialization</h2>
<ul>
	<li>Verify storage at Target<br /> Givent the source URLs of directories or files to be moved, this module extracts the total size from the metadata at the source gateway or the source node, and verifies that the target node has sufficient space allocated.</li>
	<li>Generate plan using statistics<br /> This module uses previous statistics to plan the concurrency level to use in moving files (i.e. how many files can be transferred at the same time). Initially, this will be based on bandwidth estimated provided as parameters.</li>
	<li>Initial request estimation<br /> Using total size and concurrency level, an estimate of the total time required for the transfer will be provided. The request can be aborted at this time if the total transfer time is unacceptable.</li>
	<li>Replicate directory structure<br /> Once a "go ahead" is given, this module generates a directory structure that mimics the source directory structure. This is done by finding the structure of the directories and files at the source from the metadata at the source gateway, and creating the exact structure at the target. This module also generates the full list of source-to-target URL pairs for the execution of the transfer. At this time a "request token" is provided to the client calling BDM, and transfer continues as a background task. The token can be used later for tracking the progress of the transfer (see "interactive functions" below).</li>
</ul>

<h2>Execution</h2>
<ul>
	<li>Multi-file request coordinator<br /> This module coordinates the entire transfer task. It initiate multiple threads according to the concurrency level. Each thread initiates calls the file transfer client, monitors for successful transfers (checking file sizes), and recovers from transient transfer failures (requesting transfer resumption from the point of failure). For each thread that completes successfully it restarts another thread, keeping the concurrency level at the maximum rate. Note that checksum will be checked later.</li>
	<li>File transfer client<br /> The file transfer client can use any desired transfer protocol. However, initially only GridFTP will be used because all sites agreed to use that. Only a client is used at the mirroring node, and it gets the files by "pulling" them from the source nodes. It is assume that the source nodes will have a GridFTP server available. Note that if the source node is down, retries will be attempted for a pre-specified retry time till it recovers. If the retry time expires, the BDM will suspend its operation.</li>
	<li>Recovery and restart<br /> This module is responsible to recover from failures of the mirroring (target) node. For this purpose, the state of transfers will be recorded on non-volatile storage (disk). The strategy is delete any partially transferred file, and re-transfer this files from the source.</li>
	<li>Monitor and generate statistics<br /> This module will record performance statistics on a per-file-basis, and generate global summaries. Initially, this function will only log begin-end times and file sizes. It will also generate global summary statistics dynamically (i.e transfer rate so far). These statistics will be available for "dynamic progress estimation" module (see next page).</li>
	<li>Checksum comparison<br /> This module will retrieve the checksums from the source metadata, generate checksums to all files that were transferred, and compare. For the files that fail the checksum test, it will generate a (hopefully) small request to re-transfer, and start a new transfer task. The checksums are checked at the end rather than at transfer time, since this is viewed as potentially slowing down the transfers. It was one of the requirements that all checksums are checked at the end of the transfer of all files.</li>
</ul>

<h2>Interactive functions</h2>
<ul>
	<li>On-demand status<br /> Using the request token provided at initialization, the client can issue a status command to BDM. Summary statistics will be provided, including total files transferred (out of how many), total size transferred so far, average transfer rate.</li>
	<li>Dynamic progress estimation<br /> This information can be provided at the same time as status request. Initially this module will use only the dynamic average transfer rate generated by the "monitor and record statistics" module. At a later time, it may analyze transfer patterns for more accurate estimation.</li>
	<li>Suspend and resume<br /> These two functions will allow the client to suspend the transfer operation for any reason (such as planned power outage, maintenance, etc.), and resume operation at a later time. The suspend module will ensure a consistent state before suspending. It may give an option of continuing for a while longer to complete current transfers. If permission is not granted, it will remove all partially transferred files, and quit.</li>
</ul>

<h2>Timeline for Implementation Tasks</h2>
<p>The implementation timeline has three phases. Each of the 12 modules described above describe tasks below according to these phases.</p>
<p>Phase I is designed to provide all the necessary basic functionality to perform bulk data movement, and set up several testbeds. Phase II will provide some enhanced capabilities and perform extensive scaling tests. Phase III will add all remaining advanced functionality. It is the intention of this implementation plan that at the end of phase I all the basic technical issues (such as communication with gateways and nodes, and well as performing concurrent transfers using GriFTP) will be resolved and implemented. Scalability testing and enhancements will follow.</p>

<h3>Schedule:</h3>
<p>The tasks described below and phases of their implementation are summarized in a table at the end of this section.</p>
<ol>
<li>Initialization</li>
<ol>
	<li>Request submission</li>
	<ul>
	<li>Phase 1: Support source URLs based on gsiftp servers</li>
	<li>Phase 3: Support source URLs based on http and scp/sftp servers</li>
	</ul>
	<li>Verify source URLs and sizes</li>
	<ul>
	<li>Phase 1: covers all</li>
	</ul>
	<li>Verify destination URLs and storage at Target</li>
	<ul>
	<li>Phase 1: covers all</li>
	</ul>
	<li>Generate plan using statistics</li>
	<ul>
	<li>Phase 1: Use assumptions on network performance, estimated bandwidth provided as parameters.</li>
	<li>Phase 2: Use saved history of the past request performance</li>
	<li>Phase 3: Use metrics service if available</li>
	</ul>
	<li>Initial request estimation</li>
	<ul>
	<li>Phase 1: Simple estimation based on assumptions or given parameters on network performance</li>
	<li>Phase 2: Estimation based on the saved history of the past request performance</li>
	<li>Phase 3: Estimation based on the performance history from the metrics service in addition to the saved history of the past request performance</li>
	</ul>
	<li>Replicate directory structure at the destination</li>
	<ul>
	<li>Phase 1: covers all</li>
	</ul>
</ol>
<li>Execution</li>
<ol>
	<li>Multi-file request coordination</li>
	<ul>
	<li>Phase 1: covers all</li>
	</ul>
	<li>File transfer client</li>
	<ul>
	<li>Phase 1: Use gsiftp client api from globus 4.2.1</li>
	<li>Phase 3: Support gsiftp, http, https and scp/sftp</li>
	</ul>
	<li>Monitor and generate statistics</li>
	<ul>
	<li>Phase 1: covers all</li>
	</ul>
	<li>Logging</li>
	<ul>
	<li>Phase 1: covers all</li>
	</ul>
	<li>Recovery and restart</li>
	<ul>
	<li>Phase 1: Transient transfer failure recovery and restart</li>
	<li>Phase 3: Recovery and restart from non-transient failures such machine or program crash</li>
	</ul>
</ol>

<li>Interactive functions</li>
<ol>
	<li>On-demand status</li>
	<ul>
	<li>Phase 1: covers all</li>
	</ul>
	<li>Suspend and resume</li>
	<ul>
	<li>Phase 3: Support program suspend and resume</li>
	</ul>
	<li>Dynamic progress estimation</li>
	<ul>
	<li>Phase 2: Use dynamic average transfer rate generated by monitoring</li>
	</ul>
</ol>

<li>Post transfer tasks</li>
<ul>
	<li>Checksum calculation and comparison</li>
	<li>Phase 1:</li>
	<li>Assume one checksum type; adler32, md5 or CRC</li>
	<li>Assume checksum values are in hexadecimal or decimal (decide)</li>
	<li>Assume that checksum value for the source files are available given</li>
	<li>If checksum values for source files are not given, only checksum calculations on the transferred files will be done</li>
	<li>Phase 3:</li>
	<li>Checksum value for the source files can be retrieved from some source</li>
	<li>Compose and generate a new request input on checksum failed files</li>
	<li>Phase 2:</li>
	<li>Covers all</li>
	<li>If checksum values for source files are not available, a new request will not be generated</li>
</ul>

<li>Testbed setup</li>
<p>Note: all scalability testing will depend on the hardware capabilities and network capacity between of sites involved.</p>
<ol>
	<li>Initial sites in US</li>
	<ul>
	<li>Phase 1:</li>
	<li>Test setup on first candidate sites; LLNL, NCAR, ORNL and LBNL</li>
	<li>Network performance measurement between sites and follow up with network people when necessary.</li>
	<li>BDM client testing environment setup</li>
	</ul>
	<li>Additional sites in Europe</li>
	<ul>
	<li>Phase 2:</li>
	<li>Test for scalability of BDM client</li>
	<li>Include other candidate sites</li>
	<li>Continuous network performance measurement between sites and follow up with network people when necessary.</li>
	</ul>
	<li>Additional sites in other locations</li>
	<ul>
	<li>Phase 3:</li>
	<li>add sites in US and Europe</li>
	<li>Add sites in Asia</li>
	</ul>
</ol>
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>
