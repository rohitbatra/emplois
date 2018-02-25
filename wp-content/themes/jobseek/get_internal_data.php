<?php 


//require('wp-config.php');
require_once("../../../wp-config.php");
$hostname = DB_HOST;
$username = DB_USER;
$password = DB_PASSWORD;

// Create connection
$conn = mysqli_connect($hostname, $username, $password, DB_NAME) or die("Unable to connect to mysqli");




$skey	=	$_GET['s_key'];
?>
<table width="100%">
  <tr>
  	<td><b>Sr no.</b></td>
    <td><b>Company Name</b></td>
    <td><b>Address</b></td>
    <td><b>Phone No</b></td>
    <td><b>Email</b></td>
    <td><b>Website</b></td>
    <td><b>Status</b></td>
    <td><b>Comments</b></td>
    <td><b>Action</b></td>
  </tr>
  <?php 
  

  if(!empty($_GET['s_key']))
	{
		$get_internal_data		=	"SELECT * FROM internal_data WHERE visible = '1' AND ( c_name LIKE '%$skey%' OR c_add LIKE '%$skey%' OR email_id LIKE '%$skey%' OR phone LIKE '%$skey%'  )  ";
	}
  else
  	{
		$get_internal_data		=	"SELECT * FROM internal_data WHERE visible = '1' ";
	}

	$result = mysqli_query($conn, $get_internal_data);
	if ($result->num_rows > 0) {
	$i=1;
	while($row = $result->fetch_assoc()) 
		{
			
			?>
                  <tr id="<?php echo 'tr-'.$row['c_id']; ?>">
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row['c_name'] ?></td>
                    <td><?php echo $row['c_add']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['email_id']; ?></td>
                    <td><?php echo $row['website']; ?></td>
                    <td><?php if($row['status'] == 0) { echo 'Inactive'; } else { echo 'Active'; } ?></td>
                    <td><?php echo $row['comments'];?></td>
                    <td><a href="javascript:edit_data('<?php echo $row['c_id']; ?>','<?php echo $row['c_name']; ?>','edit')">Edit</a> &nbsp;&nbsp;&nbsp; <a href="javascript:delete_data('<?php echo $row['c_id']; ?>', '<?php echo $row['c_name']; ?>','delete')">Delete</a></td>
                  </tr>
			<?php
			$i++;
		}
		
	}
  ?>

</table>
