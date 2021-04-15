<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   ..
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
            </div>

<!--delete modal-->
<modal v-if="moreDetailsModal" @close="clearAll()">
    <h3 slot="head">Delete</h3>
    <div slot="body" class="text-center">Do you want to delete this record?</div>
    <div slot="foot">
        <button class="btn btn-dark" @click="deleteModal = false; deleteUser()" >Delete</button>
        <button class="btn" @click="deleteModal = false">Cancel</button>
    </div>
</modal>