<?php
session_start();
include 'init.php'; 

$con2= mysqli_connect("localhost","root","","ework");

if(isset($_POST['sub'])){
    $title          = $_POST['title'];
    $description    = $_POST['description'];
    $price          = $_POST['price'];
    $location       = $_POST['location'];
    $keyword        = $_POST['keyword'];
    
     
    $stmt="INSERT INTO jobs(title,description,price,location,keyword)values('$title','$description','$price','$location','$keyword')";
    if(mysqli_query($con2, $stmt)){
    echo "inserted successfully..!";
    }else{
        echo 'insertion unsucessfull!!';
    }
    }


?>
<section class="top-section">
<div class="container">
     <div class="row">
         <div class="col-md-2"></div> <!--EMPTY DIV-->
         <div class="col-md-8">
             <h1>Menu</h1>
             <h1>Get Your Work Done!</h1>
             <form method="POST">
             <div class="form-group">
             <label for="title">WHAT DO YOU NEED TO GET DONE?</label>
             <input type="text" class="form-control" name="title">

             <label for="job-description">DESCRIPTION</label>
             <textarea class="form-control" rows="5" name="description"></textarea>

             <label for="job-budget">BUDGET($$)</label>
             <input type="text" class="form-control" name="price" placeholder="$$">

             <label for="job-location">LOCATION</label>
             <input type="text" class="form-control" name="location">

             <label for="keyword">KEYWORD: <sup>Please seperate keywords with comma</sup></label>
             <input type="text" class="form-control" name="keyword" placeholder="" title="Please seperate keywords with comma">

             </div>
             <input type="submit" class="btn green-white-btn" name="sub" value="POST NOW">
         </div>
        </form>
         <div class="col-md-2"></div> <!--EMPTY DIV-->
     </div>
</div>


</section>
<?php
include $temp.'footer.php';
exit();
?>