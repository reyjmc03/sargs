const newLocal = `
      <transition
                enter-active-class="animate__animated animate__flipInX"
                     leave-active-class="animate__animated animate__flipOutX">
    <div class="modal is-active" >
  <div class="modal-card border border border-secondary">
    <div class="modal-card-head text-center bg-dark">
    <div class="modal-card-title text-white">
          <slot name="head"></slot>
    </div>
<button class="delete" @click="$emit('close')"></button>
    </div>
    <div class="modal-card-body">
         <slot name="body"></slot>
    </div>
    <div class="modal-card-foot" >
      <slot name="foot"></slot>
    </div>
  </div>
</div>
</transition>
    `;
Vue.component('modal',{ //modale
    template:newLocal
})


var alumnivue = new Vue({
    data: {
        url: 'http://sargs.dev.local:81/',
        addModal: false,
        editModal: false,
        deleteModal: false,
        alumni:[],
        search: {text: ''},
        emptyResult:false,
        newAlumni:{
            lastname: '',
            firstname: '',
            mi: '',
            bos: '',
            present_unit_assignment: '',
            contact_number: '',
            email: '',
            status: '',
            gender: '',

            //pagination
            currentPage: 0,
            rowCountPage: 5,
            totalUsers:0,
            pageRange:2
        },
        created() {
            this.AlumniShowAll();
        },
        methods: {
            AlumniShowAll() { 
                axios.get(this.url+"pages/ShowAllAlumni").then(function(response){
                    if(response.data.alumni == null) { alumnivue.noResult() } 
                    else { alumnivue.getData(response.data.alumni); }
                })
            }
        }
    }
})