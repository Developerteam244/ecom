import {add_to_cart} from './cart.js';

let num_count = document.querySelector("select[name='num_count']");
let short_by = document.querySelector("select[name='sort_by']");
let short_type = document.querySelector("select[name='sort_type']");
let items_per_page = 6;
let filter_where ={};
let page = {};
// let page = document.querySelector("[data-page]").getAttribute('data-page');


export {page};



let current = {
    short_by:"date",
    short_type:"desc"
};
let currentPage = 0;
let show_num_count = document.querySelector(".show_num_count");
let apply_btn = document.querySelector("#top_filter_btn");
let product_grid = document.querySelector("#product_grid").querySelector('.row');
let product_lists = document.querySelector("#product_list").querySelector('.row');

let items ='';


let host = location.host;
let fhost = `http://${host}/`;
    let csrf = document.querySelector("meta[name='csrf-token']").getAttribute('content');
    let url = `http://${host}/top_filter`;


    apply_btn.addEventListener("click",e=>{



             filter_condition();


    })


// fetch data function

const fetch_data= async ()=>{



            await fetch(url,{
                method:"POST",
                body:JSON.stringify(page),
                headers:{
                    'Content-type':'application/json; charset=UTF-8',
                    'X-CSRF-TOKEN':csrf
                }
            }).then(response=>{
                return response.json();
            }).then(data=>{
                items = data;

                console.log(data);


            })
            return items;
}


    // product grid html

 const product_grid_html = (item)=>{
    let product = item;
    let html =`

        <div class="col-lg-4 col-md-4 col-sm-6 col-6 custom-col mb-30">
            <article class="product__card">
                <div class="product__card--thumbnail">
                    <a class="product__card--thumbnail__link display-block" href="${fhost}product/${product.slug}">
                        <img class="product__card--thumbnail__img product__primary--img" src="${fhost}storage/media/product/${product.image}" alt="product-img">

                    </a>
                    <span class="product__badge">-${100 - Math.round((product.price/product.mrp)*100) }%</span>

                </div>
                <div class="product__card--content">

                    <h3 class="product__card--title"><a href="${fhost}${product.slug}"> ${product.name} </a></h3>
                    <div class="product__card--price">
                        <span class="current__price">Rs. ${product.price}</span>
                        <span class="old__price"> Rs. ${product.mrp}</span>
                    </div>
                    <div class="product__card--footer add_to_cart"  data-color-cond="0" data-product_slug="${product.slug}" data-size-cond="0" data-size-id="${product.size_id}" data-color-id="${product.color_id}">
                        <a class="product__card--btn primary__btn" href="javascript:void(0)">
                            <svg width="14" height="11" viewBox="0 0 14 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.2371 4H11.5261L8.5027 0.460938C8.29176 0.226562 7.9402 0.203125 7.70582 0.390625C7.47145 0.601562 7.44801 0.953125 7.63551 1.1875L10.0496 4H3.46364L5.8777 1.1875C6.0652 0.953125 6.04176 0.601562 5.80739 0.390625C5.57301 0.203125 5.22145 0.226562 5.01051 0.460938L1.98707 4H0.299574C0.135511 4 0.0183239 4.14062 0.0183239 4.28125V4.84375C0.0183239 5.00781 0.135511 5.125 0.299574 5.125H0.721449L1.3777 9.78906C1.44801 10.3516 1.91676 10.75 2.47926 10.75H11.0339C11.5964 10.75 12.0652 10.3516 12.1355 9.78906L12.7918 5.125H13.2371C13.3777 5.125 13.5183 5.00781 13.5183 4.84375V4.28125C13.5183 4.14062 13.3777 4 13.2371 4ZM11.0339 9.625H2.47926L1.86989 5.125H11.6433L11.0339 9.625ZM7.33082 6.4375C7.33082 6.13281 7.07301 5.875 6.76832 5.875C6.4402 5.875 6.20582 6.13281 6.20582 6.4375V8.3125C6.20582 8.64062 6.4402 8.875 6.76832 8.875C7.07301 8.875 7.33082 8.64062 7.33082 8.3125V6.4375ZM9.95582 6.4375C9.95582 6.13281 9.69801 5.875 9.39332 5.875C9.0652 5.875 8.83082 6.13281 8.83082 6.4375V8.3125C8.83082 8.64062 9.0652 8.875 9.39332 8.875C9.69801 8.875 9.95582 8.64062 9.95582 8.3125V6.4375ZM4.70582 6.4375C4.70582 6.13281 4.44801 5.875 4.14332 5.875C3.8152 5.875 3.58082 6.13281 3.58082 6.4375V8.3125C3.58082 8.64062 3.8152 8.875 4.14332 8.875C4.44801 8.875 4.70582 8.64062 4.70582 8.3125V6.4375Z" fill="currentColor"/>
                            </svg>
                            Add to cart
                        </a>
                    </div>
                </div>
            </article>
        </div>

    `;
return html;
 }

