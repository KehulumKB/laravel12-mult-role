<?php

namespace App\Livewire\Admin;

use App\Models\Region;
use App\Models\Country;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Illuminate\Database\QueryException;

class UpdateRegion extends Component
{
    public $id;
    public $region;
    public $country_id;

    public function updateRegion(){
        $this->validate([
            'country_id' => 'required|exists:countries,id',
            'region' => ['required',  Rule::unique('regions', 'region')->ignore($this->id)]
        ]);


        try {
            Region::where('id', $this->id)->update([
                'region' => $this->region,
                'country_id' => $this->country_id,
            ]);

            session()->flash('message', 'Region Data Updated successfully!');
             return $this->redirect('/admin/manage-region', navigate: true);

        } catch (QueryException $e) {
            session()->flash('error', 'Failed to Update data!'.$e);
        }
    }

    public function mount(){
        $region = Region::findOrFail(request()->id);
        $this->id = $region->id;
        $this->region = $region->region;
        $this->country_id = $region->country_id;
    }

    public function render()
    {
        return view('livewire.admin.update-region', [
            'regions' => Region::get(),
            'countries' => Country::get(),
        ]);
    }
}
