<div class="container">
    <form action="" method="post" name="queue" id="queue" >
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
			    	<div class="panel-heading">New Customer</div>
			    	<div class="panel-body">
			    		<h3><strong>Services</strong></h3>
			    		<?php if(!empty($services)){
			    			foreach ($services as $key => $value) { ?>
				    			<div class="radio">
									<label><input type="radio" name="service" id="service" value="<?=$value['id'];?>" required><?=$value['Name'];?></label>
								</div>	
			    			<?php }
			    		}?>

			    		<div class="form-group">
				    		<div class="input-group-btn" data-toggle="buttons">
				    		<?php if(!empty($types)){
				    			$i = 1;
				    			foreach ($types as $key => $val) { ?>
									<label class="btn btn-primary <?php if($i==1) echo "active";?>">
										<input type="radio" name="type" id="type" value="<?=$val['id'];?>" <?php if($i==1) echo "checked";?>><?=$val['Name'];?>
									</label>
							<?php
								$i++; }
				    		}?>	
							</div>
						</div>

						<div id="t_1">
							<div class="form-group">
								<label for="sel1">Title:</label>
								<select class="form-control" id="title" name="title" required="">
									<option></option>
									<?php if(!empty($titles)){
										foreach ($titles as $key => $val) {?>
											<option value="<?=$val['id'];?>"><?=$val['Title'];?></option>
									<?php }
									}?>
								</select>
							</div>

							<div class="form-group">
								<label for="FirstName"> First Name:</label>
								<input type="text" class="form-control" id="FirstName" name="FirstName" required>
							</div>

							<div class="form-group">
								<label for="LastName">Last Name:</label>
								<input type="text" class="form-control" id="LastName" name="LastName" required>
							</div>
						</div> 

						<div id="t_2" style="display:none;">
							<div class="form-group">
								<label for="Name"> Organization Name:</label>
								<input type="text" class="form-control" id="Name" name="Name">
							</div>
						</div>

			    		<div class="form-actions">
		            		<input type="submit" class="btn btn-success btn-large" name="save" id="save" value="Submit" />
		        		</div>
					</div>
				</div>
        	</div>

            <div class="col-md-6">
                <div class="panel panel-default">
			    	<div class="panel-heading">Queues</div>
			    	<div  id="populate_queue_list">
			    		
			    	</div>
				</div>
        	</div>
        </div>
    </form>
</div>