<?php
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin DashBoard</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" 
	href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">

</head>
<body style="background-color: #003b64">
	<?php
include'adminnav.php';
	?> 

<div class="container">
	<div class="alert alert-warning">
			<h3 class="text-center"><i class="fa fa-dollar"></i> Warnings  </h3>
		</div>


		<div class="row">

			<div class="col-md-3"></div>

			<div class="col-md-6">
				<div class="panel panel-warning">
			<div class="panel-heading">
				<h1 class="text-center text-uppercase">Warning Notification </h1>
			</div>

			<div class="panel-body">
		<form action="addwarning.php" method="post">
		<label >Employee Name :</label>
					<select name="n" class="form-control">
						<?php
						include'conn.php';
						$r=mysqli_query($con,"select * from emp");
						while($row=mysqli_fetch_array($r))
						{
							echo'
							<option value="'.$row['name'].'">'.$row['name'].'</option>

							';
						}


						?>
					</select><br>



<label >Warning Reason :</label>
		<input type="text" placeholder="enter Bonuse Reason"  class="form-control" name="r"><br>

<label >Warning Date :</label>
<input type="date"   class="form-control" name="dt"><br>



		<input type="submit" value="Save" class="btn btn-warning btn-lg" name="btn">
		
		</form>
			</div>

			<div class="panel-footer"></div>

		</div>
			</div>

			<div class="col-md-3"></div>
			




		</div>

</div>









<script type="text/javascript" src="js/jQuery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>

<?php

$name=isset($_POST['n'])?$_POST['n']:'';
$dt=isset($_POST['dt'])?$_POST['dt']:'';
$reason=isset($_POST['r'])?$_POST['r']:'';







if(isset($_POST['btn']))
{
	
	$res=mysqli_query($con,"insert into 
	warnings(name,dt,reason)
	values('$name','$dt','$reason')");
	if(isset($res))
	{
		echo'
		<script> alert("add Warning Successfully");</script>
		';
	}

	else{
	echo'
		<script> alert("add Warning failed.. Try Again");</script>
		';
}
}
ob_end_flush();
?>