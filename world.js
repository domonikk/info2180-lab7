$(document).ready(function(){
    $(document).getElementById("lookup").addEventListener("click",seacrh){ 
        $.ajax({url: "world.php",success:
    function(result){
        $("#div").html(result); 
        console.log(result);
        }}); 
    });
});
   