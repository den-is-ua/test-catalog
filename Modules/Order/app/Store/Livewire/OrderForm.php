<?php

declare(strict_types=1);

namespace Modules\Order\Store\Livewire;

use Livewire\Component;
use Modules\Common\Contracts\Services\OrderProductConverterContract;

class OrderForm extends Component
{
    public $username;
    public $phone;
    public $address;
    public $notes;
    public $productIds;

    protected $rules = [
        'username' => 'required|string|min:3',
        'phone' => 'required|numeric|length:10',
        'address' => 'required|string|max:1000',
        'notes' => 'nullable|string|max:1000',
        'product_ids' => 'required|array',
        'product_ids.*' => 'required|numeric|min:1'
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
    }

    public function render()
    {
        $products = $this->orderProductConverter->getAllProducts();

        return view('order::livewire.order-form', compact('products'));
    }
}
