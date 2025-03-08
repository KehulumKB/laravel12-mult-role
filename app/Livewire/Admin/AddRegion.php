<?php

namespace App\Livewire\Admin;

use App\Models\Country;
use App\Models\Region;
use Livewire\Component;
use Illuminate\Database\QueryException;

class AddRegion extends Component
{
    public $country_id;
    public $region;

    public function addRegion(){
        $this->validate([
            'country_id' => 'required',
            'region' => 'required|unique:regions,region',
        ]);

        try {
            Region::create([
                'region' => $this->region,
                'country_id' => $this->country_id,
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
