<?php

namespace App\Http\Livewire\Frontend\Prduct;

use Livewire\Component;

class Index extends Component
{
    public $product;
    public function mount($product)
    {
        $this->product=$product;
    }
    public function render()
    {
        return view('livewire.frontend.prduct.index',[
            'product'=>$this->product
        ]);
    }
}
