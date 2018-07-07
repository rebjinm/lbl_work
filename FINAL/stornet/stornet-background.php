<!DOCTYPE html>
<html>
<head>
	<title>StorNet Background</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<p><a href="index.html">Back to StorNet Home</a></p>
<h1>StorNet: Existing Components to be Used</h1>
<h3>Jump to:</h3>
<ul>
	<li><a href="#srm">SRM-BeStMan</a></li>
	<li><a href="#ter">TeraPaths</a></li>
	<li><a href="#osc">OSCARS</a></li>
	<li><a href="#ref">References</a></li>
</ul>

<a name="srm"><h2>SRM-BeStMan</h2>
<p>When dealing with large amounts data and storage, the scientists need to interact with a variety of storage
systems, each with different interfaces and security mechanisms, and to pre-allocate storage to ensure data
generation and analysis tasks can take place successfully. To accommodate this need, the concept of
Storage Resource Managers (SRMs) was developed at LBNL [SSG02, SSG03].</p>
<p>SRMs are middleware components whose function is to provide a common access interface, dynamic space
allocation and file management for shared distributed storage systems. The goal of the SRM activity was to
develop a standard specification against which multiple implementations can be developed. This approach
proved to be a remarkable and unique achievement, in that now there are multiple SRMs developed in
various institutions around the world that interoperate. SRMs are designed to provide support for storage
space reservations, flexible storage policies, lifetime of files in spaces to mange space cleanup, and
performance estimates. SRMs are middleware components whose function is to provide a common access
interface and file management for shared distributed storage systems. Unlike other centralized approaches to
a uniform access to a variety of file systems, such as SRB (Storage Resource Broker) SRM is based on an
open standard, and therefore SRMs are being developed by multiple institutions for their storage systems.</p>
<p>SRM research has developed into an internationally coordinated effort between several DOE laboratories
including LBNL, FNAL and TJNAF, as well as several European institutions. This coordinated effort has
resulted in a standard specification, and the development of multiple SRMs at various institutions around the
world [ABB+07]. This approach is particularly essential for providing distributed access to complex Mass
Storage Systems (MSSs).</p>
<p>The most recent version of an SRM developed at LBNL, is called the Berkeley Storage Manager, or
BeStMan. BeStMan is designed in a modular fashion, so that it can be adapted easily to different storage
systems (such as disk-based systems, mass storage systems, such as HPSS, and parallel file systems, such
as Lustre) as well as using different transfer protocols (including GSIFTP, FTP, BBFTP, HTTP, HTTPS).
BeStMan is implemented in Java in order to be highly portable. It provides all the functions related to space
reservations, dynamic space allocation, directory management, and pinning of files in space for a specified
lifetime. It manages queues of multiple requests to get or put files into spaces it manages, where each
request can be for multiple files or entire directories. When managing multiple files, BeStMan can take
advantage of the available network bandwidth by scheduling multiple concurrent file transfers.</p>
<p>A natural use of SRMs is the coordination of large volume data streaming between sites. As an example, the
BNL to NERSC DataMover setup [SGSN04] uses SRMs that access HPSS at both ends. The setup takes
advantage of robustness features of the SRMs, which can recover from transient failures or interruption of the
HPSS mass storage system (including scheduled maintenance). They use BeStMan for several years now to
move about 10,000 files (about 1 TB) per week in an automated fashion. This arrangement resulted in great
reduction in the error rates, from 1% to 0.02% in the STAR project, and essentially eliminated the human
effort previously required.</p>
<p>The goal of the SRM/BeStMan activity was to develop a standard specification against which multiple
implementations can be developed. This approach proved to be a remarkable and unique achievement, in
that now there are multiple SRMs developed in various institutions around the world that interoperate. SRMs
are designed to provide the following main capabilities:</p>
<ul>
	<li>Support for local policy. Each storage resource can be managed independently of other storage resources. Thus, each site can have its own policy on which files to keep in its storage resource and for how long. Resource usage monitoring of both space usage and file sharing is needed in order to profile the effectiveness of the local policies.</li>
	<li>Pinning files. Files residing in one storage system can be temporarily locked before being transferred to another system that needs them. We refer to this capability as pinning a file, since a pin is a lock with a lifetime associated with it. This provides the flexibility to read locally frequently accessed files that reside on remote systems without having to read the files repeatedly from the remote system.</li>
	<li>Advance reservations. SRMs are components that manage the storage content dynamically. Therefore, they can be used to plan the storage system usage by making advanced reservations.</li>
	<li>Dynamic space management. Managing shared disk space usage dynamically is an essential in order to avoid clogging of storage resource. SRMs use file replacement policies that optimize service and space usage based on access patterns. Files whose lifetime expired can be removed, thus avoiding clogging of storage space.</li>
	<li>Estimates for planning. SRMs are essential for planning the execution of a request. They can provide estimates on space availability and the time till a file will be accessed. These estimates are also needed for providing dynamic status information on the progress of multi-file requests.</li>
	<li>Brokering service. SRMs provide a “brokering” service for accessing files. One of the design goals of SRMs is to support multi-file requests to any files in the distributed system. If the file is found locally, either because it was placed there permanently, or because it was brought in as a result of previous request, the SRM simply returns the location of the file. If it is not available locally, the SRM will invoke a transfer service to get the file.</li>
