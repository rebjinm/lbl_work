<!DOCTYPE html>
<html>
<head>
	<title>StorNet Abstract</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<p><a href="index.html">Back to StorNet Home</a></p>
<h1>Abstract</h1>
<p>DOE funded data intensive applications have generated the need for novel data transfer technologies and
automated tools that are capable of effectively utilizing available raw network bandwidth and intelligently
assisting scientists in replicating a huge volume of data to any desired location in a timely manner. We
propose to design and develop an integrated end-to-end resource provisioning and management system for
high performance data transfer framework to leverage heterogeneous network protocols and storage types in
a federated computing environment.</p>
<p>Our proposed data transfer framework will provide the capability of predicable, yet efficient delivery of
terabits/second data transfer throughput for data intensive applications. The framework is to be based on a
layered architecture: data plane, control plane, and management plane to incorporate functional modules:
resource co-scheduling, storage resource management, network resource provisioning, data transfer,
security, monitoring and problem diagnosis, each of which can be flexibly added and customized in a “plug-
and-play” fashion only when needed. We plan to leverage the existing Storage Resource Manager (SRM) to
manage heterogeneous storage types, including disk, tape, and Peer-to-Peer data storage, and enable it to
interact with the existing DOE TeraPaths and OSCARS projects to utilize the high performance dynamic
circuit capability provided by DOE’s Science Data Network (SDN) and terabit LAN, with the goal of supporting
end to end predicable data transfer with quality of services.</p>
<p>The research challenge is to develop analytical tools and efficient approaches for joint allocation and co-
scheduling of well-balanced network and storage resources involved in data transfer. The proposed product
and research outcomes will play a transformative role to bridge end-to-end advanced storage and network
technologies with science applications in a transparent way.</p>
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>
