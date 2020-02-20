<template>
    <div class="card">
        <div class="card-header">
            Project: Results
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
                    title: '',
                    content: '',
                    link_label: 'visit site',
                    link_url: '#',
                    tablet_screen_image: '/img/clemson-tablet-screen3.png',
                    mobile_screen_image: '/img/clemson-mobile-screen5.png',
                    percentage: {
                        color: '#522d80',
                        value: '99%',
                        icon: '/img/arrow-purple.svg',
                    }
                },
                schema: {
                    groups: [
                        {
                            legend: 'Common Configuration',
                            fields: [
                                {
                                    type: 'input',
                                    inputType: 'text',
                                    label: 'Title',
                                    model: 'title',
                                },
                                {
                                    type: 'wysiwyg',
                                    inputType: 'text',
                                    label: 'Content',
                                    model: 'content',
                                },
                                {
                                    type: 'input',
                                    inputType: 'text',
                                    label: 'Link Label',
                                    model: 'link_label',
                                },
                                {
                                    type: 'input',
                                    inputType: 'text',
                                    label: 'Link URL',
                                    model: 'link_url',
                                },
                            ]
                        },
                        {
                            legend: 'Images',
                            fields: [
                                {
                                    type: 'mediaUpload',
                                    label: 'Tablet Screen image',
                                    onChanged: this._uploadMedia,
                                    model: 'tablet_screen_image',
                                },
                                {
                                    type: 'mediaUpload',
                                    label: 'Mobile Screen image',
                                    onChanged: this._uploadMedia,
                                    model: 'mobile_screen_image',
                                },
                            ]
                        },
                        {
                            legend: 'Percentage',
                            fields: [
                                {
                                    type: 'color',
                                    label: 'Percentage color',
                                    model: 'percentage.color',
                                },
                                {
                                    type: 'input',
                                    inputType: 'text',
                                    label: 'Percentage value',
                                    model: 'percentage.value',
                                },
                                {
                                    type: 'mediaUpload',
                                    label: 'Percentage Icon',
                                    onChanged: this._uploadMedia,
                                    model: 'percentage.icon',
                                },
                            ]
                        }
                    ]
                }
            };
        },
    }
</script>
