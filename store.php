<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Store</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>

<body>
    <div class="products">
        <div class="container">
            <div class="products-grids">
                <div class="col-md-8 products-grid-left">
                    <div class="products-grid-lft">
                        <u>
                            <h1 style="text-align: center; font-family: Times; font-size: 4em">Pizza </h1>
                        </u><br><br>
                        <?php
                        
                        require('mysqli_connect.php');
						
						$q =  "SELECT * FROM inventory";
                        $r  = mysqli_query($dbc, $q);
                        
						$id = 'pizza_id';
						$name = 'pizza_name';
						$desc = 'pizza_description';
						$price = 'price';
						$quantity = 'quantity';
						$image = 'image';

						$form = "";
						
						if(mysqli_num_rows($r) > 0) {

						while($row = mysqli_fetch_array($r)) {
								$id = $row['pizza_id'];
								$name = $row['pizza_name'];
								$desc = $row['pizza_description'];
								$quantity = $row['quantity'];
								$price = $row['price'];
								$image = $row['image'];

				        $form .= "<div class='products'>
								<div class='pname' style='text-align:center;'>
				                <u><h4><strong>$name</strong></h4></u><br>
								</div>
								<div class='ppic' style='text-align:center;'>
								<img src=$image class='Img' style='height:80%; width:50%'>
								</div><br>
								<div class='pdesc' style='text-align:center;'>
				                <p>$desc</p>
								</div><br>
                                                
                                <div class='pprice' style='text-align:center;'>
				                <p>Price: $price</p><br>
								</div>
												
                                <div class='pquantity' style='text-align:center;'>
				                <p>Remaining Stock: $quantity</p>
								</div><br>
												
				<div class='buyform' style='text-align:center;'>
				<a href='checkout.php?pid=$id'>
				<input type='submit' name='submit' value='Buy'>
				</a>
				</div><br>
				</div>
				<hr>";
       }
				echo $form;
       }
						?>
                        <div class='posts_area'></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>