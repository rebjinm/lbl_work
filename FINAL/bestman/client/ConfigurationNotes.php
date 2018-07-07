<!DOCTYPE html>
<html>
<head>
<title>ConfigurationNotes</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<p><a href="index.html">Back to BeStMan Client Tools User's Guide</a></p>
<h1>BeStMan SRM-Client Tools User's Guide: Configuration and Notes</h1>
<h1>Configuration</h1>
<ul>
<li>Change directory to the installed bestman-client/setup, and run configure with options.</li>
<li>Minimum options is --enable-clientonly when other options use default values. configure --help to see options with default values.</li>
<li>Upon successful running of configure, bestman-client/bin would be created with all necessary client commands.</li>
</ul>
<h1>Sample Configuration options</h1>
<p>These below examples with the same configuration may not work for your environment. For each option, choose the value that fits your environment.</p>
<ul>
<li>Typical case where default values are used,</li>
</ul>
<pre>
   % configure  --enable-clientonly
</pre>
<ul>
<li>From the above value example,</li>
</ul>
<pre>
   % configure \
   --enable-clientonly \
   --with-globus-tcp-port-range=62001,62999
</pre>
<ul>
<li>When CA certificate directory is not in usual place (/etc/grid-security/certificates),</li>
</ul>
<pre>
   % configure \
   --enable-clientonly \
   --with-cacert-path=/opt/osg/security/certificates \
   --with-globus-tcp-port-range=62001,62999
</pre>
<ul>
<li>An example with an external globus location when available,</li>
</ul>
<pre>
   % configure \
   --enable-clientonly \
   --with-globus-tcp-port-range=62001,62999 \
   --with-globus-location=/software/globus-4.2.1
</pre>
<h1>Configure options</h1>
<p>Upon successful configuration, bestman srm client tools would be created in bestman-client/bin.</p>
<h2>Required options</h2>
<tr>
<th>---enable-clientonly</th>
<th>Installation for SRM clients only (default=no).</th>
</tr>
</table>
<h2>Other options</h2>
<table>
<tr>
<th>--enable-backup</th>
<th>Enable backup before running a new configuration if there is a previous configuration (default=no)</th>
</tr>
<tr>
<td>--enable-verbose</td>
<td>Print output to the standard output during the configuration</td>
</tr>
<tr>
<td>--with-cacert-path=&lt;PATH&gt;</td>
<td>Specify the Grid CA Certificate directory path (default=/etc/grid-security/certificates)</td>
</tr>
<tr>
<td>--with-java-home=&lt;PATH&gt;</td>
<td>Specify the JAVA_HOME directory</td>
</tr>
<tr>
<td>--with-globus-location=&lt;PATH&gt;</td>
<td>Specify the GLOBUS_LOCATION path</td>
</tr>
<tr>
<td>--with-globus-tcp-port-range=&lt;VALUES&gt;</td>
<td>Specify the GLOBUS_TCP_PORT_RANGE when firewall is enabled. E.g. 62001,62999</td>
</tr>
<tr>
<td>--with-max-java-heap=&lt;INT&gt;</td>
<td>Specify the max java heap size in MB (default=1024)</td>
</tr>
<tr>
<td>--with-srm-home=&lt;PATH&gt;</td>
<td>Installation path for BeStMan SRM-Client Tools. If not given, it will be guessed based on the current working directory.</td>
</tr>
</table>
<h2>Configuration file</h2>
<ul>
<li>BeStMan SRM client tools may use client configuration file to define default values for some command line options when the client configuration file is manually created.</li>
<li>Client configuration file is from bestman-client/conf/srmclient.conf or from a desginated path as an option -conf to srm client commands.</li>
<li>When a parameter is defined in the client configuration file, the corresponding values may not be provided in the command line. This is particularly useful when repeated commands are used.</li>
<ul>
<li>e.g. If SRM service port number and service handle is defined in the client configuration file as</li>
</ul>
</ul>
<pre>
      ServicePortNumber=8443 
      ServiceHandle=/srm/v2/server 
