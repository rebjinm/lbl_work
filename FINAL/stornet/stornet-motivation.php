<!DOCTYPE html>
<html>
<head>
	<title>StorNet Motivation</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<p><a href="index.html">Back to StorNet Home</a></p>
<h1>Motivation</h1>
<h3>Jump to:</h3>
<ul>
	<li><a href="#back">Background and Motivations</a></li>
	<li><a href="#high">High Speed Data on Demand</a></li>
	<li><a href="#het">Heterogeneous Data Storage Mechanism and Environment</a></li>
	<li><a href ="#res">Research Objectives</a></li>
	<li><a href="#ref">References</a></li>
</ul>
<a name="back"><h2>Background and Motivations</h2>
<p>Storage and processing of raw data take place at geographically distributed computing facilities; sharing data
across the globe is realized through transfers over high-speed networks. However, the default behavior of
networks is to treat all data flows equally, thus, data flows of higher priority and/or urgency may be adversely
impacted by competing data flows of lower priority. In distributed data-intensive environments, this can be a
major problem that significantly degrades the effective “goodput” of the overall system. The policies and
priorities of user communities are not able to be effectively expressed or implemented, except by very labor-
intensive and error-prone human intervention. In such network environments, the capability to prioritize,
protect, and regulate the various data flows becomes of high importance, because such a capability can be
used for deterministically scheduling network resources to support user community priorities and,
furthermore, co-scheduling of associated resources like storage systems. However, in order to assure the
success of high bandwidth flow from a storage system at a source site to a storage system at a target site, it
is not sufficient to provision the network capacity. It is also necessary to ensure that the source and target
storage systems have the bandwidth and storage allocation that can take advantage of the network speed.
For this reason, we are proposing coordinating between components that can dynamically manage and
reserve storage on demand, and provision network capacity on demand. Furthermore, because such
transfers can take long, transient failures can are likely to occur. The components managing the end-to-end
transfers need to be monitor, and recover from such transient failures.</p>
<p>We plan to take advantage of existing components already used in productions to achieve this goal by having
them work cooperatively. The existing components are a storage resource manager from LBNL, called the
Berkeley Storage Manager (BeStMan), the TeraPaths component from BNL, and OSCARS provisioning
supported by ESnet and Internet2. Our vision of the end-to-end capability is having a client at the target end
make a request for the data it wants to get by providing a source directory where the data resides. The target
SRM contacts the source SRM to find out the total volume requested as well as the directory structure. It then
allocates enough space from a common pool for the data volume requested. Next, it checks with the source
site for its transfer bandwidth and compares to its own bandwidth. It then coordinates with TeraPaths to
provide the requested bandwidth in the earliest possible time. It can also request a lesser bandwidth from
TeraPaths if that is available earlier. According to the available bandwidth, it then schedules multiple file
transfers to take advantage of the allocated bandwidth. The file transfer protocol used is determined from
what is supported at both ends through a negotiation protocol that SRMs support. Note that each end may
have multiple machines that can transfer data, and the scheduling of these machines is a task that both ends
need to manage. Finally, the target site monitors the success of transfers, continuously manages the
scheduling and streaming of files, and recovers from transient failures, by reissuing transfers that failed, or
restoring partial transfers that were in progress. An example of such a need already emerging is the next
generation Earth Systems Grid (ESG) [ESG-web] supported by DOE. This project that started about eight
years ago, has developed the technology of sharing climate simulation data to researchers world-wide
already has served over 425 Terabytes to 1000’s of users. So far, data requests are relatively small,
averaging about 500 GBs each, but expectations for next generation simulation data is at least an order of
magnitude growth over the next few year. Much of the storage management is provided by BeStMan for
space allocation for users, for scheduling concurrent transfers, and for staging files from mass storage
archive to disk cache in order to serve clients.</p>
<p>A particularly challenging future task is now planned for the next generation ESG, where large volumes of
data need to be mirrored to other sites around the world. The design decision of mirroring sites comes from
the need to share data world-wide, and important (new desired) data, called “core data” would be more
efficiently served to clients from sites in their own continents. The core data, once assembled, is expected to
amount to 300-500 TBs. The challenge is to manage mirroring of such a volume to multiple sites around the
world. Given that end-to-end provisioning of 1Gb/s can support a transfer of about 10 TBs a day, it will take
30 days sustained transfer to move 300 TBs. Future networks are likely to become faster, but still this
illustrates the need for sustained provisioning end-to-end, as well as monitoring and recovery.</p>

