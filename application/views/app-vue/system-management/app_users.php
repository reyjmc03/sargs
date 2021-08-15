<script type="text/javascript">
// tables and modal functions
var v = new Vue({
    el: '#app',
    data: {
        url: '<?php echo base_url(); ?>',
        addModal: false,

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

        currentUser: {},
        modalUser: {},
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
        searchUser() {
            var formData = v.formData(v.search);
            axios.post('<?php echo base_url(); ?>api/users/search_user', formData).then(function(response){
                if(response.data.logs == null){
                    v.noResult()
                }else{
                    v.getData(response.data.logs); 
                }  
            })
        },
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
            v.newUser = {};
            v.formValidate = false;
            v.addModal = false;
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
        setUserMoreDetails: function(user) {
            this.modalUser = user
        },
        refresh() {
            v.search.text ? v.searchUser() : v.showAll(); // preventing
        },
    }
})
</script>
