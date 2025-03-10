<?php

namespace App\Livewire\Admin;

use App\Models\City;
use App\Models\Woreda;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Illuminate\Database\QueryException;

class UpdateCity extends Component
{
    public $id;
    public $city;
    public $woreda_id;

    public function updateCity(){
        $this->validate([
            'woreda_id' => 'required|exists:woredas,id',
            'city' => ['required',  Rule::unique('cities', 'city')->ignore($this->id)]
        ]);


        try {
            City::where('id', $this->id)->update([
                'city' => $this->city,
                'woreda_id' => $this->woreda_id,
            ]);

            session()->flash('message', 'City Data Updated successfully!');
             return $this->redirect('/admin/manage-city', navigate: true);

        } catch (QueryException $e) {
            session()->flash('error', 'Failed to Update data!'.$e);
        }
    }

    public function mount(){
        $city = City::findOrFail(request()->id);
        $this->id = $city->id;
        $this->city = $city->city;
        $this->woreda_id = $city->woreda_id;
    }

    public function render()
    {
        return view('livewire.admin.update-city', [
            'woredas' => Woreda::get(),
        ]);
    }
}
