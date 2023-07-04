<?php
function prx($arr){
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
}
function getTopNavCat(){
    $result=DB::table('categories')
            ->where(['status'=>1])
            ->get();
            $arr=[];
        //     $arr[0]['category_name']="Home";
        // $arr[0]['parent_id']=0;
		// $arr[0]['category_slug']='';
    foreach($result as $row){
        $arr[$row->id]['category_name']=$row->category_name;
        $arr[$row->id]['parent_id']=$row->parent_id;
		$arr[$row->id]['category_slug']=$row->category_slug;
    }
    // prx($arr);

    $str=buildTreeView($arr,0);
    return $str;
}

$html ='';
$html_child='f';
$child_status = "";

//prx($GLOBALS);

function buildTreeView($arr,$parent,$level=0,$prelevel= -1){

	global $html;
	global $child_status ;

	foreach($arr as $id=>$data){
		if($data['parent_id']==0){
			if($level>$prelevel){
				if($html==''){
					$html.='<ul class="d-none d-lg-block">';
				}

			}
			if($level==$prelevel){
				$html.='</li>';
			}
			$url=url("/category/".$data['category_slug']);
			$html.='<li class="categories__menu--items" ><a class="categories__menu--link" href="'.$url.'">'.$data['category_name'].'<span class="caret"></span></a>';
			if($level>$prelevel){
				$prelevel=$level;
			}
            $child_status="empty";
			$level++;
			$html .= buildChildTreeView($arr,$id,0,-1);
			$level--;
		}

	}
	if($level==$prelevel){
		$html.='</li></ul>';
	}
	return $html;
}

function buildChildTreeView($arr,$parent,$level,$prelevel) {
	  $html_child ='';

	  global  $child_status;

	  //$child_status = 1;
	 $childOrNot = true;




	foreach($arr as $id=>$data){
		if($parent==$data['parent_id'] && $data['parent_id'] != 0){
			if($level>$prelevel){
				if($child_status == 'empty'){
					$html_child.='
                    <ul class="categories__submenu border-radius-10 d-flex ">';
					$childOrNot = true;
					$child_status = "nothing";


				}else{
					$html_child.='<ul class="categories__submenu--child" >';
					$childOrNot = false;



				}

			}
			if($level==$prelevel){
				$html_child.='</li>';
			}
			if($childOrNot){
                $ids =$data['parent_id'];

				$url=url("/category/".$data['category_slug']);
				$html_child.='<li class="categories__submenu--items" ><a href="'.$url.'" class="categories__submenu--items__text"><strong>'.$data['category_name'].'</strong></a>';
			}else{
				$url=url("/category/".$data['category_slug']);
				$html_child.='<li class="categories__submenu--child__items" ><a href="'.$url.'" class="ccategories__submenu--child__items--link">'.$data['category_name'].'</a>';

			}
			if($level>$prelevel){
				$prelevel=$level;
			}
			$level++;

			$html_child .= buildChildTreeView($arr,$id,$level,$prelevel);
			$level--;
		}

	}
	if($level==$prelevel){

		$html_child.='</li></ul>';
	}
	return $html_child;
}


// temp user

function temp_user() {
    $rand = rand(11111,9999999);
    if(session()->has("TEMP_USER")){

        $uid = session()->get("TEMP_USER","default");


    }else{
        $uid= $rand;
        session()->put("TEMP_USER",$uid);

    }
   return $uid;
};


// paren category list
function top_nav_parent_list(){
    $nav_model=DB::table('categories')->select('id','category_name')
            ->where(['status'=>1,
                        'parent_id'=>0])
            ->get();

    if(isset($nav_model[0])){
        return $nav_model;
    }

};



// parent category list end

// mobile navigation
$mobile_html = "";
$parent = 1;
function getMobileTopNavCat(){
    $result=DB::table('categories')
            ->where(['status'=>1])
            ->get();

            foreach($result as $row){
                $arr[$row->id]['category_name']=$row->category_name;
                $arr[$row->id]['parent_id']=$row->parent_id;
                $arr[$row->id]['category_slug']=$row->category_slug;
            }

    $str = buildMobileTreeView($arr,0,0,-1);
    return $str;



}

function buildMobileTreeView($arr,$parent,$level,$prelevel) {
    global $mobile_html;
    $parent_status = 1;

    foreach($arr as $id=>$data){
		if($parent==$data['parent_id']){
			if($level>$prelevel){
				if($mobile_html==''){
					$mobile_html.='<ul class="category__mobile--menu_ul">';
                    $parent_status = 1;
				}else{
					$mobile_html.='<ul class="category__sub--menu">';
                    $parent_status = 0;
				}

			}
			if($level==$prelevel){
				$mobile_html.='</li>';
			}
			$url=url("/category/".$data['category_slug']);
            if ($parent_status) {
                $mobile_html.=' <li class="categories__menu--items"><a class="categories__menu--link" href="'.$url.'">'.$data['category_name'].'</a>';

            }else{

                $mobile_html.=' <li class="categories__submenu--items"><a class="categories__submenu--items__text" href="'.$url.'">'.$data['category_name'].'</a>';
            }
			if($level>$prelevel){
				$prelevel=$level;
			}
			$level++;
			buildMobileTreeView($arr,$id,$level,$prelevel);
			$level--;

		}
	}
	if($level==$prelevel){
		$mobile_html.='</li></ul>';
	}


	return $mobile_html;
}

// mobile navigation end
// cart

function cart($id=0){
    $result['status'] = false;
    $i = 0;

    if($id!=0){
        $where = ['id'=>$id];

    }else{

    if(session()->has("USER_ID")){
        $uid = session("USER_ID");
        $uid_type = 'reg';

        $where= ['user_id'=>$uid,
        'user_type'=>$uid_type];

    }else{
        $uid = session("TEMP_USER");
        $uid_type = 'non-reg';
        $where= ['user_id'=>$uid,
        'user_type'=>$uid_type];
    }
    }
        if(session()->has('USER_ID') || session()->has('TEMP_USER')){
            $cart_model = DB::table('cart')->where($where)->get();

        if(isset($cart_model[0])){

            $result['status'] = true;
            foreach ($cart_model as $key => $value) {
                $product_model = DB::table('products')->where('id','=',$value->product_id)->first();

                $result['cart'][$key]['name'] = $product_model->name;
                $result['cart'][$key]['image'] = $product_model->image;

                $attr_model = DB::table('product_attr')->where('id','=',$value->attr_id)->first();



                $result['cart'][$key]['price'] = $attr_model->price;
                $result['cart'][$key]['mrp'] = $attr_model->mrp;
                $result['cart'][$key]['qty'] = $value->qty;
                $result['cart'][$key]['id'] = $value->id;
                $i++;

            }
        }
    }

    $result['items'] = $i;

    return $result;
}

//

?>
