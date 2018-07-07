<!DOCTYPE html>
<html>
<head>
	<title>Climate 100 Analysis</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="https://sdm.lbl.gov/style/sdmlogo.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://sdm.lbl.gov/style/styles.css" />
</head>
<body>
<?php readfile('https://sdm.lbl.gov/style/nav.php');?>
<div id="page">
<p><a href="index.html">Back to Climate 100 Home</a></p>
<h1>Cloud Computing for Climate Sciences</h1>
<h3>Jump to:</h3>
<ul>
	<li><a href="#pro">Project plan</a></li>
	<li><a href="#tas">Tasks</a></li>
	<li><a href="#ref">Reference</a></li>
	<li><a href="#tut">TUTORIALS FOR BUILDING VMS</a></li>
	<li><a href="#euc">Euca2ools</a></li>
	<li><a href="#bas">Basics of creating/scripting a custom non-interactive VM</a></li>
	<li><a href="#cona">Configuring a VM to run globus</a></li>
	<li><a href="#how">How to configure TSTORMS for a VM</a></li>
	<li><a href="#runt">Running TSTORMS on a VM</a></li>
	<li><a href="#runi">Running Instances on Eucalyptus</a></li>
	<li><a href="#cone">Configuring Eucalyptus network settings</a></li>
	<li><a href="#cli">CLIMATE VM USAGE</a></li>
	<li><a href="#cont">Control Script</a></li>
	<li><a href="#inp">INPUT FILE LIST</a></li>
	<li><a href="#deb">Debugging a VM</a></li>
</ul>

