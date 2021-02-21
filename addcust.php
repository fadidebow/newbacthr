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
			<h3 class="text-center"><i class="fa fa-list"></i> Add Custody </h3>
		</div>


		<div class="row">

			<div class="col-md-3"></div>

			<div class="col-md-6">
				<div class="panel panel-warning">
			<div class="panel-heading">
				<h1 class="text-center text-uppercase">Add Custody </h1>
			</div>

			<div class="panel-body">
		<form action="addcust.php" method="post">
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



<label >Element :</label>
		<input type="text" placeholder="enter Credit Reason"  class="form-control" name="r"><br>


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

$reason=isset($_POST['r'])?$_POST['r']:'';







if(isset($_POST['btn']))
{
	
	$res=mysqli_query($con,"insert into 
	custody(empname,element)
	values('$name','$reason')");
	if(isset($res))
	{
		echo'
		<script> alert("add  Successfully");</script>
		';
	}

	else{
	echo'
		<script> alert("add  failed.. Try Again");</script>
		';
}
}
ob_end_flush();
?>