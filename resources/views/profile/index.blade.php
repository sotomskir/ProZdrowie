@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="sidebar-wrapper">
            @include('profile.partials.sidebar')
        </div><!--//sidebar-wrapper-->

        <div class="main-wrapper">
            @if($user->isProfileCompleted())
                @include('profile.partials.profile')
            @else
                @include('profile.partials.complete-profile')
            @endif
        </div><!--//main-body-->
    </div>

@endsection
