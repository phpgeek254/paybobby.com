@extends(Auth::check() ? 'admin_template' : 'master')
@section('content')
    <div class="row">
        <div class="col m12 s12">
            <h5 class="center"> Available Jobs </h5>
            @forelse($orders as $order)
                    <ul class="collection with-header">
                        <li class="collection-header"><h6>{{ strtoupper($order->title) }}</h6></li>
                        <li class="collection-item">
                            <div>
                                {{ \Illuminate\Support\Str::words($order->category->name, 2) }}
                                <a  class="secondary-content">
                                    <i class="fa fa-clock-o"></i> {{ $order->created_at->diffForHumans() }}
                                </a>
                            </div>
                        </li>
                        <li class="collection-item">
                            <div>
                                Cost : {{ $order->cost }}USD

                            </div>
                        </li>
                        <li class="collection-item">
                            <div>
                                Deadline : {{ $order->expiry_date }}

                            </div>
                        </li>

                        @if( Auth::check() and Auth::user()->user_type == 'employee')
                        <li class="collection-item">
                            <div>
                                {!! Form::open(['route'=>['take-job']]) !!}
                                {!! Form::hidden('order_id', $order->id) !!}
                                {!! Form::submit('Take-Job', ['class'=>'btn']) !!}
                                {!! Form::close() !!}
                            </div>
                        </li>
                        @endif
                        @if(Auth::user()->id == $order->client_id)
                            <li class="collection-item">
                                <div>
                                    {!! \Illuminate\Support\Str::words(nl2br($order->instructions), 20) !!}

                                    <a href="#edit_order_{{ $order->id }}" class="secondary-content btn-flat">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="#delete_order_{{ $order->id }}" class="secondary-content btn-flat">
                                        <i class="fa fa-trash"></i>
                                    </a>

                                </div>
                            </li>
                        @endif



                    </ul>
            @empty
                <p class="center">
                   There are no orders available in this category.
                </p>
            @endforelse
        </div>

    </div>
@endsection