<?php

namespace App\Http\Livewire;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartComponent extends Component
{
    public function increaseQuantity($rowId)
    {
        $product=Cart::get($rowId);
        $qty=$product->qty+1;
        Cart::update($rowId,$qty);
    }

    public function decreaseQuantity($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty - 1;
        Cart::update($rowId,$qty);
    }

    public function destroy($rowId)
    {
        Cart::remove($rowId);
        session()->flash('success_message','Item has been removed');
    }

    public function destroyAll(){
        Cart::destroy();

    }


    public function render()
    {
        return view('livewire.cart-component')->layout("Layouts.base");;
    }
}
