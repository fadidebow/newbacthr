<?php
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<title>Admin DashBoard</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" 
	href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
</head>
<body style="background-color: #dedede">
	<?php
include'adminnav.php';
	?> 

<div class="container">
	<div class="alert alert-warning">
			<h3 class="text-center"><i class="fa fa-book"></i> Manage Courses</h3>
		</div>

<div class="table-responsive">
		<table class="table" id="xx">
		<thead>
			<tr>
				<th>Name</th>
				<th>Course Name</th>
				
				<th>State</th>
				<th>Duration</th>
				
				
				

				<th>Delete</th>
				
			</tr>
		</thead>

		<tbody>
			<?php
			include'conn.php';
			$e=mysqli_query($con,"select * from courses");

			while($row=mysqli_fetch_array($e))
			{
				echo'
				<tr>
					
					
					<td>'.$row['name'].'</td>
					<td>'.$row['cname'].'</td>
				
					<td>'.$row['state'].'</td>
						<td>'.$row['duration'].'</td>
					
				
					
					


<td> <a href="mcourse.php?fadi='.$row['id'].'" class="btn btn-danger">Delete <i class="fa fa-trash"></i>   </a> </td>






				';
			}



		if(isset($_GET['fadi']))
		{
			$x=$_GET['fadi'];

			$t=mysqli_query($con,"delete from courses where id='$x'");
			if(isset($t)){
				header("Location: mcourse.php");
			}
		}

			?>
		</tbody>



		
	</table>

</div>


</div>









<script type="text/javascript" src="js/jQuery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
	$(document).ready( function () {
    $('#xx').DataTable();
} );
</script>
</body>
</html>
<?php
ob_end_flush();
?>