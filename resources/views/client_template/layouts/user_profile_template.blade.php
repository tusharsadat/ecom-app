@extends('client_template.layouts.template');
@section('contain')
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-4">
                <div class="box_main">
                    <ul class="p-2 bg-light my-2 shirt_text text-left">
                        <li><a href="{{ route('userprofile') }}">Dashboard</a></li>
                        <li><a href="{{ route('pendingorders') }}">Pending Order</a></li>
                        <li><a href="{{ route('history') }}">History</a></li>
                        <li><a href="">Logout</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-8 col-sm-8">
                <div class="box_main">
                    @yield('profilecontaint')
                </div>
            </div>
        </div>
    </div>
@endsection
