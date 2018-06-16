<?php include'header.php'; ?>
<?php

session_start();
$connect = mysqli_connect("localhost","root","","g2db");

if(isset($_POST["add_to_cart"]))
{
    if(isset($_SESSION["shopping_cart"]))
    {
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        if(!in_array($_GET["id"], $item_array_id))
        {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
				'item_id'		=>	$_GET["id"],
				
				'item_name'		=>	$_POST["hidden_name"],
				'item_cost'		=>	$_POST["hidden_cost"],
				'item_amount'		=>	$_POST["amount"]
			);
        array_push($_SESSION['shopping_cart'], $item_array);
    }
        else
        {
            echo '<script>alert("Item Already Added")</script>';
            echo '<script>window.location="payment.php"</script>';
			/*                             index.php*/
        }
    }
    else
    {
        $item_array = array(
				'item_id'		=>	$_GET["id"],
				'item_name'		=>	$_POST["hidden_name"],
				'item_cost'		=>	$_POST["hidden_cost"],
				'item_amount'		=>	$_POST["amount"]
			);
        
        $_SESSION["shopping_cart"][0] = $item_array;
    }
}

if(isset($_GET["action"]))
{
    if($_GET["action"] == "delete")
    {
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
            if($values["item_id"] == $_GET["id"])
            {
                unset($_SESSION["shopping_cart"][$keys]);
                echo '<script>alert("Item Removed")</script>';
                echo '<script>window.location="payment.php"</script>';
            }
        }
    }
    if ($_GET["action"] == "confirm"){
       foreach($_SESSION["shopping_cart"] as $keys => $values){
        $item_name = $values["item_name"];
        $item_cost = $values["item_cost"];
        $item_amount = $values["item_amount"];
        $sql = mysqli_query($connect,"INSERT INTO `doc` (name,cost,amount) VALUES ('$item_name', '$item_cost', '$item_amount')");
    echo '<script>alert("confirmed");</script>';
    unset($_SESSION['shopping_cart'][$keys]);
    echo "<script>location.replace(location.href);</script>";
        }
    }
   }



?>


	
	<body>
		
<div class="container">

	<h2 >Payment</h2><br />
			<br /><br />
			<?php
				$query = "SELECT * FROM product ORDER BY type ASC";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>

<div class="col-md-4" style="background:#000000; float: left;  width: 32%; ">	
	<form  method="post" action="payment.php?action=add&id=<?php echo $row["id"]; ?>">
		<div style="border:1px solid #333; border-radius:1px; padding:13px;" align="left">

			<class="text-info"><font size="4"><?php echo $row["name"]; ?></font>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp/&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

			<class="text-danger"><font size="4">S$ <?php echo $row["cost"]; ?></font>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp/&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			
			<class="text"><font size="4"><?php echo $row["type"]; ?></font>
			
			<br/><br/><font size="4">Amount :</font>

			<input type="text" name="amount" value="1" class="form-control" />&nbsp&nbsp

			<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />

			<input type="hidden" name="hidden_cost" value="<?php echo $row["cost"]; ?>" />

			&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />

		</div>
	</form>
</div>
	<?php
		}
	}
?>

                        <div style="clear:both"></div>
                        <br /><br /><hr color="white" width="1450px" size="0.1px"><br />
                        <h2>Order Detail</h2><br /><br />
                        <div class="table-responsive">
                            <table  class="table table-bordered">
                                <tr align="left">
									<th width="5%">Date</th>
                                    <th width="10%">Item Name</th>
                                    <th width="5%">Amount</th>
                                    <th width="5%">Cost</th>
                                    <th width="5%">Total</th>
                                    <th width="5%">Action</th>
									<th width="35%"></th>
                                </tr>
                                <?php if(!empty($_SESSION["shopping_cart"]))
                                {
                                    $total = 0;
                                    foreach($_SESSION["shopping_cart"] as $keys => $values)
                                    {
                                  ?>
                                <tr>
									<td><?php echo date("Y/m/d");?></td>
                                    <td><?php echo $values["item_name"]; ?></td>
                                    <td><?php echo $values["item_amount"]; ?></td>
                                    <td>$ <?php echo $values["item_cost"]; ?></td>
                                    <td><?php echo number_format($values["item_amount"] * $values["item_cost"], 2); ?></td>
                                    <td><a href="payment.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger"><b>Remove</b></span></a></td>  
                                </tr>
                                <?php
                                $total = $total + ($values["item_amount"] * $values["item_cost"]);
                                    }
                                    ?>
                                <tr>
						<td align="left" colspan="3" align="right"><b>Total : S$ <?php echo number_format($total, 2); ?></b></td>
						
						<td><br/><br/><br/><br/></td>
					</tr>
                                        
                                        
                                <?php
                                }
                                ?>
                                
                               
                            </table>
                            <br/>
                            <input  type="button" onclick="location.href='payment.php?action=confirm'" name="confirm" style="margin-top:5px;" class="btn btn-success pull-right" value="Confirm"  />
                        </div>
                        </div>
	</div>
	<br />
<?php include'footer.php'; ?>