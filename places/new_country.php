<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Places Management</h4>
                <h6>Add/Update Places</h6>
            </div>
        </div>
        <form enctype="multipart/form-data" action="/plcaes/new_country" class="newForm" method="post">

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Country Name</label>
                                <input type="text" name="country_name" id="country_name">
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Region</label>
                                <input type="text" name="region_name" id="region_name">
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
                            <a href="countries_list" class="btn btn-cancel">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
         <input type="text" name="id" value="0" hidden></form>
    </div>
</div>