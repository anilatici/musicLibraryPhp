<?php include 'includes/header.php';?>
<?php
try {
    $conn = new PDO("mysql:host=localhost;dbname=DOO243449", 'D00243449', '8LmLXzH6');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage() . "<br>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input fields
    $product_title = $_POST['productTitle'];
    $product_artist = $_POST['productArtist'];
    $product_category = $_POST['productCategory'];
    $product_description = $_POST['productDescription'];
    $release_year = $_POST['releaseYear'];
    $list_price = $_POST['listPrice'];
    $product_img = $_POST['productImg'];

    try {
        // prepare SQL statement and bind parameters
        $stmt = $conn->prepare("INSERT INTO products (productTitle, productArtist, productCategory, productDescription, releaseDate, listPrice, product_img) VALUES (:product_title, :product_artist, :product_category, :product_description, :release_year, :list_price, :product_img)");
        $stmt->bindParam(':product_title', $product_title);
        $stmt->bindParam(':product_artist', $product_artist);
        $stmt->bindParam(':product_category', $product_category);
        $stmt->bindParam(':product_description', $product_description);
        $stmt->bindParam(':release_year', $release_year);
        $stmt->bindParam(':list_price', $list_price);
        $stmt->bindParam(':product_img', $product_img);

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

<h2 style="text-align: center;margin-top:20px;">Upload Your Vinyls</h2>
<p style="text-align:center;">You can enter the details of your own album here to display them on the main page.</p>
<div class="upload-form">
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"style="margin-top: 20px;margin-bottom:20px;">
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

    <label for="productImg">Image URL:(500x500)</label>
    <input type="text" name="productImg" required>

    <input type="submit" value="Submit">
</form>

<?php include 'includes/footer.php';?>
