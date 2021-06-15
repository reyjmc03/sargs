<!-- add new user account modal -->
<div class="modal animate__animated animate__fadeIn" id="addNewUserAccountModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 1024px !important;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-plus"></i>&nbsp;&nbsp;CREATE NEW ACCOUNT</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-title"><b><u>PERSONAL DETAILS</u></b></h5><br>
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
                            </div><hr>
                            <div class="form-group">
                                <h6 class="control-label">Name: </h6>
                                <input type="text" placeholder="First Name" class="form-control"><br>
                                <input type="text" placeholder="Middle Name" class="form-control"><br>
                                <input type="text" placeholder="Last Name" class="form-control"><br>
                                <input type="text" placeholder="Suffix Name" class="form-control">
                            </div><hr>
                            <div class="form-group">
                                <h6 class="control-label">AFPSN: </h6>
                                <input type="text" placeholder="First Name" class="form-control"><br>
                                <h6 class="control-label">BOS: </h6>
                                <select class="form-control">
                                    <option>-- Select --</option>
                                    <option>PA</option>
                                    <option>PN</option>
                                    <option>PAF</option>
                                    <option>AFP</option>
                                </select> 
                                <br>   
                                <h6 class="control-label">AFPOS: </h6>
                                <select class="form-control">
                                    <option>-- Select --</option>
                                    <option>PA</option>
                                    <option>PN</option>
                                    <option>PAF</option>
                                    <option>AFP</option>
                                </select>                              
                            </div>
                            <div class="form-group">
                                <h6 class="control-label">ADDRRESS: </h6>
                                <input type="text" placeholder="First Name" class="form-control"><br>
                                <h6 class="control-label">CONTACT #: </h6>
                                <input type="text" placeholder="First Name" class="form-control"><br>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5 class="card-title"><b><u>ACCOUNT DETAILS</u></b></h5><br>
                            <div class="form-group">
                                <h6 class="control-label">Username: </h6>
                                <input type="text" placeholder="First Name" class="form-control"><br>
                                <h6 class="control-label">Email: </h6>
                                <input type="text" placeholder="First Name" class="form-control"><br>
                            </div>
                            <div class="form-group">
                                <h6 class="control-label">Password: </h6>
                                <input type="text" placeholder="First Name" class="form-control"><br>
                                <h6 class="control-label">Confirm Password: </h6>
                                <input type="text" placeholder="First Name" class="form-control"><br>
                            </div>
                            <div class="form-group">
                                <h6 class="control-label">User Level: </h6>
                                <select class="form-control">
                                    <option>-- Select --</option>
                                    <option>ADMINISTRATOR</option>
                                    <option>USER</option>
                                </select>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-toggle="modal"><i class="fas fa-plus"></i>&nbsp; ADD USER</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<!-- more details modal -->
<div class="modal animate__animated animate__fadeIn" id="moreDetailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 1024px !important;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-eye"></i>&nbsp;&nbsp;MORE DETAILS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5 class="card-title"><b><u>PERSONAL INFORMATION</u></b></h5>
                            </div>
                            <div class="form-group">
                                <h6 class="control-label"><b>Name of User:</b></h6>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="control-label">
                                {{modalUser.rank}}&nbsp;{{modalUser.firstname}}&nbsp;{{modalUser.middlename}}&nbsp;{{modalUser.lastname}}{{modalUser.suffixname == null ? '' : '&nbsp;' + modalUser.suffixname}}{{modalUser.afpsn== null ? '' : '&nbsp;' + modalUser.afpsn}}{{modalUser.afpos== null ? '' : '&nbsp;' + modalUser.afpos}}{{modalUser.bos== null ? '' : '&nbsp;' + modalUser.bos}}
                                </label>
                            </div>
                            <div class="form-group">
                                <h6 class="control-label"><b>Home Address:</b></h6>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="control-label">
                                {{modalUser.address}}
                                </label>
                            </div>
                            <div class="form-group">
                                <h6 class="control-label"><b>Contact #:</b></h6>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="control-label">
                                {{modalUser.phone}}
                                </label>
                            </div>
                            <div class="form-group">
                                <h6 class="control-label"><b>Photo:</b></h6>
                                <center><img src="http://placehold.it/250x250" class="img-thumbnail" alt="Cinque Terre" width="250" height="250"></center>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5 class="card-title"><b><u>ACCOUNT INFORMATION</u></b></h5>
                            </div>
                            <div class="form-group">
                                <h6 class="control-label"><b>Username:</b></h6>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="control-label">
                                {{modalUser.username}}
                                </label>
                            </div>
                            <div class="form-group">
                                <h6 class="control-label"><b>Email Address:</b></h6>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="control-label">
                                {{modalUser.email}}
                                </label>
                            </div>
                            <div class="form-group">
                                <h6 class="control-label"><b>User Level:</b></h6>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="control-label">
                                {{modalUser.userlevel}}
                                </label>
                            </div>
                            <div class="form-group">
                                <h6 class="control-label"><b>Status:</b></h6>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="control-label">
                                {{modalUser.status}}
                                </label>
                            </div>
                            <div class="form-group">
                                <h6 class="control-label"><b>Date/Time Created:</b></h6>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="control-label">
                                {{modalUser.date_created}}
                                </label>
                            </div>
                            <div class="form-group">
                                <h6 class="control-label"><b>Date/Time Updated:</b></h6>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="control-label">
                                {{modalUser.date_modified}}
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-toggle="modal"><i class="fas fa-plus"></i>&nbsp; ADD USER</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- edit user account modal -->

<script>
// $('#addNewUserAccountModal').modal({backdrop: 'static', keyboard: false}) 
</script>

