    //Добавление комментария
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
                newlistupdate();
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

//Удаление комментария и ответов на него
    function deletecomment(iddeliterow){
        let delorno = confirm("Удалить?");
        if( delorno ){
            $.ajax({
                type: 'POST',
                url: 'deletecomment.php',
                data: 'delid=' + iddeliterow,
                success: function(rezultphp) {
                   if (rezultphp == "Запись удалена"){
                    newlistupdate();
                   } else {
                        alert('Возникли проблемы, обратитесь к администратору системы');
                   }
                   document.getElementById('btnspin').innerHTML = '<i class="fa fa-arrow-circle-down" aria-hidden="true"></i>';
                }
            });

        } 
    }

    //Обновление списка комментариев
    function newlistupdate(){
        $.ajax({
            type: 'POST',
            url: 'updatelistcomment.php',
            success: function(rezultlistupdate) {
                document.getElementById('updatelist').innerHTML = rezultlistupdate;
            }
        });
    }
    
    //Запись в БД ответа на комментарий
    function AddCommentOnComment(idcommentadd){
        var nameoncomment = document.getElementById('name'+idcommentadd).value;
        var textoncomment = document.getElementById('text'+idcommentadd).value;
        if (nameoncomment == "" || textoncomment == ""){
            alert('Заполните необходимые поля! =(');
        } else {
            $.ajax({
                type: 'POST',
                url: 'addcommentoncomment.php',
                data: 'name=' + nameoncomment+'&text='+textoncomment+'&idcomment='+idcommentadd,
                success: function(rezultphp) {
                   if (rezultphp == "Запись добавлена"){
                        newlistupdate();
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

    //Редактирование комментария
    function EditComment(idedittxt){
        var textedit = document.getElementById('edittxt'+idedittxt).innerHTML;
        let edittexts = prompt('Измените текст:', textedit);
            if(edittexts != null){
                $.ajax({
                    type: 'POST',
                    url: 'updatecomment.php',
                    data: 'text='+edittexts+'&idcomment='+idedittxt,
                    success: function(rezultupdate) {
                       if (rezultupdate == "Запись обновлена"){
                            newlistupdate();
                       } else {
                        document.getElementById('blockinfo').innerHTML = 'Возникли проблемы, обратитесь к администратору системы';
                       }
                      
                    }
                });
            }
        
    }

    //Удаление ответа на комментарий
    function deletesubcomment(iddeliterow){
        let delorno = confirm("Удалить?");
        if( delorno ){
            $.ajax({
                type: 'POST',
                url: 'deleteotoncomment.php',
                data: 'delid=' + iddeliterow,
                success: function(rezultphp) {
                   if (rezultphp == "Запись удалена"){
                    newlistupdate();
                   } else {
                        alert('Возникли проблемы, обратитесь к администратору системы');
                   }
                   document.getElementById('btnspin').innerHTML = '<i class="fa fa-arrow-circle-down" aria-hidden="true"></i>';
                }
            });

        } 
    }

        //Редактирование комментария
    function EditSubComment(idedittxt){
        var textedit = document.getElementById('subcoment'+idedittxt).innerHTML;
        let edittexts = prompt('Измените текст:', textedit);
            if(edittexts != null){
                $.ajax({
                    type: 'POST',
                    url: 'updatesubcomment.php',
                    data: 'text='+edittexts+'&idcomment='+idedittxt,
                    success: function(rezultupdate) {
                        if (rezultupdate == "Запись обновлена"){
                                newlistupdate();
                        } else {
                            document.getElementById('blockinfo').innerHTML = 'Возникли проблемы, обратитесь к администратору системы';
                        }
                          
                    }
                });
            }
            
    }