// product list type html
 const product_list_html= (item)=>{
    let product = item;

    let html = ` <div class="col mb-30">
    <div class="product__card product__list d-flex align-items-center">
        <div class="product__card--thumbnail product__list--thumbnail">
            <a class="product__card--thumbnail__link display-block" href="${fhost}product/${product.slug}">
                <img class="product__card--thumbnail__img product__primary--img"src="${fhost}storage/media/product/${product.image}" alt="product-img">

            </a>
            <span class="product__badge">-${100 - Math.round((product.price/product.mrp)*100) }%</span>

        </div>
        <div class="product__card--content product__list--content">
            <h3 class="product__card--title"><a href="${fhost}${product.slug}">  ${product.name} </a></h3>

            <div class="product__list--price">
                <span class="current__price">Rs. ${product.price}</span>
                <span class="old__price"> Rs. ${product.mrp}</span>
            </div>
            <p class="product__card--content__desc mb-20">
             ${product.short_desc}

            </p>
            <a class="product__card--btn primary__btn add_to_cart"  href="javascript:void(0)" data-product_slug="${product.slug}" data-size-cond="0" data-size-id="${product.size_id}" data-color-cond="0" data-color-id="${product.color_id}">+ Add to cart</a>
        </div>
    </div>
</div>`;





return html;
 }


 // short by name
let order = {
    asc:"asc",
    desc:"desc"
};

 const short_by_name = (item,orders)=>{

    let list = item;

    list.sort((a,b)=>{
            if(orders == order.asc){
                return (b.name<a.name)-(a.name<b.name);

            }else{
                return (b.name>a.name)-(a.name>b.name);

            }
    })
    return list;

 }



 const short_by_price = (item,orders)=>{

    let list = item;

    list.sort((a,b)=>{
            if(orders == order.asc){
                return (b.price<a.price)-(a.price<b.price);

            }else{
                return (b.price>a.price)-(a.price>b.price);

            }
    })

    return list;
 }


 // short by date
 const short_by_date = (item,orders)=>{

    let list = item;

    list.sort((a,b)=>{
            if(orders == order.asc){
                return (b.updated_at<a.updated_at)-(a.updated_at<b.updated_at);

            }else{
                return (b.updated_at>a.updated_at)-(a.updated_at>b.updated_at);

            }
    })
    return list;

 }

 const short_default = (item,orders)=>{
    return item;
 }

 const product_list = (obj)=>{

    let page_list ;
    let list = obj.list;

    let total_item = obj.count;
    let num_counts = items_per_page;
    let offset =  obj.offset;
    offset = num_counts*(offset-1);
    let items_count = num_counts+offset;
    let grid_html = '';
    let list_html = '';
    let i;
    for(i=offset;i<total_item&&i<items_count;i++){
        grid_html+= product_grid_html(list[i]);
        list_html+= product_list_html(list[i]);
    }

    product_grid.innerHTML= grid_html;
    product_lists.innerHTML= list_html;

    let add_cart_button_grid = product_grid.querySelectorAll('.add_to_cart');
    let add_cart_button_list = product_lists.querySelectorAll('.add_to_cart');
     add_cart_button_grid.forEach(item=>{
        item.addEventListener("click",add_to_cart);

     });
     add_cart_button_list.forEach(item=>{
        item.addEventListener("click",add_to_cart);
     });

     pagination_fun();
     page_list = document.querySelectorAll(".pagination__list");


     page_list.forEach(page=>{
        page.addEventListener("click",(element)=>{
            pagination_event(page);
        });
     });


 }

 const filter_condition = ()=>{

     currentPage = 1;
     let by = short_by.value;
     let type = short_type.value;
     current.short_by = by;
     current.short_type = type;
     page.order_filter = current;

    let obj= fetch_data();

     obj.then(res=>{

     let offset = currentPage;
    offset = offset?offset:1;
    let data = {
        count:res.count,
        list:res.products,
        offset:offset,
        order:type

    };

    product_list(data);


                    });
 }

 const change_num_count = (element)=>{
    let select_value = Number(element.target.value);
    let grid_items_list = product_grid.children;
    let items_length = grid_items_list.length;
    let list_items_list = product_lists.children;
    let obj = fetch_data();
    if (select_value<items_length) {
        let diff = items_length-select_value;

        for (let i= diff; i<items_length; i++) {
            grid_items_list[i].remove();
            list_items_list[i].remove();

        }

    }else{

        let by =current.short_by;
        let type = current.short_type;
        let offset = document.querySelector('.pagination__item--current').innerText;
        offset = offset?offset:1;
        let data = {
            count:obj.count,
            list:obj.products,
            offset:offset,
            order:type

        };

        switch(by){
            case "name": product_list(short_by_name,data);



                            break;
            case "price": product_list(short_by_price,data);

                            break;
            case "date": product_list(short_by_date,data);

                            break;
            default: product_list(short_default,data);
        }

    }
 }
 num_count.addEventListener("change",change_num_count);

 // pagination



