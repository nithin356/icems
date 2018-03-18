<?php
require('connect.php');
if (isset($_POST['eventsubmit']))
	{
		$event_name=mysqli_real_escape_string($connection,$_POST['e_eventname']);
		$festid=$_POST['festid'];
		$e_desc=mysqli_real_escape_string($connection,$_POST['e_desc']);
		$query="INSERT INTO `add_event` (`e_id`, `f_id`, `e_eventname`, `e_desc`) VALUES (NULL, '$festid', '$event_name', '$e_desc')";
		$result = mysqli_query($connection, $query);

	if($result)
				{
					$smsg = "Event Created Successfully.";
				}
				else
				{
					$fmsg = "Event Creation Failed".mysqli_error($connection);
				}
			}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<!-- TemplateBeginEditable name="doctitle" -->
<title>Untitled Document</title>
<!-- TemplateEndEditable -->
<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->
</head>

<body>
	<form method="post">
	<label>Fest name</label>
	<select required  name="festid">
                                    <?php
									 $selectfest="SELECT * FROM fests";
									 $resultfest = mysqli_query($connection, $selectfest);
									?>
									 
								   	 <option disabled hidden selected >Select Event</option>
									 <?php while($rowfest = mysqli_fetch_assoc($resultfest)) { ?>
   									 <option value="<?php echo $rowfest['f_id']; ?>"> <?php echo $rowfest["fname"].' '.$rowfest['f_id']; ?> </option>
								     <?php } ?>
									 </select>
	<input type="text" name="e_eventname" placeholder="event name">
	<input type="text" name="e_desc" placeholder="desc name">
	<button type="submit" name="eventsubmit">submit</button>
	
	</form>
</body>
</html>
