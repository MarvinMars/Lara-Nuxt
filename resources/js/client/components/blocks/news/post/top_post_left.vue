<template>
    <div class="row">
        <div class="post__image col-lg-6 col-sm-12">
            <nuxt-link :to="link">
                <span class="inner">
                    <span class="image" :style="{ backgroundImage:backgroundImageUrl }"></span>
                </span>
            </nuxt-link>
        </div>
        <div class="post__caption col-lg-6 col-sm-12">
            <nuxt-link :to="link" v-if="preview_title || link" v-html="preview_title"></nuxt-link>
            <time v-if="published_at" v-html="published_at"></time>
            <p v-if="preview_description" v-html="preview_description"></p>
        </div>
    </div>
</template>

<script>
    import top_post from './mixins/top_post';

    export default {
        name: "top_post_left",
        mixins: [
            top_post
        ],
    }
</script>
