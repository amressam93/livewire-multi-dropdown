<?php

namespace App\Http\Livewire;

use App\Models\city;
use App\Models\Country;
use App\Models\State;
use Livewire\Component;

class CountryStateCity extends Component
{


    public $countries;
    public $states;
    public $cities;
    public $ottPlatform = [];
    public $city_lat = '';
    public $city_lang = '';




    public $selectedCountry = null;
    public $selectedState = null;
    public $selectedCity = null;



    public function mount($selectedCity = null)
    {
        $this->countries = Country::all();
        $this->states = State::all();
        $this->cities = City::all();
        $this->selectedCity = $selectedCity;
        //$this->emit('productStore');

        
        if (!is_null($selectedCity))
        {
            $city = City::with('state.country')->find($selectedCity);
            if ($city)
            {
                $this->cities = City::where('state_id', $city->state_id)->get();
                $this->states = State::where('country_id', $city->state->country_id)->get();
                $this->selectedCountry = $city->state->country_id;
                $this->selectedState = $city->state_id;


            }
        }


    }

    public function render()
    {
        return view('livewire.country-state-city')->extends('livewire.home');
    }

    public function updatedSelectedCountry($country)
    {
        $check_states = State::where('country_id',$country)->get();


        if(count($check_states)>0)
        {
            $this->states = State::where('country_id', $country)->get();
            $this->selectedState = NULL;
        }
        else
        {
            $this->selectedCountry = null;
        }
    }

    public function updatedSelectedState($state)
    {
        if (!is_null($state)) {
            $this->cities = City::where('state_id', $state)->get();
        }
    }





    public function changeEvent($city_id)
    {
        $this->city_lat = City::where('id', $city_id)->pluck('latitude')->first();

        $this->city_lang = City::where('id', $city_id)->pluck('longitude')->first();
    }


}
