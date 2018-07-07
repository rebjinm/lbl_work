<!DOCTYPE html>
<html>
<head>
<title>Call20100311</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<p><a href="https://sdm.lbl.gov/stornet/stornet-meetings.html">Back to StorNet Meetings</a></p>
<h1>Mar. 11, 2010</h1>
<p>Attendees: Dantong, Dmitrios, Xin, Arie, Junmin</p>
<h2>Technical discussion</h2>
<ul>
<li>API discussion</li>
<ul>
<li>TReserveRequest::timeout assigned by user is a relative time in seconds (for future use)</li>
<li>The one in TResponse (requestExpireationTime) is aboslute time.</li>
</ul>
<li>TBandwidthRequestParameter</li>
<ul>
<li>The minOccurs of BAGInfo should be 1? (Dimitri: maynot be able to change due to wsdl geneartion limit)</li>
</ul>
<li>Options at the request level</li>
<ul>
<li>Other than modificateRequest, which is at reservation window level, commit/status/extendtimeout requests are at request level (e.g. applies to all windows). WSDL will be changed accordingly for that.</li>
</ul>
<li>Redid the WSDL</li>
<ul>
<li>Ask Junming to make sure that we did not skip anything.</li>
</ul>
<li>Other discussions</li>
<ul>
<li>Junmin: Time out in the reservation request is in question.</li>
<li>Dimitrios: only the default value is going to be used if you do not specify.</li>
<li>Request expiration time is in UTC. Time out in the request is a relative value.</li>
<li>The minimum occurrence of reservations in a bag should be 1, in the WSDL.</li>
<li>The commit request: when we get back the request, we have a list of reservation IDs and a request ID.</li>
<li>Do we have a commit operation to a particular request? Should we use the original request ID for triggering commit operations?</li>
</ul>
</ul>
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>