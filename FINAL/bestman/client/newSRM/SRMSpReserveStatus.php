<!DOCTYPE html>
<html>
<head>
<title>SRMSpReserveStatus</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<p><a href="https://sdm.lbl.gov/bestman/client">Back to BeStMan Client Tools User's Guide</a></p>
<h1>SRM-SP-RESERVE-STATUS: BeStMan SRM-Client Tools User's Guide</h1>
<ul>
<li>srm-sp-reserve-status requests to check the status of previously submitted space reservation request.</li>
</ul>
<h1>Usage</h1>
<ul>
<li>srm-sp-reserve-status &lt;service_url&gt; -requesttoken &lt;token&gt; [command line options]</li>
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
<td>-delegation &lt;true&brvbar;false&gt;</td>
<td><ul><li>Force proxy delegation.</li><li>When not provided, srm client makes no delegation by default.</li><li>When -delegation is provided, it overrides the automatic handling and forces the user choice. </li></ul></td>
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
<td>-requesttoken &lt;string&gt;</td>
<td><ul><li>Specifies the request token to check </li></ul></td>
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
<li>srm client makes no proxy delegation by default. A user can override the automatic handling by providing an option ì-delegationî (or ì-delegation trueî) to force the delegation, and ì-delegation falseî to force no delegation. ì-debugî option would show how the delegation is done on the output.</li>
</ul>
<p></p>
<h1>Examples</h1>
<h2>Check the space reservation request</h2>
<ul>
<li>srm-sp-reserve-status  srm://host:port/wsept  -requesttoken &lt;request_token&gt;</li>
<ul>
<li>This command requests to check the status of the space reservation request.</li>
<ul>
<li>srm-sp-reserve-status  srm://bestman.lbl.gov:8443/srm/v2/server  -requesttoken REQUEST_RESERVE_123456</li>
<li>srm-sp-reserve-status  -serviceurl  srm://bestman.lbl.gov:8443/srm/v2/server -requesttoken REQUEST_RESERVE_123456</li>
</ul>
</ul>
</ul>
<p></p>
<h1>Troubleshooting</h1>
<ul>
<li>None reported</li>
</ul>
</ul>
<br>

</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>