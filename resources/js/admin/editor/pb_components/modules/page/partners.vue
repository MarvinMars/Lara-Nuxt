<template>
    <div class="card">
        <div class="card-header">
            Partners
        </div>
        <div class="card-body">
            <vue-form-generator :schema="schema" :model="model" @model-updated="_modelUpdated">
            </vue-form-generator>

            <div class="card">
                <div class="card-header">
                    Slides
                </div>
                <div class="card-body">
                    <div class="card" v-if="model.partners" v-for="(partner, index) in model.partners">
                        <div class="card-header">
                            <button @click.prevent="removeSlide(index)" class="btn btn-warning btn-sm">
                                Remove Partner
                            </button>
                            <button @click.prevent="moveUp(index)" class="btn btn-primary btn-sm">
                                Move Up
                            </button>
                            <button @click.prevent="moveDown(index)" class="btn btn-primary btn-sm">
                                Move Down
                            </button>
                        </div>
                        <div class="card-body">
                            <vue-form-generator :schema="partnersSchema"
                                                :model="partner"
                                                @model-updated="_modelUpdated">
                            </vue-form-generator>
                        </div>
                    </div>
                    <button @click.prevent="addSlide" class="btn btn-primary">
                        Add Partner
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'heroBanner',
        data: function () {
            return {
                defaults: {
                    title: 'Bold partners',
                    description: '<p>Partnerships  we’re proud of</p>',
                    partners: [
                        {
                            image: '/img/ohio-logo-colored.svg',
                            title: 'Ohio State University',
                            link: '#'
                        },
                        {
                            image: '/img/clemson-logo.png',
                            title: 'Clemson University',
                            link: '#'
                        },
                        {
                            image: '/img/gt-logo.svg',
                            title: 'Georgia Tech University',
                            link: '#'
                        },
                        {
                            image: '/img/florida-logo.svg',
                            title: 'Florida State University',
                            link: '#'
                        },
                        {
                            image: '/img/arkansas-logo.svg',
                            title: 'Arkansas University',
                            link: '#'
                        },
                        {
                            image: '/img/washington-logo.svg',
                            title: 'Washington University',
                            link: '#'
                        },
                        {
                            image: '/img/south-florida-logo.svg',
                            title: 'South Florida University',
                            link: '#'
                        },
                        {
                            image: '/img/miami-logo.svg',
                            title: 'Miami University',
                            link: '#'
                        },
                    ],
                    bottom_link_label: 'See our latest work',
                    bottom_link_url: '/work',
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
                            type: 'wysiwyg',
                            label: 'Description',
                            model: 'description'
                        },
                        {
                            type: 'input',
                            inputType: 'text',
                            label: 'Bottom Link Label',
                            model: 'bottom_link_label',
                        },
                        {
                            type: 'input',
                            inputType: 'text',
                            label: 'Bottom Link URL',
                            model: 'button_link_url',
                        },
                    ]
                },
                partnersSchema: {
                    fields: [
                        {
                            type: 'mediaUpload',
                            onChanged: this._uploadMedia,
                            label: 'Image',
                            model: 'image',
                        },
                        {
                            type: 'input',
                            inputType: 'text',
                            label: 'Title',
                            model: 'title',
                        },
                        {
                            type: 'input',
                            inputType: 'text',
                            label: 'link',
                            model: 'link',
                        },
                    ]
                }
            };
        },
        methods: {
            addSlide: function () {
                this.model.partners.push({
                    image: null,
                    title: null,
                    content: null,
                });

                this._updateModel();
            },
            removeSlide: function (indexToRemove) {
                this.model.partners = this.model.partners.filter((slide, index) => {
                    return index !== indexToRemove;
                });

                this._updateModel();
            },
            moveUp: function (index) {
                let to = index - 1;
                if (to < 0) {
                    to = this.model.partners.length;
                }
                this.model.partners.splice(to, 0, this.model.partners.splice(index, 1)[0]);
                this._updateModel();
            },
            moveDown: function (index) {
                let to = index + 1;
                if (to >= this.model.partners.length) {
                    to = 0;
                }
                this.model.partners.splice(to, 0, this.model.partners.splice(index, 1)[0]);
                this._updateModel();
            }
        }
    }
</script>
