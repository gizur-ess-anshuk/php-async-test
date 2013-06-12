<?php

//Continue to run script even when the connection is over
ignore_user_abort(true);
set_time_limit(0);


// buffer all upcoming output
ob_start();
echo "Here's my awesome web page";

// get the size of the output
$size = ob_get_length();

// send headers to tell the browser to close the connection
header("Content-Length: $size");
header('Connection: close');

// flush all output
ob_end_flush();
ob_flush();
flush();

// close current session
if (session_id()) session_write_close();

// background process starts here
// user should never have to wait for 5 seconds
sleep(5);
shell_exec('touch /tmp/temp001');