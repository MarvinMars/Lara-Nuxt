<template>
    <div>
        <div class="footer__media">
            <div class="email">
                <a href="mailto:''">''</a>
            </div>
            <div class="social">
                <template v-for="(item,index) in social">
                    <a :key="index"
                       :href="item.url" target="_blank" rel="noopener">
							<span>
								<small :data-hover="item.label">{{ item.label }}</small>
							</span>
                    </a>
                </template>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        name: 'footer_hero',
        computed: {
            social() {
                return this.$store.state.menus.social
            },
            projects() {
                if (this.$store.state.page.hasOwnProperty('hero') && typeof(this.$store.state.page) !== 'undefined') {
                    if (this.$store.state.page.hero.slides.length > 0) {
                        return this.$store.state.page.hero.slides
                    }
                } else {
                    return false;
                }
            },
            paginationNum: function () {
                if (this.projects) {
                    return this.projects.length + 1;
                }

                return 0;
            },
        },
        methods: {
            current(index) {

                if (index === 0) {
                    return 'active';
                } else {
                    return '';
                }
            }
        }
    }
</script>
