<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<p><a href="index.html">Back to ICEE Home</a></p>
<h1>ICEE Introduction</h1>
<p>Large-scale scientific exploration in domains such as high-energy physics, fusion, and climate are based on
international collaborations. As these collaborations produce more and more data, the existing workflow
management systems are hard pressed to keep pace. A necessary solution is to process, analyze,
summarize and reduce the data before it reaches the relatively slow disk storage system, a process known as
in transit processing (or in-flight analysis). We propose to dramatically increase the data handling capability of
collaborative workflow systems by leveraging the popular in transit processing system known as ADIOS, and
integrating this with FastBit to provide selective data accesses. These new features will contribute to a new
collaborative system named ICEE that aims at significantly improving the data flow management for
distributed workflows. The improved data processing capability will enable large international projects to
make near real-time collaborative decisions. As scientific teams tackle increasingly complex problems, many
data analysis workflows have to dynamically adjust to the experimental conditions and sensor output; thus,
workflows need to also be modified dynamically for evolving user requirements. The ICEE framework will not
only allow users to modify parameters of a workflow, but also dynamically modify its processing elements and
alter its structure. Additionally, we plan to incorporate data mining features to provide feedback and
recommendations while the user is constructing or modifying a workflow. Overall, the ICEE framework will
allow researchers to conduct distributed analyses on extreme scale data efficiently and easily. It will enable
collaborative decisions in near real-time for geographically distributed teams, reduce the turn-around time on
large instruments, and improve scientific productivity.</p>
<p>Our research plan will initially focus on the needs of a fusion experiment called KSTAR, which is establishing
extensive international collaborations to achieve its highly advanced missions. Each pulse of KSTAR tokamak
is expected to last 300 seconds, which is almost as long as that of ITER (300-500 s). The data produced by
KSTAR is more than 10 times those produced by the current US and EU tokamaks, which have only 10
seconds of operation time. Within the duration of a KSTAR pulse (also known as a shot), it is highly desirable
for the participants of an experiment to study the diagnostic output and adjust the experimental setting to
improve the on-going pulse. Such real-time feedback to large experiments could be performed with near-line
analysis that requires efficient access to the experimental measurements and powerful analysis engines. We
plan to study options to enable a workflow to transfer data quickly and utilize distributed computing power
whenever available. We will start by investigating the ADIOS in transit processing system because it has
been demonstrated to respond efficiently in similar application scenario.</p>
<p>Another approach to improve the efficiency collaborative data processing is to minimize the data movement.
We plan to explore high-level summary information and indexing data structures for this purpose. Users could
operate on the smaller summary data when possible, and could locate the necessary data records quickly
when must. For example, a workflow that computes the sizes of magnetic islands might take input data from
a high-resolution imaging device, however only certain pixels from an image would be part of the magnetic
islands. Filtering the data records before they are transferred will reduce the amounts of data moved and
improve the overall system response time. An indexing structure could be used to perform this filtering
operation efficiently. We anticipate using FastBit indexing system first and explore other indexing packages as
necessary.</p>
<p>In addition to improving the efficiency of workflows, we also plan to develop automated workflow
recommendation algorithms to assist the users with the development of dynamic workflows. This will improve
the ease-of-use for the workflow system. While we intend to prove the effectiveness of the ICEE framework
with data analysis operations of KSTAR, many other collaborative projects are facing similar challenges and
could benefit from a more efficient and user-friendlier workflow management system. These features will
make ICEE an enabler for exascale data science.</p>
</html>
