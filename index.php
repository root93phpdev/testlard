<?php
include("connect.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ТЕСТ ЛАРД</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script type="text/javascript" src="main.js"></script>
    <script src="jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/abbef8312a.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="#">LARD [тест]</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

      </div>
    </nav>

    <div class="container my-5">
      <h1>Astrobotic создала лунный полигон для подготовки к полётам на Луну</h1>
      <div class="col-lg-10 px-0">
        <p class="fs-5"><b>Astrobotic продолжает развивать свои возможности в области космических технологий после запуска первого коммерческого лунного модуля Peregrine</b></p>
        <p class="fs-5">Astrobotic представила лунный испытательный полигон, который поможет подготовиться к ряду предстоящих лунных миссий.</p>
        <p class="fs-5">Лунный испытательный полигон (LSPG) размером примерно 330 на 330 футов (100 на 100 метров) в Мохаве (Калифорния), представляет собой высокоточное 3D-испытательное поле, которое воспроизводит условия на Луне.</p>
        <p class="fs-5">LSPG, смоделированный с использованием инструментов LunaRay от Astrobotic, имитирует топографию Луны и экстремальные условия освещения на южном полюсе Луны. Он будет использоваться для тестирования технологий точной посадки на Луну, таких как сканеры LiDAR, а также для управления марсоходами и другими роботизированными системами.</p>
        <hr class="col-4 my-4">
        <div class="mb-3">
  <input type="text" class="form-control fs-5" id="name" placeholder="Укажите имя :)">
</div>
<div class="mb-3">
  <textarea class="form-control fs-5" id="textsend" rows="3" placeholder="Напишите всё, что хотели сказать =)"></textarea>

</div>
<button type="button" class="btn btn-primary btn-sm" onclick=addatabase()>Добавить комментарий <span id="btnspin"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i></span></button><br>
&nbsp;<span id="blockinfo"></span>
<span id='updatelist'>
 <?php
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
 ?>
    </span>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
  </body>
</html>
<?php
mysqli_close($link);
?>
