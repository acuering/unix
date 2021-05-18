<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js?v="></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<script type="text/javascript">
		$(document).ready(function(){
            //chassis of the select element id
			$("#chassis").change(function(){
                //get value of the id
				var chid = $("#chassis").val();
             //   console.log(details);
				$.ajax({
					url: 'data.php',
					method: 'post',
					data: 'chid=' + chid
				}).done(function(details){
					details = JSON.parse(details);
					$('#details').empty();
					details.forEach(function(details){
						$('#details').append('<div>' + 'Chassis Title' + ': ' + details.name + '</div>')
                        $('#details').append('<div>' + 'Chassis Price' + ': ' + details.chassis_price + '</div>')
                        $('#details').append('<div>' + 'Motherboard' + ': ' + details.motherboard + '</div>')
                        $('#details').append('<div>' + 'Motherboard Price' + ': ' + details.motherboard_price + '</div>')
					})
				})
			})
		})
	</script>
</head>
<body>
	<div class="container">
		<h1 class="text-center">Unix Surplus Coding Test</h1>
		<hr>
		<div class="row">
		    <div class="col-md-6 col-md-offset-3">
				<form role="form" method="post" action="">
		        	<div class="row">
		                <div class="form-group">
		                    <label for="chassis">Chassis</label>
		                    <select class="form-control" id="chassis" name="chassis">
		                    	<option selected="" disabled="">Select Chassis</option>
		                    	<?php 
		                    		require 'data.php';
		                    		$chassis = loadChassis();
		                    		foreach ($chassis as $chassis) {
		                    			echo "<option id='".$chassis['id']."' value='".$chassis['id']."'>".$chassis['name']."</option>";
		                    		}
		                    	 ?>
		                    </select>
		                </div>
		            </div>
		            <div class="row">
						<div id="details" name="details">  
		                </div>
		            </div>
		        </form>
		    </div>
		</div>
	</div>
</body>
</html>
