<?php include 'includes/header.php';?>

<div class="upload-form">
<h2 style="text-align: center;margin-top:20px;">Details</h2>
<p style="text-align:center;">Please enter your details to complete your purchase.</p>
<form method="POST" action="cart-handler.php"style="margin-top: 20px;margin-bottom:20px;">
    <label for="name">Name:</label>
    <input type="text" name="name" required>
    <span class="error"><?php echo $nameErr;?></span><br>

    <label for="phone">Phone Number (10 digits):</label>
    <input type="tel" name="phone" required>
    <span class="error"><?php echo $phoneErr;?></span><br>

    <label for="email">E-mail:</label>
    <input type="email" name="email" required>
    <span class="error"><?php echo $emailErr;?></span><br>

    <label for="address">Address:</label>
    <input type="text" name="address" required>
    <span class="error"><?php echo $addressErr;?></span><br>

    <label for="payment">Payment method:</label>
    <select name="payment" required>
    <option value="">Please select</option>
    <option value="credit_card">Credit card</option>
    <option value="paypal">PayPal</option>
    </select>
    <span class="error"><?php echo $paymentErr;?></span><br>

    <input type="submit" value="Submit">
</form>
</div>
<?php include 'includes/footer.php';?>