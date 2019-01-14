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

<form method="post" action="pay-now.php" style="font-family:Arial;">
  <table width="100%" colspan="0" rowspan="0">
	<tr>
		<th>paymentGatewayID :</th>
		<td><input type="text" id="paymentGatewayID" name="paymentGatewayID" value="9103331443"/> <!-- (Q: Does paymentGatewayID means Merchant ID) --></td>
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
		<td><input type="text" id="amount" name="amount" value="000000000100"/></td>
	</tr>
	<tr>
		<th>currencyCode :</th>
		<td>
			<input type="radio" name="currencyCode" value="840" checked> USD
  			<input type="radio" name="currencyCode" value="524"> Nrs
  			<!-- (Q: What would be the currencyCode  value? USD or 764 or anything else) --></td>
	</tr>
	<tr>
		<th>userDefined1 :</th>
		<td><input type="text" id="userDefined1" name="userDefined1" value="Trekking in Nepal"/></td>
	</tr>
	<tr>
		<th>responseUrl :</th>
		<td><input type="text" id="returnUrl" name="responseUrl" value="http://nepalholidaytours.com/hbl/thank-you.php"/></td>
	</tr>	

	<tr>
		<th></th>
		<td><input type="submit" name="btnSubmit" id="btnSubmit" value="Submit"/></td>
	</tr>
  </table>
</form>
</body>
</html>