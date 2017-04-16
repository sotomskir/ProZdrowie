@extends('layouts.app')

@inject('dict', 'App\Services\DictionaryService')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Other users
                    </div>

                    <div class="panel-body">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Stracone<br>kilogramy</th>
                                    <th>First name</th>
                                    <th>Last name</th>
                                    <th>sex</th>
                                    <th>pal</th>
                                    <th>weight [kg]</th>
                                    <th>height [cm]</th>
                                    <th>bmi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr class="{{ $user->id ==$logged->id ? 'active' : '' }}">
                                    <td>{{ $user->weightDiff }}</td>
                                    <td>{{ $user->first_name }}</td>
                                    <td>{{ $user->last_name }}</td>
                                    <td>{{ $dict->translate('SEX', $user->sex) }}</td>
                                    <td>{{ $dict->translate('PAL', $user->pal) }}</td>
                                    <td style="text-align: right;">{{ number_format($user->weight, 2) }} kg</td>
                                    <td style="text-align: right;">{{ number_format($user->height, 2) }} cm</td>
                                    <td>{{ number_format($user->bmi, 1) }} ({{ $dict->translate('BMI', $user->bmi) }})</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
