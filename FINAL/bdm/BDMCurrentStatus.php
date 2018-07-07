<!DOCTYPE html>
<html>
<head>
	<title>BDM Current Status</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<p><a href="index.html">Back to BDM Home</a></p>
<h1>Current Status and Milestones</h1>
<ul>
	<li>October 04, 2010 </li>
	<ul>
	<li>version 1.2.1 on https://codeforge.lbl.gov/projects/bdm/</li>
	<li>added support for -checkpoint &lt;# of files&gt;, periodically update the summary information after #of files completed.</li>
	</ul>
	<li>September 30, 2010 </li>
	<ul>
	<li>version 1.2 on https://codeforge.lbl.gov/projects/bdm/</li>
	<li>added support for concurrent browsing for better performance..</li>
	<li>added support for concurrent threads to check the target file existence.</li>
	<li>tuned up backend database for better performance.</li>
	<li>added support for single file browsing.</li>
	<li>added support for browsing directory with non-recursive.</li>
	<li>added support for transfering directory with non-recursive.</li>
	<li>added support for transfering files with spaces in it.</li>
	<li>added support for browsing, transfering files from root director with limitations (currently supports only absolute URL).</li>
	<li>modified outputs to appear in a better way.</li>
	<li>added support to check network performance with -perf.</li>
	<li>added support for add/remove connections dynamically for adaptive work.</li>
	</ul>
	<li>July 1, 2010 </li>
	<ul>
	<li>version 0.12 on https://codeforge.lbl.gov/projects/bdm/</li>
	<li>added -usepassive option for limited usage</li>
	<li>added more error exception handling</li>
	</ul>
	<li>Jan. 21, 2010 </li>
	<ul>
	<li>version 0.9 on https://codeforge.lbl.gov/projects/bdm/</li>
	<li>added all promised features</li>
	<li>enhancements and bug fixes will be done as time goes on.</li>
	</ul>
	<li>Dec. 7, 2009 </li>
	<ul>
	<li>version 0.6 on https://codeforge.lbl.gov/projects/bdm/</li>
	<li>same version that we had during Super Computing 2009</li>
	</ul>
	<li>Oct. 21, 2009 </li>
	<ul>
	<li>version 0.3 release: https://codeforge.lbl.gov/projects/bdm/</li>
	<li>version 0.2 release: https://codeforge.lbl.gov/projects/bdm/</li>
	<li>From NERSC dtn01/02, 1000MB/sec is seen on average.</li>
	<li>From LLNL GDO1 to NERSC DTN01, we had 250MB/sec.</li>
	</ul>
	<li>Oct. 20, 2009 </li>
	<ul>
	<li>From NERSC DTN02 to NERSC DTN01, we had 771MB/sec.</li>
	<li>From LLNL GDO2 to NERSC DTN01, we had 214MB/sec.</li>
	</ul>
	<li>Oct. 12, 2009 </li>
	<ul>
	<li>codeforge created for all downloadables: https://codeforge.lbl.gov/projects/bdm/</li>
	<li>From LLNL GDO2 to NERSC DTN01, we had 174MB/sec in 50 connections. Transfer connection management gets stabilized.</li>
	</ul>
	<li>Oct. 10, 2009 </li>
	<ul>
	<li>Downloadable package v 0.1: https://codeforge.lbl.gov/projects/bdm/</li>
	</ul>
	<li>Oct. 6, 2009 </li>
	<ul>
	<li>From LLNL GDO2 to NERSC DTN01, we had 165MB/sec which could be the maximum backend-storage bandwidth at LLNL through GDO2. We had 10 concurrent connections.</li>
	</ul>
	<li>Oct 5, 2009 </li>
	<ul>
	<li>Initial working version deployed at NERSC DTN nodes for testing</li>
	</ul>
	<li>Oct. 2, 2009 </li>
	<ul>
	<li>Initial testing from LLNL GDO2 to LBNL data1</li>
	</ul>
	<li>Oct. 1, 2009 </li>
	<ul>
	<li>Initial testing from NERSC DTN01 to LBNL data1</li>
	</ul>
</ul>

<h2>Current Assumptions and Requirements</h2>
<ul>
	<li>Java 1.5 or later support</li>
	<li>Transfer is based on !GridFTP, and data source has !GridFTP server setup and grid-security in place.</li>
	<li>User has a valid grid credential and local grid proxy, and is mapped at the source host.</li>
