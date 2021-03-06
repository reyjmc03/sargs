<div class="row">
    <div class="col-sm-12">

        <!-- START id="app" -->
        <div id="app">
        <div class="loading" v-if="loading">
                Loading....
            </div>
            <div class="card">
                <!-- card header -->
                <div class="card-header">
                    <div class="float-left">
                        <form class="search-box">
                            <?php //<input type="search" class="search-form-control" v-model="searchQuery" placeholder="Search Activity Logs Here"> ?>
                            <!-- <input placeholder="Search Activity Logs Here" type="search" class="search-form-control" v-model="search.text" @keyup="searchLog" name="search"> -->
                            <br>
                            <?php //<button class="btn search-button" type="submit"><i class="fas fa-search"></i></button> ?>
                            <?php //<a href="" class="btn btn-success"><i class="fas fa-search"></i> Search</a> ?>
                        </form>
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
                                    <th width="15%">ACTIVITY</th>
                                    <th width="10%">IP ADDRESS</th>
                                    <th width="15%">DATE / TIME OF ACTIVITY (Created)</th>
                                    <th width="15%">DATE / TIME OF ACTIVITY (Updated)</th>
                                    <th width="10%">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="log in logs">
                                    <td>{{log.nos}}</td>
                                    <td>{{log.activity}}</td>
                                    <td>{{log.ip}}</td>
                                    <td>
                                        <label style="color:blue;">created:&nbsp;{{log.created_date}}</label><br>
                                    </td>
                                    <td>
                                        <label style="color:red;">updated:&nbsp;{{log.updated_date}}</label>
                                    </td>
                                    <td class="">
                                        <button class="btn btn-sm bg-info" data-toggle="modal" data-target="#activityLogModal" v-on:click="setCurrentActivityLog(log)">
                                            <i class="fas fa-eye"></i> MORE DETAILS
                                        </button>
                                    </td>
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

            <?php include 'modals/references/modal_user-profile-logs.php';?>
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
        deleteModal:false,
        logs:[],
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
        sortBy: 'userinfo',

        currentActivityLog: {}
    },
    created() {
        this.showAll();
    },
    methods: {
        // loading
        
        // generate datatable using vuejs
        showAll(){
            axios.get('<?php echo base_url(); ?>api/logs/show_by_user_log/<?php echo $userData->id; ?>').then(function(response){
                if(response.data.logs == null) {
                    v.noResult()
                } 
                else {
                    v.getData(response.data.logs);
                }
            })
        },
        // to search logs
        searchLog(){
            var formData = v.formData(v.search);
            axios.post('<?php echo base_url(); ?>api/logs/search_user_log/<?php echo $userData->id; ?>', formData).then(function(response){
                if(response.data.logs == null){
                    v.noResult()
                }else{
                    v.getData(response.data.logs); 
                }  
            })
        },
        // to delete all log
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
                        text: "Activity logs has been deleted.",
                        type: 'success',
                        icon: 'success', 
                    }).then((result) => {
                        axios.delete('<?php echo base_url(); ?>api/logs/delete_log_all')
                        this.showAll();
                        location.reload();
                    });
                }
            });
        },
        // to delete one log
        // deleteOne(id) {
        //     let inst = this;
        //     swal({title: 'Are you sure?',
        //         text: "You won't be able to revert this!",
        //         icon:'warning', 
        //         buttons: true, 
        //         dangerMode: true
        //     }).then((willOUT) => {
        //         if (willOUT) {
        //             // confirmation
        //             swal({
        //                 title:'Deleted!',
        //                 text: "Activity logs has been deleted.",
        //                 type: 'success',
        //                 icon: 'success', 
        //             }).then((result) => {
        //                 axios.delete('<?php echo base_url(); ?>api/logs/delete_log_only/' + id)
        //                 this.showAll();
        //                 location.reload();
        //             });
        //         }
        //     });
        // },
        formData(obj){
			var formData = new FormData();
		      for ( var key in obj ) {
		          formData.append(key, obj[key]);
		      } 
		      return formData;
		},
        getData(logs){
            v.emptyResult = false; // become false if has a record
            v.totalRows = logs.length //get total of rows
            v.logs = logs.slice(v.currentPage * v.rowCountPage, (v.currentPage * v.rowCountPage) + v.rowCountPage); //slice the result for pagination
            
             // if the record is empty, go back a page
            if(v.logs.length == 0 && v.currentPage > 0){ 
                v.pageUpdate(v.currentPage - 1)
                v.clearAll();  
            }
        },
        selectLog(log){
            v.chooseLog = log; 
        },
        clearAll() {
            v.newLog = {},
            v.formValidate = false,
            v.refresh()
        },
        noResult(){
            v.emptyResult = true;  // become true if the record is empty, print 'No Record Found'
            v.logs = null 
            v.totalLogs = 0 //remove current page if is empty
        },
        pageUpdate(pageNumber){
              v.currentPage = pageNumber; //receive currentPage number came from pagination template
                v.refresh()  
        },
        refresh(){
             v.search.text ? v.searchUser() : v.showAll(); //for preventing
        },
        showModal() {
            let element = this.$refs.modal.$el
            $(element).modal('show')
        },
        setCurrentActivityLog: function(log) {
            this.currentActivityLog = log
        },
        refresh() {
            v.search.text ? v.searchUser() : v.showAll(); // preventing
        }
    } 
})
</script>



