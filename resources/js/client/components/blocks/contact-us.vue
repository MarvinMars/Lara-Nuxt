<template>
    <section class="contacts">
        <v-dialog>
        </v-dialog>
        <div class="contacts__form">
            <h1>Connect With Us</h1>
            <p>Have a project you’re interested in discussing with us? <br>Drop us a line below, we’d love to talk.</p>
            <form @submit.prevent="submit">
                <div class="form-group required">
                    <label for="username_field" class="sr-only">Name</label>
                    <input v-validate="'required|alpha'" :class="{'is-danger': errors.has('name') }" type="text" v-model="name" name="name" id="username_field" placeholder="Name">
                    <p class="error">{{ errors.first('name') }}</p>
                </div>
                <div class="form-group required">
                    <label for="email_field" class="sr-only">Email</label>
                    <input v-validate="'required|email'" :class="{'is-danger': errors.has('email') }" type="email" v-model="email" name="email" id="email_field" placeholder="Your email">
                    <p class="error">{{ errors.first('email') }}</p>
                </div>
                <div class="form-group required">
                    <label for="company_field" class="sr-only">Company / Organization</label>
                    <input v-validate="'required'" :class="{'is-danger': errors.has('company') }" type="text" v-model="company" name="company" id="company_field"
                           placeholder="Company / Organization">
                    <p class="error">{{ errors.first('company') }}</p>
                </div>
                <div class="form-group required">
                    <label for="details_field" class="sr-only">Project Details</label>
                    <textarea v-validate="'required'" :class="{'is-danger': errors.has('project_details') }" v-model="project_details" name="project_details"
                              id="details_field" placeholder="Project Details" cols="30" rows="10"></textarea>
                    <p class="error">{{ errors.first('project_details') }}</p>
                </div>
                <button type="submit"><span><small data-hover="send">send</small></span></button>
            </form>
            <div class="social">
                <a v-for="item in social" v-if="item.url || item.label" :href="item.url" target="_blank" rel="noopener">
                    <span><small :data-hover=" item.label" v-text="item.label"></small></span>
                </a>
            </div>
        </div>
        <div class="contacts__data" style="background-image: url(/img/contacts_background.jpg)">
            <div class="text">
                <h2>Our Offices</h2>
                <div class="list">
                    <div class="item">
                        <h3>miami</h3>
                        <a href="https://goo.gl/maps/Vzwi942ThMKHnkTK8" target="_blank">777 Brickell Ave <br>
                            Suite 500 <br>
                            Miami, FL 33131</a>
                    </div>
                    <div class="item">
                        <h3>los angeles</h3>
                        <a href="https://goo.gl/maps/SYgD1VwP4HngcLa68" target="_blank">12130 Millenium Dr. <br>
                            2nd Floor <br>
                            Los Angeles, CA 90094</a>
                    </div>
                    <div class="item">
                        <h3>london</h3>
                        <a href="https://goo.gl/maps/kqM5tm3HHHHnke5w7" target="_blank">90 York Way <br>
                            London, N1 9AG <br>
                            United Kingdom</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import { Validator } from 'vee-validate';

    const dictionary = {
        en: {
            attributes: {
                name: 'Name',
                email: 'Email Address',
                company: 'Company / Organization',
                project_details: 'Project Details',
            }
        }
    };

    Validator.localize(dictionary);

    import axios from 'axios'

    export default {
        name: "contactUs",
        computed: {
            social() {
                return this.$store.state.menus.social
            },
        },
        data() {
            return {
                name: '',
                email: '',
                company: '',
                project_details: '',
                loading: false,
            }
        },
        methods: {
            submit: function () {
                this.$validator.validateAll().then(() => {
                    this.loading = true;
                    axios.post('/api/contacts', {
                        'name': this.name,
                        'email': this.email,
                        'company': this.company,
                        'project_details': this.project_details
                    }).then((response) => {
                        this.loading = false;
                        if (response.data.message) {
                            this.showPopup('Success', response.data.message);
                        }
                        this.name = this.email = this.company = this.project_details = '';
                        this.$validator.reset();
                    }, (response) => {
                        this.loading = false;
                        if (response.data.message) {
                            this.showPopup('Error', response.data.message);
                        }
                    });
                });
            },
            showPopup: function (title, message) {
                this.$modal.show('dialog', {
                    title: title || '',
                    text: message,
                    buttons: [
                        {
                            title: 'Close'
                        }
                    ]
                })
            },
        }
    }
</script>
