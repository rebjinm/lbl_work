<!DOCTYPE html>
<html>
<head>
<title>SRMLsStatus</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<p><a href="https://sdm.lbl.gov/bestman/client">Back to BeStMan Client Tools User's Guide</a></p>
<h1>SRM-LS-STATUS: BeStMan SRM-Client Tools User's Guide</h1>
<ul>
<li>srm-ls-status checks the status of previously submitted srm-ls request with the returned request token.</li>
</ul>
<h1>Usage</h1>
<ul>
<li>srm-ls-status &lt;request_token&gt; [command line options]</li>
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
<td><ul><li>Specifies count in case there are too many listing</li><li>Default=0 </li></ul></td>
</tr>
<tr>
<td>-debug</td>
<td><ul><li>Specifies debugging output </li><li>Default=false </li></ul></td>
</tr>
<tr>
<td>-delegation &lt;true¶false&gt;</td>
<td><ul><li>Force proxy delegation.</li><li>When not provided, srm-ls-status makes no delegation by default.</li><li>When -delegation is provided, it overrides the automatic handling and forces the user choice. </li></ul></td>
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
<td>-offset &lt;int&gt;</td>
<td><ul><li>Specifies offset in case there are too many listing</li><li>Default=0 </li></ul></td>
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
<td>-renewproxy</td>
<td><ul><li>Enables automatic proxy renewal upon expiration</li><li>Works only when -usercert and -userkey are provided </li><li>Prompts for the pass phrase</li><li>Default=false</li></ul></td>
</tr>
<tr>
<td>-requesttoken &lt;string&gt;</td>
<td><ul><li>Request token from the successful results from srm-ls </li></ul></td>
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
<li>srm-ls-status makes no proxy delegation by default. A user can override the automatic handling by providing an option &ldquo;-delegation&rdquo; (or &ldquo;-delegation true&rdquo;) to force the delegation, and &ldquo;-delegation false&rdquo; to force no delegation. &ldquo;-debug&rdquo; option would show how the delegation is done on the output.</li>
</ul>
<h1>Examples</h1>
<h2>Retrieves the status of the request</h2>
<ul>
<li>srm-ls-status request_token -serviceurl srm://host:port/wsept</li>
<ul>
<li>This command retrieves the status of the previously requested LS request. <a href="/srmclients/samples/srm-ls-status-1.txt">Click here for the sample output.</a></li>
<ul>
<li>srm-ls-status LS_TOKEN_1234 -serviceurl srm://bestman.lbl.gov:8443/srm/v2/server</li>
</ul>
</ul>
</ul>
<h1>Troubleshooting</h1>
<ul>
<li>When a large LS status is expected to be returned, the srm-ls-status may not handle status information into the memory. It is mostlikely because the memory size of the java virtual machine. In such case, you can increase the size of the virtual machine in srm-ls-status by -Xmx###M, where # is the amount of memory which you want to allocate in megabytes. E.g. java &ndash;Xmx512M</li>
<li>For memory conscious jobs, &ldquo;-lite&rdquo; option is provided to use less memory to handle the user request. The option the passes -Xms32M to the virtual machine.</li>
</ul>
<h1>See Also</h1>
<ul>
<li><a href="SRMLs">srm-ls</a>, <a href="SRMDir">srm-dir</a></li>
<li><a href="Software/SRMClients/BeStManClientsGuide/CommandSamples">BeStMan SRM-Client Tools User's Guide: Client commands and samples</a></li>
</ul>
<br>

</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>