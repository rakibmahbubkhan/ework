<?php
ob_start();
session_start();
include 'init.php'; 

if ( isset($_SESSION['username']) ){

    //print_r($_SESSION);

    if( $_SERVER['REQUEST_METHOD'] == 'POST' ){

        $formErrors = array();

        $title 		= filter_var($_POST['title'], FILTER_SANITIZE_STRING);
        $desc 		= filter_var($_POST['description'], FILTER_SANITIZE_STRING);
        $price 		= filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_INT);
        $location 	= filter_var($_POST['location'], FILTER_SANITIZE_STRING);
        $category 	= filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);


        if(strlen($title) < 4){
            $formErrors[] = 'The Title Must Be At Least 4 Charecters';
        }
        if(strlen($desc) < 10){
            $formErrors[] = 'The Description Must Be At Least 10 Charecters';
        }
        if(strlen($price)){
            $formErrors[] = 'The Country Must Be Not Empty';
        }
        if(strlen($location) < 2){
            $formErrors[] = 'Country Name Must Be At Least 2 Charecters';
        }
        if(strlen($category)){
            $formErrors[] = 'The Category Must Be Not Empty';
        }
        
        // Check if there's No Error Proceed The Items Update Operation
                if (empty($formErrors)){
                        
                        // Insert New Member's Info Into The Database
                        $stmt = $con->prepare("INSERT INTO jobs(job_title, category_id, description, budget, location) 
                            VALUES(:ztitle, :zcategory, :zdesc, :zprice, :zlocation,) ");

                        $stmt->execute(array(
                            'ztitle' 	    => $title, 
                            'zdesc' 	    => $desc, 
                            'zprice' 	    => $price, 
                            'zlocation' 	=> $location,
                            'zcategory' 	=> $status,
                        ));
                        
                        // Echo Success Message
                        if ($stmt){
                            $successMsg = 'Item Has Been Added';
                        }
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
             <div class="form-group">
             <label for="title">WHAT DO YOU NEED TO GET DONE?</label>
             <input type="text" class="form-control" name="title">

             <label for="job-category">CATEGORY:</label>
                <select class="form-control" name="category">
                    <option>Web development</option>
                    <option>Graphics Design</option>
                    <option>Digital Marketing</option>
                    <option>Data Entry</option>
                    <option>Offline Job</option>
                </select>

             <label for="job-description">DESCRIPTION</label>
             <textarea class="form-control" rows="5" name="description"></textarea>

             <label for="job-budget">BUDGET($$)</label>
             <input type="text" class="form-control" name="price" placeholder="$$">

             <label for="job-location">LOCATION</label>
             <input type="text" class="form-control" name="location">

             </div>
             <a href="#" class="btn green-white-btn">POST NOW</a>
         </div>
         <div class="col-md-2"></div> <!--EMPTY DIV-->
     </div>
</div>


</section>
<?php
include $temp.'footer.php';
?>