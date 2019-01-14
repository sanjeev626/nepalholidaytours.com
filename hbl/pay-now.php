<?php
if(isset($_POST['btnSubmit']))
{
	$merchantID = "9103331443"; 
	$invoiceNumber = $_POST['invoiceNo'];
	$amount = $_POST['amount'];
	$currencyCode = $_POST['currencyCode'];
	$nonSecure = 'Y';
	$signatureString = $merchantID . $invoiceNumber . $amount . $currencyCode . $nonSecure;
	$hashValue = hash_hmac('SHA256', $signatureString,'7VXJI3BH3DYTA1RG5F3HFWRABSCVAG8E', false);
	$hashValue = strtoupper($hashValue);
	$hashValue = urlencode($hashValue);
?>
<form method="post" action="https://hblpgw.2c2p.com/HBLPGW/Payment/Payment/Payment" style="font-family:Arial;">
<?php echo "signatureString: <br> ".$signatureString."<br><br>";?>
<input type="hidden" id="paymentGatewayID" name="paymentGatewayID" value="<?php echo $merchantID;?>"/>
<input type="hidden" id="invoiceNo" name="invoiceNo" value="<?php echo $invoiceNumber;?>"/>
<input type="hidden" id="productDesc" name="productDesc" value="<?php echo $_POST['productDesc'];?>"/>
<input type="hidden" id="amount" name="amount" value="<?php echo $_POST['amount'];?>"/>
<input type="hidden" name="currencyCode" value="<?php echo $currencyCode;?>">
<input type="hidden" id="userDefined1" name="userDefined1" value="<?php echo $_POST['userDefined1'];?>"/>
HashValue <br />
<input type="text" id="hashValue" name="hashValue"
value="<?php echo $hashValue;?>" style="width:50%;"/> <br />
<input type="submit" name="btnSubmit" id="btnSubmit" value="Pay Now"/>

</form>
<?php
}
?>