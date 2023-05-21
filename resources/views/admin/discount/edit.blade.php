@extends('layouts.main')

@section('content')
<div class="p-3">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Edit Discount {{ $discount->name }}
                </div>
                <div class="p-3 car-body">
                   <form action="{{ route('admin.discount.update', $discount->id) }}" method="post">
                        @csrf
                        {{-- @method(PUT) --}}
                        <input type="hidden" name="id" value="{{ $discount->id }}">
                        <div class="row">
                            <div class="mb-4 form-group col-6">
                                <label for="" class="form-label " >Name</label>
                                <input type="text" name="name" id="" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ $discount->name }}" placeholder="" required>
                                @if($errors->has('name'))
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-4 form-group col-6">
                                <label for="" class="form-label">Code</label>
                                <input type="text" name="code" id="" class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" value="{{ $discount->code }}" placeholder="" required>
                                @if($errors->has('code'))
                                <p class="text-danger">{{ $errors->first('code') }}</p>
                                 @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-4 form-group col-6">
                                <label for="" class="form-label">Description</label>
                                <input type="textarea" name="description" id="" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" value="{{ $discount->description }}" placeholder="" required>
                                @if($errors->has('description'))
                                <p class="text-danger">{{ $errors->first('description') }}</p>
                                 @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-4 form-group col-6">
                                <label for="" class="form-label">Percentage</label>
                                <input type="textarea" name="percentage" id="" value="{{ $discount->percentage }}" class="form-control" min="1" max="100" placeholder="" required>
                                @if($errors->has('percentage'))
                                <p class="text-danger">{{ $errors->first('percentage') }}</p>
                                @endif
                            </div>
                        </div>

                        {{-- button --}}
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection