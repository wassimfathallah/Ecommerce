<?php

namespace App\Livewire;

use App\Models\product;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;

    public $perPage = 12; 

    public function loadMore()
    {
         $this->perPage+=4;
     }

    public function render()
    {
        $products = product::take($this->perPage)->get();
        $productInDB=product::count();

        return view('livewire.products',compact('products','productInDB'));
    }
}
