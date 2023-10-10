<div class="page-wrapper">
<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>Brand ADD</h4>
            <h6>Create new Brand</h6>
        </div>
    </div>
    <form enctype="multipart/form-data" action="/product/add_brand" class="new_form" method="post">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Brand Name</label>
                        <input type="text" name="brand_name" id="brand_name">
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
                        <div class="image-upload">
                            <input type="file" name="product_image" id="product_image">
                            <div class="image-uploads">
                                <img src="/assets/img/icons/upload.svg" alt="img">
                                <h4>Drag and drop a file to upload</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <button type="button" class="btn btn-submit me-2">Submit</button>
                    <a href="brand_list" class="btn btn-cancel">Cancel</a>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
</div>