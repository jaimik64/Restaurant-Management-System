<html>
 	<head>
 	</head>
 	<body>
 		<form method="post" action="calculate_charge.php">
 		    <input type="text" name="user" placeholder="Name" required />
 		    <input type="email" name="email" placeholder="Email Id" required/>
 		    <input type="tel" name="mobile" maxlength="10" placeholder ="Mobile No" required/>
 		    <textarea name="address" placeholder="Address" required></textarea>
 		    <select name="plan" required>
			  <?php 
				  require 'db.php';
				  
 		       $query="select plan_name from banquet_plans";
 		       $exec = mysqli_query($con,$query);
 		       
 		       if($exec)
 		       {
 		       
 		         while($r = mysqli_fetch_array($exec))
 		         {
 		     ?>
 		    	<option><?php echo $r['plan_name']; ?></option>
 		    <?php 
 		      }
 		     }
 		     else
 		        echo "error";
 		    ?>
 		   </select>
 		   <input type="date" name="date" required/>
 		   <input type="time" name="time" required/>
			<input type="number" name="slot" required />
 		   <textarea name="extra" placeholder="Extra Service"> </textarea>
 		   <select name="reason" required>
 		   		<option>Select Reason</option>
				<option>Birthday</option>
				<option>Event</option>
 		   </select>
 		   <button>Calculate Charge</button>
 		</form>
 	</body>
</html>