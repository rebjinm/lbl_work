<!DOCTYPE html>
<html>
<head>
<title>BDM Sample Commands</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<p><a href="index.html">Back to BDM Home</a></p>
<h1>Sample commands</h1>
<ul>
<li>Support email : srm@lbl.gov</li>
</ul>
<h2>1. Retrieve a source directory from remote GridFTP transfer servers with concurrency 2</h2>
<ul>
<li>bdmclient -sd gsiftp://remote_hostname_1//src_directory_path -td file:////tgt_directory_path -concurrency</li>
<ul>
<li>e.g. bdmclient -sd gsiftp://gdo2.ucllnl.org//export/ftp/pub/sc09/ipcc2/2xco2 -td file:////project/projectdirs/sc09/sctest -concurrency 2</li>
<li>e.g. bdmclient -sd gsiftp://gdo2.ucllnl.org//export/ftp/pub/sc09/ipcc2/2xco2 -td file:////project/projectdirs/sc09/sctest -concurrency 2 -overwrite</li>
<li>e.g. bdmclient -sd gsiftp://gdo2.ucllnl.org//export/ftp/pub/sc09/ipcc2/2xco2 -td file:////project/projectdirs/sc09/sctest -concurrency 2 -recursive</li>
<li>e.g. bdmclient -sd gsiftp://gdo2.ucllnl.org//export/ftp/pub/sc09/ipcc2/2xco2 -td file:////project/projectdirs/sc09/sctest -concurrency 2 -recursive -overwrite</li>
</ul>
</ul>
<h2>2. Retrieve a source directory from remote GridFTP transfer servers with concurrency 2 (for strict firewall proctected sites)</h2>
<ul>
<li>Uses passive connection for data browsing and data transfers</li>
<li>limitation: parallelism cannot be more than 1</li>
<li>bdmclient -sd gsiftp://remote_hostname//src_directory_path -td file:////tgt_directory_path -concurrency 2 -usepassive</li>
<ul>
<li>e.g. bdmclient -sd gsiftp://gdo2.ucllnl.org//export/ftp/pub/sc09/ipcc2/2xco2 -td file:////project/projectdirs/sc09/sctest -concurrency 2 -usepassive</li>
</ul>
</ul>
<h2>3. Retrieve a source directory from two remote GridFTP transfer servers with concurrency 2 for each server</h2>
<ul>
<li>bdmclient -sd gsiftp://remote_hostname_1//src_directory_path -td file:////tgt_directory_path -transferserver remote_hostname_1,remote_hostname_2 -concurrency 2</li>
<ul>
<li>e.g. bdmclient -sd gsiftp://gs1.intrepid.alcf.anl.gov//intrepid-fs0/projects/sc09bwc/data/koa/nersc/tRun1/sc09/ipcc2/sresb1/ocn/ -td file:////project/projectdirs/sc09/sctest -transferserver gs2.intrepid.alcf.anl.gov,gs1.intrepid.alcf.anl.gov -concurrency 2</li>
<li>e.g. bdmclient -sd gsiftp://dtn01.nersc.gov//project/projectdirs/sc09/MSU -td file:////project/projectdirs/sc09/sctest -transferserver dtn02.nersc.gov,dtn01.nersc.gov -concurrency 2</li>
</ul>
</ul>
<h2>4. Retrieve a single source file from a remote GridFTP transfer server</h2>
<ul>
<li>bdmclient -s gsiftp://remote_hostname//src_directory_path -t file:////tgt_directory_path</li>
<ul>
<li>e.g. bdmclient -s gsiftp://srm.lbl.gov//tmp/test.data -t file:////tmp/test.data.2</li>
<li>e.g. bdmclient -s gsiftp://srm.lbl.gov//tmp/test.data -td file:////tmp/</li>
</ul>
</ul>
<h2>5. Retrieve a single source file where file contains spaces init, from a remote GridFTP transfer server</h2>
<ul>
<li>bdmclient -s gsiftp://remote_hostname//src_directory_path/"file name with space" -td file:////tgt_directory_path/</li>
<ul>
<li>e.g. bdmclient -s gsiftp://srm.lbl.gov//tmp/"file name with space" -td file:////tmp/</li>
</ul>
</ul>
<h2>6. Retrieve a single source file from root dir</h2>
<ul>
<li>bdmclient -s gsiftp://remote_hostname//file -td file:////tgt_directory_path/</li>
<ul>
<li>e.g. bdmclient -s gsiftp://srm.lbl.gov//vmlinuz -td file:////tmp/</li>
</ul>
</ul>
<h2>7. Retrieve from root dir</h2>
<ul>
<li>bdmclient -s gsiftp://remote_hostname// -td file:////tgt_directory_path/ -recursive</li>
<ul>
<li>e.g. bdmclient -s gsiftp://srm.lbl.gov// -td file:////tmp/ -recursive</li>
<li>e.g. bdmclient -s gsiftp://srm.lbl.gov// -td file:////tmp/</li>
</ul>
</ul>
<h2>8. Retrieve using an input xml file</h2>
<ul>
<li>please see the sample xml files for formats and uses cases</li>
<li>bdmclient -f inputfile.xml</li>
</ul>
<h2>9. Browse root dir</h2>
<ul>
<li>bdmclient -s gsiftp://remote_hostname// -browse</li>
<ul>
<li>e.g. bdmclient -s gsiftp://srm.lbl.gov//  -browse -recursive</li>
<li>e.g. bdmclient -s gsiftp://srm.lbl.gov// -browse</li>
</ul>
</ul>
<h2>10. Browse remote source directory only.</h2>
<ul>
<li>Stores the file information in the database</li>
<li>Returns the request token to the user for later use</li>
<li>bdmclient -sd gsiftp://remote_hostname//src_directory_path -browse</li>
<ul>
<li>e.g. bdmclient -sd gsiftp://dtn01.nersc.gov//project/projectdirs/sc09/MSU -browse</li>
<li>e.g. bdmclient -sd gsiftp://dtn01.nersc.gov//project/projectdirs/sc09/MSU -browse -recursive</li>
<li>e.g. bdmclient -sd gsiftp://dtn01.nersc.gov//project/projectdirs/sc09/MSU -browse -overwrite</li>
<li>e.g. bdmclient -sd gsiftp://dtn01.nersc.gov//project/projectdirs/sc09/MSU -browse -usepassive (for strict firewall protected sites)</li>
</ul>
</ul>
<h2>11. Browse remote source directory recursively with concurrency and transferserver option</h2>
<ul>
<li>bdmclient -sd gsiftp://remote_hostname//src_directory_path -browse -concurrency 15 -transferserver <remote_hostname_1,remotehostname_2> -recursive</li>
<ul>
<li>e.g. bdmclient -sd gsiftp://dtn01.nersc.gov//project/projectdirs/sc09/MSU -td file:////tmp -transferserver dtn02.nersc.gov,dtn01.nersc.gov -concurrency 15 -recursive</li>
</ul>
</ul>
<h2>12. measure performance</h2>
<ul>
<li>bdmclient -perftest -sd gsiftp://remote_hostname//dev/ZERO -f file:////dev/null</li>
<ul>
<li>e.g. bdmclient -perftest -sd gsiftp://dm.lbl.gov//dev/ZERO -t file:////dev/null</li>
</ul>
</ul>
<h2>13. Browse remote source file</h2>
<ul>
<li>bdmclient -sd gsiftp://remote_hostname//src_directory_path/src_file -browse</li>
<ul>
<li>e.g. bdmclient -s gsiftp://srm.lbl.gov//tmp/test.data -browse</li>
</ul>
</ul>
<h2>14. Resume the previous request with the request token with two remote GridFTP transfer servers and concurrency 2</h2>
<ul>
<li>bdmclient -sd gsiftp://remote_hostname_1//src_directory_path -td file:////tgt_directory_path -resume my_request_token -transferserver remote_hostname_1,remote_hostname_2 -concurrency 2</li>
<ul>
<li>e.g. bdmclient -sd gsiftp://dtn01.nersc.gov//project/projectdirs/sc09/MSU -td file:////tmp -resume viji_12345 -transferserver dtn02.nersc.gov,dtn01.nersc.gov -concurrency 2</li>
</ul>
</ul>
<h2>15. Resume the previous request with the request token to different target dir with two remote GridFTP transfer servers and concurrency 2</h2>
<ul>
<li>bdmclient -sd gsiftp://remote_hostname_1//src_directory_path -td file:////another_tgt_directory_path -resume my_request_token -transferserver remote_hostname_1,remote_hostname_2 -concurrency 2</li>
<ul>
<li>e.g. bdmclient -sd gsiftp://dtn01.nersc.gov//project/projectdirs/sc09/MSU -td file:////tmp/differenttargetdir -resume viji_12345 -transferserver dtn02.nersc.gov,dtn01.nersc.gov -concurrency 2</li>
</ul>
</ul>
<h2>16. Show request status</h2>
<ul>
<li>when -requesttoken is not provided, it shows the status of the latest request</li>
<li>bdmstatus -requesttoken my_request_token</li>
<ul>
<li>e.g. bdmstatus -requesttoken viji_12345</li>
</ul>
</ul>
<h2>17. List request status</h2>
<ul>
<li>bdmstatus -list</li>
</ul>
<h2>18. Output the request status in detail</h2>
	<ul>
	<li>Generates the XML output file, which contains source, target, checksum information for the files in the given request.</li>
	<li>bdmstatus -publish output.xml -requesttoken my_request_token</li>
		<ul>
		<li>e.g. bdmstatus -publish test_output.xml -requesttoken viji_12345</li>
		</ul>
	</ul>
	<ul>
	<li>To compare the calculated checksum of the file with the input</li>
	</ul>
	<ul>
<li>When the checksum information for the files is given in the input file, BDM compares the calculated checksum with the given checksum and retry file transfer if they do not match. If the checksum information is not provided, then it computes the checksum and stores in a database.</li>
<li>bdmclient -f input.xml -checksum</li>
</ul>
<h2>19. To compare the calculated checksum of the file with the input</h2>
<ul>
	<li>When the checksum information for the files is given in the input file, BDM compares the calculated checksum with the given checksum and retry file transfer if they do not match. If the checksum information is not provided, then it computes the checksum and stores in a database.
</li>
	<ul>
		<li>bdmclient -f input.xml -checksum</li>
	</ul>
</ul>
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>