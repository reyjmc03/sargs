<script type="text/javascript">
var v = new Vue({
    el: '#app',
    data: {
        url: '<?php echo base_url(); ?>',
        addModal: false,
        editModal: false,
        deleteModal: false,
        afposs: [],
        search: {
            text: ''
        },
        emptyResult: false,
        searchQuery: null,
        newAFPOS: {
            afpos: '',
            description: '',
        },
        chooseAFPOS: {},
        formValidate: [],
        successMSG: '',

        // pagination
        currentPage: 0,
        rowCountPage: 8,
        totalRows: 0,
        pageRange: 3,
        sortBy: 'nos',

        currentAFPOS: {},
        modalAFPOS: {},
    },
    created() {
        this.showAll();
    },


    methods: {
        // generate datatable using vuejs
        showAll() {
            axios.get(this.url + "api/afpos/show_all").then(function(response){
                if(response.data.afposs == null) {
                    v.noResult()
                } 
                else {
                    v.getData(response.data.afposs)
                }
            })
        },
        // to search a afpos
        searchAFPOS() {
            var formData = v.formData(v.search);
            axios.post(this.url + "api/afpos/search", formData).then(function(response){
                if(response.data.afposs == null){
                    v.noResult()
                }else{
                    v.getData(response.data.afposs)
                }  
            })
        },
        // TO ADD NEW AFP OF SERVICE OF THE PERSONNEL
        addAFPOS() {
            var formData = v.formData(v.newAFPOS);

            axios.post(this.url + "api/afpos/add", formData).then(function(response){
                if(response.data.error){
                    v.formValidate = response.data.msg;
                } else {
                    // confirmation
                    swal({
                        title:'Added!',
                        text: "A new AFP of service has been created.",
                        type: 'success',
                        icon: 'success', 
                    }).then((result) => {
                        $('#addModal').modal('hide');
                        v.clearAll();
                    });

                    
                }
            })
        },
        // TO UPDATE
        updateAFPOS() {
            var formData = v.formData(v.chooseAFPOS);
            swal({title: 'Are you sure?',
                icon:'warning', 
                buttons: true, 
                dangerMode: true
            }).then((willOUT) => {
                if (willOUT) {
                    axios.post(this.url + "api/afpos/update", formData).then(function(response){
                        if(response.data.error){
                            v.formValidate = response.data.msg;
                        } else {
                             // confirmation
                            swal({
                                title:'Updated!',
                                text: "A AFP of service has been updated.",
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

        // TO DELETE ONE AFP OF SERVICE
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
                        text: "AFP of service has been deleted.",
                        type: 'success',
                        icon: 'success', 
                    }).then((result) => {
                        axios.delete(this.url + "api/afpos/delete_only/" + id)
                        v.clearAll();
                        //this.showAll();
                        //location.reload();
                    });
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
        getData(afposs){
            v.emptyResult = false; // become false if has a record
            v.totalRows = afposs.length //get total of rows
            v.afposs = afposs.slice(v.currentPage * v.rowCountPage, (v.currentPage * v.rowCountPage) + v.rowCountPage); //slice the result for pagination
            
                // if the record is empty, go back a page
            if(v.afposs.length == 0 && v.currentPage > 0){ 
                v.pageUpdate(v.currentPage - 1)
                v.clearAll();  
            }
        },
        selectAFPOS(afpos){
            v.chooseAFPOS = afpos;
        },
        clearMSG() {
            setTimeout(function() {
                v.successMSG = ''
            }, 3000); // disapprearing message success in 2 secs
        },
        clearAll(){
            v.newAFPOS = { afpos:'', description:'' };
            v.chooseAFPOS = { afpos:'', description:'' };
            v.formValidate = false;
            v.addModal = false;
            v.addModal.show = false;
            v.editModal = false;
            v.deleteModal = false;
            v.refresh();
        },
        noResult(){
            v.emptyResult = true;  // become true if the record is empty, print 'No Record Found'
            v.afposs = null 
            v.totalAFPOS = 0 //remove current page if is empty
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
        setCurrentAFPOS: function(afpos) {
            this.currentAFPOS = afpos
        },
        // for edit
        setChooseAFPOS: function(afpos) {
            this.chooseAFPOS = afpos
        },
        setAFPOSMoreDetails: function(afpos) {
            this.modalAFPOS = afpos
        },
        refresh() {
            v.search.text ? v.searchAFPOS() : v.showAll(); // preventing
        }
    }
})
</script>