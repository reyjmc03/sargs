<script type="text/javascript">
var v = new Vue({
    el: '#app',
    data: {
        url: '<?php echo base_url(); ?>',
        addModal: false,
        editModal: false,
        deleteModal: false,
        boss: [],
        search: {
            text: ''
        },
        emptyResult: false,
        searchQuery: null,
        newBOS: {
            bos: '',
            description: '',
        },
        chooseBOS: {},
        formValidate: [],
        successMSG: '',

        // pagination
        currentPage: 0,
        rowCountPage: 8,
        totalRows: 0,
        pageRange: 3,
        sortBy: 'nos',

        currentBOS: {},
        modalBOS: {},
    },
    created() {
        this.showAll();
    },


    methods: {
        // generate datatable using vuejs
        showAll() {
            axios.get(this.url + "api/bos/show_all").then(function(response){
                if(response.data.boss == null) {
                    v.noResult()
                } 
                else {
                    v.getData(response.data.boss)
                }
            })
        },
        // to search a bos
         searchBOS() {
            var formData = v.formData(v.search);
            axios.post(this.url + "api/bos/search", formData).then(function(response){
                if(response.data.boss == null){
                    v.noResult()
                }else{
                    v.getData(response.data.boss); 
                }  
            })
        },
        // TO ADD NEW BRANCH OF SERVICE OF THE PERSONNEL.
        addBOS() {
            var formData = v.formData(v.newBOS);

            axios.post(this.url + "api/bos/add", formData).then(function(response){
                if(response.data.error){
                    v.formValidate = response.data.msg;
                } else {
                    // confirmation
                    swal({
                        title:'Added!',
                        text: "A new branch of service has been created.",
                        type: 'success',
                        icon: 'success', 
                    }).then((result) => {
                        $('#addModal').modal('hide');
                        v.clearAll();
                    });

                    
                }
            })
        },
        // TO DELETE ALL DATA PERMANENTLY!
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
                        text: "All branch of services has been deleted.",
                        type: 'success',
                        icon: 'success', 
                    }).then((result) => {
                        axios.delete(this.url + "api/bos/delete_all")
                        v.clearAll();
                    });
                }
            });
        },
        // TO DELETE ONE BRANCH OF SERVICE
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
                        text: "Branch of service has been deleted.",
                        type: 'success',
                        icon: 'success', 
                    }).then((result) => {
                        axios.delete(this.url + "api/bos/delete_only/" + id)
                        v.clearAll();
                    });
                }
            });
        },
        // TO UPDATE
        updateBOS() {
            var formData = v.formData(v.chooseBOS);
            swal({title: 'Are you sure?',
                //text: "Data is edit permanently!",
                icon:'warning', 
                buttons: true, 
                dangerMode: true
            }).then((willOUT) => {
                if (willOUT) {
                    axios.post(this.url + "api/bos/update", formData).then(function(response){
                        if(response.data.error){
                            v.formValidate = response.data.msg;
                        } else {
                             // confirmation
                            swal({
                                title:'Updated!',
                                text: "A branch of service has been updated.",
                                type: 'success',
                                icon: 'success', 
                            }).then((result) => {
                                $('#editModal').modal('hide');
                                v.clearAll();
                            });
                        }
                    })
                }
            });
        },


        ///////////////////////////
        //////////////////////////
        /////////////////////////
        // formdata
        formData(obj) {
            var formData = new FormData();
            for(var key in obj) {
                formData.append(key, obj[key]);
            }
            return formData;
        },
        getData(boss){
            v.emptyResult = false; // become false if has a record
            v.totalRows = boss.length //get total of rows
            v.boss = boss.slice(v.currentPage * v.rowCountPage, (v.currentPage * v.rowCountPage) + v.rowCountPage); //slice the result for pagination
            
             // if the record is empty, go back a page
            if(v.boss.length == 0 && v.currentPage > 0){ 
                v.pageUpdate(v.currentPage - 1)
                v.clearAll();  
            }
        },
        selectBOS(bos){
            v.chooseBOS = bos;
        },
        clearMSG() {
            setTimeout(function() {
                v.successMSG = ''
            }, 3000); // disapprearing message success in 2 secs
        },
        clearAll(){
            v.newBOS = { bos:'', description:'' };
            v.chooseBOS = { bos:'', description:'' };
            v.formValidate = false;
            v.addModal = false;
            v.addModal.show = false;
            v.editModal = false;
            v.deleteModal = false;
            v.refresh();
        },
        noResult(){
            v.emptyResult = true;  // become true if the record is empty, print 'No Record Found'
            v.boss = null 
            v.totalBOS = 0 //remove current page if is empty
        },
        pageUpdate(pageNumber){
              v.currentPage = pageNumber; //receive currentPage number came from pagination template
                v.refresh()  
        },
        // refresh(){
        //      v.search.text ? v.searchBOS() : v.showAll(); //for preventing
        // },
        showModal() {
            let element = this.$refs.modal.$el
            $(element).modal('show')
        },

        // for view details button
        setCurrentBOS: function(bos) {
            this.currentBOS = bos
        },
        // for edit
        setChooseBOS: function(bos) {
            this.chooseBOS = bos
        },
        setBOSMoreDetails: function(bos) {
            this.modalBOS = bos
        },
        refresh() {
            v.search.text ? v.searchBOS() : v.showAll(); // preventing
        },
    }
})
</script>