<?php

namespace App\Http\Livewire\Shop;

use App\Products;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $search;

    protected $updateQueryString =[
        ['search' => ['except' =>'']]
    ];

    public function mount(){
        $this->search = request()->query('search', $this->search);
    }

    public function render()
    {
        $products = $this->search === null ?
            Products::latest()->paginate(8):
            Products::latest()->where('title', 'like', '%' . $this->search . '%')->paginate(8);
        return view('livewire.shop.index', compact('products'));
    }
}
