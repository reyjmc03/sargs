
Vue.component('message', {
template: '#success-alert',
    props:['message'],
})

var v = new Vue({
    el:"#login",
    data:{
        userLogin:{username:'', password:''},
        message:'',
        formValidation:{},
        successMSG:'',
        rValidate:{},
    },
    methods:{
        login(){
            var userlogin = v.toFormData(v.userLogin);
            axios.post(url+'api/users/login', userlogin).then(function(response){
                if(response.data.error){
                    v.message = response.data.message;
                }else{
                    window.location.href = response.data.message.success;
                }
            }) //for login user

        },
        clearMSG(){
            setTimeout(function(){
            v.successMSG=''
            },3000); //disappear alert message 
        },
        toFormData: function(obj){
            var form_data = new FormData();
            for(var key in obj){
                form_data.append(key, obj[key]);
            }
            return form_data;
        },
    }
})
  
  