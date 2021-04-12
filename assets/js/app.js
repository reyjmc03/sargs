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

Vue.component('modal', {
    template:newLocal
})

var v = new Vue({
    el:'#app',
    data:{
        url:'http://sargs.dev.local:81',
        addModal: false,
        editModal: false,
        deleteModal: false,
        logs:[],
        search: {text: ''},
        emptyResult: false,
        
        
    }
})