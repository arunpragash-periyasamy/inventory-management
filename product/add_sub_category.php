<?php
$sub_category = DB::query("select id, category_name from add_category");
?>
<div class="page-wrapper">

    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Product Add sub Category</h4>
                <h6>Create new product Category</h6>
            </div>
        </div>
        <form enctype="multipart/form-data" action="/product/add_sub_category" class="newForm" method="post">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Parent Category</label>
                                <select class="select" name="category_name" id="category_name">
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Category Name</label>
                                <input type="text" name="sub_category_name" id="sub_category_name"
                                    value="<?php echo $data['sub_category_name']; ?>">
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Category Code</label>
                                <input type="text" name="category_code" id="category_code">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" id="description"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="button" class="btn btn-submit me-2">Submit</button>
                            <a href="sub_category_list" class="btn btn-cancel">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
            <input type="text" name="id" id="id" value="0" hidden>
        </form>
    </div>
</div>



<script>
        var category_name = $("#category_name");
        <?php
        // Dynamically adding option
        $category = DB::query('select id, category_name from add_category');
        foreach ($category as $row) {
            echo 'category_name.append($("<option>",{value:' . $row["id"] . ', text:"' . $row["category_name"] . '"}));';
        }
        ?>
</script>