<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Expense Add</h4>
                <h6>Add/Update Expenses</h6>
            </div>
        </div>
        <form enctype="multipart/form-data" action="/expense/add_expense" id="new_form" method="post">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Expense Category</label>
                                <select class="select form-select" name="category" id="category">
                                    <option>Choose Category</option>
                                    <option>Category</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Expense Date </label>
                                <div class="input-groupicon">
                                    <input type="text" placeholder="Choose Date" class="datetimepicker" name="date" id="date">
                                    <div class="addonset">
                                        <img src="assets/img/icons/calendars.svg" alt="img">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Amount</label>
                                <div class="input-groupicon">
                                    <input type="text" name="amount" id="amount">
                                    <div class="addonset">
                                        <img src="assets/img/icons/dollar.svg" alt="img">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Reference No.</label>
                                <input type="text" name="reference_number" id="reference_number">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Expense for</label>
                                <input type="text" name="expense_purpose" id="expense_purpose">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" id="description"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <a href="javascript:void(0);" class="btn btn-submit me-2">Submit</a>
                            <a href="expenselist.html" class="btn btn-cancel">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>