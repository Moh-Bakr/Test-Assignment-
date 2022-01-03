<?php
require_once(__DIR__ . '/Backend/Logic/Logic.php');


class Route extends Logic
{
    public static $routes = [];

    public static function resource($uri, $action)
    {
        self::$routes[] = $uri;
        if ($_SERVER['REQUEST_URI'] == $uri) {
            $action->__invoke();
        }
    }

    public static function DeleteProduct()
    {
        parent::DeleteProducts();
    }
}

Route::resource('/', function () {
    $products = Logic::GetProducts();
    $request = Route::DeleteProduct();
    require_once(__DIR__ . '/FrontEnd/components/product-list.php');
});

Route::resource('/add-product', function () {
    require_once(__DIR__ . '/FrontEnd/components/add-product.php');
});