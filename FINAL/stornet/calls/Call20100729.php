<!DOCTYPE html>
<html>
<head>
<title>Call20100729</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<p><a href="https://sdm.lbl.gov/stornet/stornet-meetings.html">Back to StorNet Meetings</a></p>
<h1>July 29, 2010</h1>
<p>Attendees: Dantong, Dimitrios, Xin, Junmin, Viji, Alex</p>
<h2>Testbed</h2>
<ul>
<li>We do not have the testbed at this moment because Internet2 changed their network to Juniper, from DCN to ION.</li>
<li>The peering with ESnet was restored. The Merit network (Michigan regional network) does not have the peering point yet. They plan to fix it in a week (8/5/2010).</li>
<li>We are getting some new nodes at University of Michgan (two 10Gbps nodes ). We have to set up the GridFTP servers again.</li>
<li>We are waiting for a new node (new control node) at BNL.</li>
<li>We plan to bring up a secondary terapaths service node(testbed of the testbed).</li>
<li>The maximum bandwidth with the new nodes is 10Gbps. With the current node, we can do 1 Gpbs. We start small, and ramp up afterward.</li>
</ul>


<h2>Test cases</h2>
<ul>
<li>three cases: one request with one file, one request with multiple files, and multiple requests each having multiple files.</li>
</ul>


<ul>
<li>For test case 2.3. Will the different users be treated same or different?</li>
<li>(Dimitrios) The user management part in TeraPaths is under development. At this moment, the different clients are treated in the same way.</li>
<ul>
<li>Some discussion about the ephemeral port range and how to differentiate different requests which might use the same ephemeral port.</li>
</ul>
</ul>


<h2>BeStMan</h2>
<ul>
<li>BestMan client part is ready. Internal change is completed. BeStMan is able to talk to the TeraPaths API.</li>
</ul>


<h2>SC10</h2>
<ul>
<li>Dantong will arrange with the BNL site coordinator for the demo at BNL booth.</li>
<li>source and destination between BNL and University of Michigan.</li>
<li>We need to show how the reservation is going; the status of each fragment of the network.</li>
<li>We also show how BeStMan uses the reserved bandwidth.</li>
<ul>
<li>Possibility of using Dan Gunter's NetLogger server based on GridFTP logs - showing web based graphs.</li>
<li>A web based graphical interface is going to be created to display the ganglia plots.</li>
</ul>
</ul>
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>