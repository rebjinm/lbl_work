<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<a href="http://lbl.gov/%7Ekwu/fastbit/index.html">Summary</a>
<a href="http://lbl.gov/%7Ekwu/fastbit/applications.html">Applications</a>
<a href="http://lbl.gov/%7Ekwu/fastbit/compression.html">Compression</a>
<a href="http://lbl.gov/%7Ekwu/fastbit/publications.html">Publications</a>
<a href="http://lbl.gov/%7Ekwu/fastbit/src/">Software</a>
<a href="http://lbl.gov/%7Ekwu/fastbit/doc/index.html">Documentation</a>
2008/12: <a href="http://ascr-discovery.science.doe.gov/genealogy/fastbit1.shtml">ASCR Discovery article</a>
2008/07: <a href="http://letxequalx.blogspot.com/2008/07/berkeley-lab-wins-four-prestigious-2008.html">R&D 100 award</a>
2008/02: <a href="https://codeforge.lbl.gov/projects/fastbit/">FastBit source in new home</a>
2007/08: <a href="http://www.biosolveit.de/conferences/abstracts/2007-08-21_ACS2_JS.html">FastBit speed up drug discovery tool</a>
2007/06: <a href="http://crd.lbl.gov/%7Ekewu/ps/LBNL-62756.html">Physical Design Reviewed</a>
2006/03: <a href="http://portal.acm.org/citation.cfm?doid=1132863.1132864">Prove formal optimality</a><a href="http://crd.lbl.gov/%7Ekewu/ps/LBNL-49626.html">Draft</a>]
2006/02: Work on Enron data made headline at <a href="http://www.hoise.com/primeur/06/articles/weekly/AE-PR-03-06-39.html">PRIMEUR</a>.
2005/05: Appeared in <a href="http://technews.acm.org/archives.cfm#item7?fo=2005-05-may/may-18-2005.html">ACM TechNews</a>.
2005/05: Grid Collector wins <a href="http://www.supercomp.de/isc2005/index.php?s=conference&unterseite=iscaward">ISC Award</a>.
2005/01: CRD news <a href="http://crd.lbl.gov/html/news/CRDreport0105.pdf">report on FastBit</a>.
2004/12: WAH <a href="http://freepatentsonline.com/6831575.html">patent</a> issued.
FastBit: An Efficient Compressed Bitmap Index Technology
As computers become more pervasive, many scientific and commercial endeavors are collecting or
generating tremendous amount of data. Typically, a relative smaller number of records contain the keys to
new insight or new trends [ <a href="http://www.ctwatch.org/quarterly/articles/2005/02/scientific-data-management">1</a><a href="http://www-db.cs.wisc.edu/cidr/papers/P06.pdf">2</a>]. One of the most daunting challenges in data analyses or data mining is to
quickly retrieve these useful records. FastBit answers this challenge with efficient compressed bitmap
indexes. In computational complexity analysis, we proved that our index scheme is optimal [ 3, 4]. In a
number of tests, we observed that our indexing scheme can answer range queries tens of times faster than
the well-known indexing schemes [ <a href="http://doi.ieeecomputersociety.org/10.1109/SSDM.2002.1029710">5</a>]. By integrating FastBit with a number of existing technologies, such as
the Storage Storage Manager [<a href="https://sdm.lbl.gov/wiki/pub/Projects/FastBit/SRM.book.chapter.pdf">6</a>], we are able to significantly ease the data management tasks in many data
intensive science projects. An <a href="http://www.iop.org/EJ/abstract/1742-6596/16/1/077">overview article about FastBit applications</a> has appeared in SciDAC 2005
conference proceedings and more information about the applications is available at <a href="http://lbl.gov/%7Ekwu/fastbit/applications.html">applications.html</a>.
Recent highlightsDecember 2008: <a href="http://ascr-discovery.science.doe.gov/genealogy/fastbit1.shtml">FastBit featured in DOE - Science - ASCR Discovery</a>.
November 2008: FastBit significantly speed up the analysis of Laser Wakefield Particle Accelerator simulation
data [ <a href="http://vis.lbl.gov/Vignettes/Incite7/">Project description</a><a href="http://portal.acm.org/citation.cfm?id=1413370.1413422">SC08 publication</a> ( Abstract)] [ movie]
July 2008: !FastBit recognized as one of 100 most innovative new products by R&D magzine [ Note from
Representative Ellen Tauscher] [ News release][Poster for R&D 100 Award Recepition][Photo 1 from the R&D
100 Award Receiption] [ Photo 2 from the R&D 100 Award Receiption]
March 2008: FastBit made its way to UC Davis Visualization group, appeared in work on Bin-Hash Indexing:
A Parallel GPU-Based Method For Fast Query Processing .
August 2007: A research group in Germany has applied FastBit technology to virtual screening for molecular
docking used by pharmaceutical companies among others. At the ACS Fall 2007 meeting, <a href="http://www.zbh.uni-hamburg.de/staff.php?mode=_details&id=schlosser">Jochen Schlosser</a>
and <a href="http://www.biosolveit.de/people/vips/rarey.html">Matthias Rarey</a><a href="http://www.biosolveit.de/conferences/abstracts/2007-08-21_ACS2_JS.html">TrixX-BMI</a>, and showed that it can
screen libraries of ligands <a href="http://www.biosolveit.de/conferences/talks/2007-08-21_ACS2_JS.pdf">140--250 times faster</a> than the state of art screening tools (see page 18 of their
</div>
p<a href="http://www.biosolveit.de/conferences/talks/2007-08-21_ACS2_JS.pdf">resentation at ACS Fall 2007 meeting</a>
June 2007: A <a href="http://crd.lbl.gov/%7Ekewu/ps/LBNL-62756.html">paper</a> jointly produced by the developers of RIDBit and FastBit examines the physical design
aspects of the two packages, and reveals that the design choices of FastBit are indeed effective. The paper is
to be presented at <a href="http://ideas.concordia.ca/ideas07/">IDEAS 2007</a> conference.
Comparison with other implementations of bitmap index
The potential of using bitmap index to significantly improve the query performance did not go unnoticed by
the database vendors, for example, <a href="http://www.oracle.com/technology/pub/articles/sharma_indexes.html">ORACLE</a><a href="http://infocenter.sybase.com/help/topic/com.sybase.dc00170_1270/html/iqapg/iqapg286.htm">Sybase IQ</a> have implemented different bitmap indexes.
However, bitmap indexes are not as popular as B-trees because most of the existing database products are
designed initially for transactional data, where any index on data must be updated quickly as data records are
modified. This is required in transactional applications, but for majority of the data analysis applications, such
<a href="http://en.wikipedia.org/wiki/Data_warehouse">data warehousing</a><a href="WebHome.html">scientific data management</a>, the data to be queried is not modified, at least not modified
frequently. In these cases, a new physical data layout and a new set of indexing techniques are more
appropriate. One prominent example of a new approach is the <a href="http://www.vertica.com/">Vertica</a> database product.
In the database research community, vertical data organization has been studied extensively, for example
<a href="http://monetdb.cwi.nl/">MonetDB</a>
indexes to provide a unique method of processing queries on large data sets.
<a href="http://lbl.gov/%7Ekwu/fastbit/compression.html">Compression</a>
FastBit implements a patented bitmap compression technique to speed up the bitmap indices [7]. The key to
the new compression scheme is that it is much more suited for implementation on CPU's operating on words
rather than on bytes. Though others observed the same need to align the compressed data with the computer
architecture, our compression technique has the distinct advantage of being much simpler to encode and
decode. More importantly, it enables efficient bitwise logical operations that are needed to answer user
queries.
More information about <a href="http://lbl.gov/%7Ekwu/fastbit/compression.html">compression</a><a href="http://lbl.gov/%7Ekwu/fastbit/compression.html">this link</a>.
<a href="http://lbl.gov/%7Ekwu/fastbit/rangeQueries.html">Range Queries</a>
Using bitmap indices, range queries can be answered with bitwise logical operations. Since bitwise logical
operations are generally very well supported by computer hardware, uncompressed bitmaps involving
relatively smaller number of bitmaps can be efficiently answered. In most scientific applications, the number
of bitmaps in a bitmap index is typically large, say more than 1000. This causes the uncompressed bitmaps to
be very large. Our compression scheme addresses the size problem by reducing the compressed size to the
level that is below a typical B-tree implementation [3]. In addition, because our compression scheme supports
fast bitwise logical operations on the compressed bitmaps, the time to answer a one-dimensional range query
is a linear function of the number of hits [3]. This is theoretically optimal, since any system to answer a query
must at least list all the hits and therefore has the same theoretical time complexity as our approach. This
theoretical property is remarkable as only a few most efficient indexing schemes including B+tree and B*tree
have it. There are two factors that make FastBit even more remarkable. Since answers to one-dimensional
queries produced from bitmap indices can be easily combined to answer multi-dimensional queries, bitmap
index scheme that is efficient for one-dimensional range queries is also efficient for multi-dimensional range
queries. The same is not true for other optimal indexing schemes. In addition, FastBit is not only theoretically
</div>
efficient; it is also efficient in tests involving various different application datasets [3, 4, 5].
More information about performance of <a href="http://lbl.gov/%7Ekwu/fastbit/rangeQueries.html">range queries</a><a href="http://lbl.gov/%7Ekwu/fastbit/rangeQueries.html">rangeQueries.html</a>.
<a href="http://lbl.gov/%7Ekwu/fastbit/applications.html">Applications</a>
Here is a short list of application stories. More <a href="http://lbl.gov/%7Ekwu/fastbit/applications.html">FastBit applications</a><a href="http://lbl.gov/%7Ekwu/fastbit/applications.html">applications.html</a>.
<a href="http://lbl.gov/%7Ekwu/fastbit/applications.html#gridcollector">Grid Collector</a>
energy physics experiment called STAR [7]. One of the main goals of the experiment was to investigate
the existence of such state of matter as Quark Gluon Plasma. One indication of the existence of Quark
Gluon Plasma is a phenomenon called jet quenching. However, only a small fraction of the high-energy
collisions may have this phenomenon. Effectively identifying these key events out of hundreds of
millions of collision events stored mostly on tape is a significant challenge. To meet this challenge, we
clearly need efficient searching strategies. In addition, we also need to address the file management
issues because the distributed nature of the storage systems and analysis resources involved.
<a href="http://lbl.gov/%7Ekwu/fastbit/applications.html#featuretracking">Feature tracking</a>
predominant instrument of study. As in an analysis of simulation of hydrogen-air autoignition process, a
common analysis task is to track the progression of some particular feature, such as the evolution of
the ignition kernel, the propagation of the flame front, or the procession of a shock wave. There are two
general categories of existing approaches, one based on visualization techniques or one based on
database techniques. The former typically can only performs very simple search operations, therefore
unable to process features involving many variables or complex conditions; while the later is better at
processing complex conditions, it typically handles spatial characters of the features very slowly. Our
compressed bitmap based approach has the unique advantage of efficiently handle both multi-
dimensional conditions and complex spatial characters.
<a href="http://vis.lbl.gov/Research/Dex/">DEX</a>
aims is to provide a flexible visual data exploration tool that can interactively process complex user
queries on datasets. <a href="WebHome.html">FastBit</a> is uniquely suited to fill this role of searching, which is very limited in
existing visualization tools. In a demonstration at Supercomputing 2004 conference, we show that DEX
can find isocontours significantly faster than commonly used visualization tools such as VTK. Clearly,
finding isocontours is one of the simplest capabilities of DEX. In the immediate future, our goal is to
design an intuitive interface so that the complex capability can be easily accessible to users.
1.
J. Gray, D. T. Liu, M. Nieto-Santisteban, A. Szalay, D. DeWitt, and G. Heber. Scientific Data
Management in the Coming Decade. CT Watch Quarterly. February, 2005.
2.
J. Becla and D. L. Wang, <a href="http://www-db.cs.wisc.edu/cidr/papers/P06.pdf">Lessons Learned from Managing a Petabyte</a>, CIDR, 2005.
3.
K. Wu, E. Otoo, and A. Shoshani. <a href="http://doi.acm.org/10.1145/1132863.1132864">Optimizing bitmap indices with efficient compression</a>. ACM
Transactions on Database Systems, v 31, pages 1-38, 2006. [ <a href="http://crd.lbl.gov/%7Ekewu/ps/LBNL-49626.html">Preprint</a>]
4.
K. Wu, E. J. Otoo and A. Shoshani. On the Performance of Bitmap Indices for High Cardinality
Attributes. VLDB'2004, pp. 24 - 35. 2004. [ Preprint]
5.
K. Wu, E. J. Otoo and A. Shoshani. <a href="http://doi.ieeecomputersociety.org/10.1109/SSDM.2002.1029710">Compressing Bitmap Indexes for Faster Search Operations</a>.
SSDBM'2002, pp. 99-108. 2002. [ <a href="http://crd.lbl.gov/%7Ekewu/ps/LBNL-49627.html">Abstract</a><a href="http://crd.lbl.gov/%7Ekewu/ps/LBNL-49627.pdf">Preprint</a>]
6.
A. Shoshani, A. Sim, and J. Gu. Storage Resource Managers: Essential Components for the Grid, in
Grid Resource Management: State of the Art and Future Trends, Edited by J. Nabrzyski, J. M. Schopf,
J. weglarz, Kluwer Academic Publishers, 2003. <a href="http://sdm.lbl.gov/%7Earie/papers/SRM.book.chapter.pdf">[Preprint</a>] Information about Storage Resource
Manager (SRM) is also available at <a href="https://sdm.lbl.gov/Projects/SRMproject">/Projects/SRMproject</a>.
7.
K. Wu, A. Shoshani and E. J. Otoo. Word aligned bitmap compression method, data structure, and
apparatus. US Patent <a href="http://freepatentsonline.com/6831575.html">6,831,575</a>. 2004.
</div>
8. More information about STAR is available at this main website <a href="http://www.star.bnl.gov/">http://www.star.bnl.gov</a>. Information
about using FastBit in <a href="http://tinyurl.com/27pdh2">Grid Collector</a><a href="http://tinyurl.com/27pdh2">available</a>.
Related sites:
<a href="http://www.universityofcalifornia.edu/">University of California</a>
<a href="http://www.lbl.gov/">Berkeley Lab</a>
<a href="http://www.lbl.gov/CS">Computing Sciences</a>
<a href="http://crd.lbl.gov/">Computational Research</a>
<a href="https://sdm.lbl.gov/wiki">Scientific Data Management Group</a>
<a href="mailto:john%20dot%20wu%20at%20acm%20dot%20org">Contact us</a>
<a href="http://www.lbl.gov/Disclaimers.html">Disclaimers</a>
<a href="https://hpcrdm.lbl.gov/pipermail/fastbit-users">FastBit mailing list</a>
document.write(document.lastModified) 01/05/2009 14:40:05
Projects/FastBit/WebHome
</html>
