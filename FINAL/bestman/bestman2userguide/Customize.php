<!DOCTYPE html>
<html>
<head>
<title>Customize</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<h1>Customizations and Plug-ins</h1>
<p>BeStMan2 has ways for sites to customize the behavior and to plug in specialized mass storage systems.</p>
<h2>Customized Transfer Protocol Selection Policy</h2>
<p>1. User can define transfer selection plugin for BeStMan2.</p>
<p>2. Configuration entries &ldquo;protocolSelectionPolicy&rdquo; and &ldquo;pluginLib&rdquo;<br> Each plugin entry must define the class name, jar file name, and the procotol name the policy applies to. Key values are "class", "jarFile" and "name", and they are separated by "&". Multiple plugin entries for different protocols can be defined, and must be seperated by ";". When two or more plugin entries are defined for the same protocol, the last entry will be used.<br><br> For example, when two entries are defined for gsiftp and http respectively;<br>protocolSelectionPolicy=class=plugin.NotRoundRobin1&jarFile=p1.jar&name=gsiftp;class=plugin.NotRoundRobin2&jarFile=p2.jar&name=http<br><br>If key "name=" is missing, and there is only one plugin entry, then the policy would be used on all protocols.<br><br>Another configuration entry "pluginLib" must be defined to provide the directory where the user defined jar files are located. <br>e.g. pluginLib=/opt/bestman/lib/plugin</p>
<p>3. Interface implementation<br>The interface that need to implement is:</p>
<pre>
package gov.lbl.srm.policy;
public interface ISRMSelectionPolicy {
    public Object getNext();
    public void setItems(Object[] objs);
}
</pre><p> BeStMan2 server uses getNext() to retrieve the next available "host:port" or "host" list. For example, "gsiftp1.mydomain.edu:2811" or "gsiftp1.mydomain.edu" when default port is used.<br> BeStMan2 server calls the setItems() to supply the list of available selections, if defined by the supportedProtocols entry in the conf file. supportedProtocols is optional, and when it is not defined, setItems() is called with the default value which is the host name where bestman server process is running on. Although setItems() sets the list of transfer server choices, getNext() may have more than what is provided in supportedProtocols, specially when a new transfer server is added to the list.<br><br>Sample implementation is following:</p>
<pre>
public class NotRoundRobin implements gov.lbl.srm.policy.ISRMSelectionPolicy {
   int _count = -1;
   Object[] _itemArray = null;
   public Object getNext() {
       Object result = null;
       if (_itemArray = null) {
           result = _itemArray[0];
       }
       return result;
   }
   public void setItems(Object[] col) {
       _itemArray = col;
       _count = 0;
   }
}
</pre><p> The values of objects are like "host:port" e.g. "bestman.lbl.gov:2811".</p>
<h2>Customized MSS Support</h2>
<ul>
<li>User can extend MSS support for BeStman2</li>
<li>Follow the instruction below to write your custom plug-in. Pack it as a jar file.</li>
<li>Assuming that custom mss plug-in is stored in "/my/foo/dir/foo.jar" and your name space is "plugin.my.mss", modify conf/bestman.rc entries as following:</li>
<ul>
<li>pluginDir=/my/foo/dir</li>
<li>CustodialQualityStorageMB=[0]path=/any/path&type=plugin.my.mss&jarFile=foo.jar&host=msshost.domain.tld&conf=mymss.rc</li>
<ul>
<li>The keywords for CustodialQualityStorageMB is:</li>
<ul>
<li>[0]: indicates that no need for BeStMan to keep track of the usage of the plug-in device.</li>
<li>path: is the home path for each usage. This can be left as an empty string if not needed.</li>
<li>type: is the name space of customized mss plug-in</li>
<li>jarFile: is name of the mss plug-in jar file</li>
<li>host: is the host name that the device is on, e.g. archive.nersc.gov</li>
<li>conf: is the configuration file that the plug-in library needs, example: hpss.init.rc</li>
</ul>
</ul>
</ul>
<li>Instructions for extending the MSS plug-in class with BeStMan2</li>
<li>Look at this java file to extend and implement: <a href="http://sdm.lbl.gov/bestman/docs/SRM_MSSIntf.java">SRM_MSSIntf.java</a></li>
<li>If queue support is needed, extend the super class SRM_MSS too. If queue support is not needed, then there is no need to extend SRM_MSS class.</li>
<li>For a plain sample files, look into this file <a href="http://sdm.lbl.gov/bestman/docs/SRM_MSS_TEST.java">SRM_MSS_TEST.java</a>. This is a plain implementation without extending SRM_MSS.</li>
<li>For extending super class sample, look into this file <a href="http://sdm.lbl.gov/bestman/docs/SRM_MSS_TESTE.java">SRM_MSS_TESTE.java</a>. This is an implementation with extending SRM_MSS classs.</li>
<li>To test the plug-in, see this example <a href="http://sdm.lbl.gov/bestman/docs/Test_MSS_TEST.java">Test_MSS_TEST.java</a></li>
</ul>
<br>
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>