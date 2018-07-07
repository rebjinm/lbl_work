<!DOCTYPE html>
<html>
<head>
<title>SRMCopy</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<p><a href="https://sdm.lbl.gov/bestman/client">Back to BeStMan Client Tools User's Guide</a></p>
<h1>SRM-COPY: BeStMan SRM-Client Tools User's Guide</h1>
<p>srm-copy requests to copy files to and from SRM, between SRMs, between SRM and other storage repository. Operations include GET, PUT, BringOnline, and COPY.</p>
<h1>Usage</h1>
<ul>
<li>srm-copy &lt;source_url&gt; &lt;target_url&gt; [command line options]</li>
<li>srm-copy &ndash;f &lt;input_file&gt; [command line options]</li>
</ul>
<h1>Options</h1>
<ul>
<li>Command line options take priority from the options from conf file.</li>
<li>Options in the following table are in alphabetical order</li>
</ul>
<table>
<tr>
<th>-3partycopy</th>
<th><ul><li>Issues 3rd party copy between source SRM and target SRM. </li><li>Client will request &ldquo;get&rdquo; to the source SRM, and retrieve the TURL from the source SRM. Client then requests &ldquo;put&rdquo; to the target SRM, and retrieves the TURL for the target SRM. Then client makes the 3rd party gsiftp file transfer from source TURL to target TURL.</li><li>Default=false </li></ul></th>
</tr>
<tr>
<td>-accesslatency &lt;online¶nearline&gt;</td>
<td><ul><li>Specifies access latency</li>&lt;liDefault=online </ul></td>
</tr>
<tr>
<td>-adjustturl</td>
<td><ul><li>Sometimes SRM-returned TURLs need few or more slashes to be a valid URL. When this option is on, it tries to adjust the number of slashes to be a valid URL.</li><li>Default=false </li></ul></td>
</tr>
<tr>
<td>-authid &lt;string&gt;</td>
<td><ul><li>Authorization ID to be used in SRM for the request </li></ul></td>
</tr>
<tr>
<td>-bringonline</td>
<td><ul><li>Sets the request operation for srmBringOnline</li></ul></td>
</tr>
<tr>
<td>-buffersize &lt;int&gt;</td>
<td><ul><li>Specifies gridftp buffer size in bytes</li><li>Default=1MB </li></ul></td>
</tr>
<tr>
<td>-checkdiskspace</td>
<td><ul><li>Checks the availability of the local disk space when retrieving files.</li><li>Default=false </li></ul></td>
</tr>
<tr>
<td>-concurrency &lt;int&gt;</td>
<td><ul><li>Specifies concurrent file transfers.</li><li>Default=1 </li></ul></td>
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
<td>-copy</td>
<td><ul><li>SMakes srmCopy requests explicitly with provided source url and target url</li></ul></td>
</tr>
<tr>
<td>-dcau &lt;true¶false&gt;</td>
<td><ul><li>Specifies DCAU for gsiftp file transfers</li><li>Default=true </li></ul></td>
</tr>
<tr>
<td>-debug</td>
<td><ul><li>Specifies debugging output </li><li>Default=false </li></ul></td>
</tr>
<tr>
<td>-delegation &lt;true¶false&gt;</td>
<td><ul><li>Force proxy delegation.</li><li>When not provided, srm-copy makes no delegation by default, and automatically handles proxy delegation based on the source and target URLs.</li><li>When &ndash;delegation is provided, it forces the user choice. </li></ul></td>
</tr>
<tr>
<td>-direct</td>
<td><ul><li>This option enables direct gsiftp file transfer from the gsiftp source or to the gsiftp target</li><li>This srm-copy does not go through SRM server.</li><li>Default=false </li></ul></td>
</tr>
<tr>
<td>-f &lt;path&gt;</td>
<td><ul><li>Path to the xml input file containing the source url, target url information for requests with more than one file</li><li>Refer to the format and examples below </li></ul></td>
</tr>
<tr>
<td>-filelifetime &lt;int&gt;</td>
<td><ul><li>File (SURL) lifetime in seconds </li></ul></td>
</tr>
<tr>
<td>-filestoragetype &lt;p ¶ d ¶ v&gt;</td>
<td><ul><li>Indicates filestorage type</li><li>p - Permanent, d - Durable, v - Volatile </li></ul></td>
</tr>
<tr>
<td>-gucpath &lt;path&gt; <br>-gurlcopy &lt;path&gt;</td>
<td><ul><li>Specifies path to the globus-url-copy (or its script) </li></ul></td>
</tr>
<tr>
<td>-help</td>
<td><ul><li>Show the help message </li></ul></td>
</tr>
<tr>
<td>-log &lt;path&gt;</td>
<td><ul><li>Specifies path to log file</li><li>Refer to the format and an example below </li></ul></td>
</tr>
<tr>
<td>-maxfilesperrequest &lt;int&gt;</td>
<td><ul><li>maximum file requests per request.</li><li>It divides the files in multiple requests.</li><li>Default is to include all files in one request </li></ul></td>
</tr>
<tr>
<td>-nodownload</td>
<td><ul><li>Not to download the requested files.</li><li>iles have to be retrieved with a direct file transfers. (e.g. globus-url-copy)</li><li>Default=false </li></ul></td>
</tr>
<tr>
<td>-nooverwrite</td>
<td><ul><li>Enables no overwriting to the target.</li><li>Default=false and overwrite always</li></ul></td>
</tr>
<tr>
<td>-noreleasefile</td>
<td><ul><li>Disable releasing file after the get request and file transfer.</li><li>Default=release file</li></ul></td>
</tr>
<tr>
<td>-numlevels &lt;int&gt;</td>
<td><ul><li>Specifies number of directory levels in recursive request.</li><li>Default=0 requesting all levels </li></ul></td>
</tr>
<tr>
<td>-numretry &lt;int&gt;</td>
<td><ul><li>Specifies number of file transfer retries before giving up.</li><li>Default=3</li></ul></td>
</tr>
<tr>
<td>-parallelism &lt;int&gt;</td>
<td><ul><li>Specifies gridftp parallel streams.</li><li>When parallelism is 1, passive file transfer is on by default.</li><li>Default=1</li></ul></td>
</tr>
<tr>
<td>-pinlifetime &lt;int&gt;</td>
<td><ul><li>Pin lifetime in seconds</li></ul></td>
</tr>
<tr>
<td>-protocolslist &lt;string&gt;</td>
<td><ul><li>List of preferred file transfer protocol list separated by comma.</li><li>Default=gsiftp</li><li>e.g. gsiftp,ftp,http,dcap</li></ul></td>
</tr>
<tr>
<td>-proxyfile &lt;path&gt;</td>
<td><ul><li>Path to user grid proxy </li></ul></td>
</tr>
<tr>
<td>-pushmode</td>
<td><ul><li>Issues push mode when srmCopy is done</li><li>Default=pull mode </li></ul></td>
</tr>
<tr>
<td>-quiet</td>
<td><ul><li>Suppress output in the console.</li><li>This option writes the output to the log file.</li><li>Default=false </li></ul></td>
</tr>
<tr>
<td>-recursive</td>
<td><ul><li>Allows recursive GET from source url and/or PUT to target url </li></ul></td>
</tr>
<tr>
<td>-releasespace</td>
<td><ul><li>Releases the space upon completion of the request</li><li>f -releasespace used in pair with -reservespace, then it releases the newly created space.</li><li>If used in pair with -spacetoken, then it releases the space associated with the space token</li></ul></td>
</tr>
<tr>
<td>-remotetransferinfo &lt;string&gt;</td>
<td><ul><li>Specifies extra file transfer parameters in srmCopy.</li><li>Formatted input separated by comma with the following keywords: buffersize:&lt;int&gt;,dcau:&lt;true ¶ false&gt;,parallelism:&lt;int&gt;,guc:&lt;true ¶ false&gt;,protection&lt;true ¶ falase&gt;</li></ul></td>
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
<td>-reservespace</td>
<td><ul><li>Reserves a new space before the request, and use the space token with the request </li></ul></td>
</tr>
<tr>
<td>-retentionpolicy &lt;replica ¶ output ¶ custodial&gt;</td>
<td><ul><li>Specifies retention quality</li><li>Default=replica </li></ul></td>
</tr>
<tr>
<td>-retrydelay &lt;int&gt;</td>
<td><ul><li>Specifies number of seconds to sleep between file transfer retries.</li><li>Default=60 </li></ul></td>
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
<td>-spacelifetime &lt;int&gt;</td>
<td><ul><li>Specifies desired space lifetime in seconds for -reservespace </li></ul></td>
</tr>
<tr>
<td>-spacegsize &lt;int&gt;</td>
<td><ul><li>Specifies desired guaranteed space size in bytes for -reservespace</li></ul></td>
</tr>
<tr>
<td>-spacesize &lt;int&gt;</td>
<td><ul><li>Specifies desired total space size in bytes for -reservespace</li></ul></td>
</tr>
<tr>
<td>-spacetoken &lt;string&gt;</td>
<td><ul><li>Space token to be used with the request</li></ul></td>
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
<td>-submitonly</td>
<td><ul><li>Exits after the request submission</li><li>Status must be checked separately. (e.g. srm-copy-status)</li><li>Default=false </li></ul></td>
</tr>
<tr>
<td>-t &lt;target_url&gt;</td>
<td><ul><li>Target URL </li></ul></td>
</tr>
<tr>
<td>-td &lt;target_url&gt;</td>
<td><ul><li>Target URL as directory path</li><li>Required for multiple &ldquo;get&rdquo; file requests if input file does not contain the target information.</li><li>When both target information in the input file and &ndash;td option are provided, command line option &ndash;td will take priority and information in the input file will be ignored.</li></ul></td>
</tr>
<tr>
<td>-totalrequesttime &lt;int&gt;</td>
<td><ul><li>Total request time</li><li>TotalRequestTime means: All file transfers for the request must be completed within the totalRequestTime. Otherwise, SRM will return SRM_REQUEST_TIMED_OUT as the request status code with individual file status of SRM_FAILURE with an appropriate explanation.</li></ul></td>
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
<tr>
<td>-xmlreport &lt;path&gt;</td>
<td><ul><li>Specifies path to short output report in XML format.</li></ul></td>
</tr>
</table>
<h1>Notes</h1>
<ul>
<li>srm-copy can handle 3 slashes in the URL format. e.g. file:///mydir/mypath</li>
<li>srm-copy makes no proxy delegation by default, and automatically handles proxy delegation based on the source and target urls. A user can override the automatic handling by providing an option &ldquo;-delegation&rdquo; (or &ldquo;-delegation true&rdquo;) to force the delegation, and &ldquo;-delegation false&rdquo; to force no delegation. &ldquo;-debug&rdquo; option would show how the delegation is done on the output.</li>
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
<h2>Put a file from local disk to remote SRM cache</h2>
<ul>
<li>srm-copy file:////tmp/source_filepath srm://host:port/wsept?SFN=/target_filepath</li>
<ul>
<li>This command puts the file into the SRM. <a href="/srmclients/samples/srm-copy-11.txt">Click here for the sample output.</a></li>
<ul>
<li>srm-copy file:////tmp/test.data "srm://bestman.lbl.gov:8443/srm/v2/server?SFN=/srmcache/guest/test.data"</li>
</ul>
</ul>
<li>srm-copy file:////tmp/source_filepath srm:/ /host:port /wsept?SFN=/target_filepath -reservespace</li>
<ul>
<li>This command reserves a space at the beginning, and puts a file in the SRM cache using the dynamically reserved space, when dynamic space reservation is supported by the SRM server. <a href="/srmclients/samples/srm-copy-12.txt">Click here for the sample output.</a></li>
<ul>
<li>srm-copy file:////tmp/test.data srm://bestman.lbl.gov:8443/srm/v2/server?SFN=/srmcache/guest/test.data -reservespace</li>
</ul>
</ul>
<li>srm-copy file:////tmp/source_filepath srm:/ /host:port /wsept?SFN=/target_filepath -spacetoken &lt;spaceToken&gt;</li>
<ul>
<li>This command puts a file in the SRM using the previously reserved space that is associated with the space token. Space token is given by the SRM. [[/srmclients/samples/srm-copy-13.txt][Click here for the sample output.]]</li>
<ul>
<li>srm-copy file:////tmp/test.data srm://bestman.lbl.gov:8443/srm/v2/server?SFN=/srmcache/guest/test.data -spacetoken V123</li>
</ul>
</ul>
</ul>
<h2>Get a file from remote site to local disk</h2>
<ul>
<li>srm-copy srm://host:port/wsept?SFN=/source_filepath file:////tmp/target_filepath</li>
<ul>
<li>This command gets a file from SRM. <a href="/srmclients/samples/srm-copy-21.txt">Click here for the sample output.</a></li>
<ul>
<li>srm-copy srm://bestman.lbl.gov:8443/srm/v2/server?SFN=/srmcache/guest/test.data file:////tmp/ test.data.2</li>
</ul>
</ul>
<li>srm-copy srm://host:port/wsept?SFN=/source_filepath file:////tmp/target_filepath -spacetoken &lt;spaceToken&gt;</li>
<ul>
<li>This command gets a file from SRM using the space already reserved space. <a href="/srmclients/samples/srm-copy-22.txt">Click here for the sample output.</a></li>
<ul>
<li>srm-copy srm://bestman.lbl.gov:8443/srm/v2/server?SFN=/srmcache/guest/test.data file:////tmp/ test.data.2 -spacetoken V123</li>
</ul>
</ul>
<li>srm-copy gsiftp://host:port//source_filepath file:////tmp/target_filepath -serviceurl srm://host:port/wsept</li>
<ul>
<li>This command gets a file from gsiftp site via SRM. <a href="/srmclients/samples/srm-copy-23.txt">Click here for the sample output.</a></li>
<ul>
<li>srm-copy gsiftp://gridftphost.lbl.gov//tmp/test.data file:////tmp/tmp/test.data.3 -serviceurl srm://srm.lbl.gov:8443/srm/v2/server</li>
</ul>
</ul>
<li>srm-copy gsiftp://host:port//source_filepath file:////tmp/target_filepath -direct</li>
<ul>
<li>This command gets a file from gsiftp site directly to local disk. <a href="/srmclients/samples/srm-copy-24.txt">Click here for the sample output.</a></li>
<ul>
<li>srm-copy gsiftp://gridftphost.lbl.gov//tmp/test.data file:////tmp/tmp/test.data.3 -direct</li>
</ul>
</ul>
</ul>
<h2>BringOnline a file on an SRM</h2>
<ul>
<li>srm-copy srm://host:port/wsept?SFN=/source_filepath -bringonline</li>
<ul>
<li>This command have a file available online on the SRM. <a href="/srmclients/samples/srm-copy-31.txt">Click here for the sample output.</a></li>
<ul>
<li>srm-copy srm://bestman.lbl.gov:8443/srm/v2/server?SFN=/srmcache/guest/test.data -bringonline</li>
</ul>
</ul>
</ul>
<h2>Copy a file from one SRM to another SRM</h2>
<ul>
<li>srm-copy srm://host:port/wsept?SFN=/source_copy_filepath srm://host:port/wsept?SFN=/target_copy_filepath</li>
<ul>
<li>This command copies a file from source SRM to target SRM. <a href="/srmclients/samples/srm-copy-41.txt">Click here for the sample output.</a></li>
</ul>
<li>srm-copy srm://host:port/wsept?SFN=/source_copy_filepath srm://host:port/wsept?SFN=/target_copy_filepath -spacetoken &lt;spaceToken&gt;</li>
<ul>
<li>This command copies a file from source SRM to target SRM with the space already reserved in the target SRM. <a href="/srmclients/samples/srm-copy-42.txt">Click here for the sample output.</a></li>
</ul>
<li>srm-copy gsiftp://host:port/source_path srm://host:port/wsept?SFN=/target_copy_filepath</li>
<ul>
<li>This command copies a file from source gsiftp to target SRM. <a href="/srmclients/samples/srm-copy-43.txt">Click here for the sample output.</a></li>
</ul>
<li>srm-copy srm://host:port/wsept?SFN=/source_copy_filepath srm://host:port/wsept?SFN=/target_copy_filepath -pushmode</li>
<ul>
<li>This command copies a file from source SRM to target SRM, having the source SRM push the file to the target SRM. <a href="/srmclients/samples/srm-copy-44.txt">Click here for the sample output.</a></li>
</ul>
<li>srm-copy srm://host:port/wsept?SFN=/source_copy_filepath srm://host:port/wsept?SFN=/target_copy_filepath -3partycopy</li>
<ul>
<li>This command copies a file from source SRM to target SRM by the 3rd party gsiftp into the target when supported. <a href="/srmclients/samples/srm-copy-45.txt">Click here for the sample output.</a></li>
</ul>
</ul>
<h1>Troubleshooting</h1>
<ul>
<li>When a large request is submitted, the srm-copy may not fill all request information into the memory before submitting to the server. It is mostlikely because the memory size of the java virtual machine. In such case, you can increase the size of the virtual machine in srm-copy by -Xmx###M, where # is the amount of memory which you want to allocate in megabytes. E.g. java &ndash;Xmx512M</li>
<li>For memory conscious jobs, &ldquo;-lite&rdquo; option is provided to use less memory to handle the user request. The option the passes -Xms32M to the virtual machine.</li>
</ul>
<h1>See Also</h1>
<ul>
<li><a href="SRMCopyStatus">srm-copy-status</a>, <a href="SRMRequest">srm-request</a></li>
<li><a href="Software/SRMClients/BeStManClientsGuide/CommandSamples">BeStMan SRM-Client Tools User's Guide: Client commands and samples</a></li>
</ul>
<br>

</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>