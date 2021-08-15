<!-- Activity Log Modal -->
<div class="modal animate__animated animate__fadeIn" id="activityLogModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-clock"></i>&nbsp;&nbsp;Activity Log Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="control-label"><strong>USER ID NUMBER:</strong></h6>
                            <label style="color:black;" class="form-control">{{currentActivityLog.user_id}}</label><br>
                            <h6 class="control-label"><strong>NAME OF THE USER:</strong></h6>
                            <label style="color:black;" class="form-control">{{currentActivityLog.rank + ' ' + currentActivityLog.firstname + ' ' + currentActivityLog.middlename + ' ' + currentActivityLog.lastname + ' ' + currentActivityLog.suffixname}}</label><br>
                            <h6 class="control-label"><strong>USER ACCOUNT:</strong></h6>
                            <label style="color:black;" class="form-control">{{currentActivityLog.username}}</label><br>
                            <h6 class="control-label"><strong>EMAIL ADDRESS:</strong></h6>
                            <label style="color:black;" class="form-control">{{currentActivityLog.email}}</label><br>
                            <h6 class="control-label"><strong>USER LEVEL:</strong></h6>
                            <label style="color:black;" class="form-control">{{currentActivityLog.userlevel}}</label>
                        </div>
                        <div class="col-md-6">
                            <h6 class="control-label"><strong>IP ADDRESS</strong></h6>
                            <label style="color:black;" class="form-control">{{currentActivityLog.ip}}</label><br>
                            <h6 class="control-label"><strong>ACTIVITIES:</strong></h6>
                            <label style="color:blue;" class="form-control">created:&nbsp;{{currentActivityLog.created_date}}</label>
                            <label style="color:red;" class="form-control">updated:&nbsp;{{currentActivityLog.updated_date}}</label><br>
                            <h6 class="control-label"><strong>REMARKS:</strong></h6>
                            <textarea style="color:black;" class="form-control" disable>{{currentActivityLog.activity}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>