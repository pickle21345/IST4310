<?php
	if ((isset($_POST['salary'])) && (isset($_POST['state1'])) && (isset($_POST['state2'])))
	{


		$salary = filter_var($_POST['salary'], FILTER_SANITIZE_STRING); 
		$state1 = filter_var($_POST['state1'], FILTER_SANITIZE_STRING);
		$state2 = filter_var($_POST['state2'], FILTER_SANITIZE_STRING);
		
		mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
		$mysqli = mysqli_connect("localhost", "root", "password", "salaries");
		$query = "SELECT cost_index FROM cost WHERE state = '".$state1."'";

		$result = mysqli_query($mysqli, $query);

		/* fetch associative array */
		while ($row = mysqli_fetch_row($result)) {
			$current = $row[0];
		}

		$query = "SELECT cost_index FROM cost WHERE state  = '".$state2. "'";

		$result = mysqli_query($mysqli, $query);

		while  ($row = mysqli_fetch_row($result)) {
			$future = $row[0];
		}

		echo "<p> Current State: " .$state1. "</p>";

		echo "<p> Future State: " .$state2. "</p>";

		echo "<p> This is Current Salary " .$salary. "</p>";
			
		//$newSalary = $salary((($future-$current)/100)+1);
		$newSalary = $salary*((($future-$current)/100)+1);

		echo "<p> Your New Salary ".$newSalary." !!</p>";
	}
	else
	{
      		print "<p>Missing or invalid parameters. Please go back to the lab.html page to
      		enter valid information.<br />";
      		print "<a href='lab07.html'>5k race</a>";
	}
?>

