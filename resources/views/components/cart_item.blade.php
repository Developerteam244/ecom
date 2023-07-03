<div class="minicart__product--items d-flex cart_card" data-id="{{$id}}">
    <div class="minicart__thumb">
        <img src="{{asset('storage/media/product/'.$image)}}" alt="prduct-img">
    </div>
    <div class="minicart__text">
        <h4 class="minicart__subtitle"><a href="product-details.html">{{$name}}</a></h4>

        <div class="minicart__price">
            <span class="minicart__current--price">{{$price}}</span>
            <span class="minicart__old--price">{{$mrp}}</span>
        </div>
        <div class="minicart__text--footer d-flex align-items-center">
            <div class="quantity__box minicart__quantity">
                <div class="item_total_price px-4"><b>{{$price*$qty}}</b></div>
                <button type="button" class="quantity__value decrease" aria-label="quantity value"  data-pid="{{$id}}" value="Decrease Value">-</button>
                <label>
                    <input type="number" class="quantity__number cart_item" value="{{$qty}}"  data-counter />
                </label>
                <button type="button" class="quantity__value increase" aria-label="quantity value"  data-pid="{{$id}}" value="Increase Value">+</button>
            </div>
            <button class="minicart__product--remove cart_remove_btn" type="button"  data-pid="{{$id}}">Remove</button>
        </div>
    </div>
</div>
