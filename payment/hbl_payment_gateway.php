<!DOCTYPE html>
<html>

<head>
  <title>HBL Payment Gateway - Sample</title>
  	<style>
	th{
		width: 200px;
		text-align: right;
	}
</style>
</head>

<body>
<?php
$hashValue = hash_hmac('SHA256', "signatureString",'7VXJI3BH3DYTA1RG5F3HFWRABSCVAG8E', false);
$hashValue = strtoupper($hashValue);
$hashValue = urlencode($hashValue);
?> 
<form method="post" action="https://hblpgw.2c2p.com/HBLPGW/Payment" style="font-family:Arial;">
  <table width="100%" colspan="0" rowspan="0">
	<tr>
		<th>paymentGatewayID :</th>
		<td><input type="text" id="paymentGatewayID" name="paymentGatewayID" value="9103331443"/> (Q: Does paymentGatewayID means Merchant ID)</td>
	</tr>
	<tr>
		<th>invoiceNo :</th>
		<td><input type="text" id="invoiceNo" name="invoiceNo" value="12345"/></td>
	</tr>
	<tr>
		<th>productDesc :</th>
		<td><input type="text" id="productDesc" name="productDesc" value="Poon Hill Trek"/></td>
	</tr>
	<tr>
		<th>amount :</th>
		<td><input type="text" id="amount" name="amount" value="1"/></td>
	</tr>
	<tr>
		<th>currencyCode :</th>
		<td><input type="text" id="currencyCode" name="currencyCode" value="USD"/> (Q: What would be the currencyCode  value? USD or 764 or anything else)</td>
	</tr>
	<tr>
		<th>userDefined1 :</th>
		<td><input type="text" id="userDefined1" name="userDefined1" value="Trekking in Nepal"/></td>
	</tr>
	<tr>
		<th>nonSecure :</th>
		<td><input type="text" id="nonSecure" name="nonSecure" value="Y"/></td>
	</tr>
	<tr>
		<th valign="top">hashValue :</th>
		<td><input type="text" id="hashValue" name="hashValue"
value="<?php echo $hashValue;?>" style="width:50%;"/><br>I generated hasValue as :<br>$hashValue = hash_hmac('SHA256', "signatureString",'7VXJI3BH3DYTA1RG5F3HFWRABSCVAG8E', false);</br>Is this correct ?</td>
	</tr>
	<tr>
		<th></th>
		<td><input type="submit" name="btnSubmit" id="btnSubmit" value="Submit"/></td>
	</tr>
  </table>
</form>
</body>
</html>