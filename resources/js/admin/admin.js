import './bootstrap';

import flatPickr from 'vue-flatpickr-component';
import VueQuillEditor from 'vue-quill-editor';
import Notifications from 'vue-notification';
import Multiselect from 'vue-multiselect';
import VeeValidate from 'vee-validate';
import 'flatpickr/dist/flatpickr.css';
import VueCookie from 'vue-cookie';
import {Admin} from 'craftable';
import VModal from 'vue-js-modal'
import Vue from 'vue';
import './app-components/bootstrap';
import './index';
import 'craftable/dist/ui';
import {plekan} from './editor/core';
import modules from './editor/pb_components/modules/index';
import services from './editor/pb_components/modules/services';
import projects from './editor/pb_components/modules/projects/index';
import VueFormGenerator from 'vue-form-generator';
// Register my awesome field
import fieldDynamic from "./editor/fields/fieldDynamic";
import fieldWysiwyg from './editor/fields/fieldWysiwyg';
import fieldMediaUpload from './editor/fields/fieldMediaUpload';
import fieldColor from './editor/fields/fieldColor';
import { FieldArray } from 'vfg-field-array';
import { FieldObject } from 'vfg-field-object';



Vue.component('multiselect', Multiselect);
Vue.use(VeeValidate, {
    strict: true,
    errorBagName: 'veeErrors',
    fieldsBagName: 'veeFields',
});
Vue.component('datetime', flatPickr);
Vue.use(VModal, {
    dialog: true,
    dynamic: true
});
Vue.use(VueQuillEditor);
Vue.use(Notifications);
Vue.use(VueCookie);

Vue.component('fieldDynamic', fieldDynamic);
Vue.component('fieldWysiwyg', fieldWysiwyg);
Vue.component('fieldMediaUpload', fieldMediaUpload);
Vue.component('fieldColor', fieldColor);
Vue.component('fieldArray', FieldArray);
Vue.component('fieldObject', FieldObject);
Vue.use(VueFormGenerator);

Vue.use(plekan, {
    modules: [
        ...modules,
        ...services,
        ...projects,
    ]
});


new Vue({
    mixins: [Admin],
});
