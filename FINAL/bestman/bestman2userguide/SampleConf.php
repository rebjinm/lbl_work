<!DOCTYPE html>
<html>
<head>
<title>SampleConf</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<h1>Sample configuration file</h1>
<h2>bestman2.rc from VDT installed BeStMan2 in full mode</h2>
 <pre>
ReplicaQualityStorageMB=[2000]path=/data/bestman/cache;
EventLogLocation=/demo/bestman/log
eventLogLevel=INFO
securePort=40443
CertFileName=/demo/gridtest/demo2009cert.pem
KeyFileName=/demo/gridtest/demo2009key.pem
accessFileSysViaSudo=false
MaxMappedIDCached=1000
LifetimeSecondsMappedIDCached=1800
GridMapFileName=/etc/grid-security/grid-mapfile
MaxNumberOfUsers=100
MaxNumberOfFileRequests=1000000
Concurrency=40
MaxConcurrentFileTransfer=10
GridFTPNumStreams=1
GridFTPBufferSizeBytes=1048576
DefaultFileSizeMB=500
DefaultVolatileFileLifeTimeInSeconds=1800
PublicTokenMaxFileLifetimeInSeconds=1800
InactiveTxfTimeOutInSeconds=300
PublicSpaceProportion=80
DefaultMBPerToken=1000
useBerkeleyDB=true
noCacheLog=false
CacheLogLocation=/data/bestman/log
pathForToken=false
disableSpaceMgt=false
srmcacheKeywordOn=true
uploadQueueParameter=40:10
FactoryID=srm/v2/server
noEventLog=false
</pre>
<h2>bestman2.rc for BeStMan2 in full mode with GUMS support</h2>
 <pre>
ReplicaQualityStorageMB=[2000]path=/data/bestman/cache;
EventLogLocation=/data/bestman/log
eventLogLevel=INFO
securePort=6242
CertFileName=/demo/gridtest/demo2009cert.pem
KeyFileName=/demo/gridtest/demo2009key.pem
accessFileSysViaSudo=false
MaxMappedIDCached=1000
LifetimeSecondsMappedIDCached=1800
GUMSserviceURL=https://gumsserver.lbl.gov:8443/gums/services/GUMSAuthorizationServicePort
GridMapFileName=/demo/bestman2/conf/grid-mapfile.empty
MaxNumberOfUsers=100
MaxNumberOfFileRequests=1000000
Concurrency=40
MaxConcurrentFileTransfer=10
GridFTPNumStreams=1
GridFTPBufferSizeBytes=1048576
DefaultFileSizeMB=500
DefaultVolatileFileLifeTimeInSeconds=1800
PublicTokenMaxFileLifetimeInSeconds=1800
InactiveTxfTimeOutInSeconds=300
PublicSpaceProportion=80
DefaultMBPerToken=1000
useBerkeleyDB=true
noCacheLog=false
CacheLogLocation=/data/bestman/log
pathForToken=false
disableSpaceMgt=false
srmcacheKeywordOn=true
uploadQueueParameter=40:10
FactoryID=srm/v2/server
noEventLog=false
</pre>
<h2>bestman2.rc for BeStMan2 in full mode from manual configure with more options</h2>
 <pre>
####################################################################################
ReplicaQualityStorageMB=[200000]path=/data/bestman/cache;[500000]path=/data4/bestman/cache
CustodialQualityStorageMB=[2000]path=/data2/bestman/pcache;[4000]path=/data3/bestman/pcache
supportedProtocolList=gsiftp://thost1.lbl.gov;gsiftp://thost2.lbl.gov;gsiftp://thost3.lbl.gov
userSpaceKeywords=(ATLASUSERDISK1=/project/atlas/user1)(ATLASUSERDISK2=/project/atlas/user2)
###################################################################################
MaxNumberOfUsers=100
MaxNumberOfFileRequests=1000000
Concurrency=40
MaxConcurrentFileTransfer=10
GridFTPNumStreams=2
GridFTPBufferSizeBytes=1048576
DefaultFileSizeMB=500
DefaultVolatileFileLifeTimeInSeconds=1800
PublicTokenMaxFileLifetimeInSeconds=1800
InactiveTxfTimeOutInSeconds=300
PublicSpaceProportion=80
DefaultMBPerToken=1000
securePort=6288
EventLogLocation=/opt/bestman/log
CacheLogLocation=/data/bestman/log
useBerkeleyDB=true
srmcacheKeywordOn=true
CertFileName=/home/gridtest/srmcert.pem
KeyFileName=/home/gridtest/srmkey.pem
GridMapFileName=/etc/grid-security/grid-mapfile
FactoryID=server
uploadQueueParameter=40:10
</pre>
<h2>bestman2.rc for BeStMan2 in gateway mode</h2>
 <pre>
EventLogLocation=/demo/bestman/log
eventLogLevel=INFO
localPathListToBlock=/tmp
localPathListAllowed=/data/project/bestman/data;/mnt/project/data
securePort=40443
CertFileName=/demo/gridtest/demo2009cert.pem
KeyFileName=/demo/gridtest/demo2009key.pem
staticTokenList=data[desc:mydata][10];data2[desc:mydata2][12]
pathForToken=true
checkSizeWithFS=true
checkSizeWithGsiftp=false
accessFileSysViaSudo=false
MaxMappedIDCached=1000
LifetimeSecondsMappedIDCached=1800
GridMapFileName=/etc/grid-security/grid-mapfile
disableSpaceMgt=true
useBerkeleyDB=false
noCacheLog=true
FactoryID=srm/v2/server
noEventLog=false
</pre>
<h2>bestman2.rc for BeStMan2 in gateway mode with GUMS interface</h2>
 <pre>
EventLogLocation=/demo/bestman/log
eventLogLevel=INFO
localPathListToBlock=/tmp
localPathListAllowed=/data/project/data;/mnt/project/data
securePort=40443
CertFileName=/demo/gridtest/demo2009cert.pem
KeyFileName=/demo/gridtest/demo2009key.pem
staticTokenList=data[desc:mydata][10];data2[desc:mydata2][12]
pathForToken=true
checkSizeWithFS=true
checkSizeWithGsiftp=false
accessFileSysViaSudo=false
MaxMappedIDCached=1000
LifetimeSecondsMappedIDCached=1800
GUMSserviceURL=https://sumsserver.lbl.gov:8443/gums/services/GUMSAuthorizationServicePort
GridMapFileName=/demo/bestman2/conf/grid-mapfile.empty
disableSpaceMgt=true
useBerkeleyDB=false
noCacheLog=true
FactoryID=srm/v2/server
noEventLog=false
</pre>
<br>

</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>