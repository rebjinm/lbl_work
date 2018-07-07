<!DOCTYPE html>
<html>
<head>
<title>Call20100225</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<p><a href="https://sdm.lbl.gov/stornet/stornet-meetings.html">Back to StorNet Meetings</a></p>
<h1>Feb. 25, 2010</h1>
<p>Attendees: Dantong, Dmitrios, Xin, Arie, Junmin, Alex</p>
<h2>Technical discussion</h2>
<ul>
<li>Dimitrios sent the WSDL</li>
<li>discussed the API</li>
<ul>
<li>Revised the StorNet API based on our F2F and last phone conference discussions.</li>
<li>Except for the structural differences, some renaming to better reflect the functionality. all is subject to further discussions.</li>
</ul>
</ul>


<ul>
<li>The basic difference is the distinction between requests and reservations.%BR%A request may be associated with multiple reservations (1 to n relationship, 1 on 1 is the simplest case) %BR%A call may affect a whole request or a particular reservation which is part of a request.</li>
</ul>
<li> The API support now 4 calls (reserveRequest, statusRequest, cancelRequest, modifyRequest)</li>
<li> All calls return a TResponse structure which is a revised version of TReserveRespone</li>
<li> statusRequest and cancelRequest accept a TRequestReference structure which can target a whole request, some, or only one reservation within a request</li>
<li> modify request can target a whole request, some, or only one reservation, and apply one or more modifications to each one</li>
<li> EStatusCode has 2 more values, CANCELLED, and NO_SOLUTION, to reflect the result of canceling a request and the response when no satisfactory solution was found a a list of counter offers is returned</li>
<li> TReserveRequest now includes TBAGInfo[] to pass the BAG segments.</li>
<li> added TFlowInfo[] to TResponse to return more details about individual reservations (e.g. ports, etc.)</li>
<ul>
<li>advisory solution is only for alternative solutions</li>
<li>no_solution -&gt; alternative_solution</li>
<li>no_solution -&gt; "no" solution and searched time windows --&gt; further discussion to be done</li>
<li>time in long integer</li>
<li>failure means that nothing can be done (TP could not find anything)</li>
</ul>


<ul>
<li>From Junmin's notes</li>
<ul>
<li>each request solution has multiple reservation-windows.%BR%requestId 1---&gt;N reservationID %BR%you can specify ports for each window.</li>
<li>no multiple soluntion with multiwindows</li>
<li>alternative solution will be provided with status code=NO_SOLUTION,%BR%add wsdl will add two functions, extendTimeout() & commitRequest(). %BR%If one cann't commit right away, call extendTimeout().</li>
<li>new attribute: advisory solutuions is (array of soluntions) and it is provided when NO_SOLUTION.</li>
<li>with status being RESERVED, then terapath is going to commit the reservation right away. Shall BeStMan find the solution is not needed, then it can call cancel().</li>
<li>name change: NO_SOLUTION above ==&gt; ALTERNATIVE_SOLUTION</li>
<li>TBagInfo needs to add the bandwith attribute.</li>
<li>NO_SOLUTION will be added to indicate failure that is not due to incorrect request parameters, and new attributes will be added in the status structure in addition to current code/explanation pair, so the search restrictions from terapath can be specified when NO_SOLUTION is provided.</li>
</ul>
<li>email will follow for the final structure.</li>
</ul>


<ul>
<li>Further email discussion from Arie on 02/25/2010</li>
<ul>
<li>We have discussed how to make use of the additional information that TeraPaths can provide when NO_SOLUTION is determined. We came to the conclusion that advice from terapaths without knowing the bandwidth availability graph from BeStMan is useless, because terapaths need this bandwidth availability to make meaningful suggestions. Also, it is best if the max time for giving such advice will be determined by BeStMan (perhaps based on re-negotiation with the user).</li>
<li>Therefore, we propose to retract the attributes "AlternativeSolution" and "AdvisorySolutions" that we discussed in the conference call today. Instead, BeStMan will call with a larger time limit that it is comfortable with.</li>
<li>For example, if we want to have the solution with shortest duration somewhere between time t1 to t2, we call reserve([t1, ..] ...[.., t2], flag=shortest duration). Here [] indicates the multiple windows of the availability graph. If it returns a solution, we take it. Otherwise, we will call reserve([t1,..], ..[..t3], flag=earliest completion), where t3 &gt; t2.</li>
<li>Similarly, if we want to have a solution that has earliest completion time from t1 to t2, but our deadline for completion is t3(&gt;t2), we call reserve([t1,..], ..[..t3], flag=earliest completion) directly. Note that we give an extended availability window from t1-t3. So, if a solution is found only after t2, we&rsquo;ll consider that the &ldquo;alternate solution&rdquo;. In other words, BeStMan will provide a larger window, t1-t3, that could include &ldquo;alternate solutions&rdquo; from TeraPaths in case that a solution in not found for the desired period of t1-t2.</li>
<li>This way TeraPath does not need to search beyond the given limit for a solution that BeStMan may not be able to use. Thus, all requests are uniform, and terapath needs to return only a single solution, or NO_SOLUTION for the provided window.</li>
<li>We can keep the extend()/commit() functions that were mentioned today for all regular reservation request, including for solutions that are within the desired t1-t2 time window.</li>
</ul>
</ul>
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>