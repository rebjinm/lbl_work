<!DOCTYPE html>
<html>
<head>
<title>F2F10101006</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<h1>Project meeting</h1>
<ul>
<li>Ocg. 6, 2010 at LBNL, briefly followed by ANI review meeting</li>
<li>Attendees: Dimitrios Katramatos, Dantong Yu, Arie Shoshani, Alex Sim</li>
<li>Notes</li>
<ul>
<li>Data transfers can be a separate entity, independent from the SRM.</li>
<li>SRM may not be needed for the reserved data transfer with qualify of service.</li>
<li>Negotiation is out of band. This is through the BeStMan interface, piggy back on the existing SRM message passing.</li>
<li>How do we handle the LAN without the TeraPaths?</li>
<li>In ORNL, there will be a static network circuit that can be setup as requests.</li>
<li>SRM might need to directly talk to OSCARS or non-TeraPaths LAN provisioning systems.</li>
<li>One way to handle the Quality of Service is via over-provisioning.</li>
<li>When you are funded by DOE, you have to consider complex and heterogeneous sites that is different from your own sites.</li>
<li>University of Michigan: will not run OSCARS, and not officially DOE Network supported site. We will replace U Michigan with LBNL or a site on ESnet.</li>
</ul>
<li>Year 1 Accomplishments</li>
<ul>
<li>LBNL Accomplishments</li>
<ul>
<li>Coordination and management of the end-to-end storage resource and bandwidth reservation</li>
<li>Coordination with network resource provisioning service (TeraPaths) for advanced network reservations</li>
<li>Management of the negotiated end-to-end storage and network resources</li>
</ul>
<li>BNL Accomplishments</li>
<ul>
<li>Design and implementation of intelligent multi-domain bandwidth allocation algorithms</li>
<li>Management of the end-to-end network resource negotiation and configuration</li>
</ul>
</ul>
<li>Summarize of the year 2 plan</li>
<ul>
<li>Decouple the SRM/GridFtp.</li>
<li>Replace the TeraPaths with ESCPS</li>
<li>Bundle GridFTP with the generic co-scheduler that is stripped down from SRM/BeStMan</li>
<li>Testbed in LBNL</li>
</ul>
<li>Whiteboard notes</li>
</ul>
<p><img width="50%" alt="" src="https://sdm.lbl.gov/twiki/docs/Projects/StorNet/Meetings/F2F10101006/notes-10.06.10.jpg" height="50%" /></p>
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>