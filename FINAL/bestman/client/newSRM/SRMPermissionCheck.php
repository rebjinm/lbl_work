<!DOCTYPE html>
<html>
<head>
<title>SRMPermissionCheck</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<p><a href="https://sdm.lbl.gov/bestman/client">Back to BeStMan Client Tools User's Guide</a></p>
<h1>SRM-PERMISSION-CHECK: BeStMan SRM-Client Tools User's Guide</h1>
<ul>
<li>srm-permission-check requests to check the permissions info on an SURL for the client.</li>
</ul>
<h1>Usage</h1>
<ul>
<li>srm-permission-check &lt;source_url&gt; [command line options]</li>
<li>srm-permission-check -f &lt;input_file&gt; [command line options]</li>
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
<td><ul><li>Force proxy delegation.</li><li>When not provided, srm client makes no delegation by default, and automatically handles proxy delegation based on the source URLs.</li><li>When -delegation is provided, it overrides the automatic handling and forces the user choice. </li></ul></td>
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
<td>-log &lt;path&gt;</td>
<td><ul><li>Specifies path to log file</li><li>Default=./srmclient-event-date-random.log </li></ul></td>
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
<td>-storageinfo &lt;string&gt;</td>
<td><ul><li>extra storage access information</li><li>For BeStMan supporting MSS, a formatted input separated by comma is used with following keywords when necessary: for:&lt;source¶target¶sourcetarget&gt;,login:&lt;string&gt;,passwd:&lt;string&gt;,projectid:&lt;string&gt;,readpasswd:&lt;string&gt;,writepasswd&lt;string&gt;</li></ul></td>
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
<li>Example 1</li>
</ul>
<pre>
<?xml version="1.0" encoding="UTF-8"?>
<request>
  <file>
    <sourceurl>srm://bestman.lbl.gov:8443/srm/v2/server?SFN=/mydir/mypath/myfile2</sourceurl>
  </file>
</request>
</pre>
<h1>Examples</h1>
<h2>Check permission information on a file</h2>
<ul>
<li>srm-permission-check srm://host:port/wsept?SFN=/source_filepath</li>
<ul>
<li>This command requests to check the permission information on the SURL for the client. <a href="/srmclients/samples/srm-permission-check-11.txt">Click here for the sample output.</a></li>
<ul>
<li>srm-permission-check srm://bestman.lbl.gov:8443/srm/v2/server?SFN=/srmcache/guest/test.data</li>
</ul>
</ul>
</ul>
<h1>Troubleshooting</h1>
<ul>
<li>No known issues</li>
</ul>
<h1>See Also</h1>
<ul>
<li><a href="SRMUtil">srm-util</a></li>
<li><a href="Software/SRMClients/BeStManClientsGuide/CommandSamples">BeStMan SRM-Client Tools User's Guide: Client commands and samples</a></li>
</ul>
<br>

</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>