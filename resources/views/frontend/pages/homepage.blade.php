@extends('frontend.layouts.master');
@push('css')

@endpush

@section('content')
<!-- Intro Banner
================================================== -->
<!-- add class "disable-gradient" to enable consistent background overlay -->
<div class="intro-banner" data-background-image="{{asset('public/assets/images/home-background.jpg')}}">
	<div class="container">
		
		<!-- Intro Headline -->
		<div class="row">
			<div class="col-md-12">
				<div class="banner-headline">
					<h3>
						<strong>Hire experts or be hired for any job, any time.</strong>
						<br>
						<span>Thousands of small businesses use <strong class="color">Hireo</strong> to turn their ideas into reality.</span>
					</h3>
				</div>
			</div>
		</div>
		
		<!-- Search Bar -->
		<div class="row">
			<div class="col-md-12">
				<div class="intro-banner-search-form margin-top-95">

					<!-- Search Field -->
					<div class="intro-search-field with-autocomplete">
						<label for="autocomplete-input" class="field-title ripple-effect">Where?</label>
						<div class="input-with-icon">
							<input id="autocomplete-input" type="text" placeholder="Online Job">
							<i class="icon-material-outline-location-on"></i>
						</div>
					</div>

					<!-- Search Field -->
					<div class="intro-search-field">
						<label for ="intro-keywords" class="field-title ripple-effect">What job you want?</label>
						<input id="intro-keywords" type="text" placeholder="Job Title or Keywords">
					</div>

					<!-- Button -->
					<div class="intro-search-button">
						<button class="button ripple-effect" onclick="window.location.href='jobs-list-layout-full-page-map.html'">Search</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Stats -->
		<div class="row">
			<div class="col-md-12">
				<ul class="intro-stats margin-top-45 hide-under-992px">
					<li>
						<strong class="counter">1,586</strong>
						<span>Jobs Posted</span>
					</li>
					<li>
						<strong class="counter">3,543</strong>
						<span>Tasks Posted</span>
					</li>
					<li>
						<strong class="counter">1,232</strong>
						<span>Freelancers</span>
					</li>
				</ul>
			</div>
		</div>

	</div>
</div>


<!-- Content
================================================== -->
<!-- Category Boxes -->
<div class="section margin-top-65">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">

				<div class="section-headline centered margin-bottom-15">
					<h3>Popular Job Categories</h3>
				</div>

				<!-- Category Boxes Container -->
				<div class="categories-container">

					<!-- Category Box -->
					<a href="jobs-grid-layout-full-page.html" class="category-box">
						<div class="category-box-icon">
							<i class="icon-line-awesome-file-code-o"></i>
						</div>
						<div class="category-box-counter">612</div>
						<div class="category-box-content">
							<h3>Web & Software Dev</h3>
							<p>Software Engineer, Web / Mobile Developer & More</p>
						</div>
					</a>

					<!-- Category Box -->
					<a href="jobs-list-layout-full-page-map.html" class="category-box">
						<div class="category-box-icon">
							<i class="icon-line-awesome-cloud-upload"></i>
						</div>
						<div class="category-box-counter">113</div>
						<div class="category-box-content">
							<h3>Data Science & Analitycs</h3>
							<p>Data Specialist / Scientist, Data Analyst & More</p>
						</div>
					</a>

					<!-- Category Box -->
					<a href="jobs-list-layout-full-page-map.html" class="category-box">
						<div class="category-box-icon">
							<i class="icon-line-awesome-suitcase"></i>
						</div>
						<div class="category-box-counter">186</div>
						<div class="category-box-content">
							<h3>Accounting & Consulting</h3>
							<p>Auditor, Accountant, Fnancial Analyst & More</p>
						</div>
					</a>

					<!-- Category Box -->
					<a href="jobs-list-layout-1.html" class="category-box">
						<div class="category-box-icon">
							<i class="icon-line-awesome-pencil"></i>
						</div>
						<div class="category-box-counter">298</div>
						<div class="category-box-content">
							<h3>Writing & Translations</h3>
							<p>Copywriter, Creative Writer, Translator & More</p>
						</div>
					</a>

					<!-- Category Box -->
					<a href="jobs-list-layout-2.html" class="category-box">
						<div class="category-box-icon">
							<i class="icon-line-awesome-pie-chart"></i>
						</div>
						<div class="category-box-counter">549</div>						
						<div class="category-box-content">
							<h3>Sales & Marketing</h3>
							<p>Brand Manager, Marketing Coordinator & More</p>
						</div>
					</a>

					<!-- Category Box -->
					<a href="jobs-list-layout-1.html" class="category-box">
						<div class="category-box-icon">
							<i class="icon-line-awesome-image"></i>
						</div>
						<div class="category-box-counter">873</div>
						<div class="category-box-content">
							<h3>Graphics & Design</h3>
							<p>Creative Director, Web Designer & More</p>
						</div>
					</a>

					<!-- Category Box -->
					<a href="jobs-list-layout-2.html" class="category-box">
						<div class="category-box-icon">
							<i class="icon-line-awesome-bullhorn"></i>
						</div>
						<div class="category-box-counter">125</div>
						<div class="category-box-content">
							<h3>Digital Marketing</h3>
							<p>Darketing Analyst, Social Profile Admin & More</p>
						</div>
					</a>

					<!-- Category Box -->
					<a href="jobs-grid-layout-full-page.html" class="category-box">
						<div class="category-box-icon">
							<i class="icon-line-awesome-graduation-cap"></i>
						</div>
						<div class="category-box-counter">445</div>
						<div class="category-box-content">
							<h3>Education & Training</h3>
							<p>Advisor, Coach, Education Coordinator & More</p>
						</div>
					</a>

				</div>

			</div>
		</div>
	</div>
