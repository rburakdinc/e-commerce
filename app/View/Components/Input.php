<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Input extends Component
{
    private string $type;
    private string $label;
    private string $placeholder;
    private string $field;
    private string $value;

    public function __construct(string $label,string $placeholder, string $field, string $type="text", string $value = "")
    {
        $this->label=$label;
        $this->placeholder=$placeholder;
        $this->field=$field;
        $this->type=$type;
        $this->value=$value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input',[
            "label"=>$this->label,
            "placeholder"=>$this->placeholder,
            "field"=>$this->field,
            "type" => $this->type,
            "value"=>$this->value
        ]);
    }
}
