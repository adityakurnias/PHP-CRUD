<?php
    include ("../konek.php");

        if(isset($_POST['submit'])){
            if($_POST['submit'] == "add"){
              add();
            } else if ($_POST['submit'] == "edit"){
              edit();
            } 
         
         
          } else if($_GET['hapus']){
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
            global $konek;    //global $konek; buat nyambungin include dari ataske function
            if(isset($_GET['ubah'])){
              
              
              $id = $_POST['id-form'];
              $caption = $_POST['cp'];
              
              $query = "UPDATE `post` SET `caption`='$caption' WHERE id= '$id';";
              $sql = mysqli_query($konek, $query);
              
              if($sql){
                header("location: ../home.php");
              }else {
                echo "$query";
              }

            }


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