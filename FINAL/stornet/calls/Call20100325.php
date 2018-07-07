<!DOCTYPE html>
<html>
<head>
<title>Call20100325</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<p><a href="https://sdm.lbl.gov/stornet/stornet-meetings.html">Back to StorNet Meetings</a></p>
<h1>Mar. 25, 2010</h1>
<p>Attendees: Dimitrios, Xin, Junmin, Alex, Arie</p>
<h2>Technical discussion</h2>
<ul>
<li>WSDL interface is settled: wsdl is modified for server's convenience to handle bad inputs</li>
<ul>
<li>D started implementing</li>
</ul>
<li>Discussed on X509 credential passing over https</li>
<ul>
<li>protocol will be https, because credential from client is needed to pass to terapth through stornet</li>
</ul>
<li>Java file generation from wsdl</li>
<ul>
<li>Xin discussed the code generation from wsdl on jdk 1.6 for interface function name - upper/lower case.</li>
<li>Xin is porting stornet code from jax-rpc/jdk1.4 to jax-ws/jdk1.6.</li>
<li>wsdl generation converts all functions to lowercase names. (this is already what the current wsdl has)</li>
</ul>
<li>Dmitri is working on a setting up a simple test server based on the defined WSDL.</li>
<ul>
<li>mitrios will provide a sample client.</li>
<li>LBNL will try to make a client communication to the test server.</li>
</ul>
</ul>
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>