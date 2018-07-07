<!DOCTYPE html>
<html>
<head>
<title>PrototypeTestCases2010</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<p><a href='stornet-docs.html'>Back to StorNet Docs</a></p>
<h1>StorNet testbed test cases</h1>
<p>August 3, 2010</p>
<p>This document summarizes test cases for StorNet prototype testbed setup between University of Michigan and Brookhaven National Laboratory.</p>
<h2>1 Test dataset and network capability</h2>
<p>We will perform 15 minutes worth of transfers initially. Provided that there will be 10 Gbps dedicated circuit on the testbed, 1.125TB can be moved during 15 minutes at the maximum. <br> We plan to have two kinds of data files: one with all large files such as 2GB in sizes and one with smaller files, as it is easier to watch sustained bandwidth usage with larger files. We assume to have all data files already on the source storage under the management of the source BeStMan. <br> The current network maximum bandwidth on the testbed is 10 Gbps, and we plan to reserve up to the allowed bandwidth through the negotiation with ESnet and Internet2. It would be most likely somewhere around 3 Gbps. We will start with 1 Gbps and increase gradually.</p>
<h2> Test Cases</h2>
<p>We plan to have three test request cases for each kind of data: a simple request, a larger request, and multiple requests. The following test cases are targeted for the StorNet testbed between University of Michigan and Brookhaven National Laboratory.</p>
<h2>2.1 Test Case 1: simple request</h2>
<p>A simple request would contain one large file that would be copied from the source to the target. Figure 1 shows the overview of the communication flow between components on the testbed for the test case.</p>
<p> Client submits the simple request to the target BeStMan for srmCopy.</p>
<p> Target BeStMan checks the local disks for the capacity and availability.</p>
<p> Target BeStMan communicates and negotiates with source BeStMan for the capacity and availability.</p>
<p> Source BeStMan checks the local disks for the capacity and availability.</p>
<p> Target BeStMan communicates with target TeraPaths to check the bandwidth.</p>
<p> Target TeraPaths communicates and negotiates with source TeraPaths for capacity and availability.</p>
<p> Target TeraPaths communicates with OSCARS for the bandwidth capacity and availability.,</p>
<p> Target BeStMan communicates with target TeraPaths to reserve the bandwidth.</p>
<p> Target TeraPaths reserves network.</p>
<p> Target BeStMan initiates and completes GridFTP file transfer to the target disk from the source disk.</p>
<h2>2.2 Test Case 2: Large request</h2>
<p>A large request test case consists of many files in a request that would be copied from the source to the target.</p>
<h2>2.3 Test Case 3: Multiple requests</h2>
<p>A multiple requests test case consists of mixture of small and large requests, so that both storage and network bandwidth reservations can overlap the requests with different capacity, as shown in Figure 2. When the second network bandwidth reservation goes to the TeraPaths, BeStMan may receive &ldquo;network busy&rdquo; status that updating the same network bandwidth is not possible at this moment. This may result in StorNet interface updates for the status.</p>
<h2>3 Testbed Console and Web Interface</h2>
<p>We plan to have a web-based control center to visualize the data transfer plots, display various critical parameters and status along the network paths to show the state of the data transfer and performance of various components in the data transfer. <br> This web interface can be used in a demo at the exhibition floor of the Supercomputing 2010 on a large flat panel, allowing demo to start and stop the data transfers. A few exemplary plots are shown in Figure 3.</p>
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>