<p>Our overall goal is to explore the capability of cloud computing platforms for efficient scientific data
processing (see, for example, <a href="http://www.nimbusproject.org/">http://www.nimbusproject.org/</a>). During the summer of 2010, we plan to conduct
a few small scale tests to understand how the various components fit together. To this end, we plan the
following step-wise action items. Document each process as instructions for others. This work is done by Daren Hasenkamp, summer 2010.</p>

<a name="pro"><h2>Project plan</h3>
<ol>
	<li>Create a Virtual Machine for submission to an Infrastructure-as-a-service cloud. This initial VM will carry with it a simple job (such as generating a few random numbers) and report its progress to a remote web service host. Document the process as instructions for others.</li>
	<li>Submit the job to a cloud service at ALCF. Verify that the job is completed as expected.</li>
	<li>Create a VM to retrieve (stage-in) data from LBNL/NERSC using GridFTP, compute a checksum of the file, write the file name, time stamp and checksum into another file, and copy the new file to LBNL using GridFTP.</li>
	<li>Climate data analysis: Create a VM to include all necessary software to analyze climate data. Climate data needs to be staged from LBNL/NERSC using GridFTP, be analyzed, and the results need to be copied (staged-out) to LBNL using GridFTP.</li>
	<li>Find a way to distinguish the cloud jobs (VMs) from each other so that data assignment can be specific to each job.</li>
</ol>

<a name="tas"><h2>Tasks</h3>
<ul>
	<li>Task item description</li>
	<ul>
	<li>results</li>
	<li>links</li>
	<li>any documents, references, instructions, steps, results, diagrams, ...</li>
	</ul>
	<li>etc...</li>
</ul>

<a name="ref"><h2>Reference</h3>
<ul>
	<li>There are a few VM ready to be run on disk at BNL. The location is /star/data08/OSG/APP/vm/ and the naming convention is defined as described on <a href="https://sdm.lbl.gov/twiki/pub/Projects/Incubator/ClimateVM/STARVM-inst1.pdf">http://drupal.star.bnl.gov/STAR/comp/grid/infrastructure/specification-storage-and-cataloging-star-</a> virtual-machine-images (This link requires login). They will also have a new one soon for the incoming Cloud 2000 CPUs.</li>
	<li>Climate data from Michael Wehner and libraries: <a href="http://vis.lbl.gov/~romano/climate/tropicalstorms.html">http://vis.lbl.gov/~romano/climate/tropicalstorms.html</a></li>
	<ul>
	<li>Data is on archive.nersc.gov in /home/m/mwehner/fvcam2.2/D/amip/6h. Files with .h2. in the names are the right ones.</li>
	</ul>
</ul>

<a name="tut"><h2>TUTORIALS FOR BUILDING VMS</h3>
<p>All tutorials use the same Ubuntu 10.04 Server image available at <a href="http://uec-images.ubuntu.com/releases/10.04/beta2/ubuntu-10.04-beta2-server-uec-i386.tar.gz">http://uec-images.ubuntu.com/releases/10.04/beta2/ubuntu-10.04-beta2-server-uec-i386.tar.gz</a></p>
<p>Many of the commands require root access. This tutorial does not include "sudo" in front of these commands.
If you get permission errors running any of these commands, run them with sudo or as root.</p>
<p>Much of the customization process involves creation of "chroots," which are processes running with a
different root directory than the system-wide root directory. To do this, whatever VM image you work with
needs to have the same word-length as your machine. So, if you're on 32-bit machine, you need to use a 32-bit image.</p>

<a name="euc"><h2>Euca2ools</h3>
<p>Euca2ools is a command line interface for interacting with Eucalyptus clouds. Euca2ools is available through
the aptitude package manager:</p>
<p>$ apt-get install euca2ools</p>
<p>For other OS, follow instructions here: <a href="http://wiki.magellancloud.org/index.php/Eucalyptus_Tools">http://wiki.magellancloud.org/index.php/Eucalyptus_Tools</a></p>
<p>A listing of useful Euca2ools commands can be found here:
<a href="http://wiki.magellancloud.org/index.php/List_of_Eucalyptus_Commands">http://wiki.magellancloud.org/index.php/List_of_Eucalyptus_Commands</a></p>

<a name="bas"><h2>Basics of creating/scripting a custom non-interactive VM</h3>
<p>The easiest way to create a custom VM is to get a prebuilt image, modify it locally (using a chroot if
necessary), and upload it to the cloud. This example tutorial will show you how to create a VM that will use
wget to fetch a remote file. (Once you have this complete, you can replace the "wget" with whatever sort of
work you need your VM to do.)</p>
<p>Note that basic configuration tasks like this do not require a chroot; however, more complicated tasks (such
as using aptitude package manager) will.</p>
<p>1. Get a vm image you would like to use. I placed this in /tmp.</p>
<p>$ cd /tmp</p>
<p>$ wget <a href="http://uec-images.ubuntu.com/releases/10.04/beta2/ubuntu-10.04-beta2-server-uec-i386.tar.gz">http://uec-images.ubuntu.com/releases/10.04/beta2/ubuntu-10.04-beta2-server-uec-i386.tar.gz</a></p>
<p>$ tar zxvf ubuntu-10.04-beta2-server-uec-i386.tar.gz</p>
<p>I will refer to the .img file produced by this command as &lt;image file>. Depending on the image you use, you
might also end up with kvm and/or xen kernels/ramdisks, but we are not interested in these.</p>
<p>2. Mount the vm as a loop device.</p>
<p>$ mkdir &lt;mount point></p>
<p>$ losetup /dev/loop0 &lt;image file></p>
<p>$ mount /dev/loop0 &lt;mount point></p>
<p>(for us, &lt;image file>=="/tmp/lucid-server-uec-i386.img")</p>
<p>3. Now that your vm image is mounted, you can add a startup script to it. There are many ways to do this; the
following method worked well for me.</p>
<p>Use a text editor to open "&lt;mount point>/etc/rc.local". Note that the rc.local you're editing is contained in the
vm image, which you mounted to &lt;mount point>. rc.local is a shell script; you can do whatever you like with it.
Whatever script you add here will be run whenever your VM boots. So, to have your VM run wget at startup,
add the following line to rc.local:</p>
<p>wget <a href="http://www.google.com/">www.google.com</a></p>
<p>You might also want to shut your VM down after the job is completed. To do this, you can add a "halt" or
"shutdown" command to the end of the rc.local script. (You can also shut down by using a popen from within
whatever control script you end up implementing--eg, I used a multi-threaded python control script that
executes "popen('halt')" when it's done.)</p>
<p>3.5. At this point, if you wanted to install other software on the VM, you might want to chroot into your
mounted VM. We don't need to do this for this tutorial, but if you needed to, now would be the time. The
command would be</p>
<p>$ chroot &lt;mount point></p>
<p>4. Once you have saved rc.local, unmount the image and free the loop device.</p>
<p>$ umount /dev/loop0</p>
<p>$ losetup -d /dev/loop0</p>
<p>5. Now you can use euca2ools to bundle and upload your image. (euca2ools is a complex piece of software;
this guide assumes you have euca2ools installed and sourced [using ". ~/.euca/eucarc" on bash or "source
~/.euca/eucarc" on (t)csh].)</p>
<p>$ euca-bundle-image -i &lt;image file> --kernel &lt;kernel> --ramdisk &lt;ramdisk></p>
<p>(For the image in this tutorial: $ euca-bundle-image -i &lt;image file> --kernel eki-27CD1D49 --ramdisk eri-
02AE1CBC )</p>
<p>(You can view available kernels and ramdisks with the command euca-describe-images; replace &lt;kernel>
and &lt;ramdisk> with the id of the kernel and ramdisk you wish to use. On Magellan at Argonne, for the 32-bit
ubuntu 10.04 image we're using, the proper kernel is eki-27CD1D49 and the proper ramdisk is eri-
02AE1CBC. If you were using a 64-bit ubuntu 10.04 image, the proper kernel would be eki-44811D5A and the
proper ramdisk is eri-1F621CD3.)</p>
<p>$ euca-upload-bundle -b &lt;bucket> -m &lt;path to manifest generated by previous command></p>
<p>(You can choose whatever bucket you like; if it doesn't exist it will be created for you. -m &lt;manifest> specifies
the manifest file, which was created when you used the euca-bundle-image command.)</p>
<p>$ euca-register &lt;bucket>/&lt;manifest></p>
<p>(&lt;bucket> and &lt;manifest> are the bucket and manifest you used. The output of this command will be the ID
of your VM image.)</p>
<p>6. (Optional) You might wish to make your VM image private.</p>
<p>$ euca-modify-image-attribute &lt;your image id> -l -r all</p>
<p>7. Now you can launch your VM. The shell script you placed in rc.local will be executed when the VM
launches.</p>
<p>$ euca-run-instances -k &lt;your username>-keys -n 1 -z Magellan2 -g default &lt;your image ID></p>
</p>Check the running instance with</p>
<p>$ euca-describe-instances</p>
<p>and remember to shut it down with</p>
<p>$ euca-terminate-instances &lt;your image ID></p>

<a name="cona"><h2>Configuring a VM to run globus</h3>
<p>1. Get an image to work with. I'm placing mine in /tmp; it doesn't matter where you put yours. Again, make
sure the word length on the image is the same as your computers word length.</p>
<p>$ cd /tmp</p>
<p>$ wget <a href="http://uec-images.ubuntu.com/releases/10.04/beta2/ubuntu-10.04-beta2-server-uec-i386.tar.gz">http://uec-images.ubuntu.com/releases/10.04/beta2/ubuntu-10.04-beta2-server-uec-i386.tar.gz</a></p>
<p>2. Unpack your image.</p>
<p>$ tar zxvf ubuntu-10.04-beta2-server-uec-i386.tar.gz</p>
<p>Depending on the image you're working with, this produces a few files. We're only interested in the .img file
produced--for this tutorial, lucid-server-uec-i386.img. The other files are kernels and ramdisks, which you
might be interested in, but as of the writing of this tutorial Magellan at ALCF does not allow regular users to
upload their own kernels or ramdisks.</p>
<p>I will refer to the image file created by this command as &lt;image file>.</p>
<p>3. Mount the image and set up a chroot:</p>
<p>(Mounting the image:)</p>
<p>$ mkdir &lt;mount point></p>
<p>$ losetup /dev/loop0 &lt;image file></p>
<p>$ mount /dev/loop0 &lt;mount point></p>
<p>(Enable network access from within chroot:)</p>
<p>$ mount /etc/resolv.conf &lt;mount point>/etc/resolv.conf</p>
<p>4. Now chroot into the mounted vm.</p>
<p>$ chroot &lt;mount point></p>
<p>If everything is working properly, you should see a root prompt. From here on I will use a '#' prompt to indicate
commands entered from within the chroot, and a '$' prompt to indicate commands entered from outside of the
chroot.</p>
<p>5. I used aptitude to install globus. Installing from source is much more difficult; use aptitude if you can.
<p>First, add the following line to your VM's /etc/apt/sources.list:</p>
<p>deb <a href="http://mirrors.kernel.org/ubuntu">http://mirrors.kernel.org/ubuntu</a> lucid main universe</p>
<p>Now run:</p>
<p># apt-get update</p>
<p># apt-get install globus-gass-copy-progs globus-proxy-utils</p>
<p>6. Now you need to get your credentials onto the VM. This guide assumes you have a .p12 file from the DOE,
and that you have registered it with whatever hosts you will be using gsiftp to connect to. (I got my creds from
the DOE and registered them with NIM.)</p>
<p>(From outside the chroot)</p>
<p>$ cp &lt;credential>.p12 &lt;mount point>/tmp</p>
<p>(From inside the chroot)</p>
<p># mkdir /root/.globus</p>
<p># openssl pkcs12 -in &lt;credential>.p12 -clcerts -nokeys -out /root/.globus/usercert.pem</p>
<p># openssl pkcs12 -in &lt;credential>.p12 -nocerts -out /root/.globus/userkey.pem</p>
<p># chmod o= /root/.globus/userkey.pem</p>
<p># chmod g= /root/.globus/userkey.pem</p>
<p># rm /tmp/&lt;credential>.p12 (Not necessary, just good practice.)</p>
<p>7. Now we need to configure our trusted certificates. What you do here depends on what servers you will be
connecting to. At the end of this step, you need to have a directory (in the chroot) /etc/grid-security/certificates
that contains the proper files for each certificate you trust. I did this by copying /etc/grid-security/certificates
from dm.lbl.gov to my local machine and then running the following commands:</p>
<p>(From outside the chroot)</p>
<p>$ mkdir &lt;mount point>/etc/grid-security</p>
<p>$ cp -r &lt;path to certs>/certificates &lt;mount point>/etc/grid-security/certificates</p>
<p>8. Now we will create a proxy using grid-proxy-init. We need to do this now (and not in a script to be run at
VM boot time) because it requires keyboard interaction. We will also have to change the default proxy file
(and the environment variable that goes with it) because the default location is /tmp, which will be wiped when
the VM boots on a cloud.</p>
<p>(From within chroot)</p>
<p># grid-proxy-init -out /root/grid_proxy -valid 24:00</p>
<p>This creates a grid proxy valid for 24 hours. If you need more time you can alter the argument to -valid; the
format is hh:mm where "hh" is hours and "mm" is minutes. I placed the proxy in a non-default location; we will
have to set environment variables to get <a href="https://sdm.lbl.gov/twiki/bin/edit/Projects/Incubator/GridFTP?topicparent=Projects/Incubator.ClimateVM;nowysiwyg=0">GridFTP</a>/gsiftp to work with this proxy location. (See next step.)</p>
<p>9. Insert the following line in /etc/rc.local (inside your vm/chroot, not your local machine):</p>
<p>export X509_USER_PROXY=/root/grid_proxy</p>
<p>10. Now you are ready to script your vm to do whatever it needs to do. You can place whatever commands
you need your VM to execute in /etc/rc.local after the export line from step 10. For example, you could use
gsiftp to fetch a file from the server data1.lbl.gov and place it in /tmp by placing the following line in
/etc/rc.local after the export line you added in step 10:</p>
<p>globus-url-copy gsiftp://data1.lbl.gov//tmp/test.data <a href="file:////root/nersc.test">file:////root/nersc.test</a></p>
<p>11. After you've made whatever other customizations you would like (installing other programs, migrating
data, whatever), it's time to unmount everything.</p>
<p>(from within the chroot)</p>
<p># exit</p>
<p>(from outside the chroot)</p>
<p>$ umount &lt;mount point>/etc/resolv.conf</p>
<p>$ umount &lt;mount point></p>
<p>$ losetup -d /dev/loop0</p>
<p>12. Now we can bundle the image and upload it to Magellan.</p>
<p>$ cd /tmp</p>
<p>$ euca-bundle-image -i &lt;image file> --kernel eki-27CD1D49 --ramdisk eri-02AE1CBC</p>
<p>(Note: The kernel ramdisk pair provided are for the Ubuntu 10.04 image I've used in all tutorials. If you're
using a different image, you might need a different kernel/ramdisk pair. The Magellan admins will upload
whatever kernels/ramdisks you need them to. If you're using 64-bit Ubuntu image, you should try kernel eki-
44811D5A and ramdisk eri-1F621CD3.)</p>
<p>$ euca-upload-bundle -b &lt;image bucket> -m &lt;manifest created by previous command></p>
<p>$ euca-register &lt;image bucket>/&lt;manifest file></p>
<p>13. Now you can run your VM on the magellan cloud.</p>
<p>$ euca-run-instances -k &lt;username>-keys -n 1 -z Magellan2 -g default &lt;your VM id></p>
<p>If you do run an instance on the cloud, make sure to shut it down:</p>
<p>$ euca-terminate-instances &lt;instance ID></p>
<p>You can figure out the instance id of all running instances belonging to you with
$ euca-describe-instances</p>
<p>14. Now, if you like, you could log on to your VM to verify that everything worked correctly. If you added the
line from step 11, you'll be looking for the presence of /tmp/nersc.test. The first command only needs to be
run once per user/machine (ie, if you've done it already and you're on a machine with the same IP address,
you don't need to run it again).</p>
<p>$ euca-authorize -P tcp -p 22 -s &lt;your local machine's IP>/32 default</p>
<p>$ ssh -i ~/.ssh/Magellan.key root@&lt;allocated IP></p>
	
<a name="how"><h2>How to configure TSTORMS for a VM</h3>
<p>This tutorial involves creating a chroot of your VM image. I will use a $ prompt to denote commands entered
outside of the chroot, and # to denote commands entered inside the chroot.</p>
<p>1. Mount your vm image.</p>
<p>$ mkdir &lt;mount point></p>
<p>$ losetup /dev/loop0 &lt;your image></p>
<p>$ mount /dev/loop0 &lt;mount point></p>
<p>$ mount /etc/resolv.conf &lt;mount point>/etc/resolv.conf</p>
<p>2. Put tstorms.tar.gz in a chroot directory (this tutorial will use /usr/local) and unpack it.</p>
<p>$ cd &lt;mount point>/usr/local</p>
<p>$ wget <a href="http://vis.lbl.gov/~romano/climate/tstorms.tar.gz">http://vis.lbl.gov/~romano/climate/tstorms.tar.gz</a></p>
<p>$ tar zxvf tstorms.tar.gz</p>
<p>3. Install a fortran compiler:</p>
<p>$ chroot &lt;mount point></p>
<p># apt-get install gfortran</p>
<p>4. Install the netCDF libraries.</p>
<p># wget <a href="ftp://ftp.unidata.ucar.edu/pub/netcdf/netcdf.tar.Z">ftp://ftp.unidata.ucar.edu/pub/netcdf/netcdf.tar.Z</a></p>
<p># tar zxvf netcdf.tar.Z</p>
<p># cd netcdf-4.1.1</p>
<p># ./configure --prefix=/path/to/install --disable-netcdf-4</p>
<p>(I used --prefix=/usr/local)</p>
<p># make check install</p>
<p>5. Install the "nco" package, which contains ncks, which is needed by tstorms:</p>
<p># apt-get install nco</p>
<p>6. We also need to install the c shell:</p>
<p># apt-get install csh</p>
<p>7. We're almost ready to compile the tstorms code. We need to edit a couple lines in 2 configuration files.
(These directions are from Raquel Romanos instructions at
"<a href="http://vis.lbl.gov/~romano/climate/tropicalstorms.html">http://vis.lbl.gov/~romano/climate/tropicalstorms.html</a>."</p>
<p>-Add full path to fortran compiler (use "which gfortran" to find this):</p>
<p>set DEFAULT_COMPILE = 'full-path-to-f90-compiler -c -g'</p>
<p>set FINAL_COMMAND = 'full-path-to-f90-compiler *.o -o $1.exe $LINK_OPTS'</p>
<p>-Add full path to tropical storms directory:</p>
<p>set ANAL_PATH = full-path-to-local-copy-of-tstorms/source/tstorms</p>
<p>-Add full path to netCDF library:</p>
<p>set LINK_OPTS = '-Lfull-path-to-netcdf-lib-directory -lnetcdf'</p>
<p>On my image, the libnetcdf directory was /usr/local/lib.</p>
<p>In tstorms/source/trajectory/path_names_for_modules:</p>
<p>-Add full path to fortran compiler:</p>
<p>set DEFAULT_COMPILE = 'full-path-to-f90-compiler -c -g'</p>
<p>set FINAL_COMMAND = 'full-path-to-f90-compiler *.o -o $1.exe'</p>
<p>-Add full path to tropical storms directory:</p>
<p>set ANAL_PATH = full-path-to-local-copy-of-tstorms/source/trajectory</p>
<p>Finally, we have to make a small edit to the trajectory module. In tstorms/source/trajectory/ts_tools.f90,
change the "landmask" definition in *3* places:</p>
<p>landmask = 'full-path-to-local-copy-of-tstorms/source/trajectory/landsea.map'</p>
<p>Now (in the same file) change the "cmask" definition in *1* place:</p>
<p>cmask = 'full-path-to-local-copy-of-tstorms/source/trajectory/imask_2'</p>
<p>The trajectory modifications are not actually necessary if you don't intend to compile/run trajectory code on
your VM, but I did it anyway.</p>
<p>8. Now we're ready to compile. From tstorms/source/tstorms, execute the commands</p>
<p># rm *.o</p>
<p># rm .use*</p>
<p># ./compile_it tstorms_drive</p>
<p>And from tstorms/source/trajectory, execute</p>
<p># rm *.o</p>
<p># rm .use*</p>
<p># ./compile_it trajectory</p>

<a name="runt"><h2>Running TSTORMS on a VM</h3>
<p>First, install TSTORMS using the previous tutorial.</p>
<p>In order to run TSTORMS, several environment variables must be set. We will use /etc/rc.local to set these
environment variables at launch.</p>
<p>1. Add path to shared NCO <a href="https://sdm.lbl.gov/twiki/bin/edit/Projects/Incubator/NetCDF?topicparent=Projects/Incubator.ClimateVM;nowysiwyg=0">NetCDF</a> library (usually libnco.so) and path to fortran compiler libraries (for
gfortran, the filenames will contain "libgfortran"). For me, the NCO library was in /usr/lib/nco/ and the fortran
libraries were in /usr/lib/. So I added the following line to /etc/rc.local:</p>
<p>export LD_LIBRARY_PATH=/usr/lib/nco/:/usr/lib/</p>
<p>This will be slightly different for you depending where your NCO and gfortran libraries are located.</p>
<p>2. Add path to TSTORMS executables to PATH. In rc.local, add</p>
<p>export PATH=$PATH:/&lt;path to tstorms>/source/tstorms/:&lt;path to tstorms>/source/trajectory/</p>
<p>Now you can execute TSTORMS from any directory with the command</p>
<p># &lt;path to tstorms>/scripts/run_tstorms_general &lt;path to <a href="https://sdm.lbl.gov/twiki/bin/edit/Projects/Incubator/NetCDF?topicparent=Projects/Incubator.ClimateVM;nowysiwyg=0">NetCDF</a> input file> &lt;path to output file></p>
<p>(Note: the output file will be created if it does not exist.)</p>

<a name="runi"><h2>Running Instances on Eucalyptus</h3>
<p>Imagine you have on your local filesystem a virtual machine image located at &lt;image>. This tutorial will show
you how to upload, register, manage, and run it. Note that this tutorial is a repeat of information provided in
previous tutorials. I include it only for convenience.</p>
<p>1. Now bundle your image and upload it to Magellan. The --kernel and --ramdisk options are not necessary
unless your image requires a special kernel/ramdisk pair to run. If it does, you'll need to ask the
administrators to add the kernel; once they upload it, you can use "euca-describe-images" to figure out the
kernel/ramdisk IDs, which you can use in the following command:</p>
<p>$ euca-bundle-image -i lucid-server-uec-i386.img --kernel &lt;kernel ID> --ramdisk &lt;ramdisk ID></p>
<p>$ euca-upload-bundle -b &lt;image bucket> -m &lt;manifest produced by previous command></p>
<p>$ euca-register &lt;image bucket>/&lt;manifest></p>
<p>The output of euca-register is the image ID of your image.</p>
<p>2. Now you can run your VM on the magellan cloud.</p>
<p>$ euca-run-instances -k &lt;username>-keys -n 1 -z Magellan2 -g default &lt;machine ID></p>
<p>where -n specifies how many instances to run, -z specifies what cloud to run on (magellan2 for us), -g is the
security group (you might at some point create your own), and &lt;machine ID> is the ID of whatever image you
wish to run.</p>
<p>3. Make sure to shut your instance down:</p>
<p>$ euca-terminate-instances i-&lt;instance ID></p>
<p>You can also shut instances down by executing a "halt" or "shutdown" command from within the VM. This is
useful if you want to create non-interactive VMs that shut themselves upon job completion.</p>
<p>4. You can figure out the instance id of all running instances belonging to you with</p>
<p>$ euca-describe-instances</p>
<p>5. If you like, you can ssh into your VM.</p>
<p>$ euca-authorize -P tcp -p 22 -s &lt;your local machine's IP>/32 default</p>
<p>$ ssh -i ~/.ssh/Magellan.key root@&lt;allocated IP></p>
<p>This assumes the VM was allocated an external IP by the eucalyptus scheduler. If it wasn't, run</p>
<p>$ euca-allocate-address</p>
<p>which outputs an address for you to use. Then run</p>
<p>$ euca-associate-address -i &lt;instance ID> &lt;address></p>
<p>where &lt;instance ID> is the ID of the instance you wish to associate the address with, and &lt;address> is the
address returned by "euca-allocate-address".</p>
<p>Technically, you are supposed to deallocate your address using</p>
<p>$ euca-disassociate-address &lt;address>; euca-release-address &lt;address></p>
<p>However, Eucalyptus seems to do this for you if you don't. Still, it's probably better if you do.
You'll also probably want to configure network settings.</p>

<a name="cone"><h2>Configuring Eucalyptus network settings</h3>
<p>All VMs run by Eucalyptus run under a "security group", which is basically a bundling of information about
network rules. By default, VMs on Eucalyptus will refuse all network traffic; if you want to use the network,
you need to open up whatever ports, protocols, and IPs you want to use. The method is to create a security
group, modify group rules using "euca-authorize", and run VMs under this security group. These commands
only need to be run once per security group; ie, once you add a rule, it stays until you revoke it. (See listing of
Eucalyptus commands on magellan wiki for revocation syntax.)</p>
<p>To add a security group:</p>
<p>$ euca-add-group -d &lt;description> group-name</p>
<p>To open up protocols/ports/IPs for VMs run under a given security group:</p>
<p>$ euca-authorize [-P protocol] [-p port-range] [-s source-subnet] security-group</p>
<p>So, for example, to authorize TCP for all ports and source IPs for the security group "my-group":</p>
<p>$ euca-authorize -P tcp -p 0-65535 -s 0.0.0.0/0 my-group</p>
<p>To authorize UDP on port 52000 from a single IP address:</p>
<p>$ euca-authorize -P udp -p 52000 -s a.b.c.d/32 my-group</p>

<a name="cli"><h2>CLIMATE VM USAGE</h3>
<p>Configuring input files: The climate VM contains a newline-separated list of remote URLs in the file
/root/inputs.txt. Modify these at your leisure.</p>
<p>Configuring output directory: The output directory is provided as an argument to the Python control script,
which is invoked by rc.local. To change the output directory, edit the third argument of the "python
/root/ClimateVMCoord.py" invocation in /etc/rc.local. You need to give it a valid server and an existing
directory (it will not create the directory for you).</p>
<p>Network settings: The climate VM uses a couple of ports and protocols. You need to enable UDP ports 64747
and 64748 using euca-authorize command (see "Configuring eucalyptus network settings"). If you want to
SSH to the VM you'll also need to open TCP 22.</p>
<p><a href="https://sdm.lbl.gov/twiki/bin/edit/Projects/Incubator/GridFTP?topicparent=Projects/Incubator.ClimateVM;nowysiwyg=0">GridFTP</a>In order for the Vm to use GridFTP (ie, gsiftp from globus-url-copy), you need to put your grid
credentials onto the VM and generate a proxy. Follow instructions 6-8 in the "Configuring a VM to run Globus"
tutorial. Doing step 7 will only be necessary if the trusted certificates on the VM have expired.</p>
<p>Trusted certificates: The trusted certificates on the VM (in /etc/grid-security/certificates) expire periodically (I'm
not sure how long they last). If you see the VM fail, get its output (see "debugging a vm") and check whether
you see any output that has to do with CRLs; if so, the trusted certificates have expired and you need to
follow instruction 7 in the "Configuring a VM to run Globus" tutorial.</p>

<a name="cont"><h2>Control Script</h3>
<p>I wrote a control script in python to implement leader election and data coordination between VM instances.</p>
The script should be run at start time using /etc/rc.local. Usage is as follows:
<p>python path/to/ClimateVMCoord.py &lt;port> &lt;path to input file list> &lt;URL of output directory> &lt;path to tstorms>
<p>&lt;port> defines the ports the control script uses. It will use UDP &lt;port> and TCP &lt;port+1>. &lt;path to input file
list> is the path to a newline-seperated list of URLs to input files. &lt;URL of output directory> is the URL of the
remote directory you would like the results placed in. (Note: Your VM needs to be able to use <a href="https://sdm.lbl.gov/twiki/bin/edit/Projects/Incubator/GridFTP?topicparent=Projects/Incubator.ClimateVM;nowysiwyg=0">GridFTP</a> to
copy files between both the server hosting the input files and the server hosting the output directory. See
"configuring a VM to run globus".)</p>
<p>So, if the control script is at /root/ClimateVMCoord.py, you want to use port 64747/64748, have an input list at
/root/inputs.txt, want to stage your results out to the directory /global/u1/d/&lt;user>/cyclones/ on
dtn02.nersc.gov, and have tstorms in /usr/local/tstorms/, then you should place the following line in
/etc/rc.local:</p>
<p>python /root/ClimateVMCoord.py 64747 /root/inputs.txt dtn02.nersc.gov//global/u1/d/&lt;user>/cyclones
/usr/local/tstorms/</p>
<p>This control script runs TSTORMS as a child process, so you'll need to have the proper environment
variables set. See the "Running TSTORMS on a VM" tutorial. It also uses globus tools--see "Configuring a
VM to run globus".</p>

<a name="inp"><h2>INPUT FILE LIST</h3>
<p>The control script takes as input a newline-seperated list of URLs to input files. For example, if you have
some <a href="https://sdm.lbl.gov/twiki/bin/edit/Projects/Incubator/NetCDF?topicparent=Projects/Incubator.ClimateVM;nowysiwyg=0">NetCDF</a> files in a repository on dtn02.nersc.gov, the input file list might look like this:</p>
<p>dtn01.nersc.gov//project/projectdirs/clim100/analysis/d26-amip.cam2.h2.1979-01-05-00000.nc</p>
<p>dtn01.nersc.gov//project/projectdirs/clim100/analysis/d26-amip.cam2.h2.1979-01-10-00000.nc</p>
<p>dtn01.nersc.gov//project/projectdirs/clim100/analysis/d26-amip.cam2.h2.1979-01-15-00000.nc</p>
<p>dtn01.nersc.gov//project/projectdirs/clim100/analysis/d26-amip.cam2.h2.1979-01-20-00000.nc</p>

<a name="deb"><h2>Debugging a VM</h3>
<p>Debugging can be a pain because the turnaround time from completing a draft of the code and getting output from it can take upwards of a half hour. Moreover, it can be rather difficult to actually get the output. I've been using a few methods for this.</p>
<p>The quick and dirty way to debug is to throw print statements into your code, run the VM, and get the instance ID of a running instance. Then run "euca-get-console-output &lt;instance ID>", which gives you the first 64k of output (from stdout and stderr) from the specified instance. Unfortunately, I've found "the first 64k of output" to be woefully inadequate, especially since over half of that is taken up by the output of the boot process. Also, the command is really unreliable--it sometimes takes 15 minutes to get the output, and sometimes it never gets it at all.</p>
<p>So, instead, I've been writing all my output to both a file and stdout. (Having it go to stdout in addition to the file is useful so that euca-get-console-output continues to be useful.) I close and reopen the file periodically so that I can log onto my VM (using SSH; see "Running instances on Eucalyptus" and "configuring Eucalyptus network settings") and view the file. This is the most useful debugging method I have found.</p>
</div>
<?php readfile('https://sdm.lbl.gov/style/footer.php');?>
<script src="https://sdm.lbl.gov/style/javascript.js"></script>
</body>
</html>
