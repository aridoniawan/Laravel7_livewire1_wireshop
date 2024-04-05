<?php

namespace App\Http\Livewire\Product;

use Str;
use App\Products;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

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
            'price' => 'required|numeric',
            'image' => 'image|max:2024'
        ]);

        $imageName = '';

        if($this->image){
            $imageName = \Str::slug($this->title, '-')
            . '-'
            . uniqid()
            . '.' . $this->image->getClientOriginalExtension();

            $this->image->storeAs('public', $imageName, 'local');

        }

        Products::create([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'image' => $imageName
        ]);

        $this->reset(['title', 'price', 'description']);
        $this->emit('productStore');
    }
}
