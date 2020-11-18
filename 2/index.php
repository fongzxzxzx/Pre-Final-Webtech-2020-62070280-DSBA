<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</head>
<body>
<div class="container">
<div class="row">
   <div class="col">
      <form action="" method="post">
        <input name="value" type="text" style="width: 80%;">
        <button type="submit">ค้นหา</button>
      </form>
   </div>
</div>
    <div class="row">

    <?php
     $url = "https://dd-wtlab2020.netlify.app/pre-final/ezquiz.json";
     $response = file_get_contents($url); 
     $result = json_decode($response);
     if(isset($_POST['value'])) {
        $vale = $_POST['value'];
        echo $vale;
        foreach ($result->tracks->items as $key) {
            $naem = $key->album->name;
            $ard = $key->album->artists[0]->name;
            if ((strpos( $naem, $vale ) !== false) or (strpos( $ard, $vale ) !== false)) {
               echo 'lol';
            }
              echo '<div class="col-4">';
              echo '<div class="card border" >';
              echo '<img class="card-img-top" src="'.$key->album->images[0]->url.'"alt="">';
              echo '<div class="card-dody p-3">';
              echo '<b>'.$key->album->name.'</b><br>';
              echo '<p> Artists : '.$key->album->artists[0]->name.'</p>';
              echo '<p> Release date : '.$key->album->release_date.'</p>';
              $arr = $key->album->available_markets;
              echo '<p> Available'.sizeof($arr).'</p>';
              echo '</div></div></div>';        
          }
     }else {
        foreach ($result->tracks->items as $key) {
              echo '<div class="col-4">';
              echo '<div class="card border" >';
              echo '<img class="card-img-top" src="'.$key->album->images[0]->url.'"alt="">';
              echo '<div class="card-dody p-3">';
              echo '<b>'.$key->album->name.'</b><br>';
              echo '<p> Artists : '.$key->album->artists[0]->name.'</p>';
              echo '<p> Release date : '.$key->album->release_date.'</p>';
              $arr = $key->album->available_markets;
              echo '<p> Available'.sizeof($arr).'</p>';
              echo '</div></div></div>';        
          }
     }
     
     
    ?>
    </div>
</div>
    
</body>
</html>