
<?php
require_once('database.php');

// Check if the form has been submitted
$myemail = 'D00243449@student.dkit.ie';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get user input
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $payment = $_POST['payment'];

  $headers = 'From: '.$myemail."\r\n".
    'Reply-To: '.$myemail."\r\n" .
    'X-Mailer: PHP/' . phpversion();

  // Build email message
  $to = $myemail;
  $subject = 'Order Confirmation';
  $message = "Thank you for your order, $name!\n\n";
  $message .= "Your order has been shipped to:\n";
  $message .= "$name\n$address\n";
  $message .= "Payment method: $payment";

  // Send email
  if (mail($to, $subject, $message, $headers)) {
    // Email sent successfully, redirect to success page
    header('Location: success.php');
    exit;
  } else {
    // Email failed to send, display error message
    $errorMessage = 'There was an error sending the email.';
  }
}
?>

<?php
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