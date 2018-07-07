<!DOCTYPE html>
<html>
<head>
	<title>StorNet Approach</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<p><a href="index.html">Back to StorNet Home</a></p>	
<h1>End-to-end coordination of storage allocation, end-systems bandwidth, and network provisioning</h1>
<p>Many existing data transfer tools tightly couple all of their functionalities and components into monolithic
software; while they can meet current needs and work well, they are hard to install, customize, and integrate.
On the other hand, a well-organized layered data transfer framework is capable of elegantly handling these
problems. As shown in Figure 1, the proposed data transfer framework is comprised of three layers: 1) the
data plane consists of disk and/or tape storage systems, and LAN and WAN backbone; 2) the control plane
includes a storage resource scheduler, LAN QoS provisioning system, and WAN backbone Bandwidth and
circuit reservation systems utilizing MPLS/GMPLS to configure network bandwidth engineering; and 3) the
management plane to monitor resource functionality and performance, and to diagnose and recover resource
faults. It also provides authentication, access control, and other security functionalities.</p>
<p>In this layer view architecture, the control plane is responsible for reserving and configuring resources
belonging to the data plane to meet data transfer and storage requirements. The control plane is comprised
of several components, each of which provisions an individual data plane component and is required to
coordinate with all others along the end-to-end paths to provision data transfer channels from sources to
destinations. The existing production systems, such as BeStMan, TeraPaths, and OSCARS, already provide
standalone provisioning capability, and therefore can be leveraged by the control plane implementation with
necessary software integration for the joint network and storage resource reservations required for balanced,
end-to-end data plane provisioning.</p>
<p>In our proposal, we will enhance BeStMan to be network-aware; choose optimized well-balanced
combinations of network quality of service in terms of bandwidth, packet loss, and jitter rate to match
particular data transfer requests; allow it to interact directly with network resource provisioning systems to
make advanced reservations; negotiate and utilize network resource with specified quality of service
parameters to ensure a predicated and guaranteed data transfer between end-to-end storage systems.
Similarly, the management plane consists of SRM storage and data transfers, and perfSonar based network
monitoring systems that work together to provide an integrated view along the transfer path in the data plane.
The accuracy of performance diagnoses can be improved due to this rich set of monitoring systems.
Furthermore, the vertical integration among different layers, such as the control plane and the management
plane, will ensure much more efficient resource provisioning and fast fault recovery than each plane functions
independently.</p>
<p>Simply put, our proposed framework is an organic integration of the above-mentioned layers. It needs to be
carefully designed to let the components effectively work together. Compared to existing data transfer tools,
the main benefit of our proposed framework is that each plane and its components can be developed
independently and modified transparently without affecting others. We provide more details of the critical
modules in the following subsections.</p>
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>
