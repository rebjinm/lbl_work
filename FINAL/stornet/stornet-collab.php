<!DOCTYPE html>
<html>
<head>
	<title>StorNet Collaborators</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<p><a href="index.html">Back to StorNet Home</a></p>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<h1>Collaborators (ESnet, internet2, ESG)</h1>
<h3>Jump to:</h3>
<ul>
	<li><a href="#int">Integrate with DOE ESnet and SDN, Internet 2 and DOE Laboratories LANs</a></li>
	<li><a href="#doe">DOE High-End Applications Outreach</a></li>
	<li><a href="#ref">References</a></li>
</ul>
<p>This project team consists of two DOE lab (BNL and LBNL). Our collaboration effort focuses on technologies
that are directly applicable to 1) DOE ESNet and the Science Data Network (SDN) [Tera-web], 2) DOE
laboratories LANs; and 3) DOE high-end applications and their transfer activities. We will interact with and
leverage the existing projects funded by DOE SciDAC and Advanced Network for our final software product:
e.g. TeraPaths, OSCARS, and the Scientific Data Management Center for Enabling Technology [SDM-
center]. The co-PI is also the PI of the SDM center, and a co-PI of the ESG project. These connections
should help in applying the results of this project.</p>

<a name="int"><h2>Integrate with DOE ESnet and SDN, Internet 2 and DOE Laboratories LANs</h2>
<p>The co-PI is also the PI of TeraPaths which involves BNL and multiple university’s LANs and coordinates the
ESnet and SDN via OSCAR to provide end-to-end paths. We will leverage the existing close collaboration
among TeraPaths team, DOE ESnet, and Internet2 dynamic circuit network (DCN) [DCN-web] to make
network reservation for the proposed data transfer framework. We will co-develop the network middleware
interface to ensure seamless integration between the data transfer framework and underlying DOE network
infrastructure. We will evaluate the impact of the coordinated network resource reservation to the efficiency of
the DOE network and end storage resource. We will work with ESnet engineers to deploy and validate our
composible framework into their direct attached network beacon nodes to allow them to evaluate the
effectiveness of the new WAN network technologies for high speed data transfer. TeraPaths is already
deployed into BNL campus network to manage its bandwidth allocation. Once our proposal is funded, the two
projects will merge and give rise to a new integrated data transfer and network provisioning tool managing
DOE laboratories LAN, as requested by the call for proposal.</p>
<p>One of the important issues that we plan to coordinate with ESnet, is bandwidth availability estimation.
Estimation is essential prior to bandwidth reservation, and for deciding whether to start a transfer task at all.
For example if the SRMs on both ends of the transfer determine that they could use 1Gb/s for 4 hours
sustained (moving roughly 2.5 TBs), it is important to know when such a bandwidth will become available.
Furthermore, if the bandwidth will not be available for say, 3 days, the SRM may prefer to use 0.5 Gb/s
sooner for double the duration of 8 hours. Such information is not currently available directly; rather OSCARS
needs to be repeatedly polled. Since excessive polling is disruptive to OSCARS too, we will work with ESnet
people to determine what information will be useful for planning without the need for polling.</p>

<a name="doe"><h2>DOE High-End Applications Outreach</h2>
<p>We purposely select four DOE experiments (LHC, RHIC, LSST, and Daya Bay Neutrino [Daya-Exp]
experiments) with aggressive data transfer goals that BNL plays a pivotal role as “pilot” users for our
proposed data transfer tools to demonstrate its capabilities in simplifying distributed data transfer, improving
overall resource utilization and decreasing time-to-completion for data transfer tasks. By using the physics
community we hope to determine what types of adaptations users and applications need to make to utilize
the proposed tools. This information will be incorporated into the final product to make it easier for other
science application groups. We will progressively increase our outreach to fusion science, bio-informatics and
complex model simulation and visualization during the project’s three year duration.</p>

<a name="ref"><h2>References</h2>
<ul>
	<li>[SDM-Center] <a href="http://sdmcenter.lbl.gov/">http://sdmcenter.lbl.gov/</a></li>
	<li>[Daya-Exp] The Daya Bay Neutrino Experiment: <a href="http://dayabay.bnl.gov/">http://dayabay.bnl.gov/</a></li>
	<li>[Tera-web] D. Yu and D. Katramatos, <a href="http://www.terapaths.org/">http://www.terapaths.org</a></li>
	<li>[DCN-web] Internet2 Dynamic Circuit Network (DCN): <a href="http://www.internet2.edu/network/dc/">http://www.internet2.edu/network/dc/</a></li>
</ul>
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>
