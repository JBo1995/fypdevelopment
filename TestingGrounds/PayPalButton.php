<html>
<head></head>

<body><form action="https://www.paypal.com/cgi-bin/webscr" method="post">

  <!-- Identify your business so that you can collect the payments. -->
  <input type="hidden" name="business" value="herschelgomez@xyzzyu.com">

  <!-- Specify a Buy Now button. -->
  <input type="hidden" name="cmd" value="_xclick">

  <!-- Specify details about the item that buyers will purchase. -->
  <input type="hidden" name="item_name" value="Premium Umbrella">
  <input type="hidden" name="amount" value="50.00">
  <input type="hidden" name="currency_code" value="USD">

  <!-- Provide a drop-down menu option field. -->
  <input type="hidden" name="on0" value="Type">Type of umbrella <br />
  <select name="os0">
    <option value="Select Type">-- Select Type --</option>
    <option value="Standard">Standard</option>
    <option value="Collapsable">Collapsable</option>
  </select> <br />

  <!-- Display the payment button. -->
  <input type="image" name="submit" border="0"
    src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
    alt="Buy Now">

  <img alt="" border="0" width="1" height="1"
  src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

</form>
</body>
</html>
