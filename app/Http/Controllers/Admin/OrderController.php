<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Order_item;


class OrderController extends Controller
{
    // show all pending order
    public function pending_orders(Request $response)
    {
        $order_model = Order::where('order_items.status','pending')->select('orders.id as id','orders.name As name','orders.created_at As date')
        ->selectRaw('COUNT(order_items.id) as item_count')
        ->selectRaw('SUM(order_items.price) as total_price')
        ->leftJoin('order_items', 'orders.id', '=', 'order_items.order_id')
        ->groupBy('orders.id','orders.name','orders.created_at')
        ->get();







        $result['orders'] = $order_model;
        $result['route'] = 'admin.pending_order';
        $result['section'] = 'admin.pending_order';
        $result['title'] = 'Pending Orders';

        return view('admin.orders',$result);



    }
    // show single pending order
    public function pending_order (Request $request,$id)
    {
        $order_id = $id;
        $order_model = Order_item::where([
            ['order_id','=',$order_id],
            ['status','=','pending']
        ])->get();

        $shiping_model = Order::find($order_id);

        $result['order_item'] = $order_model;
        $result['add'] = $shiping_model;
        $result['section'] = 'admin.pending_order';
        $result['title'] = 'Pending Order';


        return view('admin.pending_order',$result);

    }

    // show all accepted order
    public function accepted_orders(Request $response)
    {
        $order_model = Order::where('order_items.status','accepted')->select('orders.id as id','orders.name As name','orders.created_at As date')
        ->selectRaw('COUNT(order_items.id) as item_count')
        ->selectRaw('SUM(order_items.price) as total_price')
        ->leftJoin('order_items', 'orders.id', '=', 'order_items.order_id')
        ->groupBy('orders.id','orders.name','orders.created_at')
        ->get();







        $result['orders'] = $order_model;
        $result['route'] = 'admin.accepted_order';
        $result['section'] = 'admin.accepted_order';
        $result['title'] = 'Accepted Orders';

        return view('admin.orders',$result);



    }

     // show single accepted order
     public function accepted_order (Request $request,$id)
     {
         $order_id = $id;
         $order_model = Order_item::where([
             ['order_id','=',$order_id],
             ['status','=','accepted']
         ])->get();

         $shiping_model = Order::find($order_id);

         $result['order_item'] = $order_model;
         $result['add'] = $shiping_model;
         $result['section'] = 'admin.accepted_order';
         $result['title'] = 'Accepted Order';


         return view('admin.accepted_order',$result);

     }
    // show all on the way order
    public function on_the_way_orders(Request $response)
    {
        $order_model = Order::where('order_items.status','on the way')->select('orders.id as id','orders.name As name','orders.created_at As date')
        ->selectRaw('COUNT(order_items.id) as item_count')
        ->selectRaw('SUM(order_items.price) as total_price')
        ->leftJoin('order_items', 'orders.id', '=', 'order_items.order_id')
        ->groupBy('orders.id','orders.name','orders.created_at')
        ->get();







        $result['orders'] = $order_model;
        $result['route'] = 'admin.on_the_way_order';
        $result['section'] = 'admin.on_the_way_order';
        $result['title'] = 'On The Way Orders';

        return view('admin.orders',$result);



    }

     // show single on the way order
     public function on_the_way_order (Request $request,$id)
     {
         $order_id = $id;
         $order_model = Order_item::where([
             ['order_id','=',$order_id],
             ['status','=','on the way']
         ])->get();

         $shiping_model = Order::find($order_id);

         $result['order_item'] = $order_model;
         $result['add'] = $shiping_model;
         $result['icon'] = "truck-fast";
         $result['icon_color'] = "#949494";

         $result['section'] = 'admin.on_the_way_order';
         $result['title'] = 'On The Way Order';


         return view('admin.order',$result);

     }
    // show all delivered order
    public function delivered_orders(Request $response)
    {
        $order_model = Order::where('order_items.status','delivered')->select('orders.id as id','orders.name As name','orders.created_at As date')
        ->selectRaw('COUNT(order_items.id) as item_count')
        ->selectRaw('SUM(order_items.price) as total_price')
        ->leftJoin('order_items', 'orders.id', '=', 'order_items.order_id')
        ->groupBy('orders.id','orders.name','orders.created_at')
        ->get();







        $result['orders'] = $order_model;
        $result['route'] = 'admin.delivered_order';
        $result['section'] = 'admin.delivered_order';
        $result['title'] = 'Delivered Orders';

        return view('admin.orders',$result);



    }

     // show single delivered order
     public function delivered_order (Request $request,$id)
     {
         $order_id = $id;
         $order_model = Order_item::where([
             ['order_id','=',$order_id],
             ['status','=','delivered']
         ])->get();

         $shiping_model = Order::find($order_id);

         $result['order_item'] = $order_model;
         $result['add'] = $shiping_model;
         $result['icon'] = "box";
         $result['icon_color'] = "#697896";

         $result['section'] = 'admin.delivered_order';
        $result['title'] = 'Delivered Orders';


         return view('admin.order',$result);

     }
    // show all cancel order
    public function cancel_orders(Request $response)
    {
        $order_model = Order::where('order_items.status','cancel')->select('orders.id as id','orders.name As name','orders.created_at As date')
        ->selectRaw('COUNT(order_items.id) as item_count')
        ->selectRaw('SUM(order_items.price) as total_price')
        ->leftJoin('order_items', 'orders.id', '=', 'order_items.order_id')
        ->groupBy('orders.id','orders.name','orders.created_at')
        ->get();







        $result['orders'] = $order_model;
        $result['route'] = 'admin.cancel_order';
        $result['section'] = 'admin.cancel_order';
        $result['title'] = 'Cancelled Orders';

        return view('admin.orders',$result);



    }

     // show single cancel order
     public function cancel_order (Request $request,$id)
     {
         $order_id = $id;
         $order_model = Order_item::where([
             ['order_id','=',$order_id],
             ['status','=','cancel']
         ])->get();

         $shiping_model = Order::find($order_id);

         $result['order_item'] = $order_model;
         $result['add'] = $shiping_model;
         $result['icon'] = "times";
         $result['icon_color'] = "#e04f1a";

         $result['section'] = 'admin.cancel_order';
        $result['title'] = 'Cancelled Orders';


         return view('admin.order',$result);

     }


    // update singel order status

    public function order_status (Request $request,$id,$order_id)
    {

        $order_model = Order_item::where([['id','=',$id],['status','pending']])->update(['status'=>'accepted']);
        $check_model = Order_item::where([['order_id','=',$order_id],['status','=','pending']])
        ->get()->toarray();
        if(empty($check_model)){
            return redirect()->route('admin.pending_orders');
        }
            return redirect()->back();

    }
    // cancel singel order status

    public function order_cancel (Request $request,$id,$order_id)
    {

        $order_model = Order_item::where([['id','=',$id],['status','pending']])->update(['status'=>'cancel']);
        $check_model = Order_item::where([['order_id','=',$order_id],['status','=','pending']])
        ->get()->toarray();

        // refund algo
        if(empty($check_model)){
            return redirect()->route('admin.pending_orders');
        }
            return redirect()->back();

    }
}
