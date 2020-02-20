import AppForm from '../app-components/Form/AppForm';
import store from '../editor/store';

Vue.component('post-form', {
    mixins: [AppForm],
    data: function () {
        return {
            form: {
                title: '',
                header_subtitle: '',
                slug: '',
                type: '',
                published_at: '',
                enabled: false,
                blocks: [],
                hero: null,
                description: null,
                keywords: null,
            },
            date_config: {
                enableTime: true,
                time_24hr: false,
            },
            store,
            type: [
                'page',
                'project',
                'hero',
                'services',
                'post'
            ]
        }
    },
    beforeMount() {
        if (this.form.blocks) {
            this.store.init('rows', this.form.blocks);
        }
    },
    watch: {
        'store.state.rows': function (blocks) {
            this.form.blocks = blocks || [];
        }
    },
    methods: {
        onSuccess(data) {
            this.submiting = false;

            if (data.message) {
                this.$notify({type: 'success', text: data.message});
                this.form.slug = data.data.slug;
            } else if (data.redirect) {
                window.location.replace(data.redirect);
            }
        },
        isType: function (type) {
            return this.form.type === type;
        }
    }

});
