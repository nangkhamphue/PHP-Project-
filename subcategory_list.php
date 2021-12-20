<?php 
    require 'backend_header.php';
    require 'db_connected.php';

    $sql = 'SELECT subcategory.*, category.id as cid, category.name as cname 
            FROM subcategory 
            INNER JOIN category
            ON subcategory.category_id = category.id
            ORDER BY name';
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $subcategories = $stmt->fetchAll();
?>
    <div class="app-title">
        <div>
            <h1> <i class="icofont-list"></i> Sub-category </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <a href="subcategory_new.php" class="btn btn-outline-primary">
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
                                  <th> # </th>
                                  <th> Name </th>
                                  <th> Category </th>
                                  <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php 
                                    $i=1;
                                    foreach ($subcategories as $subcategory) {
                                    
                                    $id = $subcategory['id'];
                                    $name = $subcategory['name'];
                                    $cid = $subcategory['category_id'];
                                    $cname = $subcategory['cname'];
                                ?>
                                <tr>
                                    <td> <?= $i++; ?> . </td>
                                    <td> <?= $name; ?> </td>
                                    <td> <?= $cname; ?> </td>

                                    <td>
                                        <a href="subcategory_edit.php?id=<?= $id ?>" class="btn btn-warning">
                                            <i class="fas fa-edit"></i>                                        
                                        </a>

                                        <form class="d-inline-block" onsubmit="return confirm('Are you sure want to delete?')" method="POST" action="subcategory_delete.php">

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
    require 'backend_footer.php';
?>