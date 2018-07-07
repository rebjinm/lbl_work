<!DOCTYPE html>
<html>
<head>
<title>SampleClients</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<h1>Sample SRM client commands related to BeStMan2 configuration</h1>
<p>SRM client commands can be found in bestman2/bin directory. They are full implementations of SRM v2.2 as generic SRM v2.2 clients, developed by Lawrence Berkeley National Laboratory. They have been tested for all current SRM v2.2 implementations such as BeStMan, BeStMan2, CASTOR, dCache, DPM, SRM/iRODS-SRB and StoRM. They are continuously being tested for compatibility and interoperability.</p>
<ul>
<li>Assume the BeStMan instance is on srm://bestman.lbl.gov:8443/srm/v2/server.</li>
<li>Assume the local file path is used as /tmp/my.test.file.</li>
<li>Assume the user grid proxy exists and is valid, and the user is grid-mapped on the server side as srmuser.</li>
</ul>
<h2>SRM-COPY</h2>
<p>1. When BeStMan2 is configured with default values, and a file is requested to put into the BeStMan2 managed storage cache:</p>
<pre>
      srm-copy \
      file:////tmp/my.test.file \
      srm://bestman.lbl.gov:8443/srm/v2/server\?SFN=/srmcache/~/my.test.file
</pre>
<ul>
<li>Note that &ldquo;~&rdquo; is used for user&rsquo;s top directory under BeStMan2 managed storage cache.</li>
<li>&ldquo;~&rdquo; is translated into the locally mapped account from grid mapping.</li>
<li>When users do not know their grid mappings, they can use &ldquo;~&rdquo;.</li>
<ul>
<li>e.g. in grid-mapfile, &ldquo;/DC=org/DC=doegrids/OU=People/CN=Arie Shoshani 245501" srmuser,</li>
</ul>
<li>&ldquo;~&rdquo; is translated into &ldquo;srmuser&rdquo; which makes the full SFN as /srmcache/srmuser/my.test.file.</li>
<li>Both SFNs srm://bestman.lbl.gov:8443/srm/v2/server\?SFN=/srmcache/~/my.test.file and srm://bestman.lbl.gov:8443/srm/v2/server\?SFN=/srmcache/srmuser/my.test.file would work.</li>
</ul>
<p>2. When BeStMan2 is configured with default values, and a file is requested to get from the BeStMan2 managed storage cache:</p>
<pre>
      srm-copy \
      srm://bestman.lbl.gov:8443/srm/v2/server\?SFN=/srmcache/srmuser/my.test.file \
      file:////tmp/my.test.file2
</pre>
<p>3. When BeStMan2 is configured with default values, and a file is requested to put into the user managed storage paths (e.g. /myproject/mydir):</p>
<pre>
      srm-copy \
      file:////tmp/my.test.file \
      srm://bestman.lbl.gov:8443/srm/v2/server\?SFN=/myproject/mydir/my.test.file
</pre>
<ul>
<li>Note that BeStMan2 does not manage these files, but provides an access to the user controlled storage space with SRM interfaces.</li>
</ul>
<h2>SRM-LS</h2>
<p>1. When BeStMan2 is configured with default values, and a file is requested from the BeStMan2 managed storage cache:</p>
<pre>
      srm-ls srm://bestman.lbl.gov:8443/srm/v2/server\?SFN=/srmcache/srmuser/my.test.file
</pre>
<ul>
<li>Note that &ldquo;~&rdquo; is used for user&rsquo;s top directory under BeStMan2 managed storage cache.</li>
<li>&ldquo;~&rdquo; is translated into the locally mapped account from grid mapping.</li>
<li>When users do not know their grid mappings, they can use &ldquo;~&rdquo;.</li>
<ul>
<li>e.g. in grid-mapfile, &ldquo;/DC=org/DC=doegrids/OU=People/CN=Arie Shoshani 245501" srmuser,</li>
</ul>
<li>&ldquo;~&rdquo; is translated into &ldquo;srmuser&rdquo; which makes the full SFN as /srmcache/srmuser/my.test.file.</li>
<li>Both SFNs srm://bestman.lbl.gov:8443/srm/v2/server\?SFN=/srmcache/~/my.test.file and srm://bestman.lbl.gov:8443/srm/v2/server\?SFN=/srmcache/srmuser/my.test.file would work.</li>
</ul>
<p>2. When BeStMan2 is configured with default values, and a file is requested from the user managed storage paths (e.g. /myproject/mydir):</p>
<pre>
      srm-ls srm://bestman.lbl.gov:8443/srm/v2/server\?SFN=/myproject/mydir/my.test.file
