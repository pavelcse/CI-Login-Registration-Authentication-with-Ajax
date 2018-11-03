<div class="container">
	<div class="">
		<h1 class="header text-center">User Information</h1>
		<hr>
		<?php 
            if($this->session->flashdata('message')){
                echo '<p class="alert alert-success">'.$this->session->flashdata('message').'</p>';
            }
		?>
	    <table class="table table-striped table-bordered table-hover">
		    <tr>
			    <th>Name</th>
			    <td>: <?php echo $user_data->name; ?></td>
		    </tr>
		    <tr>
			    <th>Email</th>
			    <td>: <?php echo $user_data->email; ?></td>
		    </tr>
		    <tr>
			    <th>Country</th>
			    <td>: <?php echo $user_data->country; ?></td>
		    </tr>
		    <tr>
			    <th>Address</th>
			    <td>: <?php echo $user_data->address; ?></td>
		    </tr>
		    <?php 
                if($user_data->role == 2){
		    ?>
		    <tr>
			    <th>Shop Name</th>
			    <td>: <?php echo $user_data->shop_name; ?></td>
		    </tr>
		    <tr>
			    <th>Shop Address</th>
			    <td>: <?php echo $user_data->shop_address; ?></td>
		    </tr>
		    <?php 
                }
		    ?>
	    </table>
	    <h4 class="text-center"><a class="btn btn-info btn-sm" href="<?php echo base_url()?>edit-user">Edit Information</a></h4>

	</div>
</div>