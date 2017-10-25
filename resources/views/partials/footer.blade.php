<footer class="page-footer">
		<div class="row">
			<div class="col m6 s12">
				<div class="row">
					<div class="col m6 s12">
						<h5 class="center white-text"> Follow Us </h5>
				<div class="center social-media">
					<a href="https://twitter.com/paybobby"><i class="fa fa-twitter white-text fa-2x"></i></a>
					<a href="https://web.facebook.com/Paybobby-1852118945112377/"><i class="fa fa-facebook white-text fa-2x"></i></a>
					<a href="https://plus.google.com/u/2/"><i class="fa fa-google white-text fa-2x"></i></a>
					<a href=""><i class="fa fa-youtube white-text fa-2x"></i></a>
					<a href="https://www.instagram.com/paybobby/"><i class="fa fa-instagram white-text fa-2x"></i></a>
				<a href="www.linkedin.com/company/27008635/"><i class="fa fa-linkedin white-text fa-2x"></i></a>
				</div>
					</div>

					<div class="col m6 s12 center">
						<h5 class="center white-text"> Company Info. </h5>
						<a href="/about" class="white-text"> About Us </a><br>
						<a href="/contact" class="white-text"> Contact Us </a><br>

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
							<li>
								<a href='/available-jobs/{{ $category->id }}' class="grey-text text-lighten-3" href="#!">
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