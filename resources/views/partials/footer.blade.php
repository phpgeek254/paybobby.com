<footer class="page-footer">
		<div class="row">
			<div class="col m6 s12">
				<div class="row">
					<div class="col m6 s12">
						<h5 class="center white-text"> Follow Us </h5>
				<div class="center social-media">
				<i class="fa fa-twitter white-text fa-2x"></i>
				<i class="fa fa-facebook white-text fa-2x"></i>
				<i class="fa fa-google white-text fa-2x"></i>
				<i class="fa fa-youtube white-text fa-2x"></i>
				<i class="fa fa-instagram white-text fa-2x"></i>
				<i class="fa fa-linkedin white-text fa-2x"></i>
				</div>
					</div>

					<div class="col m6 s12 center">
						<h5 class="center white-text"> Company Info. </h5>
						<a href="" class="white-text"> About Us </a><br>
						<a href="" class="white-text"> Contact Us </a><br>
						{{-- <a href="" class="white-text"> About Us</a><br>
						<a href="" class="white-text"> About Us</a><br>
						<a href="" class="white-text"> About Us</a><br>
						 --}}
					</div>
				
				</div>

				<div class="row">
					
				</div>

				<div class="row">
					<div class="col s12">
					</div>
				</div>
				
			</div>
			<div class="col m6 s12">
				<h5 class="white-text center">Browse Categories </h5>
				<ul>
					
						@foreach (App\Category::all()->take(18)->chunk(3) as $chunk)
						<div class="row">
							@foreach ($chunk as $category)
								<div class="col m4 s12">
							<li><a class="grey-text text-lighten-3" href="#!">
							{{ $category->name }}
						</a>
						</li>
						</div>
							@endforeach
						
						</div>
					@endforeach
				</ul>
			</div>
		</div>
	<div class="footer-copyright">
		<div class="container white-text">
			© PAYBOBBY {{ date('Y') }}
			<a class="grey-text text-lighten-4 right" href="#!">Powered by ER.Labs</a>
		</div>
	</div>
</footer>