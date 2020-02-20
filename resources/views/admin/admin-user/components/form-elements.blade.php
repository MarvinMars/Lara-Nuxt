<div class="form-group row align-items-center"
     :class="{'has-danger': veeErrors.has('first_name'), 'has-success': this.veeFields.first_name && this.veeFields.first_name.valid }">
    <label for="first_name" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-3'">{{ trans('admin.admin-user.columns.first_name') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-7'">
        <input type="text" v-model="form.first_name" v-validate="''" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': veeErrors.has('first_name'), 'form-control-success': this.veeFields.first_name && this.veeFields.first_name.valid}"
               id="first_name" name="first_name" placeholder="{{ trans('admin.admin-user.columns.first_name') }}">
        <div v-if="veeErrors.has('first_name')" class="form-control-feedback form-text" v-cloak>@{{
            veeErrors.first('first_name') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': veeErrors.has('last_name'), 'has-success': this.veeFields.last_name && this.veeFields.last_name.valid }">
    <label for="last_name" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-3'">{{ trans('admin.admin-user.columns.last_name') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-7'">
        <input type="text" v-model="form.last_name" v-validate="''" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': veeErrors.has('last_name'), 'form-control-success': this.veeFields.last_name && this.veeFields.last_name.valid}"
               id="last_name" name="last_name" placeholder="{{ trans('admin.admin-user.columns.last_name') }}">
        <div v-if="veeErrors.has('last_name')" class="form-control-feedback form-text" v-cloak>@{{
            veeErrors.first('last_name') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': veeErrors.has('email'), 'has-success': this.veeFields.email && this.veeFields.email.valid }">
    <label for="email" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-3'">{{ trans('admin.admin-user.columns.email') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-7'">
        <input type="text" v-model="form.email" v-validate="'required|email'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': veeErrors.has('email'), 'form-control-success': this.veeFields.email && this.veeFields.email.valid}"
               id="email" name="email" placeholder="{{ trans('admin.admin-user.columns.email') }}">
        <div v-if="veeErrors.has('email')" class="form-control-feedback form-text" v-cloak>@{{ veeErrors.first('email')
            }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': veeErrors.has('password'), 'has-success': this.veeFields.password && this.veeFields.password.valid }">
    <label for="password" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-3'">{{ trans('admin.admin-user.columns.password') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-7'">
        <input type="password" v-model="form.password" v-validate="'min:7'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': veeErrors.has('password'), 'form-control-success': this.veeFields.password && this.veeFields.password.valid}"
               id="password" name="password" placeholder="{{ trans('admin.admin-user.columns.password') }}"
               ref="password">
        <div v-if="veeErrors.has('password')" class="form-control-feedback form-text" v-cloak>@{{
            veeErrors.first('password') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': veeErrors.has('password_confirmation'), 'has-success': this.veeFields.password_confirmation && this.veeFields.password_confirmation.valid }">
    <label for="password_confirmation" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-3'">{{ trans('admin.admin-user.columns.password_repeat') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-7'">
        <input type="password" v-model="form.password_confirmation" v-validate="'confirmed:password|min:7'"
               @input="validate($event)" class="form-control"
               :class="{'form-control-danger': veeErrors.has('password_confirmation'), 'form-control-success': this.veeFields.password_confirmation && this.veeFields.password_confirmation.valid}"
               id="password_confirmation" name="password_confirmation"
               placeholder="{{ trans('admin.admin-user.columns.password') }}" data-vv-as="password">
        <div v-if="veeErrors.has('password_confirmation')" class="form-control-feedback form-text" v-cloak>@{{
            veeErrors.first('password_confirmation') }}
        </div>
    </div>
</div>

<div class="form-group row"
     :class="{'has-danger': veeErrors.has('activated'), 'has-success': this.veeFields.activated && this.veeFields.activated.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-9'">
        <input class="form-check-input" id="activated" type="checkbox" v-model="form.activated" v-validate="''"
               data-vv-name="activated" name="activated_fake_element">
        <label class="form-check-label" for="activated">
            {{ trans('admin.admin-user.columns.activated') }}
        </label>
        <input type="hidden" name="activated" :value="form.activated">
        <div v-if="veeErrors.has('activated')" class="form-control-feedback form-text" v-cloak>@{{
            veeErrors.first('activated') }}
        </div>
    </div>
</div>

<div class="form-group row"
     :class="{'has-danger': veeErrors.has('forbidden'), 'has-success': this.veeFields.forbidden && this.veeFields.forbidden.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-9'">
        <input class="form-check-input" id="forbidden" type="checkbox" v-model="form.forbidden" v-validate="''"
               data-vv-name="forbidden" name="forbidden_fake_element">
        <label class="form-check-label" for="forbidden">
            {{ trans('admin.admin-user.columns.forbidden') }}
        </label>
        <input type="hidden" name="forbidden" :value="form.forbidden">
        <div v-if="veeErrors.has('forbidden')" class="form-control-feedback form-text" v-cloak>@{{
            veeErrors.first('forbidden') }}
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
                     :options="{{ $locales->toJson() }}" open-direction="bottom"></multiselect>
        <div v-if="veeErrors.has('language')" class="form-control-feedback form-text" v-cloak>@{{
            veeErrors.first('language') }}
        </div>
    </div>
</div>


<div class="form-group row align-items-center"
     :class="{'has-danger': veeErrors.has('roles'), 'has-success': this.veeFields.roles && this.veeFields.roles.valid }">
    <label for="roles" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-3'">{{ trans('admin.admin-user.columns.roles') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-7'">
        <multiselect v-model="form.roles" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_options') }}"
                     label="name" track-by="id" :options="{{ $roles->toJson() }}" :multiple="true"
                     open-direction="bottom"></multiselect>
        <div v-if="veeErrors.has('roles')" class="form-control-feedback form-text" v-cloak>@{{ veeErrors.first('roles')
            }}
        </div>
    </div>
</div>
