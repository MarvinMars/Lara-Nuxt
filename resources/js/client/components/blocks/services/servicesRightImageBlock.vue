<template>
    <section>
        <section class="services__item">
            <div class="container">
                <div class="text">
                    <div class="inner">
                        <h3>{{ data.fields.title }}</h3>
                        <small>{{ data.fields.small_title }}</small>
                        <span v-html="data.fields.description"></span>
                    </div>
                    <div class="number">
                        <span>{{ data.fields.number }}</span>
                    </div>
                </div>
                <div class="image">
                    <div class="inner">
                        <div class="background" :style="{ backgroundImage: backgroundImageUrl }">
                            <div class="background_wrap"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
</template>

<script>
    export default {
        name: "servicesItem2",
        props: {
            data: {
                type: Object,
                default: () => {
                    return {};
                }
            }
        },
        computed: {
            backgroundImageUrl: function () {
                return 'url("' + (this.data.fields.image || '') + '")';
            },
        }
    }
</script>
