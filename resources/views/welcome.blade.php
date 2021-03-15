<html>

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="author" content="">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/app.css')}}" class="stylesheet">
</head>

<body>


  @extends('shopify-app::layouts.default');

@section('content')
    <p>Welcome{{ Auth::user()->name}}</p>
@endsection

@section('scripts')
    <script>
        var AppBridge = window['app-bridge'];
        var actions = AppBridge.actions;
        var TiyleBar = actions.TitleBar;
        var Button = actions.Button;
        var Redirect = actions.Redirect;
        var titleBarOptions = {
            tittle : 'Welcome',
        };
        var myTitleBar = TitleBar.create(app,titleBarOptions);
         
    </script>
@endsection

<main>
        <section>
            <div class="card">
            <?php 

            echo 'HII';
            $shop = Auth::user();
            $tags = $shop->api()->rest('GET','/admin/script_tags.json');
            //$snippet = "https://cdn.shopify.com/s/files/1/0533/0947/2923/files/test.js?v=1612889269";
            $snippet = "https://cdn.shopify.com/s/files/1/0538/8405/9842/files/mowr.js?v=1615478707";
       

          // $arr = array('script_tag'=>array('event'=>'onload','src' =>$snippet));
          // $arr = array('script_tag'=>array('id'=>148856733851,'src' =>$snippet));

            //$shop -> api()-> rest ('POST', '/admin/api/2021-01/script_tags.json' , $arr);

           // $shop -> api()-> rest ('PUT', '/admin/api/2021-01/script_tags/148856733851.json',$arr);
           //Delete Request
          $shop -> api()-> rest ('DELETE', '/admin/api/2021-01/script_tags/168694218946.json');
         
          $arr = array('script_tag'=>array('event'=>'onload','src' =>$snippet));

          //$shop -> api()-> rest ('POST', '/admin/api/2021-01/script_tags.json' , $arr); 



        


         

        //ASSETS AND THEME API SCRIPT
        //Get Themes
        
        
        
          $theme =  $shop->api()->rest('GET','/admin/api/2021-01/themes.json',['limits'=>4]);
          $theme = $theme['body']['container']['themes'];
          $themeID ;
          

          foreach($theme as $th)
          {
            if ($th['name'] == 'Debut')
            {
              $themeID = $th['id'];

              echo $themeID.'<br>';
            }
          }
            


          //Getting assets by Theme ID
         /*
          $asset =  $shop->api()->rest('GET','/admin/api/2021-01/themes/'.$themeID.'/assets.json',['limits'=>4]);
          $asset = $asset['body']['container']['assets'];
          */
          /*
          foreach($asset as $ast)
          {
            echo '<br>'.$ast['key'];
          }
          */



          //GETTING CSS FILE
          
          $assetKey = 'assets/theme.css';
     //     $asset =  $shop->api()->rest('GET','/admin/themes/115304857807/assets.json?asset[key]=assets/theme.css',['limits'=>4]);
          $asset = $shop->api()->rest('GET', '/admin/api/2021-01/themes/'.$themeID.'/assets.json', ['asset[key]' => $assetKey]);


                   
          $asset = $asset['body']['asset'];
          
        //  echo $asset['value'];        

          //CLONING THE CSS IN ANOTHER
          $assetKey1= 'assets/theme_clone.css';
          $assetValue = $asset['value'];
          
          $upd = array('asset'=>array('key'=>$assetKey1,'value' =>$assetValue));

          $shop->api()->rest('PUT','/admin/api/2021-01/themes/'.$themeID.'/assets.json',$upd);


          //Making changes to the main css file

         
          $assetValue2 = $asset['value'].'.product-form__cart-submit {display: none;}';
          $upd2 = array('asset'=>array('key'=>$assetKey,'value' =>$assetValue2));
          $shop->api()->rest('PUT','/admin/api/2021-01/themes/'.$themeID.'/assets.json',$upd2);



          echo '<br><br>';
          print_r($shop['api_key']);
          
          echo Auth::user()->email;



       




         
           //asset Update Code
         /*
          $assetKey = 'sections/product-template.liquid';
          $assetValue = '';
         $asset =  array('asset'=>array('key'=>$assetkey ,'value'=>$assetValue));

            $shop -> api()-> rest('PUT','/admin/api/2021-01/themes/118535585947/assets.json',$asset);
          */


         
        /*  
          foreach($themes as $theme)
                    {
                        
                echo 'Theme : '.$theme['name'] .'is  '.$theme['role'].'\n';
                    }

        */

      
           
            ?>
            </div>
        </section>
</main>

  
</body>

</html>

