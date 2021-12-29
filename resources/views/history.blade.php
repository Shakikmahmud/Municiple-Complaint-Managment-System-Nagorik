@extends('layouts.app')
@section('content')
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Your Complain History</div>
                <div class="card-body">
                    @foreach($user_details as $u1)
                        <br>
                        <div class="card">
                            <div class="card-header">{{ $u1->Time }}</div>
                            <div class="card-body">
                                <br> You sent to {{ $u1->up_member_name }} , Member of {{ $u1->area }} Area<br>
                                 <br> Identity Name: {{ $u1->complainer_name }}
                                <br> Topic: {{ $u1->topic }}
                                <br> Complain: {{ $u1->message }}
                                <br> Process status by authority:
                                 @if($u1->progress == 0)
                                    In review
                                     @if(Carbon\Carbon::create($u1->Time)->addDay() < Carbon\Carbon::now())
                                        <br><a href ="">24hour over. send mail directly to mayor</a><br>
                                    @endif
                                @else
                                In Processing
                                @endif
                                <br>
                            </div>
                        </div>
                            @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
