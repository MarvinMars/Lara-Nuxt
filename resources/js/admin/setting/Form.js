import AppForm from '../app-components/Form/AppForm';
import mediaUploadMixin from "../mediaUploadMixin.js";

Vue.component('setting-form', {
    mixins: [AppForm, mediaUploadMixin],
    data: function() {
        return {
            form: {
                slug:  '' ,
                fields:  {},
            },
            defaults: {
                logo: {
                    image: '/img/-logo-ring.svg',
                    alt_text: 'Logo Icon',
                },
                logo_mini: {
                    image: '/img/-gray-logo-mini.svg',
                    alt_text:  ' Logo Text',
                },
                copyright: ' <p>© 2019 '' - <a href="/contact-us">Contact Us</a></p>',
                contact_tel:  {
                    link: 'tel:',
                    text:  'tel:',
                },
                contact_email:  {
                    link: 'mailto:''',
                    text: '''',
                },
            },
            schema: {
                fields: [
                    {
                        type: 'mediaUpload',
                        onChanged: this._uploadMedia,
                        label: 'Logo Image',
                        model: 'logo.image',
                    },
                    {
                        type: 'input',
                        inputType: 'text',
                        label: 'Logo Alt text',
                        model: 'logo.alt_text',
                    },
                    {
                        type: 'mediaUpload',
                        onChanged: this._uploadMedia,
                        label: 'Logo mini Image',
                        model: 'logo_mini.image',
                    },
                    {
                        type: 'input',
                        inputType: 'text',
                        label: 'Logo mini Alt text',
                        model: 'logo_mini.alt_text',
                    },
                    {
                        type: 'wysiwyg',
                        label: 'Copyright',
                        model: 'copyright'
                    },
                    {
                        type: 'input',
                        inputType: 'text',
                        label: 'Telephone Link',
                        model: 'contact_tel.link',
                    },
                    {
                        type: 'input',
                        inputType: 'text',
                        label: 'Telephone link text',
                        model: 'contact_tel.text',
                    },
                    {
                        type: 'input',
                        inputType: 'text',
                        label: 'Email Link',
                        model: 'contact_email.link',
                    },
                    {
                        type: 'input',
                        inputType: 'text',
                        label: 'Email link text',
                        model: 'contact_email.text',
                    },
                ]
            }
        }
    },
    methods: {
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
