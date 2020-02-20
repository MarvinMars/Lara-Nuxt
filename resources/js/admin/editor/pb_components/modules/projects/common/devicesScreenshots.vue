<template>
    <div class="card">
        <div class="card-header">
            Project Devices Screenshots
        </div>
        <div class="card-body">
            <vue-form-generator :schema="schema" :model="model" @model-updated="_modelUpdated">
            </vue-form-generator>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                defaults: {
                    title: 'Responsive <br />Design',
                    subtitle: '',
                    description: '',
                    image: '/img/gt-mobile-screen1.png',
                    devices: [
                        {
                            image: '/img/gt-mobile-screen2.png'
                        },
                        {
                            image: '/img/gt-tablet-screen1.png'
                        }
                    ]
                },
                schema: {
                    fields: [
                        {
                            type: 'input',
                            inputType: 'text',
                            label: 'Title',
                            model: 'title',
                        },
                        {
                            type: 'input',
                            inputType: 'text',
                            label: 'Subtitle',
                            model: 'subtitle',
                        },
                        {
                            type: 'wysiwyg',
                            label: 'Description',
                            model: 'description',
                        },
                        {
                            type: 'mediaUpload',
                            label: 'Image',
                            onChanged: this._uploadMedia,
                            model: 'image',
                        },
                        {
                            type: 'array',
                            label: 'Devices Images',
                            model: 'devices',
                            showRemoveButton: true,
                            showModeElementUpButton: true,
                            showModeElementDownButton: true,
                            itemFieldClasses: "form-control",
                            itemContainerClasses: "card card-body card-block pb-2",
                            newElementButtonLabelClasses: "btn btn-success btn-block",
                            removeElementButtonClasses: "btn btn-danger",
                            moveElementUpButtonClasses: "btn btn-outline-dark",
                            moveElementDownButtonClasses: "btn btn-outline-dark",
                            items: {
                                type: 'object',
                                default: {
                                    image: null,
                                },
                                schema: {
                                    fields: [
                                        {
                                            type: 'mediaUpload',
                                            label: 'Image',
                                            onChanged: this._uploadMedia,
                                            model: 'image',
                                        },
                                    ]
                                }
                            },

                        },
                    ]
                }
            };
        },
    }
</script>
