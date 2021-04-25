<div class="row">
    <div class="col-sm-12">

        <!-- START id="app" -->
        <div id="app">
        </div>
        <!-- END id="app" -->
        <div class="card">
            <div class="card-header">
                <div class="float-left">
                    <form class="search-box">
                        <input type="text" class="search-form-control" placeholder="Search here">
                        <button class="btn search-button" type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </div>
                <div class="text-right float-right add-button">
                    <!-- <a href="#" class="btn btn-outline-primary mr-2"><i class="fas fa-download"></i> Download</a> -->
                    <a href="add-teacher.html" class="btn btn-primary"><i class="fas fa-plus"></i> Add New User Account</a>
                </div>
            </div>
            <!-- card body -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead>
                            <tr>
                                <th>USER ID</th>
                                <th>FULLNAME</th>
                                <th>EMAIL ADDRESS</th>
                                <th>USERNAME</th>
                                <th>USER LEVEL</th>
                                <th>STATUS</th>
                                <th width="21%" >ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="user in users">
                                <td>test-001</td>
                                <td>asdasdas asdasda asdasdasdas</td>
                                <td>john@example.com</td>
                                <td>asdasdasd</td>
                                <td>ADMINISTRATOR <a href="edit-teacher.html" class="btn btn-sm bg-success mr-2"><i class="fas fa-pen"></i> Change</a></td>
                                <td>Active</td>
                                <td class="">
                                    <a href="edit-teacher.html" class="btn btn-sm bg-info mr-2"><i class="fas fa-eye"></i> More Details</a>
                                    <a href="edit-teacher.html" class="btn btn-sm bg-success mr-2"><i class="fas fa-pen"></i> Edit</a>
                                    <a href="#" class="btn btn-sm bg-danger"><i class="fas fa-trash"></i> Delete</a>
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




    </div>			
</div>


<script src="<?php echo base_url();?>/assets/js/pagination.js"></script>

<script type="text/javascript">
// tables and modal functions
// var v = new Vue({
//     el: '#app',
//     data: {

//     }
// })
</script>



