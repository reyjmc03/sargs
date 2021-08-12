<div class="row">
    <div class="col-sm-12">

        <!-- START id="app" -->
        <div id="app">
            <transition
                enter-active-class="animated fadeInLeft"
                     leave-active-class="animated fadeOutRight">
                     <div class="notification is-success text-center px-5 top-middle" v-if="successMSG" @click="successMSG = false">{{successMSG}}</div>
            </transition>

            
            <div class="card">
                <!-- card header -->
                <div class="card-header">
                    <div class="float-left">
                        <form class="search-box">
                            <!-- <input type="text" class="search-form-control" placeholder="Search here">
                            <button class="btn search-button" type="submit"><i class="fas fa-search"></i></button> -->
                            <input placeholder="Search Here" type="search" class="search-form-control" v-model="search.text" @keyup="searchRank" name="search">
                        </form>
                    </div>
                    <div class="text-right float-right add-button">
                        <button class="btn btn-warning" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus"></i>&nbsp; CREATE NEW RANK</button>
                        <button class="btn btn-danger" id="sargs-delete-all" name="sargs-delete-all" @click="deleteAll()"><i class="fas fa-trash"></i> DELETE ALL RANKS</button>
                    </div>
                </div>
                <!-- card body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>RANK</th>
                                    <th>DESCRIPTION</th>
                                    <th>CATEGORY</th>
                                    <th width="15%">DATE / TIME OF ACTIVITY</th>
                                    <th width="20%" >ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="rank in ranks">
                                    <td>{{rank.nos}}</td>
                                    <td>{{rank.rank}}</td>
                                    <td>{{rank.description}}</td>
                                    <td>{{rank.category}}</td>
                                    <td>
                                        <!-- <div v-if="rank.date_created"> --><label style="color:blue;">created:&nbsp;{{rank.date_created}}</label><!-- </div> --><br>
                                        <div v-if="rank.date_modified"><label style="color:red;">updated:&nbsp;{{rank.date_modified}}</label></div>
                                    </td>
                                    <td class="">
                                        <button class="btn btn-sm bg-info" data-toggle="modal" data-target="#detailModal" v-on:click="setCurrentRank(rank)">
                                            <i class="fas fa-eye"></i> MORE DETAILS
                                        </button>
                                        <button class="btn btn-sm bg-success" data-toggle="modal" data-target="#editModal" v-on:click="setChooseRank(rank)">
                                            <i class="fas fa-pen"></i> EDIT
                                        </button>
                                        <button class="btn btn-sm bg-danger" @click="deleteOne(rank.id)">
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

            <?php include 'modals/references/modal_ranks.php'; ?>
        </div>
        <!-- END id="app" -->

    </div>			
</div>


<script src="<?php echo base_url();?>/assets/js/pagination.js"></script>

<script type="text/javascript">
// const newLocal = `

//     `;

// Vue.component('modal',{ //modale
//     template:newLocal
// })

