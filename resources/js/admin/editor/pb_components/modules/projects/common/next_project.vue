<template>
    <div class="card">
        <div class="card-header">
            Next Project Block
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
                    title: 'Georgia Tech',
                    button_label: 'Next Project',
                    button_url: '/',

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
                            label: 'Bottom Link Label',
                            model: 'button_label',
                        },
                        {
                            type: 'input',
                            inputType: 'text',
                            label: 'Bottom Link URL',
                            model: 'button_url',
                            help: 'Relative url only'
                        },
                    ]
                }
            };
        },
    }
</script>
