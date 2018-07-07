<!DOCTYPE html>
<html>
<head>
	<title>AMASE: Architecture and Management for Autonomic Science Ecosystems</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
	<h1>AMASE: Architecture and Management for Autonomic Science Ecosystems</h1>
	<p><strong>ANL:</strong> Pete Beckman, Raj Kettimuthu, Rajesh Sankaran, Zhengchun Liu<br>
	<strong>LBNL:</strong> Alex Sim, Jinoh Kim, John Wu<br>
	<strong>Northwestern:</strong> Alok Choudhary, Wei-Keng Liao, Ankit Agrawal, Qiao Kang</p>
	
	<h2>Goals</h2>
	<ul>
		<li>Landscape: Science Internet of Things</li>
		<ul>
		<li>Improve access, performance, and utilization of scientific resources</li>
		<li>Reduce complexity and autonomically tune and optimize</li>
		<li>Smart, self-aware scientific resources</li>
		</ul>
		<li>Design a scalable architecture for smart science ecosystems.</li>
		<li>Embed intelligence in relevant sub-systems via light-weight machine learning.</li>
		<li>Explore methods for distributed and autonomous management of the systems.</li>
	</ul>
	
	<h2>Benefits</h2>
	<ul>
		<li>Scientists using DOE computing infrastructure will be able to run workflows on automatically selected resources that are dynamically configured and tuned for their application.</li>
		<li>Facility and network operators will have the ability to predict and diagnose problems before they cause downtime.</li>
	</ul>
	
	<h2>Challenges</h2>
	<ul>
		<li>Streaming data analysis</li>
		<li>continuous and increasing volume of data which often has the complex representation and heterogeneity</li>
		<li>variability in multivariate features</li>
		<li>high frequency of the data collection</li>
		<li>Streaming data including network traffic monitoring measurements show the non-linear property, and the dimensionality reduction is a challenge.</li>
		<li>Deep learning models would be essential to find spatio-temporal variations in data streams with multiple features.</li>
	</ul>
	
	<h2>Summary</h2>
	<ul>
		<li>Novel analytical approaches towards autonomous systems</li>
		<ul>
			<li>Understanding of the variability in multivariate features</li>
			<li>Handling high frequency of the streaming data collection</li>
			<li>For analysis, event classification and prediction.</li>
		</ul>
		<li>Newly developed analysis methods</li>
		<ul>
			<li>Learn spatio-temporal relationship on streaming data</li>
			<li>Reveal transitions in network operation states</li>
			<li>Offer a new way to classify and predict the anomalous state</li>
		</ul>
		<li>Understand variations in patterns for data with multiple features</li>
		<ul>
			<li>Traditionally, individual features are analyzed independently</li>
			<li>Machine learning-based clustering method</li>
			<li>Density-based grid structure and joint distribution methods</li>
		</ul>
		<li>New similarity measures to estimate temporal variations</li>
		<ul>
			<li>Degree of change: based on moving distance of clusters</li>
			<li>Common occupancy rate: similarity based on the concept of Jaccard Index for grid structure.</li>
		</ul>
	</ul>
	
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>