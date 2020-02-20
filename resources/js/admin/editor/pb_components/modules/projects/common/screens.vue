<template>
    <div class="card">
        <div class="card-header">
            Project: Screens block
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
                    background: '/img/clemson-dark-background.jpg',
                    top_block: {
                        title: 'Website Design and Development',
                        description: '<p>As any sports fan will tell you, having by the minute, play-by-play video ' +
                        'highlights, photos, statistics and scoring in the palm of your hands is essential. As sports fans' +
                        ' ourselves, it takes one to know one, so we tailor-made the official Clemson Tigers athletic site' +
                        ' with mobile users as a priority, including breaking news for every sport, comprehensive photo ' +
                        'galleries, rosters, post-game stats and schedules for all 15 women’s and men’s sports. Swiping ' +
                        'your way through the season has never been easier.</p>',
                        image: '/img/clemson-mobile-screen1.png',
                    },
                    screen_images: [
                        {
                            image: '/img/clemson-mobile-screen2.png',
                        },
                        {
                            image: '/img/clemson-mobile-screen3.png',
                        },
                        {
                            image: '/img/clemson-tablet-screen1.png',
                        },
                    ],
                    full_width_block: {
                        title: 'Scoreboard',
                        description: '<p>We also decided to add a top banner score where fans could easily access ' +
                        'scores and schedules for each game day.</p>',
                        image: '/img/clemson-announce-screen.png',
                    },
                    bottom_block: {
                        image: '/img/clemson-tablet-screen2.png',
                        title: 'Hero GIFs',
                        description: '<p></p>',
                    }
                },
                schema: {
                    groups: [
                        {
                            fields: [
                                {
                                    type: 'mediaUpload',
                                    label: 'Background Image',
                                    onChanged: this._uploadMedia,
                                    model: 'background',
                                },
                            ]
                        },
                        {
                            legend: 'Top Block',
                            fields: [
                                {
                                    type: 'input',
                                    inputType: 'text',
                                    label: 'Title',
                                    model: 'top_block.title',
                                },
                                {
                                    type: 'wysiwyg',
                                    label: 'Description',
                                    model: 'top_block.description',
                                },
                                {
                                    type: 'mediaUpload',
                                    label: 'Right Image',
                                    onChanged: this._uploadMedia,
                                    model: 'top_block.image',
                                },
                            ]
                        },
                        {
                            legend: 'Screens',
                            fields: [
                                {
                                    type: 'dynamic',
                                    label: 'Screen Images',
                                    hint: '3 images recommended',
                                    model: 'screen_images',
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
                                }
                            ]
                        },
                        {
                            legend: 'Full Width Block',
                            fields: [
                                {
                                    type: 'input',
                                    inputType: 'text',
                                    label: 'Title',
                                    model: 'full_width_block.title',
                                },
                                {
                                    type: 'wysiwyg',
                                    label: 'Description',
                                    model: 'full_width_block.description',
                                },
                                {
                                    type: 'mediaUpload',
                                    label: 'Image',
                                    onChanged: this._uploadMedia,
                                    model: 'full_width_block.image',
                                },
                            ]
                        },
                        {
                            legend: 'Bottom Block',
                            fields: [
                                {
                                    type: 'input',
                                    inputType: 'text',
                                    label: 'Title',
                                    model: 'bottom_block.title',
                                },
                                {
                                    type: 'wysiwyg',
                                    label: 'Description',
                                    model: 'bottom_block.description',
                                },
                                {
                                    type: 'mediaUpload',
                                    label: 'Image',
                                    onChanged: this._uploadMedia,
                                    model: 'bottom_block.image',
                                },
                            ]
                        }
                    ]
                }
            };
        },
    }
</script>
