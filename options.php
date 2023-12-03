<div class="page-wrapper">
    
<div class="content">
    <div class="page-header">
        <div class="page-title">
            <h4>Add Options</h4>
            <h6>Create new options</h6>
        </div>
    </div>

    <form enctype="multipart/form-data" action="/options" class="newForm" method="post">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>ADD</label>
                            <input type="button" value="ADD">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Choose Option</label>
                            <select class="select" name="option_type" id="category">
                                <option value="">Choose option</option>
                                <option value="unit">unit</option>
                                <option value="tax">tax</option>
                                <option value="discount">discount</option>
                                <option value="role">role</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Option Name</label>
                            <input type="text" name="option_name" id="option_name">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" name="description" id="description">
                        </div>
                    </div>                    <div class="col-lg-12">
                        <button type="button" class="btn btn-submit me-2">Submit</button>
                        <a href="product_list" class="btn btn-cancel">Cancel</a>
                    </div>
                </div>
            </div>
        </div>

     <input type="text" name="id" value="0" hidden></form>
</div>

</div>