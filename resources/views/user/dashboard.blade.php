@extends('layouts.main')

@section('content')
<section class="my-5 dashboard">
    <div class="container">
        <div class="text-left row">
            <div class="mt-4 col-lg-12 col-12 header-wrap">
                <p class="story">
                    DASHBOARD
                </p>
                <h2 class="primary-header ">
                    My Bootcamps
                </h2>
            </div>
        </div>
        <div class="my-5 row">
            @include('components.alert')
            <table class="table">
                <tbody>
                    @forelse ($checkouts as $checkout)
                    <tr class="align-middle">
                        <td width="18%">
                            <img src="{{ asset('images/item_bootcamp.png') }}" height="120" alt="">
                        </td>
                        <td>
                            <p class="mb-2">
                                <strong>{{ $checkout->Camp->title }}</strong>
                            </p>
                            <p>
                                {{ $checkout->created_at->format('M d, Y') }}
                            </p>
                        </td>
                        <td>
                            <strong>Rp{{ $checkout->Camp->price }}</strong>
                        </td>
                        <td>
                            <strong>{{ $checkout->payment_status }}</strong>
                        </td>
                        <td>
                            @if($checkout->payment_status == 'waiting')
                                <a href="{{ $checkout->midtrans_url }}" class="btn btn-primary">Pay Now</a>
                            @endif
                        </td>
                       
                        <td>
                            @if ($checkout->is_paid)
                                <a href="https://wa.me/087765245404?text=Halo, saya ingin bertanya tentang kelas {{ $checkout->Camp->title }}" target="_blank" class="btn btn-primary">
                                    Contact Support
                                </a>
                            @else
                                <a href="#" class="btn btn-disable">
                                    Contact Support
                                </a>
                            @endif
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="5">
                                <h3>
                                    No Camp registered
                                </h3>
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection