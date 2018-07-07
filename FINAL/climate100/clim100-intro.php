<!DOCTYPE html>
<html>
<head>
	<title>Climate 100 Intro</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
	<p><a href="index.html">Back to Climate 100 Home</a></p>
	<h1>Climate100: Scaling the Earth System Grid to 100 Gbps Networks</h1>
	<p>The climate community faces a rising tide of data as high performance computing enters the petascale era and
	more sophisticated Earth system models provide greater scientific utility. With many extraordinarily large data
	warehouses located globally, researchers will depend heavily on high performance networks to access distributed
	data, information, models, analysis and visualization tools, and computational resources. In this highly
	collaborative decentralized problem-solving environment, a faster network—on the order of 10 to 100 times faster
	than what exists today—will be needed to deliver data to scientists when they need it and to permit comparison
	and combination of large (sometimes 100s of TB) datasets generated at different locations. These goals cannot
	be achieved using today’s 10 Gigabit per second (Gbps) networks. Therefore we need to ensure the ESG
	architecture scales to the next generation network speeds of 100 Gbps and ultimately beyond. Climate100 will
	integrate massive climate datasets, emerging 100 Gbps networks, and state-of-the-art data transport and
	management technologies to enable realistic at-scale experimentation with climate data management, transport,
	and analysis in a 100 Gbps, 100 Petabyte world.</p>
	
	<h2>Introduction</h2>
	<p>Based on current growth rates, the climate community presents a real need for networks far faster than those
	available today—both now and in the future. Climate model data is projected to exceed hundreds of exabytes (1
	EB = 10^18 bytes) by 2020 [BESNetwork2007]. To provide the international climate community with convenient
	access to these data and to maximize scientific productivity, these data need to be replicated and cached at
	multiple locations around the world [ExtremeScale2009]. Unfortunately, establishing and managing a distributed
	data system presents several significant challenges not only to system architectures and application development,
	but also to the existing wide area and campus networking infrastructures.</p>
	<p>The Internet has always been an integral part of the climate community. Connecting people, organizations,
	bureaucracies, government agencies and academia, the Internet has been used mainly for communication and
	coordination, with the occasional need to transfer large amounts of data for specific research and investigations.
	More recently, with the advent of Grid computing, the climate community has adopted a distributed computing
	approach to investigating climate change. Supercomputers run large complex climate models, store and catalog
	output data to long- or short-term storage in place, then grant remote users secure access to data and climate
	resources, either through a web browser or a specific climate application [BAMS2009]. While compute servers in
	this Grid environment can lessen the need for network traffic to end user sites by doing data reduction and data
	manipulation computers before transferring data, there is still a frequent need to move vast amounts of data to
	and from sites for scientific purposes. Models are run wherever there is available computer time, and those
	locations may not be the right places for long-term storage. Increasingly, climate scientists want to perform
	ensemble simulations, in which multiple copies of the same model are run and then intercompared, for example to
	develop regionally resolved probability distribution functions (PDFs) for climate outputs such as precipitation and
	temperature. Frequently, these simulations will be performed at different locations, in which case the various
	datasets must be brought together for comparison. Another frequent reason for needing to move datasets is to
	perform model intercomparisons. During the fourth IPCC assessment (AR4), intercomparisons were facilitated by
	bringing designated model output to the Program for Climate Model Diagnosis and Intercomparison (PCMDI)
	[BAMS2009]. Such a centralized approach will no longer be possible in the future, due to the vast data sets that
	will be produced by the next generation of climate models.
	Continued exponential growth in data volumes and an increasingly distributed set of data producers and data
	consumers mean that the climate community’s network needs will remain strong now and in the future. We
	propose the Climate100 project with the goal of ensuring that this community is ready to deal with 100+ PB data
	and 100+ Gbps networks. Integrating the latest networks, computer systems, datasets, and software
	technologies, Climate100 will enable at-scale experimentation and analysis of data transport and Internet use for
	peta- and exascale data. The results of this work will improve understanding of network technologies and the
	climate community to transition to a 100 Gbps network for production and research.</p>
	
	<p>Climate100 brings together participants from three areas: applications, infrastructure, and middleware/network
	research.</p>
	
	<p>In the application area, Climate100 will include the active participation of ESG-CET to ensure that testbed and
	technology development activities focus on the specific needs of the climate community. ESG-CET will participate
	in the following areas:</p>
	<ul>
	<li>Provide real data and use cases scenarios for project testing and experimentation;</li>
	<li>Get climate data into the testbed via specified use case scenarios using scaled ESG-CET “Gateway” and

	“Data Nodes” technologies described below;</li>
	<li>Connect testbed to important ESnet sites (i.e., ANL, LLNL, NCAR, ORNL, LBNL) - These sites have
	already been established as ESG-CET “Data Node” sites where data and resources must be distributed;
	and</li>
	<li>Ready and coordinate crosscutting efforts to transfer from the current 10 Gbps network to the future 100
	Gbps production network.</li>
	</ul>
	<p>In the infrastructure area, Climate100 will also include the active participation of ESnet, who will provide the 100
	Gbps network used for experimentation, and collaborate with Climate100 researchers to ensure that
	instrumentation required for effective end-to-end transfers is available.</p>
	<p>Finally, Climate100 will include middleware and network researchers. Once end-to-end 100 Gbps connectivity has
	been provided, the effective use of that network connectivity for climate science is a middleware and network
	problem.</p>
	
	<h3>References</h3>
	<ul>
	<li>[BESNetwork2007] BES Science Network Requirements Workshop: 2007. <a href="http://www.es.net/pub/esnet-doc/BES-Net-Req-Workshop-2007-Final-Report.pdf">http://www.es.net/pub/esnet-doc/BES-Net-Req-Workshop-2007-Final-Report.pdf</a></li>

	<li>[ExtremeScale2009] Williams et al., “Extreme Scale Computing Workshop: Challenges in Climate Change Science and the Role of Computing at the Extreme Scale” 2008. <a href="http://esg-pcmdi.llnl.gov/publications_and_documents/Extreme_Scale_Data_Mgmt_Panel">http://esg-pcmdi.llnl.gov/publications_and_documents/Extreme_Scale_Data_Mgmt_Panel Report.pdf</a></li>

	<li>[BAMS2009] Williams et al., “The Earth System Grid: Enabling Access to Multimodel Climate Simulation
	Data”, in the Bulletin of the American Meteorological Society, February 2009.
	<a href="http://ams.allenpress.com/perlserv/?request=get-abstract&doi=10.1175/2008BAMS2459.1">http://ams.allenpress.com/perlserv/?request=get-abstract&doi=10.1175/2008BAMS2459.1</a></li>

	<li>[ESGWebsite] Earth System Grid Center For Enabling Technologies (ESG-CET) website, 2009. <a href="http://esg-pcmdi.llnl.gov">http://esg-pcmdi.llnl.gov</a></li>
	</ul>
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>