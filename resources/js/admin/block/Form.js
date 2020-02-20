import AppForm from '../app-components/Form/AppForm';

Vue.component('block-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name:  '' ,
                group:  '' ,
                html:  '' ,
                fields:  '',
                order:  '' ,
                post_id:  '' ,
                
            },
            wysiwygConfig: {
                placeholder: 'Type here',
                modules: {
                    toolbar: [
                        [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                        ['bold', 'italic', 'underline', 'strike'],
                        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                        [{ 'color': [] }, { 'background': [] }],
                        [{ 'align': [] }],
                        ['link'],
                        ['clean']
                    ]
                },
                theme: 'bubble'
            }
        }
    }

});