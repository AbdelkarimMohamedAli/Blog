<?php 

require '../helpers/dbConnection.php';
require '../helpers/helpers.php';
require '../helpers/checkLogin.php';


# Fetch Categories ... 
$sql = "select * from category";
$select_op  = mysqli_query($con,$sql);



if($_SERVER['REQUEST_METHOD'] == "POST"){

    $title      = CleanInputs($_POST['title']);
    $content    = CleanInputs($_POST['content']);
    $cat_id     = CleanInputs($_POST['cat_id']);



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
          $errors['content'] = "content : Length must be >= 20 CH";
      }


        if(!validate($cat_id,1)){
            $errors['Category'] = "Category : Requierd Field";
           }elseif(!validate($cat_id,6)){
             $errors['Category'] = "Category : Invalid Int";
          }   


          if(!validate($IMGname,1)){
            $errors['IMG'] = "IMAGE : Field Required";
          
           }elseif(!validate($IMGtype,4)){
            $errors['IMG'] = "IMAGE : Invalid Extension";
           }


    if(count($errors) > 0){
        $_SESSION['Message'] = $errors;
    }else{


        $extArray = explode('/',$IMGtype);
        $finalName =   rand().time().'.'.$extArray[1];


        $desPath = './uploads/'.$finalName;
         
         if(move_uploaded_file($IMGtmp_path,$desPath)){
  
            // LOGIC ... 
            $user_id =$_SESSION['user']['id'];
            $sql = "insert into articales (title,content,cat_id,addedby,image) values ('$title','$content',$cat_id,$user_id,'$finalName')";
            $op  = mysqli_query($con,$sql);
              
             if($op){
                  $_SESSION['Message'] = ["Data Inserted"];
                  header("Location: index.php");
                  exit();

               }else{
                $_SESSION['Message'] = ["Error in sql OP Try Again"];
                }
            
         }else{
               $_SESSION['Message'] =['Error In Uploading Try Again'];
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
                      printMessages('Add Blog');
                     ?>

                    </li>
                </ol>



                <form method="post" action="<?php  echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
                    enctype="multipart/form-data">



                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" name="title" class="form-control" id="exampleInputName" aria-describedby=""
                            placeholder="Enter Title">
                    </div>


                    <div class="form-group">
                        <label for="exampleInputPassword1">Content</label>
                        <textarea name="content" class="form-control"></textarea>    
                    </div>



                    <div class="form-group">
                        <label for="exampleInputPassword1">Category</label>
                        <select name="cat_id" class="form-control">

                            <?php while($result = mysqli_fetch_assoc($select_op)){?>
                            <option value="<?php echo $result['id'];?>"><?php echo $result['title'];?></option>
                            <?php }?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Image</label><br>
                        <input type="file" name="image"  >
                           
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>


            </div>
        </main>




        <?php 
  
  require '../Layouts/footer.php';

?>