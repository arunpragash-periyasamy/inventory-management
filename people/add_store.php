<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Store Management</h4>
                <h6>Add/Update Store</h6>
            </div>
        </div>
        <form enctype="multipart/form-data" action="/people/add_store" class="new_form" method="post">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Store Name</label>
                            <input type="text" name="store_name" id="store_name">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>User Name</label>
                            <input type="text" name="user_name" id="user_name">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Password</label>
                            <div class="pass-group">
                                <input type="password" class=" pass-input" name="password" id="password">
                                <span class="fas toggle-password fa-eye-slash"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="mobile_number" id="mobile_number">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email_id" id="email_id">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label> Store Image</label>
                            <div class="image-upload">
                                <input type="file" name="store_image" id="store_image">
                                <div class="image-uploads">
                                    <img src="/assets/img/icons/upload.svg" alt="img">
                                    <h4>Drag and drop a file to upload</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <a href="javascript:void(0);" class="btn btn-submit me-2">Submit</a>
                        <a href="storelist.html" class="btn btn-cancel">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>