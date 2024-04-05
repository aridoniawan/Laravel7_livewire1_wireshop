<?php

namespace App\Http\Livewire\Product;

use App\Products;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $paginate= 10;
    public $search;
    public $formVisible;
    public $formUpdate = false;

    //emit
    protected $listeners = [
        'formClose' => 'formCloseHandler',
        'productStore' => 'productStoreHandler',
        'productUpdated' => 'productUpdatedHandler'
    ];
    // protected $updateQueryString = [
    //     ['search' => ['except' => '']]
    // ]; 

    // public function mount(){
    //     $this->search = request()->query('search', $this->search);
    // }

    public function formCloseHandler(){
        $this->formVisible = false;
    }

    public function productStoreHandler(){
        $this->formVisible = false;
        session()->flash('message', 'Your Product Was Stored');
    }

    public function render()
    {
        $products = $this->search === null ?
             Products::latest()->paginate($this->paginate):
             Products::latest()->where('title', 'like', '%' . $this->search . '%')
                     ->paginate($this->paginate);
        return view('livewire.product.index', compact('products'));
    }

    public function editProduct($productId){

        $this->formUpdate = true; 
        $this->formVisible = true;
        $product = Products::find($productId);
        $this->emit('editProduct', $product);
    }

    public function productUpdatedHandler(){
        $this->formVisible = false;
        session()->flash('message', 'Your Product Was Updated');
    }


}
