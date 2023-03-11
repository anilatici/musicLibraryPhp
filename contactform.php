
<?php include 'includes/header.php';?>
<?php
try {
    $conn = new PDO("mysql:host=localhost;dbname=music_shop", 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage() . "<br>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $product_title = $_POST['productTitle'];
    $product_artist = $_POST['productArtist'];
    $product_category = $_POST['productCategory'];
    $product_description = $_POST['productDescription'];
    $release_year = $_POST['releaseYear'];
    $list_price = $_POST['listPrice'];

    try {
        // prepare SQL statement and bind parameters
        $stmt = $conn->prepare("INSERT INTO products (productTitle, productArtist, productCategory, productDescription, releaseDate, listPrice) VALUES (:product_title, :product_artist, :product_category, :product_description, :release_year, :list_price)");
        $stmt->bindParam(':product_title', $product_title);
        $stmt->bindParam(':product_artist', $product_artist);
        $stmt->bindParam(':product_category', $product_category);
        $stmt->bindParam(':product_description', $product_description);
        $stmt->bindParam(':release_year', $release_year);
        $stmt->bindParam(':list_price', $list_price);

        // execute SQL statement and check for errors
        if ($stmt->execute() === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $stmt->error;
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // close connection and statement
    $stmt = null;
    $conn = null;
}
?>

<div class="upload-form">
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"style="margin-top: 20px;">
    <label for="productTitle">Product Title:</label>
    <input type="text" name="productTitle" required>

    <label for="productArtist">Product Artist:</label>
    <input type="text" name="productArtist" required>

    <label for="productCategory">Product Category:</label>
    <input type="text" name="productCategory" required>

    <label for="productDescription">Product Description:</label>
    <textarea name="productDescription" required></textarea>

    <label for="releaseYear">Release Year:</label>
    <input type="number" name="releaseYear" min="1900" max="<?php echo date("Y"); ?>" required>

    <label for="listPrice">List Price:</label>
    <input type="number" step="0.01" min=0 name="listPrice" required>

    <input type="submit" value="Submit">
</form>
</div>
<?php include 'includes/footer.php';?>
