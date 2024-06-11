@extends('layouts.vertical', ['title' => 'Edit', 'sub_title' => 'Building', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
    <div class="flex flex-col gap-6">
        <div class="card">
            <div class="card-header">
                <div class="flex justify-between items-center">
                    <h4 class="card-title">Edit Building</h4>
                </div>
            </div>
            <div class="p-6">
                <form class="grid lg:grid-cols-3 gap-6" action="{{ route('buildings.update', $building->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="description"
                            class="text-gray-800 text-sm font-medium inline-block mb-2">Description</label>
                        <input type="text" class="form-input" id="description" name="description"
                            value="{{ $building->description }}" required>
                    </div>
                    <div>
                        <label for="construction_type"
                            class="text-gray-800 text-sm font-medium inline-block mb-2">Construction Type</label>
                        <input type="text" class="form-input" id="construction_type" name="construction_type"
                            value="{{ $building->details['Construction Type'] }}" required>
                    </div>
                    <div>
                        <label for="year_built" class="text-gray-800 text-sm font-medium inline-block mb-2">Year
                            Built</label>
                        <input type="number" class="form-input" id="year_built" name="year_built"
                            value="{{ $building->details['Year Built'] }}" required>
                    </div>
                    <div>
                        <label for="units_in_building" class="text-gray-800 text-sm font-medium inline-block mb-2">Units in
                            Building</label>
                        <input type="number" class="form-input" id="units_in_building" name="units_in_building"
                            value="{{ $building->details['Units in Building'] }}" required>
                    </div>
                    <div>
                        <label for="bathrooms" class="text-gray-800 text-sm font-medium inline-block mb-2">Bathrooms</label>
                        <input type="number" class="form-input" id="bathrooms" name="bathrooms"
                            value="{{ $building->details['Bathrooms'] }}" required>
                    </div>
                    <div>
                        <label for="bedrooms" class="text-gray-800 text-sm font-medium inline-block mb-2">Bedrooms</label>
                        <input type="number" class="form-input" id="bedrooms" name="bedrooms"
                            value="{{ $building->details['Bedrooms'] }}" required>
                    </div>
                    <div>
                        <label for="flooring" class="text-gray-800 text-sm font-medium inline-block mb-2">Flooring</label>
                        <input type="text" class="form-input" id="flooring" name="flooring"
                            value="{{ $building->details['Flooring'] }}" required>
                    </div>
                    <div>
                        <label for="amenities" class="text-gray-800 text-sm font-medium inline-block mb-2">Amenities</label>
                        <input type="text" class="form-input" id="amenities" name="amenities"
                            value="{{ $building->details['Amenities'] }}" required>
                    </div>
                    <div>
                        <label for="cooling" class="text-gray-800 text-sm font-medium inline-block mb-2">Cooling</label>
                        <input type="text" class="form-input" id="cooling" name="cooling"
                            value="{{ $building->details['Cooling'] }}" required>
                    </div>
                    <div>
                        <label for="other_features" class="text-gray-800 text-sm font-medium inline-block mb-2">Other
                            Features</label>
                        <input type="text" class="form-input" id="other_features" name="other_features"
                            value="{{ $building->details['Other Features'] }}" required>
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
                        <input type="number" class="form-input" id="rent_price" name="rent_price"
                            value="{{ $building->rent_price }}" step="0.01" required>
                    </div>
                    <div>
                        <label for="owner_id" class="text-gray-800 text-sm font-medium inline-block mb-2">Owner</label>
                        <select class="form-select" id="owner_id" name="owner_id" required>
                            <option value="">Choose Owner...</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}"
                                    {{ $building->owner_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="category_id"
                            class="text-gray-800 text-sm font-medium inline-block mb-2">Category</label>
                        <select class="form-select" id="category_id" name="category_id" required>
                            <option value="">Choose Category...</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $building->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-3">
                        <button class="btn bg-primary text-white" type="submit">Update Building</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
