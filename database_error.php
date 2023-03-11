<?php include 'includes/header.php';?>


<!-- the body section -->
<body>

    <div class="container text-center mt-4">
        
        <h1 class="error">Database Error</h1>
        <p>There was an error connecting to the database.</p>
        <p>The database must be installed as described in the appendix.</p>
        <p>Error message: <?php echo $error_message; ?></p>
        <p>&nbsp;</p>
    </div>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Product Manager, Inc.</p>
    </footer>
</body>
</html>
<?php include 'includes/footer.php';?>
