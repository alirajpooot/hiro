@extends('frontend.layouts.master')
@section('title', 'Search Companies By Alphabet | Move Klang')
@section('description', "We provides you best business promotion platform")
@section('keywords', 'business, promotions, platform')

@push('css')
<style>
.list-group-item {
    padding: 3px 10px !important;
    font-size: 12px !important;
}
.badge {
    padding: 5px 10px;
    background-color:#eee !important;
    font-size: 15px;
    font-weight: 500;
    border-radius: 3px;
    color:black;
}
</style>
@endpush
@section('content')
    <div class="page-breadcrumbs">
        <h1 class="section-title">Browse Companies by Alphabet</h1>	
    </div>
    <small>Browse Companies by Alphabet - A-Z</small>

    <div class="section" style="background-color: white;">
        <div class="row">
            <div class="col-sm-12">
                <br>
                    @foreach( range('A', 'Z') as $elements) 
            <a href="{{route('companies.alphabet', [$elements])}}" class="badge badge-info">{{$elements}}</a>
                @endforeach
                <div class="clearfix"></div>
                <p class="col-sm-3 mt-8"><small> Companies: {{count($allcomps)}}</small></p>
        </div>
    </div>
</div>

<div class="section">
				<div class="row">
					<div class="col-sm-9">
						<div id="site-content" class="site-content">
							<div class="lifestyle-news">
							</div><!--/.section-->
							<div class="section listing-news">
                                @forelse ($allcomps as $comp)
                                <div class="post">
									<div class="entry-header">
										<div class="entry-thumbnail">
                                        <img class="img-responsive" src="{{ url('public/assets/logos')}}/{{$comp->company_logo}}" alt="" />
										</div>
									</div>
									<div class="post-content">								
										<div class="entry-meta">
											<ul class="list-inline">
												<li class="publish-date"><a href="#"><i class="fa fa-clock-o"></i> Nov 15, 2015 </a></li>
												<li class="views"><a href="#"><i class="fa fa-eye"></i>15k</a></li>
												<li class="loves"><a href="#"><i class="fa fa-heart-o"></i>278</a></li>
											</ul>
                                        </div>
                                        <div class="col-sm-9">
										<h2 class="entry-title">
                                        <a href="news-details.html">{{$comp->company_name}}</a>
										</h2>
										<div class="entry-content">
                                        <p>{{$comp->description}}</p>
                                            <p></p>
                                        <p><i class="fa fa-map-marker"></i> {{$comp->company_address}}</p>
                                        <p><i class="fa fa-phone"></i> {{$comp->primary_phone}}</p>
                                        </div>
                                        </div>
                                        <div class="col-sm-3 text-center"><ul class="list-group">
                                            <li class="list-group-item"><i class="fa fa-plus-square"></i><br>Add Inquiry</li>
                                            <li class="list-group-item"><i class="fa fa-heart-o"></i><br>Favorite</li>
                                            <li class="list-group-item"><i class="fa fa-envelope"></i><br>Contact Company</li>
                                          </ul></div>
									</div>
								</div><!--/post-->    
                                @empty
                                    <h4>No Data Available!</h4>
                                @endforelse
								
								 
								
								<div class="post google-add">
									<div class="add inner-add text-center">
										<a href="#"><img class="img-responsive" src="images/post/google-add.jpg" alt="" /></a>
									</div><!--/.section-->
								</div><!--/.google-add-->
								
							</div>
						</div><!--/#site-content-->
						
						
					</div><!--/.col-sm-9 -->	
					
					<div id="sticky" class="col-sm-3">
						<div id="sitebar">
							<div class="widget">
								<div class="add featured-add">
									<a href="#"><img class="img-responsive" src="{{ asset('public/assets/images/post/add/add1.jpg')}}" alt="" /></a>
								</div>
							</div><!--/#widget-->
							
							<div class="widget follow-us">
								<h1 class="section-title title">Follow Us</h1>
								<ul class="list-inline social-icons">
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
									<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
									<li><a href="#"><i class="fa fa-youtube"></i></a></li>
								</ul>
							</div><!--/#widget-->	
						</div><!--/#sitebar-->
					</div>
				</div>				
			</div><!--/.section-->
@endsection