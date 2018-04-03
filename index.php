<!DOCTYPE html>
<html lang="en">

<form action ="" method="post">
<label for='title'>Time</label>
<select name="hours" id="">
	<option>1</option>
	<option>2</option>
	<option>3</option>
	<option>4</option>
	<option>5</option>
	<option>6</option>
	<option>7</option>
	<option>8</option>
	<option>9</option>
	<option>10</option>
	<option>11</option>
	<option>12</option>
</select>
:
<select name="minutes" id="">
	<option>00</option>
	<option>15</option>
	<option>30</option>
	<option>45</option>
</select>

<select name="am_pm" id="">
	<option>AM</option>
	<option>PM</option>
</select>
<br>
<br>
<label for='title'>Task</label>
<br>
<textarea name='task' cols="40" rows="5">
</textarea>
<div class = "form-group" method="post">
<input class = "button" type="submit" name = "add_task">
</div>
</form>
<br>
<br>
<!-- <h3><small> <a href="veiwtask.php">veiw tasks</a></small></h3>
<h3><small> <a href="addtasks.php">add tasks</a></small></h3> -->
</html>

<?php
$dbname = "TODOAPP";
$host = "localhost";
$username= "root";
$password= "password";
$connection = mysqli_connect($host,$username,$password,$dbname);
	if (!$connection)
		{
		echo "failed to connect";
		}

if (isset($_POST['add_task']))
{
	$hours = $_POST['hours'];
	$minutes = $_POST['minutes'];
	$am_pm = $_POST['am_pm'];
	$time = $hours.':'.$minutes." ".$am_pm;
	$task = $_POST['task'];
	$query = "INSERT INTO `todolist` (`time`, `task`, `date`) VALUES ('$time', '$task', CURRENT_TIMESTAMP)";
	$insert_post = mysqli_query($connection,$query);

if (!$insert_post)
	{
		die ("Query failed " . mysqli_error($connection));
	}
else{
	header("Location: todolist.php");
	}
}
 ?>


 <?php 
$displayquery = "SELECT * FROM todolist";
$display = mysqli_query($connection,$displayquery);
if (!$display)
	{
		die ("Query failed " . mysqli_error($connection));
	}

while ($row = mysqli_fetch_assoc($display))
{
$time = $row['time'];
$task = $row['task'];
?>

<br>


<?php
echo $time."___".$task;
?>
<br>
<?php
}
?>

