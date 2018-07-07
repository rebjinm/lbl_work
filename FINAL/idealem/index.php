<!DOCTYPE html>
<html>
<head>
	<title>IDEALEM</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
	<h1>IDEALEM</h1>
	<p>Alex Sim</p>
	
	<h2>IDEALEM</h2>
	<ul>
		<li>IDEALEM: Implementation of Dynamic Extensible Adaptive Locally Exchangeable Measures</li>
		<li>Observations</li>
		<li>Large streaming data tend to show redundant data patterns.</li>
		<li>Events have different patterns.</li>
		<li>Many conventional statistical methods are based on a specific assumption (exchangeability).</li>
	</ul>

	<h2>Exchangeable Random Variables</h2>
	<ul>
		<li>Exchangeable RVs: a set of RVs which are interchangeable among others. </li>
		<li>Exchangeability is already exploited and utilized in many applications such as image & video retrieval and network analysis. </li>
		<li>Examples</li>
		<ul>
			<li>Image & video matching: exchangeable image features</li>
			<li>Econometrics: a set of exchangeable portfolio (in risk analysis)</li>
			<li>The Netflix prize: groups of users & groups of movies</li>
		</ul>
	</ul>

	<h2>How IDEALEM works</h2>
	<ul>
		<li>Breaks an incoming data stream into blocks of a fixed size</li>
		<li>Represents similar blocks with the one that appears earlier in the sequence</li>
		<li>Similarity here is based on statistical measure</li>
		<ul>
			<li>Not on Euclidean distance</li>
			<li>Kolmogorov-Smirnov test (KS test)</li>
		</ul>
	</ul>
	<img src="idealem.jpg" style="width:20%">
	
	<h2>Kolmogorov-Smirnov test (KS test)</h2>
	<ul>
		<li>Statistical hypothesis testing by KS test to check exchangeable blocks</li>
		<li>Measures distributional distance/similarity of two random variables</li>
	</ul>
	<img src="KS-test.jpg" style="width:40%">
	
	<h2>IDEALEM and Data Compression</h2>
	<ul>
		<li>Motivation</li>
		<ul>
			<ul>
			<li>Large streaming data needs a lot of storage. </li>
			<li>Exact compression of big streaming data is intractable, in general.</li>
				<ul>
				<li>Alternative: Linear random sampling, e.g. 1 out of 1000 records</li>
				<li>It is not scalable for high-rate multiple streaming data</li>
				<li>There is no guarantee of reflecting the underlying data distribution</li>
				</ul>
			</ul>
		</ul>
		<li>Relaxing order of values opens up new horizon on data compression</li>
		<li>Information loss due to compression has been generally measured by Euclidean distance (L2-norm) between original data and reconstructed data with MSE/SNR criteria</li>
		<ul>
			<li>High entropy (nearly random) data and floating-point values are hard to compress</li>
		</ul>
		<li>Limitation: order of values not preserved</li>
		<ul>
			<li>Is the order of values really important?</li>
			<li>Devices such as sensors often measure random fluctuations</li>
			<li>Exact reproduction of random fluctuations is not necessary</li>
		</ul>
	</ul>
	<img src="compress.jpg" style="width:40%">
	<img src="CR.jpg" style="width:40%">
	<p>IDEALEM achieves a CR(compression ratio) > 100</p>
	<img src="compressvreconstruct.jpg" style="width:40%">
	<p>With conventional lossy compression schemes, we lose interesting events as CR goes higher. But IDEALEM captures all the important characteristics of signal even in high CR.</p>
	
	
	
	
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>