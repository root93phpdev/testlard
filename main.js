    function addatabase(){
        document.getElementById('blockinfo').innerHTML = "";
        var name = document.getElementById('name').value;
        var text = document.getElementById('textsend').value;
      
        if(name == "" || text == ""){
            document.getElementById('blockinfo').innerHTML = "Заполните форму!";
        } else {
            document.getElementById('blockinfo').innerHTML='<i class="fa fa-cog fa-spin" aria-hidden="true"></i>';
    $.ajax({
        type: 'POST',
        url: 'adddatabase.php',
        data: 'name=' + name+'&text='+text,
        success: function(rezultphp) {
           if (rezultphp == "Запись добавлена"){
                document.getElementById('blockinfo').innerHTML ="Комментарий добавлен =)";
                document.getElementById('name').value = "";
                document.getElementById('textsend').value = "";
           } else {
            document.getElementById('blockinfo').innerHTML = 'Возникли проблемы, обратитесь к администратору системы';
           }
          
        }
    });
        }    
}

    function deletecomment(iddeliterow){
        let delorno = confirm("Удалить?");
        if( delorno ){
            $.ajax({
                type: 'POST',
                url: 'deletecomment.php',
                data: 'delid=' + iddeliterow,
                success: function(rezultphp) {
                   if (rezultphp == "Запись удалена"){
                        alert('Запись удалена');
                   } else {
                        alert('Возникли проблемы, обратитесь к администратору системы');
                   }
                   document.getElementById('btnspin').innerHTML = '<i class="fa fa-arrow-circle-down" aria-hidden="true"></i>';
                }
            });

        } 
    }