<!DOCTYPE html>
<html>
<head>
	<title>ESG Data Node></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<p><a href="index.html">Back to ESG Home</a></p>


<a name="ESG Data Node Deployment Experience at NERSC"><h1>ESG Data Node Deployment Experience at NERSC</h1>
<h3>Jump to:</h3>
<ul>
	<li><a href="#A Step-by-Step Installation Guide">A Step-by-Step Installation Guide</a></li>
	<li><a href="#Prerequisites">Prerequisites:</a></li>
	<li><a href="#Initializing PostgreSQL database">Initializing PostgreSQL database</a></li>
	<li><a href="#Installing CDAT (Python + CDMS)">Installing CDAT (Python + CDMS)</a></li>
	<li><a href="#Installing ESGCET (esgcet-2.4-py2.6.egg)">Installing ESGCET (esgcet-2.4-py2.6.egg)</a></li>
	<li><a href="#Tomcat Installation">Tomcat Installation</a></li>
	<li><a href="#Thredds data server (v 4.1.6)">Thredds data server (v 4.1.6)</a></li>
	<li><a href="#Security-Token-Filters and Certificate From Gateway">Security-Token-Filters and Certificate From Gateway</a></li>
	<li><a href="#Node Manager (0.0.2)">Node Manager (0.0.2)</a></li>
	<li><a href="#Globus Installation">Globus Installation</a></li>
	<li><a href="#Set Environmental Variables">Set Environmental Variables</a></li>
	<li><a href="#Test Publication">Test Publication</a></li>
	<li><a href="#Installing Necessary Components">Installing Necessary Components</a></li>
	<li><a href="#Curl">Curl</a></li>
	<li><a href="#GIT (with libcurl)">GIT (with libcurl)</a></li>
	<li><a href="#Java">Java</a></li>
	<li><a href="#Apache ANT">Apache ANT</a></li>
	<li><a href="#PostgreSQL">PostgreSQL</a></li>
</ul>
<p>This document explains our experience in ESG data node installation at NERSC.</p>
<p>Please note that there is an installation script provided at the distribution site in order to automate the process (visit <a href="http://rainbow.llnl.gov/dist">http://rainbow.llnl.gov/dist</a>). The <a href="http://rainbow.llnl.gov/dist/externals/bootstrap/esg-node">esg-node</a> script prepares environment variables, downloads required software, installs and configures all necessary components, and also checks for updates automatically. However, it requires root privileges, and some of the installation directories and path information are embedded inside the script.</p>
<p>In order to complete installation without root privileges, we have edited the installation scripts (see <a href="esg-node-nerc.html">esg-node-nerc</a> and <a href="esg-globus-nersc.html">esg-globus-nersc</a> ). Please take a look at those, you will need to change installation directory, log files, user passwords, script directory, etc. Besides, you might need to manually start/stop some services such as PostgreSQL. Here is the diff output for those modified scripts:</p>
<ul>
	<li><a href="esg-node-diff.txt.html">esg-node-patch</a><a href="http://rainbow.llnl.gov/dist/externals/bootstrap/esg-node">esg-node</a>)</li>
	<li><a href="esg-globus-diff.txt.html">esg-globus-patch</a><a href="http://rainbow.llnl.gov/dist/externals/bootstrap/esg-globus">esg-globus</a>)</li>
</ul>

<a name="A Step-by-Step Installation Guide"><h2>A Step-by-Step Installation Guide</h2>
<p>The following is a step-by-step guide to install ESG Data node components based on the information given in the <a href="http://rainbow.llnl.gov/dist/externals/bootstrap/esg-node">installation script</a> (version 0.2.9).</p>
<h3>Relevant info</h3>
<ul>
	<li>Info: <a href="http://cmip.llnl.gov/cmip5/data_node.html">http://cmip.llnl.gov/cmip5/data_node.html</a></li>
	<li>ESG Data Node distribution page - HowTo: <a href="http://rainbow.llnl.gov/dist/externals/bootstrap/HOWTO">http://rainbow.llnl.gov/dist/externals/bootstrap/HOWTO</a></li>
	<li>ESG data node documentation: <a href="http://esg-pcmdi.llnl.gov/internal/esg-data-node-documentation">http://esg-pcmdi.llnl.gov/internal/esg-data-node-documentation</a></li>
