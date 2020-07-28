		<!-- Footer -->
        <footer class="page-footer font-small indigo footer">
	<!-- Footer Links -->
	<div class="container-fluid text-center text-md-left footer_top">
  
	  <!-- Grid row -->
	  <div class="row" style="text-align: center;">
  
		<!-- Grid column -->
		<div class="col-md-3 mx-auto">
  
		  <!-- Links -->
		  <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h5>
  
		  <ul class="list-unstyled">
			<li>
			  <a href="#!">Very long link 1</a>
			</li>
			<li>
			  <a href="#!">Very long link 2</a>
			</li>
			<li>
			  <a href="#!">Very long link 3</a>
			</li>
			<li>
			  <a href="#!">Very long link 4</a>
			</li>
		  </ul>
  
		</div>
		<!-- Grid column -->
  
		<hr class="clearfix w-100 d-md-none">
  
		<!-- Grid column -->
		<div class="col-md-3 mx-auto">
  
		  <!-- Links -->
		  <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h5>
  
		  <ul class="list-unstyled">
			<li>
			  <a href="#!">Link 1</a>
			</li>
			<li>
			  <a href="#!">Link 2</a>
			</li>
			<li>
			  <a href="#!">Link 3</a>
			</li>
			<li>
			  <a href="#!">Link 4</a>
			</li>
		  </ul>
  
		</div>
		<!-- Grid column -->
  
		<hr class="clearfix w-100 d-md-none">
  
		<!-- Grid column -->
		<div class="col-md-3 mx-auto">
  
		  <!-- Links -->
		  <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h5>
  
		  <ul class="list-unstyled">
			<li>
			  <a href="#!">Link 1</a>
			</li>
			<li>
			  <a href="#!">Link 2</a>
			</li>
			<li>
			  <a href="#!">Link 3</a>
			</li>
			<li>
			  <a href="#!">Link 4</a>
			</li>
		  </ul>
  
		</div>
		<!-- Grid column -->
  
		<hr class="clearfix w-100 d-md-none">
  
		<!-- Grid column -->
		<div class="col-md-3 mx-auto">
  
		  <!-- Links -->
		  <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h5>
  
		  <ul class="list-unstyled">
			<li>
			  <a href="#!">Link 1</a>
			</li>
			<li>
			  <a href="#!">Link 2</a>
			</li>
			<li>
			  <a href="#!">Link 3</a>
			</li>
			<li>
			  <a href="#!">Link 4</a>
			</li>
		  </ul>
  
		</div>
		<!-- Grid column -->
  
	  </div>
	  <!-- Grid row -->
  
	</div>
	<!-- Footer Links -->
  
	<!-- Copyright -->
	<div class="footer-copyright text-center py-3">© 2020 Copyright:
	  <a href="#">ework</a>
	</div>
	<!-- Copyright -->
  
  </footer>
  <!-- Footer -->

	
	
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="layout/js/popper.min.js"></script>
	<script src="layout/js/bootstrap.min.js"></script>
	<script src="layout/js/scripts.js"></script>

	<!-- collapse nav links and .navbar-brand on mobile -->
	<script>
		$('.navbar-nav>li>a').on('click', function(){
			$('.navbar-collapse').collapse('hide');
		});

		// enabling expanded navbar to hide on click
		$('.navbar-brand').on('click', function(){
			$('.navbar-collapse').collapse('hide');
		});
	</script>

<script>
	var slideIndex = 1;
	showSlides(slideIndex);
	
	function plusSlides(n) {
	  showSlides(slideIndex += n);
	}
	
	function currentSlide(n) {
	  showSlides(slideIndex = n);
	}
	
	function showSlides(n) {
	  var i;
	  var slides = document.getElementsByClassName("mySlides");
	  var dots = document.getElementsByClassName("dot");
	  if (n > slides.length) {slideIndex = 1}    
	  if (n < 1) {slideIndex = slides.length}
	  for (i = 0; i < slides.length; i++) {
		  slides[i].style.display = "none";  
	  }
	  for (i = 0; i < dots.length; i++) {
		  dots[i].className = dots[i].className.replace(" active", "");
	  }
	  slides[slideIndex-1].style.display = "block";  
	  dots[slideIndex-1].className += " active";
	}
	</script>
</body>
</html>