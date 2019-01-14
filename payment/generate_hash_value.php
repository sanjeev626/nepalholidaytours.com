<?php
//Merchant Account Information
  $secretKey = "value";   //Get SecretKey from 2C2P Merchant Interface

  $stringToHash = $_POST['version'] . $_POST['merchant_id'] . $_POST['payment_description'] . $_POST['order_id'] . $_POST['invoice_no'] . $_POST['currency'] . $_POST['amount'] . $_POST['customer_email'] . $_POST['pay_category_id'] . $_POST['promotion'] . $_POST['user_defined_1'] . $_POST['user_defined_2'] . $_POST['user_defined_3'] . $_POST['user_defined_4'] . $_POST['user_defined_5'] . $_POST['result_url_1'] . $_POST['result_url_2'] . $_POST['request_3ds'] ;
  $hash = strtoupper(hash_hmac('sha1', $stringToHash ,$secretKey, false));   //Calculate Hash Value
  ?>