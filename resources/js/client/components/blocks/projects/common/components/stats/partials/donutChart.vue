<template>
    <svg height="200" width="200" viewBox="0 0 200 200">
        <g v-for="(value, index) in sortedValues">
            <circle :cx="cx" :cy="cy" :r="radius" :stroke="colors[index]" :stroke-width="strokeWidth"
                    :stroke-dasharray="circumference"
                    :stroke-dashoffset="calculateStrokeDashOffset(value, circumference)"
                    :transform="returnCircleTransformValue(index)"
                    fill="transparent">
            </circle>
            <text></text>
        </g>
    </svg>
</template>


<script>
    export default {
        name: 'donutChart',
        template: '#donutTemplate',
        props: {
            values: {
                type: Array,
                required: true
            },
            colors: {
                type: Array,
                default: function () {
                    return ["#6495ED", "goldenrod", "#cd5c5c", "thistle", "lightgray"];
                }
            },
        },
        data() {
            return {
                angleOffset: -90,
                chartData: [],
                cx: 100,
                cy: 100,
                radius: 80,
                sortedValues: [],
                strokeWidth: 40,
            }
        },
        computed: {
            circumference() {
                return 2 * Math.PI * this.radius
            },
            dataTotal() {
                return this.sortedValues.reduce((acc, val) => acc + val)
            },
        },
        methods: {
            calculateStrokeDashOffset(dataVal, circumference) {
                const strokeDiff = this.dataPercentage(dataVal) * circumference
                return circumference - strokeDiff
            },
            calculateTextCoords(dataVal, angleOffset) {
                const angle = (this.dataPercentage(dataVal) * 360) / 2 + angleOffset;
                const radians = this.degreesToRadians(angle);

                return {
                    x: this.radius * Math.cos(radians) + this.cx,
                    y: this.radius * Math.sin(radians) + this.cy
                };
            },
            degreesToRadians(angle) {
                return angle * (Math.PI / 180)
            },
            dataPercentage(dataVal) {
                return dataVal / this.dataTotal
            },
            percentageString(dataVal) {
                return `${Math.round(this.dataPercentage(dataVal) * 100)}%`
            },
            returnCircleTransformValue(index) {
                return `rotate(${this.chartData[index].degrees}, ${this.cx}, ${this.cy})`
            },
            segmentBigEnough(dataVal) {
                return Math.round(this.dataPercentage(dataVal) * 100) > 5
            },
            calculateChartData() {
                this.sortedValues.forEach((dataVal, index) => {
                    const {x, y} = this.calculateTextCoords(dataVal, this.angleOffset);
                    // start at -90deg so that the largest segment is perpendicular to top
                    const data = {
                        degrees: this.angleOffset,
                        textX: x,
                        textY: y
                    };
                    this.chartData.push(data);
                    this.angleOffset = this.dataPercentage(dataVal) * 360 + this.angleOffset
                })
            },
            sortInitialValues() {
                this.sortedValues = this.values.sort((a, b) => b - a)
            }
        },
        mounted() {
            this.sortInitialValues();
            this.calculateChartData();
        },
    }
</script>
