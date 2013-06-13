<?php 

# Test for running async php script
#
# anshuk.kumar@essindia.co.in
#

echo "Starting Test!" . PHP_EOL;

$start_time = time();

$url = "http://localhost/php-async-test/async.php";

echo "Sending request to $url"; 
shell_exec("curl -silent $url -S -o '/tmp/output' > /dev/null ");
$output = file_get_contents('/tmp/output');

$end_time = time();

$fetch_time = $end_time - $start_time;

if (strpos($output, "Here's my awesome web page") === false) {
	echo PHP_EOL . "Test Failed. Error in response" . PHP_EOL;
    echo $output . PHP_EOL;
	die;
}

if ($fetch_time < 5) {
    echo PHP_EOL . "Is file present : ";
    echo shell_exec("ls /tmp/ -al | grep php_async_test");
    echo PHP_EOL . "Waiting for 5 seconds, for bg process to complete, which will create the /tmp/php_async_test :";
    sleep(5);
    echo PHP_EOL . "Is file present : ";
    echo shell_exec("ls /tmp/ -al | grep php_async_test");

	if (file_exists('/tmp/php_async_test') == 1)
		echo PHP_EOL . "Test success." . PHP_EOL;
	else
		echo PHP_EOL . "Test Failed. Background process did not execute." . PHP_EOL;

} else {
	echo PHP_EOL . "Test Failed. Took more than 5 seconds" . PHP_EOL;
}