<a name="high"><h2>High Speed Data on Demand</h2>
<p>Data-intensive applications communities, including high energy and nuclear physics, astrophysics, climate
modeling, nanoscale materials science, and genomics, are expected to generate exabytes of data over the
next 5 years, which must be transferred, visualized, and analyzed by geographically distributed teams of
scientists. In the area of experimental science, there are several extremely valuable experimental facilities,
such as the Large Synoptic Survey Telescope (LSST) [LSST-web], the Large Hadron Collider (LHC) [LHC-
web], the Spallation Neutron Source (SNS) [SNS-web], the Advanced Photon Source (APS) [APS-web], and
the Relativistic Heavy Ion Collider (RHIC) [RHIC-web]. The common requirements among these applications
are: (i) intensive data transfers; (ii) remote visualizations of datasets and on-going computations; (iii)
computational monitoring and steering; and (iv) remote experimentation and control. High-performance
network capabilities must be available to scientists at the application level in a transparent, virtualized
manner. Scientists must have the capability to move large datasets from remote experiment locations and
across federated network environments to their home institutions.</p>

<a name="het"><h2>Heterogeneous Data Storage Mechanism and Environment</h2>
<p>Today’s science applications include a wide variety of platforms, hardware, network, storage media, and
software components to deliver the critical data storage functionality: flat file servers (NFS and AFS), various
FTP file servers, mass storage systems, relational databases, and web servers for serving files and on-line
streaming video. Among these science applications, the LSST produces close to a petabyte of archive
images every month, and utilizes hybrid approaches to store image contents into flat files and related
catalogs into relational databases. LHC experiments deploy a similar mechanism to store raw event and
derived data objects into flat files, and to store detector conditions data, and thumbnail data for each event,
into a high-performance Oracle database cluster. LHC application users must use the GridFTP protocol and
its associated data transfer software stack to retrieve data. Genomics science commonly use relational
database to store microarray data. The National Climate Data Center (DCDC), the world’s largest active
archive of weather and meteorology data, allows users to download data from its Web server clusters. Many
computer scientists look forward to a single, data storage-agnostic tool to monitor, manage, and provide data
access to application users. An existing storage resource manager (SRM-BeStMan) is used by several
physical science communities to manage disk space and provision storage space for large dataset transfers
requested by thousands of users.</p>

<a name="res"><h2>Research Objectives</h2>
<p>This proposal presents a plan to design and develop a versatile, end-to-end, performance guaranteed data
transfer system based on an existing storage resource management system (SRM), and a tool for providing
virtual paths with bandwidth guarantees (TeraPaths). In particular, the proposed framework provides a
transformative functionality of bridging the current and emerging advanced network and storage management
research with science applications in a transparent way, and integrating and optimizing network resource
provisioning and storage space reservation together, to provide data transfer applications with a guaranteed
and predictable quality of service. The basic research will focus on a polymorphous protocol of scheduling
and reserving hybrid network paths that consist of multiple layer segments for transfers, as well as
approaches to providing users and applications resilience to not only failures within a network (e.g., broken
connections) but also failures of storage sites (due to malfunctioning hardware/software).</p>

<a name="ref"><h2>References</h2>
<ul>
	<li>[ESG-web] <a href="http://www.earthsystemgrid.org/">http://www.earthsystemgrid.org/</a></li>
	<li>[LSST-web] <a href="http://www.lsst.org/lsst">http://www.lsst.org/lsst</a></li>
	<li>[LHC-web] LHC - The Large Hadron Collider. <a href="http://lhc.web.cern.ch/lhc/">http://lhc.web.cern.ch/lhc/</a></li>
	<li>[SNS-web] Spallation Neutron Source (SNS). <a href="http://neutrons.ornl.gov/aboutsns/aboutsns.shtml">http://neutrons.ornl.gov/aboutsns/aboutsns.shtml</a></li>
	<li>[APS-web] Advanced Photon Source (APS). <a href="http://www.aps.anl.gov/">http://www.aps.anl.gov/</a></li>
	<li>[RHIC-web] Relativistic Heavy Ion Collider (RHIC). <a href="http://www.bnl.gov/rhic">http://www.bnl.gov/rhic</a></li>
</ul>
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>
