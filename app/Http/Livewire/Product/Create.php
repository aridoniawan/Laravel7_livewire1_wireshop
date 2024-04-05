<?php

namespace App\Http\Livewire\Product;

use App\Products;
use Livewire\Component;

class Create extends Component
{
    public $title;
    public $price;
    public $description;
    public $image;

    public function render()
    {
        return view('livewire.product.create');
    }

    public function store(){

        $this->validate([
            'title' => 'required|min:3',
            'description' => 'required|max:180',
            'price' => 'required|numeric'
        ]);

        Products::create([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price
        ]);

        $this->reset(['title', 'price', 'description']);
        $this->emit('productStore');
    }
}
