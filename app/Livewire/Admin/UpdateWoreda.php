<?php

namespace App\Livewire\Admin;

use App\Models\Zone;
use App\Models\Woreda;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Illuminate\Database\QueryException;

class UpdateWoreda extends Component
{
    public $id;
    public $woreda;
    public $zone_id;

    public function updateWoreda(){
        $this->validate([
            'zone_id' => 'required|exists:zones,id',
            'woreda' => ['required',  Rule::unique('woredas', 'woreda')->ignore($this->id)]
        ]);

        try {
            Woreda::where('id', $this->id)->update([
                'woreda' => $this->woreda,
                'zone_id' => $this->zone_id,
            ]);

            session()->flash('message', 'Woreda Data Updated successfully!');
             return $this->redirect('/admin/manage-woreda', navigate: true);

        } catch (QueryException $e) {
            session()->flash('error', 'Failed to Update data!'.$e);
        }
    }

    public function mount(){
        $woreda = Woreda::findOrFail(request()->id);
        $this->id = $woreda->id;
        $this->woreda = $woreda->woreda;
        $this->zone_id = $woreda->zone_id;
    }

    public function render()
    {
        return view('livewire.admin.update-woreda', [
            'zones' => Zone::get(),
        ]);
    }
}
