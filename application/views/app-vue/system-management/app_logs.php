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
        sortBy: 'nos',

        currentActivityLog: {}
    },
    created() {
        this.showAll();
    },
    methods: {
        // loading
        
        // generate datatable using vuejs
        showAll(){
            //axios.get('<?php //echo base_url(); ?>api/logs/show_all_logs').then(function(response){
            axios.get(this.url + "api/logs/show_all_logs").then(function(response){
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
            //axios.post('<?php //echo base_url(); ?>api/logs/search_log', formData).then(function(response){
            axios.post(this.url + "api/logs/search_log", formData).then(function(response){
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
                        //axios.delete('<?php //echo base_url(); ?>api/logs/delete_log_all')
                        axios.delete(this.url + "api/logs/delete_log_all")
                        this.showAll();
                        location.reload();
                    });
                }
            });
        },
        // to delete one log
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
                        text: "Activity logs has been deleted.",
                        type: 'success',
                        icon: 'success', 
                    }).then((result) => {
                        axios.delete(this.url + "api/logs/delete_log_only/" + id)
                        this.showAll();
                        location.reload();
                    });
                }
            });
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