</ul>


<a name="ter"><h2>TeraPaths</h2>
<p>The TeraPaths project [Tera-web] at Brookhaven National Laboratory (BNL) investigates the combination of
DiffServ-based LAN QoS with WAN MPLS tunnels and dynamic circuits in creating end-to-end (host-to-host)
virtual paths with QoS guarantees. These virtual paths prioritize, protect, and regulate network flows in
accordance with site agreements and user requests, and prevent the disruptive effects that conventional
network flows can bring to one another.</p>
<p>Providing an end-to-end virtual network path with QoS guarantees (e.g., guaranteed bandwidth) to a specific
data flow is a hard problem, because it requires the timely configuration of all network devices along the route
between a given source and a given destination. In the general case, such a route passes through multiple
administrative domains and there is no single control center able to perform the configuration of all devices
involved. From the beginning of the TeraPaths project it was evident that effective and practical solutions to
the multitude of issues that were anticipated to arise could only be reached through a collaborative study and
experimentation on the network itself. Such issues included, for example, what QoS technology should be
used within the end-site LANs, what options were available when dealing with administrative domains that
cannot be dynamically controlled directly or indirectly, how to interface with WAN systems to automatically
establish QoS paths through WAN domains, how to join path segments of different layers, etc. Having
successfully addressed most crucial issues, the TeraPaths software is currently moving into the production
phase.</p>
<p>The TeraPaths system [Tera-paper] has a fully distributed, layered architecture (see figure 2) and interacts
with the network from the perspective of end-sites of communities. The local network of each participating
end-site is under the control of an End-Site Domain Controller module (ESDC). The site’s network devices
are under the control of one or more Network Device Controller modules (NDCs). NDCs play the role of a
“virtual network engineer” in the sense that they securely expose a very specific set of device configuration
commands to the ESDC module. The software is organized so that NDCs can be, if so required by tight
security regulations, completely independently installed, configured, and maintained. A NDC encapsulates
specific functionality of a network device and abstracts this functionality through a uniform interface while
hiding the complexity of the actual configuration of heterogeneous hardware from higher software layers.
Each site’s ESDC and NDC(s) are complemented by a Distributed Services Module (DSM), which is the core
of the TeraPaths service. The DSM has the role of coordinating all network domains along the route between
two end hosts (each host belonging to a different end-site) to timely bring up the necessary segments to
establish an end-to-end path. The DSM interfaces with the ESDCs of its own and other remote sites to
configure the path within the end-site LANs (direct control) and furthermore interfaces with WAN controlling
software to bring up the necessary path segments through WAN domains (indirect control). To interface with
non-TeraPaths domain controllers, primarily for WAN domains but also for end-sites that are using other
software (e.g., Lambda Station), the DSM uses auxiliary modules that encapsulate the functionality of the
targeted domain controller by invoking the required API but exposing a standardized abstract interface. All the
DSM “sees” is a set of “proxy” WAN or end-site services with uniform interface.</p>
<p>This part of TeraPaths is designed for maximum flexibility as a DSM can interface with possibly any kind of
domain controller that offers at least basic path setup functionality; it is similar to the way operating systems
control hardware through device drivers. Furthermore, it is possible to follow any end-to-end setup
coordination model. Currently, TeraPaths follows a hybrid star/daisy chain coordination model where the
initiating end-site first coordinates with the target site and then indirectly sets up a WAN path by contacting its
primary WAN provider and relying on that provider’s domain controller to coordinate, if necessary, with other
WAN domains along the desired route. This approach does not require an end site to set up a route by
individually contacting WAN domain controllers along a WAN chain (star model), which would, in turn, require
end-sites to have detailed knowledge of the network so as to know which controllers need to be contacted,
what capabilities each one has, etc. The star model is centralized and significantly increases the complexity
of setting up a path. On the other hand, the daisy chain model requires all participants (end-sites and WAN
domains) to use a common communication protocol that allows full functionality of all basic operations of
every participant (e.g., so that TeraPaths-specific parameters are guaranteed to arrive at the destination end-
site). Such a protocol does not yet exist, however, if and when such a protocol is adopted, TeraPaths can
easily adapt. The hybrid coordination model was adopted as the most feasible. All TeraPaths instances can
interface with OSCARS interdomain controllers to setup MPLS tunnels through ESnet and dynamic circuits
through ESnet and Internet2.</p>

