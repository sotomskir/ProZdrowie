@extends('layouts.app')

@inject('dict', 'App\Services\DictionaryService')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Create measurement
                    </div>

                    <div class="panel-body">
                        <form action="{{  url('/measurements') }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('post') }}

                            <div class="form-group{{ $errors->has('height') ? ' has-error' : '' }}">
                                <label for="height">Wzrost [cm]</label>
                                <div class="">
                                    <input id="height" type="text" name="height" class="form-control"
                                           value="{{ old('height') }}"/>
                                    @if($user && $user->latestMeasurement)
                                        Ostatnio dodane: {{ $user->latestMeasurement->height }}
                                    @endif
                                    @if ($errors->has('height'))
                                        <span class="help-block"><strong>{{ $errors->first('height') }}</strong></span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('weight') ? ' has-error' : '' }}">
                                <label for="weight">Waga [kg]</label>
                                <div class="">
                                    <input id="weight" type="text" name="weight" class="form-control"
                                           value="{{ old('weight') }}"/>
                                    @if($user && $user->latestMeasurement)
                                        Ostatnio dodane: {{ $user->latestMeasurement->weight }}
                                    @endif
                                    @if ($errors->has('weight'))
                                        <span class="help-block"><strong>{{ $errors->first('weight') }}</strong></span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('waist') ? ' has-error' : '' }}">
                                <label for="waist">Talia [cm]</label>
                                <div class="">
                                    <input id="waist" type="text" name="waist" class="form-control"
                                           value="{{ old('waist') }}"/>
                                    @if($user && $user->latestMeasurement)
                                        Ostatnio dodane: {{ $user->latestMeasurement->waist }}
                                    @endif
                                    @if ($errors->has('waist'))
                                        <span class="help-block"><strong>{{ $errors->first('waist') }}</strong></span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('biceps') ? ' has-error' : '' }}">
                                <label for="biceps">Biceps [cm]</label>
                                <div class="">
                                    <input id="biceps" type="text" name="biceps" class="form-control"
                                           value="{{ old('biceps') }}"/>
                                    @if($user && $user->latestMeasurement)
                                        Ostatnio dodane: {{ $user->latestMeasurement->biceps }}
                                    @endif
                                    @if ($errors->has('biceps'))
                                        <span class="help-block"><strong>{{ $errors->first('biceps') }}</strong></span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('hips') ? ' has-error' : '' }}">
                                <label for="hips">Uda [cm]</label>
                                <div class="">
                                    <input id="hips" type="text" name="hips" class="form-control"
                                           value="{{ old('hips') }}"/>
                                    @if($user && $user->latestMeasurement)
                                        Ostatnio dodane: {{ $user->latestMeasurement->hips }}
                                    @endif
                                    @if ($errors->has('hips'))
                                        <span class="help-block"><strong>{{ $errors->first('hips') }}</strong></span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('thigh') ? ' has-error' : '' }}">
                                <label for="thigh">Udo [cm]</label>
                                <div class="">
                                    <input id="thigh" type="text" name="thigh" class="form-control"
                                           value="{{ old('thigh') }}"/>
                                    @if($user && $user->latestMeasurement)
                                        Ostatnio dodane: {{ $user->latestMeasurement->thigh }}
                                    @endif
                                    @if ($errors->has('thigh'))
                                        <span class="help-block"><strong>{{ $errors->first('thigh') }}</strong></span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('chest') ? ' has-error' : '' }}">
                                <label for="chest">Klatka piersiowa [cm]</label>
                                <div class="">
                                    <input id="chest" type="text" name="chest" class="form-control"
                                           value="{{ old('chest') }}"/>
                                    @if($user && $user->latestMeasurement)
                                        Ostatnio dodane: {{ $user->latestMeasurement->chest }}
                                    @endif
                                    @if ($errors->has('chest'))
                                        <span class="help-block"><strong>{{ $errors->first('chest') }}</strong></span>
                                    @endif
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Save">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
