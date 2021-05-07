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
                            <h6 class="control-label">USER ID NUMBER: </h6>
                            <input type="text" class="form-control" v-model="currentActivityLog.user_id" disabled /><br>
                            <h6 class="control-label">NAME OF THE USER: </h6>
                            <input type="text" class="form-control" v-model="currentActivityLog.rank + ' ' + currentActivityLog.firstname + ' ' + currentActivityLog.middlename + ' ' + currentActivityLog.lastname + ' ' + currentActivityLog.suffixname" disabled /><br>
                            <h6 class="control-label">USER ACCOUNT: </h6>
                            <input type="text" class="form-control" v-model="currentActivityLog.username" disabled /><br>
                            <h6 class="control-label">EMAIL ADDRESS: </h6>
                            <input type="text" class="form-control" v-model="currentActivityLog.email" disabled /><br>
                            <h6 class="control-label">USER LEVEL: </h6>
                            <input type="text" class="form-control" v-model="currentActivityLog.userlevel" disabled /><br>
                        </div>
                        <div class="col-md-6">
                            <h6 class="control-label">IP ADDRESS </h6>
                            <input type="text" class="form-control" v-model="currentActivityLog.ip" disabled /><br>
                            <h6 class="control-label">ACTIVITIES: </h6>
                            <textarea class="form-control" disabled>{{currentActivityLog.activity}}</textarea><br>
                            <h6 class="control-label">DATE / TIME OF ACTIVITY: </h6>
                            <input type="text" class="form-control" v-model="currentActivityLog.activity_date" disabled /><br>
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