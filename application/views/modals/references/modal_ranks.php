<!-- add Ranks Modal -->
<modal class="modal animate__animated animate__fadeIn" tabindex="-1" role="dialog" aria-hidden="true" id="addModal" @close="clearAll()">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-plus"></i>&nbsp; Create New Rank</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <h6 class="control-label"><strong>RANK:</strong></h6>
                                <input type="text" class="form-control" :class="{'is-invalid': formValidate.rank}" name="rank" v-model="newRank.rank">
                                <p class="text-danger animate__animated animate__fadeIn" v-if="formValidate.description" v-html="formValidate.description"></p>
                            </div>
                            <div class="form-group">
                                <h6 class="control-label"><strong>DESCRIPTION:</strong></h6>
                                <textarea cols="35" rows="5" :class="{'is-invalid': formValidate.description}" name="description" v-model="newRank.description" class="form-control"></textarea>
                                <p class="text-danger animate__animated animate__fadeIn" v-if="formValidate.description" v-html="formValidate.description"></p>
                            </div>
                            <div class="form-group">
                                <h6 class="control-label"><strong>CATEGORY:</strong></h6>
                                <input type="text" class="form-control" :class="{'is-invalid': formValidate.category}" name="category" v-model="newRank.category">
                                <p class="text-danger animate__animated animate__fadeIn" v-if="formValidate.category" v-html="formValidate.category"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times" ></i> Cancel</button>
                <button class="btn btn-warning" @click="addRank"><i class="fas fa-plus"></i> Create</button>
            </div>
        </div>
    </div>
</modal>



<!-- detail Ranks Modal -->
<modal class="modal animate__animated animate__fadeIn" id="detailModal" tabindex="-1" role="dialog" aria-hidden="true">
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
</modal>

<!-- edit rank modal -->
<modal class="modal animate__animated animate__fadeIn" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
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
                        <div class="col-md-12">
                            <h6 class="control-label"><strong>USER ID NUMBER:</strong></h6>
                            <label style="color:black;" class="form-control">{{currentRank.id}}</label><br>
                            <h6 class="control-label"><strong>RANK:</strong></h6>
                            <label style="color:black;" class="form-control">{{currentRank.rank}}</label><br>
                            <h6 class="control-label"><strong>DESCRIPTION:</strong></h6>
                            <textarea class="form-control">{{currentRank.description}}</textarea><br>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Cancel</button>
                <button class="btn bg-success" data-toggle="modal" data-target="#editModal" v-on:click="setCurrentRank(rank)">
                    <i class="fas fa-pen"></i> Update
                </button>
            </div>
        </div>
    </div>
</modal>
