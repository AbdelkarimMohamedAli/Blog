<?php 

require '../helpers/dbConnection.php';
require '../helpers/helpers.php';
require '../helpers/checkLogin.php';


# Fetch Categories ... 
$sql = "select * from category";
$select_op  = mysqli_query($con,$sql);


# ID & Validate ...  
$_SESSION['del_falg'] = 0;

# GET data ... 

$id = sanitize($_GET['id'],1);

$error = [];
if(!validate($id,6)){
    $error['id'] = "Invalid Integar";
}

if(count($error) > 0){
     $_SESSION['Message'] = $error;
     $_SESSION['del_falg'] = 1;
     header("Location: index.php");
}

# Fetch User Data
$sql = "select * from articales where id=".$id;
$op  = mysqli_query($con,$sql);
$data = mysqli_fetch_assoc($op);
  
if(mysqli_num_rows($op) == 0){
    $_SESSION['Message'] = ["No data For this Id"];
    $_SESSION['del_falg'] = 1;
    header("Location: index.php");
}












if($_SERVER['REQUEST_METHOD'] == "POST"){

    $title      = CleanInputs($_POST['title']);
    $content    = CleanInputs($_POST['content']);
    $cat_id     = CleanInputs($_POST['cat_id']);
    $oldImage   = CleanInputs($_POST['oldImage']);



   # FILE INFO ... 
   $IMGtmp_path = $_FILES['image']['tmp_name'];
   $IMGname     = $_FILES['image']['name'];
   $IMGsize     = $_FILES['image']['size'];
   $IMGtype     = $_FILES['image']['type'];



    $errors = [];

    # Validate ... 
    if(!validate($title,1)){
      $errors['Title'] = "Title : Requierd Field";
    }elseif(!validate($title,2)){
        $errors['Title'] = "Title : Invalid String";
      }

      if(!validate($content,1)){
        $errors['content'] = " content : Requierd Field";
      }elseif(!validate($content,5,20)){
          $errors['content'] = "content : Legth must be >= 20 CH";
      }


        if(!validate($cat_id,1)){
            $errors['Category'] = "Category : Requierd Field";
           }elseif(!validate($cat_id,6)){
             $errors['Category'] = "Category : Invalid Int";
          }   




        if(isset($IMGname) && validate($IMGname,1) ){

            if(!validate($IMGtype,4)){
                $errors['IMG'] = "IMAGE : Invalid Extension";
               }
    
        }

            



    if(count($errors) > 0){
        $_SESSION['Message'] = $errors;
    }else{



        if(isset($IMGname) && validate($IMGname,1) ){

            $extArray = explode('/',$IMGtype);
            $finalName =   rand().time().'.'.$extArray[1];
    
            $desPath = './uploads/'.$finalName;
            if(move_uploaded_file($IMGtmp_path,$desPath)){

                 unlink('./uploads/'.$oldImage);
            
            }else{
                $errors =['Error In Uploading Try Again'];
          }

        }else{
            $finalName = $oldImage;
        }


        if(count($errors) > 0){
            $_SESSION['Message'] = $errors;
        }else{
  
            // LOGIC ...
            $user_id =$_SESSION['user']['id'];

            $sql ="update articales set title='$title' , content = '$content' , cat_id = $cat_id , addedby=$user_id , image='$finalName' where id =".$id;
            $op  = mysqli_query($con,$sql);
              
             if($op){
                  $_SESSION['Message'] = ["Data Updated"];
                  header("Location: index.php");
                  exit();

               }else{
                $_SESSION['Message'] = ["Error in sql OP Try Again"];
                }
           
                

          }
        
        
    }  



}









 require '../Layouts/header.php';
 require '../Layouts/topNav.php';
?>

<div id="layoutSidenav">

    <?php 
    require '../Layouts/sidNav.php';
 ?>




    <div id="layoutSidenav_content">



        <main>
            <div class="container-fluid">

                <h1 class="mt-4">Dashboard </h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">

                        <?php 
                      printMessages('Edit Blog');
                     ?>

                    </li>
                </ol>



                <form method="post" action="edit.php?id=<?php  echo $data['id'];?>"
                    enctype="multipart/form-data">



                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" name="title" value="<?php echo $data['title'];?>" class="form-control" id="exampleInputName" aria-describedby=""
                            placeholder="Enter Title">
                    </div>


                    <div class="form-group">
                        <label for="exampleInputPassword1">Content</label>
                        <textarea name="content" class="form-control"><?php echo $data['content'];?></textarea>    
                    </div>



                    <div class="form-group">
                        <label for="exampleInputPassword1">Category</label>
                        <select name="cat_id" class="form-control">

                            <?php while($result = mysqli_fetch_assoc($select_op)){?>
                            <option value="<?php echo $result['id'];?>"  <?php if($result['id'] == $data['cat_id']){echo 'selected';}?>  ><?php echo $result['title'];?></option>
                            <?php }?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Image</label><br>
                        <input type="file" name="image"  >
                    </div>
                    
                    <input type='hidden' name="oldImage" value="<?php echo $data['image'];?>">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Old Image</label><br>
                        <img src="./uploads/<?php echo $data['image'];?>"  width="150" height="200">
                    </div>


                    <button type="submit" class="btn btn-primary">Save</button>
                </form>


            </div>
        </main>




        <?php 
  
  require '../Layouts/footer.php';

?>