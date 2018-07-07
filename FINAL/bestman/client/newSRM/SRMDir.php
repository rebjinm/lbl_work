<!DOCTYPE html>
<html>
<head>
<title>SRMDir</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<p><a href="https://sdm.lbl.gov/bestman/client">Back to BeStMan Client Tools User's Guide</a></p>
<h1>SRM-DIR: BeStMan SRM-Client Tools User's Guide</h1>
<ul>
<li>srm-dir submits directory management related requests, such as LS, MKDIR, RMDIR, RM, and MV.</li>
</ul>
<h1>Usage</h1>
<ul>
<li>srm-dir &lt;source_url&gt; -ls [command line options]</li>
<li>srm-dir &lt;source_url&gt; -mkdir [command line options]</li>
<li>srm-dir &lt;source_url&gt; -rmdir [command line options]</li>
<li>srm-dir &lt;source_url&gt; -rm [command line options]</li>
<li>srm-dir &lt;source_url&gt; &lt;target_url&gt; -mv [command line options]</li>
<li>srm-dir -f &lt;input_file&gt; [command line options]</li>
</ul>
<h1>Options</h1>
<ul>
<li>Command line options take priority from the options from conf file.</li>
<li>Options in the following table are in alphabetical order</li>
</ul>
<table>
<tr>
<th>-authid &lt;string&gt;</th>
<th><ul><li>Authorization ID to be used in SRM for the request </li></ul></th>
</tr>
<tr>
<td>-conf &lt;path&gt;</td>
<td><ul><li>Path to the configuration file.</li><li>Command line options will override the options from conf file </li></ul></td>
</tr>
<tr>
<td>-connectiontimeout &lt;int&gt;</td>
<td><ul><li>enforces http connection timeout in the given seconds.</li><li>Default=1800 </li></ul></td>
</tr>
<tr>
<td>-count &lt;int&gt;</td>
<td><ul><li>Specifies count for LS in case there are too many listing</li><li>Default=0 </li></ul></td>
</tr>
<tr>
<td>-debug</td>
<td><ul><li>Specifies debugging output </li><li>Default=false </li></ul></td>
</tr>
<tr>
<td>-delegation &lt;true¶false&gt;</td>
<td><ul><li>Force proxy delegation.</li><li>When not provided, srm-dir makes no delegation by default, and automatically handles proxy delegation based on the source URLs.</li><li>When &ndash;delegation is provided, it forces the user choice. </li></ul></td>
</tr>
<tr>
<td>-f &lt;path&gt;</td>
<td><ul><li>Path to the xml input file containing the source url, target url information for requests with more than one file</li><li>Refer to the format and examples below </li></ul></td>
</tr>
<tr>
<td>-filestoragetype &lt;p ¶ d ¶ v&gt;</td>
<td><ul><li>Indicates filestorage type</li><li>p - Permanent, d - Durable, v - Volatile </li><li>No default</li></ul></td>
</tr>
<tr>
<td>-fulldetailed</td>
<td><ul><li>Specify to request detailed information on the source url</li><li>Only works with -ls</li><li>Default=false </li></ul></td>
</tr>
<tr>
<td>-help</td>
<td><ul><li>Show the help message </li></ul></td>
</tr>
<tr>
<td>-log &lt;path&gt;</td>
<td><ul><li>Specifies path to log file</li><li>Default=./srmclient-event-date-random.log </li></ul></td>
</tr>
<tr>
<td>-ls</td>
<td><ul><li>Request to browse the source url </li></ul></td>
</tr>
<tr>
<td>-mkdir</td>
<td><ul><li>Request to create a directory on the source url </li></ul></td>
</tr>
<tr>
<td>-mv</td>
<td><ul><li>Request to move a directory or a file from source url to target url </li></ul></td>
</tr>
<tr>
<td>-numlevels &lt;int&gt;</td>
<td><ul><li>Specifies the number of levels of recursiveness in LS</li><li>Default=1 </li></ul></td>
</tr>
<tr>
<td>-offset &lt;int&gt;</td>
<td><ul><li>Specifies offset for LS in case there are too many listing</li><li>Default=0 </li></ul></td>
</tr>
<tr>
<td>-proxyfile &lt;path&gt;</td>
<td><ul><li>Path to user grid proxy </li></ul></td>
</tr>
<tr>
<td>-quiet</td>
<td><ul><li>Suppress output in the console.</li><li>This option writes the output to the log file.</li><li>Default=false </li></ul></td>
</tr>
<tr>
<td>-recursive</td>
<td><ul><li>Specifies recursive listing with -ls option</li><li>Specifies recursive removal of an empty directory with -rmdir option. To specify a selective removal of empty directories, the list needs to be specified in the input file, not in the command line option.</li><li>Default=false </li></ul></td>
</tr>
<tr>
<td>-renewproxy</td>
<td><ul><li>Enables automatic proxy renewal upon expiration</li><li>Works only when -usercert and -userkey are provided </li><li>Prompts for the pass phrase</li><li>Default=false</li></ul></td>
</tr>
<tr>
<td>-report &lt;path&gt;</td>
<td><ul><li>Specifies path to full report output.</li></ul></td>
</tr>
<tr>
<td>-rm</td>
<td><ul><li>Request to remove a file on the source url </li></ul></td>
</tr>
<tr>
<td>-rmdir</td>
<td><ul><li>Request to remove the directory on the source url </li></ul></td>
</tr>
<tr>
<td>-s &lt;source_url&gt;</td>
<td><ul><li>Source URL </li></ul></td>
</tr>
<tr>
<td>-serviceurl &lt;endpoint&gt;</td>
<td><ul><li>Full web service endpoint</li><li>Required when source url or target url does not contain web service endpoint information </li></ul></td>
</tr>
<tr>
<td>-sethttptimeout &lt;int&gt;</td>
<td><ul><li>set client-side http connection timeout in the given seconds.</li><li>Default=600 </li></ul></td>
</tr>
<tr>
<td>-status &lt;request_token&gt;</td>
<td><ul><li>Specifies request token for checking the status of LS when SRM returned a request token </li></ul></td>
</tr>
<tr>
<td>-statusmaxtime &lt;int&gt;</td>
<td><ul><li>Max time before status checks get timed out, in seconds</li><li>Default=600 </li></ul></td>
</tr>
<tr>
<td>-statuswaittime &lt;int&gt;</td>
<td><ul><li>Wait time delay between status check, in seconds</li><li>Default=30 </li></ul></td>
</tr>
<tr>
<td>-storageinfo &lt;string&gt;</td>
<td><ul><li>extra storage access information</li><li>For BeStMan supporting MSS, a formatted input separated by comma is used with following keywords when necessary: for:&lt;source¶target¶sourcetarget&gt;,login:&lt;string&gt;,passwd:&lt;string&gt;,projectid:&lt;string&gt;,readpasswd:&lt;string&gt;,writepasswd&lt;string&gt;</li></ul></td>
</tr>
<tr>
<td>-t &lt;target_url&gt;</td>
<td><ul><li>Target URL </li></ul></td>
</tr>
<tr>
<td>-td &lt;target_url&gt;</td>
<td><ul><li>Target URL as directory path</li><li>Required for multiple &ldquo;get&rdquo; file requests if input file does not contain the target information.</li><li>When both target information in the input file and &ndash;td option are provided, command line option &ndash;td will take priority and information in the input file will be ignored.</li></ul></td>
</tr>
<tr>
<td>-usercert &lt;path&gt;</td>
<td><ul><li>Path to user grid certificate </li></ul></td>
</tr>
<tr>
<td>-userkey &lt;path&gt;</td>
<td><ul><li>Path to user grid certificate key </li></ul></td>
</tr>
<tr>
<td>-xmlreport &lt;path&gt;</td>
<td><ul><li>Specifies path to short output report in XML format.</li></ul></td>
</tr>
</table>
<h1>Notes</h1>
<ul>
<li>srm-dir makes no proxy delegation by default, and automatically handles proxy delegation based on the source urls. A user can override the automatic handling by providing an option &ldquo;-delegation&rdquo; (or &ldquo;-delegation true&rdquo;) to force the delegation, and &ldquo;-delegation false&rdquo; to force no delegation. &ldquo;-debug&rdquo; option would show how the delegation is done on the output.</li>
</ul>
<h1>Input file format</h1>
 <pre>