var v = new Vue({
    el: '#app',
    data: {
        url: '<?php echo base_url(); ?>',
        addModal: false,
        editModal: false,
        deleteModal:false,
        ranks: [],
        search: { text: '' },
        emptyResult: false,
        searchQuery: null,
        newRank: {
            rank:'', 
            description:'', 
            category:''
        },
        chooseRank:{},
        formValidate:[],
        successMSG:'',

        //pagination
        currentPage:0,
        rowCountPage:8,
        totalRows:0,
        pageRange:3,
        sortBy: 'nos',

        currentRank: {},
        modalRank: {},
    },
    created() {
        this.showAll();
    },
    methods: {
        //generate datatable using vuejs
        showAll(){
            //axios.get('<?php //echo base_url(); ?>api/ranks/show_all').then(function(response){
            axios.get(this.url + "api/ranks/show_all").then(function(response){
                if(response.data.ranks == null) {
                    v.noResult()
                } 
                else {
                    v.getData(response.data.ranks);
                }
            })
        },
        // to search a rank
        searchRank() {
            var formData = v.formData(v.search);
            axios.post(this.url + "api/ranks/search", formData).then(function(response){
                if(response.data.ranks == null){
                    v.noResult()
                }else{
                    v.getData(response.data.ranks); 
                }  
            })
        },
        // add new rank
        addRank() {
           var formData = v.formData(v.newRank);

            // confirmation
            swal({
                title:'Added!',
                text: "A new rank has been created.",
                type: 'success',
                icon: 'success', 
            }).then((result) => {
                axios.post(this.url + "api/ranks/add", formData)
                // this.showAll();
                // location.reload();
                $('#addModal').modal('hide');
                v.clearAll();
            });
        },
        // update rank
        updateRank() {
            var formData = v.formData(v.chooseRank); 
            let inst = this;
            swal({title: 'Are you sure?',
                text: "Data is edit permanently!",
                icon:'information', 
                buttons: true, 
                dangerMode: true
            }).then((willOUT) => {
                if (willOUT) {
                    // confirmation
                    swal({
                        title:'Updated!',
                        text: "Rank has been updated.",
                        type: 'success',
                        icon: 'success', 
                    }).then((result) => {
                        // edit
                        axios.post(this.url + "api/ranks/update", formData);
                        v.clearAll();
                        v.clearMSG();
                        this.showAll();
                        location.reload();
                    });
                }
            });
        }, 
        // to delete all ranks
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
                        text: "All ranks has been deleted.",
                        type: 'success',
                        icon: 'success', 
                    }).then((result) => {
                        axios.delete(this.url + "api/ranks/delete_all")
                        this.showAll();
                        location.reload();
                    });
                }
            });
        },
        // formdata
        formData(obj) {
            var formData = new FormData();
            for(var key in obj) {
                formData.append(key, obj[key]);
            }
            return formData;
        },
        // to delete one rank
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
                        text: "Rank has been deleted.",
                        type: 'success',
                        icon: 'success', 
                    }).then((result) => {
                        axios.delete(this.url + "api/ranks/delete_only/" + id)
                        this.showAll();
                        location.reload();
                    });
                }
            });
        },
        getData(ranks){
            v.emptyResult = false; // become false if has a record
            v.totalRows = ranks.length //get total of rows
            v.ranks = ranks.slice(v.currentPage * v.rowCountPage, (v.currentPage * v.rowCountPage) + v.rowCountPage); //slice the result for pagination
            
             // if the record is empty, go back a page
            if(v.ranks.length == 0 && v.currentPage > 0){ 
                v.pageUpdate(v.currentPage - 1)
                v.clearAll();  
            }
        },
        selectRank(rank){
            v.chooseRank = rank;
        },
        clearMSG() {
            setTimeout(function() {
                v.successMSG = ''
            }, 3000); // disapprearing message success in 2 secs
        },
        clearAll(){
            v.newRank = { rank:'', description:'', category:'' };
            v.chooseRank = { rank:'', description:'', category:'' };
            v.formValidate = false;
            v.addModal = false;
            v.editModal = false;
            v.deleteModal = false;
            v.refresh()
        },
        noResult(){
            v.emptyResult = true;  // become true if the record is empty, print 'No Record Found'
            v.ranks = null 
            v.totalRanks = 0 //remove current page if is empty
        },
        pageUpdate(pageNumber){
              v.currentPage = pageNumber; //receive currentPage number came from pagination template
                v.refresh()  
        },
        // refresh(){
        //      v.search.text ? v.searchRank() : v.showAll(); //for preventing
        // },
        showModal() {
            let element = this.$refs.modal.$el
            $(element).modal('show')
        },

        // for view details button
        setCurrentRank: function(rank) {
            this.currentRank = rank
        },
        // for edit
        setChooseRank: function(rank) {
            this.chooseRank = rank
        },
        setRankMoreDetails: function(rank) {
            this.modalRank = rank
        },
        refresh() {
            v.search.text ? v.searchRank() : v.showAll(); // preventing
        },
    }
})
</script>




