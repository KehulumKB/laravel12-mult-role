<?php

namespace App\Livewire\Admin;

use App\Models\Zone;
use App\Models\Region;
use Livewire\Component;
use Illuminate\Database\QueryException;

class AddZone extends Component
{
    public $zone;
    public $region_id;

    public function addZone(){
        $this->validate([
            'region_id' => 'required|exists:regions,id',
            'zone' => 'required',
        ]);

        try {
            Zone::create([
                'zone' => $this->zone,
                'region_id' => $this->region_id,
            ]);

            session()->flash('message', 'Zone Saved successfully!');
            return $this->redirect('/admin/manage-zone', navigate: true);

        } catch (QueryException $e) {
            session()->flash('error', 'Failed this Zone!');
        }
    }

    public function render()
    {
        return view('livewire.admin.add-zone', [
            'regions' => Region::get(),
        ]);
    }
}
