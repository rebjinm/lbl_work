<!DOCTYPE html>
<html>
<head>
<title>Call20100603</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<p><a href="https://sdm.lbl.gov/stornet/stornet-meetings.html">Back to StorNet Meetings</a></p>
<h1>June 3, 2010</h1>
<p>Attendees: Dantong, Dimitrios, Xin, Junmin, Arie, Viji</p>
<h2>Status code flow in an ideal scenario</h2>
<ul>
<li>Client calls reserve()</li>
<ul>
<li>The status could be (QUEUED) until it becomes TEMPORARY</li>
<li>TeraPath waits for commit() to be called within a time period, the status then becomes RESERVED</li>
<li>If commit() is not called within expiration time, then it becomes TIME_OUT</li>
<li>Client needs to check status again at the start time of the reservation</li>
<ul>
<li>If it is ACTIVATED, then client can start using the bandwidth.</li>
<li>If a status is pulled after the end time of a reservation, then the returned status is EXPIRED.</li>
</ul>
</ul>
</ul>


<h2>DN mappings</h2>
<ul>
<li>add our DNs to the test machines on both BNL and Michigan</li>
<ul>
<li>"/DC=org/DC=doegrids/OU=People/CN=Alexander Sim 546622" asim</li>
<li>"/DC=org/DC=doegrids/OU=People/CN=Junmin Gu 111597" junmin</li>
</ul>
</ul>


<h2>Endpoint for Terapaths server</h2>
<ul>
<li>https://198.124.220.9:48583/StorNetAPI/StorNetAPI</li>
</ul>


<h2>State Transition Diagram</h2>
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>