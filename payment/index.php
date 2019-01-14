<!--Construct form to submit authorization request to 2c2p PGW-->
<!--Payment request data should be sent to 2c2p PGW with POST method inside parameter named 'paymentRequest'-->
<form action='payment.php' method='POST' name='authForm' style="font-family: sans-serif;">
  <table>
    <tr>
      <td style="color:green">Version : </td>
      <td><input type='text' id='version' name='version' value='' placeholder="6.9"/>(Mandatory)</td>
    </tr>
    <tr>
      <td style="color:green">Secret Key : </td>
      <td><input type='text' id='secret_key' name='secret_key' value=''/>(Mandatory)</td>
    </tr>
    <tr>
      <td style="color:green">Merchant_id : </td>
      <td><input type='text' id='merchant_id' name='merchant_id' value=''/>(Mandatory)</td>
    </tr>
    <tr>
      <td>Payment_description : </td>
      <td><input type='text' id='payment_description' name='payment_description' value='' />(Mandatory)</td>
    </tr>
    <tr>
        <td>order_id : </td>
        <td><input type='text' id='order_id' name='order_id' value='' />(Mandatory)</td>
    </tr>
    <tr>
      <td>invoice_no : </td>
      <td><input type='text' id='invoice_no' name='invoice_no' value=''/>(Mandatory)</td>
    </tr>
    <tr>
      <td style="color:green">currency : </td>
      <td><input type='text' id='currency' name='currency' value=''/>(Conditional)</td>
    </tr>
    <tr>
      <td>amount : </td>
      <td><input type='text' id='amount' name='amount' value=''/>(Mandatory)</td>
    </tr>
    <tr>
      <td>customer_email : </td>
      <td><input type='text' id='customer_email' name='customer_email' value=''/>(Optional)</td>
    </tr>
    <tr>
      <td style="color:green">pay_category_id : </td>
      <td><input type='text' id='pay_category_id' name='pay_category_id' value=''/>(Optional)</td>
    </tr>
    <tr>
      <td>promotion : </td>
      <td><input type='text' id='promotion' name='promotion' value=''/>(Optional)</td>
    </tr>
    <tr>
      <td style="color:green">user_defined_1 : </td>
      <td><input type='text' id='user_defined_1' name=' user_defined_1' value=''/>(Optional)</td>
    </tr>
    <tr>
      <td>user_defined_2 : </td>
      <td><input type='text' id='user_defined_2' name=' user_defined_2' value=''/>(Optional)</td>
    </tr>
    <tr>
      <td>user_defined_3 : </td>
      <td><input type='text' id='user_defined_3' name=' user_defined_3' value=''/>(Optional)</td>
    </tr>
    <tr>
      <td>user_defined_4 : </td>
      <td><input type='text' id='user_defined_4' name=' user_defined_4' value=''/>(Optional)</td>
    </tr>
    <tr>
      <td>user_defined_5 : </td>
      <td><input type='text' id='user_defined_5' name=' user_defined_5' value=''/>(Optional)</td>
    </tr>
    <tr>
      <td style="color:green">result_url_1 : </td>
      <td><input type='text' id='result_url_1' name='result_url_1' value=''/>(Optional)</td>
    </tr>
    <tr>
      <td style="color:green">result_url_2 : </td>
      <td><input type='text' id='result_url_2' name='result_url_2' value=''/>(Optional)</td>
    </tr>
    <tr>
      <td style="color:green">request_3ds : </td>
      <td><input type='text' id='request_3ds' name='request_3ds' value='' placeholder="Y - Do 3DS (default) : F - Force 3ds (Only ECI 02 / 05 are accepted) : N - Do not do 3ds"/>(Optional)</td>
    </tr>
    <tr>
      <td></td>
      <td><input type="submit" name="btnPay" id="btnPay" value="Process for Payment" /></td>
    </tr>
  </table>
</form>