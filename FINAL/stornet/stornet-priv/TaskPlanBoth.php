<!DOCTYPE html>
<html>
<head>
<title>TaskPlanBoth</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<p><a href="index.html">Back to StorNet Private Area</a></p>
<h1>Tasks for Management plane (Combination of TeraPaths and BeStMan)</h1>
<p>(all figures following tasks show: (start month, length of task in months)</p>
<ul>
<li>Monitoring (2, 4) - 9/2009</li>
<ul>
<li>SRM transfer monitoring (design, maybe put in DB)</li>
<li>Circuit health monitoring by TeraPaths</li>
</ul>
<li>Diagnosis (6, 6)</li>
<ul>
<li>Dynamic bandwidth check by SRM, calling TP</li>
<li>Query reservation status</li>
</ul>
<li>Error handling (12, 6)</li>
<ul>
<li>Dynamic failover to best effort network and reacquire network circuit for the remaining data transfer (12,2)</li>
<li>Redundancy mode (acquire more than one circuits and failover to backup(s) instead of best effort) (14,2)</li>
<li>Notify SRM about unrecoverable failures. (16,2)</li>
</ul>
</ul>
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>