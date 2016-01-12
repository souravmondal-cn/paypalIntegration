<?php require_once './paypalConfig.php'; ?>
<form action='<?php echo $config['sandBoxUrl']; ?>' method='post' name='frmPayPal' id='frmPayPal'>
    <input type='text' name='invoice' id='invoice' value='<?php echo 'souravtest-' . rand(111, 99999999); ?>' /><br/>
    <input type='text' name='cmd' value='_xclick' /><br/>
    <input type='text' name='amount' id='amount' value='10.00'/><br/>
    <input type='text' name='custom' id='custom' value='some custom message' /><br/>
    <input type='text' name='business' id='business' value='<?php echo $config['businessID']; ?>' /><br/>
    <input type='text' name='item_name' id='item_name' value='Product Name Here' /><br/>
    <input type='text' name='currency_code' id='currency_code' value='<?php echo $config['currencyCode']; ?>' /><br/>
    <input type='text' name='notify_url' value='<?php echo $config['notifyUrl']; ?>' /><br/>
    <input type='text' name='cancel_return' value='<?php echo $config['cancelReturn']; ?>' /><br/>
    <input type='text' name='return' value='<?php echo $config['successUrl']; ?>' /><br/>
    <input type='text' name='no_shipping' id='no_shipping' value='1' /><br/>
    <input type='submit' name='go' id='go' value='submit' /><br/>
</form>
