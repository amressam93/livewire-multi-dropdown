<div>
    <div class="form-group row">
        <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

        <div wire:ignore class="col-md-6">
            <select wire:model="selectedCountry" class="form-control" id="select2-dropdown">
                <option value="" selected>Choose country</option>
                @foreach($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
        </div>
        {{$selectedCountry}}
    </div>
    <br>

    @if (!is_null($selectedCountry))
        <div class="form-group row">
            <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('State') }}</label>

            <div class="col-md-6">
                <select wire:model="selectedState" class="form-control" id="states">
                    <option value="" selected>Choose state</option>
                    @foreach($states as $state)
                        <option value="{{ $state->id }}">{{ $state->state_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endif
    <br>
    @if (!is_null($selectedState))
        <div class="form-group row">
            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

            <div class="col-md-6">
                <select wire:model="selectedCity" class="form-control" name="city_id" wire:click="changeEvent($event.target.value)">
                    <option value="" selected>Choose city</option>
                    @foreach($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->cityName  }}</option>
                    @endforeach
                </select>
                <p>Selected City ID: {{ $city_lat }}</p>
            </div>
            {{$selectedCity}}

        </div>
    @endif

    <br>
    @if (!is_null($selectedCity))
        <div class="form-group row">
            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City Information') }}</label>

            <div class="col-md-6">
                <label for="lat">City latitude</label>
                <input type="text" name="lat" id="lat" class="form-control"  wire:model="city_lat"><br>
                <label for="lang">City longitude</label>
                <input type="text" name="lang" id="lang" class="form-control"  wire:model="city_lang"><br>
            </div>
        </div>
    @endif


</div>


<script>
    $(document).ready(function() {
        $('#select2-dropdown').select2();
        $('#select2-dropdown').on('change',function (e){
            let data = $(this).val();                     //$('#select2-dropdown').select2("val")
            @this.set('selectedCountry', data);
        });
        // window.livewire.on('productStoreqq', () => {
        //     $('#select2-dropdown').select2();
        // });
    });
</script>
