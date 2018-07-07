<!DOCTYPE html>
<html>
<head>
	<title>Data Elevator</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
	<h1>Data Elevator: Low-contention Data Movement in Hierarchical Storage System</h1>
	<p><strong>Investigators:</strong> Suren Byna, Quincey Koziol, Bin Dong, John Wu and Prabhat</p>
	<p><strong>Program Manager:</strong> Lucy Nowell</p>
	
	<h2>Challenge</h2>
	<p>Efficient data movement in HPC storage with multiple levels of hierarchical and heterogeneous hardware is challenging, and software solutions to facilitate data movement in a deep storage hierarchy are still in infancy and are inefficient.</p>
	
	<h2>Our Solution</h2>
	<p>We developed Data Elevator to support low-contention data movement in hierarchical storage systems by offloading data movements to idle CPU cores.</p>
	<p>Data Elevator supports efficient, transparent, and asynchronous data movement using HDF5 VOL without the need to modify application source code.</p>
	<img src="data-elevator.jpg" style="width:60%">
	
	<h2>Outcome</h2>
	<ul>
		<li>tested with scientific codes at scale</li>
		<ul>
		<li>Climate modeling (CAMR)</li>
		<li>Plasma physics (VPIC)</li>
		</ul>
		<li>4X performance advantage over Cray DataWarp in moving data using the burst buffer on Cori</li>
		<li>HiPC 2016 paper</li>
	</ul>
	<p>"Data Elevator abstraction is the right approach for optimizing our I/O on novel storage architectures, like Cori's burst buffers. It involved no code changes to our MPI + HDF5 approach on other platforms, and provides great performance without hurting our simulation throughput. We're looking forward to using this capability to improve our data pre-processing and indexing as well"<br>- Hans Johansen (Developer of CAMR - 1km high-res climate modeling code)</p>
	
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>