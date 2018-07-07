<!DOCTYPE html>
<html>
<head>
	<title>StorNet Proposed Research</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<p><a href="index.html">Back to StorNet Home</a></p>
<h1>Description of the Proposed Research</h1>
<h3>Jump to:</h3>
<ul>
	<li><a href="#con">Control Plane</a></li>
	<li><a href="#man">Management Plane</a></li>
	<li><a href="#end">End-to-end network monitoring</a></li>
	<li><a href="#err">Error Handling / Fault Tolerance</a></li>
	<li><a href="#sec">Security</a></li>
	<li><a href="#ref">References</a></li>
</ul>

<p>In this section, we provide a detailed description of three data transfer planes for end-to-end resource provisioning:
control plane, data plane, and management plane.</p>

<a name="con"><h2>Control Plane</h2>
<p>The control plane consists of a storage resource management, network provisioning components, and a generic
network plug-in and underlying library to allow transfer applications to directly interact with heterogeneous storage and
network resource provisioning systems for the creation of end-to-end paths among storage sites. The data storage
management component is expected to dynamically allocate caching space from storage to necessitate data transfer,
and to manage data into/out of the storage media via allocated caching space. We will leverage the Storage Resource
Managers (SRM) protocol standard [SRM-OGF] and reference implementations from storage communities to allocate
caching space, make a request for target data if it is not in the space, pin files into the space during data transfer, and
release files after transfer is finished.</p>
<p>The current GridFTP and other transfer protocols assume best-effort IP networks and improve performance with a
large number of TCP streams for long, round-trip connections. Fairness and efficiency are all affected in such a brute
force data transfer mode. One primary goal is to move beyond the best-effort based data transfer with no delivery time
guarantee, and to extend the quality of service and performance guarantees to higher level data transfer applications
with existing network and storage provisioning systems. To simplify the implementation and encapsulate network and
storage co-scheduling required by the control plane, we will extend the existing storage schedule and reservation
module in BeStMan to reserve end-to-end network paths and, therefore, make intelligent optimizations among storage
space volume, lifetime reserved space, network bandwidth and reservation lifetime, and reliability, thus reducing the
“impedance mismatch” between end user data transfer applications, storage, and the networks. The role of this
enhanced BeStMan is to continuously match application needs with currently-reserved network connection
capabilities. The intended outcome is to enable scientific teams to benefit from both shared and dedicated high speed
connections. We will create system level “bridging” technologies to: 1) effectively share bandwidth reservation between
the different communication needs of a single distributed application, and 2) balance the interaction between the
constant bandwidth of dedicated channels and the variable capacity of IP networks to improve application
performance.</p>
<p>More specifically, we will add network provisioning plug-ins and libraries that will enable BeStMan to make web
services calls to either TeraPaths or OSCARS web services, and to exchange specialized messages for path
bandwidth reservation, modification, and reservation. The following piece of Java pseudo code provides a conceptual
description on how to invoke TeraPaths inside BeStMan. It shows that BeStMan already has a complete view of
information regarding data transfer, and the parameters needed by the network provisioning can be derived from
BeStMan view. Therefore, BeStMan provides a natural and efficient gateway to invoke network provisioning and QoS.
The actual implementation in the proposal will be more complex because it needs to interact with multiple provisioning
systems and support more proposed features. We will develop a novel, intelligent plug-in that can work with multiple,
heterogeneous network provisioning systems to query individual network domains, and to make realistic bandwidth
requests. Additional features can be added to the plug-in architecture, such as advance reservations, paths
negotiation, prioritization/reprioritization of among multiple network requests, path extensions and revocation. This
network provisioning plug-in for BeStMan provides a critical hinge to couple storage management and network
provisioning for upper data transfer applications.</p>
<pre>
Private initialization {
/#  Load QoS library and Create a QoS PlugIn
#/
if (configuration.getQosPluginClass()!=null)
this.qosPlugin = QOSPluginFactory.createInstance(configuration);}
private void makeQosReservation(int i) throws MalformedURLException, SRMException {
try {
CopyFileRequest cfr = (CopyFileRequest) fileRequests[i];
RequestCredential credential = RequestCredential.getRequestCredential(credentialId);
QOSTicket qosTicket = qosPlugin.createTicket(
credential.getCredentialName(),
(storage.getFileMetaData((SRMUser)getUser(),cfr.getFromPath())).size,
from_urls[i].getURL(),
from_urls[i].getPort(),
from_urls[i].getPort(),
from_urls[i].getProtocol(),
to_urls[i].getURL(),
to_urls[i].getPort(),
to_urls[i].getPort(),
to_urls[i].getProtocol());
qosPlugin.addTicket(qosTicket);
if (qosPlugin.submit()) {
cfr.setQOSTicket(qosTicket);
say("QOS Ticket Received "+qosPlugin.toString());
}
} catch(Exception e) {
say("Could not create QOS reservation: "+e.getMessage()); }
}
</pre>

<a name="man"><h2>Management Plane</h2>
<p>The management plane includes: monitoring, error handling/fault tolerance, and security.</p>

<a name="end"><h2>End-to-End Metwork Monitoring</h2>
<p>In the management plane, monitoring serves the following crucial purposes:</p>
<ul>
	<li>Obtain system status information from multiple layers involved in data transfer applications for scheduling purposes, i.e., data transfer progress, storage system, and network paths,</li>
	<li>Verify that configuration changes have occurred and that the provisioned network services match the actual request (service level agreement monitoring),</li>
	<li>Detect system failures and service outages, and</li>
	<li>Interface with providers of network and system resources.</li>
