<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{

    public $items = [];
    public $totalqty;
    public $totalprice;


    public function __Construct($cart = null)
    {
        if($cart){
            $this->items = $cart->items;
            $this->totalqty = $cart->totalqty;
            $this->totalprice = $cart->totalprice;
        }
        else{
            $this->items = [];
            $this->totalqty = 0;
            $this->totalprice = 0;
        }
    }


    public function add($product)
    {
        $item = [
            'id' => $product->id,
            'name' => $product->name,
            'description' => $product->description,
            'price' =>$product->price,
            'qty' => 0,
            'image' => $product->image,
        ];

        if(!array_key_exists($product->id , $this->items)){
            $this->items[$product->id] = $item;
            $this->totalqty += 1;
            $this->totalprice += $product->price;
        }else{
            $this->totalqty += 1 ;
            $this->totalprice += $product->price ;
        }

        $this->items[$product->id]['qty'] += 1;
    }

    public function remove($id)
    {
        if(array_key_exists($id,$this->items))
        {
            $this->totalqty -= $this->items[$id]['qty'];
            $this->totalprice -= $this->items[$id]['qty'] * $this->items[$id]['price'];
            unset($this->items[$id]);
        }
    }

    public function updateqty($id , $qty)
    {
        $this->totalqty -= $this->items[$id]['qty'];
        $this->totalprice -= $this->items[$id]['price'] * $this->items[$id]['qty'];

        $this->items[$id]['qty'] = $qty;

        $this->totalqty += $qty;
        $this->totalprice += $this->items[$id]['price'] * $qty;
    }
}
