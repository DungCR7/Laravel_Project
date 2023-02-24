<div class="row isotope-grid">
    @foreach($products as  $products)
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0" >
							<img src="{{$products ->image}}" alt="IMG-PRODUCT" height ="400px">

							
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="/san-pham/{{ $products->id }}-{{ Str::slug($products->name, '-') }}.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                              {{$products->name}}
								</a>

								<span class="stext-105 cl3">
                                <del text-decoration : line-through> {{$products->price }}</del> {{$products->price_sale }}
								</span>
							</div>

						
						</div>
					</div>
				</div>
   @endforeach
   
			</div>
