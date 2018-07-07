<!DOCTYPE html>
<html>
<head>
	<title>Performance Evaluation of Large-scale I/O on Cori Burst Buffer</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
	<h1>Performance Evaluation of Large-scale I/O on Cori Burst Buffer</h1>
	
	<p><strong>Investigators:</strong> Suren Byna (LBNL), P. Carns (ANL)</p>
	<p><strong>Program Manager:</strong> Lucy Nowell</p>
	
	<h2>Scientific Achievement</h2>
	<p>Tuning parallel I/O on burst buffers (BB) of upcoming supercomputer architectures is challenging because BB software is still evolving. Moreover, existing I/O software, such as MPI-IO and HDF5, have not been tuned for use on the BB. LBNL’s ExaHDF5 project team participated in NERSC’s BB Early User Program to study performance of large-scale parallel I/O in a plasma physics simulation code to identify bottlenecks and to optimize performance.</p>
	
	<img src="io-eval.jpg" style="width:40%">
	<p>Performance improvements obtained by selecting appropriate tuning parameters for I/O libraries: This plot shows the first large-scale scientific benchmark to exercise parallel I/O on the Cori burst buffer. Our optimized I/O mini-app, extracted from the VPIC plasma physics space weather simulation, performs 2.5X to 5X better than Lustre on Cori. Our tuning also performs 4.5X better on burst buffers (compared to running the code with default parameters).</p>
	
	<h2>Significance and Impact</h2>
	<p>We identified that previously tuned plasma physics simulation code did not scale well using BB on Cori because an
SSD-based BB performs differently than a disk-based Lustre file system. BB-specific optimizations avoid performance degradations and perform ~5X better than Lustre. Results from this study contributed to a paper that won the best paper award at the 2016 Cray Users Group meeting.</p>

	<h2>Research Details</h2>
	<ul>
		<li>Work was performed on Cori Phase I system at NERSC</li>
		<li>Optimized writing of data by a plasma physics simulation code using burst buffers on the NERSC Cori-Phase 1 system</li>
		<li>Devised a strategy for automatically selecting performant tuning parameters for I/O software libraries</li>
	</ul>
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>