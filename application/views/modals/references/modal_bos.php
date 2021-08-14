<!-- add BOS Modal -->
<modal class="modal animate__animated animate__fadeIn" tabindex="-1" role="dialog" aria-hidden="true" id="addModal" @close="clearAll()">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-plus"></i>&nbsp;Create (Branch of Service)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <h6 class="control-label"><strong>BRANCH OF SERVICE (BOS):</strong></h6>
                                <input type="text" class="form-control" :class="{'is-invalid': formValidate.bos}" name="bos" v-model="newBOS.bos">
                                <p class="text-danger animate__animated animate__fadeIn" v-if="formValidate.bos" v-html="formValidate.bos"></p>
                            </div>
                            <div class="form-group">
                                <h6 class="control-label"><strong>DESCRIPTION:</strong></h6>
                                <textarea cols="35" rows="5" :class="{'is-invalid': formValidate.description}" name="description" v-model="newBOS.description" class="form-control"></textarea>
                                <p class="text-danger animate__animated animate__fadeIn" v-if="formValidate.description" v-html="formValidate.description"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times" ></i> Cancel</button>
                <button class="btn btn-warning" @click="addBOS"><i class="fas fa-plus"></i> Create</button>
            </div>
        </div>
    </div>
</modal>


<!-- more details modal -->
<modal class="modal animate__animated animate__fadeIn" id="detailModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-eye"></i>&nbsp;&nbsp;Details (Branch of Service)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="control-label"><strong>USER ID NUMBER:</strong></h6>
                            <label style="color:black;" class="form-control">{{currentBOS.id}}</label><br>
                            <h6 class="control-label"><strong>BRANCH OF SERVICE (BOS):</strong></h6>
                            <label style="color:black;" class="form-control">{{currentBOS.bos}}</label><br>
                            <h6 class="control-label"><strong>DESCRIPTION:</strong></h6>
                            <label style="color:black;" class="form-control">{{currentBOS.description}}</label><br>
                        </div>
                        <div class="col-md-6">
                            <h6 class="control-label"><strong>ACTIVITIES:</strong></h6>
                            <label style="color:blue;" class="form-control">created:&nbsp;{{currentBOS.date_created}}</label>
                            <label style="color:red;" class="form-control">updated:&nbsp;{{currentBOS.date_modified}}</label>
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
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-pen"></i>&nbsp;&nbsp;Edit (Branch of Service)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <h6 class="control-label"><strong>BRANCH OF SERVICE (BOS):</strong></h6>
                                <input type="text" class="form-control" :class="{'is-invalid': formValidate.bos}" name="bos" v-model="chooseBOS.bos">
                                <p class="text-danger animate__animated animate__fadeIn" v-if="formValidate.bos" v-html="formValidate.bos"></p>
                            </div>
                            <div class="form-group">
                                <h6 class="control-label"><strong>DESCRIPTION:</strong></h6>
                                <textarea cols="35" rows="5" :class="{'is-invalid': formValidate.description}" name="description" v-model="chooseBOS.description" class="form-control">
                                {{chooseBOS.description}}
                                </textarea>
                                <p class="text-danger animate__animated animate__fadeIn" v-if="formValidate.description" v-html="formValidate.description"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Cancel</button>
                <button class="btn btn-success" @click="updateBOS"><i class="fas fa-pen"></i> Update</button>
            </div>
        </div>
    </div>
</modal>