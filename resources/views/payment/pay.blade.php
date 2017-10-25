@extends('admin_template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card">
                    <div class="card-title center">
                        {!! Html::image(asset('images/paypal.png'), null, ['width=200']) !!}
                        <h4 class="center"> Approve Payment with Paypal</h4>

                    </div>
                    <div class="card-content">
                        <form method="POST" action ="{!! URL::route('payment_with_paypal') !!}" >
                            {{ csrf_field() }}
                            <h5 class="center"> Order Details </h5>
                            @php
                            $order = \App\Order::find(\Illuminate\Support\Facades\Session::get('order_id'))
                            @endphp
                            <ul class="collection with-header">
                                <li class="collection-header"><h6>{{ strtoupper($order->title) }}</h6></li>
                                <li class="collection-item">
                                    <div>
                                        {{ \Illuminate\Support\Str::words($order->category->name, 2) }}
                                        <a  class="secondary-content">
                                            <i class="fa fa-clock-o"></i> Placed {{ $order->created_at->diffForHumans() }}
                                        </a>
                                    </div>
                                </li>
                                <li class="collection-item">
                                    <div>
                                        Cost : {{ $order->cost }} USD

                                    </div>
                                </li>

                            </ul>
                            <div class="card-action center">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Approve Payment
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection