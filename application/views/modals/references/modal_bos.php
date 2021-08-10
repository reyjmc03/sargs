<!-- add BOS Modal -->
<modal class="modal animate__animated animate__fadeIn" tabindex="-1" role="dialog" aria-hidden="true" id="addModal" @close="clearAll()">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-plus"></i>&nbsp; Create New BOS</h5>
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