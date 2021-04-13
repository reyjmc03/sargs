<div class="row">
    <div class="col-sm-12">

        <div id="app">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <form class="search-box">
                            <input type="text" class="search-form-control" placeholder="Search Activity Logs Here">
                            <!-- <button class="btn search-button" type="submit"><i class="fas fa-search"></i></button> -->
                            <a href="" class="btn btn-success"><i class="fas fa-search"></i> Search</a>
                        </form>
                    </div>
                    <div class="text-right float-right add-button">
                        <!-- <a href="#" class="btn btn-outline-primary mr-2"><i class="fas fa-download"></i> Download</a> -->
                        <a href="" class="btn btn-danger"><i class="fas fa-trash"></i> Delete All Activity Logs</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="sargs-table" class="table table-striped mb-0">
                        <!-- <table id="" class="table table-stripped"> -->
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="15%">USERS</th>
                                    <th width="20%">ACTIVITY</th>
                                    <th width="20%">IP ADDRESS</th>
                                    <th width="20%">CREATED AT</th>
                                    <th width="20%">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="log in logs">
                                    <td>{{log.id}}</td>
                                    <td>{{log.firstname}} {{log.middlename}} {{log.lastname}} {{log.suffixname}} ({{log.username}})</td>
                                    <td>{{log.activity}}</td>
                                    <td>{{log.ip}}</td>
                                    <td>{{log.datecreated}}</td>
                                    <td class="">
                                        <a href="" class="btn btn-sm bg-info"><i class="fas fa-eye"></i> More Details</a>
                                        <!-- <a href="" class="btn btn-sm bg-success"><i class="fas fa-pen"></i> Edit</a> -->
                                        <a href="#" class="btn btn-sm bg-danger"><i class="fas fa-trash"></i> Delete</a>
                                    </td>
                                </tr>
                                <tr v-if="emptyResult">
                                    <td colspan="6"  class="text-center h4" style="color:red;">No Record Found!</td>
                                </tr>
                            
                            </tbody>
                        </table>
                        <hr>
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

    </div>	
</div>

<script src="<?php echo base_url();?>/assets/js/pagination.js"></script>


<script type="text/javascript">
// tables and modal functions
var v = new Vue({
    el: '#app',
    data: {
        url: '<?php echo base_url(); ?>',
        logs:[],
        search: {text: ''},
        emptyResult:false,

        //pagination
        currentPage: 0,
        rowCountPage:8,
        totalRows:0,
        pageRange:4
    },
    created() {
        this.showAll();
    },
    methods: {
        showAll(){
            axios.get('<?php echo base_url(); ?>logs/show_all_logs').then(function(response){
                if(response.data.logs == null) {
                    v.noResult()
                } else {
                    v.getData(response.data.logs);
                    //console.log(response.data.logs);
                }
            })
        },
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
        noResult(){
            v.emptyResult = true;  // become true if the record is empty, print 'No Record Found'
            v.users = null 
            v.totalUsers = 0 //remove current page if is empty
       
        },
        pageUpdate(pageNumber){
              v.currentPage = pageNumber; //receive currentPage number came from pagination template
                v.refresh()  
        },
        refresh(){
             v.search.text ? v.searchUser() : v.showAll(); //for preventing
            
        }

    }
})
</script>

<script type="text/javascript">
// $(document).ready( function () {
//     $('#sargs-table').DataTable();
// });
</script>


