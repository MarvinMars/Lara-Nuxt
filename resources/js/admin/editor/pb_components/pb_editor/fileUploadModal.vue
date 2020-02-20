<template>
    <modal :show="shown">
        <header slot="header">
            <div class="plekan-modal-title">File Upload</div>
        </header>
        <div slot="body"
             class="plekan-modal-color-body plekan-clearfix">
            <file-upload :clean="shown"
                         :types="$allowedFileTypes"
                         :fileChange="fileChange">
            </file-upload>

        </div>
        <footer slot="footer"
                class="plekan-clearfix">
            <button class="plekan-footer-button"
                    @click="onFileUpload"
                    :disabled="!file">Upload
            </button>
        </footer>
    </modal>
</template>

<script>
    import modal from './modal';
    import fileUpload from './fileUpload';
    import {exec} from '../../helper';

    export default {
        props: ['shown', 'close'],
        data() {
            return {
                file: null,
            };
        },
        components: {
            modal,
            fileUpload,
        },
        methods: {
            fileChange(file) {
                this.file = file;
            },
            onFileUpload() {
                this.$plekanEvent.onFileUpload(this.file, (url) => {
                    exec(
                        'insertHTML',
                        `<a href="${url.src}" target="_blank">${url.title || url.src}</a>`,
                    );

                    this.close();
                });
            },
        },
    };
</script>
