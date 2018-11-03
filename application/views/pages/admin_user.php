<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>User List</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<?php 
                        if($this->session->flashdata('message')){
                        	echo '<p class="alert alert-success">'.$this->session->flashdata('message').'</p>';
                        }
					?>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Name</th>
								  <th>Email</th>
								  <th>Country</th>
								  <th>Address</th>
								  <th>User Type</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	<?php foreach ($user_data as $data) { ?>
							<tr>
								<td><?php echo $data->name ;?></td>
								<td><?php echo $data->email ;?></td>
								<td><?php echo $data->country ;?></td>
								<td><?php echo $data->address ;?></td>
								<td>
									<?php  
                                        if($data->role == 0){
                                            echo "User";
                                        }
									?>	
								</td>
								<td class="center">
									<a class="btn btn-danger" href="<?php base_url()?>delete-user?id=<?php echo $data->id ?>">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							<?php } ?>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->