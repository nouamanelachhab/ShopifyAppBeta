<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Osiset\BasicShopifyAPI\BasicShopifyAPI; 
use Osiset\BasicShopifyAPI\Options; 
use Osiset\BasicShopifyAPI\Session;
use App\Models\User;

class OrdersController extends Controller
{
    protected $shop;
 
    
    protected $options;
   // protected $options->setVersion('2020-01');        
    //protected $api = new BasicShopifyAPI($options);
    protected $api;
    //protected $api->setSession(new Session($shop->name, $shop->password));
   
    function newOrder(Request $req)
    {
        $x = "";
        try
        {
            $shop = User::where('name','beyondboutiqu.myshopify.com')->first();
            $options = new Options();
            $options->setVersion('2020-01');
            $api = new BasicShopifyAPI($options);
            $api->setSession(new Session($shop->name, $shop->password));

            $x= $shop->name;

           //$shop -> api()-> rest ('DELETE', '/admin/api/2021-01/script_tags/168607613122.json');



       

           // $arr = array('script_tag'=>array('event'=>'onload','src' =>$snippet));
           // $arr = array('script_tag'=>array('id'=>148856733851,'src' =>$snippet));
 
             //$shop -> api()-> rest ('POST', '/admin/api/2021-01/script_tags.json' , $arr);
 
            // $shop -> api()-> rest ('PUT', '/admin/api/2021-01/script_tags/148856733851.json',$arr);
            //Delete Request
         // $shop -> api()-> rest ('DELETE', '/admin/api/2021-01/script_tags/168607187138.json');


          
          /*$arr = array('order'=>array('event'=>'onload','src' =>$snippet));*/
            
        $ord = array('order'=>array('line_items'=>array(array('variant_id'=>'39412225376450 ','quantity'=>'1'))));

        //'customer'=>array(array('first_name'=>'nouamane ','last_name'=>'lachhab'))




        //$shop -> api()-> rest ('POST', '/admin/api/2021-01/orders.json', $ord);
  
        $x = "success";
        
        }   
        catch (Throwable $e)
        {
            $x = "nope";
        }

        $address = $req->input('address');
        $client =  $req->input('client');
        $shop_name =  $req->input('shop');
        $variantid = $req->input('myvariantid');

        return $x;
    }

    function list()
    {
        return Http::get('https://beyondboutiqu.myshopify.com/admin/script_tags.json')->body();
    }
}
