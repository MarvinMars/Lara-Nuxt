import $ from 'jquery';
import 'jquery-touchswipe';
import Vue from 'vue'
import VueAwesomeSwiper from '~node_modules/vue-awesome-swiper/dist/ssr';
import components from '@client/components/blocks';
import VueLazyload from 'vue-lazyload'

window.jQuery = window.$ = $;
Vue.use(VueAwesomeSwiper);
Vue.use(VueLazyload);

for (let name in components) {
    Vue.component(name, components[name]);
}

(function (url) {
    let image = new Image();
    image.onload = function () {
        let style = [
            'font-size: 1px;',
            'line-height: 30px;',
            'padding: 30px 100px;',
            // 'background-size: ' + this.width + 'px ' + this.height + 'px;',
            'background-size: cover;',
            'background: url(' + url + ') no-repeat center center;'
        ].join(' ');
        console.info('Proudly developed by %c ', style);
    };
    image.src = url;
})('https://.digital/img/-gray.svg');
