@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Dashboard
                </div>

                <div class="panel-body">
                    You are logged in!
                    <dl>
                        <dt>First name</dt><dd>{{ $user->first_name }}</dd>
                        <dt>Last name</dt><dd>{{ $user->last_name }}</dd>
                        <dt>email</dt><dd>{{ $user->email }}</dd>
                        <dt>sex</dt><dd>{{ $user->sex }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
