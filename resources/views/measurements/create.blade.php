@extends('layouts.app')

@inject('dict', 'App\Services\DictsService')

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
                            <div class="form-group{{ $errors->has('pal') ? ' has-error' : '' }}">
                                <label for="pal">PAL</label>
                                <div class="">
                                    <select id="pal" name="pal" class="form-control">
                                        @foreach($dict as $key => $value)
                                            <option value="{{ $key }}" {{ old('pal') === $key ? 'selected' : '' }}>
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('pal'))
                                        <span class="help-block"><strong>{{ $errors->first('pal') }}</strong></span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('height') ? ' has-error' : '' }}">
                                <label for="height">Height [cm]</label>
                                <div class="">
                                    <input id="height" type="text" name="height" class="form-control" value="{{ old('height') }}"/>
                                    @if ($errors->has('height'))
                                        <span class="help-block"><strong>{{ $errors->first('height') }}</strong></span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('weight') ? ' has-error' : '' }}">
                                <label for="weight">Weight [kg]</label>
                                <div class="">
                                    <input id="weight" type="text" name="weight" class="form-control" value="{{ old('weight') }}"/>
                                    @if ($errors->has('weight'))
                                        <span class="help-block"><strong>{{ $errors->first('weight') }}</strong></span>
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
