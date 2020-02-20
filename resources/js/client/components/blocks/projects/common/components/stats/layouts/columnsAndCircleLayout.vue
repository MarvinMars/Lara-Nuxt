<template>
    <div class="graphics">
        <div class="graphics__section">
            <h3>Facebook Demographics</h3>
            <div class="row">
                <div class="highchart col-xl-6 col-lg-12">
                    <template v-if="isHasColumns">
                        <h4 :style="labelsStyles">{{ columns.title }}</h4>
                        <div class="legend">
                            <div class="label" v-for="label in columns.labels">
                                <span>{{ label }}</span>
                            </div>
                        </div>
                        <div class="charts">
                            <div class="item" v-for="column in columns.columns">
                                <div class="chart" :style="column.columnStyles">
                                </div>
                                <span>{{ column.label }}</span>
                            </div>
                        </div>
                    </template>
                </div>
                <div class="circle col-xl-5 col-lg-12">
                    <template v-if="isHasPieChart">
                        <h4 :style="labelsStyles">{{ pieChart.title }}</h4>
                        <div class="diagramm">
                            <donut-chart :values="pieChart.values" :colors="pieChart.colors">
                            </donut-chart>
                        </div>
                        <div class="legend">
                            <div class="item" v-for="item in pieChart.legend">
                                <i :style="item.style"></i>
                                <span>{{ item.label }}</span>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {get as objGet, has as objHas, isEmpty, isNumber} from 'lodash';
    import DonutChart from "../partials/donutChart";

    export default {
        components: {DonutChart},
        name: 'columnsAndCircleLayout',
        props: {
            data: {
                type: Object,
                required: true,
            },
            labelsStyles: {
                type: Array,
                required: false,
                default: function () {
                    return [];
                }
            }
        },
        computed: {
            title: function () {
                return objGet(this.data, 'title');
            },
            isHasColumns: function () {
                return objHas(this.data, 'columns.xAxis') && !isEmpty(this.data.columns.xAxis);
            },
            columns: function () {
                if (!this.isHasColumns) {
                    return {};
                }

                let data = {
                    title: objGet(this.data.columns, 'yAxis'),
                    labels: [],
                    columns: [],
                };

                const maxValue = objGet(this.data, 'columns.max') || 100;

                if (!isNumber(maxValue) || maxValue <= 0) {
                    return {};
                }

                if (objHas(this.data.columns, 'yLabels')) {
                    data.labels = this.data.columns.yLabels
                        .filter(item => {
                            return objHas(item, 'label');
                        })
                        .map(item => {
                            return objGet(item, 'label');
                        }).reverse();
                }

                if (objHas(this.data.columns, 'xAxis')) {
                    data.columns = this.data.columns.xAxis
                        .filter(item => {
                            return objHas(item, 'value');
                        })
                        .map(item => {
                            let value = objGet(item, 'value'),
                                percentage = 0;

                            if (isNumber(value) && value > 0) {
                                percentage = ((100 * value) / maxValue);
                            }

                            let result = {
                                columnStyles: {
                                    height: percentage + '%'
                                },
                                label: objGet(item, 'label'),
                            };

                            if (objHas(item, 'top_color') && objHas(item, 'bottom_color')) {
                                result.columnStyles.background = 'linear-gradient(to bottom, ' + objGet(item, 'top_color') + ' 0%, ' + objGet(item, 'bottom_color') + ' 100%)'
                            }

                            return result;
                        })
                }


                return data;
            },
            isHasPieChart: function () {
                return objHas(this.data, 'pie.data') && !isEmpty(this.data.pie.data);
            },
            pieChart: function () {
                if (!this.isHasPieChart) {
                    return {};
                }

                let data = {
                    title: objGet(this.data.pie, 'label'),
                    values: [],
                    colors: [],
                    legend: [],
                };

                if (objHas(this.data.pie, 'data')) {
                    let filteredValues = this.data.pie.data.filter(item => {
                        return objHas(item, 'value') && objHas(item, 'label') && isNumber(item.value);
                    });

                    data.values = filteredValues.map(item => {
                        return objGet(item, 'value');
                    });

                    data.colors = filteredValues.map(item => {
                        return objGet(item, 'color') || '#daa822';
                    });

                    data.legend = filteredValues.map(item => {
                        return {
                            label: objGet(item, 'label'),
                            style: {
                                backgroundColor: objGet(item, 'color') || '#daa822',
                            }
                        }
                    })
                }


                return data;
            }

        }
    }
</script>

