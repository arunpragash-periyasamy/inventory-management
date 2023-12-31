<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Quotation Add</h4>
                <h6>Add/Update Quotation</h6>
            </div>
        </div>
        <form enctype="multipart/form-data" action="/quotation/add_quotation" class="newForm" method="post">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Customer Name</label>
                            <div class="row">
                                <div class="col-lg-10 col-sm-10 col-10">
                                    <select class="select " name="customer" id="customer">
                                        <option>Select Customer</option>
                                        <option>Customer</option>
                                    </select>
                                </div>
                                <div class="col-lg-2 col-sm-2 col-2 ps-0">
                                    <div class="add-icon">
                                        <a href="javascript:void(0);"><img src="/assets/img/icons/plus1.svg" alt="img"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Quotation Date </label>
                            <div class="input-groupicon">
                                <input type="text" placeholder="DD-MM-YYYY" class="datetimepicker" name="date" id="date">
                                <div class="addonset">
                                    <img src="/assets/img/icons/calendars.svg" alt="img">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Reference No.</label>
                            <input type="text" name="reference_number" id="reference_number">
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Product Name</label>
                            <div class="input-groupicon">
                                <input type="text" placeholder="Scan/Search Product by code and select..." name="product_name" id="product_name">
                                <div class="addonset">
                                    <img src="/assets/img/icons/scanners.svg" alt="img">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Net Unit Price($) </th>
                                    <th>Stock</th>
                                    <th>Qty</th>
                                    <th>Discount($) </th>
                                    <th>Tax % </th>
                                    <th class="text-end">Subtotal ($)</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="productimgname">
                                        <a class="product-img">
                                            <img src="/assets/img/product/product7.jpg" alt="product">
                                        </a>
                                        <a href="javascript:void(0);">Apple Earpods</a>
                                    </td>
                                    <td>150</td>
                                    <td>500</td>
                                    <td>500</td>
                                    <td>100</td>
                                    <td>250</td>
                                    <td class="text-end">500</td>
                                    <td>
                                        <a href="javascript:void(0);" class="delete-set"><img src="/assets/img/icons/delete.svg" alt="svg"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="productimgname">
                                        <a class="product-img">
                                            <img src="/assets/img/product/product6.jpg" alt="product">
                                        </a>
                                        <a href="javascript:void(0);">Macbook Pro</a>
                                    </td>
                                    <td>15.00</td>
                                    <td>6000.00</td>
                                    <td>100.00</td>
                                    <td>0.00</td>
                                    <td>0.00</td>
                                    <td class="text-end">1000.00</td>
                                    <td>
                                        <a href="javascript:void(0);" class="delete-set"><img src="/assets/img/icons/delete.svg" alt="svg"></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-lg-12 float-md-right">
                        <div class="total-order">
                            <ul>
                                <li>
                                    <h4>Order Tax</h4>
                                    <h5>$ 0.00 (0.00%)</h5>
                                </li>
                                <li>
                                    <h4>Discount </h4>
                                    <h5>$ 0.00</h5>
                                </li>
                                <li>
                                    <h4>Shipping</h4>
                                    <h5>$ 0.00</h5>
                                </li>
                                <li class="total">
                                    <h4>Grand Total</h4>
                                    <h5>$ 0.00</h5>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Order Tax</label>
                            <input type="text" name="order_tax" id="order_tax">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Discount</label>
                            <input type="text" name="discount" id="discount">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Shipping</label>
                            <input type="text" name="shipping" id="shipping">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Status</label>
                            <select class="select " name="status" id="status">
                                <option>Choose Status</option>
                                <option>Completed</option>
                                <option>Inprogress</option>
                            </select>
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
                        <a href="quotation_list" class="btn btn-cancel">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
         <input type="text" name="id" value="0" hidden></form>
    </div>
</div>