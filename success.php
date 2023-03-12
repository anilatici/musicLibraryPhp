<!DOCTYPE html>
<html>
<head>
	<title>Thank You!</title>
	<style>
		body {
			background-color: #f5f5f5;
			font-family: Arial, sans-serif;
			font-size: 16px;
			line-height: 1.5;
			color: #212529;
			margin: 0;
			padding: 0;
		}
		.container {
			max-width: 800px;
			margin: 200px auto;
			padding: 40px 20px;
			box-sizing: border-box;
			background-color: #fff;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
			text-align: center;
		}
        .success-message {
            text-align: center;
            background-color: #333;
            color: #fff;
            padding: 20px;
            border-radius: 5px;
        }
		h1 {
			font-size: 36px;
			margin-bottom: 20px;
			color: #3e4145;
		}
		p {
			font-size: 18px;
			margin-bottom: 30px;
		}
		button {
			background-color: #3e4145;
			color: #fff;
			border: none;
			padding: 10px 20px;
			border-radius: 4px;
			font-size: 18px;
			cursor: pointer;
		}
		button:hover {
			background-color: #0069d9;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Thank You!</h1>
		<p>Your order has been received and will be processed shortly.</p>
		<button onclick="window.location.href='index.php'">Continue Shopping</button>
	</div>
</body>
</html>