</pre>
<ul>
<li>Note that BeStman2 does not manage these files, but provides an access to the user controlled storage space with SRM interfaces.</li>
<li>For permission issues, accessFileSysViaSudo or accessFileSysViaGsiftp may need to be defined.</li>
</ul>
<h2>SRM-RM</h2>
<p>1. When BeStMan2 is configured with default values, and a file is requested to be removed from the BeStMan2 managed storage cache:</p>
<pre>
      srm-rm srm://bestman.lbl.gov:8443/srm/v2/server\?SFN=/srmcache/srmuser/my.test.file
</pre>
<p>2. When BeStMan2 is configured with default values, and a file is requested to be removed from the user managed storage paths (e.g. /myproject/mydir):</p>
<pre>
      srm-rm srm://bestman.lbl.gov:8443/srm/v2/server\?SFN=/myproject/mydir/my.test.file
</pre>
<ul>
<li>Note that BeStman2 does not manage these files, but provides an access to the user controlled storage space with SRM interfaces.</li>
<li>For permission issues, accessFileSysViaSudo or accessFileSysViaGsiftp needs to be defined.</li>
<li>When accessFileSysViaGsiftp is defined, only LBNL or FNAL implementation of srm-rm or srmrm can be used because of the delegation issue.</li>
<li>LCG-utils do not delegate credentials and BeStMan2 cannot access gsiftp server to remove the requested files on behalf of the user.</li>
<li>When accessFileSysViaSudo is defined, any clients implementing srmRm can be used, and /etc/sudoers needs proper entry for BeStMan2 server.</li>
</ul>
<h2>SRM-MKDIR and SRM-RMDIR</h2>
<p>1. When BeStMan2 is configured with default values, and a directory is requested to be created or removed from the BeStMan2 managed storage cache:</p>
<pre>
      srm-mkdir (or srm-rmdir) srm://bestman.lbl.gov:8443/srm/v2/server\?SFN=/srmcache/srmuser/my.test.dir
</pre>
<p>2. When BeStMan2 is configured with default values, and a directory is requested to be created or removed from the user managed storage paths (e.g. /myproject/mydir):</p>
<pre>
      srm-mkdir (or srm-rmdir) srm://bestman.lbl.gov:8443/srm/v2/server\?SFN=/myproject/mydir/my.test.dir
</pre>
<ul>
<li>Note that BeStman2 does not manage these files, but provides an access to the user controlled storage space with SRM interfaces.</li>
<li>For permission issues, accessFileSysViaSudo or accessFileSysViaGsiftp needs to be defined.</li>
<li>When accessFileSysViaGsiftp is defined, only LBNL or FNAL client implementation can be used because of the delegation issue.</li>
<li>LCG-utils do not delegate credentials and BeStMan2 cannot access gsiftp server to create or remove the requested files on behalf of the user.</li>
<li>When accessFileSysViaSudo is defined, any clients implementing srmRm can be used, and /etc/sudoers needs proper entry for BeStMan server.</li>
</ul>
<h2>SRMPING from FNAL client</h2>
<p>1. When BeStMan2 is configured with default values, and FNAL SRM client srmping needs some extra flags:</p>
<pre>
      srmping  -2  -webservice_path=srm/v2/server  -debug srm://bestman.lbl.gov:8443 
</pre>
<p>Or</p>
<pre>
      srmping  -2 -debug srm://bestman.lbl.gov:8443/srm/v2/server
