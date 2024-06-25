<?php

namespace App\Livewire\Partials;

use App\Helpers\CartManagement;
use Livewire\Attributes\On;
use Livewire\Component;
use function PHPUnit\Framework\containsIdentical;

class Navbar extends Component
{
    public $total_count  = 0;

    public function mount(){
        $this->total_count = count(CartManagement::getCartItemFromCookie());
    }

    #[On('update-cart-count')]
    public function updateCartCount($total_count){
        $this->total_count = $total_count;
    }
    public function render()
    {
        return view('livewire.partials.navbar');
    }
}
