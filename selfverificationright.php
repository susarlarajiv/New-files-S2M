<?php 
include "includes/header.php";
require_once('stripe-php/init.php');

// Set your secret key: remember to change this to your live secret key in production
// See your keys here https://dashboard.stripe.com/account/apikeys
\Stripe\Stripe::setApiKey("sk_test_oIXsYsbHbjn6CbUtrxTJm1Zi");

// Get the credit card details submitted by the form
$token = $_POST['stripeToken'];

// Create the charge on Stripe's servers - this will charge the user's card
try {
  $charge = \Stripe\Charge::create(array(
    "amount" => 1000, // amount in cents, again
    "currency" => "usd",
    "source" => $token,
    "description" => "Example charge"
    ));
} catch(\Stripe\Error\Card $e) {
  // The card has been declined
}

if($_POST['makepayment']=="MAKE_PAYMENT"){
	$payment=$front_Obj->stripepaymet($_POST);
}

 /*?><div class="dashboardright">
 <div class="logowrap"><img src="images/safe2meetlogo_03.png" /></div>
 <div class="username"><img src="images/user_03.png" /> <span style="position:relative; top:-40px;">User Name</span></div>
 <div class="clear_fix"></div>
  <h1>Make A Payment – Self Verification</h1>
  <h6>I m paying for:</h6>
  <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

  <!-- jQuery is used only for this example; it isn't required to use Stripe -->
  <!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>-->

  <script type="text/javascript">
    // This identifies your website in the createToken call below
    Stripe.setPublishableKey('pk_test_nffUiaBp5F2TRZ9jkGWVZL9A');

    var stripeResponseHandler = function(status, response) {
      var $form = $('#payment-form');
///alert("mahe55643545323132ndra");
      if (response.error) {
        // Show the errors on the form
        $form.find('.payment-errors').text(response.error.message);
        $form.find('button').prop('disabled', false);
      } else {
        // token contains id, last4, and card type
        var token = response.id;
		alert(token);
        // Insert the token into the form so it gets submitted to the server
        $form.append($('<input type="hidden" name="stripeToken" />').val(token));
		
        // and re-submit
        $form.get(0).submit();
      }
    };

    jQuery(function($) {
      $('#payment-form').submit(function(e) {
        var $form = $(this);
//alert("mahendra");
        // Disable the submit button to prevent repeated clicks
        $form.find('button').prop('disabled', true);

        Stripe.card.createToken($form, stripeResponseHandler);

        // Prevent the form from submitting with the default action
        return false;
      });
    });
  </script>
   <form  method="POST" id="payment-form" name="strippay">
   
  <ul class="verificationtypes">
    <li><input type="radio" /> One-Time Self Verification - $14.99</li>
    <li><input type="radio" /> Recurring Monthly Subscription - $19.99</li>
    <div class="clear_fix"></div>
  </ul>  
  <div class="selfverification">
    <h4>Use Card on File:</h4>
    <ul class="cardtypes">
      
      <li>
       <div class="cardname"><input type="radio" /> Excel FCU</div>
       <div class="cardimg"><img src="images/logomastercard.png" /></div>
       <div class="cardexpiry">Master Card ending in ****1758 expires on (12/2016)</div>
       <div class="clear_fix"></div>
      </li>

      <li>
       <div class="cardname"><input type="radio" /> Sun Trust</div>
       <div class="cardimg"><img src="images/logomastercard.png" /></div>
       <div class="cardexpiry">Master Card ending in ****3921 expires on (12/2017)</div>
       <div class="clear_fix"></div>
      </li>

      <li>
       <div class="cardname"><input type="radio" /> Excel FCU</div>
       <div class="cardimg"><img src="images/logomastercard.png" /></div>
       <div class="cardexpiry">Master Card ending in ****1389 <span class="expiredcard">expired on (1/2015)</span></div>
       <div class="clear_fix"></div>
      </li>

      <div class="clear_fix"></div>
    </ul>
    
    <h4>Use A New Card:</h4>
    
    <h6>Credit Card Details</h6>
    <span class="payment-errors"></span>
    <div class="mandatoryfield">All fields are mandatory</div>
    <div class="clear_fix"></div>
    <div class="verificationform">
      <div class="fieldname">
        Street Address&nbsp;&nbsp;&nbsp;:
      </div><!--fieldname-->
      <div class="fieldtype">
         <input type="text"  name="street" />
      </div><!--fieldtype-->
      <div class="clear_fix"></div>

      <div class="fieldname">
        Zip/Postal Code&nbsp;&nbsp;&nbsp;:
      </div><!--fieldname-->
      <div class="fieldtype">
         <input type="text"  name="zip" />
      </div><!--fieldtype-->
      <div class="clear_fix"></div>

      <div class="fieldname">
        Country&nbsp;&nbsp;&nbsp;:
      </div><!--fieldname-->
      <div class="fieldtype">
       <div class="select-style">
        <select name="country">
        <option>Select</option>
        <option>India</option>
        <option>US</option>
        <option>AS</option>
        <option>IR</option>
        <option>SC</option>
        
        </select>
       </div>
      </div><!--fieldtype-->
      <div class="clear_fix"></div>


      <div class="fieldname">
        State&nbsp;&nbsp;&nbsp;:
      </div><!--fieldname-->
      <div class="fieldtype">
       <div class="select-style">
        <select name="state">
        <option>Select</option>
        <option>AP</option>
        <option>TG</option>
        <option>AS</option>
        <option>IR</option>
        <option>SC</option>
        </select>
       </div>
      </div><!--fieldtype-->
      <div class="clear_fix"></div>

      <div class="fieldname">
        Credit Card Type&nbsp;&nbsp;&nbsp;:
      </div><!--fieldname-->
      <div class="fieldtype">
       <div class="select-style">
        <select name="cardtypes">
         <option>Select</option>
        <option>VSA</option>
        <option>MAT</option>
        <option>SBI</option>
       
        </select>
       </div>
      </div><!--fieldtype-->
      <div class="clear_fix"></div>

      <div class="fieldname">
        Credit Card Number&nbsp;&nbsp;&nbsp;:
      </div><!--fieldname-->
      <div class="fieldtype">
       <div class="select-style">
        <input type="text" name="number" data-stripe="number"/>
       </div>
      </div><!--fieldtype-->
      <div class="clear_fix"></div>

      <div class="fieldname">
        Credit Verification Number&nbsp;&nbsp;&nbsp;:
      </div><!--fieldname-->
      <div class="fieldtype">
       <input type="text" name="cvc" data-stripe="cvc" />
       <div>We do not store your card details. See Our <a href="#">Privacy Policy</a></div>
      </div><!--fieldtype-->
      <div class="clear_fix"></div>

      <div class="fieldname">
        Card Expires On&nbsp;&nbsp;&nbsp;:
      </div><!--fieldname-->
      <div class="fieldtype">
        <div class="select-style" style="float:left; width:48%;">
        <input type="text" name="expmonth" data-stripe="exp-month" />
       </div>
        <div class="select-style" style="float:right; width:48%;">
        <input type="text" name="expyear" data-stripe="exp-year" />
       </div>
       <div class="clear_fix"></div>
      </div><!--fieldtype-->
      <div class="clear_fix"></div>

      <div class="fieldname">
        Agreement&nbsp;&nbsp;&nbsp;:
      </div><!--fieldname-->
      <div class="fieldtype paddingtop">
       <input type="checkbox" /> I agree to the <a href="#">Privacy Policy</a> & <a href="#">Terms of Service</a>
      </div><!--fieldtype-->
      <div class="clear_fix"></div>
    </div><!--verificationform-->
    <div class="makepaymentbtn">
    <button class="makepaymentbtn1" type="submit" name="makpayment" value="MAKE_PAYMENT">Make Payment</button>
     <!-- <input type="submit" value="Make Payment"  name="submit"/>-->
      <input type="submit" value="Cancel" />
      <input type="hidden" name="makepayment" value="MAKE_PAYMENT"/>
    </div>
    
  </div><!--selfverification-->
  </form>
</div>
<!--< ?php print_r($_POST); echo "working";?>--><?php */?>