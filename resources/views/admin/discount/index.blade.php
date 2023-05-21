@extends('layouts.main')

@section('content')
<div class="p-3">
    <div class="row">
        <div class="col-12">
            @include('components.alert')

            <div class="card">
                <div class="card-header">
                    My Camps
                </div>
                <div class="p-3 car-body">
                    <div class="row">
                        <div class="flex-row-reverse col-md-12 d-flex">
                            <a href="{{ route('admin.discount.create') }}" class="btn btn-primary btn-sm">Add Discount</a>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Description</th>
                                <th>Percentage</th>
                                <th colspan="2">Action</th>
                                {{-- <th>Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($discounts as $discount)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$discount->name}}</td>
                                    <td>
                                        <span class="badge bg-primary">
                                            {{$discount->code}}
                                        </span>
                                    </td>
                                    <td>{{$discount->description}}k</td>
                                    <td>{{$discount->percentage}}%</td>
                                    <td>
                                        <a href="{{ route('admin.discount.edit', $discount->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.discount.destroy', $discount->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">No discount created</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection