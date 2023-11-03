
	<!-- SECTION HEADLINE -->
	<div class="section-headline-wrap">
		<div class="section-headline">
			<h2>Shopping Cart</h2>
			<p>Home<span class="separator">/</span><span class="current-section">Shopping Cart</span></p>
		</div>
	</div>
	<!-- /SECTION HEADLINE -->

	<!-- SECTION -->
	<div class="section-wrap">
		<div class="section">
			<!-- SIDEBAR -->
			<div class="sidebar left">
				<!-- SIDEBAR ITEM -->
				<div class="sidebar-item">
					<h4>Redeem Code</h4>
					<hr class="line-separator">
					<form id="coupon-code-form">
						<input type="text" name="coupon_code" placeholder="Enter your coupon code...">
						<button class="button mid dark-light">Apply Coupon Code</button>
					</form>
				</div>
				<!-- /SIDEBAR ITEM -->

				<!-- SIDEBAR ITEM -->
				<div class="sidebar-item">
					<h4>Calculate Shipping</h4>
					<hr class="line-separator">
					<form id="shipping-form">
						<label for="country" class="select-block">
							<select name="country" id="country">
								<option value="0">Select your Country...</option>
								<option value="1">United States</option>
								<option value="2">Argentina</option>
								<option value="3">Brasil</option>
								<option value="4">Japan</option>
							</select>
							<!-- SVG ARROW -->
							<svg class="svg-arrow">
								<use xlink:href="#svg-arrow"></use>
							</svg>
							<!-- /SVG ARROW -->
						</label>
						<label for="state_city" class="select-block">
							<select name="state_city" id="state_city">
								<option value="0">Select your State/City...</option>
								<option value="1">New York</option>
								<option value="2">Buenos Aires</option>
								<option value="3">Brasilia</option>
								<option value="4">Tokyo</option>
							</select>
							<!-- SVG ARROW -->
							<svg class="svg-arrow">
								<use xlink:href="#svg-arrow"></use>
							</svg>
							<!-- /SVG ARROW -->
						</label>
						<input type="text" name="zip_code" placeholder="Enter your Zip Code...">
						<button class="button mid dark-light">Update Shipping Total</button>
					</form>
				</div>
				<!-- /SIDEBAR ITEM -->
			</div>
			<!-- /SIDEBAR -->

			<!-- CONTENT -->
			<div class="content right">
				<!-- CART -->
				<div class="cart">
					<!-- CART HEADER -->
					<div class="cart-header">
						<div class="cart-header-product">
							<p class="text-header small">Product Details</p>
						</div>
						<div class="cart-header-category">
							<p class="text-header small">Qty</p>
						</div>
						<div class="cart-header-price">
							<p class="text-header small">Total</p>
						</div>
						<div class="cart-header-actions">
							<p class="text-header small">Remove</p>
						</div>
					</div>
					<!-- /CART HEADER -->
                    <?php 
                    foreach($cartItems as $item):
                        $pData=$item->product();
                        $purl=route('product.single',[$pData->id]);
                    ?>
					<!-- CART ITEM -->
					<div class="cart-item">
						<!-- CART ITEM PRODUCT -->
						<div class="cart-item-product">
							<!-- ITEM PREVIEW -->
							<div class="item-preview">
								<a href="{{$purl}}">
									<figure class="product-preview-image small liquid">
										<img src="{{$pData->product_image}}" alt="">
									</figure>
								</a>
								<a href="{{$purl}}"><p class="text-header small">{{$pData->product_title}}</p></a>
								<p class="description">{{$pData->product_excerpt}}</p>
							</div>
							<!-- /ITEM PREVIEW -->
						</div>
						<!-- /CART ITEM PRODUCT -->

						<!-- CART ITEM CATEGORY -->
						<div class="cart-item-category">
							<a href="{{$purl}}" class="category primary">₹{{$item->min_price}} x {{$item->qty}}</a>
						</div>
						<!-- /CART ITEM CATEGORY -->

						<!-- CART ITEM PRICE -->
						<div class="cart-item-price">
							<p class="price"><span>₹</span>{{$item->total_amount}}</p>
						</div>
						<!-- /CART ITEM PRICE -->

						<!-- CART ITEM ACTIONS -->
						<div class="cart-item-actions">
							<a href="#" class="button dark-light rmv">
								<!-- SVG PLUS -->
								<svg class="svg-plus">
									<use xlink:href="#svg-plus"></use>	
								</svg>
								<!-- /SVG PLUS -->
							</a>
						</div>
						<!-- /CART ITEM ACTIONS -->
					</div>
                    <?php endforeach;?>
					<!-- /CART ITEM -->

					

					<!-- CART TOTAL -->
					<div class="cart-total">
						<p class="price"><span>₹</span>{{$item->total_amount}}</p>
						<p class="text-header subtotal">Cart Subtotal</p>
					</div>
					<!-- /CART TOTAL -->

					<!-- CART TOTAL -->
					<div class="cart-total">
						<p class="price"><span>$</span>25</p>
						<p class="text-header subtotal">Shipping</p>
					</div>
					<!-- /CART TOTAL -->

					<!-- CART TOTAL -->
					<div class="cart-total">
						<p class="price medium"><span>$</span>127</p>
						<p class="text-header total">Cart Total</p>
					</div>
					<!-- /CART TOTAL -->

					<!-- CART ACTIONS -->
					<div class="cart-actions">
						<a href="checkout.html" class="button mid primary">Proceed to Checkout</a>
						<a href="shop-gridview-v1.html" class="button mid dark-light spaced">Continue Browsing</a>
					</div>
					<!-- /CART ACTIONS -->
				</div>
				<!-- /CART -->
			</div>
			<!-- CONTENT -->
		</div>
	</div>
	<!-- /SECTION -->

	