@extends('layouts.main')

@section('content')
    <div class="">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        My Camps
                    </div>
                    <div class="card-body">
                        @include('components.alert')
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>User</th>
                                    <th>Camp</th>
                                    <th>Price</th>
                                    <th>Register Date</th>
                                    <th>Paid Status</th>
                                    {{-- <th>Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($checkouts as $checkout)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$checkout->User->name}}</td>
                                        <td>{{$checkout->Camp->title}}</td>
                                        <td>
                                            {{$checkout->total}}k
                                            @if($checkout->discount_id)
                                                <span class="badge bg-success">
                                                   Disc {{$checkout->discount_percentage}}%
                                                </span>
                                            @endif
                                        </td>
                                        <td>{{$checkout->created_at->format('M d Y')}}</td>
                                        <td>{{$checkout->payment_status}}</td>
                                       
                                        {{-- <td>
                                            @if(!$checkout->is_paid)
                                                <form action="{{ route('admin.checkout.update', $checkout->id) }}" method="post">
                                                    @csrf
                                                    <button class="btn btn-primary btn-sm">Set to Paid</button>
                                                </form> 
                                            @else
                                                <form action="{{ route('admin.checkout.update', $checkout->id) }}" method="post">
                                                    @csrf
                                                    <button class="btn btn-dark btn-sm">Undo to unpaid</button>
                                                </form>
                                            @endif
                                        </td> --}}
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">No camps registered</td>
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