<?php

namespace App\Http\Livewire\Shop;

use App\Facades\Cart;
use Livewire\Component;

class Cartnav extends Component
{

    public $cartTotal = 0;

    protected $listeners = [
        'addToChart' => 'updateCartTotal'
    ];

    public function mount(){
        $this->updateCartTotal();
    }

    public function updateCartTotal(){
        $this->cartTotal = count(Cart::get()['products']);
    }

    public function render()
    {
        return view('livewire.shop.cartnav');
    }
}
