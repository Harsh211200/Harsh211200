<HTML>
<BODY>
	<TABLE>
		<TH>Number</TH><TH>Last Name</TH><TH>First Name</TH>
		<?php 
			// $conn = mysqli_connect(“host”,”user”,”password”,"Database");
			$conn = mysqli_connect("localhost","root","","saleco");
			// Check connection
				if (!$conn) { die("Connection failed: " . mysqli_connect_error());}
				echo "Connected successfully <br>";
			// once conenction established prepare a query
			$query = "Select * FROM tblcustomer";
			// Run the query
			$result = mysqli_query($conn,$query) or die("Unable to run the query");
			// Notice the use of mysqli_num_rows
			echo("<br> Select returned  ". mysqli_num_rows($result)."  rows. <br><br>");
			// Print the result line by line	
			while ($row = mysqli_fetch_array($result, MYSQLI_NUM)){
				echo "<TR><TD>$row[0]</TD><TD>$row[1]</TD><TD>$row[2]</TD></TR>";
			}//End of while
			//Close conenction to the database
			mysqli_close($conn);
		?>
	</TABLE>
</BODY>
</HTML>
