<!DOCTYPE html>
<html>
<head>
<title>SRMCopyStatus</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<p><a href="https://sdm.lbl.gov/bestman/client">Back to BeStMan Client Tools User's Guide</a></p>
<h1>SRM-COPY-STATUS: BeStMan SRM-Client Tools User's Guide</h1>
<ul>
<li>srm-copy-status requests to check the status of the previously submitted request with the request token that has been returned from the SRM.</li>
</ul>
<h1>Usage</h1>
<ul>
<li>srm-copy-status &lt;request_token&gt; -requesttype &lt;type&gt; -serviceurl &lt;SRM_endopint&gt; [command line options]</li>
<li>srm-copy-status -requesttoken &lt;request_token&gt; -requesttype &lt;type&gt; -serviceurl &lt;SRM_endopint&gt; [command line options]</li>
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
<td><ul><li>Force proxy delegation.</li><li>When not provided, srm-copy-status makes no delegation by default, and automatically handles proxy delegation based on the source and/or target URLs.</li><li>When &ndash;delegation is provided, it forces the user choice. </li></ul></td>
</tr>
<tr>
<td>-f &lt;path&gt;</td>
<td><ul><li>Path to the xml input file containing the source url, target url information for requests with more than one file</li><li>Refer to the format and an example below </li></ul></td>
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
<td>-requesttoken &lt;string&gt;</td>
<td><ul><li>Valid request token returned by the SRM server</li></ul></td>
</tr>
<tr>
<td>-requesttype &lt;get¶put¶copy¶bringonline&gt;</td>
<td><ul><li>Specifies the request type</li><li>GET, PUT, COPY or BringOnline</li><li>Default=copy</li></ul></td>
</tr>
<tr>
<td>-quiet</td>
<td><ul><li>Suppress output in the console.</li><li>This option writes the output to the log file.</li><li>Default=false </li></ul></td>
</tr>
<tr>
<td>-renewproxy</td>
<td><ul><li>Enables automatic proxy renewal upon expiration</li><li>Works only when -usercert and -userkey are provided </li><li>Prompts for the pass phrase</li><li>Default=false</li></ul></td>
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
<li>srm-copy-status makes no proxy delegation by default, and automatically handles proxy delegation based on the source and target urls. A user can override the automatic handling by providing an option &ldquo;-delegation&rdquo; (or &ldquo;-delegation true&rdquo;) to force the delegation, and &ldquo;-delegation false&rdquo; to force no delegation. &ldquo;-debug&rdquo; option would show how the delegation is done on the output.</li>
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
<li>Example 1 : PUT operation</li>
</ul>
<pre>
<?xml version="1.0" encoding="UTF-8"?>
<request>
  <file>
    <sourceurl>file:////tmp/my.source.data</sourceurl>
    <targeturl>srm://bestman.lbl.gov:8443/srm/v2/server?SFN=/mydir/mypath/myfile</targeturl>
  </file>
</request>
</pre>
<ul>
<li>Example 2 : COPY operation from gsiftp to SRM</li>
</ul>
<pre>
<?xml version="1.0" encoding="UTF-8"?>
<request>
  <file>
    <sourceurl>gsiftp://gridftphost.lbl.gov//tmp/my.source.data</sourceurl>
    <targeturl>srm://bestman.lbl.gov:8443/srm/v2/server?SFN=/mydir/mypath/myfile</targeturl>
  </file>
</request>
</pre>
<ul>
<li>Example 3 : COPY operation from SRM to SRM</li>
</ul>
<pre>
<?xml version="1.0" encoding="UTF-8"?>
<request>
  <file>
    <sourceurl>srm://bestman.lbl.gov:8443/srm/v2/server?SFN=/mydir/my.source.file</sourceurl>
    <targeturl>srm://bestman2.lbl.gov:8443/srm/v2/server?SFN=/mydir/my.target.file</targeturl>
  </file>
</request>
</pre>
<ul>
<li>Example 4 : GET operation from SRM to local target directory (specified by command line option)</li>
</ul>
<pre>
<?xml version="1.0" encoding="UTF-8"?>
<request>
  <file>
    <sourceurl>srm://bestman.lbl.gov:8443/srm/v2/server?SFN=/mydir/my.source.file</sourceurl>
  </file>
</request>
</pre>
<h1>Examples</h1>
<h2>Check status of a request</h2>
<ul>
<li>srm-copy-status &lt;request_token&gt; -requesttype &lt;get ¶ put ¶ copy ¶ bringonline&gt; -serviceurl &lt;SRM_endopint&gt;</li>
<ul>
<li>This command checks the request with the specified request token from the SRM server. [[/srmclients/samples/srm-copy-status-1.txt][Click here for the sample output.]]</li>
<ul>
<li>srm-copy-status TOKEN_GET_123 -requesttype get -serviceurl srm://bestman.lbl.gov:8443/srm/v2/server</li>
</ul>
</ul>
</ul>
<h1>Troubleshooting</h1>
<ul>
<li>When the submitted request is large, the srm-copy-status may not fill all request information into the memory when receiving results from the server. It is mostlikely because the memory size of the java virtual machine. In such case, you can increase the size of the virtual machine in srm-copy-status by -Xmx###M, where # is the amount of memory which you want to allocate in megabytes. E.g. java &ndash;Xmx512M</li>
<li>For memory conscious jobs, &ldquo;-lite&rdquo; option is provided to use less memory to handle the user request. The option the passes -Xms32M to the virtual machine.</li>
</ul>
<h1>See also</h1>
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