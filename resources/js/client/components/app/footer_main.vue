<template>
    <footer class="footer-inner">
        <div class="container" v-if="footer">
            <div class="footer-inner__logo">
                <a href="/">
                    <img  v-if="logo.image" :src="logo.image" :alt="logo.text">
                    <img v-if="logo_mini.image" :src="logo_mini.image" :alt="logo_mini.text">
                    <span class="sr-only" v-if="logo.text || logo_mini.text" v-text="logo.text || logo_mini.text"></span>
                </a>
            </div>
            <div class="footer-inner__bottombar">
                <div class="copyright" v-if="copyright" v-html="copyright"></div>
                <div class="contact">
                    <a  v-if="contact_tel.link || contact_tel.text " :href="contact_tel.link" v-text="contact_tel.text"></a>
                    <a  v-if="contact_email.link || contact_email.text " :href="contact_email.link" v-text="contact_email.text"></a>
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
    import {get as objGet, isArray , isObject} from 'lodash';
    export default {
        name: "footer_main",
        computed: {
            footer: function () {
                if (isArray(this.$store.state.settings)) {
                    return objGet(this.$store.state.settings, '0.fields');
                }
            },
            logo: function () {
                if(this.footer.logo){
                    return {
                        image: this.footer.logo.image || '',
                        alt_text: this.footer.logo.alt_text || ''
                    }
                }
                return {}
            },
            logo_mini: function () {
                return {
                    image: this.footer.logo_mini.image || '',
                    alt_text: this.footer.logo_mini.alt_text || ''
                }
            },
            contact_tel: function () {
                return {
                    link: this.footer.contact_tel.link || '',
                    text: this.footer.contact_tel.text || ''
                }
            },
            contact_email: function () {
                return {
                    link: this.footer.contact_email.link || '',
                    text: this.footer.contact_email.text || ''
                }
            },
            copyright: function () {
                return this.footer.copyright || '';
            },
        },
    }
</script>
