<!DOCTYPE html>
<html>
<head>
<title>Call20091203</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<p><a href="https://sdm.lbl.gov/stornet/stornet-meetings.html">Back to StorNet Meetings</a></p>
<h1>Dec. 3, 2009</h1>
<ul>
<li>Co-scheduling discussion:</li>
<ul>
<li>Generalized coordinated schedule for multiple resources. Leave this item for discussion in January's face to face meeting. Module needs to know the commitment of all resources to make co-scheduling decision. OSCARS does not provide the full commitment picture. In the future, we can look into the OSCARS. So far, we need to look into source SRM, destination SRM, and TeraPaths, and look for the best match. A co-scheduling might be a follow-up project after StorNet finishes.</li>
</ul>
<li>Project Report:</li>
<ul>
<li>Short report. We can have a boilerplate for the summary that is same for both BNL and LBNL. Each site needs to submit a separate report.</li>
<li>August 01, 2009 is the beginning date of the project.</li>
<li>December 14, 2009 is the target date for completing the report and reviewing for each other.</li>
</ul>
<li> Progress report sine the starting time</li>
<li> Deliverables in time-lined tasks and what was done.</li>
<ul>
<li>Next Face to Face meeting:</li>
<ul>
<li>January 27 and 28 for 1.5 days.</li>
<li>Email to reserve our parking space, and instruction. Dantong will send email to Rachel to ask for parking reservation.</li>
</ul>
</ul>
</ul>


<h2>Technical Discussion of BeStMan-to-TeraPaths interface</h2>
<p>Dimitrios:</p>
<ul>
<li>Went through TeraPaths code.</li>
<li>Updated document for API.</li>
<li>Went through the draft specification.</li>
<li>Could be more than one solution that can satisfy the reservation request.</li>
<li>Two options: shortest completion time or shortest transfer duration. Should we include this as an option into the API? Yes, we can have an option for the shortest completion time, the shortest transfer time or nothing. The default one will be &ldquo;do not care&rdquo;. Only return one transfer time window for now. As a long term goal, an interface for more than one window for a single request need to be developed to improve data transfer efficiency. (some discussion on how to handle multi-window, i.e. each window should have its own reservation ID).</li>
</ul>


<p>Junmin&rsquo;s comments to the current TeraPaths interface:</p>
<ul>
<li>Some question regarding 60 seconds to commit after reservation. It might not be long enough for SRM to react.</li>
<li>Dimitrios: This 60 second will be internal to TeraPaths. SRM does not need to worry about it in reserveAndCommit call.</li>
<li>Remove the obsolete entries in the WSDL.</li>
<li>The returned data structure should include the proper error messages.</li>
<li>TeraPaths needs to have a separate set of interface for StorNet project. The StorNet interface does not need to include the interfaces that are not directly related with StorNet.</li>
<li>The source and destination parameters should be flexible to allow clients to pick host, subnet. Suggest to use entries of &ldquo;Key/Value&rdquo; pair.</li>
<li>Agreed on the time representation. Use long integer to represent time in milliseconds. Need to convert to UTC when needed for human readable format.</li>
<li>getReservationStatus(): What will be returned in the call? Dimitrios will propose a set of information as status. TeraPaths will include this functionality in the first version.</li>
</ul>


<p>Xin:</p>
<ul>
<li>Have implemented simulation platform.</li>
<li>Simulate different reservation mechanisms in TeraPaths.</li>
<li>Simulate the scalability of TeraPaths. For example, we can simulate the multi-window reservation for a particular request and evaluate the effectiveness.</li>
</ul>


<p>Alex:</p>
<ul>
<li>Setup the web site, and provided access to everyone involved: http://sdm.lbl.gov/stornet</li>
<li>The email list is setup</li>
<li>The draft StorNet interface (BeStMan-TeraPaths interface) is posted on the web. Dimitrios can make comments and update to the interface.</li>
</ul>


<p>Action items</p>
<ul>
<li>Progress report</li>
<li>StorNet interface update</li>
</ul>
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>