</ul>

<h2>Currently Implemented Features</h2>
<ul>
	<li>Checksum calculation for md5 (default), adler32, crc32</li>
	<li>[[Software.BDM.BDMJavaAPI][Java API]] for matching command line options: limitation on having only one active request</li>
	<li>XML input based on the [[Software.BDM.BDMOptions][format]]</li>
	<li>XML output for publishing</li>
	<li>Recursive source directory browsing and target directory hierarchy creation</li>
	<li>Non recursive source directory browsing</li>
	<li>Concurrent source directory browsing using transferservers</li>
	<li>Concurrent file transfers</li>
	<li>Transfer queue management for efficient concurrent transfers</li>
	<li>measure performance with -perftest option.</li>
	<li>browse root dir with recursive and non recursive option</li>
	<li>transfer files from root dir with recursive and non recursive option</li>
	<li>!GridFTP connection re-use and data channel caching</li>
	<li>Test option: testing BDM capability and immediately remove the downloaded target files so that target disk space would not be used</li>
	<li>Retry option for failed transfers: immediately after the transfer failure and after all files are tried for transfers at least once</li>
	<li>New connection option: instead of re-using transfer connections, open new transfer connection for each file transfer.</li>
	<li>Logging: INFO and DEBUG level logging, Format matches the recommendation from CEDPS troubleshooting team.</li>
	<li>Request Token generation</li>
	<li>Asynchronous request status checking with the request token</li>
	<li>An option to overwrite already existing target files. Default is no-overwriting if destination path and file size match to the source file information.</li>
	<li>An option for a request browsing source directory only without file transfers, and saving the source directory information for later use.</li>
	<li>An option to resume file transfer from the previous request for browsing.</li>
	<li>An option to resume file transfer to another target directory from the previous request for browsing.</li>
	<li>Multiple transfer server support</li>
	<li>In case of an interrupted network connections, re-open the failed/closed connections during the file transfers, and re-tries/resume the failed file transfers in the re-opened connection</li>
	<li>Supported transfer protocol: !GridFTP</li>
</ul>

<h2>Plans</h2>
<ul>
	<li>Enhancements on features for ESG</li>
	<li>Documentation</li>
	<li>Bug fixes</li>
</ul>

<h2>BDM Testing with ESG Framework</h2>
<p>BDM has been tested with DKRZ successfully on Feb 09, 11. The following were identified during the testing:</p>
<ul>
	<li>DKRZ directory structure is found to be with several soft links. So to enable softlink transfer, the "-symlink" option needs to be used in the command for BDM.</li>
	<li>Java API based BDM and java based globus-url-copy does not work with cmip-bdm1.badc node, but C version of globus-url-copy does. David suspects that it is because he has gsiftp server certificate and not a host certificate. David has applied for a host certificate, and we are waiting for that to arrive. Once it is ready, we will again test BDM against BADC.</li>
	<li>A signing certificate (367b75c3) is missing in the PCMDI myproxy truststore and esg trusted certificates. DKRZ gsiftp connection did not complain about that certificate, but BADC gsiftp connection required that, which resulted in connection error.</li>
	<li>Another signing certificate (1149214e) is missing in the PCMDI myproxy truststore and esg trusted certificates. DKRZ gsiftp connection required that. We still could not verify the same, with the BADC connection because of host certificate problem.</li>
	<li>PCMDI myproxy trust store returns 3 signing policy files that has format error, and either signing policy files have to modified manually or re-deployed from the certificate tar file. </li>
	<li>706 [Thread-11] WARN org.globus.gsi.TrustedCertificates - Signing policy ./certs/159117b6.signing_policy failed to load. Line format is incorrect, atleast three tokens are expected. Invalid line: "information"</li>
	<li>714 [Thread-11] WARN org.globus.gsi.TrustedCertificates - Signing policy ./certs/ae9c66bf.signing_policy failed to load. Line format is incorrect, atleast three tokens are expected. Invalid line: "information"</li>
	<li>743 [Thread-11] WARN org.globus.gsi.TrustedCertificates - Signing policy ./certs/0084963c.signing_policy failed to load. Line format is incorrect, atleast three tokens are expected. Invalid line: "information"</li>
</ul>
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>

