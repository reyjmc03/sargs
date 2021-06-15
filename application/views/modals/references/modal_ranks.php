<!-- Ranks Modal -->
<div class="modal animate__animated animate__fadeIn" id="activityRankModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-chevron-up"></i>&nbsp;&nbsp;Rank / Insignia Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="control-label"><strong>USER ID NUMBER:</strong></h6>
                            <label style="color:black;" class="form-control">{{currentRank.id}}</label><br>
                            <h6 class="control-label"><strong>RANK:</strong></h6>
                            <label style="color:black;" class="form-control">{{currentRank.rank}}</label><br>
                            <h6 class="control-label"><strong>DESCRIPTION:</strong></h6>
                            <label style="color:black;" class="form-control">{{currentRank.description}}</label><br>
                        </div>
                        <div class="col-md-6">
                            <h6 class="control-label"><strong>ACTIVITIES:</strong></h6>
                            <label style="color:blue;" class="form-control">created:&nbsp;{{currentRank.date_created}}</label>
                            <label style="color:red;" class="form-control">updated:&nbsp;{{currentRank.date_modified}}</label>
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

<!-- edit rank modal -->
<div class="modal animate__animated animate__fadeIn" id="editRankModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-pen"></i>&nbsp;&nbsp;Edit (Rank / Insignia Details)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="control-label"><strong>USER ID NUMBER:</strong></h6>
                            <label style="color:black;" class="form-control">{{currentRank.id}}</label><br>
                            <h6 class="control-label"><strong>RANK:</strong></h6>
                            <label style="color:black;" class="form-control">{{currentRank.rank}}</label><br>
                            <h6 class="control-label"><strong>DESCRIPTION:</strong></h6>
                            <label style="color:black;" class="form-control">{{currentRank.description}}</label><br>
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
