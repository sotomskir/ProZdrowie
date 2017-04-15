@extends('layouts.app')

@inject('dict', 'App\Services\DictsService')

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
                        <dt>sex</dt><dd>{{ $dict->translate('SEX', $user->sex) }}</dd>
                        @if($user->latestMeasurement)
                            <dt>weight</dt><dd>{{ number_format($user->latestMeasurement->weight, 2) }}</dd>
                            <dt>height</dt><dd>{{ number_format($user->latestMeasurement->height, 2) }}</dd>
                            <dt>bmi</dt><dd>{{ number_format($user->bmi, 1) }} ({{ $dict->translate('BMI', $user->bmi) }})</dd>
                            <dt>cmp</dt><dd>{{ number_format($user->cmp, 2, ',', ' ') }}</dd>
                            <dt>ppm</dt><dd>{{ number_format($user->ppm, 2, ',', ' ') }}</dd>
                            <dt>pal</dt><dd>{{ $user->pal }} ({{ $dict->translate('PAL', $user->pal) }})</dd>
                        @else
                            <dt>Add some measurements to see your stats</dt>
                        @endif
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
