<!-- add new user account modal -->
<!-- <div class="modal animate__animated animate__backInDown modal-fullscreen" id="addNewUserAccountModal" tabindex="-1" role="dialog" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered  fullscreen-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New User Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="control-label">USER ID NUMBER: </h6>
                            <input type="text" class="form-control" disabled /><br>
                            <h6 class="control-label">NAME OF THE USER: </h6>
                            <input type="text" class="form-control" disabled /><br>
                            <h6 class="control-label">USER ACCOUNT: </h6>
                            <input type="text" class="form-control"  disabled /><br>
                            <h6 class="control-label">EMAIL ADDRESS: </h6>
                            <input type="text" class="form-control" disabled /><br>
                            <h6 class="control-label">USER LEVEL: </h6>
                            <input type="text" class="form-control"  disabled /><br>
                        </div>
                        <div class="col-md-6">
                            <h6 class="control-label">IP ADDRESS </h6>
                            <input type="text" class="form-control" disabled /><br>
                            <h6 class="control-label">ACTIVITIES: </h6>
                            <textarea class="form-control" disabled></textarea><br>
                            <h6 class="control-label">DATE / TIME OF ACTIVITY: </h6>
                            <input type="text" class="form-control"  disabled /><br>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> -->
<div class="modal animate__animated animate__backInDown" id="addNewUserAccountModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 1024px !important;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New User Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-title"><b>PERSONAL DETAILS</b></h5>
                            <div class="form-group">
                                <h6 class="control-label">Rank: </h6>
                                <select class="form-control">
                                    <option>-- Select --</option>
                                    <option>Option 1</option>
                                    <option>Option 2</option>
                                    <option>Option 3</option>
                                    <option>Option 4</option>
                                    <option>Option 5</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <h6 class="control-label">Name: </h6>
                                <input type="text" placeholder="First Name" class="form-control"><br>
                                <input type="text" placeholder="Middle Name" class="form-control"><br>
                                <input type="text" placeholder="Last Name" class="form-control"><br>
                                <input type="text" placeholder="Suffix Name" class="form-control">
                            </div><br>
                            <h6 class="control-label">NAME OF THE USER: </h6>
                            <input type="text" class="form-control" disabled /><br>
                            <h6 class="control-label">USER ACCOUNT: </h6>
                            <input type="text" class="form-control"  disabled /><br>
                            <h6 class="control-label">EMAIL ADDRESS: </h6>
                            <input type="text" class="form-control" disabled /><br>
                            <h6 class="control-label">USER LEVEL: </h6>
                            <input type="text" class="form-control"  disabled /><br>
                        </div>
                        <div class="col-md-6">
                            <h6 class="control-label">IP ADDRESS </h6>
                            <input type="text" class="form-control" disabled /><br>
                            <h6 class="control-label">ACTIVITIES: </h6>
                            <textarea class="form-control" disabled></textarea><br>
                            <h6 class="control-label">DATE / TIME OF ACTIVITY: </h6>
                            <input type="text" class="form-control"  disabled /><br>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    <!-- <div class="card">
        <div class="card-header">
            <h5 class="card-title" id="exampleModalLongTitle"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New User Account</h5>
        </div>
        <div class="card-body">
            <form action="#">
                <div class="row">
                    <div class="col-xl-6">
                        <h5 class="card-title"><b>PERSONAL DETAILS</b></h5>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label">Name</label>
                            <div class="col-lg-10">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" placeholder="First Name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" placeholder="Middle Name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" placeholder="Last Name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" placeholder="Suffix Name" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Last Name</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Password</label>
                            <div class="col-lg-9">
                                <input type="password" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">State</label>
                            <div class="col-lg-9">
                                <select class="select select2-hidden-accessible" data-select2-id="4" tabindex="-1" aria-hidden="true">
                                    <option data-select2-id="6">Select State</option>
                                    <option value="1">California</option>
                                    <option value="2">Texas</option>
                                    <option value="3">Florida</option>
                                </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="5" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-jq5w-container"><span class="select2-selection__rendered" id="select2-jq5w-container" role="textbox" aria-readonly="true" title="Select State">Select State</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">About</label>
                            <div class="col-lg-9">
                                <textarea rows="4" cols="5" class="form-control" placeholder="Enter message"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <h5 class="card-title"><b>ACCOUNT DETAILS</b></h5>
                        <div class="row">
                            <label class="col-lg-3 col-form-label">Username</label>
                            <div class="col-lg-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" placeholder="First Name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" placeholder="Last Name" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Email Address</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Password</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Address</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control m-b-20">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="select select2-hidden-accessible" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                                <option data-select2-id="9">Select Country</option>
                                                <option value="1">USA</option>
                                                <option value="2">France</option>
                                                <option value="3">India</option>
                                                <option value="4">Spain</option>
                                            </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="8" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-ngay-container"><span class="select2-selection__rendered" id="select2-ngay-container" role="textbox" aria-readonly="true" title="Select Country">Select Country</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" placeholder="ZIP code" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" placeholder="State/Province" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" placeholder="City" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>						
			</form>
        </div>
    </div> -->
</div>



<!-- more details modal -->
<!-- edit user account modal -->

<script>
// $('#addNewUserAccountModal').modal({backdrop: 'static', keyboard: false}) 
</script>

