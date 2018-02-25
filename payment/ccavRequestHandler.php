<html>
<head>
<title> Proceeding to Payment Page</title>
</head>
<body>
<center>

<?php include('Crypto.php')?>
<?php 

	error_reporting(0);
	
	$merchant_data='';
	$working_key='E90DEFBC38BE1D13F737925FDADD197D';//Shared by CCAVENUES
	echo $access_code='AVXH64DC50BN86HXNB';//Shared by CCAVENUES
	echo '<br />';
	foreach ($_POST as $key => $value){
		$merchant_data.=$key.'='.$value.'&';
	}

	echo $encrypted_data=encrypt($merchant_data,$working_key); // Method for encrypting the data.

?>
<form method="post" name="redirect" action="https://test.ccavenue.com/transaction/transaction.do?command=initiateTransaction"> 
<?php
echo "<input type=hidden name=encRequest value=$encrypted_data>";
echo "<input type=hidden name=access_code value=$access_code>";
?>
</form>
</center>
<!-- 
<script language='javascript'>document.redirect.submit();</script>
-->
</body>
</html>

