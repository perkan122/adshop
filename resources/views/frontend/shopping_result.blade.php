@extends('frontend.main')

@section('title', '')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center" style="font-family: 'Times New Roman'">
            @if($language == 'sr')
            <div style="background-color: #c8ffab; color: #3b8524"><h1>Uspešna kupovina!</h1></div>
            <p><h3>Narudžbina sa rednim brojem narudžbenice - <u><span style="color: #e02612">{{$orderId}}</span></u> je uspešno sačuvana.</h3></p>
            <p><h3>Uskoro će Vas kontaktirati naš operater.</h3></p>
            <p><h3>Hvala na ukazanom poverenju!</h3></p>
            <p><h3><a href="{{route('models')}}"> <i class="fas fa-home"></i><span>Povratak na početnu</span></a></h3></p>
            @elseif($language == 'en')
                <div style="background-color: #c8ffab; color: #3b8524"><h1>Successful shopping!</h1></div>
                <p><h3>Order with order number - <u><span style="color: #e02612">{{$orderId}}</span></u> successfully saved.</h3></p>
                <p><h3>We will contact you soon.</h3></p>
                <p><h3>Thank you for your trust!</h3></p>
                <p><h3><a href="{{route('models')}}"> <i class="fas fa-home"></i><span>Return to home page</span></a></h3></p>
            @endif
        </div>
    </div>

@endsection