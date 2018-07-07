<!DOCTYPE html>
<html>
<head>
<title>BDMSampleCommandsDownload</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<p><a href="index.html">Back to BDM Home</a></p>
<h1>Sample commands to download IPCC AR4 CMIP-3 datasets</h1>
<ul>
<li>Support email : srm@lbl.gov</li>
</ul>
<h2>Making the environment "faster"</h2>
<ul>
<li>Refer to the linux tuning: http://fasterdata.es.net/</li>
</ul>
<h2>Test commands before downloading from NERSC</h2>
<ul>
<li>NERSC has a specialized Data Transfer Nodes (DTN) for ESG dataset replication purpose at gsiftp://dtn02.nersc.gov:2821.</li>
<li>Access to the gridftp server and datasets should be explicit by request, and limited to the ESG collaboration and climate community.</li>
<li>1GB test file is located at gsiftp://dtn02.nersc.gov:2821//ipcc/1G.test.data</li>
<li>bdm-client or globus-url-copy can be used to test the network connection with this file path.</li>
</ul>
<ul>
<li><a href="BDMSamplePlots.html">Sample BDM transfer plots from LLNL to NERSC, Aug 2010</a></li>
</ul>
<h2>Sample commands to download IPCC data from NERSC</h2>
<ul>
<li>NERSC data (/ipcc/cmip3) from LLNL is broken into following requests and stored in the database file.</li>
<li>To download the data, please [[/bdm/bdmDB-nersc.h2.db][download the database file]], store in your $BDM_HOME/bin location, ant use the following commands as it is, including the requesttoken.</li>
</ul>
<table>
<tr>
<th>Request Id</th>
<th>Sample command</th>
<th>Data from sub dirs.</th>
<th>Total Size in TeraBytes</th>
</tr>
<tr>
<td>dtn02--1287607846241</td>
<td>bdmclient -requesttoken dtn02--1287607846241 -transferserver gsiftp://dtn02.nersc.gov:2821 -concurrency 15 -td &lt;localpath&gt; -dbpath ./bdm-nersc.h2.db</td>
<td><ul><li>data11</li><li>data1</li><li>data7</li></ul></td>
<td>5.3</td>
</tr>
<tr>
<td>dtn02--1287608064263</td>
<td>bdmclient -requesttoken dtn02--1287608064263 -transferserver gsiftp://dtn02.nersc.gov:2821 -concurrency 15 -td &lt;localpath&gt; -dbpath ./bdm-nersc.h2.db</td>
<td><ul><li>data16</li><li>data14</li></ul></td>
<td>4.1</td>
</tr>
<tr>
<td>dtn02--1287608177888</td>
<td>bdmclient -requesttoken dtn02--1287608177888 -transferserver gsiftp://dtn02.nersc.gov:2821 -concurrency 15 -td &lt;localpath&gt; -dbpath ./bdm-nersc.h2.db</td>
<td><ul><li>data2</li><li>data12</li><li>data8</li></ul></td>
<td>5.4</td>
</tr>
<tr>
<td>dtn02--1287605147028</td>
<td>bdmclient -requesttoken dtn02--1287605147028 -transferserver gsiftp://dtn02.nersc.gov:2821 -concurrency 15 -td &lt;localpath&gt; -dbpath ./bdm-nersc.h2.db</td>
<td><ul><li>data10</li><li>data18</li><li>data4</li></ul></td>
<td>6.1</td>
</tr>
<tr>
<td>dtn02--1287608373841</td>
<td>bdmclient -requesttoken dtn02--1287608373841 -transferserver gsiftp://dtn02.nersc.gov:2821 -concurrency 15 -td &lt;localpath&gt; -dbpath ./bdm-nersc.h2.db</td>
<td><ul><li>data13</li><li>commit</li></ul></td>
<td>4.2</td>
</tr>
<tr>
<td>dtn02--1287608450984</td>
<td>bdmclient -requesttoken dtn02--1287608450984 -transferserver gsiftp://dtn02.nersc.gov:2821 -concurrency 15 -td &lt;localpath&gt; -dbpath ./bdm-nersc.h2.db</td>
<td><ul><li>data5</li><li>data6</li><li>data15</li></ul></td>
<td>5.0</td>
</tr>
<tr>
<td>dtn02--1287608615372</td>
<td>dmclient -requesttoken dtn02--1287608615372 -transferserver gsiftp://dtn02.nersc.gov:2821 -concurrency 15 -td &lt;localpath&gt; -dbpath ./bdm-nersc.h2.db</td>
<td><ul><li>data17</li><li>1pctto2x</li></ul></td>
<td>3.7</td>
</tr>
<tr>
<td>dtn02--1287608702625</td>
<td>bdmclient -requesttoken dtn02--1287608702625 -transferserver gsiftp://dtn02.nersc.gov:2821 -concurrency 15 -td &lt;localpath&gt; -dbpath ./bdm-nersc.h2.db</td>
<td><ul><li>slabcntl</li></ul></td>
<td>.3</td>
</tr>
<tr>
<td>dtn02--1287608764068</td>
<td>bdmclient -requesttoken dtn02--1287608764068 -transferserver gsiftp://dtn02.nersc.gov:2821 -concurrency 15 -td &lt;localpath&gt; -dbpath ./bdm-llnl.h2.db</td>
<td><ul><li>data3</li><li>data9</li></ul></td>
<td>3.6</td>
</tr>
</table>
<h2>Sample commands to download IPCC data from LLNL</h2>
<ul>
<li>IPCC data (/export/ftp/pub/dean/ipcc) from LLNL is broken into following requests and stored in the database file.</li>
<li>To download the data, please [[/bdm/bdmDB-llnl.h2.db][download the database file]], store in your $BDM_HOME/bin location, ant use the following commands as it is, including the requesttoken.</li>
</ul>
<table>
<tr>
<th>Request Id</th>
<th>Sample command</th>
<th>Data from sub dirs.</th>
<th>Total Size in TeraBytes</th>
</tr>
<tr>
<td>dtn01--1285867142479</td>
<td>bdmclient -requesttoken dtn01--1285867142479 -transferserver gsiftp://gdo2.ucllnl.org,gsiftp://gdo126.ucllnl.org -concurrency 15 -td -dbpath ./bdm-llnl.h2.db</td>
<td><ul><li>data11</li><li>data1</li><li>data7</li></ul></td>
<td>5.3</td>
</tr>
<tr>
<td>dtn01--1285866979032</td>
<td>bdmclient -requesttoken dtn01--1285866979032 -transferserver gsiftp://gdo2.ucllnl.org,gsiftp://gdo126.ucllnl.org -concurrency 15 -td -dbpath ./bdm-llnl.h2.db</td>
<td><ul><li>data16</li><li>data14</li></ul></td>
<td>4.1</td>
</tr>
<tr>
<td>dtn01--1285866785956</td>
<td>bdmclient -requesttoken dtn01--1285866785956 -transferserver gsiftp://gdo2.ucllnl.org,gsiftp://gdo126.ucllnl.org -concurrency 15 -td -dbpath ./bdm-llnl.h2.db</td>
<td><ul><li>data2</li><li>data12</li><li>data8</li></ul></td>
<td>5.4</td>
</tr>
<tr>
<td>dtn01--1285866683991</td>
<td>bdmclient -requesttoken dtn01--1285866683991 -transferserver gsiftp://gdo2.ucllnl.org,gsiftp://gdo126.ucllnl.org -concurrency 15 -td -dbpath ./bdm-llnl.h2.db</td>
<td><ul><li>data10</li><li>data18</li><li>data4</li></ul></td>
<td>6.1</td>
</tr>
<tr>
<td>dtn01--1285867320945</td>
<td>bdmclient -requesttoken dtn01--1285867320945 -transferserver gsiftp://gdo2.ucllnl.org,gsiftp://gdo126.ucllnl.org -concurrency 15 -td -dbpath ./bdm-llnl.h2.db</td>
<td><ul><li>data13</li><li>commit</li></ul></td>
<td>4.2</td>
</tr>
<tr>
<td>dtn01--1285867427393</td>
<td>bdmclient -requesttoken dtn01--1285867427393 -transferserver gsiftp://gdo2.ucllnl.org,gsiftp://gdo126.ucllnl.org -concurrency 15 -td -dbpath ./bdm-llnl.h2.db</td>
<td><ul><li>data5</li><li>data6</li><li>data15</li></ul></td>
<td>5.0</td>
</tr>
<tr>
<td>dtn01--1285867550331</td>
<td>dmclient -requesttoken dtn01--1285867550331 -transferserver gsiftp://gdo2.ucllnl.org,gsiftp://gdo126.ucllnl.org -concurrency 15 -td -dbpath ./bdm-llnl.h2.db</td>
<td><ul><li>data17</li><li>1pctto2x</li></ul></td>
<td>3.7</td>
</tr>
<tr>
<td>dtn01--1285867609642</td>
<td>bdmclient -requesttoken dtn01--1285867609642 -transferserver gsiftp://gdo2.ucllnl.org,gsiftp://gdo126.ucllnl.org -concurrency 15 -td -dbpath ./bdm-llnl.h2.db</td>
<td><ul><li>slabcntl</li></ul></td>
<td>.3</td>
</tr>
<tr>
<td>dtn01--1285867658184</td>
<td>bdmclient -requesttoken dtn01--1285867658184 transferserver gsiftp://gdo2.ucllnl.org,gsiftp://gdo126.ucllnl.org -concurrency 15 -td -dbpath ./bdm-llnl.h2.db</td>
<td><ul><li>data3</li><li>data9</li></ul></td>
<td>3.6</td>
</tr>
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>