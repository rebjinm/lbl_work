<!DOCTYPE html>
<html>
<head>
<title>BDMSampleCommandsESGFederationTesting</title>
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
<p>The following commands are used to retrieve files from DKRZ to local disk</p>
<h2>1. Retrieves a single file from Remote gsiftp source to local disk target.</h2>
<ul>
<li>bdmclient -s gsiftp://cmip2.dkrz.de:2812//gpfs_750/test/new_drs/cmip5/output/MPI-M/ECHAM6-MPIOM-TR/amip/6hr/atmos/6hrPlev/r1i1p1/v20100928/psl/psl_6hrPlev_ECHAM6-MPIOM-TR_amip_r1i1p1_197901010000-197912311800.nc -t file:////tmp/bdmtest4/get.test</li>
</ul>
<h2>2. Retrieves a single directory recursively from Remote gsiftp source to local disk target with multiple concurrency.</h2>
<ul>
<li>"-symlink option" is need to support transfer soft links.</li>
<li>bdmclient -sd gsiftp://cmip2.dkrz.de:2812//gpfs_750/test/new_drs/cmip5/output/MPI-M/ECHAM6-MPIOM-TR/amip/6hr/atmos/6hrPlev/r1i1p1/v20100928/psl -td file:////tmp/bdmtest4 -symlink -recursive -concurrency 10</li>
</ul>
<h2>3. Retrieves all the files listed in the input file and overwrites any existing files at the local disk target.</h2>
<ul>
<li>bdmclient -f sample.xml -overwrite -concurrency 5</li>
<li>Please [[/bdm/sample.txt]] see the sample.xml file.</li>
<li>For more formats of input file, please refer to this link [[BDMOptions]].</li>
</ul>
<h2>4. The current BDM implementation supports "GET" transfers from gsiftp source to local disk target.</h2>
<ul>
<li>single file transfers</li>
<li>directory transfers recursively or non- recursively</li>
<li>an input file containing multiple files and checksum values for comparison</li>
<li>third party transfer support is being implemented.</li>
</ul>
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>