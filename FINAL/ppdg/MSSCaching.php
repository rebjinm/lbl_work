<!DOCTYPE html>
<html>
<head>
	<title>MSS Caching</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<p><a href="index.html">Back to PPDG Home</a></p>
<h1>LBNL involvement in PPDG Collaboratory Pilot</h1>
<p>Storage Resource Management</p>

<h2>Mass storage access and management</h2>

<p>Data intensive applications, such as the experiments in PPDG, place extreme demands on mass storage systems (MSS). For example, requests for hundreds of files from several users overwhelm the ability of a system like HPSS to serve simultaneously. The response is typically a refusal to serve the client, thus forcing the client to repeatedly request the same file until the mass storage system responds. In principal, mass storage systems can be enhanced to queue the requests they cannot serve at the time, and enforce policies of how to serve the requested files. This is a complex task that is normally thought of as being outside the realm of MSS. Even if an MSS provided such a service, there are advantages to using a staging disk outside of the MSS that can be shared dynamically by the users. This is the approach taken by the Hierarchical Storage Resource Manager (HRM) middleware layer. It provides the management of a file request queue and a staging disk to provide the following functionality: 1) if the MSS is busy, file requests are queued, not refused; 2) by using advance knowledge of files requested by multiple users, it provides files to users in an order that maximizes access from disk, thus minimizing repeated file access from tape; 3) it can reorder file access to maximize files read from the same tape, thus minimizing tape mounts; 4) it insulates the client from temporary failures of the MSS, by resuming file transfer requests when the MSS recovers; and 5) it provides status information on the length of time till a file will be staged. </p>

<p>HRM currently manages requests to get files out of the MSS. It will be further developed to have additional features as proposed in a SciDAC middleware proposal, called &ldquo;Storage Resource Management for Data Grid Applications&rdquo;. The enhancements include: 1) support for policy management; 2) support for a write capability into the MSS; and 3) support for space reservation of the staging disk. We plan to use these capabilities as they become available. The tasks that will be performed in the context of this proposal fall into 2 categories. The first is the deployment and adaptation of the HRM technology in PPDG experiments, including extensions to a Java application environment. Deployment includes the installation of the system, and verifying its correct behavior. Adaptation includes modifications to interfaces of the middleware software to work in an environment that may have a different variation of operating system or the MSS. One of the long-term goals of the HRM adaptation is to use the same basic software with an MSS other than HPSS, such as Castor developed at CERN. The second category of tasks involves providing interoperability between HRM and the other middleware components. One of our main goals of interoperability is the ability for a Globus GridFTP server to call HRM for pre-staging of a file before it is transferred by the GridFTP service. This will provide file sharing as well as access to different HRMs in a uniform way. From the GridFTP API, a file access from HRM or a disk will be identical. </p>

<h2>Caching and staging services</h2>

<p>For PPDG applications, the use of large shared disk caches is essential for several stages of data production and analysis. In the process of simulating event data, computation farms are scheduled, and their output needs to be staged to a temporary disk cache before being reconstructed and archived. Similarly, a temporary disk cache is needed during the collection of the experiment data. In the reconstruction phase, files may reside on a disk cache, or need to be brought from tape to a disk cache for processing. During the analysis stage, temporary (usually shared by multiple users) disk cache is needed to cache files for the analysis programs. For these reasons the Disk Resource Manager (DRM) is an important middleware service.</p>

<p>We see the use of a disk cache in two modes: 1) reservation-based usage; and 2) on-demand access usage. The &ldquo;reservation-based&rdquo; DRM is mostly needed for co-scheduling of resources in the data production and reconstructions phases, and the &ldquo;on-demand&rdquo; DRM is mostly for dynamic use of caches for the analysis process. For the purpose of the analysis, usually only a subset of the data needs to be accessed, and the access patterns often requires repeated access to so-called &ldquo;hot files&rdquo;. We plan to support both usage modes. Typically, a disk cache will be used in one mode or another, although in the long term we plan to explore the possibility of accessing a disk cache for both modes simultaneously. For our work in this proposal, we plan to take advantage of developments planned as part of the SciDAC SRM middleware proposal, called &ldquo;Storage Resource Management for Data Grid Applications&rdquo;. However, we note that the emphasis in that proposal is on the &ldquo;on-demand&rdquo; usage. Thus, we propose to develop as part of this proposal a &ldquo;reservation-based&rdquo; DRM. This will include the ability to negotiate a reservation of space usage for a window of time, specified as start time and duration. A second stage of the development will include an allocation capability that is based on pre-specified policy. As with HRM, one of the important tasks planned under this proposal is the deployment and adaptation of the DRM technology in PPDG experiments.</p>
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>