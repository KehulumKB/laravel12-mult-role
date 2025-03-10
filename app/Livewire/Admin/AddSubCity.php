<?php

namespace App\Livewire\Admin;

use App\Models\City;
use App\Models\SubCity;
use Livewire\Component;
use Illuminate\Database\QueryException;

class AddSubCity extends Component
{
    public $city_id;
    public $sub_city;

    public function addSubCity(){
           $this->validate([
            'city_id' => 'required|exists:woredas,id',
            'sub_city' => 'required|unique:cities,city',
        ]);

        try {
            SubCity::create([
                'sub_city' => $this->sub_city,
                'city_id' => $this->city_id,
            ]);

            session()->flash('message', 'SUb-City Saved successfully!');
            return $this->redirect('/admin/manage-sub-city', navigate: true);

        } catch (QueryException $e) {
            session()->flash('error', 'Failed this Sub-City!');
        }
    }

    public function render()
    {
        return view('livewire.admin.add-sub-city', [
            'cities' => City::get(),
        ]);
    }
}
