<!DOCTYPE html>
<html>
<head>
<title>Call20101202</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<p><a href="https://sdm.lbl.gov/stornet/stornet-meetings.html">Back to StorNet Meetings</a></p>
<h1>Dec. 2, 2010</h1>
<p>Attendees: Dantong, Dimitrios, Junmin, Viji</p>
<ul>
<li>Project plan review</li>
<ul>
<li>Current status</li>
<ul>
<li>TeraPaths: working on negociation part</li>
<li>BeStMan: Item 5 and 6 needs explanation from Alex</li>
<ul>
<li>#5 Currently we use SRM client and interface. We would like to have a separate client interface for the bandwidth reservation, so that client makes bandwidth reservation first, checks the status, and then makes SRM requests based on the bandwidth reservation.</li>
<li>#6 This is the bestman-bestman coordination API/interface for storage bandwidth reservation and status check.</li>
<li>bestman will need to finish up negociation test, multi-request test and db integration.</li>
</ul>
<li>Existing project plan</li>
<ul>
<li>LBNL</li>
<ul>
<li>#1 is not completed yet</li>
<li>#2, #7, #8, #9 are completed</li>
<li>#3, #4 are in progress</li>
<li>#5, #6 need clarification and discussion.</li>
<li>#10 is completed. We have one request with one file. Intention is for bestman to handle many requests asking reservations.</li>
<li>#11 is for setup the bestman between BNL and LBNL.  #11 is about test plan for STAR. We will need to ask PDSF and Jerome the test feasibility. For the testbed on DOE sites, we should use ESnet ANI tabletop testbed which will give us root access to the kernel and possible access to switches and routers. The testbed will be back online in Feb. 2011. Until then we should continue using BNL-UMich, our current friendly testbed.</li>
<li>We will need to test multiple transfers in one single request,  migrate to a large database,  need to update the bandwidth information if the TeraPaths returns a different reservation as a result of negotiation.</li>
</ul>
<li>BNL</li>
<ul>
<li>#1: we choose layer 2.    Uni or bi directional?</li>
<li>#2: 2.1 and 2.2 are done,  2.3-2.5?</li>
<li>#3, #4, #5, #6: Done.</li>
<li>#7: We will focus on our effort to setup this testbed between  BNL and LBNL. For STAR use case, we need a discussion with PDSF and Jerome to start with.</li>
<li>For the next six months, complete the functions of API, and implement the negotiation.</li>
</ul>
</ul>
</ul>
</ul>
</ul>
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>