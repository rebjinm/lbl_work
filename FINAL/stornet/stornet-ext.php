<!DOCTYPE html>
<html>
<head>
	<title>StorNet Future Extension</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<p><a href="index.html">Back to StorNet Home</a></p>
<h1>Future extension: Resource Co-scheduling Component</h1>

<p>In the DOE petascale science environment, the resources located at each site (e.g., computing power and
storage space) have to be allocated jointly via network resources to achieve a cost-effective data transfer. For
instance, a site with rich storage resources may not be a good candidate for data backup if its network
connectivity with other sites is poor. Furthermore, in such an environment where users share and compete for
resources, it is critical to achieve efficient resource utilization via good co-scheduling schemes. Therefore, we
propose to study a general resource co-scheduling (RCS) problem as follows: Given a set of limited
resources of different types, and a variety of data-intensive applications, determine how to optimally allocate
and schedule the resources required by each application. Take the application which only requires a simple
end-to-end data transfer as example: it may ask for a bandwidth-guaranteed circuit for reliable data transfer,
and also a number of CPUs and hard drive disks in order to process and store the data. We need to jointly
allocate and co-schedule all types of resources required. We will develop analytical models of resource co-
scheduling for two purposes: one is to use these models as the basis for actual schedulers, and the second is
to use them to evaluate the performance of scheduling algorithm candidates. In addition, we propose to study
efficient scheduling algorithms to solve several specializations of the general RCS problem listed below:</p>

<ul>
	<li><strong>One transfer per request.</strong> Given a set of one-to-one transfer requests, what’s the optimal scheduling in order to maximize resource utilization? Each request may be very specific, where the source destination pair, the route, and the required resources are all given. This problem can be easily shown to be more general than the NP-hard integral, multi-commodity flow problem. Alternatively, the users can also leave the decision of the actual transfer endpoints, and routes between them, to the controller when multiple sites provide the resources the request needs. When the resources are limited and not all requests can be satisfied, the optimal scheduling then selects one subset of the input requests to satisfy and generate the maximum resource utilization.</li>
	<li><strong>Multiple transfers per request.</strong> When the resources are so scarce that any single source can’t provide sufficient storage volume, or there are no paths with sufficient bandwidths connecting to the source, we may need to use the resources available in multiple sources to satisfy one request. Data transferring over multiple paths not only can solve the scarce resources problem but also facilitate load balancing and multiplexing. However, it complicates the signaling protocol and introduces additional cost into data integration. In this work, we will study the tradeoff of multiple data transfers and decide the cases where it’s beneficial.</li>
	<li><strong>Delayed transfers.</strong> Another potential solution to the scarce resources problem is to postpone the data transfer until the required resources are available. This option introduces an additional scheduling dimension in the time domain compared to the instant reservation approaches. When there are multiple delayed requests, a priority scheme is needed to decide which one to schedule next. We will also investigate the potential benefit of scheduled reservation, i.e., a request can be delayed and its data transfer can be reserved at a future time. In addition, if the storage volume at one site is not large enough to hold the data that needs to be transferred, we may transfer the data first to the temporary site near the destination and with sufficient storage resources.</li>
</ul>

<p>As mentioned, the schedulers to be developed should be able to handle multiple sources and targets of large volume data over large scale networks, multiple classes of load, and multiple transfers per request. Time optimal schedules that can be developed often require perfect information on system state (e.g, available processor and link speed), so there are some advantages to look at schedulers that can operate with less than complete information and at heuristic schedulers. Optimal schedulers can be used as a benchmark against which to compare these heuristic schedulers.</p>
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>
