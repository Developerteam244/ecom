
import {host,csrf} from './common.js';

$(document).ready(()=>{




let pmimg_add_btn = $("#add_image");
let pmimg_area = $("#pimage_area");
let pattr_add_btn = $('#pattr_add');
let pattr_area = $('.product_attr');
let pattr_count = 0;


pmimg_add_btn.click(() => {
    let check = $(`<div class="col-lg-4  position-relative">
    <i class="fa fa-circle-xmark pmimage_close"></i>
                                <input type="number" name="piid[]" value="" hidden>

                                <input type="file" class="multi_image" name="pmimage[]">
                            </div>`);

    pmimg_area.append(check);
    let close = check.children('i');
    close.click(()=>{
        check.remove();
    });
    $(".multi_image").dropify();


});

// add attribute

let pmimg_close_btn = $(".pmimage_close")



// add on click funtion  event and remove form the data base;
const mulit_image_close = (element)=>{
    let btn = element;

    let parent = btn.closest(".multiple_image");
     let piid = parent.find(`[name="piid[]"]`);
    let piid_value = piid.val();
    let pid = $(`[name="id"]`).val();
     if (piid_value>0) {

        $.ajax({
            url: `${host}admin/manage_product_process/image/delete`,
            type:"POST",
            data: JSON.stringify({piid:piid_value,pid}),
            dataType:"json",
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN':csrf
            },
            success: function(res){
                console.log(res);

               if (res.res>0) {
                parent.remove();
               }

            }
        })







     }



}
pmimg_close_btn.click(function(e){
   let btn = $(this);
   mulit_image_close(btn);

});




const pattr_add_fun = ()=>{
    pattr_count++;

    let pattr_row = $(`<div class='row'></div>`);
    let size_html = $('.paselect').html();
    size_html = size_html.replace("selected"," ");
    let html = `<input type="number" name="paid[]" value="" hidden>
    <div class="mb-4 col-lg-2 ">
        <label class="form-label" for="">Price</label>
        <div class="input-group">
            <span class="input-group-text">
                ₹
            </span>
            <input type="number" class="form-control number"
                name="price[]" placeholder="00" value="">

        </div>
    </div>
    <div class="mb-4 col-lg-2 ">
        <label class="form-label" for="">Mrp</label>
        <div class="input-group">
            <span class="input-group-text">
                ₹
            </span>
            <input type="number" class="form-control number"
                name="mrp[]" placeholder="00" value="">

        </div>
    </div>



    <div class="mb-4 col-lg-2 ">
        <label class="form-label" for="">Quantity</label>
        <div class="input-group">
            <input type="number" class="form-control number"
            name="qty[]" placeholder="00" value="">
            <span class="input-group-text">
                p
            </span>

        </div>
    </div>
    <div class="mb-4 col-lg-4">
        <label class="form-label" for="dm-ecom-product-name">Size </label>

        <select class="js-select2 form-select" id="size_id_${pattr_count}"  name="size_id[]"
            style="width: 100%;" data-placeholder="Choose Size" >
            ${size_html} </select>

            </div>
            <div class="mb-4 col-lg-2 pattr_div">

                <button type="button" class="btn btn-danger pattr_close ">
                    <i class="fa fa-fw fa-times me-1"></i> Delete
                  </button>



            </div>`;

     pattr_row.html(html);
    pattr_area.append(pattr_row);



    let delete_btn = pattr_row.find('.pattr_close');
    let size_select = $('.js-select2').select2();

    delete_btn.click(()=>{
        pattr_row.remove();
    })

}

pattr_add_btn.click(pattr_add_fun);

const pattr_delete = (element)=>{
    element.remove();
}

// end ready
})