<?xml version="1.0" encoding="UTF-8"?>
<request>
  <file>
    <sourceurl>Source_URL</sourceurl>
    <targeturl>Target_URL</targeturl>
</file>
</request>
</pre>
<ul>
<li>Example 1 : LS operation</li>
</ul>
<pre>
<?xml version="1.0" encoding="UTF-8"?>
<request>
  <file>
    <sourceurl>srm://bestman.lbl.gov:8443/srm/v2/server?SFN=/mydir/mypath/myfile</sourceurl>
  </file>
</request>
</pre>
<ul>
<li>Example 2 : MV operation</li>
</ul>
<pre>
<?xml version="1.0" encoding="UTF-8"?>
<request>
  <file>
    <sourceurl>srm://bestman.lbl.gov:8443/srm/v2/server?SFN=/mydir/my.source.file</sourceurl>
    <targeturl>srm://bestman.lbl.gov:8443/srm/v2/server?SFN=/mydir/my.target.file</targeturl>
  </file>
</request>
</pre>
<h1>Examples</h1>
<h2>Browse anSURL</h2>
<ul>
<li>srm-dir srm://host:port/wsept?SFN=/source_filepath -ls</li>
<ul>
<li>This command retrieves the file info from SRM or from the file system that SRM can access to. <a href="/srmclients/samples/srm-dir-11.txt">Click here for the sample output.</a></li>
<ul>
<li>srm-dir srm://bestman.lbl.gov:8443/srm/v2/server?SFN=/srmcache/guest/test.data -ls</li>
</ul>
</ul>
<li>srm-dir gsiftp://host:port//target_filepath -ls</li>
<ul>
<li>This command retrieves the file information from the gridftp server. <a href="/srmclients/samples/srm-dir-12.txt">Click here for the sample output.</a></li>
<ul>
<li>srm-dir gsiftp://gridftphost.lbl.gov//data/path/test.data -ls</li>
</ul>
</ul>
<li>srm-dir srm://host:port /wsept?SFN=/source_dirpath -ls -recursive</li>
<ul>
<li>This command retrieves the directory info recursively from SRM or from the file system that SRM can access to. <a href="/srmclients/samples/srm-dir-13.txt">Click here for the sample output.</a></li>
<ul>
<li>srm-dir srm://bestman.lbl.gov:8443/srm/v2/server?SFN=/srmcache/guest -ls -recursive</li>
</ul>
</ul>
<li>srm-dir gsiftp://host:port//source_dirpath -ls -recursive</li>
<ul>
<li>This command retrieves the directory info recursively from the gridftp server. <a href="/srmclients/samples/srm-dir-14.txt">Click here for the sample output.</a></li>
<ul>
<li>srm-dir gsiftp://gridftphost.lbl.gov//data/path/source.dir -ls -recursive</li>
</ul>
</ul>
</ul>
<h2>Make a directory</h2>
<ul>
<li>srm-dir srm://host:port/wsept?SFN=/source_dirpath -mkdir</li>
<ul>
<li>This command requests to create a directory as SURL in SRMor in the file system that SRM can access to. <a href="/srmclients/samples/srm-dir-21.txt">Click here for the sample output.</a></li>
<ul>
<li>srm-dir srm://bestman.lbl.gov:8443/srm/v2/server?SFN=/srmcache/guest/test.dir -mkdir</li>
</ul>
</ul>
</ul>
<h2>Remove an empty directory</h2>
<ul>
<li>srm-dir srm://host:port/wsept?SFN=/source_dirpath -rmdir</li>
<ul>
<li>This command requests to remove an empty directory in SRM or in the file system that SRM can access to. <a href="/srmclients/samples/srm-dir-31.txt">Click here for the sample output.</a></li>
<ul>
<li>srm-dir srm://bestman.lbl.gov:8443/srm/v2/server?SFN=/srmcache/guest/test.dir -rmdir</li>
</ul>
</ul>
</ul>
<h2>Remove a file</h2>
<ul>
<li>srm-dir srm://host:port/wsept?SFN=/source_filepath -rm</li>
<ul>
<li>This command requests to remove a file from SRMor from the file system that SRM can access to. <a href="/srmclients/samples/srm-dir-41.txt">Click here for the sample output.</a></li>
<ul>
<li>srm-dir srm://bestman.lbl.gov:8443/srm/v2/server?SFN=/srmcache/guest/test.file -rm</li>
</ul>
</ul>
</ul>
<h2>Move an SURL to another SURL</h2>
<ul>
<li>srm-dir srm://host:port/wsept?SFN=/source_path srm://host:port/wsept?SFN=/target_path -mv</li>
<ul>
<li>This command requests to move a source SURL to a target SURL in SRM or in the file system that SRM can access to. Source and target SURLs can be directories. <a href="/srmclients/samples/srm-dir-51.txt">Click here for the sample output.</a></li>
<ul>
<li>srm-dir srm://bestman.lbl.gov:8443/srm/v2/server?SFN=/srmcache/guest/source.file srm://bestman.lbl.gov:8443/srm/v2/server?SFN=/srmcache/guest/target.file -mv</li>
<li>srm-dir srm://bestman.lbl.gov:8443/srm/v2/server?SFN=/srmcache/guest/source.dir srm://bestman.lbl.gov:8443/srm/v2/server?SFN=/srmcache/guest/target.dir -mv</li>
</ul>
</ul>
</ul>
<h1>Troubleshooting</h1>
<ul>
<li>When a large LS request is submitted or expected, the srm-dir may not fill all request or status information into the memory. It is mostlikely because the memory size of the java virtual machine. In such case, you can increase the size of the virtual machine in srm-dir by -Xmx###M, where # is the amount of memory which you want to allocate in megabytes. E.g. java &ndash;Xmx512M</li>
<li>For memory conscious jobs, &ldquo;-lite&rdquo; option is provided to use less memory to handle the user request. The option the passes -Xms32M to the virtual machine.</li>
</ul>
<h1>See Also</h1>
<ul>
<li><a href="SRMLs">srm-ls</a>, <a href="SRMRm">srm-rm</a>, <a href="SRMMkdir">srm-mkdir</a>, <a href="SRMRmdir">srm-rmdir</a>, <a href="SRMMv">srm-mv</a></li>
<li><a href="Software/SRMClients/BeStManClientsGuide/CommandSamples">BeStMan SRM-Client Tools User's Guide: Client commands and samples</a></li>
</ul>
<br>

</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>