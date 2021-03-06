<?php 
	require('backend_header.php');
	require('db_connected.php');
?>
	<div class="app-title">
	    <div>
	        <h1> <i class="icofont-list"></i> Item </h1>
	    </div>
	    <ul class="app-breadcrumb breadcrumb side">
	        <a href="item_new.php" class="btn btn-outline-primary">
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
									<th> No </th>
									<th> Name </th>
									<th> Brand </th>
									<th> Subcategory </th>
									<th> Price </th>
									<th> Action </th>
								</tr>
	                        </thead>
	                        <tbody>

	                        	<?php 
									$sql="SELECT item.*, brand.name as bname, subcategory.name as sname from item 
										LEFT JOIN brand
										ON item.brand_id = brand.id
										LEFT JOIN subcategory
										ON item.subcategory_id = subcategory.id
										ORDER BY item.name ASC";
						        	$stmt=$pdo->prepare($sql);
						        	$stmt->execute();
						        	$rows= $stmt->fetchAll();

						        	$i=1;
	        						foreach ($rows as $item){

	        						$id = $item['id'];
	        						$name = $item['name'];
	        						$bname = $item['bname'];
	        						$price = $item['price'];
	        						$codeno = $item['codeno'];
	        						$sname = $item['sname'];
        							$photos = $item['photo'];
        							$price = $item['price'];
        							$discount = $item['discount'];

									$photos_arr = explode("|",$photos);
									$photo = $photos_arr[0];

								?>

							<tr>
								<td> <?= $i++; ?> </td>
								<td> 
						            <div class="d-flex no-block align-items-center">
						                <?php if($photo){ ?>
						                    <div class="mr-3">
						                        <img src="<?= $photo; ?>"
						                            alt="user" class="rounded-circle" width="50"
						                            height="45" />
						                    </div>
						                <?php } ?>
						                <div class="">
						                    <h5 class="text-dark mb-0 font-16 font-weight-medium"> <?= $codeno; ?></h5>
						                    <span class="text-muted font-14">
						                        <?= substr($name, 0, 30) . '...'; ?>   
						                    </span>
						                </div>
						            </div>
						        </td>
								<td> <?= $bname; ?> </td>
								<td> <?= $sname; ?> </td>

								<td> 
						            <?php if($discount > 0):?>
						                <?= $discount ?> MMK
						                <del class="d-block"> <?= $price ?> MMK </del>
						            <?php else: ?>
						                <?= $price ?> MMK
						            <?php endif ?>
						        </td>
                                <td>
                                    <a href="item_edit.php?id=<?= $id ?>" class="btn btn-warning">
                                        <i class="fas fa-edit"></i> 
                                    </a>

                                    <form class="d-inline-block" onsubmit="return confirm('Are you sure want to delete?')" method="POST" action="item_delete.php">

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