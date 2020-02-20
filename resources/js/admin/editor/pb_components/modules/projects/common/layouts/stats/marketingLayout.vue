<template>
	<div class="card">
		<div class="card-header">
			Marketing
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
		name: 'marketingLayout',
		mixins: [
			layoutMixin,
		],
		data: function () {
			return {
				defaults: {
					title: 'Marketing',
					description: 'As part of our culture, we work closely together with the KU athletics marketing department and we’ve taken charge of their digital marketing campaign and strategy, we redesigned and implemented new, more effective Adwords and retargeting campaigns, as well as Search Engine Optimization for ticket sales in their sporting events.We have partnered with the University of Kansas over the past 4 years and look forward to the future together.',
					image: '/img/kansas-marketing-icon.svg',
					image_alt_text: '',
					table_description: 'The University had zero organic ranking for keywords like:',
					table_head: {
						first_column: 'keywords',
						second_column: 'BEFORE (PAGE)',
						third_column: 'NOW (PAGE)',
					},
					items: [
						{
							name: 'Basketball tickets Miami',
							first_column: '99+',
							second_column: '1st',
						},
						{
							name: 'Football tickets Miami',
							first_column: '99+',
							second_column: '1st',
						},
						{
							name: 'Miami football tickets',
							first_column: '99+',
							second_column: '1st',
						},
						{
							name: 'Miami basketball tickets',
							first_column: '99+',
							second_column: '1st',
						},
						{
							name: 'Miami basketbal',
							first_column: '99+',
							second_column: '1st',
						},
					],
				},
				schema: {
					groups: [
						{
							fields: [
								{
									type: 'input',
									inputType: 'text',
									label: 'Title',
									model: 'title'
								},
								{
									type: 'wysiwyg',
									label: 'Description',
									model: 'description'
								},
								{
									type: 'mediaUpload',
									label: 'Image',
									onChanged: this._uploadMedia,
									model: 'image',
								},
								{
									type: 'input',
									inputType: 'text',
									label: 'Image alt text',
									model: 'image_alt_text'
								},
								{
									type: 'wysiwyg',
									label: 'Table Description',
									model: 'table_description'
								},
								{
									type: 'input',
									inputType: 'text',
									label: 'Table head first column',
									model: 'table_head.first_column',
								},
								{
									type: 'input',
									inputType: 'text',
									label: 'Table head second column',
									model: 'table_head.second_column',
								},
								{
									type: 'input',
									inputType: 'text',
									label: 'Table head third column',
									model: 'table_head.third_column',
								},
								{
									type: 'dynamic',
									label: 'Stats for table',
									model: 'items',
									schema: {
										fields: [
											{
												type: 'input',
												inputType: 'text',
												label: 'Name',
												model: 'name',
											},
											{
												type: 'input',
												inputType: 'text',
												label: 'First column',
												model: 'first_column',
											},
											{
												type: 'input',
												inputType: 'text',
												label: 'Second column',
												model: 'second_column',
											},
										]
									}
								}
							]
						}
					],
				}
			}
		},
	}
</script>
