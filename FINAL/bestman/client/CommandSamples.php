<!DOCTYPE html>
<html>
<head>
<title>Command Samples</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<p><a href="index.html">Back to BeStMan Client Tools User's Guide</a></p>
<h1>BeStMan SRM-Client Tools User's Guide: Client commands and samples</h1>
<p>For the details and samples of each command, follow the link on each client command.</p>
<h2>Client commands involving discovery functions</h2>
<ul>
<li><a href="SRM/SRMPing.html">srm-ping</a></li>
<ul>
<li>srm-ping checks the SRM server. In response to the call, SRM server returns the SRM version number as well as other backend information.</li>
</ul>
<li><a href="SRM/SRMTrasferProtocols.html">srm-tranasferprotocols</a></li>
<ul>
<li>srm-transferprotocols retrieves a list of file transfer protocols that the SRM server supports.</li>
</ul>
<li><a href="SRM/SRMUtil.html">srm-util</a></li>
<ul>
<li>srm-util handles discovery functions and permission related functions.</li>
</ul>
</ul>
<h2>Client commands involving data transfer functions</h2>
<ul>
<li> <a href="SRM/SRMCopy.html">srm-copy</a></li>
<ul>
<li>srm-copy requests to copy files to and from SRM, between SRMs, between SRM and other storage repository.</li>
</ul>
<li><a href="SRM/SRMCopyStatus.html">srm-copy-status</a></li>
<ul>
<li>srm-copy-status checks status of the request that has been submitted with srm-copy.</li>
</ul>
</ul>
<h2>Client commands involving directory functions</h2>
<ul>
<li><a href="SRM/SRMDir.html">srm-dir</a></li>
<ul>
<li>srm-dir supports directory management functionality.</li>
</ul>
<li><a href="SRM/SRMLs.html">srm-ls</a></li>
<ul>
<li>srm-ls supports directory or file browsing functionality and returns meta data of the directories or files.</li>
</ul>
<li><a href="SRM/SRMLsStatus.html">srm-ls-status</a></li>
<ul>
<li>srm-ls-status checks the status of the srm-ls request when request token was assigned because there are too many results or because it takes more time than SRM server could return the results immediately. Upon successful request, SRM server returns meta data of the directories or files.</li>
</ul>
<li><a href="SRM/SRMMkdir.html">srm-mkdir</a></li>
<ul>
<li>srm-mkdir supports directory creation functionality in the namespace that SRM manages or has access to.</li>
</ul>
<li><a href="SRM/SRMMv.html">srm-mv</a></li>
<ul>
<li>srm-mv supports move functionality in the namespace that SRM manages.</li>
</ul>
<li><a href="SRM/SRMRm.html">srm-rm</a></li>
<ul>
<li>srm-rm removes an SURL of a file from the namespace that SRM manages or has access to.</li>
</ul>
<li><a href="SRM/SRMRmdir.html">srm-rmdir</a></li>
<ul>
<li>srm-rmdir removes an SURL of a directory from the namespace that SRM manages or has access to.</li>
</ul>
</ul>
<h2>Client commands involving permission functions</h2>
<ul>
<li><a href="SRM/SRMPermissionCheck.html">srm-permission-check</a></li>
<ul>
<li>srm-permission-check checks authorization information on an SURL.</li>
</ul>
<li><a href="SRM/SRMPermissionGet.html">srm-permission-get</a></li>
<ul>
<li>srm-permission-get retrieves authorization information on an SURL.</li>
</ul>
<li><a href="SRM/SRMPermissionSet.html">srm-permission-set</a></li>
<ul>
<li>srm-permission-set sets authorization information on an SURL.</li>
</ul>
</ul>
<h2>Client commands involving request management functions</h2>
<ul>
<li><a href="SRM/SRMExtendFileLifetime.html">srm-extendfilelifetime</a></li>
<ul>
<li>srm-extendfilelifetime supports lifetime extension functionality on SURLs or pinned files.</li>
</ul>
<li><a href="SRM/SRMPutDone.html">srm-putdone</a></li>
<ul>
<li>srm-putdone finalizes the put request on SURLs that has been submitted with srm-copy.</li>
</ul>
<li><a href="SRM/SRMRelease.html">srm-release</a></li>
<ul>
<li>srm-release releases pinned files from a request that has been submitted with srm-copy.</li>
</ul>
<li><a href="SRM/SRMReqAbort.html">srm-req-abort</a></li>
<ul>
<li>srm-req-abort submits abort on a request to the SRM server.</li>
</ul>
<li><a href="SRM/SRMReqAbortFiles.html">srm-req-abortfiles</a></li>
<ul>
<li>srm-req-abortfiles submits abort on files of a request to the SRM server.</li>
</ul>
<li><a href="SRM/SRMReqResume.html">srm-req-resume</a></li>
<ul>
<li>srm-req-resume submits resume on a suspended request to the SRM server.</li>
</ul>
<li><a href="SRM/SRMReqSummary.html">srm-req-summary</a></li>
<ul>
<li>srm-req-summary retrieves a summary information on a request from the SRM server.</li>
</ul>
<li><a href="SRM/SRMReqSuspend.html">srm-req-suspend</a></li>
<ul>
<li>rm-req-suspend submits suspend on an active request to the SRM server.</li>
</ul>
<li><a href="SRM/SRMReqTokens.html">srm-req-tokens</a></li>
<ul>
<li>srm-req-tokens retrieves request tokens that belong to the user from the SRM server.</li>
</ul>
<li><a href="SRM/SRMRequest.html">srm-request</a></li>
<ul>
<li>srm-request handles request management functions.</li>
</ul>
</ul>
<h2>Client commands involving space management functions</h2>
<ul>
<li><a href="SRM/SRMSpace.html">srm-space</a></li>
<ul>
<li>srm-space handles space management functions.</li>
</ul>
<li><a href="SRM/SRMSpChange.html">srm-sp-change</a></li>
<ul>
<li>srm-sp-change submits a request to change space for SURLs to a new space with the space token.</li>
</ul>
<li><a href="SRM/SRMSpInfo.html">srm-sp-info</a></li>
<ul>
<li>srm-sp-info retrieves an information about a space that is associated with a space token.</li>
</ul>
<li><a href="SRM/SRMSpPurge.html">srm-sp-purge</a></li>
<ul>
<li>srm-sp-purge removes all files from a space that is associated with a space token, unless a file is the last copy.</li>
</ul>
<li><a href="SRM/SRMSpRelease.html">srm-sp-release</a></li>
<ul>
<li>srm-sp-release release a space associated with a space token.</li>
</ul>
<li><a href="SRM/SRMSpReserve.html">srm-sp-reserve</a></li>
<ul>
<li>srm-sp-reserve requests to reserve a space with desired size.</li>
</ul>
<li><a href="SRM/SRMSpReserveStatus.html">srm-sp-reserve-status</a></li>
<ul>
<li>srm-sp-reserve-status checks the status of the space reservation request that has been submitted with srm-sp-reserve, when SRM server takes time to handle the request and returns a request token.</li>
</ul>
<li><a href="SRM/SRMSpTokens.html">srm-sp-tokens</a></li>
<ul>
<li>srm-sp-tokens retrieves space tokens that belong to the user.</li>
</ul>
<li><a href="SRM/SRMSpUpdate.html">srm-sp-update</a></li>
<ul>
<li>srm-sp-udpate updates space information such as size and lifetime.</li>
</ul>
</ul>
<h2>Notes</h2>
<ul>
<li>srm client makes no proxy delegation by default, and automatically handles proxy delegation based on the source and target urls. A user can override the automatic handling by providing an option ì-delegationî (or ì-delegation trueî) to force the delegation, and ì-delegation falseî to force no delegation. ì-debugî option would show how the delegation is done on the output.</li>
<li>When a large request is submitted, the srm client may not fill all request information into the memory before submitting to the server. It is mostlikely because the memory size of the java virtual machine.  In such case, you can increase the size of the virtual machine in srm client by -Xmx###M, where # is the amount of memory which you want to allocate in megabytes. E.g. java ñXmx512M</li>
<li>For memory conscious jobs, ì-liteî option is provided to use less memory to handle the user request. The option the passes -Xms32M to the virtual machine.</li>
</ul>
<br>
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>