</ul>
<p>Several monitoring systems in use today, notably FTP progress heartbeat, BeStMan storage resource usage monitor,
perfSONAR [perf-web], and MonALISA [Mona-web], provide a wealth of information of each individual component in
the data plane. We plan to obtain monitoring data from such systems and process them through the existing software
plug-ins. We also anticipate the need for extending the range of information made available to automated data transfer
instances through modifying existing means, and via the addition of new data collection mechanisms. These
mechanisms will collect specific data that are not available by default but are nevertheless useful for end-to-end
resource management purposes. As required, we will develop data transfer specific monitoring components in the
context of the widely supported perfSONAR framework to leverage its capabilities and provide inter-operability with
other existing perfSONAR sites, and to integrate with existing BeStMan file transfer progress and storage usage
monitoring. Such a monitoring framework would provide a complete, global view into the data plane between end-to-
end transfer parties. This information can be used by BeStMan to make intelligent optimization decisions and avoid
resource mismatches, and to provide faster error diagnosis and fault tolerance than could be done by any individual
monitoring component or system.</p>

<a name="err"><h2>Error Handling / Fault Tolerance</h2>
<p>Due to the distributed and dynamic nature of an end-to-end data transfer environment, several failure scenarios have
to be considered in order to mitigate the impact of such failures, recover automatically if possible, and improve the
overall reliability of the system. Network device failures, software crashes, failures of data servers, and even individual
end systems and network domains joining and leaving the resource pool for any reason, can all have a range of
adverse effects upon a data transfer. The data transfer application and BeStMan will rely on both passive network
monitoring information collected from the monitoring framework (such as perfSONAR) and active, periodic, user level
probing (nothing is more effective than to use the provisioned service directly as users) to quickly detect failures. To
extend fault restoration within the end-to-end data plane, maintaining overall status awareness and having all physical
network domains and two transfer ends involved cooperate and coordinate in the recovery process is essential. We
plan to work closely with BeStMan/OSCAR/INTERNET2 DCN/!TeraPaths collaborators to design the mechanism of a
failure alarm notification to responsible parties, as well as a coordinated service recovery procedure. Failure recovery
can failover to redundant backup storage and network services reserved in advance, or in real time when failure
appears, or, in the worst case, fallback to best-effort networking and opportunistic storage space.</p>

<a name="sec"><h2>Security</h2>
<p>The data transfers traverse heterogeneous components, each of which may have different usage policies. These
policies, including authentication, authorization, and application constraints are critical for maintaining resource
ownership and security, and allocating and prioritizing resources based on user organization, roles, and groups. There
is no single security mechanism, in term of authentication and authorization, which can be applied to all application
domains and resources with different security requirements. The end-to-end resource provisioning tools have to
support multiple security mechanisms, including Kerboros, simple login/password, SSL, and Grid security
Infrastructure (GSI) even within the same data transfer activities. For example, end sites may require Kerboros and the
network provisioning system may require plain password. We will leverage the existing security stack in BeStMan and
GUMS [GUMS-Paper, GUMS-Web], a Generic Grid User Management System which was initiated by one of the co-PIs.</p>
<p>BeStMan will be enhanced to implement a pluggable authentication and access control stack allowing users to choose
from a wide variety of security mechanism, including anonymous access, protected password, X.509 certificate,
Kerboros, SSL, etc. To support the complex environment with stringent security requirements, BeStMan can choose to
delegate the authentication and authorization to GUMS, where the GUMS service is used to map users or end system
credentials to resource-specific identities/credentials (e.g., UNIX accounts or Kerberos principals) in accordance with
the site's resource usage policy. GUMS can be configured to map users dynamically per each request submitted.
GUMS is already used by all Open Science Grid (OSG) [OSG-web] sites to manage the security and authentication,
and mitigate the policy heterogeneity and complexity rising from distributed environment.</p>

<a name="ref"><h2>References</h2>
<ul>
	<li>[SRM-OGF] <a href="http://www.ogf.org/documents/GFD.129.pdf">http://www.ogf.org/documents/GFD.129.pdf</a></li>
	<li>[SDM-Center] <a href="http://sdmcenter.lbl.gov/">http://sdmcenter.lbl.gov/</a></li>
	<li>[Daya-Exp] The Daya Bay Neutrino Experiment: <a href="http://dayabay.bnl.gov/">http://dayabay.bnl.gov/</a></li>
	<li>[Tera-web] D. Yu and D. Katramatos, <a href="http://www.terapaths.org/">http://www.terapaths.org</a></li>
	<li>[DCN-web] Internet2 Dynamic Circuit Network (DCN): <a href="http://www.internet2.edu/network/dc/">http://www.internet2.edu/network/dc/</a></li>
	<li>[GUMS-Paper] CARCASSI, G. AND YU, D, ETC. “A Scalable Grid User Management System for Large Virtual Organization”. In Conference for Computing in High Energy and Nuclear Physics (Interlaken, Switzerland, Sep. 2004)</li>
	<li>[GUMS-Web] <a href="https://grid.racf.bnl.gov/Facility/GUMS">https://grid.racf.bnl.gov/Facility/GUMS</a></li>
	<li>[OSG-web] <a href="http://www.opensciencegrid.org/">http://www.opensciencegrid.org/</a></li>
	<li>[perf-web] perfSONAR: PERFormance Service Oriented Network monitoring ARchitecture: <a href="http://www.perfsonar.net/">http://www.perfsonar.net</a></li>
	<li>[Mona-web] MonALISA: MONitoring Agents using a Large Integrated Services Infrastructure: <a href="http://monalisa.caltech.edu/monalisa.htm">http://monalisa.caltech.edu/monalisa.htm</a></li>
</ul>
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>
