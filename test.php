<?php 

echo "Starting Test!" . PHP_EOL;

echo "Output received : " . PHP_EOL;

$start_time = time();

echo $output = file_get_contents("http://localhost/php-async-test/async.php");

$end_time = time();

$fetch_time = $end_time - $start_time;

if (strpos($output, "Here's my awesome web page") === false) {
	echo PHP_EOL . "Test Failed. Error in response" . PHP_EOL;
	die;
}

if ($fetch_time < 5) {
	echo PHP_EOL . "Test success." .PHP_EOL;
} else {
	echo PHP_EOL . "Test Failed. Took more than 5 seconds" . PHP_EOL;
}
