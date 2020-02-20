import {DEFAULT_UPLOAD_URL} from '@core/constants';
import mediaUploadMixin from '@core/mixins/mediaUploadMixin';

export default {
    mixins: [
        mediaUploadMixin
    ],
    props: {
        data: {
            type: Object,
            default: () => {
                return {};
            }
        },
        index: {
            type: Number,
            required: true,
        }
    },
    data: function () {
        return {
            model: {},
            defaults: {},
        }
    },
    mounted: function () {
        this._setModel();
        this._modelUpdated();
    },
    methods: {
        _setModel: function () {
            this.model = Object.assign(this.defaults, this.data);
        },
        _modelUpdated: function (newVal, schema) {
            this.$emit("layout-updated", this.index, this.model);
        },
        _removeLayout: function () {
            this.$emit('remove-layout', this.index);
        },
    }
};
