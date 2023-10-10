 <div class="page-wrapper">
    
 <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Product Add Category</h4>
                <h6>Create new product Category</h6>
            </div>
        </div>
        <form enctype="multipart/form-data" action="/product/add_category" class="new_form" method="post">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" name="category_name" id="category_name">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-12">
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
                        <div class="form-group">
                            <label> Product Image</label>
                            <div class="image-upload" name="product_image" id="product_image">
                                <input type="file">
                                <div class="image-uploads">
                                    <img src="/assets/img/icons/upload.svg" alt="img">
                                    <h4>Drag and drop a file to upload</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button type="button" class="btn btn-submit me-2">Submit</button>
                        <a href="category_list" class="btn btn-cancel">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>

 </div>