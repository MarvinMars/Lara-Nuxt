import {DEFAULT_UPLOAD_URL} from '@core/constants';
import { get as objGet } from "lodash";

export default {
    data: function () {
        return {
            mimeTypes: [
                'image/jpeg',
                'image/png',
                'image/svg+xml',
                'image/gif'
            ],
            uploadUrl: null,
        }
    },
    created: function () {
        if (!this.uploadUrl) {
            this.uploadUrl = DEFAULT_UPLOAD_URL;
        }
    },
    methods: {
        _uploadMedia: function (model, schema, event, instance) {
            if (!this.uploadUrl) {
                console.error('Upload url does not set');

                return;
            }

            if (!event || !event.target || !event.target.files) {
                return;
            }

            const file = event.target.files[0];

            if (!file || !this.mimeTypes.filter(mimeType => {
                    return file.type === mimeType;
                }).length) {
                this.$notify({
                    type: 'error',
                    title: 'Unsupported file type!',
                    text: `File type ${file.type} does not supported.`
                });

                return;
            }

            let formData = new FormData;

            formData.append('file', file);

            axios.post(this.uploadUrl,
                formData,
                {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }
            ).then((response) => {
                if (response.data.url) {
                    this.$notify({
                        type: 'success',
                        title: 'File uploaded!',
                    });
                    instance.updateModelValue(response.data.url, objGet(model, schema.model));
                    event.target.value = '';
                    this._updateModel();
                } else {
                    throw new Error('File not uploaded correctly');
                }
            }).catch((exception) => {
                this.$notify({
                    type: 'error',
                    title: 'File does not uploaded!',
                    text: exception.message
                });
            });
        },
    }
};
