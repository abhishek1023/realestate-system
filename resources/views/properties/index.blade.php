@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('properties.index') }}" method="get">
        <div class="form-group">
            <input type="text" name="name" placeholder="Search by name">
        </div>
        <div class="form-group">
            <input type="number" name="num_bedrooms" placeholder="Number of bedrooms">
        </div>
        <div class="form-group">
            <input type="number" name="price" placeholder="Price">
        </div>
        <div class="form-group">
            <input type="text" name="type" placeholder="Property type">
        </div>
        <div class="form-group">
            <select name="sale_rent">
                <option value="">For Sale / For Rent</option>
                <option value="sale">For Sale</option>
                <option value="rent">For Rent</option>
            </select>
        </div>
        <div class="form-group">
            <button type="submit">Search</button>
        </div>
    </form>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Number of Bedrooms</th>
                <th>Price</th>
                <th>Property Type</th>
                <th>For Sale / For Rent</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($properties as $property)
            <tr>
                <td>{{ $property->name }}</td>
                <td>{{ $property->num_bedrooms }}</td>
                <td>{{ $property->price }}</td>
                <td>{{ optional($property->propertyDetail)->property_type }}</td>
                <td>{{ $property->type }}</td>
                <td>
                    <!-- <a href="{{ route('properties.edit', $property->uuid) }}">Edit</a> | -->
                    <a href="{{ route('properties.delete', $property->uuid) }}">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
