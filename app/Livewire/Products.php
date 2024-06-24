<?php

namespace App\Livewire;

use App\Models\product;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;

    public $perPage = 4; 

    public function loadMore()
    {
         $this->perPage+=4;
     }

    public function render()
    {
        $products = product::take($this->perPage)->get();
        return view('livewire.products',compact('products'));
    }
}
