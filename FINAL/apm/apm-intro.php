<!DOCTYPE html>
<html>
<head>
	<title>APM Description</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
	<p><a href="index.html">Back to APM Home</a></p>
	<h1>APM Project Description</h1>
	<p>To improve the efficiency of resource utilization and scheduling of scientific data transfers on high-speed
	networks, we started a project on Advanced Performance Modeling with combined passive and active
	monitoring (APM) that investigates and models a general-purpose, reusable and expandable network
	performance estimation framework. The predictive estimation model and the framework will be helpful in
	optimizing the performance and utilization of fast networks as well as sharing resources with predictable
	performance for scientific collaborations, especially in data intensive applications. Our prediction model
	utilizes a combination of passive historical network performance information from various network activity logs
	as well as active measurements from network monitoring devices. The prediction model estimates future
	network usage and the latency in using the network. Historical network performance information is used for
	throughput prediction without putting extra load on the resources by active measurement collection. For a
	simple analogy, highway vehicle traffic pattern analysis would give drivers time estimation for travel planning
	(e.g. it takes roughly about 1.5 hours from Berkeley to San Francisco Airport on Monday morning 8:30am, or
	about 40 minutes around 1pm). Performance measurements collected by active probing is used judiciously
	for improving the accuracy of predictions. The planned hybrid estimation model with both passive and active
	measurements will improve the accuracy in performance estimation for newly added data service nodes on
	high throughput networks.<br>
	<br>
	To implement this project, we need to address the following challenges:
	<ul>
		<li>Performance estimation model. Synthesize measurement data to come up with predictive models of
		network traffic patterns to improve network utilization and performance and enable predictable data
		movement on high bandwidth networks.</li>
		<li>Long-term performance estimation. Provide predictive estimation for data throughput for a future time
		window, together with some probabilistic variability estimate.</li>
	</ul>
	This research explores fundamental questions on the relationship between monitoring and estimation of
	network resource performance.</p>	
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>