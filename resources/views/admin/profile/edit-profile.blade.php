@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.admin-user.actions.edit_profile'))

@section('body')

    <div class="container-xl">

        <div class="card">

            <profile-edit-profile-form
                    :action="'{{ url('admin/profile') }}'"
                    :data="{{ $adminUser->toJson() }}"

                    inline-template>

                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="this.action">

                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.admin-user.actions.edit_profile') }}
                    </div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-4 text-center">
                                <div class="avatar-upload">
                                    @include('brackets/admin-ui::admin.includes.avatar-uploader', [
                                        'mediaCollection' => app(\Brackets\AdminAuth\Models\AdminUser::class)->getMediaCollection('avatar'),
                                        'media' => $adminUser->getThumbs200ForCollection('avatar')
                                    ])
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group row align-items-center"
                                     :class="{'has-danger': veeErrors.has('first_name'), 'has-success': this.veeFields.first_name && this.veeFields.first_name.valid }">
                                    <label for="first_name" class="col-form-label text-md-right"
                                           :class="isFormLocalized ? 'col-md-4' : 'col-md-3'">{{ trans('admin.admin-user.columns.first_name') }}</label>
                                    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-7'">
                                        <input type="text" v-model="form.first_name" v-validate="''"
                                               @input="validate($event)" class="form-control"
                                               :class="{'form-control-danger': veeErrors.has('first_name'), 'form-control-success': this.veeFields.first_name && this.veeFields.first_name.valid}"
                                               id="first_name" name="first_name"
                                               placeholder="{{ trans('admin.admin-user.columns.first_name') }}">
                                        <div v-if="veeErrors.has('first_name')" class="form-control-feedback form-text"
                                             v-cloak>@{{ veeErrors.first('first_name') }}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row align-items-center"
                                     :class="{'has-danger': veeErrors.has('last_name'), 'has-success': this.veeFields.last_name && this.veeFields.last_name.valid }">
                                    <label for="last_name" class="col-form-label text-md-right"
                                           :class="isFormLocalized ? 'col-md-4' : 'col-md-3'">{{ trans('admin.admin-user.columns.last_name') }}</label>
                                    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-7'">
                                        <input type="text" v-model="form.last_name" v-validate="''"
                                               @input="validate($event)" class="form-control"
                                               :class="{'form-control-danger': veeErrors.has('last_name'), 'form-control-success': this.veeFields.last_name && this.veeFields.last_name.valid}"
                                               id="last_name" name="last_name"
                                               placeholder="{{ trans('admin.admin-user.columns.last_name') }}">
                                        <div v-if="veeErrors.has('last_name')" class="form-control-feedback form-text"
                                             v-cloak>@{{ veeErrors.first('last_name') }}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row align-items-center"
                                     :class="{'has-danger': veeErrors.has('email'), 'has-success': this.veeFields.email && this.veeFields.email.valid }">
                                    <label for="email" class="col-form-label text-md-right"
                                           :class="isFormLocalized ? 'col-md-4' : 'col-md-3'">{{ trans('admin.admin-user.columns.email') }}</label>
                                    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-7'">
                                        <input type="text" v-model="form.email" v-validate="'required|email'"
                                               @input="validate($event)" class="form-control"
                                               :class="{'form-control-danger': veeErrors.has('email'), 'form-control-success': this.veeFields.email && this.veeFields.email.valid}"
                                               id="email" name="email"
                                               placeholder="{{ trans('admin.admin-user.columns.email') }}">
                                        <div v-if="veeErrors.has('email')" class="form-control-feedback form-text"
                                             v-cloak>@{{ veeErrors.first('email') }}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row align-items-center"
                                     :class="{'has-danger': veeErrors.has('language'), 'has-success': this.veeFields.language && this.veeFields.language.valid }">
                                    <label for="language" class="col-form-label text-md-right"
                                           :class="isFormLocalized ? 'col-md-4' : 'col-md-3'">{{ trans('admin.admin-user.columns.language') }}</label>
                                    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-7'">
                                        <multiselect v-model="form.language"
                                                     placeholder="{{ trans('brackets/admin-ui::admin.forms.select_an_option') }}"
                                                     :options="{{ $locales->toJson() }}"
                                                     open-direction="bottom"></multiselect>
                                        <div v-if="veeErrors.has('language')" class="form-control-feedback form-text"
                                             v-cloak>@{{ veeErrors.first('language') }}
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>

                </form>

            </profile-edit-profile-form>

        </div>

    </div>

@endsection
