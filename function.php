<?php
	if ((isset($_POST['salary'])) && (isset($_POST['state1'])) && (isset($_POST['state2'])))
	{


		$salary = filter_var($_POST['salary'], FILTER_SANITIZE_STRING); 
		$state1 = filter_var($_POST['state1'], FILTER_SANITIZE_STRING);
		$state2 = filter_var($_POST['state2'], FILTER_SANITIZE_STRING);
		
		mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
		$mysqli = mysqli_connect("localhost", "root", "passwords", "salaries");
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

		echo "<link rel='stylesheet' href='styles2.css'>";
		
		echo "<div class = 'header'><h1>Samra Moreno Real Estate Services</h1></div>";

 		echo "<div class='navbar'><a href='index.html'>Homepage</a></div>";


		echo "<div  class='row'>";

		echo "<div class='column2' style='background-color:#aaa; width: 50%'><p>Current State: " .$state1. "</p></div>";

		echo "<div class='column2' style='background-color:#bbb; width: 50%'><p>Future State: " .$state2. "</p></div>";


		//$newSalary = $salary((($future-$current)/100)+1);
		$newSalary = $salary*((($future-$current)/100)+1);

		echo "<div class='footer2'><p> Your Salary to maintain the same standard of living is ".$newSalary." !!</p></div>";
		echo "</div>";
	}
	else
	{
      		print "<p>Missing or invalid parameters. Please go back to our  homepage to
      		enter valid information.<br />";
      		print "<a href='index.html'>Samra&Oscar</a>";
	}
?>
