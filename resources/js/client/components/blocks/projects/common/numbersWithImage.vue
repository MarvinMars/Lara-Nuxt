<template>
	<div class="project__numbers_image" :style="{ backgroundImage: background_image }">
		<div class="container">
			<div class="row">
				<div class="text col-xl-9 col-lg-12 col-md-12 col-sm-12">
					<h2 v-if="title" v-html="title"></h2>
					<h3 v-if="subtitle" v-html="subtitle"></h3>
					<div class="list row">
						<div class="item col-lg-6 col-md-6 col-xs-12" v-for="block in blocks" v-if="blocks">
							<div class="heading">
								<img v-if="block.icon" :src="block.icon" :alt="block.icon_alt">
								<span v-if="block.value" v-text="block.value"></span>
							</div>
							<p v-if="block.description" v-html="block.description"></p>
						</div>
					</div>
				</div>
				<div class="image" :style="{ backgroundImage: right_image }"></div>
			</div>
		</div>
	</div>
</template>

<script>
	import {get as objGet, has as objHas, isArray} from "lodash";

	export default {
		props: {
			data: {
				type: Object,
				default: () => {
					return {};
				}
			}
		},
		computed: {
			title: function () {
				return objGet(this.data, 'fields.title');
			},
			subtitle: function () {
				return objGet(this.data, 'fields.subtitle');
			},
			right_image: function () {
				return 'url("' + (objGet(this.data, 'fields.right_image')) + '")';
			},
			background_image: function () {
				return 'url("' + (objGet(this.data, 'fields.background_image')) + '")';
			},
			blocks: function () {
				let blocks = [];
				if (objHas(this.data, 'fields.blocks') && isArray(objGet(this.data, 'fields.blocks'))) {
					blocks = this.data.fields.blocks.map(block => {
						return {
							icon: objGet(block, 'icon'),
							icon_alt: objGet(block, 'icon_alt'),
							value: objGet(block, 'value'),
							description: objGet(block, 'description'),
						}
					})
				}
				return blocks;
			}
		}
	}
</script>