</pre>
<ul>
<li>Note that all FNAL SRM clients have default SRM service handle as srm/managerv2, and it needs to be specified in the option with &ldquo;-webservice_path&rdquo; for older versions.</li>
<li>Also, some of FNAL SRM clients support both SRM v1.1 and SRM v2.2 with default pointing to v1.1, and it needs to be specified in the option with &ldquo;-2&rdquo;.</li>
<li>Note that some of FNAL SRM clients have a default GSS type to support in a request call. By default it is fixed to &ldquo;host&rdquo;. Many of SRM deployment use other service type certificates such as &ldquo;http&rdquo; or &ldquo;srm&rdquo;. In such cases, FNAL SRM clients need &lsquo;-gss_expected_name=srm&rdquo; or &ldquo;-gss_expected_name=http&rdquo; as an option.</li>
</ul>
<h2>SRMLS from FNAL client</h2>
 1. When BeStMan2 is configured with default values, and FNAL SRM client srmls needs some extra flags: <pre>
      srmls  -webservice_path=srm/v2/server srm://bestman.lbl.gov:8443/srm/v2/server\?SFN=/srmcache/srmuser/my.test.file
</pre>
<ul>
<li>Note that all FNAL SRM clients have default SRM service handle as srm/managerv2, and it needs to be specified in the option with &ldquo;-webservice_path&rdquo;.</li>
<li>Note that some of FNAL SRM clients have a default GSS type to support in a request call. By default it is fixed to &ldquo;host&rdquo;. Many of SRM deployment use other service type certificates such as &ldquo;http&rdquo; or &ldquo;srm&rdquo;. In such cases, FNAL SRM clients need &lsquo;-gss_expected_name=srm&rdquo; or &ldquo;-gss_expected_name=http&rdquo; as an option.</li>
</ul>
<h2>SRMCP from FNAL client</h2>
<p>1. When BeStMan2 is configured with default values, and FNAL SRM client srmcp needs some extra flags:</p>
<pre>
      srmcp -2  -webservice_path=srm/v2/server \
      srm://bestman.lbl.gov:8443 /srm/v2/server\?SFN=/srmcache/srmuser/my.test.file \
      file:////tmp/my.test.file
</pre>
<p>Or,</p>
<pre>
      srmcp -2   srm://bestman.lbl.gov:8443 /srm/v2/server\?SFN=/srmcache/srmuser/my.test.file \
      file:////tmp/my.test.file
</pre>
<ul>
<li>Note that all FNAL SRM clients have default SRM service handle as srm/managerv2, and it needs to be specified in the option with &ldquo;-webservice_path&rdquo; for older versions. Also, some of FNAL SRM clients support both SRM v1.1 and SRM v2.2 with default pointing to v1.1, and it needs to be specified in the option with &ldquo;-2&rdquo;.</li>
<li>Extra command line options such as &ldquo;-access_latency=ONLINE -retention_policy=CUSTODIAL&rdquo; can be provided when supported in BeStMan2 configuration.</li>
<li>Note that some of FNAL SRM clients have a default GSS type to support in a request call. By default it is fixed to &ldquo;host&rdquo;. Many of SRM deployment use other service type certificates such as &ldquo;http&rdquo; or &ldquo;srm&rdquo;. In such cases, FNAL SRM clients need &lsquo;-gss_expected_name=srm&rdquo; or &ldquo;-gss_expected_name=http&rdquo; as an option.</li>
</ul>
<h2>SRMRM from FNAL client</h2>
<p>1. When BeStMan2 is configured with default values, and FNAL SRM client srmrm needs some extra flags:</p>
<pre>
      srmrm -2  -webservice_path=srm/v2/server srm://bestman.lbl.gov:8443/srm/v2/server\?SFN=/srmcache/srmuser/my.test.file
</pre>
<ul>
<li>Note that all FNAL SRM clients have default SRM service handle as srm/managerv2, and it needs to be specified in the option with &ldquo;-webservice_path&rdquo;. Also, some of FNAL SRM clients support both SRM v1.1 and SRM v2.2 with default pointing to v1.1, and it needs to be specified in the option with &ldquo;-2&rdquo;.</li>
<li>Note that some of FNAL SRM clients have a default GSS type to support in a request call. By default it is fixed to &ldquo;host&rdquo;. Many of SRM deployment use other service type certificates such as &ldquo;http&rdquo; or &ldquo;srm&rdquo;. In such cases, FNAL SRM clients need &lsquo;-gss_expected_name=srm&rdquo; or &ldquo;-gss_expected_name=http&rdquo; as an option.</li>
</ul>
<h2>SRMMKDIR and SRMRMDIR from FNAL client</h2>
<p>1. When BeStMan2 is configured with default values, and FNAL SRM client srmmkdir needs some extra flags:</p>
<pre>
      srmmkdir  (or srmrmdir)  -webservice_path=srm/v2/server \
      srm://bestman.lbl.gov:8443/srm/v2/server\?SFN=/srmcache/srmuser/my.test.dir
