('.btn').addEventListener('click',function add(){
    
    var name = $('.Name').val();
    var data = $('.Data').val();
    var descrip = $('.Description').val();
    
//Ajax jQuery
$.post('/calendar_my_2.php',{ mydata: '$name=' + name.val() + '&data=' + data.val() + '&descpip=' + descrip.val() },function(event){
    $('.resultEvent').html(event);
});
})