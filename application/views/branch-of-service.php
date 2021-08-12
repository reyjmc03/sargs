<div class="row">
    <div class="col-sm-12">

        <!-- START id="app" -->
        <div id="app">
            <div class="card">
                <!-- card header -->
                <div class="card-header">
                    <div class="float-left">
                        <form class="search-box">
                            <!-- <input type="text" class="search-form-control" placeholder="Search here">
                            <button class="btn search-button" type="submit"><i class="fas fa-search"></i></button> -->
                           
                            <input placeholder="Search Here" type="search" class="search-form-control" v-model="search.text" @keyup="searchBOS" name="search">
                        </form>
                    </div>
                    <div class="text-right float-right add-button">
                        <button class="btn btn-warning" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus"></i>&nbsp; CREATE NEW BOS</button>
                        <button class="btn btn-danger" id="sargs-delete-all" name="sargs-delete-all" @click="deleteAll()"><i class="fas fa-trash"></i> DELETE ALL BOS</button>
                    </div>
                </div>
                <!-- card body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>BOS</th>
                                    <th>DESCRIPTION</th>
                                    <th>DATE / TIME OF ACTIVITY</th>
                                    <th width="20%" >ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="bos in boss">
                                    <td>{{bos.nos}}</td>
                                    <td>{{bos.bos}}</td>
                                    <td>{{bos.description}}</td>
                                    <td>
                                        <!-- <div v-if="rank.date_created"> --><label style="color:blue;">created:&nbsp;{{bos.date_created}}</label><!-- </div> --><br>
                                        <div v-if="bos.date_modified"><label style="color:red;">updated:&nbsp;{{bos.date_modified}}</label></div>
                                    </td>
                                    <td class="">
                                        <!-- <button class="btn btn-sm bg-info" data-toggle="modal" data-target="#detailBOSModal" v-on:click="setCurrentBOS(bos)">
                                            <i class="fas fa-eye"></i> MORE DETAILS
                                        </button> -->
                                        <button class="btn btn-sm bg-info" data-toggle="modal" data-target="#detailModal" v-on:click="setCurrentBOS(bos)">
                                            <i class="fas fa-eye"></i> MORE DETAILS
                                        </button>
                                        <button class="btn btn-sm bg-success" data-toggle="modal" data-target="#editModal" v-on:click="setChooseBOS(bos)">
                                            <i class="fas fa-pen"></i> EDIT
                                        </button>
                                        <button class="btn btn-sm bg-danger" @click="deleteOne(bos.id)">
                                            <i class="fas fa-trash"></i> DELETE
                                        </button>
                                    </td>
                                </tr>

                                <!-- empty result -->
                                <tr v-if="emptyResult">
                                    <td colspan="7"  class="text-center h4" style="color:red;">No Record Found!</td>
                                </tr>
                            
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- card footer -->
                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <div class="dataTables_info" >Found: <label style="color:red;">{{ this.totalRows }}</label> total entries.</div>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <pagination 
                                :current_page="currentPage" 
                                :row_count_page="rowCountPage" 
                                @page-update="pageUpdate" 
                                :total_rows="totalRows" 
                                :page_range="pageRange"
                            >
                            </pagination>
                        </div>
                    </div>
                </div>
            </div>

            <?php include 'modals/references/modal_bos.php'; ?>
        </div>
        <!-- END id="app" -->

    </div>			
</div>


<script src="<?php echo base_url();?>/assets/js/pagination.js"></script>

