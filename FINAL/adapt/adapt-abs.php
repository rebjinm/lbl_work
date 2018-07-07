<!DOCTYPE html>
<html>
<head>
	<title>ADAPT Abstract</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<p><a href="index.html">Back to ADAPT Home</a></p>
<h1>Abstract</h1>
<p>Large-scale science applications are expected to generate exabytes of data over the next 5 to 10 years. With
scientific data collected at unprecedented volumes and rates, the success of large scientific collaborations will
require that they provide distributed data access with improved data access latencies and increased reliability
to a large user community. To meet these requirements, scientific collaborations are increasingly replicating
large datasets over high-speed networks to multiple sites. The main objective of this work is to develop and
deploy a general-purpose data access framework for scientific collaborations that provides lightweight
performance monitoring and estimation, fine- grained and adaptive data transfer management, and
enforcement of site and VO policies for resource sharing. Lightweight mechanisms will collect monitoring
information from data movement tools without putting extra loads on the shared resources. Data transfer
management mechanisms will select transfer properties based on each transfer’s performance estimation
and will adapt those properties when observed performance changes due to the dynamic load on storage,
network and other resources. Finally, policy- driven resource management using Virtual Organization policies
regarding replication and resource allocation will balance user requirements for data freshness with the load
on resources.</p>
<p>Intellectual merit: The team will produce a software framework that will improve the ability of distributed
scientific collaborations to provide efficient access to replicated datasets by a large community of users; this
framework will combine fine-grained transfer management, transfer advice from policy- driven resource
management, and light-weight monitoring.</p>
<p>Broader impact: The proposed development will facilitate scientific advances in many domains that
increasingly depend on replication and sharing of ever-growing datasets.</p>
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>
