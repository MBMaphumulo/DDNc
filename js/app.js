$(document).ready(function(){
var timeout = setInterval(reloadChat,10);
function reloadChat(){
$.ajax({
    url:"mess.php", 
    success:function(result){
             $("#b").html(result);
          }
     });
}
});