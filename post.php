<?php
include_once 'init.php';
?>
<section class="top-section">
<div class="container">
     <div class="row">
         <div class="col-md-2"></div> <!--EMPTY DIV-->
         <div class="col-md-8">
             <h1>Menu</h1>
             <h1>Get Your Work Done!</h1>
             <div class="form-group">
             <label for="job-title">WHAT DO YOU NEED TO GET DONE?</label>
             <input type="text" class="form-control" id="job-title">

             <label for="job-category">CATEGORY:</label>
                <select class="form-control" id="job-category">
                    <option>Web development</option>
                    <option>Graphics Design</option>
                    <option>Digital Marketing</option>
                    <option>Data Entry</option>
                    <option>Offline Job</option>
                </select>

             <label for="job-description">DESCRIPTION</label>
             <textarea class="form-control" rows="5" id="job-description"></textarea>

             <label for="job-budget">BUDGET($$)</label>
             <input type="text" class="form-control" id="job-budget" placeholder="$$">

             <label for="job-location">LOCATION</label>
             <input type="text" class="form-control" id="job-location">

             </div>
             <a href="#" class="btn green-white-btn">POST NOW</a>
         </div>
         <div class="col-md-2"></div> <!--EMPTY DIV-->
     </div>
</div>
</section>
<?php
include_once 'template/footer.php'
?>