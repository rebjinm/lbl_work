<!DOCTYPE html>
<html>
<head>
<title>Configuration</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
</table>
<h1>Configuration and Notes</h1>
<ul>
<li>Change directory to the installed bestman2/setup, and run configure with options.</li>
<li>The server configuration is default to the gateway mode. Minimum options for full management mode are --enable-full-mode, --with-replica-storage-path and --with-replica-storage-size when other options use default values. configure --help to see options with default values.</li>
<li>Upon successful running of configure, bestman2/conf/bestman2.rc would be created.</li>
<li>If automatic generation of configuration file does not fit your needs, you can go to section 4.3 for manual creation or modification of the configuration file.</li>
<li>srmcache is a keyword for full management mode, so that user controlled disk space can be accessible through SRM interface without the keyword.</li>
<ul>
<li>If it is not desired (no access to the user controlled disk path through SRM interface), you can disable by providing --disable-srmcache-keyword or edit conf/bestman2.rc for srmcacheKeywordOn=false.</li>
</ul>
<li>When space reservation needs to be configured other than the default for full management mode, consider adding/updating the following parameters in conf/bestman2.rc after configure:</li>
</ul>
<pre>
          # for 5 GB quota allocation per user
          ReplicaQualityStorageUserQuotaMB=5000
          # 1GB quota allocation per request
           DefaultMBPerToken=1000
          # for 40% of the storage that can be reserved by space reservation
          PublicSpaceProportion=60
</pre>
<ul>
<li>When support for access to user managed space is needed, --enable-sudofsmng option will set the proper configuration parameters (accessFileSysViaSudo=true). In this case, if BeStMan2 server runs under other than root account, /etc/sudoers file needs to be modified (visudo) as following. Suppose bestman2 process runs under daemon account:</li>
<ul>
<li>Note: Some OS systems such as Fedora Core and RHEL5 may require additional entry in the /etc/sudoers for tty access (Defaults requiretty). Some Redhat-like and Ubuntu/Debian distribution do not require this entry.</li>
</ul>
</ul>
<pre>
        Cmnd_Alias     SRM_CMD = /bin/rm, /bin/mkdir, /bin/rmdir, /bin/mv, /bin/cp, /bin/ls
        Runas_Alias    SRM_USR = ALL, root
        daemon           ALL=(SRM_USR) NOPASSWD: SRM_CMD
</pre>
<ul>
<li>When multiple transfer servers are supported, they can be defined with --with-transfer-servers for configure command or configuration parameter supportedProtocolList in conf/bestman2.rc as following:</li>
<ul>
<li>Note: Multiple transfer servers are separated by semi-colon.</li>
</ul>
</ul>
<pre>
         supportedProtocolList=gsiftp://host1.domain.tld;gsiftp://host2.domain.tld
</pre>
<ul>
<li>In gateway mode, static (pre-allocated) space tokens can be defined with --with-tokens-list for configure command or configuration parameter staticTokenList in conf/bestman2.rc as following:</li>
<ul>
<li>"desc" is the keyword that cannot be changed, and multiple tokens are separated by semi-colon.</li>
<ul>
<li>e.g. staticTokenList=mytoken[desc:my_tokendesc][12];mytoken2[desc:my_tokendesc2][34]</li>
</ul>
<li>This staticTokenList does not work in full management mode, and will be ignored if defined.</li>
</ul>
</ul>
<pre>
         staticTokenList=token_name[desc:token_desc][token_size_in_GB]
</pre>
<ul>
<li>When some local paths need to be blocked for user access, they can be defined with --with-blocked-paths for configure command or configuration parameter localPathListToBlock in conf/bestman2.rc as following:</li>
<ul>
<li>Multiple paths are separated by semi-colon. Defined paths and their recursive sub-paths will be blocked for client access.</li>
</ul>
</ul>
<pre>
          localPathListToBlock=/data/path1;/data/path2;/data/path3
</pre>
<ul>
<li>When only some local paths need to be allowed for user access, they can be defined with --with-allowed-paths for configure command or configuration parameter localPathListAllowed in conf/bestman2.rc as following:</li>
<ul>
<li>Multiple paths are separated by semi-colon. Defined paths and their recursive sub-paths will be accessible by clients, and no other paths are accessible by clients.</li>
</ul>
</ul>
<pre>
          localPathListAllowed=/data/path1;/data/path2;/data/path3
