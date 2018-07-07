<!DOCTYPE html>
<html>
<head>
	<title>BeStMan3 DataBase Schema Design</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<p><a href="index.html">Back to BeStMan3 Home</a></p>
<h1>Relational DataBase Schema Design</h1>
<h2>Goal</h2>
<p>Multiple BestMan can access the DB at the backend to store, retrieve and server the requests. When an asynchronous request is called by the client, BestMan will store the requests and when it is available to process the requests, it retrieve and serve the requests and updates the Database if there is change of state.</p>
<p>Files are Directory paths are stored as hashvalues for efficient retrieval. General Purpose Hash Function --> Algorithms Library is used for that purpose.</p>
<p>Relational database H2 (<a href="http://www.h2database.com/html/main.html">http://www.h2database.com/html/main.html</a>) is used at the backend for speed and efficiency.</p>

<h2>List of Tables</h2>
<ul>
	<li>Directory</li>
	<li>Files</li>
	<li>FileAttributes</li>
	<li>FileAttributesSP</li>
	<li>Request</li>
	<li>Component</li>
	<li>User</li>
	<li>Space Assignment</li>
	<li>BandwidthCommited</li>
	<li>RequestLevelInputForGet</li>
	<li>RequestLevelInputForPut</li>
	<li>RequestLevelInputForCopy</li>
	<li>RequestLevelInputForBringOnline</li>
	<li>RequestLevelInputForChangeSpace</li>
	<li>DirOption</li>
	<li>Request Execution</li>
	<li>RequestLevelInputForLs</li>
	<li>RequestLevelInputForReserveSpace</li>
	<li>RequestLevelInputForUpdateSpace</li>
</ul>

<h2>List of API's</h2>
<ul>
	<li>Basic</li>
	<li>Transfer</li>
	<li>Directory</li>
	<li>Space</li>
</ul>

<h2>Table: Directory</h2>
<ul>
	<li>int dirId (primarykey) //db assigned id</li>
	<li>int parentId</li>
	<li>varchar(4000) dirEntries //db internal column</li>
	<li></div></li>
	<li>varchar(4000) hashValue //db internal column</li>
	<li>int fileAttributesId (foreign key)</li>
</ul>

<h2>Table: Files</h2>
<ul>
	<li>int fileId (primarykey) //db assigned id</li>
	<li>int dirId (foreign key)</li>
	<li>varchar(4000) fileName</li>
	<li>int fileAttributesId (foreign key)</li>
</ul>

<h2>Table: FileAttributes</h2>
<ul>
	<li>int fileAttributesId (primarykey) //db assigned id</li>
	<li>varchar(2000) path //db internal column</li>
	<li>long hashValue //db internal column</li>
	<li>long size</li>
	<li>timestamp createdAtTime</li>
	<li>timestamp lastModificationTime</li>
	<li>varchar(255) fileStorageType (e.g. Durable|Volatile|Permanent)</li>
	<li>varchar(255) retentionPolicyInfo</li>
	<li>varchar(255) accessLatency</li>
	<li>varchar(255) fileLocality</li>
	<li>varchar(255) typ (e.g. File|Directory|Link)</li>
	<li>int lifeTimeAssigned</li>
	<li>int lifeTimeLeft</li>
	<li>varchar(255) userID</li>
	<li>varchar(255) ownerPermission (e.g. srm,RWX)</li>
	<li>varchar(255) groupID</li>
	<li>varchar(255) groupPermission (e.g. srm,RWX)</li>
	<li>varchar(255) otherPermission (e.g. RWX)</li>
	<li>varchar(255) checkSumType</li>
	<li>varchar(255) checkSumValue</li>
</ul>

<h2>Table: FileAttributesSP</h2>
<ul>
	<li>int fileAttributesSPId (primarykey) //db assigned id</li>
	<li>int fileAttributesId //foreign key to fileAttributes table</li>
	<li>varchar(1000) spaceToken</li>
	<li>long hashValue</li>
</ul>

<h2>Table: Request</h2>
<ul>
	<li>varchar(255) rId (primarykey) //bestman assigned id</li>
	<li>int userId (foreign key)</li>
	<li>varchar(4000) userRequestDesc</li>
	<li>varchar(255) authID</li>
	<li>int requestLevelInputId (foreign key) (optional column only use for asyn requests)</li>
	<li>varchar(500) status</li>
	<li>varchar(4000) explanation</li>
	<li>varchar(500) bandwidthStatus</li>
	<li></div></li>
	<li>varchar(255) requestType</li>
	<li>varchar(255) fileType</li>
	<li>varchar(255) spaceToken (foreign key)</li>
	<li>varchar(1000) targetFileRetentionPolicy (e.g. (replica|output|custodial)</li>
	<li>varchar(1000) targetFileAccessLatency (e.g. (online|nearline)</li>
	<li>varchar(1000) transferParametersAccessPattern (e.g. (TransferMode|!ProcessingMode)</li>
	<li>varchar(1000) transferParametersConnectionType (e.g. (WAN|LAN)</li>
	<li>varchar(1000) transferParametersClientNetworks</li>
	<li>varchar(1000) transferParametersTransferProtocols</li>
	<li>Date createdTime</li>
	<li>Date statusTime</li>
	<li>int desiredTotalRequestTime</li>
	<li>int totalNumFilesInRequest</li>
	<li>int numOfCompletedFiles</li>
	<li>int numOfWaitingFiles</li>
	<li>int numOfFailedFiles</li>
</ul>

<h2>Table: Component</h2>
<ul>
	<li>int componentId (primarykey) //db assigned id</li>
	<li>varchar(500) componentName //required</li>
	<li>varchar(500) mountingPoint //required //(name and mounting must be unique for each row)</li>
	<li>varchar(500) componentType //enumerated type //(e.g. custodial|online)</li>
	<li>int totalSize</li>
	<li>varchar(4000) description //(e.g. RAID)</li>
</ul>

<h2>Table: User</h2>
<ul>
	<li>int id (primarykey) //db assigned id</li>
	<li>varchar(2000) userId (unique not null)</li>
</ul>

<h2>Table: SpaceAssignment</h2>
<ul>
	<li>varchar(255) spaceToken (primarykey)</li>
	<li>varchar(500) uid (foreign key)</li>
	<li>int componentId (foreign key)</li>
	<li>varchar(4000) userDesc</li>
	<li>long totalSize</li>
	<li>long guaranteedSize</li>
	<li>long unUsedSize</li>
	<li>int lifeTimeAssigned</li>
	<li>Date lifeTimeStart</li>
</ul>

<h2>Table: BandwidthCommited</h2>
<ul>
	<li>int id (primary key)</li>
	<li>int rid</li>
	<li>timestamp ts</li>
	<li>timestamp te</li>
	<li>long bw</li>
</ul>

<h2>Table: RequestLevelInputForGet</h2>
<ul>
	<li>varchar(255) rid (primary key)</li>
	<li>int desiredPinLifeTime</li>
	<li>varchar(4000) storageSysInfo</li>
</ul>

<h2>Table: RequestLevelInputForPut</h2>
<ul>
	<li>varchar(255) rid (primary key)</li>
	<li>int desiredPinLifeTime</li>
	<li>int desiredFileLifeTime</li>
	<li>varchar(4000) storageSysInfo</li>
	<li>varchar(255) overWriteMode (e.g. Never|Always|when_file_are_different)</li>
</ul>

<h2>Table: RequestLevelInputForCopy</h2>
<ul>
	<li>varchar(255) rid (primary key)</li>
	<li>int desiredSURLLifetime</li>
	<li>varchar(4000) sourceStorageSysInfo</li>
	<li>varchar(4000) targetStorageSysInfo</li>
	<li>varchar(255) overWriteMode (e.g. Never|Always|when_file_are_different)</li>
</ul>

<h2>Table: RequestLevelInputForBringOnline</h2>
<ul>
	<li>varchar(255) rid (primary key)</li>
	<li>int desiredPinLifetime</li>
	<li>int deferredStartTime</li>
	<li>varchar(4000) storageSysInfo</li>
</ul>

<h2>Table: RequestLevelInputForChangeSpace</h2>
<ul>
	<li>varchar(255) rid (primary key)</li>
	<li>varchar(4000) storageSysInfo</li>
</ul>

<h2>Table: DirOption</h2>
<ul>
	<li>varchar(255) rid ((partial primary key)</li>
	<li>varchar(2000) localSURL (partial primary key)</li>
	<li>varchar(2000) remoteSURL (partial primary key)</li>
	<li>boolean isSourceADirectory</li>
	<li>boolean allLevelRecursive</li>
	<li>int numOfLevels</li>
</ul>

<h2>Table: RequestExecution</h2>
<ul>
	<li>varchar(255) rid (partial primarykey)</li>
	<li>varchar(4000) localSURL (partial primarykey)</li>
	<li>varchar(4000) remoteSURL (partial primarykey)</li>
	<li>long expectedSize</li>
	<li>int dirOption (foreign key)</li>
	<li>varchar(4000) TURL</li>
	<li>varchar(255) spaceToken</li>
	<li>Date statusTime</li>
	<li>int newPinLifetime</li>
	<li>varchar(255) status</li>
	<li>varchar(4000) explanation</li>
</ul>

<h2>Table: RequestLevelInputForLs</h2>
<ul>
	<li>varchar(255) rid (primarykey)</li>
	<li>boolean fullDetailedList</li>
	<li>boolean allLevelRecursive</li>
	<li>int numOfLevels</li>
	<li>int offset</li>
	<li>int count</li>
	<li>varchar(4000) storageSystemInfo</li>
</ul>

<h2>Table: RequestLevelInputForReserveSpace</h2>
<ul>
	<li>varchar(255) rid (primarykey)</li>
	<li>varchar(4000) userSpaceTokenDesc</li>
	<li>long desiredSizeOfTotalSpace</li>
	<li>long desiredSizeOfGuaranteedSpace</li>
	<li>int desiredLifeTimeOfReservedSpace</li>
	<li>int estimatedProcessingTime</li>
	<li>varchar(4000) storageSysInfo</li>
</ul>

<h2>Table: RequestLevelInputForUpdateSpace</h2>
<ul>
	<li>varchar(255) rid (primarykey)</li>
	<li>int newLifeTime</li>
	<li>long newSizeOfTotalSpaceDesired</li>
	<li>long newSizeOfGuaranteedSpaceDesired</li>
	<li>varchar(4000) storageSysInfo</li>
</ul>

<hr>

<h2>Basic API's</h2>
<ul>
	<li>checkSchemaExistence : boolean checkSchemaExistence()</li>
	<li>checkSchemaExistence will check for schema existence in the beginning of the program</li>
	<li>createTables : createTables()</li>
	<li>createTables will create the table</li>
	<li>findUsersFromDatabase : int[] findUsersFromDatabse()</li>
	<li>returns the ids of the users from the database</li>
	<li>findQueuedRequestIds: String[] findQueuedRequestIds(int uid, int limit)</li>
	<li>findQueuedRequestIds will fetch the next limit no of requests. to be processed, returns the array of rids.</li>
	<li>findNextFileInRequest: Vector findNextFileInRequest(String rid, int limit)</li>
	<li>findNextFileInRequest will fetch the next limit no. of files in the requests. to be processed, returns the File level information, each element in the vector is a hashtable and the hashtable contains the file level information.</li>
	<li>addUser :boolean addUser(String uid);</li>
	<li>adds the user into the user table</li>
	<li>uid cannot be null or empty</li>
	<li>deleteUser :boolean deleteUser(String uid);</li>
	<li>deletes the user from user table</li>
	<li>uid cannot be null or empty</li>
	<li>updateUser :boolean updateUser(String uid,Hashtable ht);</li>
	<li>updates the user table for the given uid</li>
	<li>hashtable contains the key,value pairs where keys are columns of user table.</li>
	<li>uid and hashtable cannot be null or empty</li>
	<li>getMappedIdsForDN : String[] getMappedIdsForDN(String DN);</li>
	<li>returns the matching mappedId's for DN.</li>
	<li>not implemented yet.</li>
	<li>updateRequest : boolean updateRequest(String rid, Hashtable ht);</li>
	<li>udpates the attributes in the request table</li>
	<li>rid or hashtable cannot be null or empty</li>
	<li>hashtable contains the key,value pairs where keys are the columns of the <a href="BeStMan3.DBDesign;nowysiwyg=0.html">RequestTable</a></li>
	<li>updateRequestExec : boolean updateRequestExec(String rid, String localSURL, String remoteSURL,</li>
	<li>Hashtable ht);</li>
	<li>udpates the attributes in the request executation table</li>
	<li>rid, localSURL cannot be null or empty</li>
	<li>when remoteSURL is null or empty, "NA" is assigned to it.</li>
	<li>hashtable contains the key,value pairs where keys are the columns of the RequestExecution table</li>
	<li>updateFileAttributes : void updateFileAttributes(String path, Hashtable ht)</li>
	<li>updates entries in the <a href="BeStMan3.DBDesign;nowysiwyg=0.html">FileAttributes</a> table, for the given path</li>
	<li>path and hashtable cannot be null or empty</li>
	<li>hashtable contains key,value pairs, where keys are the columns of the Files table.</li>
	<li>updatePinLifeTime : boolean updatePinLifeTime(String rid, String localSURL, int lifeTime)</li>
	<li>updates lifeTime in the <a href="BeStMan3.DBDesign;nowysiwyg=0.html">RequestExecution</a> table, for the given rid and localSURL</li>
	<li>rid, localSURL cannot be null or empty</li>
	<li>updateFileLifeTime : boolean updateFileLifeTime(String path, int newFileLifeTime)</li>
	<li>updates lifeTimeAssigned in the <a href="BeStMan3.DBDesign;nowysiwyg=0.html">FileAttributes</a> table for the given path</li>
	<li>path cannot be null or empty</li>
	<li>getAttributesFromRequest:HashMap getAttributesFromRequest(String rid)</li>
	<li>returns hashmap contains the values of entries in the request level table</li>
	<li>getAttributesFromRequestExec:HashMap getAttributesFromRequestExec(String rid)</li>
	<li>returns hashmap contains the values of entries in the requestexec level table</li>
	<li>getAttributesFromFileAttributes:HashMap getAttributesFromFileAttributes(String rid)</li>
	<li>returns hashmap contains the values of entries in the <a href="BeStMan3.DBDesign;nowysiwyg=0.html">FileAttributes</a> table</li>
	<li>insertIntoBandwidthCommited:void insertIntoBandwidthCommited(String rid, long timestart, long timeend, long bandwidthwindow)</li>
	<li>deleteFromBandwidthCommited:void deleteFromBandwidthCommited(String rid)</li>
	<li>deletes the rows matching rid</li>
	<li>getAttributesFromBandwidthCommited:Vector getAttributesFromBandwidthCommited(String rid)</li>
	<li>returns vector contains the values of entries in the Bandwidth table, each entry is a Hashmap</li>
	<li>contains the attributes of Bandwidthcommited</li>
</ul>

<h2>DataTransfer API's</h2>
<ul>
	<li>store : boolean store(SrmPrepareToGetRequest request, String rid,String uid)</li>
	<li>stores the get request information in the RequestLevelInputForGetTable and in the Request table and in the RequestExecution table</li>
	<li>rid and uid cannot be null or empty</li>
	<li>request cannot be null</li>
	<li>store : boolean store(SrmPrepareToPutRequest request, String rid, String uid)</li>
	<li>stores the put request information in the RequestLevelInputForPutTable and in the Request table and in the RequestExecution table</li>
	<li>rid and uid cannot be null or empty</li>
	<li>request cannot be null</li>
	<li>store : boolean store(SrmPrepareToBringOnlineRequest request, String rid, String uid)</li>
	<li>stores the bringonline request information in the RequestLevelInputForBringOnlineTable and in the Request table and in the RequestExecution table</li>
	<li>rid and uid cannot be null or empty</li>
	<li>request cannot be null</li>
	<li>store : boolean store(SrmPrepareToCopyRequest request, String rid, String uid)</li>
	<li>stores the copy request information in the RequestLevelInputForCopyTable and in the Request table and in the RequestExecution table</li>
	<li>rid and uid cannot be null or empty</li>
	<li>request cannot be null</li>
	<li>deleteRow: boolean deleteRow(String rid)</li>
	<li>delete a row in the Request table and request Execution table and from the associated RequestLevelInputFor(get|put|copy...)Table</li>
	<li>rid cannot be null or empty</li>
	<li>srmGetRequestSummary TRequestSummary[] srmGetRequestSummary(String[] requestToken, String userId)</li>
	<li>gets the request summary for the provided request tokens</li>
	<li>userId cannot be null and requesttokens cannot be null or empty</li>
	<li>srmGetRequestTokens TRequestTokenReturn[] srmGetRequestTokens(String userRequestDesc, String userId)</li>
	<li>retrieves request tokens matching for the userRequestDesc</li>
	<li>userRequestDesc and userId cannot be null</li>
	<li>srmExtendFileLifeTime TSURLLifetimeReturnStatus[] srmExtendFileLifeTime(String requestToken, String[] surls, int newFileLifeTime, int newPinLifetime)</li>
	<li>update the newfilelifetime in the Files table and newPinLifeTime in the RequestExec table.</li>
	<li>requestToken cannot be null or empty</li>
	<li>surls cannot be null or empty</li>
</ul>

<h2>Directory Related api's</h2>
<ul>
	<li>store : boolean store(SrmLsRequest request, String rid, String uid)</li>
	<li>stores the ls request information in the RequestLevelInputForLsTable and in the Request table and in the RequestExecution table</li>
	<li>rid and uid cannot be null or empty</li>
	<li>request cannot be null</li>
	<li>mkDir : boolean mkdir(String path)</li>
	<li>compute hashvalues for the path, create the entries in the directory table recursively</li>
	<li>path cannot be null or empty</li>
	<li>createFile : boolean createFile(String path)</li>
	<li>creates the file entries in the files table.</li>
	<li>path cannot be null or empty</li>
	<li>rmDir : boolean rmdir(String path, boolean recursive)</li>
	<li>If recursive is false, directory needs to be empty.</li>
	<li>If recursive is true, it deletes the entries recursively, along with entries from the file table path cannot be null or empty</li>
	<li>rmFile: boolean rmfile(String path)</li>
	<li>Removes the entry from the files table</li>
	<li>path cannot be null or empty</li>
	<li>mv : boolean mv(String source, String target)</li>
	<li>Re-calculate hash values and update the directory/files table source and target cannot be null or empty</li>
	<li>list : TMetaDataPathDetail[] ls(String path, boolean recursive)</li>
	<li>returns in the directory listing for the given path.</li>
	<li>If recursive is true, returns the directory listing recursively.</li>
	<li>path cannot be null or empty</li>
	<li>space related api's</li>
	<li>store : boolean store(SrmReserveSpaceRequest request, String rid, String uid)</li>
	<li>stores the reserve space request information in the RequestLevelInputForReserveSpaceTable</li>
	<li>rid and uid cannot be null or empty</li>
	<li>request cannot be null</li>
	<li>store : boolean store(SrmChangeSpaceForFilesRequest request, String rid, String uid)</li>
	<li>stores the change space request information in the RequestLevelInputForChangeSpaceTable</li>
	<li>rid and uid cannot be null or empty</li>
	<li>request cannot be null</li>
	<li>store : boolean store(SrmUpdateSpaceRequest request, String rid, String uid)</li>
	<li>stores the update space request information in the RequestLevelInputForUpdateSpaceTable</li>
	<li>rid and uid cannot be null or empty</li>
	<li>request cannot be null</li>
	<li>srmGetSpaceMetaData TMetaDataSpace[] srmGetSpaceMetaData(String userId, String[] spacetoken)</li>
	<li>retrieves the space metadata for the given space token</li>
	<li>srmGetSpaceTokens String[] srmGetSpaceTokens(String userSpaceTokenDesc, String uid)</li>
	<li>retrieves the space tokens matching the given userSpaceTokenDesc and uid</li>
	<li>addComponent boolean addComponent(String name, int totalSize, String type, String description, String mountingPoint)</li>
	<li>inserts into Component table.</li>
	<li>name and mountingPoint cannot be null or empty.</li>
	<li>name and mountingPoint needs to be unique for each row.</li>
	<li>updateComponent boolean updateComponent(String name, Hashtable ht)</li>
	<li>updates into Component table</li>
	<li>name cannot be null or empty.</li>
	<li>hashtable contains the key,value pairs, where keys are the columns of component table</li>
	<li>deleteComponent boolean deleteComponent (String name)</li>
	<li>deletes from the <a href="BeStMan3.DBDesign;nowysiwyg=0.html">SpaceAssignment</a> table all the spaceTokens associated with this component and deletes from Component table</li>
	<li>name cannot be null or empty.</li>
	<li>addSpaceToken boolean addSpaceToken(String name, String uid, String spaceToken, String userDesc, long totalSize, long guaranteedSize, int lifeTimeAssigned)</li>
	<li>inserts into <a href="BeStMan3.DBDesign;nowysiwyg=0.html">SpaceAssignment</a> table.</li>
	<li>name and uid and spaceToken cannot be null or empty.</li>
	<li>updateSpaceToken boolean updateSpaceToken(String spaceToken, Hashtable ht)</li>
	<li>updates <a href="BeStMan3.DBDesign;nowysiwyg=0.html">SpaceAssignment</a> table.</li>
	<li>spacetoken and ht cannot be null or empty.</li>
	<li>ht contains the key,value pairs where keys are columns of <a href="BeStMan3.DBDesign;nowysiwyg=0.html">SpaceAssignment</a> table</li>
	<li>deleteSpaceToken boolean deleteSpaceToken(String spaceToken)</li>
	<li>deletes space token from <a href="BeStMan3.DBDesign;nowysiwyg=0.html">SpaceAssignment</a> table.</li>
	<li>spacetoken cannot be null or empty.</li>
	<li>getLifeTimeOfSpaceToken : int getLifeTimeOfSpaceToken(String uid, String spaceToken)</li>
	<li>returns the lifetimeAssigned for the given spacetoken</li>
	<li>uid and spaceToken cannot be null or empty</li>
	<li>findSURLSForSpaceToken : string[] findSURLSForSpaceToken(String spaceToken)</li>
	<li>returns the SURLS[] for the given spacetoken</li>
	<li>spaceToken cannot be null or empty</li>
</ul>
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>