<a name="osc"><h2>OSCARS</h2>
<p>On-demand Secure Circuit Advance Reservation System (OSCARS) is a guaranteed bandwidth provisioning
system for DOE ESNET standard IP network and advanced Science Data Network (SDN). It was designed
specifically to meet the science-discipline-driven network requirement of dynamically provisioned quality of
service (QoS) paths. This production service has effectively demonstrated that an end site can reserve
bandwidth within ESnet to accommodate deadline scheduling. OSCARS initially provided guaranteed
bandwidth circuits within ESnet in the form of MPLS tunnels (network layer). Through the collaboration
between ESnet and Internet2, the system evolved into a more general Inter-Domain Controller (IDC) still
provides MPLS tunnels within ESnet, but that can now also provide guaranteed bandwidth layer 2 circuits
within and between ESnet’s Science Data Network (SDN) and Internet2’s Dynamic Circuit Network (DCN).
The OSCARS user interface is via web services. The actual web services call may come from an API in a
program or from a web browser. The circuits typically last from 10s of minutes to days or sometimes weeks.
<p>Circuits can be reserved some period of time before being required.</p>
DCN users and implementers are researching to determine the capabilities that a dynamic circuit network
needs to provide to make them valuable to users. Some areas of research include negotiation of resources
between competing users, varying bandwidth allocation based on varying application need, and debugging of
dynamic circuits that cross multiple boundaries. Higher level research is planned on how to present circuit
capabilities to users, and how users characterize application needs in a way that allows the two to make
appropriate choices about which resources to use and when to use them.</p>

<a name="ref"><h2>References</h2>
<ul>
	<li>[SSG02] Shoshani, A. & Sim, A. Gu, J. “Storage Resource Managers: Middleware Components for Grid Storage.” In Proceedings of Nineteenth IEEE Symposium on Mass Storage Systems, 2002</li>
	<li>[SSG03] Shoshani, A. & Sim, A. & Gu, J. “Storage Resource Managers: Essential Components for the Grid.” Chapter in book: Grid Resource Management: State of the Art and Future Trends, Edited by J. Nabrzyski, J. M. Schopf, and J. Weglarz, Kluwer Academic Publishers, 2003</li>
	<li>[SGSN04] Sim, A. & Gu, J. & Shoshani, A. & Natarajan, V. “DataMover: Robust Terabyte-Scale Multi- file Replication over Wide-Area Networks.” In Proceedings of the 16th International Conference on Scientific and Statistical Database Management (SSDBM 2004), Greece 2004</li>
	<li>[ABB+07] Lana Abadie, Paolo Badino, Jean-Philippe Baud, Arie Shoshani, Alex Sim, et al, Storage Resource Manager version 2.2: design, implementation, and testing experience, Proceedings of Computing in High Energy Physics (CHEP) 2007</li>
	<li>[Tera-web] D. Yu and D. Katramatos, <a href="http://www.terapaths.org/">http://www.terapaths.org</a></li>
	<li>[Tera-paper] Dimitrios Katramatos, Bruce Gibbard, Dantong Yu, Shawn McKee. “TeraPaths: End-to-End Network Path QoS Configuration Using Cross-Domain Reservation Negotiation.” Proceedings of the 3rd International Conference on Broadband Communications, Networks, and Systems (BROADNETS 2006), San Jose, California, USA, October 1-5, 2006</li>
</ul>
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>
