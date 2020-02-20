<div class="form-group row align-items-center" :class="{'has-danger': veeErrors.has('title'), 'has-success': this.veeFields.title && this.veeFields.title.valid }">
    <label for="title" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.category.columns.title') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.title" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': veeErrors.has('title'), 'form-control-success': this.veeFields.title && this.veeFields.title.valid}" id="title" name="title" placeholder="{{ trans('admin.category.columns.title') }}">
        <div v-if="veeErrors.has('title')" class="form-control-feedback form-text" v-cloak>@{{ veeErrors.first('title') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': veeErrors.has('slug'), 'has-success': this.veeFields.slug && this.veeFields.slug.valid }">
    <label for="slug" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.category.columns.slug') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.slug" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': veeErrors.has('slug'), 'form-control-success': this.veeFields.slug && this.veeFields.slug.valid}" id="slug" name="slug" placeholder="{{ trans('admin.category.columns.slug') }}">
        <div v-if="veeErrors.has('slug')" class="form-control-feedback form-text" v-cloak>@{{ veeErrors.first('slug') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': veeErrors.has('description'), 'has-success': this.veeFields.description && this.veeFields.description.valid }">
    <label for="description" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.category.columns.description') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.description" v-validate="''" id="description" name="description" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="veeErrors.has('description')" class="form-control-feedback form-text" v-cloak>@{{ veeErrors.first('description') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': veeErrors.has('posts'), 'has-success': this.veeFields.posts && this.veeFields.posts.valid }">
    <label for="property" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.meta.columns.chose_posts') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect v-model="form.posts" :options="{{$posts->toJson()}}"
                     :class="{'form-control-danger': veeErrors.has('form.posts'), 'form-control-success': this.veeFields.posts && this.veeFields.posts.valid}"
                     id="posts" name="posts" placeholder="{{ trans('admin.meta.columns.chose_posts') }}"
                     track-by="id" :multiple="true" :searchable="true" label="slug"
        ></multiselect>
        <div v-if="veeErrors.has('posts')" class="form-control-feedback form-text" v-cloak>@{{ veeErrors.first('posts') }}</div>
    </div>
</div>


