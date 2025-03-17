<!-- Popup Section -->
<!--<div id="popup" class="popup-overlay">
	<div class="popup-content">
		<span class="close-btn" id="close-popup">&times;</span>
		<div class="popup-icon">
			<img src="assets/img/logo/popup-logo.png" alt="" />
		</div>
		<div class="space32"></div>
		<div class="heading2">
			<h2>Grow your business with our agency</h2>
			<div class="space8"></div>
			<ul>
				<li><img src="assets/img/icons/check3.svg" alt="" />Elevate User Experience Expertise</li>
				<li><img src="assets/img/icons/check3.svg" alt="" /> Elevate Your UI/UX Skills Designer</li>
				<li><img src="assets/img/icons/check3.svg" alt="" />Join Leading UI/UX Event the Year</li>
			</ul>
		</div>
		<div class="space50"></div>
		<a class="vl-btn2" href="contact"><span class="demo">Buy Ticket Now</span><span class="arrow"><i class="fa-solid fa-arrow-right"></i></span>
		</a>
		<p class="no-thanks">No thanks</p>
	</div>
</div>-->
<!--===== PRELOADER STARTS =======-->
<!-- <div class="preloader">
	<div class="loading-container">
		<div class="loading"></div>
		<div id="loading-icon"><img src="assets/img/logo/preloader.png" alt="" /></div>
	</div>
</div> -->
<!--===== PRELOADER ENDS =======-->

<!--===== PAGE PROGRESS START=======-->
<div class="paginacontainer">
	<div class="progress-wrap">
		<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
			<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
		</svg>
	</div>
</div>
<!--===== PAGE PROGRESS END=======-->

<!--=====HEADER START=======-->
<header>
	<div class="header-area homepage1 header header-sticky d-none d-lg-block" id="header">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="header-elements">
						<div class="site-logo">
							<a href="{{ url('/') }}">
								<img src="{{asset('fronted/assets/mrs-mom-img/logo-white.png')}}" alt="Logo" />
							</a>
						</div>
						<div class="main-menu">
							<ul>	
								<li><a href="{{ url('/') }}">Home</a></li>							
								<li><a href="{{ route('about-us') }}">About Mrs MOM</a></li>
								<li><a href="{{ route('sponsorship') }}">Sponsors</a></li>
								<li><a href="{{ route('gallery') }}">Gallery</a></li>
								<li><a href="{{ route('media') }}">Media</a></li>
								<li><a href="{{ route('registration') }}">Registration</a></li>
								<li><a href="{{ route('contact-us') }}">Contact Us</a></li>
								<!--<li>
									<a href="#">Speakers <i class="fa-solid fa-angle-down"></i></a>
									<ul class="dropdown-padding">
										<li><a href="speakers">Speakers</a></li>
										<li><a href="speakers-single">Speakers Details</a></li>
									</ul>
								</li>-->

							</ul>
						</div>
						<div class="btn-area">
							
							<ul>
								
								<li>
									<a href="https://www.instagram.com/mrsmomevent/" target="_blank">
										<i class="fa-brands fa-instagram"></i>
									</a>
								</li>
								<li>
									<a href="https://www.youtube.com/@DrKShilpiReddy" target="_blank">
										<i class="fa-brands fa-youtube"></i>
									</a>
								</li>
								
							</ul>
						</div>
						
						<div class="body-overlay"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<!--=====HEADER END =======-->

<!--===== MOBILE HEADER STARTS =======-->
<div class="mobile-header mobile-haeder1 d-block d-lg-none">
	<div class="container-fluid">
		<div class="col-12">
			<div class="mobile-header-elements">
				<div class="mobile-logo">
					<a href="{{ url('/') }}">
						<img src="{{asset('fronted/assets/mrs-mom-img/logo-white.png')}}" alt="logo" loading="lazy"/>
					</a>
				</div>
				<div class="mobile-nav-icon dots-menu">
					<i class="fa-solid fa-bars-staggered"></i>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="mobile-sidebar mobile-sidebar1">
	<div class="logosicon-area">
		<div class="logos slide-logos">
			<img src="{{asset('fronted/assets/mrs-mom-img/logo-white.png')}}" alt="logo" loading="lazy"/>
		</div>
		<div class="menu-close">
			<i class="fa-solid fa-xmark"></i>
		</div>
	</div>
	<div class="mobile-nav mobile-nav1">
		<ul class="mobile-nav-list nav-list1">
			<li><a href="{{ url('/') }}">Home</a></li>							
			<li><a href="{{ route('about-us') }}">About Mrs MOM</a></li>
			<li><a href="{{ route('sponsorship') }}">Sponsor</a></li>
			<li><a href="{{ route('gallery') }}">Gallery</a></li>
			<li><a href="{{ route('media') }}">Media</a></li>
			<li><a href="{{ route('registration') }}">Registration</a></li>
			<li><a href="{{ route('contact-us') }}">Contact Us</a></li>
		</ul>
		<div class="allmobilesection">
			<!-- <a href="contact" class="vl-btn1">Contact Now</a> -->
			<div class="single-footer">
				<h3>Contact Info</h3>
				<div class="footer1-contact-info">
					<div class="contact-info-single">
						<div class="contact-info-icon">
							<span><i class="fa-solid fa-phone-volume"></i></span>
						</div>
						<div class="contact-info-text">
							<a href="tel:+91 9503606049">+91 9503606049</a>
						</div>
					</div>
					<div class="contact-info-single">
						<div class="contact-info-icon">
							<span><i class="fa-solid fa-envelope"></i></span>
						</div>
						<div class="contact-info-text">
							<a href="mailto:contact@drkshilpireddy.com">contact@drkshilpireddy.com</a>
						</div>
					</div>
					<div class="single-footer">
						<h3>Our Location</h3>
						<div class="contact-info-single">
							<div class="contact-info-icon">
								<span><i class="fa-solid fa-location-dot"></i></span>
							</div>
							<div class="contact-info-text">
								<a href="mailto:contact@drkshilpireddy.com">In 8 cities nearby Hyderabad</a>
							</div>
						</div>
					</div>
					<div class="single-footer">
						<h3>Social Links</h3>
						<div class="social-links-mobile-menu">
							<ul>
								<li>
									<a href="https://www.youtube.com/@DrKShilpiReddy" target="_blank"><i class="fa-brands fa-youtube"></i></a>
								</li>
								<li>
									<a href="https://www.instagram.com/mrsmomevent/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
								</li>
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--===== MOBILE HEADER STARTS =======-->