</ul>

<a name="Prerequisites"><h2>Prerequisites:</h2>
<p>Here is a list of components you need to have before starting installation. Also you need an account from ESG gateway portal (from association gateway, i.e.: <a href="http://pcmdi3.llnl.gov/esgcet">http://pcmdi3.llnl.gov/esgcet</a> - with publishing role). You will need this to authenticate with MyProxy client.</p>
<p>Note: Make sure your account has been added as a data publisher!</p>
<ul>
	<li>gcc and gmake/make</li>
	<li><a href="http://subversion.apache.org/">SVN</a> subversion</li>
	<li><a href="http://java.sun.com/">JDK</a>1.6 or a higher version (make sure JAVA_HOME is installed)</li>
	<li>1.6 or a higher version (make sure JAVA_HOME is defined)</li>
	<li>X11 libs in order to use ESG-CET publisher GUI</li>
	<li><a href="http://curl.haxx.se/">Curl</a> and libcurl</li>
	<li><a href="http://www.postgresql.org/">PosgreSQL</a> 8.3+</li>
	<li><a href="http://ant.apache.org/">Apache Ant</a> 1.8
	<li><a href="http://kernel.org/pub/software/scm/git">GIT</a> 1.7 (with curl support)</li>
	<li><a href="http://www.python.org/">Python</a> 2.6+ (with tk/tcl support)</li>
	<li>essential dev packages including zlib1-dev, readline, libreadline5-dev, flex, bison, etc.</li>
	<li>uuid-dev (for GridFTPauthentication module)</li>
</ul>
<p>We assume that you already have necessary components installed (PostgreSQL, Apache Ant, JAVA, git, and curl), and PATH and LD_LIBRARY_PATH are set properly. If not, see <a href="EarthSystemGrid.DatanodeAtNERSC;nowysiwyg=0.html">NecessaryComponents</a> first.</p>
<p>Determine an installation directory and set an environment variable for the installation directory, INSTALL_HOME (that will be referred in the next steps).</p>

<a name="Initializing PostgreSQL database"><h2>Initializing PostgreSQL database</h2>
<p>Create data and log directories for PostgreSQL, and dont forget to set proper ownership/permission for those directories.</p>
<pre>
export PGDATA=$INSTALL_HOME/pgsql/data
mkdir -p $PGDATA
mkdir -p $INSTALL_HOME/pgsql/log
chmod 700
$PGDATA
</pre>
<p>Initialize the database by running initdb;</p>
<pre>
$initdb -D $PGDATA
</pre>
<p>By default, "trust" authentication has been enabled for local connections. Change this by editing "pg_hba.conf". Or, give -A option while running initdb command. It is recommended to use "md5" since it sends encrypted passwords. In "trust" authentication, any local user can connect to the database.</p>
<p>Note: I would recommend to change it to "md5" after you run esgsetup --db (after CDAT installation) - had a problem in this when esgsetup is connecting to the database.</p>
<p>Start database:</p>
<pre>
pg_ctl -D $PGDATA  start
Set environment variables:
export PGUSER=dbsuper
export PGPORT=5432
export PGHOST=localhost
</pre>
<p>And, create a database user ("dbsuper") and set a password - this will be needed while setting up ESGCET later.</p>
<pre>
createuser
-P -s -e dbsuper
</pre>
<p>Edit "$PGDATA/postgresql.conf", to change port number (default is 5432) and other parameters such as logging options ( log directory and log
filename).</p>
<p>Verify your installation by running:</p>
<pre>
psql -U dbsuper postgres
</pre>

<a name="Installing CDAT (Python + CDMS)"><h2>Installing CDAT (Python + CDMS)</h2>
<p>Set an installation directory for CDAT (Climate Data Analysis Tool):</p>
<pre>
export CDAT_HOME=$INSTALL_HOME/cdat
</pre>
<p>We will be using version eb8b668. Download the package and compile it...</p>
<pre>
git clone <a href="http://esg-repo.llnl.gov/git/cdat.git/">http://esg-repo.llnl.gov/git/cdat.git</a>
cd cdat
git checkout eb8b668
</pre>
<p>If you have Python already installed, specify the path. Note that Python should have tk/tcl support, install <a href="http://docs.python.org/library/tkinter.html">Tkinter</a>.</p>
<pre>
./configure --prefix=$CDAT_HOME --with-python=/usr/bin/python
--enable-esg
make
</pre>
<p>Alternatively, if you dont give the Python path, CDAT installer will download and install Python itself.</p>
<pre>
./configure --prefix=$CDAT_HOME
--enable-esg
make
</pre>
<p>Note: In Ubuntu; first install Tkinter packages and then specify the path for Python while running "configure". Python installed by CDAT (default)
does not work somehow (saying missing tk/tcl support in Python).</p>
<p>Also update path information (make sure cdat/bin is before /usr/bin in your path):</p>
<pre>
export PATH=$CDAT_HOME/bin:$CDAT_HOME/Externals/lib:$PATH
export LD_LIBRARY_PATH=$CDAT_HOME/lib:$CDAT_HOME/Externals/lib:$LD_LIBRARY_PATH
</pre>

<a name="Installing ESGCET (esgcet-2.4-py2.6.egg)"><h2>Installing ESGCET (esgcet-2.4-py2.6.egg)</h2>
<p>Dowload ESGCET package (that will be required scripts and packages for publishing)</p>
<pre>
wget http://rainbow.llnl.gov/dist/externals/esgcet-2.4-py2.6.egg
chmod 755 esgcet-2.4-py2.6.egg
easy_install esgcet-2.4-py2.6.egg
</pre>
<p>Complete the setup by giving an organization ID (rootid in the following):</p>
<pre>
bin/esgsetup --config --rootid nersc
</pre>
<p>$HOME/.esgcet/esg.ini will be created and initial configuration will be saved in esg.ini file. </p>
<p>Before proceeding further, please make sure that PosgreSQL is up and running. Run esgsetup to create database entries. It will ask the database admin user (dbsuper), and will create esgcet database with owner esgcet (you also need to set a password for esgcet database user).</p>
<pre>
$CDAT_HOME/bin/esgsetup --db
</pre>
<p>Update environment by adding the organization ID as follows (advised);</p>
<pre>
export ESG_ROOT_ID=nersc
</pre>
<p>Note that you might need to edit ~/.esgcet/esg.ini to set the password for esgcet database user.</p>
<p>There is already a "test" project defined in esg.ini</p>
<p>Dowload a sample data file and scan this sample dataset and publish (ESG_ROOT_ID is nersc). Note that this sample file should be inside the Thredds root catalog directory! Also. you need to specify the full path of the directory while running esgscan_directory.</p>
<pre>
mkdir $INSTALL_HOME/data/testdir
cd testdir
wget http://rainbow.llnl.gov/dist/externals/sftlf.nc
cd ..
esgscan_directory --dataset pcdmi.nersc.test --project test $INSTALL_HOME/data/testdir > scan.out
esgpublish --map scan.out --project test
</pre>

<a name="Tomcat Installation"><h2>Tomcat Installation</h2>
<p>Download and install tomcat:</p>
<pre>
wget http://download.filehat.com/apache/tomcat/tomcat-6/v6.0.26/bin/apache-tomcat-6.0.26.tar.gz
tar xvf apache-tomcat-6.0.26.tar.gz -C $INSTALL_HOME
cd $INSTALL_HOME
ln -s apache-tomcat-6.0.26 tomcat
</pre>
<p>Set TOMCAT_HOME environment variable:</p>
<pre>
export TOMCAT_HOME=$INSTALL_HOME/tomcat
cd $TOMCAT_HOME/bin
tar xvf jsvc.tar.gz
cd jsvx-src
autoconf
chmod 755 configure; ./configure --with-java=$JAVA_HOME
make
cp jsvc $TOMCAT_HOME/bin
</pre>
<p>Next step is to configure tomcat by editing $TOMCAT_HOME/conf/server.xml.</p>
<p>Make sure server.xml has appropriate permissions (chmod 600 server.xml). By default, port 8080 and 8443 will be used. If you want to change and use 80 and 443 instead, edit Connector port numbers in server.xml.<p>
<p>You may want to look at <a href="http://tomcat.apache.org/tomcat-5.5-doc/ssl-howto.html">Tomcat documentation</a>   for Servlet/JSP and SSL configuration.</p>
<p>Now, we setup the keystore:</p>
<pre>
$JAVA_HOME/bin/keytool -genkey -alias tomcat -keyalg RSA -keystore $TOMCAT_HOME/conf/keystore-tomcat -validity 365
</pre>
<p>It will ask keystore password and key password for tomcat (default is "changeit").</p>
<p>Go to conf directory and download truststore file:</p>
<pre>
cd $TOMCAT_HOME/conf
wget http://rainbow.llnl.gov/dist/externals/jssecacerts
</pre>
<p>Open server.xml and edit path for keystore and truststore. You can search keystore_file and truststore_file in this preconfigured sample <a href="server.xml.html">server.xml</a> file. </p>
<p>It is beneficial to create a "tomcat" user and start tomcat with this user's privileges. In that case, change the ownership of the tomcat directory</p>
<pre>
(chmod -R tomcat $TOMCAT_HOME).
</pre>
<p>It is useful to set CATALINA_HOME environment variable. You can start/stop tomcat using the cataline.sh script.</p>
<pre>
export CATALINA_HOME=$TOMCAT_HOME
$CATALINA_HOME/bin/catalina.sh stop
$CATALINA_HOME/bin/catalina.sh start
</pre>
<p>In order to use jsvc, start tomcat (make sure JAVA_HOME is set) by running the following command (preparing a startup script will be helpful);</p>
<pre>
cd $TOMCAT_HOME
/bin/jsvc -Djava.endorsed.dirs=./endorsed -pidfile /tmp/tomcat-jsvc.pid \
-cp $TOMCAT_HOME/bin/bootstrap.jar:$TOMCAT_HOME/bin/tomcat-juli.jar:$TOMCAT_HOME/bin/commons-daemon.jar \
-outfile ./logs/catalina.out -errfile ./logs/catalina.err -Xmx2048m -Xms1024m \
-Dsun.security.ssl.allowUnsafeRenegotiation=true org.apache.catalina.startup.Bootstrap
</pre>
<p>Stop tomcat by running the following (jsvc);</p>
<pre>
cd $TOMCAT_HOME
./bin/jsvc -pidfile /tmp/tomcat-jsvc.pid -stop org.apache.catalina.startup.Bootstrap
</pre>

<a name="Thredds data server (v 4.1.6)"><h2>Thredds data server (v 4.1.6)</h2>
<p> Download Thredds war file and put into the tomcat "webapps" directory:</p>
<pre>
cd $TOMCAT_HOME/webapps
wget http://rainbow.llnl.gov/dist/thredds/4.1.6/thredds.war
</pre>
<p>Restart tomcat (after restart the war file will be extracted under webapps directory)</p>
<p>Edit $TOMCAT_HOME/conf/tomcat-user.xml. Search for user entry in tomcat-user.xml and add a user ( dnode_user) with administrative privileges. The entry should look like:</p>
<pre>
&lt;tomcat-users>
&lt;role rolename="tdsConfig"/>
&lt;role rolename="manager"/>
&lt;role rolename="tdrAdmin"/>
&lt;user username="dnode_user" password="digest_password_here" roles="tdrAdmin,tdsConfig"/>
&lt;/tomcat-users>
</pre>
<p>First, generate a password hash by running</p>
<pre>
$TOMCAT/bin/digest.sh -a SHA &lt;password for dnode_user>
</pre>
<p>Use this password hash and add line, shown below, to the <a href="http://rainbow.llnl.gov/dist/externals/bootstrap/tomcat-users.xml">tomcat-user.xml</a> file. Then, restart the tomcat.</p>
<pre>
&lt;user_entry='&lt;user username="dnode_user" password="&lt;PASSWORD_HASH_HERE>" roles="tdrAdmin,tdsConfig">
</pre>
<p>Configure tomcat for digest authentication. Create directory $TOMCAT_HOME/conf/Catalina/localhost if does not exists. Add or edit thredds.xml file in $TOMCAT_HOME/conf/Catalina/localhost. It should look like:</p>
<pre>
&lt;?xml version="1.0" encoding="UTF-8"?>
&lt;Context path="/thredds">
&lt;Realm className="org.apache.catalina.realm.MemoryRealm" digest="SHA" />
&lt;/Context>
</pre>
<p>A sample web.xml file is given <a href="http://rainbow.llnl.gov/dist/thredds/thredds.web.xml">here</a>  . Make sure SSL is enabled (this is used by the ESG-publisher to re-initialize Thredds Data server andcheck logs). It should look like:</p>
<pre>
&lt;user-data-constraint>
&lt;transport-guarantee>CONFIDENTIAL&lt;/transport-guarantee>
&lt;/user-data-constraint>
</pre>
<p>Note: esg.ini is important. Make sure "thredds_url" "thredds_reinit_error_url" and "thredds_reinit_url" are correct (they should point to full host name - not localhost)</p>
	
<a name="Security-Token-Filters and Certificate From Gateway"><h2>Security-Token-Filters and Certificate From Gateway</h2>
<p>Here, we are using gateway node ESG-PCMDI(pcmdi3.llnl.gov/esgcet) as myProxy end-point (default myProxy port 2119).</p>
<p>Download necessary classes into a temporary directory:</p>
<pre>
cd $TOMCAT_HOME/temp
wget http://rainbow.llnl.gov/dist/utils/InstallCert.class
wget http://rainbow.llnl.gov/dist/utils/InstallCert$SavingTrustManager.class
</pre>
<p>End-point is pcmdi3.llnl.gov, SSL port is 443, and default password for SSL end point is "changeit"</p>
<pre>
cd $TOMCAT_HOME/conf
cp jssecacerts jssecacerts.bak
$JAVA_HOME/bin/java -classpath .:$TOMCAT_HOME/temp InstallCert  pcmdi3.llnl.gov:443 &lt;password>
</pre>
<p>This will add certificate to keystore "jssecacerts". Change owner and permission of that file (chmod 644 jssecacerts; chown tomcat jssecacerts).</p>
<p>Note: Copy jssecacerts into $JAVA_HOME/jre/lib/security (Installation script does this but probably this is not necessary! Its path has been specified in server.xml already) cp -p $TOMCAT_HOME/conf/jssecacerts $JAVA_HOME/jre/lib/security
<p>Add following into the environmen (optional)</p>
<pre>
export ESG_GATEWAY_NAME=ESG-PCMDI
export ESG_GATEWAY_SVC_ROOT=pcmdi3.llnl.gov/esgcet
export MYPROXY_SERVER=pcmdi3.llnl.gov
</pre>
<p>Download ESG token validator filters</p>
<pre>
cd $TOMCAT_HOME/webapps/thredds/WEB-INF/lib
wget http://rainbow.llnl.gov/dist/filters/eske.jar
wget http://rainbow.llnl.gov/dist/filters/hessian-3.0.20.jar
</pre>
<p>Now, you need to edit $TOMCAT_HOME/webapps/thredds/WEB-INF/web.xml and add the following filter specifications:</p>
<ul>
	<li>gateway_name (i.e. ESG_PCMDI)</li>
	<li>gateway_service_root (i.e. pcmdi3.llnl.gov/esgcet)</li>
	<li>node_host_ip_address (IP address of the host running Thredds Data Server)</li>
</ul>
<p>Add the following ESG security token filter and servlet entries into the web.xml:</p>
<ul>
	<li><a href="http://rainbow.llnl.gov/dist/filters/esg-security-token-filters.xml">Filter for token based authentication</a></li>
	<li><a href="http://rainbow.llnl.gov/dist/filters/esg-security-token-filter-servlet.xml">Servlet configuration for restricted access</a></li>
</ul>
<p>A sample web.xml file is given <a href="web.xml.html">here.</a></p>
<p>More information about ESG token validation filter can be found at <a href="http://esg-pcmdi.llnl.gov/internal/software-packaging-deployment-and-maintenance/deploying-an-esg-node#thredds-data-server-tds">ESG data node documentation</a></p>
<p>Restart Tomcat. Make sure PostgreSQL is running.</p>
<pre>
$CDAT_HOME/bin/esgsetup --thredds --publish --gateway pcmdi3.llnl.gov
</pre>
<p>In this step, you need to specify Thredds content directory and ESG data path root directory. If they dont exist, create root directory (and replica directory).</p>
<pre>
mkdir $INSTALL_HOME/data
mkdir $INSTALL_HOME/data.replica
</pre>
<p>You may also need to edit esg.ini file and change the path for content directory. It should look like (give full path)</p>
<pre>
thredds_dataset_roots = esg_dataroot | /project/projectdirs/esg/datanode/data
</pre>
<p>Make sure thredds_username and thredds_password are set correctly.</p>
<p>Verify whether everything is configured properly (dont forget to restart Tomcat) by creating Tredds catalog for the data set we have scanned before. (ESG_ROOT_ID is nersc).</p>
<pre>
esgpublish --use-existing pcdmi.nersc.test --noscan --thredds
</pre>
<p>This step might take some time. It will reinitialize the Thredds Data Server, so make sure url's are set correctly in ~/.esgcet/esg.ini</p>

<a name="Node Manager (0.0.2)"><h2>Node Manager (0.0.2)</h2>
<pre>
cd $TOMCAT_HOME/temp/
wget http://rainbow.llnl.gov/dist/esg-node/esg-node.0.0.2.tar.gz
tar xzf esg-node.0.0.2.tar.gz
cd esg-node.0.0.2
</pre>
<p>Go to Tomcat webapp directory, and replace tokens in node.properties</p>
<pre>
mkdir -p $TOMCAT_HOME/webapps/esg-node
cd $TOMCAT_HOME/webapps/esg-node
jar xvf $TOMCAT_HOME/esg-node.0.0.2/esg-node.war
cd WEB-INF/classes
</pre>
<p>Edit node.properties. Change the following options in node.properties file (in webapps/esg-node/WEB-INF/classes)</p>
<pre>
db.driver -> org.postgresql.Driver
db.protocol -> jdbc:postgresql
db.host -> localhost db.port -> 5432
db.database -> esgcet
db.user -> dbsuper
db.password -> &lt;dbsuper password>
mail.smtp.host -> &lt;mail.admin.address>
</pre>
<p>Create esgcet database if not created yet</p>
<pre>
createdb esgcet
</pre>
<p>Configure PostgreSQL by running:</p>
<pre>
cd $TOMCAT_HOME/temp/esg-node.0.0.2/db
ant -buildfile database-tasks.ant.xml \
-Dnode.property.file=$TOMCAT_HOME/webapps/esg-node/WEB-INF/classes/node.properties \
-Dsql.jdbc.base.url=jdbc:postgresql://localhost:5432/ -Dsql.jdbc.database.name=esgcet \
-Dsql.jdbc.database.user=dbsuper \ -Dsql.jdbc.database.password=&lt;dbsuper_password>
-Dsql.jdbc.driver.jar=$TOMCAT_HOME/webapps/esg-node/WEB-INF/lib/postgresql-8.3-603.jdbc3.jar \
make_node_db
</pre>
<p>Restart Tomcat.</p>

<a name="Globus Installation"><h2>Globus Installation</h2>
<p>See <a href="esg-globus-nersc.html">esg-globus-nersc.</a></p>

<a name="Set Environmental Variables"><h2>Set Environmental Variables</h2>
<p>Set installation directory (INSTALL_HOME) and create an environment file "$INSTALL_DIR/env.sh", so it can be used for sourcing the environment.</p>
<pre>
cat $INSTALL_HOME/env.sh &lt;&lt; EOF
export CDAT_HOME=$INSTALL_HOME/cdat
export TOMCAT_HOME=$INSTALL_HOME/tomcat
export CATALINA_HOME=$TOMCAT_HOME
export GLOBUS_HOME=$INSTALL_HOME/globus

export LD_LIBRARY_PATH=$CDAT_HOME/lib:$CDAT_HOME/Externals/lib:$GLOBUS_HOME/lib:$LD_LIBRARY_PATH
export PATH=$CDAT_HOME/bin:$CDAT_HOME/Externals/bin:$TOMCAT_HOME/bin:$GLOBUS_HOME/bin:$PATH

export PGDATA=$INSTALL_HOME/pgsql/data
export PGUSER=dbsuper
export PGPORT=5432
export PGHOST=localhost

export ESG_ROOT_ID=nersc
export ESG_GATEWAY_NAME=ESG-PCMDI
export ESG_GATEWAY_SVC_ROOT=pcmdi3.llnl.gov/esgcet

export MYPROXY_SERVER=pcmdi3.llnl.gov
export X509_CERT_DIR=~/.globus/certificates

EOF
</pre>

<a name ="Test Publication"><h2>Test Publication</h2>
<pre>
myproxy-logon -s pcmdi3.llnl.gov -l &lt;username_of_your_account_from gateway> -p 2119 -o ~/.globus/certificate-file -T

esglist_files pcmdi.nersc.test

esgpublish --use-existing pcmdi.nersc.test --noscan --publish

esgunpublish --skip-thredds pcmdi.nersc.test
</pre>

<a name="Installing Necessary Components"><h2>Installing Necessary Components</h2>
<a name="Curl"><h3>Curl</h3>
<pre>
export CURL_HOME=$INSTALL_HOME/curl
wget http://curl.haxx.se/download/curl-7.20.1.tar.gz
tar xvzf curl-7.20.1.tar.gz
cd curl-7.20.1
./configure --prefix=$CURL_HOME
make all
make install
$CURL_HOME/bin/curl --version
export PATH=$CURL_HOME/bin:$PATH
export LD_LIBRARY_PATH=$CURL_HOME/lib:$LD_LIBRARY_PATH
</pre>
	
<a name="GIT (with libcurl)"><h3>GIT (with libcurl)</h3>
<pre>
export GIT_HOME=$INSTALL_HOME/git
wget http://kernel.org/pub/software/scm/git/git-1.7.1.tar.gz
tar xvzf git-1.7.1.tar.gz
cd git-1.7.1
./configure --prefix=$GIT_HOME
make all
make install

export PATH=$GIT_HOME/bin:$PATH
export LD_LIBRARY_PATH=$GIT_HOME/lib:$LD_LIBRARY_PATH
</pre>

<a name="Java"><h3>Java</h3>
<pre>
export JAVA_HOME=$INSTALL_HOME/java
wget http://rainbow.llnl.gov/dist/java/1.6.0_20/jdk1.6.0_20-32.tar.gz
tar xvfz jdk1.6.0_20-32.tar.gz -C $INSTALL_HOME
ln -s $INSTALL_HOME/jdk1.6.0_20
$JAVA_HOME
$JAVA_HOME/bin/java --version
export PATH=$JAVA_HOME/bin:$PATH
</pre>
	
<a name="Apache ANT"><h3>Apache ANT</h3>
<pre>
export ANT_HOME=$INTALL_HOME/ant
wget http://www.trieuvan.com/apache/ant/binaries/apache-ant-1.8.1-bin.tar.gz
tar xvfz apache-ant-1.8.1-bin.tar.gz -C $INSTALL_HOME
ln -s $INSTALL_HOME/apache-ant-1.8.1
$ANT_HOME
$ANT_HOME/bin/ant -version
export PATH=$ANT_HOME/bin:$PATH
</pre>

<a name="PostgreSQL"><h3>PostgreSQL</h3>
<pre>
export PGHOME=$INSTALL_HOME/pgsql
wget http://ftp9.us.postgresql.org/pub/mirrors/postgresql/source/v8.4.3/postgresql-8.4.3.tar.gz
tar xvzf postgresql-8.4.3.tar.gz
cd postgresql-8.4.3
./configure --prefix=$PGHOME --enable-thread-safety
make
make install
cd contrib/tablefunc
make
make install
export PATH=$PGHOME/bin:$PATH
export LD_LIBRARY_PATH=$PGHOME/lib:$LD_LIBRARY_PATH
</pre>
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>
