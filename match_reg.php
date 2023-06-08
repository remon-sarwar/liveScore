

<?php
include('inc/header.php');
$msg = "";
	if(isset($_POST['submit'])){
		
		$match_id = $_POST['match_id'];
		$match_name = $_POST['match_name'];
		$match_type = $_POST['match_type'];
		$team_1 = $_POST['team_1'];
		$team_2 = $_POST['team_2'];
		$venue = $_POST['venue'];
		$date = $_POST['date'];
		$time = $_POST['time'];
		
		$sql= "INSERT INTO `team_info`( `match_id`, `match_name`, `match_type`, `team_1`, `team_2`, `venue`, `date`, `time`) VALUES ('".$match_id."','".$match_name."','".$match_type."','".$team_1."','".$team_2."','".$venue."','".$date."','".$time."')";
		$query = $conn->query($sql);	
		
		
		if($query){
			$msg = "Data Inserted Succesfully";
		}else {
			$msg = "Data Not Inserted";
		}
	
	}
	
	
	
	if(isset($_POST['update'])){
	
		$match_id = $_POST['match_id'];
		$match_name = $_POST['match_name'];
		$match_type = $_POST['match_type'];
		$team_1 = $_POST['team_1'];
		$team_2 = $_POST['team_2'];
		$venue = $_POST['venue'];
		$date = $_POST['date'];
		$time = $_POST['time'];
		
		$sql = "UPDATE `team_info` SET `match_id`='".$match_id."',`match_name`='".$match_name."',`match_type`='".$match_type."',`team_1`='".$team_1."',`team_2`='".$team_2."',`venue`='".$venue."' ,`date`='".$date."',`time`='".$time."WHERE match_id='".$match_id."'";
		$query = $conn->query($sql);
		
		
		if($query){
			$msg = "Data Updated Succesfully";
		}else {
			$msg = "Data Not Updated";
		}
	
	}
	
	if(isset($_GET['id'])){
	
		$roll_no = $_GET['id'];
		
		$sql = "select s.*, r.*, a.* from student_info s, results r, address a where s.roll_no=r.roll_no and s.roll_no=a.roll_num and s.roll_no='".$roll_no."' ";
	
		$query = $conn->query($sql);
		
		$row = $query->fetch_object();
	
	}

?>


		
		<div class="phpcoding">
		<section class="headeroption">
		<h2 style="text-align:center">Please Insert Team Information</h2>
		</section>
		<span><?php echo $msg;?></span>
		<?php if(isset($_GET['id'])){?>
		<a href="view.php">Go Back</a>
		<?php } ?>
		<section class="container">
		<form action="" method="post" enctype="multipart/form-data">
			<div class="form-row row">
			<div class="form-group col-md-6">
			<label for="">Match ID:</label>
			<input type="text" class="form-control" name="match_id" value="">
			</div>
			<div class="form-group col-md-6">
			<label for="">Match Name:</label>
			<input type="text" name="match_name" class="form-control" value="">
			</div>
			<div class="form-group col-md-6">
			<label for="">Match Category:</label>
			<input type="text" name="match_type" class="form-control" value="">
			</div>
			<div class="form-group col-md-6">
			<label for="">Team 1:</label>
			<input type="text" name="team_1" class="form-control" value="">
			</div>
			<div class="form-group col-md-6">
			<label for="">Team 2:</label>
			<input type="text" name="team_2" class="form-control" value="">
			</div>
			<div class="form-group col-md-6">
			<label for="">Match Venue:</label>
			<input type="text" name="venue" class="form-control" value="">
			</div>
			<div class="form-group col-md-6">
			<label for="">Date:</label>
			<input type="date" name="date" class="form-control" value="">
			</div>
			<div class="form-group col-md-6">
			<label for="">Time:</label>
			<input type="time" name="time" class="form-control" value="">
			</div>
			
			
		<div class="pt-2 pb-2" align="center">

			<button  type="submit" name="submit" class="btn btn-success">Submit</button>
			
			
			</div>
		</div>
		</form>
		</section>
<?php include('inc/footer.php');?>

