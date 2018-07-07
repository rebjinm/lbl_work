The other command line options of BDM are listed below:
      * For more specific formats of input file, please refer to this link [[BDMOptions]].


|Command line option|Description of option              |sample command      |
|-f|valid path to input file|<ul><li>-f /path_to_input_file</li></ul>|
|-sd|valid source dir|<ul><li>-sd gsiftp://host:port/path_to_source_dir</li></ul>|
|-s|valid source file|<ul><li>-s gsiftp://host:port/path_to_source_file</li></ul>|
|-td|valid target dir|<ul><li>-td file:////path_to_target_dir</li></ul>|
|-t|valid target file|<ul><li>-t file:////path_to_target_file</li></ul>|


|-buffersize|valid integer |<ul><li>-buffersize 1048576 (default: 1048576)</li></ul>|
|-concurrency|valid integer|<ul><li>-concurrency 10</li></ul>|
|-dcau|<true/false>|<ul><li>-dcau (Default:false)</li></ul>|
|-parallelism|valid integer |<ul><li>-parallelism 3</li></ul>|


|-browse/-ls|<true/false><ul><li>Browse remote directory and exit</li></ul>|<ul><li>-ls</li><li>-browse</li></ul>|
|-checksum|<true/false><ul><li>Checksum option is optional.</li><ul><li>By default, it does not calculate checksum after file transfers.</li><li> When checksum value is provided in the input file, checksum verification is done by comparing the given checksum value in the input file with the local checksum computed after file transfer. If the checksum does not match, it retries for designated times.</li><li> When checksum value is not provided in the input file, local checksum can be computed after file transfer and stores in the database for later use or writes out in the ouput file for publishing.|<ul><li>-checksum [md5/adler32/crc32] (default: md5)</li></ul></ul>|
|-logpath|path to logfile|<ul><li>-logpath /path_to_log_file(Default:creates log file in the bin directory)</li></ul>|
|-maxretrial|valid integer|<ul><li>-maxretrial 5 (default: 3)</li></ul>|
|-nocheckdiskspace|<true/false>|<ul><li>Default: checks disk space</li></ul>|
|-overwrite|<true/false><ul><li>overwrites any existing file in the local disk.</li><li>By default, it does not overwrite. It checks the local disk for the matching file name and compare the local filesize with remote file size, when both matches it skips overwriting.</li></ul>|<ul><li>-overwrite</li></ul>|
|-perftest|<true/false><ul><li>measures memory-to-memory performance for testing purpose</li></ul>|<ul><li>-perftest</li></ul>|
|-recursive|<true/false>|<ul><li>-recursive</li></ul>|
|-retrydelay|valid integer in sec.|<ul><li>-retrydelay 300 (default: 120 sec.)</li></ul>|
|-symlink|<true/false> <ul><li>Transfer soft links</li></ul>|<ul><li>Default: skips soft links</li></ul>|


|-old|generates legacy proxy from cert and key files|<ul><li>-proxyinit -old</li></ul>|
|-proxyfile|path to user proxy|<ul><li>-proxyfile /path_to_user_proxy</li></ul>|
|-proxyinit|Initiates proxy|<ul><li>-proxyinit</li></ul>|
|-rfc|generates rfc proxy from cert and key files|<ul><li>-proxyinit -rfc</li></ul>|
|-usercert|path to user cert|<ul><li>-usercert /path_to_user_cert</li></ul>|
|-userkey|path to user key|<ul><li>-userkey /path_to_user_key</li></ul>|


