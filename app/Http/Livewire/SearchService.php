<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Livewire\Component;

class SearchService extends Component
{
    public $term = "";

    public function render()
    {
        $service = Service::search($this->term)->get();
        $data = [
            'services' => $service,
        ];
        return view('livewire.search-service', $data);
    }
}
