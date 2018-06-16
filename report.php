
<?php include'header.php'; ?>
<?php

session_start();
$connect = mysqli_connect("localhost","root","","g2db");

?>


	

		

<body>
	<h2 >Report</h2>
			<br /><br />
			
			<table>
					<tr align="left">
									<th width="10%">Date</th>
                                    <th width="10%">Item Name</th>
                                    <th width="5%">Cost</th>
                                    <th width="10%">Amount</th>
                                    <th width="5%"></th>
                    </tr>
			</table>
			
			<br/>
<div style="float: left; width: 27%;">			
<?php
				$query = "SELECT * FROM doc ORDER BY date ASC";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>


<table class="table table-bordered">

	<tr align="left">

			<td><class="text"><font size="4"><?php echo $row["date"]; ?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</font></td>
			
			<td><class="text-info"><font size="4"><?php echo $row["name"]; ?></font></td>



			</tr>
</table>
		


	<?php
		}
	}
?><br/><br/><br/><br/>
</div>
<div style="float: left; width: 7%;">
<?php
				$query = "SELECT * FROM doc ORDER BY date ASC";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>
				<table class="table table-bordered">

	<tr align="left">

			<td><class="text-danger"><font size="4">S$ <?php echo $row["cost"]; ?></font></td>

			</tr>
</table>

					<?php
		}
	}
?><br/><br/><br/><br/>
</div>

<div style="float: left; width: 3%;">
<?php
				$query = "SELECT * FROM doc ORDER BY date ASC";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>
				<table class="table table-bordered">

	<tr align="left">
	
			<td><class="text"><font size="4"><?php echo $row["amount"]; ?></font></td>

			</tr>
</table>
		


				
					<?php
		}
	}
?><br/><br/><br/><br/>

</div>
</body>

<?php include'footer.php'; ?>