let pagination_list = document.querySelectorAll('.pagination__list');

pagination_list.forEach(page=>{
    page.addEventListener("click",(event)=>{
        event.stopPropagation();

        event.preventDefault();



    })
})


// pagination html

const pagination_fun= ()=>{

    currentPage = currentPage>0?currentPage:1;
    let pagination_list_tag = document.querySelector("#pagination_list");
    let pagination_html = '';
    let obj = items;
    let btn_count = 4;
    let item = Number(obj.count);
    let item_per_page = item>items_per_page?items_per_page:item;
    let total_page = Math.ceil(item/item_per_page);
    if (currentPage>1) {
        pagination_html +=`<li class="pagination__list">
        <a  class="pagination__item--arrow  link " id="prev_page" data-page-type="prev" data-page-no="${currentPage-1}">
            <svg xmlns="http://www.w3.org/2000/svg"  width="22.51" height="20.443" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M244 400L100 256l144-144M120 256h292"/></svg>
            <span class="visually-hidden">page left arrow </span>
        </a>
    </li>`;
    }

    for(let i=currentPage; i<=total_page && i<currentPage+btn_count; i++){

        if (i==currentPage) {
            pagination_html+=`<li class="pagination__list"><span class="pagination__item pagination__item--current" data-page-type="page" data-page-no="${currentPage}">${currentPage}</span></li>`;
        }else{
            if (total_page>btn_count) {

                if (i==currentPage+btn_count-1) {
                    pagination_html += `<li class="pagination__list">...</li>
                    <li class="pagination__list"><a  class="pagination__item link" data-page-type="page" data-page-no="${total_page}">${total_page}</a></li>`;
                    break;
                }
                pagination_html += `<li class="pagination__list"><a  class="pagination__item link"  data-page-type="page" data-page-no="${i}">${i}</a></li>`;

            }else{
                pagination_html += `<li class="pagination__list"><a  class="pagination__item link"  data-page-type="page" data-page-no="${i}">${i}</a></li>`;

            }
        }


    }
    // end loop

    if (currentPage<total_page) {
        pagination_html += `<li class="pagination__list">
        <a  class="pagination__item--arrow  link " id="next_page" data-page-type="next" data-page-no="${currentPage+1}">
            <svg xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M268 112l144 144-144 144M392 256H100"/></svg>
            <span class="visually-hidden">page right arrow</span>
        </a>
        <li>`;

    }

    pagination_list_tag.innerHTML = pagination_html;





}


const pagination_event = (page)=>{
    let obj = fetch_data();
    obj.then(res=>{


    let data ;
    let link_tag = page.querySelector("a");
    let page_type = page.querySelector("[data-page-type]").getAttribute("data-page-type");
    currentPage = Number(page.querySelector("[data-page-no]").getAttribute("data-page-no"));

        let pre = document.querySelector("#prev_page")

        pre?pre.setAttribute("data-page-no",Number(currentPage)-1):" ";

        let next =document.querySelector("#next_page")

            next?next.setAttribute("data-page-no",Number(currentPage)+1):" ";
    data = {
        count:res.count,
        list:res.products,
        offset:currentPage,
        order:"asc"

    };
    product_list(data);
});

}






