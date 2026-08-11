<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\AboutUs;

class About extends Component
{
    public $about;

    public function mount()
    {
        $this->about = AboutUs::first();
    }

    #[Layout('components.layouts.app-frontend')]
    public function render()
    {
        return view('livewire.frontend.about');
    }
}
