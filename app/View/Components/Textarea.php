<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Textarea extends Component
{
    private string $label;
    private string $placeholder;
    private string $field;
    private string $value;

    public function __construct(string $label, string $placeholder, string $field, string $value="")
    {
        $this->label=$label;
        $this->placeholder=$placeholder;
        $this->field=$field;
        $this->value=$value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.textarea',[
            "label"=>$this->label,
            "placeholder"=>$this->placeholder,
            "field"=>$this->field,
            "value"=>$this->value
        ]);
    }
}
