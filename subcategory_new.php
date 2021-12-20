<?php 
    require 'backend_header.php';
    include 'db_connected.php';

?>
    <div class="app-title">
        <div>
            <h1> <i class="icofont-list"></i>Add New Sub-Category </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <a href="subcategory_list.php" class="btn btn-outline-primary">
                <i class="fas fa-backward"></i>            
            </a>
        </ul>
    </div>
    
    <div class="row ml-3">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form action="subcategory_add.php" method="POST" enctype="multipart/form-data">
                        
                        <div class="form-group row">
                            <label for="name_id" class="col-sm-2 col-form-label"> Name </label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="name_id" name="name">
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="categoryName" class="col-sm-2 col-form-label"> Category </label>
                        
                        <div class="col-sm-10">
                            <select class="form-control select2 form-control-lg" name="category">
                                <option> Choose Category </option>
                                
                                <?php 
                                    $sql="SELECT * from category ORDER BY name ASC";
                                    $stmt=$pdo->prepare($sql);
                                    $stmt->execute();
                                    $rows= $stmt->fetchAll();

                                    $i=1;
                                    foreach ($rows as $category):

                                    $id = $category['id'];
                                    $name = $category['name']; 

                                ?>
                                    
                                        <option value="<?= $id; ?>" > 
                                            <?= $name; ?> 
                                        </option>

                                <?php endforeach; ?>

                            </select>
                        </div>
                    </div>

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i>
                                    Save
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

<?php 
    require 'backend_footer.php';
?>