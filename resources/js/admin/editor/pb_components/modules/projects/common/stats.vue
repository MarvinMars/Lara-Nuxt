<template>
    <div class="card">
        <div class="card-header">
            Project Stats
        </div>
        <div class="card-body">
            <vue-form-generator :schema="schema" :model="model" @model-updated="_modelUpdated">
            </vue-form-generator>

            <template v-for="(layout, index) in model.layouts">
                <component :is="layout.component"
                           :data="Object.assign({}, layout.data)"
                           :index="index"
                           @remove-layout="removeLayout"
                           v-if="isComponentExists(layout.component)"
                           @layout-updated="updateLayout">
                </component>
                <div class="alert alert-warning" v-else>
                    Component {{ layout.component }} does not exists.
                </div>
            </template>

            <select v-if="layouts" @change="addLayout">
                <option value="">Select Layout</option>
                <option v-for="layout in layouts" :value="layout.name">
                    {{ layout.label }}
                </option>
            </select>
        </div>
    </div>
</template>

<script>
    import {has as objHas} from 'lodash';
    import totalsLayout from "./layouts/stats/totalsLayout";
    import columnsAndCircleLayout from './layouts/stats/columnsAndCircleLayout';
    import imageWithTextLayout from './layouts/stats/imageWithTextLayout';
    import comparisonLayout from './layouts/stats/comparisonLayout';
    import numbersLayout from './layouts/stats/numbersLayout';
    import campaignTotalsLayout from './layouts/stats/campaignTotalsLayout';
    import marketingLayout from './layouts/stats/marketingLayout';

    export default {
        components: {
            totalsLayout,
            columnsAndCircleLayout,
            imageWithTextLayout,
            comparisonLayout,
            numbersLayout,
            campaignTotalsLayout,
            marketingLayout,
        },
        data: function () {
            return {
                defaults: {
                    backgrounds: [
                        {
                            image: '/img/stats-background-image1.png'
                        },
                        {
                            image: '/img/stats-background-image2.png'
                        },
                    ],
                    labels_color: null,
                    layouts: [],
                },
                schema: {
                    groups: [
                        {
                            fields: [
                                {
                                    type: 'dynamic',
                                    label: 'Backgrounds',
                                    model: 'backgrounds',
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
                                {
                                    type: 'color',
                                    label: 'Labels color',
                                    model: 'labels_color',
                                },
                            ]
                        }
                    ],
                },
                layouts: [
                    {
                        name: 'totalsLayout',
                        label: 'Totals',
                    },
                    {
                        name: 'columnsAndCircleLayout',
                        label: 'Columns and Circle'
                    },
                    {
                        name: 'imageWithTextLayout',
                        label: 'Image with text',
                    },
                    {
                        name: 'comparisonLayout',
                        label: 'Comparison'
                    },
                    {
                        name: 'numbersLayout',
                        label: 'Numbers'
                    },
                    {
                        name: 'campaignTotalsLayout',
                        label: 'Campaign Totals'
                    },
                    {
                        name: 'marketingLayout',
                        label: 'Marketing'
                    }
                ]
            };
        },
        methods: {
            addLayout: function (event) {
                let value = event.target.value;

                event.target.value = '';

                if (value) {
                    this.model.layouts.push({
                        component: value,
                        data: {}
                    });
                    this._updateModel();
                }
            },
            removeLayout: function (i) {
                if (!confirm('Are you sure?')) {
                    return;
                }

                this.model.layouts.splice(i, 1);
                this._updateModel();
            },
            updateLayout: function (index, value) {
                if (objHas(this.model.layouts, index)) {
                    this.model.layouts[index].data = value;
                }

                this._updateModel();
            }
        }
    }
</script>

