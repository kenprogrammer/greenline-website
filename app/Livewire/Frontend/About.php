<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use Livewire\Attributes\Layout;

class About extends Component
{
    #[Layout('components.layouts.app-frontend')]
    public function render()
    {
        return view('livewire.frontend.about');
    }
}
