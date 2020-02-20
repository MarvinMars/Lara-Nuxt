<template>
    <div class="card">
        <div class="card-header">
            Image with text
            <button @click.prevent="_removeLayout" class="btn btn-warning btn-sm">
                {{ schema.remove_block_label || 'Remove Layout' }}
            </button>
        </div>
        <div class="card-body">
            <vue-form-generator :schema="schema" :model="model" @model-updated="_modelUpdated">
            </vue-form-generator>
        </div>
    </div>
</template>

<script>
    import layoutMixin from "@core/mixins/layoutMixin";

    export default {
        name: 'imageWithTextLayout',
        mixins: [
            layoutMixin
        ],
        data: function () {
            return {
                defaults: {
                    title: 'Google Organic Results',
                    content: '',
                    image: '/img/gt-tablet-screen2.png',
                },
                schema: {
                    groups: [
                        {
                            fields: [
                                {
                                    type: 'input',
                                    inputType: 'text',
                                    label: 'Title',
                                    model: 'title',
                                },
                                {
                                    type: 'wysiwyg',
                                    label: 'Content',
                                    model: 'content',
                                },
                                {
                                    type: 'mediaUpload',
                                    label: 'Image',
                                    onChanged: this._uploadMedia,
                                    model: 'image',
                                },
                            ]
                        }
                    ],
                }
            }
        }
    }
</script>
