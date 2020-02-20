<template>
    <div class="project__stats"
         :style="blockStyles">
        <div class="container">
            <template v-for="layout in layouts">
                <component :is="layout.component" :data="layout.data" :labelsStyles="labelsStyle">
                </component>
            </template>
        </div>
    </div>
</template>

<script>
    import totalsLayout from './components/stats/layouts/totalsLayout';
    import columnsAndCircleLayout from './components/stats/layouts/columnsAndCircleLayout';
    import imageWithTextLayout from './components/stats/layouts/imageWithTextLayout';
    import comparisonLayout from './components/stats/layouts/comparisonLayout';
    import numbersLayout from './components/stats/layouts/numbersLayout';
    import campaignTotalsLayout from './components/stats/layouts/campaignTotalsLayout';
    import marketingLayout from './components/stats/layouts/marketingLayout';

    import {has as objHas, isObject, get as objGet} from 'lodash';
    import {isComponentExists} from "../../../../mixins/isComponentExistsMixin";

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
        mixins: [
            isComponentExists
        ],
        props: {
            data: {
                type: Object,
                default: () => {
                    return {};
                }
            }
        },
        computed: {
            blockStyles: function () {
                let styles = {};

                if (objHas(this.data, 'fields.backgrounds')) {
                    styles.backgroundImage = this.data
                        .fields
                        .backgrounds
                        .filter(item => {
                            return objHas(item, 'image');
                        })
                        .map(item => {
                            return 'url(\'' + item.image + '\')'
                        })
                        .join(',');
                }

                return styles;
            },
            layouts: function () {
                let layouts = [];

                if (objHas(this.data, 'fields.layouts')) {
                    layouts = this.data.fields.layouts
                        .filter(layout => {
                            return objHas(layout, 'component')
                                && objHas(layout, 'data')
                                && this.isComponentExists(layout.component)
                                && isObject(layout.data)
                        })
                }

                return layouts;
            },
            labelsStyle: function () {
                let styles = [];

                if (objHas(this.data, 'fields.labels_color')) {
                    styles.push({
                        color: objGet(this.data, 'fields.labels_color')
                    });
                }


                return styles;
            }
        }
    }
</script>
