<!DOCTYPE html>
<html>
<head>
<title>RDFJoin</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<h1>Semantic Web with FastBit</h1>
<p>The Resource Description Framework (RDF) defines a simple triplet structure of subject, property and object for storing data. This data structure is very flexible, but answering queries on this data structure can be slow. A key challenge is that many queries requires self-join of the data table to produce the answer. There are a number of fairly effective approaches to answer the queries. This work extends the RDFJoin technique proposed by McGlothlin and Khan. One modification to RDFJoin is to add Word-Aligned Hybrid compression to the RDFJoin implementation, currently being implemented by Xufei Qian and Amarnath Gupta. The RDFJoin employs a set of bitmaps of different lengths that do not directly refer to the rows of the original data. This requires extra indirection when answering queries. We believe that more directly representing the positions of the raw data in the bitmaps can reduce the complexity of query processing and improve the query response time. The following is an outline of the major items needed to extend FastBit to realize this basic objective.</p>
<h1>Project plan</h1>
<p>1 Shared dictionary for objects and subjects. From database point of view, a RDF dataset contains a single table with three columns named subject, property and object. The most time-consuming type of operation is a database join, a self-join because it involves the same table. Furthermore, the common self-joins most natural involve either object or subject or both of them. This is the key underlying reason for building a shared dictionary for these two columns. This innovation allows them to perform joins using integer comparisons instead of string comparisons, which significantly reduce the time needed for answering queries. We need to produce a shared dictionary in FastBit.</p>
<p>1 Composite indexes. The tables POTable, PSTable and SOTable in the RDFJoin are essentially the three two-column projections of the original data. However, to save space, they are implemented with bitmaps that require additional indirection in order to refer back to the original triplets. More directly representing these three tables as composite bitmap indexes will remove this extra level of indirection and reduce query processing time. With WAH compression, the composite bitmap indexes may be about the same size as the three tables used in RDFJoin. A composite bitmap index uses a composite key, for example a combination of property and object for the equivalent of POTable. Currently, FastBit lacks the functions to build composite indexes. We need to develop the code for this.</p>
<p>1 RDFTable. This will be a specialization of the FastBit table data structure to handle the RDF data. The following is a list of operations to be supported in order to match the functionality offered by RDFJoin.</p>
<p>1 User interface layer. This layer provides the functionality to handle user queries. This can be accomplished either as a stand-alone command-line tool or as a plug-in to postgresql, pending further investigation of their pros and cons. For convenience of discussion, we will refer to this layer as FastRDF.</p>
<h2>Tasks</h2>
<ul>
<li>Test data</li>
<ul>
<li>find test data on the web</li>
<li>get test data from San Diego Supercomputer Center (SDSC)</li>
</ul>
<li>RDFJoin data structures</li>
<ul>
<li>SOIDTable</li>
<li>PSTable</li>
<li>POTable</li>
<li>SOTable</li>
<li>SOJoinTable</li>
<li>OOJoinTable</li>
<li>SSJoinTable</li>
</ul>
</ul>
<br>

</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>