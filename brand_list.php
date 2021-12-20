<?php 
	require('backend_header.php');
	require('db_connected.php');
?>
	<div class="app-title">
	    <div>
	        <h1> <i class="icofont-list"></i> Brand </h1>
	    </div>
	    <ul class="app-breadcrumb breadcrumb side">
	        <a href="brand_new.php" class="btn btn-outline-primary">
	            <i class="far fa-plus-square"></i>
	        </a>
	    </ul>
	</div>

	<div class="row">
	    <div class="col-md-12">
	        <div class="tile">
	            <div class="tile-body">
	                <div class="table-responsive">
	                    <table class="table table-hover table-bordered" id="sampleTable">
	                        <thead>
	                            <tr>
	                              <th>#</th>
	                              <th>Name</th>
	                              <th>Action</th>
	                            </tr>
	                        </thead>
	                        <tbody>

	                        	<?php 
	                        		$sql = "SELECT * FROM brand";
	                        		$stmt = $conn->prepare($sql);
	                        		$stmt->execute();

	                        		$rows = $stmt->fetchAll();

	                        		// var_dump($rows);
	                        		$i = 1;
	                        		foreach ($rows as $row) {
	                        			$id = $row['id'];
	                        			$name = $row['name'];
	                        			$photo = $row['photo'];  
	                        	?>

	                            <tr>
	                                <td> <?php echo $i++ ?>. </td>
	                                <td> <?= $name ?>
	                                	<img src="<?= $photo; ?>" style="width: 150px; height: 150px;"> 
	                                </td>
	                                <td>
	                                    <a href="brand_edit.php?bid=<?= $id ?>" class="btn btn-warning">
	                                        <i class="fas fa-edit"></i>
	                                    </a>

	                                    <form class="d-inline-block" onsubmit="return confirm('Are you sure want to delete?')" method="POST" action="brand_delete.php">

	                                    	<input type="hidden" name="id" value="<?= $id ?>">

	                                    	<button class="btn btn-outline-danger">
	                                    		<i class="fas fa-trash-alt"></i>
	                                    	</button>

	                                    </form>

	                                </td>

	                            </tr>

	                            <?php } ?>


	                        </tbody>
	                    </table>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>

<?php 
	require('backend_footer.php');
?>