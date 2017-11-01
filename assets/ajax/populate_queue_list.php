<?php
	include "../../includes/functions.php";

	$queue_list = getAllQueueLists();
?>
<h3>List of customers being queued!</h3>
<table  id="populate_table_queue_list" class="table table-bordered data-table">
    <thead>
        <tr>
            <th >#</th>
            <th >Type</th>
            <th >Name</th>
            <th >Service</th>
            <th >Queued at</th>
        </tr>
    </thead>
    
	<?php 
	if(!empty($queue_list)){ ?>
    	<tbody>
    		<?php foreach ($queue_list as $key => $value) {?>
    			<tr>
    				<td ><?php echo $value['id']; ?> </td>
    				<td ><?php echo $value['Type']; ?> </td>
    				<td ><?php echo $value['Name']; ?> </td>
    				<td ><?php echo $value['Service']; ?> </td>
    				<td ><?php echo $value['Queued AT']; ?> </td>
    			</tr>
    		<?php
    		} ?>
    	</tbody>
	<?php }?>
</table>