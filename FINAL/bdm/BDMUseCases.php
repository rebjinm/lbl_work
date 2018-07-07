<!DOCTYPE html>
<html>
<head>
<title>BDMUseCases</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<p><a href="index.html">Back to BDM Home</a></p>
</table>
<h1>Use Cases</h1>
<p>We described below two use cases: data movement between nodes and data movement from a node to a client (user) site. We expect that each will require a different software tool. However, there are several scenarios that can use the same tool. For this reason, we labeled the three scenarios in use case 1, as scenarios 1.1, 1.2, 1.3. Similarly, we labeled the two scenarios in use case 2 as scenarios 2.1, 2.2.</p>
<h2><a name="UseCase1"></a>Use Case 1: Move data between nodes</h2>
<p>*Scenario 1.1*</p>
<ul>
<li>A data node publishes a new dataset to its gateway</li>
<li>Another node needs to get some subset of the data</li>
<li>Example: PCMDI node needs to get 10% a published dataset from NCAR node (in order to generate or augment core dataset)</li>
<li>Target node (PCMDI) pulls data (can be initiated by a person or a service)</li>
<li>A requestID is returned, and transfer start asynchronoeously (background job)</li>
<li>Target administrator can check status of request using requestID</li>
<li>Size: increments are typically 10-20 TBs.</li>
<li>Note - a subsequent step by replica service is: PCMDI node get the corresponding metadata, publishes that to its gateway, and links the metadata to the physical files</li>
</ul>
<p>*Scenario 1.2*</p>
<ul>
<li>Data needs to be mirrored from source node to a target node</li>
<li>Example: BADC node (Germany) needs to mirror all or part of core data from PCMDI node</li>
<li>Mirroring (target) node is notified, and initiates bulk transfer "manually" - i.e. invokes a local client to pull data</li>
<li>A requestID is returned, and transfer start asynchronoeously (background job)</li>
<li>Target administrator can check status of request using requestID</li>
<li>Note: the above step may be automated at a later stage</li>
<li>Size: 10-500 TBs depending on what target node requests</li>
<li>Note - a subsequent step by target node administrator or some service:</li>
<li>Target node get the corresponding metadata, publishes that to its gateway, and links the metadata to the physical files</li>
</ul>
<p>*Scenario 1.3*</p>
<ul>
<li>A data node wishes to collect data from multiple source nodes in order to generate summary or visualization products</li>
<li>The target node initiates the data transfer by pulling data from the source nodes</li>
<li>A requestID is returned, and transfer start asynchronoeously (background job)</li>
<li>Target administrator can check status of request using requestID</li>
<li>Size: probably a few TBs - depending on purpose</li>
<li>Issue: should client at target be able to issue a single request to all source nodes</li>
<li>In principle - it is desirable and a natural extension of the bulk transfer client, but initially we assume this will be done from each source node at time, or by invoking the data movement client multiple times</li>
</ul>
<h2><a name="UseCase2"></a>Use Case 2: Move data from a node to a client (user) site</h2>
<p>*Scenario 2.1*</p>
<ul>
<li>A user contacts a gateway, and uses metadata to identify data he/she wishes to get</li>
<li>Note: case not considered here - if volume of data requested is small (a few files), the user can pull these file directly (using wget, https, ...). Gateway may have to pull files into its cache first.</li>
<li>Assume data volume is large - many GBs - few TBs</li>
<li>Gateway returns a requestID to user</li>
<li>User can check status of request using requestID</li>
<li>User can start "request client" right away</li>
<li>Gateway gets files into user's allocated space</li>
<li>User's request client pull data</li>
<li>Note: gateway may need to get files from remote locations/archives to user's allocated space</li>
</ul>
<p>*Scenario 2.2*</p>
<ul>
<li>A user contacts a gateway, and uses metadata to identify data he/she wishes to get</li>
<li>Note: case not considered here - if volume of data requested is small (a few files), the user can pull these file directly (using wget, https, ...). Gateway may have to pull files into its cache first.</li>
<li>Assume data volume is large - many GBs - few TBs</li>
<li>Gateway returns a requestID to user</li>
<li>User can start "request client" right away</li>
<li>User can check status of request using requestID</li>
<li>Request client pulls files directly from source nodes</li>
<li>Suggestion: consider that a task for a later stage</li>
</ul>
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>