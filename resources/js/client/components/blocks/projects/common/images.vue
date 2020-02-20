<template>
    <div class="project__images">
        <div class="left">
            <div v-for="image in left_images" :style="image.styles" :class="image.classes">
                <div :class="image.inner_class" :style="image.inner_styles">
                    <img v-if="image.is_logo" v-lazy="image.src"/>
                </div>
            </div>
        </div>
        <div class="right">
            <div v-for="image in right_images" :style="image.styles" :class="image.classes">
                <div :class="image.inner_class" :style="image.inner_styles">
                    <img v-if="image.is_logo" v-lazy="image.src"/>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {get as objGet, isArray, isEmpty} from "lodash";

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
            left_images: function () {
                let images = [];

                if (isArray(this.data.fields.left_images)) {
                    images = this.data.fields.left_images
                        .filter(image => {
                            return !!image.image;
                        })
                        .map(this.getImageObject);
                }

                return images;
            },
            right_images: function () {
                let images = [];

                if (isArray(this.data.fields.right_images)) {
                    images = this.data.fields.right_images
                        .filter(image => {
                            return !!image.image;
                        })
                        .map(this.getImageObject)
                }

                return images;
            },
        },
        methods: {
            getImageObject: function (image) {
                let data = {
                    styles: {},
                    classes: [],
                    inner_class: [],
                    inner_styles: {},
                    is_logo: false,
                    src: objGet(image, 'image'),
                };

                data.classes.push('image');

                const bgColor = objGet(image, 'background_color');

                if (!isEmpty(bgColor)) {
                    data.styles.backgroundColor = bgColor;
                }

                switch (objGet(image, 'type')) {
                    case 'logo':
                        data.is_logo = true;
                        data.inner_class.push('logo');
                        break;
                    case 'tall':
                        data.classes.push('image--tall');
                        break;
                    case 'big':
                        data.classes.push('image--big');
                        break;
                }

                if (data.is_logo === false) {
                    data.inner_class.push('inner');
                    data.inner_styles.backgroundImage = `url('${data.src}')`;
                }

                return data;
            }
        }
    }
</script>
