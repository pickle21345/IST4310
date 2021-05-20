<?php
	/* checks to make sure the 3 values  */
	if ((isset($_POST['salary'])) && (isset($_POST['state1'])) && (isset($_POST['state2'])))
	{

		/* Sets variables to user submitted values and sanitizes them */
		$salary = filter_var($_POST['salary'], FILTER_SANITIZE_STRING); 
		$state1 = filter_var($_POST['state1'], FILTER_SANITIZE_STRING);
		$state2 = filter_var($_POST['state2'], FILTER_SANITIZE_STRING);

		/* connects to the database */
		mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
		$mysqli = mysqli_connect("localhost", "root", "passwords", "salaries");
		/* queries database for the cost index for the 1st state*/
		$query = "SELECT cost_index FROM cost WHERE state = '".$state1."'";

		$result = mysqli_query($mysqli, $query);

		/* fetch associative array */
		while ($row = mysqli_fetch_row($result)) {
			/* sets current equal to the cost index of the 1st state*/
			$current = $row[0];
		}
		/* queries database for the cost index for the 2nd state*/
		$query = "SELECT cost_index FROM cost WHERE state  = '".$state2. "'";

		$result = mysqli_query($mysqli, $query);

		while  ($row = mysqli_fetch_row($result)) {
			/* sets future equal to the cost index of the 2nd state*/
			$future = $row[0];
		}

		/* sets the css file for our page through an echo*/
		echo "<link rel='stylesheet' href='styles2.css'>";
		
		echo "<div class = 'header'><h1>Samra Moreno Real Estate Services</h1></div>";
		/* Makes a navigation bar link to homepage*/
 		echo "<div class='navbar'><a href='index.html'>Homepage</a></div>";


		echo "<div  class='row'>";
		/* sets two columns with the current and future states displayed*/
		echo "<div class='column2' style= 'width: 50%'><p>Current State: " .$state1. "</p></div>";

		echo "<div class='column2' style='width: 50%'><p>Future State: " .$state2. "</p></div>";


		//$newSalary = $salary((($future-$current)/100)+1); this is the formula to calculate comparison value
		$newSalary = $salary*((($future-$current)/100)+1);
		
		/* displays the salary required to maintain same standard of living in the footer*/
		echo "<div class='footer2'><p> Your Salary to maintain the same standard of living is ".$newSalary." !!</p></div>";
		echo "</div>";
	}
	/* If values are missing tells the user to go back and correct them */
	else
	{
      		print "<p>Missing or invalid parameters. Please go back to our  homepage to
      		enter valid information.<br />";
      		print "<a href='index.html'>Samra&Oscar</a>";
	}
?>
