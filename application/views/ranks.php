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
                            <input placeholder="Search Ranks Here" type="search" class="search-form-control" v-model="search.text" @keyup="searchRank" name="search">
                        </form>
                    </div>
                    <div class="text-right float-right add-button">
                        <button class="btn btn-warning" data-toggle="modal" data-target="#addNewRankAccountModal"><i class="fas fa-plus"></i>&nbsp; CREATE NEW RANK</button>
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
                                    <th>DATE CREATED</th>
                                    <th>DATE MODIFIED</th>
                                    <th width="20%" >ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="rank in ranks">
                                    <td>{{rank.nos}}</td>
                                    <td>{{rank.rank}}</td>
                                    <td>{{rank.description}}</td>
                                    <td>{{rank.date_created}}</td>
                                    <td>{{rank.date_modified}}</td>
                                    <td class="">
                                        <button class="btn btn-sm bg-info" data-toggle="modal" data-target="#activityRankModal" v-on:click="setCurrentRank(rank)">
                                            <i class="fas fa-eye"></i> MORE DETAILS
                                        </button>
                                        <button class="btn btn-sm bg-success" data-toggle="modal" data-target="#editRankModal" v-on:click="setCurrentRank(rank)">
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
// tables and modal functions
var v = new Vue({
    el: '#app',
    data: {
        url: '<?php echo base_url(); ?>',
        addModal: false,
        deleteModal:false,
        ranks: [],
        search: {
            text: ''
        },
        emptyResult: false,
        searchQuery: null,

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
            axios.get('<?php echo base_url(); ?>api/ranks/show_all').then(function(response){
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
            axios.post('<?php echo base_url(); ?>api/ranks/search', formData).then(function(response){
                if(response.data.ranks == null){
                    v.noResult()
                }else{
                    v.getData(response.data.ranks); 
                }  
            })
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
                        axios.delete('<?php echo base_url(); ?>api/ranks/delete_all')
                        this.showAll();
                        location.reload();
                    });
                }
            });
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
                        axios.delete('<?php echo base_url(); ?>api/ranks/delete_only/' + id)
                        this.showAll();
                        location.reload();
                    });
                }
            });
        },
        formData(obj){
            var formData = new FormData();
            for(var key in obj) {
                formData.append(key, obj[key]);
            }
            return formData;
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
        clearAll(){
            v.newRank = {};
            v.formValidate = false;
            v.addModal = false;
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
        refresh(){
             v.search.text ? v.searchRank() : v.showAll(); //for preventing
        },
        showModal() {
            let element = this.$refs.modal.$el
            $(element).modal('show')
        },
        setCurrentRank: function(rank) {
            this.currentRank = rank
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




