<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Payments using Stripe</title>
	
</head>
<body>
	

<h1>This is for Testing PATSMITH </h1>
<p>Price: 15.00$</p>
<p>Name: Click pay with card PATSMITH</p>


<form action="charge.php" method="POST">
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_EuMwx0ZCN3XgfnS0iiaE1nfr"
    data-image="http://www.phpgang.com/wp-content/themes/PHPGang_v2/img/logo.png"
    data-name="PATSMITH Test"
    data-description="This is for test (100)"
    data-amount="100">
  </script>

</form>



</body>
</html>


