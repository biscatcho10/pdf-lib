@isset($address)
    <div class="form-group col-12">
        <label style="margin-top: 28px;" class="col-xs-3 control-label">{{ __('Location On Map') }}</label>
        <div class="col-xs-9">
            <input type="hidden" name="map_address" id="map_latLon"
                value="{{ $address->latitude . ',' . $address->longitude }}">
            <div id="map" style="height: 400px; width: 100%;"></div>
        </div>
    </div>
@else
    <div class="form-group col-12">
        <label style="margin-top: 28px;" class="col-xs-3 control-label">{{ __('Location On Map') }}</label>
        <div class="col-xs-9">
            <input type="hidden" name="map_address" id="map_latLon"
                value="{{ old('map_address', '23.8336786,36.0368183') }}">
            <div id="map" style="height: 400px; width: 100%;"></div>
        </div>
    </div>
@endisset
