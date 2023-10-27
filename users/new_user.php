<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>User Management</h4>
                <h6>Add/Update User</h6>
            </div>
        </div>

        <form enctype="multipart/form-data" action="/users/new_user" class="newForm" method="post">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>User Name</label>
                                <input type="text" name="user_name" id="user_name">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email_id" id="email_id">
                            </div>
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
                                <label>Mobile</label>
                                <input type="text" name="mobile_number" id="mobile_number">
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <select class="select " name="role" id="role">
                                    <option>Select</option>
                                    <option>Role</option>
                                    <option>Role1</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <div class="pass-group">
                                    <input type="password" class=" pass-inputs" name="confirm_password" id="confirm_password">
                                    <span class="fas toggle-passworda fa-eye-slash"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label> Profile Picture</label>
                                <div class="image-upload image-upload-new">
                                    <input type="file" name="profile_image" id="profile_image">
                                    <div class="image-uploads">
                                        <img src="assets/img/icons/upload.svg" alt="img">
                                        <h4>Drag and drop a file to upload</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="button" class="btn btn-submit me-2">Submit</button>
                            <a href="javascript:void(0);" class="btn btn-cancel">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>