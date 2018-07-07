<!DOCTYPE html>
<html>
<head>
<title>DMLreadme</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<p><a href="index.html">Back to DML Home</a></p>
<h1>Instructions to download and run DataMover-Lite (DML) v2.2.0</h1>
<h2>Support</h2>
<ul>
<li>email: srm@lbl.gov</li>
</ul>
<h2>Instructions</h2>
<p> Go to Download page and click on &ldquo;download DML&rdquo; to any directory or desktop. It will download a Gzip&rsquo;ed file.</p>
<p> Unzip the file, and extract content into any directory or desktop. It will create a directory &ldquo;DML-gt4&rdquo;.</p>
<p> If you have a Grid Certificate, and wish to use GridFTP, and you are running on a Windows machine, follow instructions in Appendix A below, otherwise skip this step.</p>
<p> Locate java directory (usually under Program Files on Windows). Check that jre1.5.0 or above exists; if not, you need to download it from java.sun.com. <br> [To download jre1.5.0 on Windows: click on SE under popular downloads; click on &ldquo;previous release&rdquo; at top menu bar; click on &ldquo;J2SE 5.0 Downloads&rdquo;; find &ldquo;Java Runtime Environment (JRE) 5.0 Update 11&rdquo;; click on &ldquo;download&rdquo;; click on &ldquo;accept&rdquo;; click on &ldquo;Windows Offline Installation, Multi-language&rdquo;; it will download into desktop usually; click on it to execute; it will install it under C:\Program Files\Java.]</p>
<p> For Windows: in the DML-gt4 directory, you need to edit the file: gui.bat. Open with Notepad, and add C:\Program Files\Java\jre1.5.0_11\bin\ in front of the first word: java&hellip;, then put quotes (&ldquo;) before and after C:\Program Files\Java\jre1.5.0_11\bin\java. (For Unix, skip this step).</p>
<p> For Windows: double click gui.bat, it will pop up an DML window. <br> For Unix: double click gui.sh, it will pop up an DML window.</p>
<p> If you use GridFTP, setup Grid certificate and proxy: follow steps Appendix B below. This needs to be done for either windows or Unix.</p>
<p> On main DML screen, click on &ldquo;browse&rdquo; to choose a target directory for future downloaded files. It can be any directory.</p>
<p> You need to have an input-xml file with list of files in the format that is explained below in Appendix C. An example file that uses three different transfer protocols is the file mixedrequest.xml in under DML-gt4/samples.</p>
<p> Now, in main DML screen, click on file -&gt; import, and choose your input-xml file. Select file and click &ldquo;open&rdquo;. It will show the information about the file on the DML screen. (to try a single transfer to verify that installation is OK, select the file: &ldquo;sample.http.xml&rdquo; form the DML-gt4/samples directory).</p>
<p> In main DML screen, click on &ldquo;transfer&rdquo;. The screen will show the progress of the file downloads into your target-directory.</p>
<p> Setup of advanced parameters can be done in order to have concurrent file transfers that can speed up the total transfer rates, as well as GridFTP parameter setup for window buffer size and number of parallel streams. See Appendix D.</p>
<h2>Appendices</h2>
<p>*A.* Grid certificate setup in DML for Windows</p>
<ul>
<li>&ldquo;Download DataMover-Lite 2.2.0&rdquo; ( file downloaded is: dml-2.2.0.tar.gz) And DoeGridCA (file created is: doegridsca.zip)</li>
<li>open doegridsca.zip, unzip and extract to: (i.e. click on &ldquo;extract&rdquo;) <br> C:\Documents and Settings\arie\.globus - It creates the subdirectory &ldquo;certificates&rdquo; under .globus with six files in it.</li>
<li>must also have in the .globus directory &ldquo;usercert.pem&rdquo; and &ldquo;userkey.pem&rdquo;. (get it from another system is necessary)</li>
</ul>
<p>*B.* Configuration setup of Grid Certificate in DML</p>
<ul>
<li>under &ldquo;tool -&gt; config; click on entry for user-cert; browse to location: <br> C:\Documents and Settings\arie\.globus, and select usercert.pem.</li>
<li>Same for user-key; click on entry for user-key; browse to location: C:\Documents and Settings\arie\.globus, and select userkey.pem.</li>
<li>still under under &ldquo;tool -&gt; config; click on entry for proxy-file; In same .globus directory give it a file name: e.g. my.proxy</li>
<li>still under under &ldquo;tool -&gt; config; click on &ldquo;save&rdquo;</li>
<li>generating the proxy: under tools -&gt; initProxy, I will be good for 12 hours; Put-in passphrase; click on &ldquo;create proxy&rdquo;.</li>
</ul>
<p>*C.* The format of the input-xml file <br> The input-xml file is formatted to contain a list of files and their sizes in an XML format. For example:</p>
<pre>
<files>
     <sourceurl> http://www.lbl.gov/index.html </sourceurl>
     <size> 24576 </size>
  </files>
