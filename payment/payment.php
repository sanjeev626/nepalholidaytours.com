<?php
//Merchant Account Information
$secretKey = "value";   //Get SecretKey from 2C2P Merchant Interface

$stringToHash = $_POST['version'] . $_POST['merchant_id'] . $_POST['payment_description'] . $_POST['order_id'] . $_POST['invoice_no'] . $_POST['currency'] . $_POST['amount'] . $_POST['customer_email'] . $_POST['pay_category_id'] . $_POST['promotion'] . $_POST['user_defined_1'] . $_POST['user_defined_2'] . $_POST['user_defined_3'] . $_POST['user_defined_4'] . $_POST['user_defined_5'] . $_POST['result_url_1'] . $_POST['result_url_2'] . $_POST['request_3ds'] ;
$hash = strtoupper(hash_hmac('sha1', $stringToHash ,$secretKey, false));   //Calculate Hash Value
?>

<!--Construct form to submit authorization request to 2c2p PGW-->
<!--Payment request data should be sent to 2c2p PGW with POST method inside parameter named 'paymentRequest'-->
<form action='https://demo2.2c2p.com/2C2PFrontEnd/RedirectV3/payment' method='POST' name='authForm'>
	<!--display wait message to user when page is loading-->
	Please wait for a while. Do not close the browser or refresh the page.<br/>
	<!--load request data-->

	<table>
		<tr>
			<td>Version : </td>
			<td><input type='text' id='version' name='version' value="<?php echo $_POST['version'];?>"/></td>
		</tr>
		<tr>
			<td>Merchant_id : </td>
			<td><input type='text' id='merchant_id' name='merchant_id' value="<?php echo $_POST['merchant_id'];?>"/></td>
		</tr>
		<tr>
			<td>Payment_description : </td>
			<td><input type='text' id='payment_description' name='payment_description' value="<?php echo $_POST['payment_description'];?>" /></td>
		</tr>
		<tr>
			<td>order_id : </td>
			<td><input type='text' id='order_id' name='order_id' value="<?php echo $_POST['order_id'];?>" /></td>
		</tr>
		<tr>
			<td>invoice_no : </td>
			<td><input type='text' id='invoice_no' name='invoice_no' value="<?php echo $_POST['invoice_no'];?>" /></td>
		</tr>
		<tr>
			<td>currency : </td>
			<td><input type='text' id='currency' name='currency' value="<?php echo $_POST['currency'];?>"/></td>
		</tr>
		<tr>
			<td>amount : </td>
			<td><input type='text' id='amount' name='amount' value="<?php echo $_POST['version'];?>"/></td>
		</tr>
		<tr>
			<td>customer_email : </td>
			<td><input type='text' id='customer_email' name='customer_email' value="<?php echo $_POST['customer_email'];?>"/></td>
		</tr>
		<tr>
			<td>pay_category_id : </td>
			<td><input type='text' id='pay_category_id' name='pay_category_id' value="<?php echo $_POST['pay_category_id'];?>"/></td>
		</tr>
		<tr>
			<td>promotion : </td>
			<td><input type='text' id='promotion' name='promotion' value="<?php echo $_POST['promotion'];?>"/></td>
		</tr>
		<tr>
			<td>user_defined_1 : </td>
			<td><input type='text' id='user_defined_1' name=' user_defined_1' value="<?php echo $_POST['user_defined_1'];?>"/></td>
		</tr>
		<tr>
			<td>user_defined_2 : </td>
			<td><input type='text' id='user_defined_2' name=' user_defined_2' value="<?php echo $_POST['user_defined_2'];?>"/></td>
		</tr>
		<tr>
			<td>user_defined_3 : </td>
			<td><input type='text' id='user_defined_3' name=' user_defined_3' value="<?php echo $_POST['user_defined_3'];?>"/></td>
		</tr>
		<tr>
			<td>user_defined_4 : </td>
			<td><input type='text' id='user_defined_4' name=' user_defined_4' value="<?php echo $_POST['user_defined_4'];?>"/></td>
		</tr>
		<tr>
			<td>user_defined_5 : </td>
			<td><input type='text' id='user_defined_5' name=' user_defined_5' value="<?php echo $_POST['user_defined_5'];?>"/></td>
		</tr>
		<tr>
			<td>result_url_1 : </td>
			<td><input type='text' id='result_url_1' name='result_url_1' value="<?php echo $_POST['result_url_1'];?>"/></td>
		</tr>
		<tr>
			<td>result_url_2 : </td><td><input type='text' id='result_url_2' name='result_url_2' value="<?php echo $_POST['result_url_2'];?>"/></td>
		</tr>
		<tr>
			<td>request_3ds : </td>
			<td><input type='text' id='request_3ds' name='request_3ds' value="<?php echo $_POST['request_3ds'];?>"/></td>
		</tr>
		<tr>
			<td>hash_value : </td>
			<td><input type='text' id='hash_value' name='hash_value' value="<?php echo $hash;?>"/></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="btnPay" id="btnPay" value="Pay Now" /></td>
		</tr>
	</table>
</form>