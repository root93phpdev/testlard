<?php
include('connect.php');
$sql = 'SELECT * FROM `comment` ORDER BY id DESC';

$result = mysqli_query($link, $sql);
$rownum = mysqli_num_rows($result);
   if ( $rownum > 0){
       while ($rezonpage = mysqli_fetch_array($result)){
echo '<hr class="col-4 my-4"><div class="bd-example">
<ul class="list-group">
  <li class="list-group-item active"><img src="avatar.png"> &nbsp;&nbsp;&nbsp;'.$rezonpage['name'].' - '.$rezonpage['datetime'].'<span style="float: right;"><i class="fa fa-pencil-square" onclick=EditComment('.$rezonpage['id'].') style="cursor:pointer;" aria-hidden="true"></i> | <i class="fa fa-window-close" onclick = deletecomment('.$rezonpage['id'].') style="cursor:pointer;" aria-hidden="true"></i></span></li>
  <li class="list-group-item"><span id="edittxt'.$rezonpage['id'].'">'.$rezonpage['text'].'</span></li>';
    $subsql = 'SELECT * FROM `subcomment` WHERE `idcomment`='.$rezonpage['id'];
   $subresult = mysqli_query($link, $subsql);
   $subrownum = mysqli_num_rows($subresult);
   if ($subrownum >= 10){
     echo '<li class="list-group-item">
     <span style="float: right;">Ответ не доступен. Максимум 10.</span>
     </li>';
   } else {
    echo '<li class="list-group-item">
    <span style="float: right;">
    <table><tr>
    <td>Для ответа, заполните форму:</td>
    <td><input type="text" class="form-control" id="name'.$rezonpage['id'].'" placeholder="Имя"></td>
    <td><input type="text" class="form-control" id="text'.$rezonpage['id'].'" placeholder="Введите текст"></td>
    <td><button type="button" class="btn btn-primary" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" onclick=AddCommentOnComment('.$rezonpage['id'].')>Ответить</button></td>
    <tr></table>
    </span>
    </li>';
   }
   if ($subrownum > 0){
     while ($subrezonpage = mysqli_fetch_array($subresult)){
       echo '<li class="list-group-item">
        <ul class="list-group"> 
            <li class="list-group-item active">Ответ на комментарий: '.$subrezonpage['name'].' '.$subrezonpage['datetime'].'<span style="float: right;"><i class="fa fa-pencil-square" onclick=EditSubComment('.$subrezonpage['id'].') style="cursor:pointer;" aria-hidden="true"></i> | <i class="fa fa-window-close" onclick = deletesubcomment('.$subrezonpage['id'].') style="cursor:pointer;" aria-hidden="true"></i></span></li>
            <li class="list-group-item"><span id="subcoment'.$subrezonpage['id'].'">'.$subrezonpage['text'].'</li>
        </ul>
</li>';
     }
   }

 echo '
</ul>
</div>
           ';
 }
       
   } else {
       echo '
       <div class="alert alert-primary" role="alert">К сожалению ни кто не оставил комментарий. Будь первым!</div>';
   }

   mysqli_close($link);
?>