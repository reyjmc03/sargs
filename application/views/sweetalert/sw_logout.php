<script>
$(document).ready(function() {
    $("#sargs-logout-masthead").click(function(){
        swal({title:'Logout', 
            text:'Do you want to logout this system?', 
            icon:'warning', 
            buttons: true, 
            dangerMode: true
        })
        .then((willOUT) => {
            if (willOUT) {

                window.location.href = '<?php echo base_url('api/users/logout'); ?>', {
                    icon: 'success',
                }
            }
        });
    });


    $("#sargs-logout-sidebar").click(function(){
        swal({title:'Logout', 
            text:'Do you want to logout this system?', 
            icon:'warning', 
            buttons: true, 
            dangerMode: true
        })
        .then((willOUT) => {
            if (willOUT) {

                window.location.href = '<?php echo base_url('api/users/logout'); ?>', {
                    icon: 'success',
                }
            }
        });
    });
});
</script>