</div>
<!-- Category Boxes / End -->


<!-- Highest Rated Freelancers -->
<div class="section gray padding-top-65 padding-bottom-70 full-width-carousel-fix">
	<div class="container">
		<div class="row">

			<div class="col-xl-12">
				<!-- Section Headline -->
				<div class="section-headline margin-top-0 margin-bottom-25">
					<h3>Highest Rated Freelancers</h3>
					<a href="freelancers-grid-layout.html" class="headline-link">Browse All Freelancers</a>
				</div>
			</div>

			<div class="col-xl-12">
				<div class="default-slick-carousel freelancers-container freelancers-grid-layout">

					<!--Freelancer -->
					<div class="freelancer">

						<!-- Overview -->
						<div class="freelancer-overview">
							<div class="freelancer-overview-inner">
								
								<!-- Bookmark Icon -->
								<span class="bookmark-icon"></span>
								
								<!-- Avatar -->
								<div class="freelancer-avatar">
									<div class="verified-badge"></div>
									<a href="single-freelancer-profile.html"><img src="images/user-avatar-big-01.jpg" alt=""></a>
								</div>

								<!-- Name -->
								<div class="freelancer-name">
									<h4><a href="single-freelancer-profile.html">Tom Smith <img class="flag" src="images/flags/gb.svg" alt="" title="United Kingdom" data-tippy-placement="top"></a></h4>
									<span>UI/UX Designer</span>
								</div>

								<!-- Rating -->
								<div class="freelancer-rating">
									<div class="star-rating" data-rating="5.0"></div>
								</div>
							</div>
						</div>
						
						<!-- Details -->
						<div class="freelancer-details">
							<div class="freelancer-details-list">
								<ul>
									<li>Location <strong><i class="icon-material-outline-location-on"></i> London</strong></li>
									<li>Rate <strong>$60 / hr</strong></li>
									<li>Job Success <strong>95%</strong></li>
								</ul>
							</div>
							<a href="single-freelancer-profile.html" class="button button-sliding-icon ripple-effect">View Profile <i class="icon-material-outline-arrow-right-alt"></i></a>
						</div>
					</div>
					<!-- Freelancer / End -->

					<!--Freelancer -->
					<div class="freelancer">

						<!-- Overview -->
						<div class="freelancer-overview">
							<div class="freelancer-overview-inner">
								
								<!-- Bookmark Icon -->
								<span class="bookmark-icon"></span>
								
								<!-- Avatar -->
								<div class="freelancer-avatar">
									<div class="verified-badge"></div>
									<a href="single-freelancer-profile.html"><img src="images/user-avatar-big-02.jpg" alt=""></a>
								</div>

								<!-- Name -->
								<div class="freelancer-name">
									<h4><a href="#">David Peterson <img class="flag" src="images/flags/de.svg" alt="" title="Germany" data-tippy-placement="top"></a></h4>
									<span>iOS Expert + Node Dev</span>
								</div>

								<!-- Rating -->
								<div class="freelancer-rating">
									<div class="star-rating" data-rating="5.0"></div>
								</div>
							</div>
						</div>
						
						<!-- Details -->
						<div class="freelancer-details">
							<div class="freelancer-details-list">
								<ul>
									<li>Location <strong><i class="icon-material-outline-location-on"></i> Berlin</strong></li>
									<li>Rate <strong>$40 / hr</strong></li>
									<li>Job Success <strong>88%</strong></li>
								</ul>
							</div>
							<a href="single-freelancer-profile.html" class="button button-sliding-icon ripple-effect">View Profile <i class="icon-material-outline-arrow-right-alt"></i></a>
						</div>
					</div>
					<!-- Freelancer / End -->

					<!--Freelancer -->
					<div class="freelancer">

						<!-- Overview -->
						<div class="freelancer-overview">
							<div class="freelancer-overview-inner">
								<!-- Bookmark Icon -->
								<span class="bookmark-icon"></span>
								
								<!-- Avatar -->
								<div class="freelancer-avatar">
									<a href="single-freelancer-profile.html"><img src="images/user-avatar-placeholder.png" alt=""></a>
								</div>

								<!-- Name -->
								<div class="freelancer-name">
									<h4><a href="#">Marcin Kowalski <img class="flag" src="images/flags/pl.svg" alt="" title="Poland" data-tippy-placement="top"></a></h4>
									<span>Front-End Developer</span>
								</div>

								<!-- Rating -->
								<div class="freelancer-rating">
									<div class="star-rating" data-rating="4.9"></div>
								</div>
							</div>
						</div>
						
						<!-- Details -->
						<div class="freelancer-details">
							<div class="freelancer-details-list">
								<ul>
									<li>Location <strong><i class="icon-material-outline-location-on"></i> Warsaw</strong></li>
									<li>Rate <strong>$50 / hr</strong></li>
									<li>Job Success <strong>100%</strong></li>
								</ul>
							</div>
							<a href="single-freelancer-profile.html" class="button button-sliding-icon ripple-effect">View Profile <i class="icon-material-outline-arrow-right-alt"></i></a>
						</div>
					</div>
					<!-- Freelancer / End -->

					<!--Freelancer -->
					<div class="freelancer">

						<!-- Overview -->
						<div class="freelancer-overview">
								<div class="freelancer-overview-inner">
								<!-- Bookmark Icon -->
								<span class="bookmark-icon"></span>
								
								<!-- Avatar -->
								<div class="freelancer-avatar">
									<div class="verified-badge"></div>
									<a href="single-freelancer-profile.html"><img src="images/user-avatar-big-03.jpg" alt=""></a>
								</div>

								<!-- Name -->
								<div class="freelancer-name">
									<h4><a href="#">Sindy Forest <img class="flag" src="images/flags/au.svg" alt="" title="Australia" data-tippy-placement="top"></a></h4>
									<span>Magento Certified Developer</span>
								</div>

								<!-- Rating -->
								<div class="freelancer-rating">
									<div class="star-rating" data-rating="5.0"></div>
								</div>
							</div>
						</div>
						
						<!-- Details -->
						<div class="freelancer-details">
							<div class="freelancer-details-list">
								<ul>
									<li>Location <strong><i class="icon-material-outline-location-on"></i> Brisbane</strong></li>
									<li>Rate <strong>$70 / hr</strong></li>
									<li>Job Success <strong>100%</strong></li>
								</ul>
							</div>
							<a href="single-freelancer-profile.html" class="button button-sliding-icon ripple-effect">View Profile <i class="icon-material-outline-arrow-right-alt"></i></a>
						</div>
					</div>
					<!-- Freelancer / End -->
					
					<!--Freelancer -->
					<div class="freelancer">

						<!-- Overview -->
						<div class="freelancer-overview">
								<div class="freelancer-overview-inner">
								<!-- Bookmark Icon -->
								<span class="bookmark-icon"></span>
								
								<!-- Avatar -->
								<div class="freelancer-avatar">
									<a href="single-freelancer-profile.html"><img src="images/user-avatar-placeholder.png" alt=""></a>
								</div>

								<!-- Name -->
								<div class="freelancer-name">
									<h4><a href="#">Sebastiano Piccio <img class="flag" src="images/flags/it.svg" alt="" title="Italy" data-tippy-placement="top"></a></h4>
									<span>Laravel Dev</span>
								</div>

								<!-- Rating -->
								<div class="freelancer-rating">
									<div class="star-rating" data-rating="4.5"></div>
								</div>
							</div>
						</div>
						
						<!-- Details -->
						<div class="freelancer-details">
							<div class="freelancer-details-list">
								<ul>
									<li>Location <strong><i class="icon-material-outline-location-on"></i> Milan</strong></li>
									<li>Rate <strong>$80 / hr</strong></li>
									<li>Job Success <strong>89%</strong></li>
								</ul>
							</div>
							<a href="single-freelancer-profile.html" class="button button-sliding-icon ripple-effect">View Profile <i class="icon-material-outline-arrow-right-alt"></i></a>
						</div>
					</div>
					<!-- Freelancer / End -->
								
					<!--Freelancer -->
					<div class="freelancer">

						<!-- Overview -->
						<div class="freelancer-overview">
								<div class="freelancer-overview-inner">
								<!-- Bookmark Icon -->
								<span class="bookmark-icon"></span>
								
								<!-- Avatar -->
								<div class="freelancer-avatar">
									<a href="single-freelancer-profile.html"><img src="images/user-avatar-placeholder.png" alt=""></a>
								</div>

								<!-- Name -->
								<div class="freelancer-name">
									<h4><a href="#">Gabriel Lagueux <img class="flag" src="images/flags/fr.svg" alt="" title="France" data-tippy-placement="top"></a></h4>
									<span>WordPress Expert</span>
								</div>

								<!-- Rating -->
								<div class="freelancer-rating">
									<div class="star-rating" data-rating="5.0"></div>
								</div>
							</div>
						</div>
						
						<!-- Details -->
						<div class="freelancer-details">
							<div class="freelancer-details-list">
								<ul>
									<li>Location <strong><i class="icon-material-outline-location-on"></i> Paris</strong></li>
									<li>Rate <strong>$50 / hr</strong></li>
									<li>Job Success <strong>100%</strong></li>
								</ul>
							</div>
							<a href="single-freelancer-profile.html" class="button button-sliding-icon ripple-effect">View Profile <i class="icon-material-outline-arrow-right-alt"></i></a>
						</div>
					</div>
					<!-- Freelancer / End -->


				</div>
			</div>

		</div>
	</div>
</div>
<!-- Highest Rated Freelancers / End-->
@endsection

@push('js')
<script>
// Snackbar for user status switcher
$('#snackbar-user-status label').click(function() { 
	Snackbar.show({
		text: 'Your status has been changed!',
		pos: 'bottom-center',
		showAction: false,
		actionText: "Dismiss",
		duration: 3000,
		textColor: '#fff',
		backgroundColor: '#383838'
	}); 
}); 
</script>


<!-- Google Autocomplete -->
<script>
	function initAutocomplete() {
		 var options = {
		  types: ['(cities)'],
		  // componentRestrictions: {country: "us"}
		 };

		 var input = document.getElementById('autocomplete-input');
		 var autocomplete = new google.maps.places.Autocomplete(input, options);
	}

	// Autocomplete adjustment for homepage
	if ($('.intro-banner-search-form')[0]) {
	    setTimeout(function(){ 
	        $(".pac-container").prependTo(".intro-search-field.with-autocomplete");
	    }, 300);
	}

</script>

<!-- Google API -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgeuuDfRlweIs7D6uo4wdIHVvJ0LonQ6g&libraries=places&callback=initAutocomplete"></script>
@endpush