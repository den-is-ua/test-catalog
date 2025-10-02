<?php

declare(strict_types=1);

namespace Modules\Order\Store\Livewire;

use Livewire\Component;
use Modules\Catalog\Models\Category;

class OrderForm extends Component
{
    public $username;
    public $phone;
    public $address;
    public $notes;
 
    protected $rules = [
        'username' => 'required|string|min:3',
        'phone' => 'required|numeric|length:10',
        'address' => 'required|string|max:1000',
        'notes' => 'nullable|string|max:1000'
    ];
    


    public function submit()
    {
        $this->validate();

        // @todo: implement order creation logic
    }

    public function render()
    {
        return view('order::livewire.order-form');
    }
}
