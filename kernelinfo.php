<?php
// Get the output of the previous shell script
$output = shell_exec('cat /etc/yum.repos.d/*.repo | grep -B8 -e "enabled = 1" -e "enabled=1" | grep name | awk -F= \'{print $2}\'');

// Get the output of hostname, uname and lsb_release commands
$hostname = shell_exec('hostname');
$kernel = shell_exec('uname -r');
$distro = shell_exec('lsb_release -d');

// Display the result in HTML
echo "<html>\n";
echo "<head>\n";
echo "<title>Server Info</title>\n";
echo "</head>\n";
echo "<body>\n";
echo "<h1>Server Info</h1>\n";
echo "<p>The current hostname is $hostname.</p>\n";
echo "<p>The current kernel version is $kernel.</p>\n";
echo "<p>The current Linux distribution is $distro.</p>\n";
echo "<h2>Repository Names</h2>\n";
echo "<pre>$output</pre>";
echo "</body>\n";
echo "</html>\n";
?>
