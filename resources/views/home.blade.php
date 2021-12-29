@extends('layouts.app')
@section('content')
<div class="container" style="color:#fdfdfe; background-color: bisque">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="color:blue; background-color: gold">
                @if(Auth::user()->role == 0)
                <div class="card-header">Complaint box for Dhaka City Region -  Messages Here</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('send_message') }}">
                        @csrf
                        <div class="form-group">
                            <label for="member">Select Member</label>
                            <select class="form-control" id="member" name="member">
                            <option>Select Area & Member</option>
                                @foreach($data as $up1)
                                    <option value="{{ $up1->id }}">{{ $up1->area }} : {{ $up1->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="identity">Identity type</label>
                            <select class="form-control" id="identity" name="identity">
                                <option>Select your preferred identity</option>
                                <option>I want to be anonymous</option>
                                <option>Publish My identity</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="topic">Topic</label>
                            <input id="topic" type="text" class="form-control" name="topic"
                                   placeholder="please right down the topic" required autocomplete="topic">
                        </div>
                        <div class="form-group">
                            <label for="message">Send the message here</label>
                            <textarea class="form-control" id="message" name="message" rows="5"></textarea>
                        </div>
                     <button type="submit" class="btn btn-primary my-1">Submit</button>
                    </form>


        </div>
                 @elseif(Auth::user()->role == 1)
                    <div class="card-header">Complains for your area</div>
                    <div class="card-body">
                        @foreach($data as $u1)
                            <br>
                            <div class="card">
                                <div class="card-header">{{ $u1->Time }}</div>
                                <div class="card-body">
                                    <br> {{ $u1->complainer_name }} Wrote that
                                    <br> Topic: {{ $u1->topic }}
                                    <br> Complain: {{ $u1->message }}
                                    <br> Your Action:
                                    @if($u1->progress == 0)
                                        <a href="{{ route('action', $u1->id) }}" class="btn btn-warning">Take feedback Action</a>
                                        <a href="{{ route('mail', $u1->id) }}" class="btn btn-danger">Refer to Mayor</a>
                                    @else
                                        In Processing.
                                    @endif
                                    <br>
                                </div>
                            </div>
                        @endforeach





                    </div>
                    @endif
    </div>
    </div>

</div>
@endsection
