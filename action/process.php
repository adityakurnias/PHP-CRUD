<?php
    include ("../konek.php");

        if(isset($_POST['submit'])){
            if($_POST['submit'] == "add"){
              add();
            } else if ($_POST['submit'] == "edit"){
              edit();
            } 
         }
         if($_GET['hapus']){
            delete();
        }
        
          function add(){
            global $konek;
            $caption = $_POST['cp'];
        
            $query= "INSERT INTO `post`(`caption`) VALUES ('$caption')";
            $sql = mysqli_query($konek, $query);
        
            if($sql){
              header("location: ../home.php");
            } else {
              echo "<script>alert('error')</script>";
            }
        
        
        
        
          }
          function edit(){
            echo "oke";
          }
          function delete(){
            global $konek;
            
            $id = $_GET['hapus'];
            
            $query = "DELETE FROM `post` WHERE id='$id';";
            $sql = mysqli_query($konek, $query);
     
                 if($sql){
                     header("location: ../home.php");
                 } else {
                     echo $query;
                 }
          }
          







?>