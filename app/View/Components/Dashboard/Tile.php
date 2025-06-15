<?php

namespace App\View\Components\Dashboard;

use Illuminate\View\Component;

class Tile extends Component
{
    public string $route;
    public string $icon;
    public string $title;
    public string $text;

    public function __construct(string $route, string $icon, string $title, string $text)
    {
        $this->route = $route;
        $this->icon  = $icon;
        $this->title = $title;
        $this->text  = $text;
    }

    public function render()
    {
        return view('components.dashboard.tile');
    }
}
