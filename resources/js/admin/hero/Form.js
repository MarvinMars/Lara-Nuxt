import AppForm from '../app-components/Form/AppForm';
import draggable from 'vuedraggable'
import mediaUploadMixin from "../mediaUploadMixin.js";

Vue.component('hero-form', {
    mixins: [AppForm, mediaUploadMixin],
    components: {
        draggable,
    },
    data: function() {
        return {
            form: {
                slug: '',
                template: '',
                slides: [],
                slides_for_remove: [],
            },
            drag : false,
            template_select: [
                'homepage',
                'work',
            ],
            defaults: {
                slug: '',
                fields: {
                    image: "",
                    description: "",
                    project_link: "",
                    title: "",
                    website: "",
                    work_done: "",
                    year: ""
                },
            },
            schemaHomepage: {
                fields: [
                    {
                        type: 'input',
                        inputType: 'text',
                        label: 'Slug',
                        model: 'slug',
                    },
                    {
                        type: 'mediaUpload',
                        onChanged: this._uploadMedia,
                        label: 'Slide Image',
                        model: 'fields.image',
                    },
                    {
                        type: 'mediaUpload',
                        onChanged: this._uploadMedia,
                        label: 'Mobile slide Image',
                        model: 'fields.mobile_image',
                    },
                    {
                        type: 'wysiwyg',
                        label: 'Description',
                        model: 'fields.description',
                    },
                    {
                        type: 'input',
                        inputType: 'text',
                        label: 'Project link',
                        model: 'fields.project_link',
                    },
                    {
                        type: 'input',
                        inputType: 'text',
                        label: 'Title',
                        model: 'fields.title',
                    },
                    {
                        type: 'input',
                        inputType: 'text',
                        label: 'Website',
                        model: 'fields.website',
                    },
                    {
                        type: 'input',
                        inputType: 'text',
                        label: 'Work Done',
                        model: 'fields.work_done',
                    },
                    {
                        type: 'input',
                        inputType: 'text',
                        label: 'Year',
                        model: 'fields.year',
                    },
                ]
            },
            schemaWork: {
                fields: [
                    {
                        type: 'input',
                        inputType: 'text',
                        label: 'Slug',
                        model: 'slug',
                    },
                    {
                        type: 'mediaUpload',
                        onChanged: this._uploadMedia,
                        label: 'Slide Image',
                        model: 'fields.image',
                    },
                    {
                        type: 'mediaUpload',
                        onChanged: this._uploadMedia,
                        label: 'Mobile slide Image',
                        model: 'fields.mobile_image',
                    },
                    {
                        type: 'input',
                        inputType: 'text',
                        label: 'Work Category',
                        model: 'fields.work_category',
                    },
                    {
                        type: 'input',
                        inputType: 'text',
                        label: 'Title',
                        model: 'fields.title',
                    },
                    {
                        type: 'wysiwyg',
                        label: 'Description',
                        model: 'fields.description',
                    },
                    {
                        type: 'input',
                        inputType: 'text',
                        label: 'Project link',
                        model: 'fields.project_link',
                    },
                ]
            },
            show: true,
        }
    },
    watch: {
        'form.template': function () {
            this.SwitchTemplate();
        }
    },
    methods:{
        SwitchTemplate() {
            if(this.form.template === 'work'){
                return this.schemaWork;
            }
            return this.schemaHomepage;
        },
        AddSlide(){
            this.form.slides.push({
                slug: '',
                template: '',
                fields: {
                    description: "",
                    project_link: "",
                    title: "",
                    website: "",
                    work_done: "",
                    year: "",
                    image: "",
                    mobile_image: "",
                },
            });
        },
        CopySlide(slide){
            if(typeof slide !== 'undefined'){
                this.form.slides.push(
                    {
                        slug:               slide.slug || '',
                        template:           slide.template || '',
                        fields: {
                            description:    slide.fields.description || '',
                            project_link:   slide.fields.project_link || '',
                            title:          slide.fields.title || '',
                            website:        slide.fields.website || '',
                            work_done:      slide.fields.work_done || '',
                            year:           slide.fields.year || '',
                            image:          slide.fields.image || "",
                            mobile_image:   slide.fields.mobile_image || "",
                        },
                    }
                )
            }
        },
        RemoveSlide(index){
            if(typeof index !== 'undefined') {
                this.form.slides.splice(index, 1);
            }
        },
        onSuccess(data) {
            this.submiting = false;

            if (data.message) {
                this.$notify({type: 'success', text: data.message});
            } else if (data.redirect) {
                window.location.replace(data.redirect);
            }
        },
    }
});