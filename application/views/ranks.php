<div class="row">
    <div class="col-sm-12">

        <!-- START id="app" -->
        <div id="app">

            <div class="card">
                <!-- card header -->
                <div class="card-header">
                    <div class="float-left">
                        <form class="search-box">
                            <?php //<input type="search" class="search-form-control" v-model="searchQuery" placeholder="Search Activity Logs Here"> ?>
                            <input placeholder="Search Activity Logs Here" type="search" class="search-form-control" v-model="search.text" @keyup="searchRank" name="search">
                            <?php //<button class="btn search-button" type="submit"><i class="fas fa-search"></i></button> ?>
                            <?php //<a href="" class="btn btn-success"><i class="fas fa-search"></i> Search</a> ?>
                        </form>
                    </div>
                    <div class="text-right float-right add-button">
                        <button class="btn btn-danger" id="sargs-delete-all" name="sargs-delete-all" @click="deleteAll()"><i class="fas fa-trash"></i> DELETE ALL RANKS</button>
                    </div>
                </div>
                <!-- card body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="sargs-table" class="table table-striped mb-0">
                        <!-- <table id="" class="table table-stripped"> -->
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="15%">RANK</th>
                                    <th width="">RANK DESCRIPTION</th>
                                    <th width="">CATEGORY</th>
                                    <th width="15%">DATE / TIME OF ACTIVITY (created)</th>
                                    <th width="15%">DATE / TIME OF ACTIVITY (modified)</th>
                                    <!-- <th width="20%">ACTIONS</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="rank in ranks">
                                    <td>{{rank.nos}}</td>
                                    <td>{{rank.rank}}</td>
                                    <td>{{rank.description}}</td>
                                    <td>{{rank.category}}</td>
                                    <td>
                                        <label style="color:blue;">created:&nbsp;{{rank.date_created}}</label>
                                    </td>
                                    <td>
                                        <label style="color:red;">modified:&nbsp;{{rank.date_modified}}</label>
                                    </td>
                                    <!-- <td class="">
                                        <a href="edit-teacher.html" class="btn btn-sm bg-success mr-2"><i class="fas fa-pen"></i> EDIT</a>
                                
                                        <!-- <a href="" class="btn btn-sm bg-success"><i class="fas fa-pen"></i> Edit</a> -->
                                        <!-- <button class="btn btn-sm bg-danger" @click="deleteOne(rank.id)">
                                            <i class="fas fa-trash"></i> DELETE
                                        </button> -->
                                    <!-- </td> -->
                                </tr>
                                <tr v-if="emptyResult">
                                    <td colspan="7"  class="text-center h4" style="color:red;">No Record Found!</td>
                                </tr>
                            
                            </tbody>
                        </table>
                        <!-- <hr> -->
                        <!-- pagination -->
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

            <?php include 'modals/references/modal_ranks.php'?>
        </div>
        <!-- END id="app" -->

    </div>
</div>

<script src="<?php echo base_url();?>/assets/js/pagination.js"></script>



<script type="text/javascript">
// tables and model functions
var v = new Vue({
    el: '#app',
    data: {
        url: '<?php echo base_url(); ?>',
        deleteModal:false,
        ranks:[],
        loading: false,
        search: {
            text: ''
        },
        emptyResult:false,
        searchQuery: null,

        //pagination
        currentPage: 0,
        rowCountPage:8,
        totalRows:0,
        pageRange:3,
        sortBy: 'id',

        currentRank: {}
    },
    created() {
        this.showAll();
    },
    methods: {
        // loading

        // generate datatable using vuejs
        showAll(){
            axios.get('<?php echo base_url(); ?>api/ranks/show_all_ranks').then(function(response){
                if(response.data.ranks == null) {
                    v.noResult()
                } 
                else {
                    v.getData(response.data.ranks);
                    //v.getData(response.data.ranks);
                    //console.log(response.data.ranks);
                }
            })
        },
        // to search rank
        searchRank(){
            var formData = v.formData(v.search);
            axios.post('<?php echo base_url(); ?>api/ranks/search_rank', formData).then(function(response){
                if(response.data.ranks== null){
                    v.noResult()
                }else{
                    //v.getData(response.data.ranks); 
                }  
            })
        },
        // to delete all ranks
        deleteAll() {

        },
        deleteOne(id) {

        },
        formData(obj){
            var formData = new FormData();
            for ( var key in obj ) {
                formData.append(key, obj[key]);
            } 
            return formData;
        },
        getData(ranks){
            v.emptyResult = false; // become false if has a record
            v.totalRows = ranks.length //get total of rows
            v.ranks = ranks.slice(v.currentPage * v.rowCountPage, (v.currentPage * v.rowCountPage) + v.rowCountPage); //slice the result for pagination
            
             // if the record is empty, go back a page
            if(v.logs.length == 0 && v.currentPage > 0){ 
                v.pageUpdate(v.currentPage - 1)
                v.clearAll();  
            }
        },
        selectLog(rank){
            v.chooseRank = rank; 
        },
        clearAll() {
            v.newLRank = {},
            v.formValidate = false,
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
        refresh() {
            v.search.text ? v.searchRank() : v.showAll(); // preventing
        }
    }
})
</script>