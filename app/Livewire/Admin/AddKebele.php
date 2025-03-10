<?php

namespace App\Livewire\Admin;

use App\Models\City;
use App\Models\Kebele;
use App\Models\Woreda;
use App\Models\SubCity;
use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Database\QueryException;
#[Title('Admin - Add Kebele')]

class AddKebele extends Component
{
    public $kebele;
    public $woredas = [];
    public $cities = [];
    public $subCities = [];
    public $selectedWoreda = null;
    public $selectdCity = null;
    public $sub_city_id;

    public function mount(){
        $this->woredas = Woreda::get();
    }

    public function updatedSelectedWoreda($woredId)
    {
        $this->cities = City::where('woreda_id', $woredId)->get();
    }

    public function updatedSelectdCity($cityId)
    {
        $this->subCities = SubCity::where('city_id', $cityId)->get();
    }

    public function addKebele()
    {
         $this->validate([
            'kebele' => 'required',
            'selectedWoreda' => 'nullable|exists:woredas,id',
            'sub_city_id' => 'nullable|exists:sub_cities,id',
        ]);

        try {
            Kebele::create([
                'kebele' => $this->kebele,
                'woreda_id' => $this->selectedWoreda,
                'sub_city_id' => $this->sub_city_id,
            ]);

            session()->flash('message', 'Kebele Saved successfully!');
            return $this->redirect('/admin/manage-kebele', navigate: true);

        } catch (QueryException $e) {
            session()->flash('error', 'Failed this Kebele!');
        }
    }

    public function render()
    {
        return view('livewire.admin.add-kebele', [
            'woredas' => $this->woredas,
            'cities' => $this->cities,
            'subCities' => $this->subCities,
        ]);
    }
}
