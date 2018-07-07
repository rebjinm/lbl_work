<!DOCTYPE html>
<html>
<head>
<title>SRMExtendFileLifetime</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<p><a href="https://sdm.lbl.gov/bestman/client">Back to BeStMan Client Tools User's Guide</a></p>
<h1>SRM-EXTENDFILELIFETIME: BeStMan SRM-Client Tools User's Guide</h1>
<ul>
<li>srm-extendfilelifetime requests to extend lifetime of existing SURLs of volatile and durable file storage types or lifetime of pinned files (TURLs of the results of srmPrepareToGet, srmPrepareToPut or srmBringOnline).</li>
</ul>
<h1>Usage</h1>
<ul>
<li>srm-extendlifetime &lt;source_url&gt; [command line options]</li>
<li>srm-extendlifetime -f &lt;input_file&gt; [command line options]</li>
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
<td>-debug</td>
<td><ul><li>Specifies debugging output </li><li>Default=false </li></ul></td>
</tr>
<tr>
<td>-delegation &lt;true¶false&gt;</td>
<td><ul><li>Force proxy delegation.</li><li>When not provided, srm client makes no delegation by default and automatically handles proxy delegation based on the source URLs.</li><li>When -delegation is provided, it overrides the automatic handling and forces the user choice. </li></ul></td>
</tr>
<tr>
<td>-f &lt;path&gt;</td>
<td><ul><li>Path to the xml input file containing the source url, target url information for requests with more than one file</li><li>Refer to the format and examples below </li></ul></td>
</tr>
<tr>
<td>-help</td>
<td><ul><li>Show the help message </li></ul></td>
</tr>
<tr>
<td>-lifetime &lt;int&gt;</td>
<td><ul><li>File (SURL) lifetime in seconds </li></ul></td>
</tr>
<tr>
<td>-log &lt;path&gt;</td>
<td><ul><li>Specifies path to log file</li><li>Default=./srmclient-event-date-random.log </li></ul></td>
</tr>
<tr>
<td>-pinlifetime &lt;int&gt;</td>
<td><ul><li>Pin lifetime in seconds to extend. </li><li>-requesttoken must be specified.</li></ul></td>
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
<td>-requesttoken &lt;request_token&gt;</td>
<td><ul><li>Specifies a request token</li></ul></td>
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
<td>-spacetoken &lt;string&gt;</td>
<td><ul><li>Specifies space token</li><li>Enables extension of files lifetime in the space that is associated with the space token.</li></ul></td>
</tr>
<tr>
<td>-usercert &lt;path&gt;</td>
<td><ul><li>Path to user grid certificate </li></ul></td>
</tr>
<tr>
<td>-userkey &lt;path&gt;</td>
<td><ul><li>Path to user grid certificate key </li></ul></td>
</tr>
</table>
<h1>Notes</h1>
<ul>
<li>srm client makes no proxy delegation by default, and automatically handles proxy delegation based on the source and target urls. A user can override the automatic handling by providing an option &ldquo;-delegation&rdquo; (or &ldquo;-delegation true&rdquo;) to force the delegation, and &ldquo;-delegation false&rdquo; to force no delegation. &ldquo;-debug&rdquo; option would show how the delegation is done on the output.</li>
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
<li>Example 1</li>
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
<h2>Extend file (SURL) lifetime</h2>
<ul>
<li>srm-extendfilelifetime srm://host:port/wsept?SFN=/target_filepath -lifetime seconds</li>
<ul>
<li>This command requests to extend file lifetime on the specified SURL. <a href="/srmclients/samples/srm-extendfilelifetime-11.txt">Click here for the sample output.</a></li>
<ul>
<li>srm-extendfilelifetime srm://bestman.lbl.gov:8443/srm/v2/server?SFN=/srmcache/guest/test.data -lifetime 600</li>
</ul>
</ul>
</ul>
<h2>Extend pin lifetime of a file in a request</h2>
<ul>
<li>srm-extendfilelifetime srm://host:port/wsept?SFN=/source_filepath -pinlifetime seconds -requesttoken token</li>
<ul>
<li>This command requests to extend pin lifetime of a file in the request. <a href="/srmclients/samples/srm-extendfilelifetime-21.txt">Click here for the sample output.</a></li>
<ul>
<li>srm-extendfilelifetime srm://bestman.lbl.gov:8443/srm/v2/server?SFN=/srmcache/guest/test.data -pinlifetime 600 -requesttoken TOKEN_123456</li>
</ul>
</ul>
</ul>
<h2>Extend file lifetime in a space</h2>
<ul>
<li>srm-extendfilelifetime srm://host:port/wsept?SFN=/source_filepath -lifetime seconds &ndash;spacetoken token</li>
<ul>
<li>This command requests to extend file lifetime in a space. <a href="/srmclients/samples/srm-extendfilelifetime-31.txt">Click here for the sample output.</a></li>
<ul>
<li>srm-extendfilelifetime srm://bestman.lbl.gov:8443/srm/v2/server?SFN=/srmcache/guest/test.data -lifetime 600 -spacetoken STOKEN_12345</li>
</ul>
</ul>
</ul>
<h1>Troubleshooting</h1>
<ul>
<li>When a large request is submitted, the srm-extendfilelifetime may not fill all request information into the memory before submitting to the server. It is mostlikely because the memory size of the java virtual machine. In such case, you can increase the size of the virtual machine in srm-extendfilelifetime by -Xmx###M, where # is the amount of memory which you want to allocate in megabytes. E.g. java &ndash;Xmx512M</li>
<li>For memory conscious jobs, &ldquo;-lite&rdquo; option is provided to use less memory to handle the user request. The option the passes -Xms32M to the virtual machine.</li>
</ul>
<h1>See Also</h1>
<ul>
<li><a href="SRMCopy">srm-copy</a>, <a href="SRMRequest">srm-request</a></li>
<li><a href="Software/SRMClients/BeStManClientsGuide/CommandSamples">BeStMan SRM-Client Tools User's Guide: Client commands and samples</a></li>
</ul>
<br>

</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>