<?php
session_start();
?>
<h1 class="display-4">Please wait we are transferring you in paypal....</h1>
<?php
$paypal_url = 'https://www.sandbox.paypal.com/';
$pay=$_SESSION["pay"];
?>
<form action="<?php echo $paypal_url;?>/cgi-bin/webscr" method="post" name="buyCredits" id="buyCredits">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="business" value="mohitchandani@gmail.com">
    <input type="hidden" name="currency_code" value="INR">
    <input type="hidden" name="item_name" value="payment for testing">
    <input type="hidden" name="item_number" value="1212">
    <input type="hidden" name="amount" value="<?php echo $pay; ?>">
    <input type="hidden" name="return" value="http://localhost/bookrecommendationsystem/payment_success.php">
</form>
<script type="text/javascript">
    document.getElementById("buyCredits").submit();
</script>