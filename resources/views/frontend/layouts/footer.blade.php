<!--===== CTA AREA STARTS =======-->
<div class="cta1-section-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 m-auto">
				<div class="cta1-main-boxarea">
					<div class="timer-btn-area">
						<div class="timer">
							<div class="time-box">
								<span id="days1" class="time-value">119</span>
								<br />
							</div>
							<div class="space14"></div>
							<div class="time-box">
								<span id="hours1" class="time-value">22</span>
								<br />
							</div>
							<div class="space14"></div>
							<div class="time-box">
								<span id="minutes1" class="time-value">18</span>
								<br />
							</div>
							<div class="space14"></div>
							<div class="time-box">
								<span id="seconds1" class="time-value">44</span>
								<br />
							</div>
						</div>
						<div class="btn-area1">
							<a href="{{ route('registration') }}" class="vl-btn1">Registrations</a>
						</div>
					</div>
					<!--<ul>
						<li>
							<a href="#"><img src="assets/img/icons/calender1.svg" alt="" />1 December 2025 - 6pm to 11:30pm</a>
						</li>
						<li class="m-0">
							<a href="#"><img src="assets/img/icons/location1.svg" alt="" />In 8 cities nearby Hyderabad</a>
						</li>
					</ul>-->
				</div>
			</div>
		</div>
	</div>
</div>
<!--===== CTA AREA ENDS =======-->
<!--===== FOOTER AREA STARTS =======-->
<div class="footer1-sertion-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-4">
				<div class="footer-logo-area">
					<div class="text-center1">
						<img src="{{asset('fronted/assets/mrs-mom-img/footer-logo.png')}}" alt="logo" />
					</div>
					<div class="space16"></div>
					<p>
						India’s Only Health Pageant for to be Mother. Pregnant couples need 360 holistic care. The journey of pregnancy made beautiful.
					</p>

				</div>
			</div>
			<div class="col-lg-8 col-md-8">
				<div class="row">
					<div class="col-lg-3 col-md-3">
						<div class="link-content">
							<h3>For User</h3>
							<ul>
								<li><a href="{{ route('about-us') }}">About Mrs MOM</a></li>
								<li><a href="blog">Activities</a></li>
								<li><a href="{{ route('gallery') }}">Gallery</a></li>
								<li><a href="{{ route('media') }}">Media</a></li>
								<li><a href="{{ route('blog') }}">Blog</a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-4 col-md-4">
						<div class="link-content2">
							<h3>For Registration</h3>
							<ul>
								<li><a href="{{ route('registration') }}">Registration</a></li>
								<li><a href="{{ route('contact-us') }}">Contact Us</a></li>
								<li><a href="{{ route('about-us') }}">Dr K Shilpi Reddy</a></li>
								<li><a href="{{ route('media') }}">Media</a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-5 col-md-5">
						<div class="link-content2">
							<h3>Connect With Us</h3>
							<!-- <div class="space12"></div> -->
							<ul>
								<li>
									<a href="tel:+91 9503606049">
										<img src="{{asset('fronted/assets/img/icons/phn1.svg')}}" alt="">
										+91 9503606049
									</a>
								</li>
								<!--<li>
									<a href="#">
										<img src="{{asset('fronted/assets/img/icons/location1.svg')}}" alt="">
										In 8 cities nearby Hyderabad
									</a>
								</li>-->
								<li>
									<a href="mailto:drkshilpireddy@gmail.com">
										<img src="{{asset('fronted/assets/img/icons/mail1.svg')}}" alt="">
										drkshilpireddy@gmail.com
									</a>
								</li>

							</ul>
							<div class="social-media social-div">
								<ul>
									<li>
										<a href="https://www.instagram.com/mrsmomevent/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
									</li>
									<li>
										<a href="https://www.youtube.com/@DrKShilpiReddy" target="_blank"><i class="fa-brands fa-youtube"></i></a>
									</li>

								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="other-pages text-center">
							<!-- <h4>Others Pages</h4> -->
							<div class="other-page-link">
								<ul class="other-page-list">
									<li>
										<a href="{{ route('privacy-policy') }}">
											Privacy Policy
										</a>
									</li>
									<li><a href="{{ route('terms-of-use') }}">Terms & Use</a></li>
									<li><a href="{{ route('disclaimer') }}">Disclaimer</a></li>
									<li><a href="{{ route('return-refund') }}">Return / Refund</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="copywrite-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="copyright">
					<p>
						Copyright @ Mrs. Mom Events {{ date('Y') }} | Designed & Maintained by :
						<a href="https://wizards.co.in/" target="_blank">Wizards</a>.
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!--===== FOOTER AREA ENDS =======-->
<div class="toast-container position-fixed top-0 end-0 p-3" id="toastContainer">
    <!-- Toast will be dynamically added here by JavaScript -->
</div>