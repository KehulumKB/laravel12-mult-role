<?php

namespace App\Livewire\Admin;

use App\Models\Country;
use App\Models\Region;
use Livewire\Component;
use Illuminate\Database\QueryException;

class AddRegion extends Component
{
    public $country;
    public $region;

    public function addRegion(){
        $this->validate([
            'country' => 'required',
            'region' => 'required|unique:regions,region',
        ]);

        try {
            Region::create([
                'region' => $this->region,
                'country_id' => $this->country,
            ]);

            session()->flash('message', 'Region Saved successfully!');
            return $this->redirect('/admin/manage-region', navigate: true);

        } catch (QueryException $e) {
            session()->flash('error', 'Failed this Region!');
        }
    }

    public function render()
    {
        return view('livewire.admin.add-region',[
            'countries' => Country::get(),
        ]);
    }
}
