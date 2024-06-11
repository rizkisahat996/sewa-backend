@extends('layouts.vertical', ['title' => 'Detail', 'sub_title' => 'Building', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
    <div class="flex flex-col gap-6">
        <div class="card">
            <div class="card-header">
                <div class="flex justify-between items-center">
                    <h4 class="card-title">Detail Building</h4>
                </div>
            </div>
            <div class="flex justify-between items-center ms-5 mt-5">
                <div class="flex items-center gap-2">
                    <button type="button" class="btn-code" data-fc-type="collapse" data-fc-target="defaultButtonsHtml">
                        <i class="mgc_eye_line text-lg"></i>
                        <a href="/buildings/{{ $building->id }}/edit" class="ms-2">Edit this item</a>
                    </button>
                </div>
            </div>
            <div class="p-6">
                <div>
                    <label for="description" class="text-gray-800 text-sm font-medium inline-block mb-2">Description</label>
                    <input type="text" class="form-input" id="description" name="description" disabled
                        value="{{ $building->description }}" disabled>
                </div>
                <div>
                    <label for="construction_type" class="text-gray-800 text-sm font-medium inline-block mb-2">Construction
                        Type</label>
                    <input type="text" class="form-input" id="construction_type" name="construction_type" disabled
                        value="{{ $building->details['Construction Type'] }}">
                </div>
                <div>
                    <label for="year_built" class="text-gray-800 text-sm font-medium inline-block mb-2">Year
                        Built</label>
                    <input type="number" class="form-input" id="year_built" name="year_built" disabled
                        value="{{ $building->details['Year Built'] }}">
                </div>
                <div>
                    <label for="units_in_building" class="text-gray-800 text-sm font-medium inline-block mb-2">Units in
                        Building</label>
                    <input type="number" class="form-input" id="units_in_building" name="units_in_building" disabled
                        value="{{ $building->details['Units in Building'] }}">
                </div>
                <div>
                    <label for="bathrooms" class="text-gray-800 text-sm font-medium inline-block mb-2">Bathrooms</label>
                    <input type="number" class="form-input" id="bathrooms" name="bathrooms" disabled
                        value="{{ $building->details['Bathrooms'] }}">
                </div>
                <div>
                    <label for="bedrooms" class="text-gray-800 text-sm font-medium inline-block mb-2">Bedrooms</label>
                    <input type="number" class="form-input" id="bedrooms" name="bedrooms" disabled
                        value="{{ $building->details['Bedrooms'] }}">
                </div>
                <div>
                    <label for="flooring" class="text-gray-800 text-sm font-medium inline-block mb-2">Flooring</label>
                    <input type="text" class="form-input" id="flooring" name="flooring" disabled
                        value="{{ $building->details['Flooring'] }}">
                </div>
                <div>
                    <label for="amenities" class="text-gray-800 text-sm font-medium inline-block mb-2">Amenities</label>
                    <input type="text" class="form-input" id="amenities" name="amenities" disabled
                        value="{{ $building->details['Amenities'] }}">
                </div>
                <div>
                    <label for="cooling" class="text-gray-800 text-sm font-medium inline-block mb-2">Cooling</label>
                    <input type="text" class="form-input" id="cooling" name="cooling" disabled
                        value="{{ $building->details['Cooling'] }}">
                </div>
                <div>
                    <label for="other_features" class="text-gray-800 text-sm font-medium inline-block mb-2">Other
                        Features</label>
                    <input type="text" class="form-input" id="other_features" name="other_features" disabled
                        value="{{ $building->details['Other Features'] }}">
                </div>
                <div class="col-span-3">
                    <label for="pictures" class="text-gray-800 text-sm font-medium inline-block mb-2">Pictures</label>
                    <textarea class="form-input" id="pictures" name="pictures" rows="3">{{ $building->pictures ? json_encode($building->pictures) : '' }}</textarea>
                    <small class="text-gray-600">Enter picture URLs in JSON format (e.g.,
                        ["https://example.com/picture1.jpg","https://example.com/picture2.jpg",...])</small>
                </div>
                <div>
                    <label for="rent_price" class="text-gray-800 text-sm font-medium inline-block mb-2">Rent
                        Price</label>
                    <input type="number" class="form-input" id="rent_price" name="rent_price" disabled
                        value="{{ $building->rent_price }}" step="0.01">
                </div>
                <div>
                    <label for="owner_id" class="text-gray-800 text-sm font-medium inline-block mb-2">Owner</label>
                    <select class="form-select" id="owner_id" name="owner_id">
                        <option value="#">{{ $building->owner_id }}</option>
                    </select>
                </div>
                {{-- <div>
                    <label for="category_id" class="text-gray-800 text-sm font-medium inline-block mb-2">Category</label>
                    <select class="form-select" id="category_id" name="category_id">
                        <option value="#">Choose Category...</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $building->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
