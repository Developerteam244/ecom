let t = {
    product_preview:".product_preview",
    product_preview_html:"",
    product_preview_status:true,
    product_nav_slide:".slide_page",
    product_color:".product_color",
    product_size:".product_size_item",
    condition_container:"#add_to_cart",
    csrf:"#para",

    quantity:"#qty",
    add_cart:".add_to_cart",
    cart_reponse:"#cart_response"

}

let condition ={
    size:{
        msg:"Please Select The Size",
        data:"size-id"
    },
    color:{
        msg:"Please Select The Color",
        data:"color-id"
    }
}



let act = {};








function cart_items_total_amount(){

    let items_price = document.querySelectorAll('.item_total_price');
    let total_amount = 0;
    let total_amount_container = document.querySelector('.mini_cart_total_amount');
    let cart_div = document.querySelector('.offCanvas__minicart');


    if(items_price.length>0){


        items_price.forEach(items=>{
            total_amount += Number(items.innerText);
        })

        total_amount_container.innerText= total_amount;
    }else{
        let item_qty = document.querySelectorAll('.cart_item_count');
        item_qty.forEach(element=>{
            element.remove();
            total_amount_container.innerText= 0;
            cart_div.remove();

        })
    }

}






// set event listener on add to cart
act.add_cart = document.querySelectorAll(t.add_cart);

act.add_cart.forEach(function (element) {
    element.addEventListener('click',add_to_cart);
})

act.condition_container = document.querySelector(t.condition_container);






function add_to_cart(e){
    condition.size.condition = this.getAttribute('data-size-cond');
    condition.color.condition = this.getAttribute('data-color-cond');

    let attr_condition =true;
    let data = {};

    for (list in condition){
        if(condition[list]['condition']){
            condition[list].condition_value = this.getAttribute("data-"+condition[list]['data']);

            if (condition[list]['condition_value']) {


            }else{

                attr_condition = false;
                let responese = document.querySelector(t.cart_reponse)
                responese.innerText = condition[list]['msg'];
                responese.classList.add('response-box','warning');
                return ;
            }
        }
    }
    if(attr_condition){
        //data.attr_id = act.product_attr_id;
        data.slug = this.getAttribute('data-product_slug');
        data.quantity = this.parentNode.querySelector(t.quantity);
        data.quantity = data.quantity? data.quantity.value:1;

        data.color_id = condition.color.condition_value;
        data.size_id = condition.size.condition_value;

        let host = location.host;
        let url = `http://${host}/add_cart`;







        let request = new XMLHttpRequest();
        request.onreadystatechange = function (xhr,status,error) {



            if (this.readyState == 4 && this.status ==200) {
                let responese_box = document.querySelector(t.cart_reponse) ;
                if(responese_box){

                    let responese = JSON.parse(this.response);

                    responese_box.innerText = responese.response;

                    responese_box.classList.add('response-box','success');
                }
                let mini_cart_list = {
                    mini_cart:".offCanvas__minicart"
                }
                let mini_cart = document.querySelector(mini_cart_list.mini_cart);
                // cart exists
                if(mini_cart){
                    if (responese.task == 'inseet') {

                        mini_cart_item_insert(responese);

                    }else if(responese.task=='update'){
                        mini_cart_item_update(responese);
                    }
                }{
                    // cart html not exist
                    cart_html();
                    mini_cart_open_close_event();
                    mini_cart_item_insert(responese);
                }


            }
        }
        let csrf = document.querySelector("meta[name='csrf-token']").getAttribute('content');
        request.open("post",url);
        request.setRequestHeader('Content-Type', 'application/json');

        request.setRequestHeader('X-CSRF-TOKEN', csrf);
        request.send(JSON.stringify(data));
        //request.send();



    }
}
// remove item from cart


