/**
 * Javascript AJAX call to test async php code
 *
 * anshuk.kumar@essindia.co.in
 */

$ = require('jquery');

var starttime = new Date().getTime() / 1000;

$.ajax({
	url : 'http://localhost/php-async-test/async.php',
	success :  function () {
		var endtime = new Date().getTime() / 1000;
		var fetchtime = starttime - endtime;
		if (fetchtime < 5 )
			console.log('Test success.');
		else 
			console.log('Test Failed.');
	},
	error :  function () {
		console.log('Error occured.');
	}
});
