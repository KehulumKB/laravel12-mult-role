<?php

namespace App\Livewire\Admin;

use App\Models\Region;
use App\Models\Zone;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Illuminate\Database\QueryException;

class UpdateZone extends Component
{
    public $id;
    public $zone;
    public $region_id;

    public function updateZone(){
        $this->validate([
            'region_id' => 'required|exists:regions,id',
            'zone' => ['required',  Rule::unique('regions', 'region')->ignore($this->id)]
        ]);


        try {
            Zone::where('id', $this->id)->update([
                'zone' => $this->zone,
                'region_id' => $this->region_id,
            ]);

            session()->flash('message', 'Zone Data Updated successfully!');
             return $this->redirect('/admin/manage-zone', navigate: true);

        } catch (QueryException $e) {
            session()->flash('error', 'Failed to Update data!'.$e);
        }
    }

    public function mount(){
        $zone = Zone::findOrFail(request()->id);
        $this->id = $zone->id;
        $this->zone = $zone->zone;
        $this->region_id = $zone->region_id;
    }

    public function render()
    {
        return view('livewire.admin.update-zone', [
            'regions' => Region::get(),
        ]);
    }
}
