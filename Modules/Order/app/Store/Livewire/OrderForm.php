<?php

declare(strict_types=1);

namespace Modules\Order\Store\Livewire;

use Livewire\Component;
use Modules\Common\Contracts\Services\OrderProductConverterContract;
use Modules\Order\Models\Order;
use Modules\Order\Services\OrderService;

class OrderForm extends Component
{
    public $username;
    public $phone;
    public $address;
    public $notes;
    public $productIds;

    protected $rules = [
        'username'     => ['required','string','min:3','max:255'],
        'phone'        => ['required', 'digits:10'],       
        'address'      => ['required','string','max:1000'],
        'notes'        => ['nullable','string','max:1000'],
        'productIds'   => ['required','array','min:1'],
        'productIds.*' => ['integer','distinct'],
    ];

    private OrderProductConverterContract $orderProductConverter;

    public function boot(OrderProductConverterContract $orderProductConverter)
    {
        $this->orderProductConverter = $orderProductConverter;
    }

    public function submit()
    {
        $this->validate();

        $products = $this->orderProductConverter->getProductsByIds($this->productIds);

        OrderService::saveOrder(
            $this->username, 
            $this->address, 
            $this->phone, 
            $this->notes, 
            $products
        );

        $this->reset(['username','phone','address','notes','productIds']);
        $this->resetValidation();

        session()->flash('success', 'Order sent successfully.');
    }

    public function render()
    {
        $products = $this->orderProductConverter->getAllProducts();

        return view('order::livewire.order-form', compact('products'));
    }
}
