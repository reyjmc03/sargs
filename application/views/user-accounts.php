<div class="row">
    <div class="col-sm-12">

        <!-- START id="app" -->
        <div id="app">
            <div class="card">
                <!-- card header -->
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
                                    <th width="5%">#</th>
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
                                    <td>{{user.nos}}</td>
                                    <td>{{user.userid}}</td>
                                    <td>{{user.rank}} {{user.firstname}} {{user.middlename}} {{user.lastname}} {{user.suffixname}}</td>
                                    <td>{{user.email}}</td>
                                    <td>{{user.username}}</td>
                                    <td>{{user.userlevel}}</td>
                                    <!-- <td><a href="edit-teacher.html" class="btn btn-sm bg-success mr-2"><i class="fas fa-pen"></i> Change</a></td> -->
                                    <td>{{user.status}}</td>
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
        users: [],
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

        currentUser: {}
    },
    created() {
        this.showAll();
    },
    methods: {
        //generate datatable using vuejs
        showAll(){
            axios.get('<?php echo base_url(); ?>api/users/show_all_users').then(function(response){
                if(response.data.users == null) {
                    v.noResult()
                } 
                else {
                    v.getData(response.data.users);
                    //console.log(response.data.users);
                }
            })
        },
        // to search a user

        formData(obj){
            var formData = new FormData();
            for(var key in obj) {
                formData.append(key, obj[key]);
            }
            return formData;
        },
        getData(users){
            v.emptyResult = false; // become false if has a record
            v.totalRows = users.length //get total of rows
            v.users = users.slice(v.currentPage * v.rowCountPage, (v.currentPage * v.rowCountPage) + v.rowCountPage); //slice the result for pagination
            
             // if the record is empty, go back a page
            if(v.users.length == 0 && v.currentPage > 0){ 
                v.pageUpdate(v.currentPage - 1)
                v.clearAll();  
            }
        },
        selectUser(user){
            v.chooseUser = user;
        },
        clearAll(){
            v.newUser = {},
            v.formValidate = false,
            v.refresh()
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
        },
        showModal() {
            let element = this.$refs.modal.$el
            $(element).modal('show')
        },
        setCurrentUser: function(user) {
            this.currentUser = user
        },
        refresh() {
            v.search.text ? v.searchUser() : v.showAll(); // preventing
        }
    }
})
</script>



