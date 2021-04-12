<div class="row">
    <div class="col-sm-12">

        <div id="app">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <form class="search-box">
                            <input type="text" class="search-form-control" placeholder="Search Activity Logs Here">
                            <button class="btn search-button" type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                    <div class="text-right float-right add-button">
                        <!-- <a href="#" class="btn btn-outline-primary mr-2"><i class="fas fa-download"></i> Download</a> -->
                        <a href="" class="btn btn-danger"><i class="fas fa-trash"></i> Delete All Activity Logs</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <!-- <table id="" class="datatable table table-stripped dataTable no-footer"> -->
                        <table id="" class="table table-stripped">
                            <thead>
                                <tr>
                                    <th width="17%">USERS</th>
                                    <th width="20%">ACTIVITY</th>
                                    <th width="20%">IP ADDRESS</th>
                                    <th width="20%">CREATED AT</th>
                                    <th width="23%">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="log in logs">
                                    <td>{{log.userid}}</td>
                                    <td>asdasdas asdasda asdasdasdas</td>
                                    <td>192.0.0.1</td>
                                    <td>asdasdasd</td>
                                    <td class="">
                                        <a href="" class="btn btn-sm bg-info"><i class="fas fa-eye"></i> More Details</a>
                                        <a href="" class="btn btn-sm bg-success"><i class="fas fa-pen"></i> Edit</a>
                                        <a href="#" class="btn btn-sm bg-danger"><i class="fas fa-trash"></i> Delete</a>
                                    </td>
                                </tr>
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>			
</div>


<script type="text/javascript">
var v = new Vue({
    el: '#app',
    data: {
        url: '<?php echo base_url(); ?>',
        logs:[],
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
                    console.log(response.data.logs);
                }
            })
        },
        getData(logs){
            v.emptyResult = false; // become false if has a record
            v.totalLogs = logs.length //get total of user
            v.logs = logs.slice(v.currentPage * v.rowCountPage, (v.currentPage * v.rowCountPage) + v.rowCountPage); //slice the result for pagination
            
             // if the record is empty, go back a page
            if(v.logs.length == 0 && v.currentPage > 0){ 
                v.pageUpdate(v.currentPage - 1)
                v.clearAll();  
            }
        },

    }
})
</script>

<script type="text/javascript">
// $(document).ready( function () {
//     $('#sargs-table').DataTable();
// });
</script>


