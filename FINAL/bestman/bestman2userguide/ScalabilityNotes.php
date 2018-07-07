<!DOCTYPE html>
<html>
<head>
<title>ScalabilityNotes</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<h1>Notes for scalability</h1>
<p>BeStMan is highly scalable to the number of request handling per unit time, depending on the underlying file system and storage. Configurable options need to be adjusted depending on the local storage and file system capacity, and also the operating system control needs to be adjusted.</p>
<h2>OS: sysctl values</h2>
<p>Adjust sysctl values on the node where bestman server runs. Put the values in /etc/sysctl.conf then run sysctl -p to apply them, or apply individually.</p>
<p><br> No need to reboot, and your OS kernel should be able to handle a lot more open connections.</p>
<p><br> Ref: http://fasterdata.es.net/tuning.html and http://fasterdata.es.net/TCP-tuning/linux.html</p>
<pre>
# General gigabit tuning:
net.core.rmem_max = 16777216
net.core.wmem_max = 16777216
net.ipv4.tcp_rmem = 4096 87380 16777216
net.ipv4.tcp_wmem = 4096 65536 16777216
net.ipv4.tcp_syncookies = 1
# this gives the kernel more memory for tcp
# which you need with many (100k+) open socket connections
net.ipv4.tcp_mem = 50576   64768   98152
net.core.netdev_max_backlog = 2500
# I was also masquerading the port comet was on, you might not need this
net.ipv4.netfilter.ip_conntrack_max = 1048576
</pre>
<p>In addition to above, check and changes these:</p>
<pre>
/sbin/sysctl -w net.core.somaxconn=256
/sbin/sysctl -w net.core.netdev_max_backlog=2500
</pre>
<p>Also, check these values for long timeout values. If relatively short, keep them longer.</p>
<pre>
% sysctl \
net.ipv4.tcp_keepalive_time \
net.ipv4.tcp_keepalive_intvl \
net.ipv4.tcp_keepalive_probes
net.ipv4.tcp_keepalive_time = 1800
net.ipv4.tcp_keepalive_intvl = 75
net.ipv4.tcp_keepalive_probes = 9 
</pre>
<h2>Jetty web server control values</h2>
<p>*1. Increase the maximum container thread pool size for the jetty server*</p>
<p><br> --with-max-container-threads</p>
<pre>
  e.g. configure --with-max-container-threads=1024
</pre>
<p>*2. Have large number for jetty http connection acceptor threads for the server's channel connector*</p>
<p><br> --with-connection-acceptor-thread-size</p>
<pre>
  e.g. configure --with-connection-acceptor-thread-size=8
</pre>
<p>*3. Have large size for jetty http connection waiting queue*</p>
<br> --with-connector-queue-size= <pre>
  e.g. configure --with-connector-queue-size=512
</pre>
<p>*4. Increase the max java heap memory size*</p>
<br> --with-max-java-heap= <pre>
  e.g. configure --with-max-java-heap=4096
</pre>
<p>*5. Client side http connection timeout control - bestman clients (only)*</p>
<pre>
  e.g. srm-copy -sethttptimeout 1800
</pre>
<p>*6. Each connection we make requires an ephemeral port, and thus a file descriptor*</p>
<p><br> By default this is limited to 1024. To avoid the Too many open files problem you'll need to modify the ulimit for your shell.</p>
<pre>
limit descriptors  65535
</pre><p> Or <pre></p>
<p>unlimit</p>
</pre>
<p>*7. This can be changed in /etc/security/limits.conf, but requires a logout/login.*</p>
<p><br> For now you can just sudo and modify the current shell. <br></p>
<p>(su back to your non-priv'ed user after calling ulimit if you don't want to run as root):</p>
<pre>
$ sudo bash
# ulimit -n 999999
# erl
</pre>
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>