<div class="container">
	<div class="">
		<h1 class="header text-center">Edit User Information</h1>
		<hr>
		<form action="<?php echo base_url()?>update-user" method="post">
	        <table class="table table-striped table-bordered table-hover">
		        <tr>
			        <th>Name</th>
			        <td>: <input type="text" name="name" value="<?php echo $user_data->name; ?>"></td>
		        </tr>
		        <tr>
			        <th>Email</th>
			        <td>: <input type="text" name="email" value="<?php echo $user_data->email; ?>"></td>
		        </tr>
		        <tr>
			        <th>Country</th>
			        <td>: <input type="text" name="country" value="<?php echo $user_data->country; ?>"></td>
		        </tr>
		        <tr>
			        <th>Address</th>
			        <td>: <textarea name="address" id="" cols="30" rows="5"><?php echo $user_data->address; ?></textarea></td>
		        </tr>
		        <?php 
                    if($user_data->role == 2){
		        ?>
		        <tr>
			        <th>Shop Name</th>
			        <td>: <input type="text" name="shop_name" value="<?php echo $user_data->shop_name; ?>"></td>
		        </tr>
		        <tr>
			        <th>Shop Address</th>
			        <td>: <textarea name="shop_address" id="" cols="30" rows="5"><?php echo $user_data->shop_address; ?></textarea></td>
		        </tr>
		        <?php 
                    }
		        ?>
	        </table>
	        <div class="text-center">
	        	<input class="btn btn-info btn-sm" type="submit" value="Confirm Update">
	        	<a class="btn btn-info btn-sm" href="<?php echo base_url()?>read-user">Back to Info</a>
	        </div>
		</form>
	</div>
</div>