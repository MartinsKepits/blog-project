<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PostAvgRating extends Component
{
    public $rating;

    /**
     * @param $rating
     */
    public function __construct($rating)
    {
        $this->rating = $rating;
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('components.post-avg-rating');
    }
}