</pre>
<ul>
<li></li>
<ul>
<li>Then, SURL can be srm://bestman.lbl.gov//mydir/myfile</li>
</ul>
<li>When the same parameter is provided in the command line with a different value, the command line value takes priority than one in the client configuration file.</li>
<li>A sample client configuration file is in bestman-client/conf directory.</li>
<li>Each entry in the configuration file has the following meaning.</li>
</ul>
<h3>Related to the SRM server connection control</h3>
<tr>
<th>ServicePortNumber</th>
<th><ul><li>Defines the default SRM service port number </li></ul></th>
</tr>
<tr>
<td>^</td>
<td>e.g. ServicePortNumber=8443</td>
</tr>
<tr>
<td>ServiceHandle</td>
<td><ul><li>Defines the default SRM service handle </li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. ServiceHandle=/srm/v2/server</td>
</tr>
<tr>
<td>ServiceURL</td>
<td><ul><li>Defines the default SRM service endpoint </li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. ServiceURL=srm://bestman.lbl.gov:8443/srm/v2/server</td>
</tr>
</table>
<ul>
<li>e.g. When the full SURL is srm://bestman.lbl.gov:8443/srm/v2/server?SFN=/mydir/mypath/myfile, it becomes srm://bestman.lbl.gov//mydir/mypath/myfile when ServicePortNumber and ServuceHandle are defined.</li>
<li>e.g. A client command &ldquo;srm-ls srm://bestman.lbl.gov:8443/srm/v2/server?SFN=/mydir/mypath/myfile&rdquo; can be &ldquo;srm-ls srm://bestman.lbl.gov//mydir/mypath/myfile&rdquo; when ServicePortNumber and ServiceHandle are defined.</li>
<li>e.g. A client command &ldquo;srm-ping srm://bestman.lbl.gov:8443/srm/v2/server&rdquo; can be &ldquo;srm-ping&rdquo; when ServiceURL is defined.</li>
</ul>
<h3>Related to the client file transfers</h3>
<tr>
<th>BufferSize</th>
<th><ul><li>Defines the default GridFTP buffer size</li><li>Default=1048576 </li></ul></th>
</tr>
<tr>
<td>^</td>
<td>e.g. BufferSize=1048576</td>
</tr>
<tr>
<td>Parallelism</td>
<td><ul><li>Defines the default number parallel streams for GridFTP transfers</li><li>Default=1</li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. Parallelism=2</td>
</tr>
<tr>
<td>dcau</td>
<td><ul><li>Defines the default DCAU setting</li><li>Default=true </li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. dcau=false</td>
</tr>
<tr>
<td>NumRetry</td>
<td><ul><li>Defines the default number of retries of file transfers when failed</li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. NumRetry=5</td>
</tr>
<tr>
<td>RetryDelay</td>
<td><ul><li>Defines the default number of seconds to sleep aftger a file transfer failure before next file transfer try </li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. RetryDelay=120</td>
</tr>
</table>
<ul>
<li>Equivalent command line options are -buffersize, -parallelism, -dcau, -numretry and &ndash;retrydelay respectively.</li>
</ul>
<h3>Related to the request status check</h3>
<tr>
<th>StatusWaitTime</th>
<th><ul><li>Defines the default waiting time in seconds between checking status of a request</li></ul></th>
</tr>
<tr>
<td>^</td>
<td>e.g. StatusWaitTime=120</td>
</tr>
<tr>
<td>StatusMaxTime</td>
<td><ul><li>Defines the default timeout in seconds for checking status of a request</li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. StatusMaxTime=600</td>
</tr>
</table>
<ul>
<li>Equivalent command line options are -statuswaittime and -statusmaxtime respectively.</li>
</ul>
<h3>Related to the space token</h3>
<tr>
<th>SpaceToken</th>
<th><ul><li>Defines the default space token to be used for all file requests</li></ul></th>
</tr>
<tr>
<td>^</td>
<td>e.g. SpaceToken=ATLASUSERDISK1</td>
</tr>
</table>
<h3>Related to the user GSI settings</h3>
<tr>
<th>ProxyFile</th>
<th><ul><li>Defines the default user proxy path</li></ul></th>
</tr>
<tr>
<td>^</td>
<td>e.g. ProxyFile=/tmp/x509up_u1234</td>
</tr>
<tr>
<td>UserCert</td>
<td><ul><li>Defines the default user certificate path</li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. UserCert=/home/users/mylogin/.globus/usercert.pem</td>
</tr>
<tr>
<td>UserKey</td>
<td><ul><li>Defines the default user certificate key path</li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. UserKey=/home/users/mylogin/.globus/userkey.pem</td>
</tr>
</table>
<ul>
<li>When UserCert and UserKey are defined, user grid passphrase will be prompted on each request.</li>
<li>When ProxyFile and UserCert/UserKey are defined, ProxyFile takes priority.</li>
<li>Equivalent command line options are -proxyfile, -usercert and -userkey respectively.</li>
</ul>
<br>

</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>