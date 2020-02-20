<template>
	<div class="marketing">
		<div class="row">
			<div class="title col-lg-5 col-sm-12 col-xs-12">
				<h2 v-text="title"></h2>
				<p v-html="description"></p>
			</div>
			<div class="data col-lg-7 col-sm-12 col-xs-12">
				<div class="caption">
					<img :src="image" :alt="image_alt_text">
					<p v-html="table_description"></p>
				</div>
				<div class="inner">
					<div class="table">
						<div class="table__head">
							<span v-text="table_head_first_column" :style="labelsStyles"></span>
							<span v-text="table_head_second_column" :style="labelsStyles"></span>
							<span v-text="table_head_third_column" :style="labelsStyles"></span>
						</div>
						<div class="table__body">
							<div class="item" v-for="(item, index) in items" :key="index" v-if="item">
								<span class="name" v-text="item.name"></span>
								<span v-text="item.first_column"></span>
								<span v-text="item.second_column"></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import {has as objHas, isArray, get as objGet} from 'lodash';

	export default {
		name: 'marketingLayout',
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
				return objGet(this.data, 'title') || '';
			},
			description: function () {
				return objGet(this.data, 'description') || '';
			},
			image: function () {
				return objGet(this.data, 'image') || '';
			},
			image_alt_text: function () {
				return objGet(this.data, 'image_alt_text') || '';
			},
			table_description: function () {
				return objGet(this.data, 'table_description') || '';
			},
			table_head_first_column: function () {
				return objGet(this.data, 'table_head.first_column') || '';
			},
			table_head_second_column: function () {
				return objGet(this.data, 'table_head.second_column') || '';
			},
			table_head_third_column: function () {
				return objGet(this.data, 'table_head.third_column') || '';
			},
			items: function () {
				const items = objGet(this.data, 'items') || [];

				if(isArray(items)) {
					return items.filter(item => {
						return (typeof item.name !== 'undefined' && typeof item.first_column !== 'undefined'  && typeof item.second_column !== 'undefined' );
					})
				}

				return [];
			},
		}

	}
</script>
