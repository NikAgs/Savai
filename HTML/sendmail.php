<?php
// Email Submit
// Note: filter_var() requires PHP >= 5.2.0
if ( isset($_POST['phone']) && isset($_POST['business']) && isset($_POST['email']) && isset($_POST['name']) && isset($_POST['message']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ) {

  // detect & prevent header injections
  $test = "/(content-type|bcc:|cc:|to:)/i";
  foreach ( $_POST as $key => $val ) {
    if ( preg_match( $test, $val ) ) {
      exit;
    }
  }

  mail( "sarina@savai.co", "New message!" , "Name: " . $_POST['name'] . "\nBusiness: " . $_POST['business'] . "\nPhone: " . $_POST['phone'] . "\n" . $_POST['message'], "From:" . $_POST['email'] );
}
?>