<?php

namespace App\Providers;

use App\Models\ShoppingCart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class ShoppingCartProvider extends ServiceProvider
{
   
    public function register()
    {
        //
    }

    public function boot()
    {
        
        view()->composer("*", function($view){

            $session_name = 'shopping_cart_id';//nombre de la session
            if(Auth::check()){
                // dd("si");
                $session_name = 'shopping_cart_id';//nombre de la session
                $shopping_cart = ShoppingCart::get_the_user_shopping_cart(); 
              
               Session::put($session_name, $shopping_cart->id);//se le asigna a la sesion el nombre y el id del shopping cart creado
                $view->with('shopping_cart',$shopping_cart); //las vistas pueden obtener la data del shopping cart con la palabra shopping_cart           
            }else{
                $session_name = 'shopping_cart_id';//nombre de la session
              $shopping_cart = ShoppingCart::get_the_session_shopping_cart();
        Session::put($session_name, $shopping_cart->id);//se le asigna a la sesion el nombre y el id del shopping cart creado
        $view->with('shopping_cart',$shopping_cart); //las vistas pueden obtener la data del shopping cart con la palabra shopping_cart           
            }
        });


//             if(Auth::check()){
//                      $session_name = 'shopping_cart_id';//nombre de la session
//              $shopping_cart_id = Session::get($session_name);//asignamos nombre a la variable session
//               $shopping_cart = ShoppingCart::findOrCreateBySessionId($shopping_cart_id);//enviamos la session creada para crear un carrito
//               Session::put($session_name, $shopping_cart->id);//se le asigna a la sesion el nombre y el id del shopping cart creado
//               $view->with('shopping_cart',$shopping_cart); //las vistas pueden obtener la data del shopping cart con la palabra shopping_cart               
//       }else{
//           $session_name = 'shopping_cart_id';
//                 $shopping_cart = ShoppingCart::get_the_session_shopping_cart();                                                                          //para el usuario
//             Session::put($session_name, $shopping_cart->id);//se le asigna a la sesion el nombre y el id del shopping cart creado
//           $view->with('shopping_cart',$shopping_cart); //las vistas pueden obtener la data del shopping cart con la palabra shopping_cart           
//   }
            
//           });
          
      
    }
}
