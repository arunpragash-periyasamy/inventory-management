<div class="page-wrapper">
    
<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>Product Add</h4>
            <h6>Create new product</h6>
        </div>
    </div>

    <form enctype="multipart/form-data" action="/product/add_product" class="new_form" method="post">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Product Name</label>
                            <input type="text" name="product_name" id="product_name">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Category</label>
                            <select class="select" name="category" id="category">
                                <option value="">Choose Category</option>
                                <option value="computers">Computers</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Sub Category</label>
                            <select class="select" name="sub_category" id="sub_category">
                                <option value="">Choose Sub Category</option>
                                <option value="Fruits">Fruits</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Brand</label>
                            <select class="select" name="brand_name" id="brand_name">
                                <option>Choose Brand</option>
                                <option>Brand</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Unit</label>
                            <select class="select" name="unit" id="unit">
                                <option>Choose Unit</option>
                                <option>Unit</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>SKU</label>
                            <input type="text" name="sku_number" id="sku_number">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Minimum Qty</label>
                            <input type="text" name="minimum_quantity" id="minimum_quantity">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Quantity</label>
                            <input type="text" name="quantity" id="quantity">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description" id="description"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Tax</label>
                            <select class="select" name="tax" id="tax">
                                <option>Choose Tax</option>
                                <option>2%</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Discount Type</label>
                            <select class="select" name="discount_type" id="discount_type">
                                <option>Percentage</option>
                                <option>10%</option>
                                <option>20%</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" name="price" id="price">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label> Status</label>
                            <select class="select" name="status" id="status">
                                <option>Closed</option>
                                <option>Open</option>
                            </select>
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
                        <button type="button" class="btn btn-submit me-2">submit</button>
                        <a href="product_list" class="btn btn-cancel">Cancel</a>
                    </div>
                </div>
            </div>
        </div>

    </form>
</div>

</div>