</pre>
<p>Note that the file name is a URL with the protocol being &ldquo;http&rdquo; in this case. <br> Note also that the size is in bytes. <br> Multiple file lists have to be wrapped in <request> labels as shown in mixedrequest.xml for example.</p>
<p>*D.* Setting up ESG credentials</p>
<p>This applies only to Earth System Grid (ESG) users. You need to setup the LAHFS properties location. Click on &ldquo;tools -&gt; config&rdquo;, select &ldquo;lahfs-properties-location&rdquo;, click on entry under &ldquo;Browse a file&rdquo;, and go to install-directory &ldquo;DML-gt4&rdquo;. Click on file &lsquo;lahfs.properties&rdquo;, and then click &ldquo;open&rdquo;. This path will show at the entry for LAHFS under &ldquo;Browse a file&rdquo;. Click on &ldquo;save&rdquo; button on the left-hand bottom.</p>
<p>*E.* Speeding up the file transfers</p>
<p>DML is capable of transferring multiple files concurrently, in order to achieve better global transfer rates. For example, if the transfer rate of a single file is limited by the transfer protocol to be 1 MB/s, having 5 concurrent file transfers should provide 5 MB/s if the network connection permits that. However, some machines (such as regular laptops) cannot support many concurrent transfers since each requires the allocation of a buffer space.</p>
<p>The default &ldquo;concurrency&rdquo; is set to 1. To setup higher concurrency, click on &ldquo;options -&gt; concurrent transfers&rdquo; and change to the desired level. Start with a few to see if your machine can handle that, and increase till no benefit is achieved or the operations slows down.</p>
<p>If you are using GridFTP, two parameters can be setup. One is &ldquo;parallel streams&rdquo; which instructs GridFTP to send multiple streams for the same file transfer. This is useful if the files transferred are very large, in the order of many GBs. It is similar to concurrent transfers but apply to a single file transfer. Again, having too many streams seems to have diminishing return. It is generally advisable to go no higher than 6-7 parallel streams.</p>
<p>The default &ldquo;parallelism&rdquo; level is set to 1. To setup higher concurrency, click on &ldquo;options -&gt; parallelism&rdquo; and change to the desired level. Start with a few (2-3) to see if your machine can handle that, and increase till no benefit is achieved or the operations slows down.</p>
<p>The second parameter that can be setup for GridFTP is the &ldquo;window buffer size&rdquo;. This tells the GridFTP transfer software to move data in chunks of a certain size. Larger &ldquo;window sizes&rdquo; are better when large files are transferred.</p>
<p>The default &ldquo;window buffer size&rdquo; level is set to about 1 MB. To setup higher or lower buffer size, click on &ldquo;options -&gt; buffer size&rdquo; and change to the desired level. 1 MB is the commonly recommended level, but if the receiving end can handle larger buffer sizes, increasing to 2 or more MBs can speed up transfers.</p>
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>