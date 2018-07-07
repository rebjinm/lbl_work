<!DOCTYPE html>
<html>
<head>
<title>SRMRequest</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<h1>SRM-REQUEST: BeStMan SRM-Client Tools User's Guide</h1>
<ul>
<li>srm-request manages request related operations, such as abort, extending lifetimes, suspend and resume.</li>
</ul>
<h1>Usage</h1>
<ul>
<li>srm-request &lt;service_url&gt; [command line options]</li>
<li>srm-request &lt;service_url&gt; -f &lt;input_file&gt; [command line options]</li>
</ul>
<h1>Options</h1>
<ul>
<li>Command line options take priority from the options from conf file.</li>
<li>Options in the following table are in alphabetical order</li>
</ul>
<table>
<tr>
<th>-abortfiles &lt;request_token&gt;</th>
<th><ul><li>Specifies a request to abort files in the request</li><li>Used with -s or -f to specify SURLs</li></ul></th>
</tr>
<tr>
<td>-abortrequest &lt;request_token&gt;</td>
<td><ul><li>Specifies a request to abort</li></ul></td>
</tr>
<tr>
<td>-authid &lt;string&gt;</td>
<td><ul><li>Authorization ID to be used in SRM for the request </li></ul></td>
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
<td><ul><li>Force proxy delegation.</li><li>When not provided, srm client makes no delegation by default, and automatically handles proxy delegation based on the source and target URLs.</li><li>When -delegation is provided, it overrides the automatic handling and forces the user choice. </li></ul></td>
</tr>
<tr>
<td>-f &lt;path&gt;</td>
<td><ul><li>Path to the xml input file containing the source url, target url information for requests with more than one file</li><li>Refer to the format and examples below </li></ul></td>
</tr>
<tr>
<td>-getrequesttoken</td>
<td><ul><li>Retrieves request tokens that belong to the client </li></ul></td>
</tr>
<tr>
<td>-help</td>
<td><ul><li>Show the help message </li></ul></td>
</tr>
<tr>
<td>-lifetime &lt;int&gt;</td>
<td><ul><li>File (SURL) lifetime in seconds </li><li>Used with &ndash;s or &ndash;f to specify SURLs</li></ul></td>
</tr>
<tr>
<td>-log &lt;path&gt;</td>
<td><ul><li>Specifies path to log file</li><li>Default=./srmclient-event-date-random.log </li></ul></td>
</tr>
<tr>
<td>-pinlifetime &lt;int&gt;</td>
<td><ul><li>File pin lifetime in seconds </li><li>Mostly on TURLs</li></ul></td>
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
<td>-requestsummary &lt;request_token&gt;</td>
<td><ul><li>Specifies a request to retrieve request summary</li></ul></td>
</tr>
<tr>
<td>-requesttoken &lt;request_token&gt;</td>
<td><ul><li>Specifies a request token</li></ul></td>
</tr>
<tr>
<td>-resume &lt;request_token&gt;</td>
<td><ul><li>Specifies a previously suspended request to resume</li></ul></td>
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
<td>-suspend &lt;request_token&gt;</td>
<td><ul><li>Specifies a request to suspend</li></ul></td>
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
  <file>
    <sourceurl>srm://bestman.lbl.gov:8443/srm/v2/server?SFN=/mydir/mypath/myfile2</sourceurl>
  </file>
