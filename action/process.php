<?php
        session_start();
    include ("../konek.php");
      
            if(isset($_POST['add'])){
              add();
            } else if (isset($_POST['edit'])){
              edit();
            } else if(isset($_GET['hapus'])){
              delete();
          }
         
        
          function add(){
            global $konek;
            $userid=$_SESSION['username'];
            $caption = $_POST['cp'];
        
            $query= "INSERT INTO `post`(`user_id`, `caption`) VALUES ('$userid','$caption')";
            $sql = mysqli_query($konek, $query);
        
            if($sql){
              header("location: ../home.php");
            } else {
              echo "<script>alert('error')</script>";
            }
        
        
        
        
          }
          function edit(){
            global $konek;    //global $konek; buat nyambungin include dari ataske function
              
              $id = $_POST['id-form'];
              $caption = $_POST['cp'];
              
              $query = "UPDATE `post` SET `caption`='$caption' WHERE id='$id'";
              $sql = mysqli_query($konek, $query);
              
              if($sql){
                header("location: ../home.php");
              }else {
                echo "$query";
              }

            }


          
          function delete(){
            global $konek;
            
            $id = $_GET['hapus'];
            
            $query = "DELETE FROM `post` WHERE id='$id'";
            $sql = mysqli_query($konek, $query);
     
                 if($sql){
                     header("location: ../home.php");
                 } else {
                     echo $query;
                 }
          }
          

echo $_SESSION['username'];





?>

