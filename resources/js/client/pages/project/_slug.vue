<template>
    <div class="slide inner_page active animation_repeat project_content_in">
        <div class="project_content_in animation_repeat project_opened">
            <div class="project" v-if="typeof(page.blocks) !== 'undefined' && page.blocks.length">
                <div class="project__content">
                    <template v-for="(component, key) in page.blocks">
                        <component v-if="isComponentExists(component.name) && component.type === 'project'"
                                   :class="animated(key)"
                                   :is="component.name"
                                   v-waypoint="{ active: true, callback, options: intersectionOptions }"
                                   :data="component">
                        </component>
                    </template>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {isComponentExists} from "../../mixins/isComponentExistsMixin";

    export default {
        layout: 'home',
        loading: false,
        mixins: [
            isComponentExists
        ],
        validate({params, query, store}) {
            return true
        },
        async asyncData({app, params, error, store}) {
            let menus = await app.$axios.$get('api/menus');
            let data = await app.$axios.$get(`api/project/${params.slug}`);
            store.commit('addMenus', menus.menus);
            store.commit('addPage', data.data);
        },
        head: function () {
            return {
                titleTemplate: this.page.title || null,
                meta: this.page.meta,
                bodyAttrs: {
                    class: 'project_opened',
                }
            }
        },
        data: function () {
            return {
                project_data: [],
                intersectionOptions: {
                    root: null,
                    rootMargin: '0px 0px 0px 0px',
                    threshold: [0, 1]
                },
            }
        },
        computed: {
            page: function () {
                return this.$store.state.page
            },
        },
        mounted: function () {
            this.initAnimation();
        },
        methods: {
            initAnimation: function () {
                this.$nextTick(() => {
                    let $slideSelector = $('.slide.active'),
                        $currentProject = $('.slide'),
                        $sectionsToHide = $('.footer__media, .footer__controls, .project_description, a.view-project'),
                        $sectionsToShow = $('.project__content, .project__hero .meta .information'),
                        $offset = 2000,
                        $fadeTime = 300,
                        $hideOffset = 400;

                    $currentProject.addClass('project_content_in').removeClass('project_content_out');
                    $sectionsToHide.fadeOut($fadeTime);

                    setTimeout(() => {
                        $slideSelector.addClass('prev_slide');
                    }, $offset);

                    setTimeout(() => {
                        $sectionsToShow.fadeIn($fadeTime);
                    }, $hideOffset);
                });
            },
            status: function (id) {
                if (id === 0) return 'active animation_repeat';
                else return '';
            },
            animated: function (key) {
                return key >= 1 ? "animated" : ''
            },
            callback: function (obj) {
                let $direction = obj.direction,
                    $going = obj.going,
                    $el = obj.el;

                if (obj.direction) {
                    if ($going && $direction) {
                        $el.classList.add('init');
                    }
                }
            },
        },
    }
</script>
