<script type="text/javascript">
var v = new Vue({
    el: '#app',
    data: {
        url: '<?php echo base_url(); ?>',
        addModal: false,
        editModal: false,
        deleteModal:false,
        ranks: [],
        search: { text: '' },
        emptyResult: false,
        searchQuery: null,
        newRank: {
            rank:'', 
            description:'', 
            category:''
        },
        chooseRank:{},
        formValidate:[],
        successMSG:'',

        //pagination
        currentPage:0,
        rowCountPage:8,
        totalRows:0,
        pageRange:3,
        sortBy: 'nos',

        currentRank: {},
        modalRank: {},
    },
    created() {
        this.showAll();
    },
    methods: {
        //generate datatable using vuejs
        showAll(){
            //axios.get('<?php //echo base_url(); ?>api/ranks/show_all').then(function(response){
            axios.get(this.url + "api/ranks/show_all").then(function(response){
                if(response.data.ranks == null) {
                    v.noResult()
                } 
                else {
                    v.getData(response.data.ranks);
                }
            })
        },
        // to search a rank
        searchRank() {
            var formData = v.formData(v.search);
            axios.post(this.url + "api/ranks/search", formData).then(function(response){
                if(response.data.ranks == null){
                    v.noResult()
                }else{
                    v.getData(response.data.ranks); 
                }  
            })
        },
        // add new rank
        addRank() {
           var formData = v.formData(v.newRank);

            // confirmation
            swal({
                title:'Added!',
                text: "A new rank has been created.",
                type: 'success',
                icon: 'success', 
            }).then((result) => {
                axios.post(this.url + "api/ranks/add", formData)
                // this.showAll();
                // location.reload();
                $('#addModal').modal('hide');
                v.clearAll();
            });
        },
        // update rank
        updateRank() {
            var formData = v.formData(v.chooseRank); 
            swal({title: 'Are you sure?',
                //text: "Data is edit permanently!",
                icon:'warning', 
                buttons: true, 
                dangerMode: true
            }).then((willOUT) => {
                if (willOUT) {
                    axios.post(this.url + "api/ranks/update", formData).then(function(response){
                        if(response.data.error){
                            v.formValidate = response.data.msg;
                        } else {
                             // confirmation
                            swal({
                                title:'Updated!',
                                text: "A rank has been updated.",
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
        // to delete all ranks
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
                        text: "All ranks has been deleted.",
                        type: 'success',
                        icon: 'success', 
                    }).then((result) => {
                        axios.delete(this.url + "api/ranks/delete_all")
                        v.clearAll();
                    });
                }
            });
        },
        // formdata
        formData(obj) {
            var formData = new FormData();
            for(var key in obj) {
                formData.append(key, obj[key]);
            }
            return formData;
        },
        // to delete one rank
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
                        text: "Rank has been deleted.",
                        type: 'success',
                        icon: 'success', 
                    }).then((result) => {
                        axios.delete(this.url + "api/ranks/delete_only/" + id)
                        v.clearAll();
                    });
                }
            });
        },
        getData(ranks){
            v.emptyResult = false; // become false if has a record
            v.totalRows = ranks.length //get total of rows
            v.ranks = ranks.slice(v.currentPage * v.rowCountPage, (v.currentPage * v.rowCountPage) + v.rowCountPage); //slice the result for pagination
            
             // if the record is empty, go back a page
            if(v.ranks.length == 0 && v.currentPage > 0){ 
                v.pageUpdate(v.currentPage - 1)
                v.clearAll();  
            }
        },
        selectRank(rank){
            v.chooseRank = rank;
        },
        clearMSG() {
            setTimeout(function() {
                v.successMSG = ''
            }, 3000); // disapprearing message success in 2 secs
        },
        clearAll(){
            v.newRank = { rank:'', description:'', category:'' };
            v.chooseRank = { rank:'', description:'', category:'' };
            v.formValidate = false;
            v.addModal = false;
            v.editModal = false;
            v.deleteModal = false;
            v.refresh();
        },
        noResult(){
            v.emptyResult = true;  // become true if the record is empty, print 'No Record Found'
            v.ranks = null 
            v.totalRanks = 0 //remove current page if is empty
        },
        pageUpdate(pageNumber){
              v.currentPage = pageNumber; //receive currentPage number came from pagination template
                v.refresh()  
        },
        // refresh(){
        //      v.search.text ? v.searchRank() : v.showAll(); //for preventing
        // },
        showModal() {
            let element = this.$refs.modal.$el
            $(element).modal('show')
        },

        // for view details button
        setCurrentRank: function(rank) {
            this.currentRank = rank
        },
        // for edit
        setChooseRank: function(rank) {
            this.chooseRank = rank
        },
        setRankMoreDetails: function(rank) {
            this.modalRank = rank
        },
        refresh() {
            v.search.text ? v.searchRank() : v.showAll(); // preventing
        },
    }
})
</script>