<?php

namespace App\Livewire\Admin;

use App\Models\City;
use App\Models\Woreda;
use Livewire\Component;
use Illuminate\Database\QueryException;

class AddCity extends Component
{
    public $woreda_id;
    public $city;

    public function addCity(){
        $this->validate([
            'woreda_id' => 'required|exists:woredas,id',
            'city' => 'required|unique:cities,city',
        ]);

        try {
            City::create([
                'city' => $this->city,
                'woreda_id' => $this->woreda_id,
            ]);

            session()->flash('message', 'City Saved successfully!');
            return $this->redirect('/admin/manage-city', navigate: true);

        } catch (QueryException $e) {
            session()->flash('error', 'Failed this City!');
        }
    }

    public function render()
    {
        return view('livewire.admin.add-city', [
            'woredas' => Woreda::get(),
        ]);
    }
}
