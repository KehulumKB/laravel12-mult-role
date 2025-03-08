<?php

namespace App\Livewire\Admin;

use App\Models\Zone;
use App\Models\Woreda;
use Livewire\Component;
use Illuminate\Database\QueryException;

class AddWoreda extends Component
{
    public $woreda;
    public $zone_id;

    public function addWoreda(){
        $this->validate([
            'zone_id' => 'required|exists:zones,id',
            'woreda' => 'required',
        ]);

        try {
            Woreda::create([
                'woreda' => $this->woreda,
                'zone_id' => $this->zone_id,
            ]);

            session()->flash('message', 'Woreda Saved successfully!');
            return $this->redirect('/admin/manage-woreda', navigate: true);

        } catch (QueryException $e) {
            session()->flash('error', 'Failed this Woreda!');
        }
    }

    public function render()
    {
        return view('livewire.admin.add-woreda', [
            'zones' => Zone::get(),
        ]);
    }
}
