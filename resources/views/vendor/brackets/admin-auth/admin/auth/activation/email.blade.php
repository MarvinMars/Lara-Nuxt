@extends('brackets/admin-ui::admin.layout.master')

@section('title', trans('brackets/admin-auth::admin.activation_form.title'))

@section('content')
    <div class="container" id="app">
        <div class="row align-items-center justify-content-center auth">
            <div class="col-md-6 col-lg-5">
                <div class="card">
                    <div class="card-block">
                        <auth-form
                                :action="'{{ url('/admin/activation/send') }}'"
                                :data="{ 'email': '{{ old('email', '') }}' }"
                                inline-template>
                            <form class="form-horizontal" role="form" method="POST"
                                  action="{{ url('/admin/activation/send') }}"
                                  novalidate>
                                {{ csrf_field() }}
                                <div class="auth-header">
                                    <h1 class="auth-title">{{ trans('brackets/admin-auth::admin.activation_form.title') }}</h1>
                                    <p class="auth-subtitle">{{ trans('brackets/admin-auth::admin.activation_form.note') }}</p>
                                </div>
                                <div class="auth-body">
                                    @include('brackets/admin-auth::admin.auth.includes.messages')
                                    <div class="form-group"
                                         :class="{'has-danger': veeErrors.has('email'), 'has-success': this.veeFields.email && this.veeFields.email.valid }">
                                        <label for="email">{{ trans('brackets/admin-auth::admin.auth_global.email') }}</label>
                                        <div class="input-group input-group--custom">
                                            <div class="input-group-addon"><i class="input-icon input-icon--mail"></i>
                                            </div>
                                            <input type="text" v-model="form.email" v-validate="'required|email'"
                                                   class="form-control"
                                                   :class="{'form-control-danger': veeErrors.has('email'), 'form-control-success': this.veeFields.email && this.veeFields.email.valid}"
                                                   id="email" name="email"
                                                   placeholder="{{ trans('brackets/admin-auth::admin.auth_global.email') }}">
                                        </div>
                                        <div v-if="veeErrors.has('email')" class="form-control-feedback" v-cloak>@{{
                                            veeErrors.first('email') }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="remember" value="1">
                                        <button type="submit" class="btn btn-primary btn-block btn-spinner"><i
                                                    class="fa"></i> {{ trans('brackets/admin-auth::admin.activation_form.button') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </auth-form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
