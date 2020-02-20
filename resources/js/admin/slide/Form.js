import AppForm from '../app-components/Form/AppForm';

Vue.component('slide-form', {
    mixins: [AppForm],
    data: function () {
        return {
            form: {
                slug: '',
                fields: {},
                template: '',
            },
            mediaCollections: ['gallery', 'mobile_image'],
            wysiwygConfig: {
                placeholder: 'Type a text here',
                modules: {
                    toolbar: [
                        [{'header': [1, 2, 3, 4, 5, 6, false]}],
                        ['bold', 'italic', 'underline', 'strike'],
                        [{'list': 'ordered'}, {'list': 'bullet'}],
                        [{'color': []}, {'background': []}],
                        [{'align': []}],
                        ['link'],
                        ['clean']
                    ]
                },
            }
        }
    },
    mounted: function () {
        console.log(this.form);
    },
    methods: {
        checkTemplate(type) {
            return this.form.template === type;
        },
        updateSelected() {
            this.form.fields = {};
        }
    }
});