function remove_cart_item(item){
    let item_div = document.querySelector(`div.cart_card[data-id="${item}"]`);
    let host = location.host;
    let csrf = document.querySelector("meta[name='csrf-token']").getAttribute('content');

    let url = `http://${host}/delete_cart_item`;
    data = {
        id:item
    };
    let request = new XMLHttpRequest();
        request.onreadystatechange = function (xhr,status,error) {



            if (this.readyState == 4 && this.status ==200) {
                let ans  = this.response;
                ans = JSON.parse(ans);
                if(ans.response>0){
                    item_div.remove();
                    let item_qty = document.querySelectorAll('.cart_item_count');
                let count_item_qty = item_qty.length;
                for (let i =0; i<count_item_qty; i++){
                let qty_container = item_qty[i].innerText;
                let qty = Number(qty_container);
                qty -= 1;
                item_qty[i].innerText = qty;
                console.log(item_qty[i]);

                    }
                    cart_items_total_amount();

                }



            }
        }
        request.open("post",url);
        request.setRequestHeader('Content-Type', 'application/json');
        request.setRequestHeader('X-CSRF-TOKEN', csrf);
        request.send(JSON.stringify(data));




    //item_div.remove();

}



// mini cart html function

 function cart_html() {

    let mini_cart_parent = document.querySelector('header.header__section');
    let mini_cart_sibling = document.querySelector('.predictive__search--box');
    let main_div = document.createElement("div");
    let item_count_mini_cart = document.querySelectorAll(".minicart__open--btn");

    main_div.classList.add('offCanvas__minicart');
    main_div.innerHTML = `<div class="minicart__header ">
    <div class="minicart__header--top d-flex justify-content-between align-items-center">
        <h3 class="minicart__title"> Shopping Cart</h3>
        <button class="minicart__close--btn" aria-label="minicart close btn" data-offcanvas>
            <svg class="minicart__close--icon" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 512 512"><path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M368 368L144 144M368 144L144 368"/></svg>
        </button>
    </div>
    <p class="minicart__header--desc">Digital Product  </p>
</div>
<div class="minicart__product">`;

main_div.innerHTML += `</div>
<div class="minicart__amount">

    <div class="minicart__amount_list d-flex justify-content-between">
        <span>Total:</span>
        <span><b class="mini_cart_total_amount"></b></span>
    </div>
</div>

<div class="minicart__button d-flex justify-content-center">
    <a class="primary__btn minicart__button--link" href="cart.html">View cart</a>
    <a class="primary__btn minicart__button--link" href="checkout.html">Checkout</a>
</div>

</div>`;

mini_cart_parent.insertBefore(main_div,mini_cart_sibling);

item_count_mini_cart.forEach( element=>{
    let span = document.createElement('span');
    span.classList.add('items__count','cart_item_count');
    span.innerText = 0;
    element.appendChild(span);
})


 }

 // mini cart item insert function


 function mini_cart_item_insert(data) {
    let cart = data['cart']['cart'][0];
    let item_id = cart.id;
    let item_parent = document.querySelector('.minicart__product');
    let host = location.host;
    let amount;
    let item_qty = document.querySelectorAll('.cart_item_count');
    let count_item_qty = item_qty.length;
    let total_amount_container = document.querySelector('.mini_cart_total_amount');
    let total_amount = total_amount_container.innerText;
    total_amount = Number(total_amount);


    if(data['task']=='insert'){
        amount = cart.price*cart.qty;
        let item_div = document.createElement('div');
        item_div.classList.add('minicart__product--items','d-flex','cart_card');
        item_div.setAttribute('data-id',item_id);
        item_div.innerHTML = `<div class="minicart__thumb">
        <img src="http://${host}/storage/media/product/${cart.image}" alt="prduct-img">
    </div>
    <div class="minicart__text">
        <h4 class="minicart__subtitle"><a href="product-details.html">${cart.name}</a></h4>

        <div class="minicart__price">
            <span class="minicart__current--price">${cart.price}</span>
            <span class="minicart__old--price">${cart.mrp}</span>
        </div>
        <div class="minicart__text--footer d-flex align-items-center">
            <div class="quantity__box minicart__quantity">
            <div class="item_total_price px-4"><b>${cart.price*cart.qty}</b></div>
                <button type="button" class="quantity__value decrease" aria-label="quantity value" onclick="fire_change_event(this)" value="Decrease Value">-</button>
                <label>
                    <input type="number" class="quantity__number cart_item" onclick="cart_qty_change(this,{{$id}})" value="${cart.qty}" data-counter />
                </label>
                <button type="button" class="quantity__value increase" aria-label="quantity value" onclick="fire_change_event(this)" value="Increase Value">+</button>
            </div>
            <button class="minicart__product--remove" type="button" onchange="remove_cart_item(${cart.id})">Remove</button>
        </div>
    </div>`;
    item_parent.appendChild(item_div);
    total_amount_container.innerText = total_amount+amount;

    for (let i =0; i<count_item_qty; i++){
        let qty_container = item_qty[i].innerText;
        let qty = Number(qty_container);
        qty += 1;
        item_qty[i].innerText = qty;


    }

    }
 }


 //  mini cart item update

 function mini_cart_item_update(data) {
    let cart = data['cart']['cart'][0];
    let item_id = cart.id;

    let mini_cart_product = document.querySelector('.minicart__product');
    let item_div = mini_cart_product.querySelector(`[data-id="${item_id}"]`);
    let cart_item_html= `<div class="minicart__thumb">
    <img src="http://${host}/storage/media/product/${cart.image}" alt="prduct-img">
</div>
<div class="minicart__text">
    <h4 class="minicart__subtitle"><a href="product-details.html">${cart.name}</a></h4>

    <div class="minicart__price">
        <span class="minicart__current--price">${cart.price}</span>
        <span class="minicart__old--price">${cart.mrp}</span>
    </div>
    <div class="minicart__text--footer d-flex align-items-center">
        <div class="quantity__box minicart__quantity">
        <div class="item_total_price px-4"><b>${cart.price*cart.qty}</b></div>
            <button type="button" class="quantity__value decrease" aria-label="quantity value" onclick="fire_change_event(this)" value="Decrease Value">-</button>
            <label>
                <input type="number" class="quantity__number cart_item" onchange="cart_qty_change(this,{{$id}})" value="${cart.qty}" data-counter />
            </label>
            <button type="button" class="quantity__value increase" aria-label="quantity value" onclick="fire_change_event(this)" value="Increase Value">+</button>
        </div>
        <button class="minicart__product--remove" type="button" onclick="remove_cart_item(${cart.id})">Remove</button>
    </div>
</div>`;

cart_items_total_amount();

 }

