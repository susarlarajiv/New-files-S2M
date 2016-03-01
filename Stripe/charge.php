<?php 

//let's say each article costs 15.00 bucks

try {

	require_once('Stripe/lib/Stripe.php');
	Stripe::setApiKey("sk_test_oIXsYsbHbjn6CbUtrxTJm1Zi");

	$charge = Stripe_Charge::create(array(
  "amount" => 1500,
  "currency" => "usd",
  "card" => $_POST['stripeToken'],
  "description" => "Hi rajiv this is testing description"
));
	//send the file, this line will be reached if no error was thrown above
	echo "<h1>Your payment has been completed. This message after payment success.</h1>";


  //you can send the file to this email:
  echo $_POST['stripeEmail'];
}

catch(Stripe_CardError $e) {
	
}

//catch the errors in any way you like

 catch (Stripe_InvalidRequestError $e) {
  // Invalid parameters were supplied to Stripe's API

} catch (Stripe_AuthenticationError $e) {
  // Authentication with Stripe's API failed
  // (maybe you changed API keys recently)

} catch (Stripe_ApiConnectionError $e) {
  // Network communication with Stripe failed
} catch (Stripe_Error $e) {

  // Display a very generic error to the user, and maybe send
  // yourself an email
} catch (Exception $e) {

  // Something else happened, completely unrelated to Stripe
}
?>