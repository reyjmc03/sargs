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
                            <input placeholder="Search Activity Logs Here" type="search" class="search-form-control" v-model="search.text" @keyup="searchLog" name="search">
                        </form>
                    </div>
                    <div class="text-right float-right add-button">
                        <button class="btn btn-danger" id="sargs-delete-all" name="sargs-delete-all" @click="deleteAll()"><i class="fas fa-trash"></i> DELETE ALL ACTIVITY LOGS</button>
                    </div>
                </div>
                <!-- card body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="sargs-table" class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="15%">USERS</th>
                                    <th width="10%">USER ACCOUNT</th>
                                    <th width="10%">IP ADDRESS</th>
                                    <th width="15%">DATE / TIME OF ACTIVITY</th>
                                    <th width="15%">REMARKS</th>
                                    <th width="13%">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="log in logs">
                                    <td>{{log.nos}}</td>
                                    <td>{{log.rank}}&nbsp;{{log.firstname}}&nbsp;{{log.middlename}}&nbsp;{{log.lastname}}{{log.suffixname == null ? '' : '&nbsp;' + log.suffixname}}{{log.afpsn== null ? '' : '&nbsp;' + log.afpsn}}{{log.afpos== null ? '' : '&nbsp;' + log.afpos}}{{log.bos== null ? '' : '&nbsp;' + log.bos}}</td>
                                    <td>{{log.username}}</td>
                                    <td>{{log.ip}}</td>
                                    <td>
                                        <label style="color:blue;">created:&nbsp;{{log.created_date}}</label><br>
                                        <label style="color:red;">updated:&nbsp;{{log.updated_date}}</label>
                                    </td>
                                    <td>{{log.activity}}</td>
                                    <td class="">
                                        <button class="btn btn-sm bg-info" data-toggle="modal" data-target="#activityLogModal" v-on:click="setCurrentActivityLog(log)">
                                            <i class="fas fa-eye"></i> MORE DETAILS
                                        </button>
                                
                                        <!-- <a href="" class="btn btn-sm bg-success"><i class="fas fa-pen"></i> Edit</a> -->
                                        <button class="btn btn-sm bg-danger" @click="deleteOne(log.id)">
                                            <i class="fas fa-trash"></i> DELETE
                                        </button>
                                    </td>
                                </tr>
                                <tr v-if="emptyResult">
                                    <td colspan="7"  class="text-center h4" style="color:red;">No Record Found!</td>
                                </tr>
                            
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- card footer -->
                <div class="card-footer">
                <?php include 'includes/pagination.php'; ?>
                </div>
            </div>

            <?php include 'modals/system-management/modal_activity_logs.php';?>
        </div>
        <!-- END id="app" -->

    </div>	
</div>



<script src="<?php echo base_url();?>/assets/js/pagination.js"></script>
<?php include 'app-vue/system-management/app_logs.php'; ?>



