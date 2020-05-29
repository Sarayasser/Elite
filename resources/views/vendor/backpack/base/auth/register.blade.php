@extends(backpack_view('layouts.plain'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-4" style="flex: 1 0 33.3333333333%; max-width: 80.3333333333%;">
            <h3 class="text-center mb-4">{{ trans('backpack::base.register') }}</h3>
            <div class="card">
                <div class="card-body">
                    <form class="col-md-12 p-t-10" role="form" method="POST" action="{{ route('backpack.auth.register') }}" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class=row>
                            <div class="col-6">
                                <label class="control-label" for="name">{{ trans('backpack::base.name') }}</label>

                                <div>
                                    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" value="{{ old('name') }}">

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="control-label" for="{{ backpack_authentication_column() }}">{{ config('backpack.base.authentication_column_name') }}</label>

                                <div>
                                    <input type="{{ backpack_authentication_column()=='email'?'email':'text'}}" class="form-control{{ $errors->has(backpack_authentication_column()) ? ' is-invalid' : '' }}" name="{{ backpack_authentication_column() }}" id="{{ backpack_authentication_column() }}" value="{{ old(backpack_authentication_column()) }}">

                                    @if ($errors->has(backpack_authentication_column()))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first(backpack_authentication_column()) }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class=row>
                            <div class="col-6">
                                <label class="control-label" for="password">{{ trans('backpack::base.password') }}</label>

                                <div>
                                    <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="password">

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-6">
                                <label class="control-label" for="password_confirmation">{{ trans('backpack::base.confirm_password') }}</label>

                                <div>
                                    <input type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" id="password_confirmation">

                                    @if ($errors->has('password_confirmation'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>


                         <div class=row>
                            <div class="col-6">
                                <label class="control-label" for="phone">phone number</label>

                                <div>
                                    <input type="text" class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number" id="phone_number" value="{{ old('phone_number') }}">

                                    @if ($errors->has('phone_number'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('phone_number') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-6">
                                <label class="control-label" for="address">address</label>

                                <div>
                                    <input type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" id="address" value="{{ old('address') }}">

                                    @if ($errors->has('address'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                         </div>

                         <div class=row>
                            <div class="col-6">
                                <label class="control-label" for="image">Image</label>

                                <input type="file" name="image" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" >
                                @if ($errors->has('image'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                @endif
                            </div>
                         </div>
                        <br>
                        <div class="form-check form-check-radio">
                            <label class="form-check-label">
                                <input class="form-check-input{{ $errors->has('gender') ? ' is-invalid' : '' }}" type="radio"  name="gender" value="0" {{(old('gender') == 0) ? 'checked' : ''}}>
                                Male
                                <span class="form-check-sign"></span>
                            </label>                        
                        </div>
                        <div class="form-check form-check-radio">
                            <label class="form-check-label">
                                <input class="form-check-input{{ $errors->has('gender') ? ' is-invalid' : '' }}" type="radio"  name="gender" value="1" {{(old('gender') == 1) ? 'checked' : ''}} >
                                Female
                                <span class="form-check-sign"></span>
                                @if ($errors->has('gender'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('gender') }}</strong>
                                </span>
                            @endif
                            </label>
                        </div>
                        <br>
                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-block btn-primary">
                                    {{ trans('backpack::base.register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @if (backpack_users_have_email())
                <div class="text-center"><a href="{{ route('backpack.auth.password.reset') }}">{{ trans('backpack::base.forgot_your_password') }}</a></div>
            @endif
            <div class="text-center"><a href="{{ route('backpack.auth.login') }}">{{ trans('backpack::base.login') }}</a></div>
        </div>
    </div>
@endsection
