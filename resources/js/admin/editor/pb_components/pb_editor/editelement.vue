<template>
    <modal :show="shown">
        <header slot="header">
            <div class="plekan-modal-title">Edit</div>
        </header>
        <div slot="body">
            <div v-for="e in getElementPropertyArray"
                 class="plekan-editable-element-fields-container">
                <div class="plekan-editable-element-fields"
                     v-show="elementEditableProperties[e.prop] != undefined">
                    <span>{{e.title}}</span>
                    <input type="text"
                           v-model="elementEditableProperties[e.prop]"
                           :placeholder="e.placeholder">
                </div>
            </div>
            <file-upload :clean="shown"
                         types="png|jpg|jpeg|gif"
                         :fileChange="fileChange"
                         v-if="elementIsImage"></file-upload>
        </div>
        <footer slot="footer"
                class="plekan-clearfix">
            <button @click.prevent="save()"
                    type="button"
                    class="plekan-footer-button">Save
            </button>
            <button @click.prevent="onFileUpload"
                    v-show="elementIsImage"
                    :disabled="!file"
                    type="button"
                    class="plekan-footer-button">Upload
            </button>
        </footer>
    </modal>
</template>
<script>

    import modal from './modal';
    import fileUpload from './fileUpload';

    export default {
        props: ['element', 'shown'],
        components: {
            modal,
            fileUpload,
        },
        data() {
            return {
                event: null,
                getElementPropertyArray: [
                    {title: 'Text', prop: 'text', placeholder: 'Text'},
                    {title: 'Class', prop: 'className', placeholder: 'Class'},
                    {title: 'Source', prop: 'src', placeholder: 'source link'},
                    {
                        title: 'Alt Title',
                        prop: 'alt',
                        placeholder: 'when the image error loaded shown text ',
                    },
                    {title: 'Link', prop: 'href', placeholder: 'source link'},
                    {title: 'Title', prop: 'title', placeholder: 'title text'},
                ],
                elementEditableProperties: {},
                elementIsImage: false,
                file: null,
            };
        },
        updated() {
            document.body.style.overflow = this.shown ? 'hidden' : '';
        },
        watch: {
            shown() {
                this.event = new CustomEvent('domupdated');

                if (!this.element) return;

                const el = this.element;
                const tmp = {};

                this.elementIsImage = el.tagName === 'IMG';
                this.getElementPropertyArray.map((p) => {
                    if (el[p.prop] !== undefined) {
                        tmp[p.prop] = el[p.prop];
                    }
                    return true;
                });

                this.elementEditableProperties = tmp;
            },
        },
        methods: {
            fileChange(file) {
                this.file = file;
            },
            onFileUpload() {
                if (!this.$plekanEvent.onFileUpload) {
                    this.elementEditableProperties.src = this.file.base64;
                    return;
                }

                this.$plekanEvent.onFileUpload(this.file, (obj) => {
                    Object.keys(obj).map((e) => {
                        this.elementEditableProperties[e] = obj[e];
                        return true;
                    });
                });
            },
            save() {
                Object.keys(this.elementEditableProperties).map((e) => {
                    this.element[e] = this.elementEditableProperties[e];
                    return true;
                });
                this.makeABroadcast();
            },
            makeABroadcast() {
                document.dispatchEvent(this.event);
            },
        },
    };

</script>
