    function addatabase(){
        var name = document.getElementById('name').value;
        var text = document.getElementById('text').value;
      
        if(name == "" || text == ""){

        } else {
            document.getElementById('btnspin').innerHTML="<i class="fa fa-cog fa-spin" aria-hidden="true"></i>";
    $.ajax({
        type: 'POST',
        url: 'adddatabase.php',
        data: 'idlpuphp=' + text,
        success: function (loasdasdultmo) {
           alert(loasdasdultmo);
           document.getElementById('btnspin').innerHTML = "<i class="fa fa-arrow-circle-down" aria-hidden="true"></i>";
        }
    });
        }    
}
