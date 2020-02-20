import AppForm from '../app-components/Form/AppForm';

Vue.component('meta-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name:       '' ,
                content:    '' ,
                property:   '' ,
                posts:      []
            },
        }
    }

});