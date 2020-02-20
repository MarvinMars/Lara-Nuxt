import mediaUploadMixin from "./mixins/mediaUploadMixin";
import {isComponentExists} from "./helpers";

export default {
    mixins: [
        mediaUploadMixin,
        isComponentExists
    ],
    props: {
        data: {
            type: Object,
            required: true
        },
        store: {
            type: Object,
            required: true,
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
    computed: {
        me: function () {
            return this.store.state.rows[this.index];
        },
    },
    mounted: function () {
        this._setModel();
        this._updateModel();
    },
    methods: {
        _setModel: function () {
            this.model = Object.assign(this.defaults, this.data.fields);
        },
        _modelUpdated: function (newVal, schema) {
            this._updateModel();
        },
        _updateModel: function () {
            let temp = this.data;
            temp.fields = this.model;
            this.store.updateRows(this.index, temp);
        },
    }
};