function mini_cart_open_close_event(){
    let click_open = document.querySelectorAll('a.minicart__open--btn');
    let cart_div = document.querySelector('.offCanvas__minicart');
    let click_close = document.querySelector('.minicart__close--btn');


    click_open.forEach((element) => {
        element.addEventListener("click", ()=>{
            cart_div.classList.add('active');
        })

    });
    click_close.addEventListener("click",()=>{
        cart_div.classList.remove('active');
    })
 }

function cart_qty_change(element,id){
    let item_id = id;
    let item_qty_value = element.value>0 ? element.value:0;

    let host = location.host;
    let csrf = document.querySelector("meta[name='csrf-token']").getAttribute('content');
    let url = `http://${host}/cart_quatity_update`;

    fetch(url,{
        method:"POST",
        body:JSON.stringify({id:id,
            value:item_qty_value
            }),
        headers:{
            'Content-type':'application/json; charset=UTF-8',
            'X-CSRF-TOKEN':csrf
        }
    }).then(response=>{
        return response.json();
    }).then(data=>{
        console.log(data);
    })

}

function fire_change_event(element,task,id){
    let input = element.parentNode.querySelector('input');
    let input_value = Number(input.value);
    let item_qty_value = input_value;
    let item_total = element.parentNode.querySelector('.item_total_price');
    let item_price = element.closest('.minicart__text').querySelector('.minicart__current--price').innerText
    item_price = Number(item_price);
    let item_id = id;

    let host = location.host;
    let csrf = document.querySelector("meta[name='csrf-token']").getAttribute('content');
    let url = `http://${host}/cart_quatity_update`;
   if(task=="add"){
    item_qty_value +=1;
   }else if(task=="sub"){
    item_qty_value = item_qty_value>0 ? item_qty_value-1:0;
   }

   fetch(url,{
    method:"POST",
    body:JSON.stringify({id:id,
        value:item_qty_value
        }),
    headers:{
        'Content-type':'application/json; charset=UTF-8',
        'X-CSRF-TOKEN':csrf
    }
}).then(response=>{
    return response.json();
}).then(data=>{

    item_total.innerText = item_price*item_qty_value;
    cart_items_total_amount();
})








}

