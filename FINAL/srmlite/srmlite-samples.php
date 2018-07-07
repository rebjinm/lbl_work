<!DOCTYPE html>
<html>
<head>
	<title>SRMLite Sample Commands</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<p><a href="index.html">Back to SRM Lite Home</a></p>
<h1>SRMLite Sample Commands (partial list)</h1>

<h2>Introduction</h2>
<ul>
	<li>SRMLite is a client tool to automate file movement behind a firewall.</li>
	<li>It automates movement of multiple files to/from client's directory to a remote site.</li>
	<li>Supports entire directory transfers.</li>
	<li>Recover from mid-transfer interruption and machine failure.</li>
	<li>Pulls files into user's workstation.</li>
	<li>Supports multiple transfer protocols (GridFTP, scp ...)</li>
	<li>Has a GUI that shows transfer progress.</li>
	<li>Supports a command line interface.</li>
</ul>

<h2>SampleCommands</h2>
<ul>
	<li><strong>Put files/dirs from localsourcdir to remotetargetdir using SCP.</strong></li>
	<ul>
		<li>Transfer localsourcedir to remotetargetdir recursively.</li>
		<ul>
			<li>e.g. srmlite /path/localsourcedir/</li>
			<li>scp://username@hostname:/remotepath/remotetargetdir/ -r</li>
		</ul>
		<li>Transfer localsourcefile to remotetargetlocation with user specified filename.</li>
		<ul>
			<li>e.g. srmlite /path/localsourcedir/localfile</li>
			<li>scp://username@hostname:/remotepath/remotetargetdir/userremotefilename</li>
		</ul>
		<li>Transfer localsourcefile to remotetargetlocation with default name</li>
		<ul>
			<li>e.g. srmlite /path/localsourcedir/localfile</li>
			<li>scp://username@hostname:/remotepath/remotetargetdir/</li>
		</ul>
		<li>Transfer a sample.bp file and its sample.bp.dir contents in one single command</li>
		<ul>
			<li>e.g. srmlite /path/localsourcedir/sample.bp</li>
			<li>scp://username@hostname:/remotepath/remotetargetdir/ -bp</li>
		</ul>
	</ul>
		
	<li><strong>Put files/dirs from localsourcdir to remotetargetdir using GSIFTP.</strong></li>
	<ul>
		<li>Transfer localsourcedir to remotetargetdir recursively.</li>
		<ul>
			<li>e.g. srmlite /path/localsourcedir/</li>
			<li>gsiftp://dtn01.nersc.gov:2811//remotepath/remotetargetdir/ -r</li>
		</ul>
		<li>Transfer localsourcefile to remotetargetlocation with user specified filename.</li>
		<ul>
			<li>e.g. srmlite /path/localsourcedir/localfile</li>
			<li>gsiftp://dtn01.nersc.gov:2811//remotepath/remotetargetdir/userremotefilename</li>
		</ul>
		<li>Transfer localsourcefile to remotetargetlocation with default name</li>
		<ul>
			<li>e.g. srmlite /path/localsourcedir/localfile</li>
			<li>gsiftp://dtn01.nersc.gov:2811//remotepath/remotetargetdir/</li>
		</ul>
	</ul>
	
	<li><strong>Pull files/dirs from remotesourcedir to localtargetdir using SCP.</strong></li>
	<ul>
		<li>Pull from remotesourcedir to localtargetdir recursively.</li>
		<ul>
			<li>e.g. srmlite scp://username@hostname//remotepath/remotesourcedir/</li>
			<li>/path/localtargetdir/ -r</li>
		</ul>
		<li>Pull from remotesourcelocation to localtargetdir with user specified filename.</li>
		<ul>
			<li>e.g. srmlite</li>
			<li>scp://username@hostname//remotepath/remotesourcedir/remotefilename</li>
			<li>/path/localtargetdir/userdefinedname</li>
		</ul>
		<li>Pull from remotesourcelocation to localtargetdir.</li>
		<ul>
			<li>e.g. srmlite</li>
			<li>scp://username@hostname//remotepath/remotesourcedir/remotefilename</li>
			<li>/path/localtargetdir/</li>
		</ul>
		<li>Transfer a sample.bp file and its sample.bp.dir contents in one single command</li>
		<ul>
			<li>e.g. srmlite scp://username@hostname:/remotepath/remotetargetdir/sample.bp</li>
			<li>/path/localtargetdir/ -bp</li>
		</ul>
	</ul>
	
	<li><strong>Pull files/dirs from remotesourcedir to localtargetdir using GSIFTP.</strong></li>
	<ul>
		<li>Pull from remotesourcedir to localtargetdir recursively.</li>
		<ul>
			<li>e.g. srmlite gsiftp://dtn01.nersc.gov:2811//remotepath/remotesourcedir/</li>
			<li>/path/localtargetdir/ -r</li>
		</ul>
		<li>Pull from remotesourcelocation to localtargetdir with user specified filename.</li>
		<ul>
			<li>e.g. srmlite</li>
			<li>gsiftp://dtn01.nersc.gov:2811//remotepath/remotesourcedir/remotefilename</li>
			<li>/path/localtargetdir/userdefinedname</li>
		</ul>
		<li>Pull from remotesourcelocation to localtargetdir.</li>
		<ul>
			<li>e.g. srmlite</li>
			<li>gsiftp://dtn01.nersc.gov:2811//remotepath/remotesourcedir/remotefilename</li>
		</ul>
	</ul>
</ul>
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>
