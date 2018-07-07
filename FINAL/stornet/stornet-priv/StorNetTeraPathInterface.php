<!DOCTYPE html>
<html>
<head>
<title>StorNetTeraPathInterface</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<h1>StorNet BeStMan-to-TeraPaths Interface Specification</h1>
<ul>
<li>Oct 20, 2009, modified Aug 11, 2011</li>
<li>Junmin Gu, Arie Shoshani, Alex Sim</li>
<li>Support: srm@lbl.gov</li>
</ul>
<h2>Introduction</h2>
<p>The purpose if this interface is to specify the communication between BeStMan and TeraPaths when negotiating a bandwidth request. After BeStMan determines the maximum bandwidth it can use, it needs to communicate with TeraPaths, providing total volume, maximum bandwidth, and maximum completion time desired by the user. TeraPaths is expected to return with a bandwidth-time window if one can be found that terminate before the requested completion time, or return failure.</p>
<p>In case of a failure, BeStMan can request Terapaths to find a window that goes beyond the max completion time (by not specifying a max completion time), and this can be returned as an alternative to the user, who may accept or reject it. This possibility will not be exercised at first, but only as a second step of the implementation, but the interface is designed to accommodate that by allowing max completion time to be unspecified (i.e. open ended). <font color="steelblue"><h2></p>
<h2>_DISCLAIMER_</h2>
<p></h2></font></p>
<h1>Time</h1>
<ul>
<li>Time is represented in long.</li>
</ul>
<h1>CompletionTime</h1>
<ul>
<li>It is measured in seconds.</li>
<li>A value that is equals to or less than zero implies no restriction on completion time.</li>
</ul>
<h1>Bandwidth</h1>
<ul>
<li>Network bandwidth is measured in kbps (kilo bits per second).</li>
</ul>
<h2>Type Definitions</h2>
<ul>
<li><u>Underlined</u> attributes are REQUIRED. The required attributes must be parsed correctly and must give proper error messages when not supported.</li>
</ul>
<h1>ESchedulePreference</h1>
<ul>
<li>enum:</li>
<ul>
<li>ANY</li>
<li>EARLIEST_COMPLETION_TIME</li>
<li>SHORTEST_TRANSFER_DURATION</li>
</ul>
</ul>
<ul>
<li>A user can indicate prefrence on how the requests shall be handled.</li>
</ul>
<h1>TRequestReference</h1>
<ul>
<li>typedef struct</li>
<ul>
<li>String <u>requestId</u>,</li>
<li>String userId</li>
</ul>
</ul>
<ul>
<li>This structure is used to refer to a request to TeraPaths. It is the input of the request handling functions like commitCommit(), cancelReqeust() etc.</li>
<li>userId is a user-supplied id for authorization by TeraPaths.</li>
</ul>
<h1>TReserveRequest</h1>
<ul>
<li>typedef struct</li>
<ul>
<li>String userId,</li>
<li>TBandwidthRequestParameters <u>desiredValues,</u></li>
<li>long timeout,</li>
<li>ESchedulePreference schedulePreference</li>
</ul>
</ul>
<ul>
<li>This structure is used to construct the reservation request to TeraPaths. It is the input of the function reserveRequest().</li>
<li>userId is a user-supplied id for authorization by TeraPaths. The transfer related parameters are contained in the structure TBandwidthRequestParameters.</li>
<li>The input value "timeout" is for client to specify how long the preferred wait time that the client needs upon knowing a temporary reservation being made to finally commit the reservation.</li>
</ul>
<h1>TResponse</h1>
<ul>
<li>typedef struct</li>
<ul>
<li>TReturnStatus <u>status</u>,</li>
<li>String requestId,</li>
<li>long requestExpirationTime,</li>
<li>TBandwidthRequestParameters[] arrayOfReservationData</li>
</ul>
</ul>
<ul>
<li>This structure is used by TeraPaths to respond to a reservation request. It is the output of the function cancelRequest(), commitRequest(), modifyRequest(), reserveRequest() and extendTimeoutRequest().</li>
<li>TeraPaths server must return a status to all the function calls.</li>
<li>Upon success for a reserveRequest(), TeraPaths must return:</li>
<ul>
<li>the values that are reserved for this client in arrayOfReservationData,</li>
<li>a request id "requestId" if involved, so the client can later cancel this reservation (through BeStMan) if desired.</li>
</ul>
<li>If the request cannot be processed right away, TeraPaths must return</li>
<ul>
<li>a request id "rid" so the client can use it to check status (through BeStMan).</li>
</ul>
</ul>
<h1>TReturnStatus</h1>
<ul>
<li>typedef struct</li>
<ul>
<li>EStatusCode <u>code</u>,</li>
<li>String explanation</li>
</ul>
</ul>
<ul>
<li>A return status is used for the status of a reservation request.</li>
<li>return status consists of a code, which is described by TStatusCode, and the explanation.</li>
</ul>
<h1>E StatusCode</h1>
<ul>
<li>enum</li>
<ul>
<li>ACTIVATED</li>
<li>CANCELLED</li>
<li>EXPIRED</li>
<li>FAILURE</li>
<li>NO_AUTHORIZATION,</li>
<li>NO_SOLUTION</li>
<li>NO_SUCH_REQUEST,</li>
<li>NOT_SUPPORTED,</li>
<li>QUEUED,</li>
<li>RESERVED</li>
<li>TEMPORARY</li>
<li>TIMED_OUT</li>
</ul>
</ul>
<ul>
<li>If a reservation is made within the client's desired parameters, the status code is TEMPORARY. A request id is expected in this case. Client is expected to call commitRequest() within a given time to confirm with the reservation. Once committed successfully, the status is set to RESERVED. If commitRequest was not called timely, the status of the request will be TIMED_OUT.</li>
<li>Once the status is RESERVED, client is advised to check status again, until, the status becomes ACTIVATED. This indicates the bandwidth reservation is materialized with the underlying system. Client can now use the bandwidth.</li>
<li>If a reservation can not be processed right away, the status code shall set to be QUEUED and a request id is provided. Clients are expected to pull status periodically until a final status is reached.</li>
<li>NO_SUCH_REQUEST is returned from getReservationStatus() for a request id that is not currently active (QUEUED or RESERVED).</li>
</ul>
<h1>TBAGInfo</h1>
<ul>
<li>typedef struct</li>
<ul>
<li>long segmentBandwidth,</li>
<li>long segmentEndTime,</li>
<li>long segmentStartTime</li>
</ul>
</ul>
<h1>TFlowInfo</h1>
<ul>
<li>typedef struct</li>
<ul>
<li>String key,</li>
<li>String value</li>
</ul>
</ul>
<h1>TBandwidthRequestParameters</h1>
<ul>
<li>typedef struct</li>
<ul>
<li>TBagInfo[] bagInfo</li>
<li>long volumn,</li>
<li>TFlowInfo[] flowInfo</li>
</ul>
</ul>
<ul>
<li>A client provides desired begin time (optional), volume in MB (required), max bandwidth (required), max completion time (optional) to TeraPaths along with source and destination hosts to get a reservation for file transfer.</li>
<li>Bandwidth is measured in kbps (kilo bits per second). See Disclaimer.</li>
<li>maxCompletionTime is measured in seconds. See Disclaimer.</li>
</ul>
<h1>TBandwidthResponseParameters</h1>
<ul>
<li>typedef struct</li>
<ul>
<li>long availableBandwidth,</li>
<li>long beginTime,</li>
<li>long endTime,</li>
<li>TFlowInfo[] flowInfo,</li>
<li>String reservationId,</li>
<li>String reservationStatus</li>
</ul>
</ul>
<h1>TModifyRequest</h1>
<ul>
<li>typedef struct</li>
<ul>
<li>String requestId,</li>
<li>String uid,</li>
<li>TReservationModifcationSet[] modificationSet</li>
</ul>
</ul>
<h1>TReservationModificationSet</h1>
<ul>
<li>typedef struct</li>
<ul>
<li>String reservationId,</li>
<li>TReservationModificationParameters[] modificationParameters</li>
</ul>
</ul>
<h1>TReservationModificationParameters</h1>
<ul>
<li>typedef struct</li>
<ul>
<li>String modificationOperation,</li>
<li>TModificationInfo modificationInfo</li>
</ul>
</ul>
<h1>TModificationInfo</h1>
<ul>
<li>typedef struct</li>
<ul>
<li>String key,</li>
<li>String value</li>
</ul>
</ul>
<h2>Function Definitions</h2>
<h1>reserveRequest</h1>
<ul>
<li>in:</li>
<ul>
<li>TReserveRequest <u>reserveRequest</u></li>
</ul>
<li>out:</li>
<ul>
<li>TResponse <u>reserveResponse</u></li>
</ul>
</ul>
<ul>
<li>The output of this function contains: status code (mandatory), request id (if reservation were made) and reserved values (if reservation were made.)</li>
<li>The status code NOT_SUPPORTED is not applicable here.</li>
<li>The request id is expected if the status codes returned are one of QUEUED and TEPORARY.</li>
</ul>
<h1>commitRequest</h1>
<ul>
<li>in:</li>
<ul>
<li>TRequestReference <u>request</u></li>
</ul>
<li>out:</li>
<ul>
<li>TResponse <u>response</u></li>
</ul>
</ul>
<ul>
<li>Client needs to call this function to confirm to TeraPath to reserve the solution provided by the outcome of reserveRequest().</li>
</ul>
<h1>modifyRequest</h1>
<ul>
<li>in:</li>
<ul>
<li>TModifyRequest <u>modifyRequest</u></li>
</ul>
<li>out:</li>
<ul>
<li>TResponse <u>response</u></li>
</ul>
</ul>
<ul>
<li>The client uses this function to make changes to the reserved request.</li>
</ul>
<h1>extendTimeOutRequest</h1>
<ul>
<li>in:</li>
<ul>
<li>TRequestReference <u>request</u></li>
</ul>
<li>out:</li>
<ul>
<li>TResponse <u>response</u></li>
</ul>
</ul>
<ul>
<li>If unable to call commitRequest() within the time specified from the outcome of resreveRequest(), client can use this function to extend the timeout.</li>
</ul>
<h1>statusRequest</h1>
<ul>
<li>in:</li>
<ul>
<li>TRequestReference <u>request</u></li>
</ul>
<li>out:</li>
<ul>
<li>TResponse status <u>response</u></li>
</ul>
</ul>
<ul>
<li>The status of a reservation, as with the output of the reserveRequest() function, contains: status code (mandatory), request id (if reservation were made) and reserved values (if reservation were made.)</li>
<li>All the status codes defined in TStatusCode are possible to be returned. Notice that if the reserveRequest() is implemented as a synchronized function in TeraPaths, then NOT_SUPPORTED can be returned for this function.</li>
<li>If a reservation with the specified rid is expired, FAILURE can be returned with an explanation.</li>
</ul>
<h1>cancelRequest</h1>
<ul>
<li>in:</li>
<ul>
<li>TRequestReference <u>request</u></li>
</ul>
<li>out:</li>
<ul>
<li>TResponse status <u>response</u></li>
</ul>
</ul>
<ul>
<li>Client calls this function to cancel a reservation with the specified rid (through BeSMan).</li>
<li>If there is a valid reservation with this rid, TeraPaths is expected to honor the cancelation.</li>
<li>If the request with this rid is still queued, TeraPaths shall stop processing the request.</li>
<li>In other cases, for example, the request does not exist at all, or the reservation with this rid is already expired, TeraPaths takes no action.</li>
</ul>
<h2>Use Case Scenario</h2>
<ul>
<li>Client calls reserveRequest() with uid, desired starting time (optional), data volume, maximum completion time (optional), source and target.</li>
<li>TeraPaths tries to find a match and reply to the client. If it can not answer right away, it can choose to return QUEUED status with a request id "rid". User will poll status with getReservationStatus(rid) until request is processed.</li>
<li>Possible outcomes are:</li>
<ul>
<li>If user is not authorized, NOT_AUTHORIZED is returned as status code</li>
<li>If TeraPaths cannot honor the request for any other reasons, the status code to use is NO_SOLUTION and an explanation is encouraged to be included in the return status from TeraPaths.</li>
<li>If a match is made that satisfies client's input parameters, TeraPaths reserves right away, with a rid assigned to the client, and this reservation will expired after a timeout. The corresponding status code is TEPORARY. The reservation details are returned to the client, along with a time within which commitRequest() shall be called. BeStMan will call commitRequest() and upon success, then continues with file transfer.</li>
<li>Otherwise, BeStMan might try to reserve with alternative parameters (e.g. a later beginTime, and double the maxCompletionTime) and see if a reservation can be made. If so, it will get back to the user. Once the user acknowledges, the actual file transfer will then start. Otherwise, this reservation will be canceled by BeStMan.</li>
<li>If a match can not be made for any other reason, TeraPaths returns with status code FAILURE with an explanation.</li>
</ul>
</ul>
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>