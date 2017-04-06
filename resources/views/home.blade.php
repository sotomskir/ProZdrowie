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
                        <dt>weight</dt><dd>{{ $personData->weight }}</dd>
                        <dt>height</dt><dd>{{ $personData->height }}</dd>
                        <dt>bmi</dt><dd>{{ $personData->bmi() }} ({{ $dicts->translate('BMI', $personData->bmi()) }})</dd>
                        <dt>cmp</dt><dd>{{ $personData->cmp() }}</dd>
                        <dt>ppm</dt><dd>{{ $personData->ppm() }}</dd>
                        <dt>pal</dt><dd>{{ $personData->pal }} ({{ $dicts->translate('PAL', $personData->pal) }})</dd>
                        <dt>sex</dt><dd>{{ $dicts->translate('SEX', $user->sex) }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
