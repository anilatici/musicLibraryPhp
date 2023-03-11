<?php
require_once('database.php');

// Get products
$queryProducts = 'SELECT * FROM products';
$statement = $db->prepare($queryProducts);
$statement->execute();
$products = $statement->fetchAll();
$statement->closeCursor();
?>

<?php include 'includes/header.php';?>
<main class="container">
  <div class="starter-template text-center">
    <h1>Welcome to Vinyl Gallery</h1>
    <p class="lead">Browse our selection of vinyl records below.</p>
  </div>
  <section>
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <?php foreach ($products as $product) : ?>
        <div class="col">
          <div class="card h-100">
            <img src="<?php echo $product['product_img']; ?>" class="card-img-top" alt="<?php echo $product['productTitle']; ?>">
            <div class="card-body">
              <h5 class="card-title"><?php echo $product['productTitle']; ?></h5>
              <p class="card-text"><?php echo $product['productArtist']; ?></p>
              <p class="card-text"><?php echo $product['productDescription']; ?></p>
              <h6 class="card-subtitle mb-2 text-muted"><?php echo $product['releaseDate']; ?></h6>
              <p class="card-text">$<?php echo $product['listPrice']; ?></p>
              <form action="add-to-cart.php" method="post">
                <input type="hidden" name="product_id" value="<?php echo $product['productId']; ?>">
                <button type="submit" class="btn btn-primary">Add to Cart</button>
              </form>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>
</main><!-- /.container -->

<?php include 'includes/footer.php';?>
