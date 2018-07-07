<!DOCTYPE html>
<html>
<head>
<title>SRMSpace</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<h1>SRM-SPACE: BeStMan SRM-Client Tools User's Guide</h1>
<ul>
<li>srm-space requests to manage spaces in SRM. Operations include reserving space, checking the space reservation request, updating space, releasing and purging space, and retrieving space information.</li>
</ul>
<h1>Usage</h1>
<ul>
<li>srm-space service_url -reserve -size &lt;total_size&gt; -gsize &lt;guaranteed_size&gt; -lifetime &lt;seconds&gt; [command line options]</li>
<li>srm-space service_url -release &lt;space_token&gt; [command line options]</li>
<li>srm-space service_url -purge &lt;space_token&gt; [command line options]</li>
<li>srm-space service_url -change &lt;space_token&gt; [command line options]</li>
<li>srm-space service_url -update &lt;space_token&gt; -size &lt;total_size&gt; -gsize &lt;guaranteed_size&gt; -lifetime &lt;seconds&gt; -retentionpolicy &lt;retention_policy&gt; -accesslatency &lt;access_latency&gt; [command line options]</li>
<li>srm-space service_url -extendlifetime &lt;space_token&gt; -lifetime &lt;seconds&gt; [command line options]</li>
<li>srm-space service_url -getspacetoken [command line options]</li>
<li>srm-space service_url -getspaceinfo &lt;space_token&gt; [command line options]</li>
</ul>
<h1>Options</h1>
<ul>
<li>Command line options take priority from the options from conf file.</li>
<li>Options in the following table are in alphabetical order</li>
</ul>
<table>
<tr>
<th>-accesslatency &lt;online¶nearline&gt;</th>
<th><ul><li>Specifies access latency</li><li>Default=online</li> </ul></th>
</tr>
<tr>
<td>-authid &lt;string&gt;</td>
<td><ul><li>Authorization ID to be used in SRM for the request </li></ul></td>
</tr>
<tr>
<td>-change &lt;space_token&gt;</td>
<td><ul><li>Requests to change spaces to the specified space for SURLs </li></ul></td>
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
<td>-extendlifetime &lt;space_token&gt;</td>
<td><ul><li>requests to update the file lifetime for all files in the space specified by the space token</li><li>Use with -lifetime</li></ul></td>
</tr>
<tr>
<td>-f &lt;path&gt;</td>
<td><ul><li>Path to the xml input file containing the source url information for requests with more than one file</li><li>Refer to the format and examples below </li></ul></td>
</tr>
<tr>
<td>-forcerelease</td>
<td><ul><li>Requests to release files in a space</li><li>Default=false </li></ul></td>
</tr>
<tr>
<td>-getspaceinfo &lt;space_token&gt;</td>
<td><ul><li>Retrieves the space info </li></ul></td>
</tr>
<tr>
<td>-getspacetoken</td>
<td><ul><li>Retrieves space tokens that belong to the client</li></ul></td>
</tr>
<tr>
<td>-gsize &lt;int&gt;</td>
<td><ul><li>Specifies the desired guaranteed space size in bytes </li></ul></td>
</tr>
<tr>
<td>-help</td>
<td><ul><li>Show the help message </li></ul></td>
</tr>
<tr>
<td>-lifetime &lt;int&gt;</td>
<td><ul><li>Specifies desired space lifetime in seconds </li></ul></td>
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
<td>-purge &lt;space_token&gt;</td>
<td><ul><li>Requests to purge files from the space </li></ul></td>
</tr>
<tr>
<td>-quiet</td>
<td><ul><li>Suppress output in the console.</li><li>This option writes the output to the log file.</li><li>Default=false </li></ul></td>
</tr>
<tr>
<td>-release &lt;space_token&gt;</td>
<td><ul><li>Requests to release the space</li></ul></td>
</tr>
<tr>
<td>-reserve</td>
<td><ul><li>Requests to reserve a space and gets the space token when successful</li></ul></td>
</tr>
<tr>
<td>-retentionpolicy &lt;replica ¶ output ¶ custodial&gt;</td>
<td><ul><li>Specifies retention quality</li><li>Default=replica </li></ul></td>
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
<td>-size &lt;int&gt;</td>
<td><ul><li>Specifies the desired total space size in bytes</li></ul></td>
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
<td><ul><li>extra storage access information</li><li>For BeStMan supporting MSS, a formatted input separated by comma is used with following keywords when necessary: for:&lt;source ¶ target ¶ sourcetarget&gt;,login:&lt;string&gt;,passwd:&lt;string&gt;,projectid:&lt;string&gt;,readpasswd:&lt;string&gt;,writepasswd&lt;string&gt;</li></ul></td>
</tr>
<tr>
<td>-update &lt;space_token&gt;</td>
<td><ul><li>Requests to update the space</li></ul></td>
</tr>
<tr>
<td>-usercert &lt;path&gt;</td>
<td><ul><li>Path to user grid certificate </li></ul></td>
</tr>
<tr>
<td>-userdesc &lt;string&gt;</td>
<td><ul><li>Specifies user request description</li></ul></td>
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
<li>Example 1 : PURGE, CHANGE, EXTENDFILELIFETIME operation</li>
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
<h2>Reserve a space</h2>
<ul>
<li>srm-space srm://host:port/wsept -reserve -size &lt;bytes&gt; -gsize &lt;bytes&gt; -lifetime &lt;seconds&gt;</li>
<ul>
<li>This command requests to reserve a space in the SRM. <a href="/srmclients/samples/srm-space-11.txt">Click here for the sample output.</a></li>
<ul>
<li>srm-space srm://bestman.lbl.gov:8443/srm/v2/server -reserve -size 50000000 -gsize 40000000 -lifetime 3600</li>
</ul>
</ul>
</ul>
<h2>Release a space</h2>
<ul>
<li>srm-space srm://host:port/wsept -release &lt;space_token&gt;</li>
<ul>
<li>This command requests to release a previously reserved space and all files in the space that is specified with the space token, regardless of their file statuses. [[/srmclients/samples/srm-space-21.txt][Click here for the sample output.]]</li>
<ul>
<li>srm-space srm://bestman.lbl.gov:8443/srm/v2/server -release SPACE_TOKEN_V12345</li>
</ul>
</ul>
<li>srm-space srm://host:port/wsept -release &lt;space_token&gt; -forcerelease</li>
<ul>
<li>This command requests to release a previously reserved space in the SRM that is specified with the space token, and their file statuses. [[/srmclients/samples/srm-space-22.txt][Click here for the sample output.]]</li>
<ul>
<li>srm-space srm://bestman.lbl.gov:8443/srm/v2/server -release SPACE_TOKEN_V12345 -forcerelease</li>
</ul>
</ul>
</ul>
<h2>Update a space</h2>
<ul>
<li>srm-space srm://host:port/wsept -update &lt;space_token&gt; -size &lt;bytes&gt; -gsize &lt;bytes&gt; -lifetime &lt;seconds&gt;</li>
<ul>
<li>This command requests to update a previously reserved space in the SRM that is specified with the space token. [[/srmclients/samples/srm-space-31.txt][Click here for the sample output.]]</li>
<ul>
<li>srm-space srm://bestman.lbl.gov:8443/srm/v2/server -update SPACE_TOKEN_V12345 &ndash;size 90000000 -gsize 80000000 -lifetime 7200</li>
</ul>
</ul>
</ul>
<h2>Change space for a file</h2>
<ul>
<li>srm-space srm://host:port/wsept -change &lt;space_token&gt; -s srm://host:port/wsept\?SFN=/source_filepath</li>
<ul>
<li>This command requests to change space for a file to space that is specified with the space token. [[/srmclients/samples/srm-space-41.txt][Click here for the sample output.]]</li>
<ul>
<li>srm-space srm://bestman.lbl.gov:8443/srm/v2/server -change SPACE_TOKEN_V12345 -s srm://bestman.lbl.gov:8443/srm/v2/server?SFN=/srmcache/guest/test.file</li>
</ul>
</ul>
</ul>
<h2>Purge a space</h2>
<ul>
<li>srm-space srm://host:port/wsept -purge &lt;space_token&gt; -s srm://host:port/wsept?SFN=/source_filepath</li>
<ul>
<li>This command requests to purge a file from the space that is specified with the space token. [[/srmclients/samples/srm-space-51.txt][Click here for the sample output.]]</li>
<ul>
<li>srm-space srm://bestman.lbl.gov:8443/srm/v2/server -purge SPACE_TOKEN_V12345 -s srm://bestman.lbl.gov:8443/srm/v2/server?SFN=/srmcache/guest/test.file</li>
</ul>
</ul>
</ul>
<h2>Retrieve space tokens</h2>
<ul>
<li>srm-space srm://host:port/wsept -getspacetoken</li>
<ul>
<li>This command requests to retrieve all space tokens that belong to the client. [[/srmclients/samples/srm-space-61.txt][Click here for the sample output.]]</li>
<ul>
<li>srm-space srm://bestman.lbl.gov:8443/srm/v2/server -getspacetoken</li>
</ul>
</ul>
</ul>
<h2>Retrieve space information</h2>
<ul>
<li>srm-space srm://host:port/wsept -getspaceinfo &lt;space_token&gt;</li>
<ul>
<li>This command requests to retrieve the space information that is specified by the space token. [[/srmclients/samples/srm-space-71.txt][Click here for the sample output.]]</li>
<ul>
<li>srm-space srm://bestman.lbl.gov:8443/srm/v2/server -getspaceinfo SPACE_TOKEN_V12345</li>
</ul>
</ul>
</ul>
<h1>Troubleshooting</h1>
<ul>
<li>None reported</li>
</ul>
<h1>See Also</h1>
<ul>
<li><a href="SRMCopy">srm-copy</a></li>
<li><a href="Software/SRMClients/BeStManClientsGuide/CommandSamples">BeStMan SRM-Client Tools User's Guide: Client commands and samples</a></li>
</ul>
<br>

</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>