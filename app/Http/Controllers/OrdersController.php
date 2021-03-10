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
   
    function testRequest(Request $req)
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
        
        }   
        catch (Throwable $e)
        {
            $x = "nope";
        }


        return $x;
    }

    function list()
    {
        return Http::get('https://beyondboutiqu.myshopify.com/admin/script_tags.json')->body();
    }
}
