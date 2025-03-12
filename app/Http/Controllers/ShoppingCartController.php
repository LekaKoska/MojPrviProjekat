<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShoppingCartRequest;
use App\Models\OrdersItem;
use App\Models\OrdersModel;
use App\Models\ShopModel;
use App\Repositories\OrderItemsRepository;
use App\Repositories\OrderRepository;
use App\Repositories\ShoppingCartRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ShoppingCartController extends Controller
{
    private $ShoppingCartRepo;
    private $orderRepo;
    private $orderItemsRepo;
    public function __construct()
    {
        $this->ShoppingCartRepo = new ShoppingCartRepository();
        $this->orderRepo = new OrderRepository();
        $this->orderItemsRepo = new OrderItemsRepository();
    }
    public function addToCart(ShoppingCartRequest $request)
    {
        $product = $this->ShoppingCartRepo->productId($request);

        if($product->amount  < $request->amount)
        {
            return redirect()->back()->with("error", 'Too many items');
        }

        Session::push("products",
            [
                "product_id" => $request->id,
                "amount" => $request->amount
            ]);


       return redirect("/cart");
    }

    public function showCart()
    {
        $cart = Session::get("products");

        if(count($cart) < 1)
        {
            return redirect("/");
        }

        $allProducts = [];                  // Pravimo praznu varijablu kako bi tu dodavali id-jeve proizvoda

        foreach ($cart as $cartItem)
        {
            $allProducts[] = $cartItem['product_id'];               //  Pravimo petlju da predje preko cele sesije i da u varijablu $allProducts doda id ako ga nadje
        }
        $product = ShopModel::whereIn("id", $allProducts)->get();       // Sada nam $allPorducts izgleda ovako = [3,4,8], whereIn sluzi kako bi pronasli sve id-jeve u $allProducts.

        $combined = [];

        foreach (Session::get("products") as $item)
        {
            $productId = $this->ShoppingCartRepo->firstWhereIdProduct($item); // Pronadji mi proizvod koji ima taj ID
            if($productId)
            {
                $combined[] =
                    [
                        'name' => $productId->name,
                        'amount' => $item['amount'],
                        'price' => $productId->price,
                        'total' => $item['amount']*$productId->price
                    ];
            }
        }

        return view("cart",
            [
                "cart" => Session::get("products"),
                "product" => $product,
                "combined" => $combined

            ]);
    }

    public function pay()
    {
        $user = Auth::check();

        if ($user !== true)
        {
            return redirect()->back()->with("error", "Must be logged user!");
        }

        $cart = Session::get("products");
        $totalCartPrice = 0;  // Cena za korpu



        foreach ($cart as $item)         // Predji preko sesije
        {
            $product = $this->ShoppingCartRepo->firstWhereIdProduct($item); // Pronadji mi proizvod koji ima taj ID
            $totalCartPrice += $item['amount'] * $product->amount; // Nadodaj mi u $totalCartPrice cenu proizvoda

        }

        $order = $this->orderRepo->orderCreate($totalCartPrice);


        foreach ($cart as $item)         // Predji preko sesije
        {
            $product = $this->ShoppingCartRepo->firstWhereIdProduct($item);  // Pronadji mi proizvod koji ima taj ID
            $product->amount -= $item['amount'];
            $product->save();

            $this->orderItemsRepo->createOrderItems($order, $product, $item);

        }

        Session::remove("products");

        return view("thankYou");

    }

}
