import {isArray, isObject} from "lodash";

export default {
    props: {
        data: {
            type: Object,
            default: () => {
                return {};
            }
        },
    },
    computed: {
        main_block: function () {
            let main_block = this.data.blocks.find(x => x.name === 'post_template').fields;
            return main_block || '';
        },
        backgroundImageUrl: function () {
            return 'url("' + (this.main_block.image || '') + '")';
        },
        published_at: function () {
            return this.data.published_at_format || '';
        },
        link: function () {
            return '/news/' + (this.data.slug || '');
        },
        preview_description: function () {
            return this.main_block.preview_description || '';
        },
        preview_title: function () {
            return this.main_block.preview_title || '';
        },
    }
}
