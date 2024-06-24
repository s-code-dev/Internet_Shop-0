<?php 
//session_start();
//$_SESSION['loader']=0;
//?>
<script>  
    function add_product(){
    $.post( '../models/models.php', function(data){
     $('#ajax_block').append(data);
    });
}
    
//    $.ajax(
//            {
//                type: "GET",
//                url: "../models/models.php",
//                data: str,
//                success: function(answer){
//                    alert(answer);
//                }
//            }
          </script>