</pre>
<ul>
<li>Note that all FNAL SRM clients have default SRM service handle as srm/managerv2, and it needs to be specified in the option with &ldquo;-webservice_path&rdquo;.</li>
<li>Note that some of FNAL SRM clients have a default GSS type to support in a request call. By default it is fixed to &ldquo;host&rdquo;. Many of SRM deployment use other service type certificates such as &ldquo;http&rdquo; or &ldquo;srm&rdquo;. In such cases, FNAL SRM clients need &lsquo;-gss_expected_name=srm&rdquo; or &ldquo;-gss_expected_name=http&rdquo; as an option.</li>
</ul>
<h2>LCG-CP from GLITE LCG-UTILS client</h2>
<p>1. lcg-cp only works with SRM servers running with host certficate. If BeStMan2 server runs with http or srm service certificate, lcg-cp would not work and give an error.</p>
<p>2. When BeStMan2 is configured with default values, and a file is requested to put into the user managed storage paths (e.g. /myproject/atlas/mydir). GLITE SRM client lcg-cp needs some extra flags:</p>
<pre>
      lcg-cp   -v   -b    -U srmv2    --vo atlas  \
      file:////tmp/my.test.file \
      srm://bestman.lbl.gov:8443/srm/v2/server\?SFN=/myproject/atlas/mydir/my.test.file
</pre>
<ul>
<li>Note that the user file is put into the non-BeStMan2 managed storage space.</li>
<li>Note that lcg-cp only works with &ldquo;host&rdquo; type of GSS certificates.</li>
</ul>
<p>2. When BeStMan2 is configured with userSpaceKeywords, and a file is requested to put into the user managed storage paths (e.g. /myproject/atlas/mydir). GLITE SRM client lcg-cp needs some extra flags:</p>
<ul>
<li>In bestman2.rc, userSpaceKeywords=(ATLASUSERSPACE1=/myproject/atlas)</li>
</ul>
<pre>
      lcg-cp   -v   -b    -U srmv2    --vo atlas  -S ATLASUSERSPACE1  \
      file:////tmp/my.test.file \
      srm://bestman.lbl.gov:8443/srm/v2/server\?SFN=/mydir/my.test.file
</pre>
<ul>
<li>Note that the user file is put into the non-BeStMan2 managed storage space, and the space has a space token named &ldquo;ATLASUSERSPACE1&rdquo;. The pre-defined space token is provided with &ldquo;-S&rdquo; option. Upon successful request, the user file resides in /myproject/atlas/mydir/my.test.file.</li>
<li>With srm-copy, the following command has the same effect, and the user file will be found in /project/atlas/mydir/my.test.file upon successful request:</li>
</ul>
<pre>
      srm-copy \
      file:////tmp/my.test.file \
      srm://bestman.lbl.gov:8443/srm/v2/server\?SFN=/mydir/my.test.file \
      -spacetoken ATLASUSERSPACE1
</pre>
<h2>LCG-LS from GLITE LCG-UTILS client</h2>
<p>1. lcg-ls only works with SRM servers running with host certficate. If BeStMan2 server runs with http or srm service certificate, lcg-ls would not work and give an error.</p>
<p>2. Examples:</p>
<pre>
      lcg-ls  -b    -D srmv2    -l  \
      srm://bestman.lbl.gov:8443/srm/v2/server\?SFN=/myproject/atlas/mydir/my.test.file
</pre>
<ul>
<li>Note that lcg-ls only works with &ldquo;host&rdquo; type of GSS certificates.</li>
</ul>
<br>

</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>