 <!-- Product box -->
 <div class="product-card wow animate__animated animate__fadeIn" data-wow-delay=".1s">
    <div class="product-img-col">
        <div class="product-img product-img-zoom">
            <a href="view-product.html">
                <img class="default-img" src="assets/img/shop/product-11.jpg" alt="">
                <img class="hover-img" src="assets/img/shop/product-11.jpg" alt="">
            </a>
        </div>
        <div class="product-inner-details">
            <a aria-label="Quick view" class="product-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
            <a aria-label="Search" class="product-btn" href="#"><i class="fi-rs-search"></i></a>
            <a aria-label="Add To Wishlist" class="product-btn" href="wishlist.html"><i class="fi-rs-heart"></i></a>
             <a href="cart.html" aria-label="Cart" class="product-btn"><i class="fi-rs-shopping-cart"></i></a>
        </div>
        <div class="product-badge">
            <span class="best">Sale</span>
        </div>
    </div>
    <div class="product-content">
        <h2><a href="view-product.html">{{$name}}</a></h2>
        <div class="product-card-bottom mt-0">
            <div class="product-price">
                <span>{{$price}}</span>
                <span class="old-price">{{$mrp}}</span>
                <span class="discount-tag">-{{$discount}}%</span>
            </div>
        </div>
        <div class="product-card-bottom">
            <div class="rating d-inline-block">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
                <i class="far fa-star"></i>
                <span class="ml-5"> (3.5)</span>
            </div>
        </div>
    </div>
</div>
<!-- /Product box -->