</pre>
<h2>Sample Configuration options</h2>
<p>These below examples with the same configuration may not work for your environment. For each option, choose the value that fits your environment.</p>
<ul>
<li>Typical case for gateway mode where default values are used,</li>
</ul>
<pre>
% configure \
--enable-gateway-mode 
</pre>
<ul>
<li>Typical case for full mode where default values are used,</li>
</ul>
<pre>
% configure \
--enable-full-mode \
--with-replica-storage-path=/data/bestman/cache \
--with-replica-storage-size=20000 
</pre>
<ul>
<li>Typical configure example,</li>
</ul>
<pre>
% configure \
--with-globus-tcp-port-range=62001,62999 \
--with-cacert-path=/etc/grid-security/certificates \
--with-certfile-path=/opt/srm/demo/srmcert.pem \
--with-keyfile-path=/opt/srm/demo/srmkey.pem \
--with-eventlog-path=/data2/destman/log \
--with-cachelog-path=/data2/bestman/log
</pre>
<ul>
<li>Another example with specified open ports for BeStMan server,</li>
</ul>
<pre>
% configure \
--with-https-port=8443 \
--with-globus-tcp-port-range=48001,48999 \
--with-cacert-path=/etc/grid-security/certificates \
--with-certfile-path=/opt/srm/demo/srmcert.pem \
--with-keyfile-path=/opt/srm/demo/srmkey.pem \
--with-eventlog-path=/data2/destman/log \
--with-cachelog-path=/data2/bestman/log
</pre>
<ul>
<li>Another example with an external globus location,</li>
</ul>
<pre>
% configure \
--with-globus-tcp-port-range=48001,48999 \
--with-https-port=48443 \
--with-eventlog-path=/data2/bestman/log \
--with-cachelog-path=/data2/bestman/log \
--with-certfile-path=/opt/srm/demo/srmcert.pem \
--with-keyfile-path=/opt/srm/demo/srmkey.pem \
--with-globus-location=/software/globus-4.2.1
</pre>
<ul>
<li>An example with GUMS support for gateway mode,</li>
</ul>
<pre>
% configure \
--with-globus-tcp-port-range=48001,48999 \
--with-https-port=48443 \
--with-eventlog-path=/data2/bestman/log \
--with-cachelog-path=/data2/bestman/log \
--with-certfile-path=/opt/srm/demo/srmcert.pem \
--with-keyfile-path=/opt/srm/demo/srmkey.pem \
--with-globus-location=/software/globus-4.2.1 \
--enable-gums \
--with-gums-url="https://gums-server.lbl.gov:8443/gums/services/GUMSAuthorizationServicePort"
</pre>
<ul>
<li>Another example with GUMS XACML support for gateway mode,</li>
</ul>
<pre>
% configure \
--enable-gateway-mode \
--with-globus-tcp-port-range=48001,48999 \
--with-https-port=48443 \
--with-eventlog-path=/data2/bestman/log \
--with-certfile-path=/etc/grid-security/hostcert.pem \
--with-keyfile-path=/etc/grid-security/hostkey.pem \
--with-globus-location=/software/globus-4.2.1 \
--enable-gums \
--with-gums-url="https://gums-server.lbl.gov:8443/gums/services/GUMSXACMLAuthorizationServicePort"
</pre>
<ul>
<li>An example with pre-allocated space tokens and sudo access to the underlying file system for gateway mode,</li>
</ul>
<pre>
% configure \
--with-https-port=48443 \
--enable-sudofsmng \
--with-tokens-list="data[desc:mydata][10];data2[desc:mydata2][12]"
</pre>
<ul>
<li>An example with access blocked paths and sudo access to the underlying file system for gateway mode,</li>
</ul>
<pre>
% configure \
--with-https-port=48443 \
--enable-sudofsmng \
--with-blocked-paths=î/projects/blocked;/projects2/blocked2î \
--with-tokens-list="data[desc:mydata][10];data2[desc:mydata2][12]"
</pre>
<ul>
<li>An example with allowed paths and sudo access to the underlying file system for gateway mode,</li>
</ul>
<pre>
% configure \
--with-https-port=48443 \
--enable-sudofsmng \
--with-aloowed-paths=î/projects/data;/projects2/data2î \
--with-tokens-list="data[desc:mydata][10];data2[desc:mydata2][12]"
</pre>
<ul>
<li>An example with extended static token information, allowed paths and sudo access to the underlying file system for gateway mode,</li>
</ul>
<pre>
% configure \
--enable-gateway-mode \
--with-globus-tcp-port-range=48001,48999 \
--with-https-port=48443 \
--with-eventlog-path=/data2/bestman/log \
--enable-sudofsmng \
--with-blocked-paths=î/projects/blocked;/projects2/blocked2î \
--with-tokens-list="DT1[desc:DT1][owner:exprt][retention:REPLICA][latency:ONLINE][path:/data][12]"
</pre>
<ul>
<li>An example with event log controls,</li>
</ul>
<pre>
% configure \
--enable-gateway-mode \
--with-globus-tcp-port-range=48001,48999 \
--with-https-port=48443 \
--with-eventlog-path=/data2/bestman/log \
--with-eventlog-size=500000000 \
--with-eventlog-num=10 \
--enable-sudofsmng \
--with-blocked-paths=î/projects/blocked;/projects2/blocked2î \
--with-tokens-list="DT1[desc:DT1][owner:exprt][retention:REPLICA][latency:ONLINE][path:/data][12]"
</pre>
<ul>
<li>An example with jetty server controls,</li>
</ul>
<pre>
% configure \
--enable-gateway-mode \
--with-connector-queue-size=512 \
--with-connection-acceptor-thread-size=8 \
--with-max-container-threads=2048 \
--with-max-java-heap=4096 \
--with-globus-tcp-port-range=48001,48999 \
--with-https-port=48443 \
--with-eventlog-path=/data2/bestman/log \
--with-eventlog-size=500000000 \
--with-eventlog-num=10 \
--enable-sudofsmng \
--enable-sudols \
--with-allowed-paths=î/projects/data/allowed;/projects2/mnt/data/allowed2î \
--with-tokens-list="DT1[desc:DT1][owner:exprt][retention:REPLICA][latency:ONLINE][path:/data][12]" \
--enable-gums \
--with-gums-url="https://gums-server.lbl.gov:8443/gums/services/GUMSXACMLAuthorizationServicePort"
</pre>
<h2>Configure options</h2>
<h3>Required options for full management mode</h3>
<tr>
<th>--enable-full-mode</th>
<th>Enable BeStMan in Full mode (default=no)</th>
</tr>
<tr>
<td>--with-replica-storage-path=&lt;PATH&gt;</td>
<td>Replica Quality Storage directory path</td>
</tr>
<tr>
<td>--with-replica-storage-size=&lt;INT&gt;</td>
<td>Replica Quality Storage size in MB</td>
</tr>
</table>
<h3>Other options for both full management mode and gateway mode</h3>
<table>
<tr>
<th>--with-srm-home=&lt;PATH&gt;</th>
<th>Installation path for BeStMan2. If not given, it will be guessed based on the current working directory.</th>
</tr>
<tr>
<td>--enable-serveronly</td>
<td>Installation for BeStMan server only (default=no). By default, all server, client and tester are installed.</td>
</tr>
<tr>
<td>--enable-clientonly</td>
<td>Installation for SRM clients only (default=no). By default, all server, client and tester are installed.</td>
</tr>
<tr>
<td>--enable-testeronly</td>
<td>Installation for SRM tester only (default=no). By default, all server, client and tester are installed.</td>
</tr>
<tr>
<td>--enable-verbose</td>
<td>Print output to the standard output during the configuration</td>
</tr>
<tr>
<td>--enable-backup</td>
<td>Enable backup before running a new configuration if there is a previous configuration (default=no)</td>
</tr>
<tr>
<td>--enable-checksum-listing</td>
<td>Enable checksum returns in file browsing (default=no)</td>
</tr>
<tr>
<td>--enable-debug-jetty</td>
<td>Enable debugging Jetty requests (default=no).</td>
</tr>
<tr>
<td>--enable-eventlog</td>
<td>Enable event logging (default=yes). When disabled, there is no logging performed.</td>
</tr>
<tr>
<td>--enable-gsiftpfsmng</td>
<td>Enable GridFTP access for local MKDIR, RMDIR, RM, MV, CP and LS to the user managed spaces (default=no)</td>
</tr>
<tr>
<td>--enable-gums</td>
<td>Enable GUMS interface (default=no)</td>
</tr>
<tr>
<td>--enable-java-version-check</td>
<td>Enable java version check (default=yes). It checks if java version is 1.6.0_01 or higher.</td>
</tr>
<tr>
<td>--enable-sudofsmng</td>
<td>Enable SUDO access for local MKDIR, RMDIR, RM, MV and CP to the user managed spaces (default=no)</td>
</tr>
<tr>
<td>--enable-sudols</td>
<td>Enable SUDO access for local LS to the user managed spaces (default=no)</td>
</tr>
<tr>
<td>--enable-voms-validation</td>
<td>Enable VOMS validation (default=no)</td>
</tr>
<tr>
<td>--with-allowed-paths=&lt;PATH&gt;</td>
<td>Specify accessible paths only (separated by semi-colon)</td>
</tr>
<tr>
<td>--with-backup-tag=&lt;STRING&gt;</td>
<td>Specify the tag for backups during configure</td>
</tr>
<tr>
<td>--with-blocked-paths=&lt;PATH&gt;</td>
<td>Specify Non-accessible paths (in addition to /;/etc;/var). Multiple entries are separated by semi-colon.</td>
</tr>
<tr>
<td>--with-cacert-path=&lt;PATH&gt;</td>
<td>Specify the Grid CA Certificate directory path (default=/etc/grid-security/certificates)</td>
</tr>
<tr>
<td>--with-cached-id-lifetime=&lt;INT&gt;</td>
<td>Specify the lifetime of cached id mapping in seconds (default=1800)</td>
</tr>
<tr>
<td>--with-certfile-path=&lt;PATH&gt;</td>
<td>Specify the Grid Certificate file path (default=/etc/grid-security/hostcert.pem)</td>
</tr>
<tr>
<td>--with-checksum-callout=&lt;PATH&gt;</td>
<td>Specify path for checksum call-out command</td>
</tr>
<tr>
<td>--with-checksum-type=&lt;STRING&gt;</td>
<td>Specify the checksum type (default=adler32) from adler32, md5, crc32</td>
</tr>
<tr>
<td>--with-concurrent-fs=&lt;INT&gt;</td>
<td>Specify the number of concurrent file system involved operations processing</td>
</tr>
<tr>
<td>--with-connector-queue-size=&lt;INT&gt;</td>
<td>Specify the size of the Jetty http connector queue size</td>
</tr>
<tr>
<td>--with-connection-acceptor-thread-size=&lt;INT&gt;</td>
<td>Specify the number of acceptor threads available for the Jetty server's channel connector</td>
</tr>
<tr>
<td>--with-eventlog-level=&lt;STRING&gt;</td>
<td>Specify the event log level (default=INFO) from INFO and DEBUG</td>
</tr>
<tr>
<td>--with-eventlog-num=&lt;INT&gt;</td>
<td>Specify the maximum total number of event log files</td>
</tr>
<tr>
<td>--with-eventlog-path=&lt;PATH&gt;</td>
<td>Specify the event log file directory path (default=/var/log)</td>
</tr>
<tr>
<td>--with-eventlog-size=&lt;INT&gt;</td>
<td>Specify the maximum size of event log files in bytes</td>
</tr>
<tr>
<td>--with-extra-libs=&lt;PATH&gt;</td>
<td>Specify the extra libraries definitions</td>
</tr>
<tr>
<td>--with-globus-tcp-port-range=&lt;VALUES&gt;</td>
<td>Specify the GLOBUS_TCP_PORT_RANGE when firewall is enabled. E.g. 62001,62999</td>
</tr>
<tr>
<td>--with-globus-tcp-source-range=&lt;VALUES&gt;</td>
<td>Specify the GLOBUS_TCP_SOURCE_RANGE when necessary</td>
</tr>
<tr>
<td>--with-gridmap-path=&lt;PATH&gt;</td>
<td>Specify the grid-mapfile path (default=/etc/grid-security/grid-mapfile)</td>
</tr>
<tr>
<td>--with-gums-certfile-path=&lt;PATH&gt;</td>
<td>Specify the GUMS client Grid Certificate file path (default=same as &ndash;with-certfile-path)</td>
</tr>
<tr>
<td>--with-gums-dn=&lt;DN&gt;</td>
<td>Specify the GUMS client service DN that GUMS server would recognize (default=SRM service DN)</td>
</tr>
<tr>
<td>--with-gums-keyfile-path=&lt;PATH&gt;</td>
<td>Specify the GUMS client Grid Certificate Key file path (default=same as &ndash;with-keyfile-path)</td>
</tr>
<tr>
<td>--with-gums-proxyfile-path=&lt;PATH&gt;</td>
<td>Specify the GUMS client Grid proxy file path</td>
</tr>
<tr>
<td>--with-gums-url=&lt;URL&gt;</td>
<td>Specify GUMS server service URL with service handle</td>
</tr>
<tr>
<td>--with-https-port=&lt;PORT&gt;</td>
<td>Specify the https port (default=8443)</td>
</tr>
<tr>
<td>--with-java-home=&lt;PATH&gt;</td>
<td>Specify the JAVA_HOME directory</td>
</tr>
<tr>
<td>--with-keyfile-path=&lt;PATH&gt;</td>
<td>Specify the Grid Certificate Key file path (default=/etc/grid-security/hostkey.pem)</td>
</tr>
<tr>
<td>--with-max-container-threads=&lt;INT&gt;</td>
<td>Specify the max thread pool size for the web service container (default=256)</td>
</tr>
<tr>
<td>--with-max-java-heap=&lt;INT&gt;</td>
<td>Specify the max java heap size in MB (default=1024)</td>
</tr>
<tr>
<td>--with-min-container-threads=&lt;INT&gt;</td>
<td>Specify the min thread pool size for the web service container (default=10)</td>
</tr>
<tr>
<td>--with-min-java-heap=&lt;INT&gt;</td>
<td>Specify the min java heap size in MB (default=32)</td>
</tr>
<tr>
<td>--with-plugin-path=&lt;PATH&gt;</td>
<td>Specify the plug-in library directory path when supported</td>
</tr>
<tr>
<td>--with-protocol-selection-policy=&lt;STRING&gt;</td>
<td>Specify the definition of transfer protocol selection policy</td>
</tr>
<tr>
<td>--with-proxyfile-path=&lt;PATH&gt;</td>
<td>Specify the Grid proxy file path</td>
</tr>
<tr>
<td>--with-srm-owner=&lt;LOGIN&gt;</td>
<td>Specify the BeStMan SRM server process owner (default=root)</td>
</tr>
<tr>
<td>--with-tokens-list=<STRING></td>
<td>Specify pre-allocated static space tokens list with their sizes when supported.<br />Format: token_name[KEY:VALUE][size_in_GB] <br /> KEY = desc, owner, retention, latency, path, usedBytesCommand <br /> retention avail values = REPLICA, OUTPUT, CUSTODIAL <br /> latency avail values = ONLINE, NEARLINE <br /> usedBytesCommand = e.g. some custom script or "du -s -b". <br /> Its output must have the available bytes as the first value.</td>
</tr>
<tr>
<td>--with-transfer-servers=&lt;STRING&gt;</td>
<td>Specify supported file transfer servers</td>
</tr>
<tr>
<td>--with-user-space-key=&lt;STRING&gt;</td>
<td>Specify user space keys format: (key1=/path1)(key2=/path2)</td>
</tr>
<tr>
<td>--with-vomsdir-path=&lt;PATH&gt;</td>
<td>Specify the VOMS directory path</td>
</tr>
</table>
<h3>Other options for gateway mode only</h3>
<table>
<tr>
<th>--enable-checkfile-fs</th>
<th>Enable use of file system to check file size (default=yes)</th>
</tr>
<tr>
<td>--enable-checkfile-gsiftp</td>
<td>Enable use of GridFTP to check file size (default=no). This option may not work with LCG-utils because of delegation issues.</td>
</tr>
<tr>
<td>--enable-gateway-mode</td>
<td>Enable BeStMan in gateway mode (default=yes). Gateway mode provides an SRM interface to any existing file system with faster request handling performance. There will be no management for space or queuing.</td>
</tr>
<tr>
<td>--enable-pathfortoken</td>
<td>Enable PathForToken mode (default=yes)</td>
</tr>
</table>
<h3>Other options for full mode only</h3>
<table>
<tr>
<th>--with-cachelog-path=&lt;PATH&gt;</th>
<th>Specify the CacheLogFile directory path (default=/var/log)</th>
</tr>
<tr>
<td>--with-concurrency=&lt;INT&gt;</td>
<td>Specify the number of concurrent requests (default=40)</td>
</tr>
<tr>
<td>--with-concurrent-filetransfer=&lt;INT&gt;</td>
<td>Specify the number of concurrent file transfers (default=10)</td>
</tr>
<tr>
<td>--with-custodial-storage-path=&lt;PATH&gt;</td>
<td>Specify the CustodialQualityStorage directory path</td>
</tr>
<tr>
<td>--with-custodial-storage-size=&lt;INT&gt;</td>
<td>Specify the CustodialQualityStorage Size in MB</td>
</tr>
<tr>
<td>--with-default-filesize=&lt;INT&gt;</td>
<td>Specify the default file size in MB (default=500)</td>
</tr>
<tr>
<td>--with-default-space-size=&lt;INT&gt;</td>
<td>Specify the default size for space reservation in MB (default=1000)</td>
</tr>
<tr>
<td>--with-globus-location=&lt;PATH&gt;</td>
<td>Specify the GLOBUS_LOCATION path</td>
</tr>
<tr>
<td>--with-gridftp-buffersize=&lt;INT&gt;</td>
<td>Specify the gridftp buffer size in bytes (default=1048576)</td>
</tr>
<tr>
<td>--with-gridftp-parallel-streams=&lt;INT&gt;</td>
<td>Specify the number of gridftp parallel streams (default=2)</td>
</tr>
<tr>
<td>--with-inactive-transfer-timeout=&lt;INT&gt;</td>
<td>Specify the default time out value for inactive user file transfer in seconds (default=300)</td>
</tr>
<tr>
<td>--with-max-filerequests=&lt;INT&gt;</td>
<td>Specify the maximum number of active file requests (default=1000000)</td>
</tr>
<tr>
<td>--with-max-mss-connection=&lt;INT&gt;</td>
<td>Specify the maximum MSS file transfers when supported (default=5)</td>
</tr>
<tr>
<td>--with-max-users=&lt;INT&gt;</td>
<td>Specify the maximum number of active users (default=100)</td>
</tr>
<tr>
<td>--with-mss-timeout=&lt;INT&gt;</td>
<td>Specify the MSS connection timeout in seconds when supported (default=600)</td>
</tr>
<tr>
<td>--with-output-storage-path=&lt;PATH&gt;</td>
<td>Specify the OutputQualityStorage directory path</td>
</tr>
<tr>
<td>--with-output-storage-size=&lt;INT&gt;</td>
<td>Specify the OutputQualityStorage Size in MB</td>
</tr>
<tr>
<td>--with-public-space-proportion=&lt;INT&gt;</td>
<td>Specify default size for SRM owned volatile space in percentage (default=80)</td>
</tr>
<tr>
<td>--with-public-space-size=&lt;INT&gt;</td>
<td>Specify the default size for SRM owned volatile space in MB</td>
</tr>
<tr>
<td>--with-space-file-lifetime=&lt;INT&gt;</td>
<td>Specify the default lifetime of files in public space in seconds (default=1800)</td>
</tr>
<tr>
<td>--with-volatile-file-lifetime=&lt;INT&gt;</td>
<td>Specify the default lifetime of volatile files in seconds (default=1800)</td>
</tr>
</table>
<h2>Configuration file</h2>
<p>Upon successful configuration, bestman2/conf/bestman2.rc would be created. Each entry has the following meaning, and it's for both gateway mode and full mode unless noted otherwise.</p>
<h3>Related to the server connection and logging</h3>
<p>These entries have the default values when configured.</p>
<table>
<tr>
<th>CacheLogLocation</th>
<th><ul><li>Path for cache event log for full mode.</li><li>Default=/var/log/cache.bestman.log.</li><li>This can be either specific file path or directory path.</li><li>When useBerkeleyDB is true (by default), DB files are written in /var/log by default. If CacheLogLocation is defined when useBerkeleyDB is defined as true, CacheLogLocation must be a directory path. </li></ul></th>
</tr>
<tr>
<td>^</td>
<td>e.g. CacheLogLocation=/tmp/bestman/cache.bestman.log<br />e.g. CacheLogLocation=/tmp/bestman</td>
</tr>
<tr>
<td>CertFileName</td>
<td><ul><li>Grid service certifiticate file path</li><li>When the entry is missing, server will try to use the user grid proxy, and make a prompt for the proxy password every time.</li><li>Those cert/key files must be readable by the BeStMan process owner. </li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. CertFileName=/etc/grid-security/hostcert.pem</td>
</tr>
<tr>
<td>EventLogLocation</td>
<td><ul><li>Path for service event log.</li><li>This can be either specific file path or directory path.</li><li>Default=/var/log/event.bestman.log </li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. EventLogLocation=/tmp/bestman/event.bestman.log<br />e.g. EventLogLocation=/tmp/bestman</td>
</tr>
<tr>
<td>FactoryID</td>
<td><ul><li>FactoryID is for web service end point.</li><li>Recommended to be &ldquo;server&rdquo;.</li><li>The service end point will be srm://hostname.domain:secure_port/srm/v2/FactoryID</li><li>When this has different name than &ldquo;server&rdquo;, server-config.wsdd file needs to be updated too. </li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. FactoryID=server</td>
</tr>
<tr>
<td>GridMapFileName</td>
<td><ul><li>Provide GridMapFileName if it is not in the default location, /etc/grid-security/grid-mapfile </li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. GridMapFileName=/etc/grid-security/grid-mapfile</td>
</tr>
<tr>
<td>KeyFileName</td>
<td><ul><li>Grid service certifiticate Key file path </li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. KeyFileName=/etc/grid-security/hostkey.pem</td>
</tr>
<tr>
<td>noCacheLog</td>
<td><ul><li>When enabled, no cache log is written.</li><li>Default=false</li><li>For gateway mode, this option must be true. </li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. noCacheLog=true</td>
</tr>
<tr>
<td>noEventLog</td>
<td><ul><li>When enabled, no event log is written.</li><li>Default=false </li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. noEventLog=true</td>
</tr>
<tr>
<td>protocol</td>
<td><ul><li>Protocol for service endpoint.</li><li>This is fixed for httpg in SRM v2.2. </li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. protocol=httpg</td>
</tr>
<tr>
<td>ProxyFileName</td>
<td><ul><li>Grid proxy file path</li><li>If provided, proxy will take priority than cert/key files.</li><li>When user proxy is used, only the particular user may access the BeStMan server. </li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. ProxyFileName=/tmp/proxyFile</td>
</tr>
<tr>
<td>securePort</td>
<td><ul><li>Secure ports for SRM service endpoint.</li><li>These ports must be open for firewall</li><li>The service end point will be: srm://hostname.domain:securePort/srm/v2/FactoryID</li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. securePort=8443</td>
</tr>
<tr>
<td>useBerkeleyDB</td>
<td><ul><li>use of Berkeley DB for full mode as an internal management component.</li><li>Default=true.</li><li>When it&rsquo;s false, text file based CacheLogLocation will be used. </li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. useBerkeleyDB=true</td>
</tr>
</table>
<h3>Related to the server control</h3>
<p>These entries have the default values when configured.</p>
<table>
<tr>
<th>accessFileSysViaGsiftp</th>
<th><ul><li>Allows BeStMan access file system through gsiftp on behalf of the user, upon user request</li><li>Default=false</li><li>When both accessFileSysViaGsiftp and accessFileSysViaSudo are defined, accessFileSysViaGsiftp takes priority.</li><li>This may not work with LCG-utils because of the delegation issues.</li></ul></th>
</tr>
<tr>
<td>^</td>
<td>e.g. accessFileSysViaGsiftp=true</td>
</tr>
<tr>
<td>accessFileSysViaSudo</td>
<td><ul><li>Allows BeStMan access file system through sudo on behalf of the user, upon user request</li><li>Default=false</li><li>This option is recommended when BeStMan is used to provide SRM interface to user defined storage space.</li><li>/etc/sudoers must be modified for BeStMan running under other than root</li><li>e.g. Recommended modification on the /etc/sudoers when BeStMan runs under daemon<br /> Cmnd_Alias SRM_CMD = /bin/rm, /bin/mkdir, /bin/rmdir, /bin/mv, /bin/ls, /bin/cp<br /> Runas_Alias SRM_USR = ALL, root<br /> daemon ALL=(SRM_USR) NOPASSWD: SRM_CMD </li><li>Note: Some OS systems such as Fedora Core and RHEL5 may require additional entry in the /etc/sudoers for tty access. Some Redhat-like and Ubuntu/Debian distribution do not require this entry.<br /> Defaults requiretty </li><li>When both accessFileSysViaGsiftp and accessFileSysViaSudo are defined, accessFileSysViaGsiftp takes priority.</li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. accessFileSysViaSudo=true</td>
</tr>
<tr>
<td>Concurrency</td>
<td><ul><li>Number of file requests that BeStMan server processes at a time. Beyond the limit, file requests will wait on the queue for any of the completed requests</li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. Concurrency=20</td>
</tr>
<tr>
<td>DefaultFileSizeMB</td>
<td><ul><li>Default file size in MB (default=1/10 of cache size)</li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. DefaultFileSizeMB =1000</td>
</tr>
<tr>
<td>DefaultMBPerToken</td>
<td><ul><li>Default space reservation size when user requests without specific size info, in MB</li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. DefaultMBPerToken=1000</td>
</tr>
<tr>
<td>DefaultVolatileFileLifeTimeInSeconds</td>
<td><ul><li>Default lifetime of volatile files in seconds </li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. DefaultVolatileFileLifeTimeInSeconds=1800</td>
</tr>
<tr>
<td>disableDirectoryMgt</td>
<td><ul><li>Disable directory management</li><li>Default=false</li><li>All directory related functions is not supported when it is set to true. E.g. srmMkdir, srmRmdir, srmLs</li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. disableDirectoryMgt=true</td>
</tr>
<tr>
<td>disableLocalAuthorization</td>
<td><ul><li>Disable SRM Permission functions</li><li>Default=true</li><li>All permission related functions is not supported when it is set to true. E.g. srmSetPermission</li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. disableLocalAuthorization=false</td>
</tr>
<tr>
<td>disableSpaceMgt</td>
<td><ul><li>Disable space management</li><li>Default=false</li><li>All space related functions are not supported when it is set to true. E.g. srmReserveSpace</li><li>Gateway mode must have it true</li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. disableSpaceMgt=true</td>
</tr>
<tr>
<td>disableSrmCopy</td>
<td><ul><li>Disable SRM remote copy function</li><li>Default=false</li><li>srmCopy function is not supported when it is set to true.</li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. disableSrmCopy=true</td>
</tr>
<tr>
<td>GridFTPBufferSizeBytes</td>
<td><ul><li>Buffer size of the gridftp file transfer in bytes</li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. GridFTPBufferSizeBytes=2097152</td>
</tr>
<tr>
<td>GridFTPBufferSizeMB</td>
<td><ul><li>Buffer size of the gridftp file transfer in MB.</li><li>GridFTPBufferSizeMB takes priority from GridFTPBufferSizeBytes when both are defined</li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. GridFTPBufferSizeMB=2</td>
</tr>
<tr>
<td>GridFTPDcauOn</td>
<td><ul><li>Enable DCAU for GridFTP (Default: true)</li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. GridFTPDcauOn=true</td>
</tr>
<tr>
<td>GridFTPNumStreams</td>
<td><ul><li>Number of parallel streams per gridftp file transfer</li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. GridFTPNumStreams=2</td>
</tr>
<tr>
<td>guc_path</td>
<td><ul><li>Sets the path to the globus-url-copy to be used in gsiftp file transfers, rather than gsiftp client lib calls when defined.</li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. guc_path=/sandbox/globus/bin/globus-url-copy</td>
</tr>
<tr>
<td>GUMSCurrHostDN</td>
<td><ul><li>GUMS client service dn</li><li>This DN is provided to GUMS server so that it can decide which mapping group the calling client (bestman) is in.</li><li>When not provided, server extracts DN information from the service certificate.</li><li>This DN takes priority than &ndash;with-gums-certfile-path and &ndash;with-gums-keyfile-path.</li><li>Default=/DC=org/&hellip;/CN hostname</li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. GUMSCurrHostDN=/DC=org/DC=doegrids/OU=Services/CN=gums-client.lbl.gov</td>
</tr>
<tr>
<td>GUMSserviceURL</td>
<td><ul><li>GUMS server service endpoint</li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. GUMSserviceURL= https://gumsserver.lbl.gov:8443/gums/services/GUMSAuthorizationServicePort <br>  GUMSserviceURL= https://gumsserver.lbl.gov:8443/gums/services/GUMSXACMLAuthorizationServicePort</td>
</tr>
<tr>
<td>InactiveTxfTimeOutInSeconds</td>
<td><ul><li>Default time out value for inactive user file transfer in case user puts a file into the BeStMan cache, in seconds</li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. InactiveTxfTimeOutInSeconds=900</td>
</tr>
<tr>
<td>localPathListAllowed</td>
<td><ul><li>Allowed list of the local directory path for user access</li><li>Any definition will include the default block list</li><li>If a path is listed both on blocked and allowed list, blocked takes priority.</li><li>Multiple entries are separated by semi-colon</li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. localPathListAllowed=/home/data;/data/public</td>
</tr>
<tr>
<td>localPathListToBlock</td>
<td><ul><li>Blocked list of the local directory path for user access</li><li>Default=/;/etc/;/var</li><li>Any definition will include the default block list</li><li>Multiple entries are separated by semi-colon</li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. localPathListToBlock=/home/secret;/data/secret2</td>
</tr>
<tr>
<td>markupPingMsg</td>
<td><ul><li>When set to true, some of the extra information from srmPing do not get returned to the client.</li><li>Default=false</li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. markupPingMsg=true</td>
</tr>
<tr>
<td>MaxConcurrentFileTransfer</td>
<td><ul><li>Maximum concurrent file transfers</li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. MaxConcurrentFileTransfer=10</td>
</tr>
<tr>
<td>MaxNumberOfFileRequests</td>
<td><ul><li>Number of active and queued file requests limit for full mode. Beyond the limit, the request will get SRM_FAILURE with explanations</li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e .g. MaxNumberOfFileRequests =1000000</td>
</tr>
<tr>
<td>MaxNumberOfUsers</td>
<td><ul><li>Number of active users limit for full mode. Beyond the limit, the request will get SRM_FAILURE with explanations</li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e .g. MaxNumberOfUsers=100</td>
</tr>
<tr>
<td>noSudoOnLs</td>
<td><ul><li>When false, Allows BeStMan access file system for ls through sudo on behalf of the user, upon user request</li><li>Default=true</li><li>To have this option effective, accessFileSysViaSudo must be true.</li><li>This option is recommended when BeStMan is used to provide SRM interface to user defined storage space</li><li>/etc/sudoers must be modified for BeStMan running under other than root</li><li>Recommended modification on the /etc/sudoers when BeStMan runs under daemon<br /> Cmnd_Alias SRM_CMD = /bin/rm, /bin/mkdir, /bin/rmdir, /bin/mv, /bin/ls, /bin/cp<br /> Runas_Alias SRM_USR = ALL, root<br /> daemon ALL=(SRM_USR) NOPASSWD: SRM_CMD</li><li>Some OS systems such as Fedora Core and RHEL5 may require additional entry in the /etc/sudoers for tty access. Some Redhat-like and Ubuntu/Debian distribution do not require this entry.<br /> Defaults requiretty</li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. noSudoOnLs=true</td>
</tr>
<tr>
<td>protocolSelectionPolicy</td>
<td><ul><li>Custom policy for transfer protocol selection.</li><li>Default is round robin.</li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e .g. protocolSelectionPolicy=class=edu.unl.rcf.BestmanGridftpSelector.BestmanGridftp&jarFile=UNLGangliaBestman.jar&name=gsiftp</td>
</tr>
<tr>
<td>PublicSpaceInMB</td>
<td><ul><li>Size of the BeStMan owned public volatile storage space in MB</li><li>When both PublicSpaceProportion and PublicSpaceInMB are defined, PublicSpaceInMB takes priority and is effective.</li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. PublicSpaceInMB=1000</td>
</tr>
<tr>
<td>PublicSpaceProportion</td>
<td><ul><li>Size of the BeStMan owned public volatile storage space in percentage</li><li>When both PublicSpaceProportion and PublicSpaceInMB are defined, PublicSpaceInMB takes priority and is effective.</li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. PublicSpaceProportion=80</td>
</tr>
<tr>
<td>PublicTokenMaxFileLifetimeInSeconds</td>
<td><ul><li>Max file lifetime that can be granted in the unreserved "public" storage space</li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. PublicTokenMaxFileLifetimeInSeconds=600</td>
</tr>
<tr>
<td>PublicTokenMaxMBPerUser</td>
<td><ul><li>Max file size in the unreserved "public" storage space per user</li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. PublicTokenMaxMBPerUser=300</td>
</tr>
<tr>
<td>PublicTokenMaxNumFilesPerUser</td>
<td><ul><li>Max number of files in the unreserved "public" storage space per user</li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. PublicTokenMaxNumFilesPerUser =100</td>
</tr>
<tr>
<td>ReplicaQualityStorageUserQuotaMB</td>
<td><ul><li>User quota for reserving replica quality storage, in MB</li><li>Default=no limit</li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. ReplicaQualityStorageUserQuotaMB=1000</td>
</tr>
<tr>
<td>retryGsiftp</td>
<td><ul><li>Retry options for BeStMan initiated file transfers.</li><li>Value is specified as (seconds/maxRetry)</li><li>Default is 120 seconds apart between each retry, and maximum 2 retries of failed gsiftps.</li><li>If maxRetry value ismissing, the default is assumed to be 2.</li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. retryGsiftp=120/2<br />e.g. retryGsiftp=200</td>
</tr>
<tr>
<td>silent</td>
<td><ul><li>When set to true, minimum output will be displayed on the console (default = false)</li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. silent=true</td>
</tr>
<tr>
<td>srmcacheKeywordOn</td>
<td><ul><li>If set to true, then &ldquo;srmcache&rdquo; is a required prefix to refer to the srm cache files.</li><li>For example, to refer to a file &ldquo;myfile&rdquo; owned by &ldquo;uid&rdquo; in srm, it needs to be look like srm://host:port/srm/v2/server?SFN=/srmcache/uid/myfile.</li><li>While without using /srmcache, the surl srm://host:port/srm/v2/server?SFN=/tmp/myfile will refer to the file /tmp/myfile on the local disk that runs the srm server.</li><li>Server default is false</li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. srmcacheKeywordOn=true</td>
</tr>
<tr>
<td>supportedProtocolList</td>
<td><ul><li>List of the supported file transfer protocol list.</li><li>Use &ldquo;;&rdquo; to separate multiple entries</li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. supportedProtocolList= gsiftp://machA.domain/;gsiftp://machB.domain:2812/;ftp://machC.domain/;http://machD.domain:9123/</td>
</tr>
<tr>
<td>uploadQueueParameter</td>
<td><ul><li>Sets a balance between read and write of the file transfers.</li><li>When not set, all files transfers use one queue.</li><li>FORMAT: N[:M] where N is number of threads for the queue and M is number of file transfers allowed for the queue</li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. uploadQueueParameter=40:10</td>
</tr>
<tr>
<td>userSpaceKeywords</td>
<td><ul><li>Allows pre-defined space tokens. BeStMan does not manage these spaces, but provides access to users through SRM interface.</li><li>Format is (spacetoken1=/dirpath1)(spacetoken2=/dirpath2)</li><li>When these re-defined space tokens are used in a request, the SFN should not include the full path.</li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. refer to 7.10 userSpaceKeywords=(SPT1=/data/dirpath1)(SPT2=/data2/dirpath2)(SPT3=/data3/dirpath3)</td>
</tr>
<tr>
<td>WorldPermission</td>
<td><ul><li>File readable permission in BeStMan cache.</li><li>By default, all files are accessible (read-only) by others.</li><li>It can be disabled by setting this to &ldquo;None&rdquo;, and no one other than the owners can read their files.</li><li>Other options are R, W, or None.</li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. WorldPermission=None</td>
</tr>
</table>
<h3>Related to the gateway mode only</h3>
<p>These entries would only be effective, when gateway mode is enabled.</p>
<table>
<tr>
<th>pathForToken</th>
<th><ul><li>Gateway mode supports a path defined as a space token.</li><li>When this option is defined as true, BeStMan server checks the available space in this path for the expected file size.</li><li>When this option is defined as true, the TURL becomes a combination of space token and SFN. E.g. when space token is /data/scratch1 and SFN is /mydir/myfile, the TURL becomes, when /data/scracth1 has enough space for the file, gsiftp://hostname//data/scrach1/mydir/myfile. </li></ul></th>
</tr>
<tr>
<td>^</td>
<td>e.g. pathForToken=true</td>
</tr>
<tr>
<td>staticTokenList</td>
<td><ul><li>Specifies pre-allocated space tokens with their size info</li><li>Format is token_name[KEY:VALUE][token_size_inGB]<br /> KEY = desc, owner, retention, latency, path, usedBytesCommand<br />a keyword cannot be changed.<br />retention available values = REPLICA, OUTPUT, CUSTODIAL<br />latency available values = ONLINE, NEARLINE<br />usedBytesCommand = e.g. some custom script or "du -s -b".<br />Its output must have the available bytes as the first value</li><li>Multiple tokens are separated by semi-colon</li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. staticTokenList=mytoken[desc:my_tokendesc][12];mytoken2[desc:my_tokendesc2][34]<br />e.g. staticTokenList=DATA1[desc:DATA1][owner:projects][retention:REPLICA][latency:ONLINE][path:/projects/data/][usedBytesCommand:/usr/bin/du -s -b][12]</td>
</tr>
<tr>
<td>checkSizeWithFS</td>
<td><ul><li>Enables file size browsing through file system</li><li>Default=true</li><li>When both checkSizeWithFS and checkSizeWithGsiftp are defined to be true, checkSizeWithFS takes priority.</li><li>When both checkSizeWithFS and checkSizeWithGsiftp are defined to be false, file size browsing such as srmLs would fail. </li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. checkSizeWithFS=true</td>
</tr>
<tr>
<td>checkSizeWithGsiftp</td>
<td><ul><li>Enables file size browsing through gridftp server</li><li>Default=false</li><li>When both checkSizeWithFS and checkSizeWithGsiftp are defined to be true, checkSizeWithFS takes priority.</li><li>When both checkSizeWithFS and checkSizeWithGsiftp are defined to be false, file size browsing such as srmLs would fail.</li><li>This may not work with LCG-utils because of the delegation issues. </li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. checkSizeWithGsiftp=false</td>
</tr>
</table>
<h3>Related to the Quality of the Storage</h3>
<table>
<tr>
<th>ReplicaQualityStorageMB</th>
<th><ul><li>Replica Quality Storage Size and Path </li><li>For more than one path, use ";" to seperate them on one line. </li><li>Size information is specified in "[###]" before the path where "###" is the value of the size in MB.</li><li>Replica quality has the highest probability of loss such as disks, but is appropriate for data that can be replaced because other copies can be accessed from somewhere.</li></ul></th>
</tr>
<tr>
<td>^</td>
<td>e.g. ReplicaQualityStorageMB=[5100]path=/bestman/cache<br /> ReplicaQualityStorageMB=[300]path=/bestman/cache;[200]path=/bestman2/cache</td>
</tr>
<tr>
<td>OutputQualityStorageMB</td>
<td><ul><li>Output Quality Storage Size and Path </li><li>For more than one path, use ";" to seperate them on one line.</li><li>Size information is specified in "[###]" before the path where "###" is the value of the size in MB.</li><li>Output quality is an intermediate level and refers to the data which can be replaced by lengthy or effort-full processes.</li><li>Note: We currently do not support OutputQualityStorage</li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. OutputQualityStorageMB=[2000]path=/bestman/cached</td>
</tr>
<tr>
<td>CustodialQualityStorageMB</td>
<td><ul><li>Custodial Quality Storage (e.g. disk spaces for permanent files)</li><li>For more than one path, use ";" to seperate them on one line. </li><li>Size information is specified in "[###]" before the path where "###" is the value of the size in MB.</li><li>Custodial quality provides low probability of loss such as tapes.</li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. CustodialQualityStorageMB=[1000]path=/bestman/pcache <br /> CustodialQualityStorageMB=[200]path=/bestman/cache/p;[200]path=/bestman2/cache</td>
</tr>
<tr>
<td>^</td>
<td><ul><li>When Custodial Quality Storage supports mass storage system such as HPSS, Zero (0) size indicates indefinite. </li></ul>e.g. For user specified MSS path access <br /> CustodialQualityStorageMB=[0]path=&type=gov.lbl.srm.transfer.mss.hpss.SRM_MSS_HPSS&host=garchive.nersc.gov&conf=hpss.datagrid.rc</td>
</tr>
<tr>
<td>^</td>
<td>e.g. For bestman owned MSS path access: Only when specific path on MSS is used as custodial storage <br /> CustodialQualityStorageMB=[0]path=/nersc/bestman/&type=gov.lbl.srm.transfer.mss.hpss.SRM_MSS_HPSS&host=garchive.nersc.gov&conf=hpss.datagrid.rc</td>
</tr>
<tr>
<td>^</td>
<td>e.g. For other customized MSS plugins <br /> CustodialQualityStorageMB=[0]path=/lstore/bestman&type=plugin.lstore.SRM_MSS_LSTORE&jarFile=lstore.jar&host=lstore.domain.edu&conf=lstore.rc</td>
</tr>
</table>
<h3>Related to the MSS connection</h3>
<p>When backend MSS is supported, these entries would affect the its connection to MSS.</p>
<table>
<tr>
<th>MaxMSSConnections</th>
<th><ul><li>maximum MSS transfers</li><li>Non MSS File Transfers = MaxConcurrentFileTransfer - MaxMSSConnections</li></ul></th>
</tr>
<tr>
<td>^</td>
<td>e.g. MaxMSSConnections=5</td>
</tr>
<tr>
<td>mssTimeOutSeconds</td>
<td><ul><li>MSS connection timeout in seconds</li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. mssTimeOutSeconds=3600</td>
</tr>
<tr>
<td>pluginLib</td>
<td><ul><li>If plugin is provided, then pluginLib needs to be defined for the directory to look for the plugin libraries.</li><li>This is usually for the customized BeStMan for localized MSS.</li><li>Libraries are expected to be jar files for dynamic loading.</li></ul></td>
</tr>
<tr>
<td>^</td>
<td>e.g. pluginLib=/opt/bestman/plugin/lib</td>
</tr>
</table>
<br>

</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>