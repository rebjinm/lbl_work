<!DOCTYPE html>
<html>
<head>
<title>SRMLs</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<p><a href="https://sdm.lbl.gov/bestman/client">Back to BeStMan Client Tools User's Guide</a></p>
<h1>SRM-LS: BeStMan SRM-Client Tools User's Guide</h1>
<ul>
<li>srm-ls handles directory or file browsing and retrieves information.</li>
</ul>
<h1>Usage</h1>
<ul>
<li>srm-ls &lt;source_url&gt; [command line options]</li>
<li>srm-ls -f &lt;input_file&gt; [command line options]</li>
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
<td><ul><li>Force proxy delegation.</li><li>When not provided, srm-ls automatically handles proxy delegation based on the source URLs.</li><li>When &ndash;delegation is provided, it forces the user choice. </li></ul></td>
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
<td><ul><li>Specify to request detailed information on the source url</li><li>Default=false </li></ul></td>
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
<td><ul><li>Specifies recursive listing with -ls option</li><li>Default=false </li></ul></td>
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
<td>-submitonly</td>
<td><ul><li>Enables request submission only</li><li>When provided, srm-ls exits after the request submission. Otherwise, it continues checking status until it is timed out or gets return status.</li><li>Default=false </li></ul></td>
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
<li>srm client makes no proxy delegation by default, and automatically handles proxy delegation based on the source urls. A user can override the automatic handling by providing an option &ldquo;-delegation&rdquo; (or &ldquo;-delegation true&rdquo;) to force the delegation, and &ldquo;-delegation false&rdquo; to force no delegation. &ldquo;-debug&rdquo; option would show how the delegation is done on the output.</li>
</ul>
<h1>Input file format</h1>
 <pre>
<?xml version="1.0" encoding="UTF-8"?>
<request>
  <file>
   <sourceurl>Source_URL</sourceurl>
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
<h1>Examples</h1>
<h2>Browse a file in SRM server</h2>
<ul>
<li>srm-ls srm://host:port/wsept?SFN=/source_filepath</li>
<ul>
<li>This command retrieves the file info from SRM or from the file system that SRM can access to. <a href="/srmclients/samples/srm-ls-11.txt">Click here for the sample output.</a></li>
<ul>
<li>srm-ls srm://bestman.lbl.gov:8443/srm/v2/server?SFN=/srmcache/guest/test.data</li>
</ul>
</ul>
</ul>
<h2>Browsing a directory in SRM server</h2>
<ul>
<li></li>
<ul>
<li>srm-ls srm://host:port /wsept?SFN=/source_dirpath</li>
<ul>
<li>This command retrieves the directory info from SRM or from the file system that SRM can access to. <a href="/srmclients/samples/srm-ls-21.txt">Click here for the sample output.</a></li>
<ul>
<li>srm-ls srm://bestman.lbl.gov:8443/srm/v2/server?SFN=/srmcache/guest/dir</li>
</ul>
</ul>
<li>srm-ls srm://host:port /wsept?SFN=/source_dirpath -recursive</li>
<ul>
<li>This command retrieves the directory info recursively from SRM or from the file system that SRM can access to. <a href="/srmclients/samples/srm-ls-22.txt">Click here for the sample output.</a></li>
<ul>
<li>srm-ls srm://bestman.lbl.gov:8443/srm/v2/server?SFN=/srmcache/guest/dir -recursive</li>
</ul>
</ul>
</ul>
</ul>
<h2>Browsing a file in gridftp server</h2>
<ul>
<li>srm-ls gsiftp://host:port//target_filepath</li>
<ul>
<li>This command retrieves the file information from the gridftp server. <a href="/srmclients/samples/srm-ls-31.txt">Click here for the sample output.</a></li>
<ul>
<li>srm-ls gsiftp://gridftphost.lbl.gov//data/path/test.data</li>
</ul>
</ul>
</ul>
<h2>Browsing a directory in gridftp server</h2>
<ul>
<li>srm-ls gsiftp://host:port//source_dirpath</li>
<ul>
<li>This command retrieves the directory info from the gridftp server. <a href="/srmclients/samples/srm-ls-41.txt">Click here for the sample output.</a></li>
<ul>
<li>srm-ls gsiftp://gridftphost.lbl.gov//data/path/source.dir</li>
</ul>
</ul>
<li>srm-ls gsiftp://host:port//source_dirpath -recursive</li>
<ul>
<li>This command retrieves the directory info recursively from the gridftp server. <a href="/srmclients/samples/srm-ls-42.txt">Click here for the sample output.</a></li>
<ul>
<li>srm-ls gsiftp://gridftphost.lbl.gov//data/path/source.dir -recursive</li>
</ul>
</ul>
</ul>
<h2>Browsing a local file</h2>
<ul>
<li>srm-ls file:////target_filepath</li>
<ul>
<li>This command retrieves the file information from the local file system. <a href="/srmclients/samples/srm-ls-51.txt">Click here for the sample output.</a></li>
<ul>
<li>srm-ls file:////data/path/test.data</li>
</ul>
</ul>
</ul>
<h2>Browsing a local directory</h2>
<ul>
<li>srm-ls file:////source_dirpath</li>
<ul>
<li>This command retrieves the directory info from the local file system. <a href="/srmclients/samples/srm-ls-61.txt">Click here for the sample output.</a></li>
<ul>
<li>srm-ls file:////data/path/source.dir</li>
</ul>
</ul>
<li>srm-ls file:////source_dirpath -recursive</li>
<ul>
<li>This command retrieves the directory info recursively from the local file system. <a href="/srmclients/samples/srm-ls-62.txt">Click here for the sample output.</a></li>
<ul>
<li>srm-ls file:////data/path/source.dir -recursive</li>
</ul>
</ul>
</ul>
<h1>Troubleshooting</h1>
<ul>
<li>When a large LS request is submitted or expected, the srm-ls may not fill all request or status information into the memory. It is mostlikely because the memory size of the java virtual machine. In such case, you can increase the size of the virtual machine in srm-ls by -Xmx###M, where # is the amount of memory which you want to allocate in megabytes. E.g. java &ndash;Xmx512M</li>
<li>For memory conscious jobs, &ldquo;-lite&rdquo; option is provided to use less memory to handle the user request. The option the passes -Xms32M to the virtual machine.</li>
</ul>
<h1>See Also</h1>
<ul>
<li><a href="SRMLsStatus">srm-ls-status</a>, <a href="SRMDir">srm-dir</a></li>
<li><a href="Software/SRMClients/BeStManClientsGuide/CommandSamples">BeStMan SRM-Client Tools User's Guide: Client commands and samples</a></li>
</ul>
<br>

</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>