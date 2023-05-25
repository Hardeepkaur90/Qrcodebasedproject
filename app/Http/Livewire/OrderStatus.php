<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Component
{

    

    public Model $model;
    
    public string $field;

    public bool $payment_status;

    public function mount()
    {
        
        $this->payment_status = (bool) $this->model->getAttribute($this->field);
    }

    public function updating($field, $value)
    {
        $this->model->setAttribute($this->field, $value)->save();

    }
    public function render()
    {
        return view('livewire.order-status');
    }
}
