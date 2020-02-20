import './plekan_editor';
import plekancomponent from '../pb_components/pb_editor/plekan';
import store from '../store';
import '../helper';
import plekanComponentMixin from './mixin';
import flexibleContentEditor from "./flexibleContentEditor";

const plekan = {},
    plekanOptions = {
        rows: [],
        modules: {},
        customEditorButtons: [],
        allowedFileTypes: '',
        plekan_buttons: {},
        plekanEvent: {
            onAdd: () => {
            },
            onDelete: () => {
            },
            onSort: () => {
            },
            onDuplicate: () => {
            },
            onUpdate: () => {
            },
            onInit: () => {
            },
            onFileUpload: () => {
            },
        },
    };

plekan.install = (Vue, optionsOut) => {
    const options = Object.assign({}, plekanOptions, optionsOut);
    options.plekanEvent = Object.assign(
        {},
        plekanOptions.plekanEvent,
        optionsOut.plekanEvent,
    );

    Vue.component('plekan', plekancomponent);
    if (!options.modules) {
        throw new Error('modules is not set..');
    }

    if (options.rows) {
        store.init('rows', options.rows);
    }

    const _modules = Object.assign([], options.modules);

    const oList = _modules.map(m => {
        m.html = m.html || '';
        m.fields = m.fields || {};
        m.context.default.mixins = m.context.default.mixins || [];
        m.context.default.mixins.push(flexibleContentEditor);

        Vue.component(m.name, m.context.default);

        delete m.context;
        return m;
    });

    store.init("moduleList", oList);

    Vue.prototype.$plekan_buttons = options.plekan_buttons;
    Vue.prototype.$customEditorButtons = options.customEditorButtons;
    Vue.prototype.$thumbnailPath = options.thumbnailPath || "/";
    Vue.prototype.$allowedFileTypes = options.allowedFileTypes;
    Vue.prototype.$plekanEvent = options.plekanEvent;

    Vue.prototype.$plekanutils = {
        makeUrl(url, prefix) {
            const RegExp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
            if (RegExp.test(url)) {
                return url;
            }
            return url;
        },
    };
};

export {plekan, plekanComponentMixin};
