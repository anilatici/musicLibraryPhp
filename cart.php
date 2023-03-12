<?php include 'includes/header.php';?>

<?php
require_once('database.php');

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get user input
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $payment = $_POST['payment'];

  // Build email message
  $to = $email;
  $subject = 'Order Confirmation';
  $message = "Thank you for your order, $name!\n\n";
  $message .= "Your order has been shipped to:\n";
  $message .= "$name\n$address\n";
  $message .= "Payment method: $payment";

  // Send email
  if (mail($to, $subject, $message)) {
    // Email sent successfully, redirect to success page
    header('Location: success.php');
    exit;
  } else {
    // Email failed to send, display error message
    $errorMessage = 'There was an error sending the email.';
  }
}

// Get products
$queryProducts = 'SELECT * FROM products';
$statement = $db->prepare($queryProducts);
$statement->execute();
$products = $statement->fetchAll();
$statement->closeCursor();
?>

<?php
$nameErr = $phoneErr = $emailErr = $addressErr = $paymentErr = "";
$name = $phone = $email = $address = $payment = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["phone"])) {
    $phoneErr = "";
  } else {
    $phone = test_input($_POST["phone"]);
    // check if phone number is valid
    if (!preg_match("/^[0-9]{10}$/",$phone)) {
      $phoneErr = "Invalid phone number format";
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "";
  } else {
    $email = test_input($_POST["email"]);
    // check if email address is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["address"])) {
    $addressErr = "";
  } else {
    $address = test_input($_POST["address"]);
  }

  if (empty($_POST["payment"])) {
    $paymentErr = "";
  } else {
    $payment = test_input($_POST["payment"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<div class="upload-form">
<h2 style="text-align: center;margin-top:20px;">Details</h2>
<p style="text-align:center;">Please enter your details to complete your purchase.</p>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"style="margin-top: 20px;margin-bottom:20px;">
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