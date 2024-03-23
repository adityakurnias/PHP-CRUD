<?php
   include ("konek.php");
   $query = "SELECT * FROM `post` ";
    $sql = mysqli_query($konek, $query);
    
    if($sql){
        
    } else {
        echo $query;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php while($result= mysqli_fetch_assoc($sql))
  { ?>
       <p><?= $result['caption']; ?></p><br>

        <?php } ?>
        <a href=""></a>
        <a href="contoh1.php">balik</a>
</body>
</html>