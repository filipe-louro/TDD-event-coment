<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Comments extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $comment;
    public function __construct(array $comment)
    {
        $this->comment = $comment;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.comments');
    }
}
