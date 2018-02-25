<html>
<head>
<title> Proceeding to Payment Page</title>
</head>
<body>
<center>

<?php require_once('Crypto.php'); ?>

<?php 
 
	error_reporting(0);
	//print_r($_POST);
	$merchant_data='';
	$working_key='E90DEFBC38BE1D13F737925FDADD197D';//Shared by CCAVENUES
	$access_code='AVXH64DC50BN86HXNB';//Shared by CCAVENUES
	foreach ($_POST as $key => $value){
		$merchant_data.=$key.'='.$value.'&';
	}
//echo 'enc';
	$encrypted_data=encrypt($merchant_data,$working_key); // Method for encrypting the data.
//echo '||||ecnccc';print_r($encrypted_data);
//exit;
?>
<form method="post" name="redirect" action="https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction"> 
<?php
echo "<input type=hidden name=encRequest value=$encrypted_data>";
echo "<input type=hidden name=access_code value=$access_code>";
?>
</form>
</center>

<script type='text/javascript'>document.redirect.submit();</script>
</body>
</html>

