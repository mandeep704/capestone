<?php 

    require('mysqli_connect.php');
	$error = array();

	if(isset($_GET['pid'])) {
       
		$pid = '';
        $pizza_name = '';
        $pizza_price = '';
        $pizza_img = '';		
		$pid = $_GET['pid'];
	
        $q = "SELECT * FROM inventory WHERE pizza_id = $pid";
		$r = mysqli_query($dbc, $q);
        echo mysqli_error($dbc);
		$db_form_query_results = mysqli_fetch_array($r);

		$pizza_name = $db_form_query_results['pizza_name'];
		$pizza_price = $db_form_query_results['price'];
		$pizza_img = $db_form_query_results['image']; 
	}

echo mysqli_error($dbc);
    if(isset($_POST['submit']))
    {
    	$firstname = $_POST['firstname'];
    	$lastname = $_POST['lastname'];
    	$address = $_POST['address'];
    	$payment = $_POST['payment'];          
        
        if(empty($firstname) || strlen($firstname) == 0) {
 			array_push($error, "Go back to store page to make selection again and then fill the following things in the form.Please enter your firstname<br><br>");
    	} else {
        	$firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
   		}
		if(empty($lastname) || strlen($lastname) == 0) {
 			array_push($error, "Go back to store page to make selection again and then fill the following things in the form.Please enter your lastname<br><br>");
    	} else {
        	$lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
   		}
		if(empty($address) || strlen($address) == 0) {
 			array_push($error, "Go back to store page to make selection again and then fill the following things in the form.Please enter your address<br><br>"); 
   		} else {
       		$address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
    	}
		if(empty($payment) || strlen($payment) == 0) {
			array_push($error, "Please choose a payment method <br><br>");
		} else {
			$payment = filter_var($_POST['payment'], FILTER_SANITIZE_STRING);
		}
		$watchID = $_POST['id'];
       
	 	
        
        if(empty($error))
	 	{
	 		$q = "INSERT INTO users VALUES ('','$firstname','$lastname','$address','$payment')";
	 		$insert_query = mysqli_query($dbc,$q);
            echo mysqli_error($dbc);

	 		$query = mysqli_query($dbc, "SELECT * FROM inventory WHERE pizza_id = $pizzaID");
	 		$details = mysqli_fetch_array($query);
	 		$quantity = $details['quantity'];

	 		$newQuantity = $quantity - 1;

	 		$update = mysqli_query($dbc,"UPDATE inventory SET quantity = '$newQuantity' WHERE pizza_id='$pizzaID'");

	 		header("Location: success.php");
	 	}
        else{
	 		foreach ($error as $key => $value) {
	 			echo $value;
	 		}
	 		
	 	}
	}

 ?>

<!DOCTYPE html>
<html>

<head>
    <title>Checkout</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>

<body>

    <div class=" text-center"><br><br>
        <div class='img_disp' style=" height: 20%; width: 100%; ">
            <img src="<?php echo $pizza_img; ?>" style=" height: 20%; width: 20%;">
        </div><br><br>


        <label class="control-label col-sm-4">Pizza Name:</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" value="<?php echo $pizza_name; ?>" disabled="disabled">
        </div>
        <br><br><br>
        <div>
            <label class="control-label col-sm-4">Pizza Price:</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" value="<?php echo $pizza_price; ?>" disabled="disabled">
            </div>
        </div>
    </div>
    <br>
    <div class='confirmation col-sm-12'>
        <br>

        <div class='form'>
            <form class="form-horizontal" action='checkout.php' method='post'>



                <div class="form-group">
                    <label class="control-label col-sm-2">First Name:</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" value="<?php if(isset($_POST['firstname'])) echo $_POST['firstname']?>" name="firstname">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">Last Name:</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" value="" name="lastname">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">Address:</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" value="" name="address">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">Payment:</label>
                    <div class="col-sm-6">
                        <select name="payment" style="color: black">
                            <option value="Credit card">Credit Card</option>
                            <option value="Debit Card">Debit Card</option>
                        </select>
                    </div>
                </div>

                <input type="hidden" name="id" value="<?php echo $wid; ?>">
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-6">
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
