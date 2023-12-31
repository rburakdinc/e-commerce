<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Checkbox extends Component
{

    private string $label;
    private string $field;
    private bool $checked;

    public function __construct(string $label,string $field, bool $checked = false)
    {
        $this->label = $label;
        $this->field = $field;
        $this->checked = $checked;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.checkbox',[
            "label" => $this->label,
            "field" => $this->field,
            "checked"=> $this->checked
        ]);
    }
}
