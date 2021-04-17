<script>
$(document).ready(function(){
    $("#sargs-logout").click(function(){
        swal({title:'Logout', 
            text:'Do you want to logout this system?', 
            icon:'warning', 
            buttons: true, 
            dangerMode: true
        })
        .then((willOUT) => {
            if (willOUT) {

                window.location.href = '<?php echo base_url('user/logout'); ?>', {
                    icon: 'success',
                }
            }
        });
    });
});
</script>

<script>
// $(document).ready(function(){
//     $("#sargs-delete-all").click(function(){
//         swal({title:'Delete', 
//             text:'Warning: All data will delete permanently.\n' + 'Do you want to proceed?', 
//             icon:'warning', 
//             buttons: true, 
//             dangerMode: true
//         })
//         .then((willOUT) => {
//             if (willOUT) {
//                 window.location.href = '<?php //echo base_url('logs/delete_log_all'); ?>', {
//                     icon: 'success',
//                 }
//             }
//         });
//     });
// });
</script>