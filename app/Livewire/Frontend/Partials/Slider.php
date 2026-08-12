<?php

namespace App\Livewire\Frontend\Partials;

use Livewire\Component;
use App\Models\Banner;

class Slider extends Component
{
    public function render()
    {
        $banners = Banner::wherePublished(true)
                            ->latest()
                            ->get();

        return view('livewire.frontend.partials.slider',['banners'=>$banners]);
    }
}
