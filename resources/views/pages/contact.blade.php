
@extends('layouts.master')

@section('content')

<h1>Contact Us</h1>
<hr />



<form method="POST" action="{{route('docontact')}}">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input name="name" type="text" placeholder="Enter your name" class="form-control">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input name="email" type="email" placeholder="Enter your email" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="subject">Subject</label>
        <input name="subject" type="text" placeholder="Enter your subject" class="form-control">
    </div>

    
    <div class="form-group">
        <label for="body">Message:</label>
        <textarea name="body" placeholder="Enter your message" class="form-control" style="height: 200px"></textarea>
    </div>

    <div class="form-group pull-right">
        <button type="submit" class="btn btn-primary form-control">send</button>
    </div>
</form>

@endsection