<script type="text/javascript">
var v = new Vue({
    el: '#app',
    data: {
        url: '<?php echo base_url(); ?>',
        addModal: false,
        editModal: false,
        deleteModal: false,
        boss: [],
        search: {
            text: ''
        },
        emptyResult: false,
        searchQuery: null,
        newBOS: {
            bos: '',
            description: '',
        },
        chooseBOS: {},
        formValidate: [],
        successMSG: '',

        // pagination
        currentPage: 0,
        rowCountPage: 8,
        totalRows: 0,
        pageRange: 3,
        sortBy: 'nos',

        currentBOS: {},
        modalBOS: {},
    },
    created() {
        this.showAll();
    },
    methods: {
        // generate datatable using vuejs
        showAll() {
            axios.get(this.url + "api/bos/show_all").then(function(response){
                if(response.data.boss == null) {
                    v.noResult()
                } 
                else {
                    v.getData(response.data.boss)
                }
            })
        },
        // to search a bos
         searchBOS() {
            var formData = v.formData(v.search);
            axios.post(this.url + "api/bos/search", formData).then(function(response){
                if(response.data.boss == null){
                    v.noResult()
                }else{
                    v.getData(response.data.boss); 
                }  
            })
        },
        // TO ADD NEW BRANCH OF SERVICE OF THE PERSONNEL.
        addBOS() {
            var formData = v.formData(v.newBOS);

            axios.post(this.url + "api/bos/add", formData).then(function(response){
                if(response.data.error){
                    v.formValidate = response.data.msg;
                } else {
                    // confirmation
                    swal({
                        title:'Added!',
                        text: "A new branch of services has been created.",
                        type: 'success',
                        icon: 'success', 
                    }).then((result) => {
                        $('#addModal').modal('hide');
                        v.clearAll();
                    });

                    
                }
            })
        },
        // TO DELETE ALL DATA PERMANENTLY!
        deleteAll() {
            let inst = this;
            swal({title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon:'warning', 
                buttons: true, 
                dangerMode: true
            }).then((willOUT) => {
                if (willOUT) {
                    // confirmation
                    swal({
                        title:'Deleted!',
                        text: "All branch of services has been deleted.",
                        type: 'success',
                        icon: 'success', 
                    }).then((result) => {
                        axios.delete(this.url + "api/bos/delete_all")
                        // this.showAll();
                        // location.reload();
                        //$('#addModal').modal('hide');
                        v.clearAll();
                    });
                }
            });
        },
        // TO DELETE ONE BRANCH OF SERVICE
        deleteOne(id) {
            let inst = this;
            swal({title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon:'warning', 
                buttons: true, 
                dangerMode: true
            }).then((willOUT) => {
                if (willOUT) {
                    // confirmation
                    swal({
                        title:'Deleted!',
                        text: "Branch of servce has been deleted.",
                        type: 'success',
                        icon: 'success', 
                    }).then((result) => {
                        axios.delete(this.url + "api/bos/delete_only/" + id)
                        // this.showAll();
                        // location.reload();
                        //$('#addModal').modal('hide');
                        v.clearAll();
                    });
                }
            });
        },
        // TO UPDATE
        updateBOS() {
            var formData = v.formData(v.chooseBOS);
            let inst = this;

           

            swal({title: 'Are you sure?',
                text: "Data is edit permanently!",
                icon:'warning', 
                buttons: true, 
                dangerMode: true
            }).then((willOUT) => {
                if (willOUT) {
                    axios.post(this.url + "api/bos/update", formData).then(function(response){
                        if(response.data.error){
                            v.formValidate = response.data.msg;
                        } else {
                             // confirmation
                            swal({
                                title:'Updated!',
                                text: "BOS has been updated.",
                                type: 'success',
                                icon: 'success', 
                            }).then((result) => {
                                $('#editModal').modal('hide');
                                v.clearAll();
                            });
                        }
                    })
                }
            });
        },


        ///////////////////////////
        //////////////////////////
        /////////////////////////
        // formdata
        formData(obj) {
            var formData = new FormData();
            for(var key in obj) {
                formData.append(key, obj[key]);
            }
            return formData;
        },
        getData(boss){
            v.emptyResult = false; // become false if has a record
            v.totalRows = boss.length //get total of rows
            v.boss = boss.slice(v.currentPage * v.rowCountPage, (v.currentPage * v.rowCountPage) + v.rowCountPage); //slice the result for pagination
            
             // if the record is empty, go back a page
            if(v.boss.length == 0 && v.currentPage > 0){ 
                v.pageUpdate(v.currentPage - 1)
                v.clearAll();  
            }
        },
        selectBOS(bos){
            v.chooseBOS = bos;
        },
        clearMSG() {
            setTimeout(function() {
                v.successMSG = ''
            }, 3000); // disapprearing message success in 2 secs
        },
        clearAll(){
            v.newBOS = { bos:'', description:'' };
            v.chooseBOS = { bos:'', description:'' };
            v.formValidate = false;
            v.addModal = false;
            v.addModal.show = false;
            v.editModal = false;
            v.deleteModal = false;
            v.refresh()
        },
        noResult(){
            v.emptyResult = true;  // become true if the record is empty, print 'No Record Found'
            v.boss = null 
            v.totalBOS = 0 //remove current page if is empty
        },
        pageUpdate(pageNumber){
              v.currentPage = pageNumber; //receive currentPage number came from pagination template
                v.refresh()  
        },
        // refresh(){
        //      v.search.text ? v.searchBOS() : v.showAll(); //for preventing
        // },
        showModal() {
            let element = this.$refs.modal.$el
            $(element).modal('show')
        },

        // for view details button
        setCurrentBOS: function(bos) {
            this.currentBOS = bos
        },
        // for edit
        setChooseBOS: function(bos) {
            this.chooseBOS = bos
        },
        setBOSMoreDetails: function(bos) {
            this.modalBOS = bos
        },
        refresh() {
            v.search.text ? v.searchBOS() : v.showAll(); // preventing
        },
    }
})
</script>






