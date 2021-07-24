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
                            <input placeholder="Search Users Here" type="search" class="search-form-control" v-model="search.text" @keyup="searchUser" name="search">
                        </form>
                    </div>
                    <div class="text-right float-right add-button">
                        <button class="btn btn-danger" data-toggle="modal" data-target="#addNewUserAccountModal"><i class="fas fa-plus"></i>&nbsp; CREATE NEW ACCOUNT</button>
                    </div>
                </div>
                <!-- card body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>AFPOS</th>
                                    <th>DESCRIPTION</th>
                                    <th>DATE CREATED</th>
                                    <th>DATE MODIFIED</th>
                                    <th width="20%" >ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="afpos in afpos">
                                    <td>{{user.nos}}</td>
                                    <td>{{user.username}}</td>
                                    <td>{{user.userlevel}}</td>
                                    <!-- <td><a href="edit-teacher.html" class="btn btn-sm bg-success mr-2"><i class="fas fa-pen"></i> Change</a></td> -->
                                    <td>
                                        <button v-bind:class="user.status == 'Active' ? 'btn btn-sm bg-success' : 'btn btn-sm bg-danger'" type="button">{{user.status}}</button>
                                    </td>
                                    <td class="">
                                        <button class="btn btn-sm bg-info" data-toggle="modal" data-target="#moreDetailsModal" v-on:click="setUserMoreDetails(user)">
                                            <i class="fas fa-eye"></i> MORE DETAILS
                                        </button>
                                        <a href="edit-teacher.html" class="btn btn-sm bg-success mr-2"><i class="fas fa-pen"></i> EDIT</a>
                                        <a href="#" class="btn btn-sm bg-danger"><i class="fas fa-trash"></i> DELETE</a>
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

            <?php include 'modals/references/modal_afpos.php'; ?>
        </div>
        <!-- END id="app" -->

    </div>			
</div>


<script src="<?php echo base_url();?>/assets/js/pagination.js"></script>





