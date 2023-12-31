import { condition } from "./cart.js";



act.product_preview = document.querySelector('.product_preview');
act.product_preview_html = act.product_preview.innerHTML;
act.product_preview_status = true;
act.product_nav_slide = document.querySelectorAll(".slide_page");

// set event listener on nav product
act.product_nav_slide.forEach(function (element) {

    element.addEventListener("click", function(e){
        if (!act.product_preview_status) {
            act.product_preview.innerHTML = act.product_preview_html;
            act.product_preview_status = true;
        }

    })
})

// set event listner on color

act.product_color = document.querySelectorAll(".product_color");




act.product_color.forEach(function (element) {

    element.addEventListener("click", product_preview_color);

});


function product_preview_color(e){
    let image = this.getAttribute('data-product-image');
    e.stopImmediatePropagation();
    e.stopPropagation();



    act.product_preview_status = false;
    if(act.hasOwnProperty('product_size_attr')){

        act.product_color_id = this.getAttribute('data-color-id');
    }
    act.product_attr_id = this.getAttribute('data-id');
    document.querySelector("#add_to_cart").setAttribute('data-color-id',act.product_color_id);
    condition.color.condition_value = act.product_color_id;
    act.product_preview.innerHTML = `<div class="product__media--preview__items">
    <a class="product__media--preview__items--link glightbox" data-gallery="product-media-preview" href="http://127.0.0.1:8000/storage/media/attr_image/${image}"><img class="product__media--preview__items--img" src="http://127.0.0.1:8000/storage/media/attr_image/${image}"></a>
    <div class="product__media--view__icon">
        <a class="product__media--view__icon--link glightbox" href="http://127.0.0.1:8000/storage/media/product/1686117526.png" data-gallery="product-media-preview">
            <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path></svg>
            <span class="visually-hidden">product view</span>
        </a>
    </div>
</div>`;


}


act.product_size = document.querySelectorAll(".product_size_item");
act.product_size.forEach(function (element) {

    element.addEventListener("click", click_size);

})



function click_size(e) {
    act.product_size_attr = this.getAttribute('data-size');

    act.product_color.forEach(function (color) {
        let color_atr_size = color.getAttribute('data-size');
        if (condition['color'].hasOwnProperty('condition_value')) {

            delete condition['color']['condition_value'];
        }
        if(act.product_size_attr == color_atr_size){
            color.style.display = "block";
        }else{

            color.style.display = "none";
        }
    })
    document.querySelector("#add_to_cart").setAttribute('data-size-id',act.product_size_attr);
    //act.product_size_id = this.getAttribute('data-size-id');
    //condition.size.condition_value = act.product_size_id;

}