</request>
</pre>
<h1>Examples</h1>
<h2>Abort a request</h2>
<ul>
<li>srm-request srm://host:port/wsept -abortrequest &lt;request_token&gt;</li>
<ul>
<li>This command requests to abort a request that is specified with the request token. [[/srmclients/samples/srm-request-11.txt][Click here for the sample output.]]</li>
<ul>
<li>srm-request srm://bestman.lbl.gov:8443/srm/v2/server -abortrequest TOKEN_GET_12345</li>
</ul>
</ul>
</ul>
<h2>Abort a file in a request</h2>
<ul>
<li>srm-request srm://host:port/wsept -abortfiles &lt;request_token&gt; -s srm://host:port/wsept?SFN=/my_file_path</li>
<ul>
<li>This command requests to abort a file in the re2uest that is specified with the request token. [[/srmclients/samples/srm-request-21.txt][Click here for the sample output.]]</li>
<ul>
<li>srm-request srm://bestman.lbl.gov:8443/srm/v2/server -abortfiles TOKEN_GET_12345 -s srm://bestman.lbl.gov:8443/srm/v2/server?SFN=/srmcache/guest/test.file</li>
</ul>
</ul>
</ul>
<h2>Extend lifetime of a file in a request</h2>
<ul>
<li>srm-request srm://host:port/wsept -lifetime &lt;seconds&gt; -s srm://host:port/wsept?SFN=/source_filepath</li>
<ul>
<li>This command requests to extend SURL lifetime. <a href="/srmclients/samples/srm-request-31.txt">Click here for the sample output.</a></li>
<ul>
<li>srm-request srm://bestman.lbl.gov:8443/srm/v2/server -lifetime 3600 -s srm://bestman.lbl.gov:8443/srm/v2/server?SFN=/srmcache/guest/test.data</li>
<li>srm-request -lifetime 3600 -s srm://bestman.lbl.gov:8443/srm/v2/server?SFN=/srmcache/guest/test.data</li>
</ul>
</ul>
</ul>
<h2>Extend pin lifetime of a file in a request</h2>
<ul>
<li>srm-request srm://host:port/wsept -extlifetime &lt;request_token&gt; -pinlifetime &lt;seconds&gt; -s srm://host:port/wsept?SFN=/source_filepath</li>
<ul>
<li>This command requests to extend pin lifetime of a file in a request. <a href="/srmclients/samples/srm-request-41.txt">Click here for the sample output.</a></li>
<ul>
<li>srm-request srm://bestman.lbl.gov:8443/srm/v2/server -extlifetime TOKEN_GET_12345 -pinlifetime 3600 -s srm://bestman.lbl.gov:8443/srm/v2/server?SFN=/srmcache/guest/test.data</li>
<li>srm-request -extlifetime TOKEN_GET_12345 -pinlifetime 3600 -s srm://bestman.lbl.gov:8443/srm/v2/server?SFN=/srmcache/guest/test.data</li>
</ul>
</ul>
</ul>
<h2>Retrieve request summary</h2>
<ul>
<li>srm-request srm://host:port/wsept -requestsummary &lt;request_token&gt;</li>
<ul>
<li>This command requests to retrieve the request summary for the request that is specified with the request token. [[/srmclients/samples/srm-request-51.txt][Click here for the sample output.]]</li>
<ul>
<li>srm-request srm://bestman.lbl.gov:8443/srm/v2/server -requestsummary TOKEN_GET_12345</li>
</ul>
</ul>
</ul>
<h2>Retrieve request tokens</h2>
<ul>
<li>srm-request srm://host:port/wsept -getrequesttoken</li>
<ul>
<li>This command requests to retrieve the request tokens that belong to the client. [[/srmclients/samples/srm-request-61.txt][Click here for the sample output.]]</li>
<ul>
<li>srm-request srm://bestman.lbl.gov:8443/srm/v2/server -getrequesttoken</li>
<li>srm-request srm://bestman.lbl.gov:8443/srm/v2/server -getrequesttoken -userdesc &ldquo;my request token&rdquo;</li>
</ul>
</ul>
</ul>
<h2>Suspend a request</h2>
<ul>
<li>srm-request srm://host:port/wsept -suspend &lt;request_token&gt;</li>
<ul>
<li>This command requests to suspend the request. <a href="/srmclients/samples/srm-request-71.txt">Click here for the sample output.</a></li>
<ul>
<li>srm-request srm://bestman.lbl.gov:8443/srm/v2/server -suspend TOKEN_GET_12345</li>
</ul>
</ul>
</ul>
<h2>Resume a request</h2>
<ul>
<li>srm-request srm://host:port/wsept -resume &lt;request_token&gt;</li>
<ul>
<li>This command requests to resume a previously suspended request. <a href="/srmclients/samples/srm-request-81.txt">Click here for the sample output.</a></li>
<ul>
<li>srm-request srm://bestman.lbl.gov:8443/srm/v2/server -resume TOKEN_GET_12345</li>
</ul>
</ul>
</ul>
<h1>Troubleshooting</h1>
<ul>
<li>When a large request is submitted, the srm-request may not fill all request information into the memory before submitting to the server. It is mostlikely because the memory size of the java virtual machine. In such case, you can increase the size of the virtual machine in srm-request by -Xmx###M, where # is the amount of memory which you want to allocate in megabytes. E.g. java &ndash;Xmx512M</li>
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