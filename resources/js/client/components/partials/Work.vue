<template>
    <section class="works">
        <div class="works__hero">
            <div class="images" v-if="projects.length">
                <div class="inner" v-for="project of projects">
                    <div class="image"
                         v-if="project.fields.image"
                         :style="{ backgroundImage:'url('+ project.fields.image + ')' }"></div>
                </div>
            </div>
            <div class="works__title">
                <h1>Partners</h1>
                <p>Case Studies</p>
            </div>
        </div>
        <div class="works__slider">
            <div v-swiper="swiperOption" ref="works_swiper">
                <div class="swiper-wrapper" v-if="projects">
                    <div class="swiper-slide" v-for="(project,index) of projects">
                        <nuxt-link :to="link(project.fields)">
                            <div class="inner">
                                <div class="image" v-if="project.fields.image"
                                     :style="{ backgroundImage:'url('+ project.fields.image +')' }"></div>
                                <div class="content">
                                    <div class="pagination-fraction">
                                        <span>{{ index + 1 }}/{{ projects.length }}</span>
                                    </div>
                                    <div class="heading">
                                        <span class="cat" v-if="project.fields.work_category"
                                              v-html="project.fields.work_category"></span>
                                        <span class="title" v-if="project.fields.title"
                                              v-html="project.fields.title"></span>
                                    </div>
                                    <div class="text" v-if="project.fields.description">
                                        <p v-html="project.fields.description"></p>
                                    </div>
                                    <span class="view-project">
                                        <span><small data-hover="View Project">View Project</small></span>
                                    </span>
                                </div>
                            </div>
                        </nuxt-link>
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
        <transition name="fade">
            <div class="works__list" v-if="isListView && projects">
                <div class="wrap">
                    <div class="container">
                        <div class="row">
                            <div class="title col-lg-6 col-sm-12 col-xs-12">
                                <h2>Partnerships</h2>
                                <p>Our case studies are the true definition of what  represents.</p>
                                <div class="caption" v-waypoint="{ active, callback, options: intersectionOptions }">
                                    <span>Projects</span>
                                </div>
                            </div>
                            <div class="item col-lg-6 col-sm-12 col-xs-12" v-for="(project, index) in projects">
                                <nuxt-link :to="link(project.fields)">
                                    <div class="inner">
                                        <template v-if="project.fields.mobile_image">
                                            <div class="thumbnail"
                                                 :style="{backgroundImage: 'url(\'' + project.fields.mobile_image + '\')'}">
                                                <span class="sr-only">{{ project.fields.title }}</span>
                                            </div>
                                        </template>
                                        <template v-else-if="project.fields.image">
                                            <div class="thumbnail"
                                                 :style="{backgroundImage: 'url(\'' + project.fields.image + '\')'}">
                                                <span class="sr-only">{{ project.fields.title }}</span>
                                            </div>
                                        </template>
                                        <template v-else>
                                            <div class="thumbnail"></div>
                                        </template>
                                        <div class="heading">
                                            <span class="title">{{ stripTags(project.fields.title) }}</span>
                                            <span class="cat">{{ project.fields.work_category }}</span>
                                        </div>
                                    </div>
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>
                <template v-for="(component, key) in blocks">
                    <component v-if="isComponentExists(component.name) && component.type === 'hero'"
                               :is="component.name"
                               :data="component">
                    </component>
                </template>
            </div>
        </transition>
    </section>
</template>
<script>
    import Work from '~/plugins/components/Work.js';
    import {isComponentExists} from '../../mixins/isComponentExistsMixin';
    import {get as objGet, isString} from 'lodash';

    export default {
        mixins: [
            isComponentExists
        ],
        computed: {
            projects() {
                if (this.$store.state.page.hasOwnProperty('hero') && typeof(this.$store.state.page) !== 'undefined') {
                    if (this.$store.state.page.hero.slides.length > 0) {
                        return this.$store.state.page.hero.slides
                    }
                } else {
                    return false;
                }
            },
            isListView: function () {
                return this.$store.state.verticalLayout;
            },
            blocks: function () {
                return objGet(this.$store.state.page, 'blocks') || [];
            }
        },
        data() {
            return {
                swiperOption: {
                    slidesPerView: 'auto',
                    spaceBetween: 0,
                    slidesPerGroup: 3,
                    navigation: {
                        nextEl: '.works__slider .swiper-button-next',
                        prevEl: '.works__slider .swiper-button-prev',
                    },
                    on: {
                        init: function () {
                            if (window.innerWidth > 767) {
                                $('.works__slider').find('.swiper-slide').eq(3).addClass('description-hidden');
                            } else {
                                $('.works__slider').find('.swiper-slide').eq(0).addClass('description-visible');
                            }
                        },
                        slideNextTransitionEnd: function () {
                            if (window.innerWidth > 767) {
                                $('.works__slider').find('.swiper-slide').eq(3).removeClass('description-hidden').prev().addClass('description-hidden');
                            }
                        },
                        slidePrevTransitionEnd: function () {
                            if (window.innerWidth > 767) {
                                $('.works__slider').find('.swiper-slide').eq(3).addClass('description-hidden').prev().removeClass('description-hidden');
                            }
                        },
                        transitionEnd: function () {
                            if (window.innerWidth < 767) {
                                if (!this.isBeginning) {
                                    $('.works__slider').find('.swiper-button-prev').show();
                                } else {
                                    $('.works__slider').find('.swiper-button-prev').hide();
                                }

                                if (this.isEnd) {
                                    $('.works__slider').find('.swiper-button-next').hide();
                                } else {
                                    $('.works__slider').find('.swiper-button-next').show();
                                }
                            }
                        },
                    },
                    breakpoints: {
                        767: {
                            slidesPerGroup: 1
                        }
                    }
                },
                intersectionOptions: {
                    root: null,
                    rootMargin: '0px 0px 0px 0px',
                    threshold: [0, 1]
                },
                active: true,
            }
        },
        methods: {
            status: function (id) {
                if (id === 0) return 'active animation_repeat';
                else return '';
            },
            link: function (fields) {
                if (fields.project_link !== undefined) {
                    return fields.project_link;
                } else {
                    return '/';
                }
            },
            backgroundUrl(url) {
                return url;
            },
            callback: function (obj) {
                let $direction = obj.direction,
                    $going = obj.going;

                if (this.$store.state.verticalLayout) {
                    if (obj.direction) {
                        if ($going === 'in' && $direction === 'top') {
                            document.getElementsByClassName('header__nav')[0].classList.add('whitebg');
                        }
                        if ($going === 'in' && $direction === 'bottom') {
                            document.getElementsByClassName('header__nav')[0].classList.remove('whitebg');
                        }
                    }
                }
            },
            stripTags: function (string) {
                if (!isString(string)) {
                    return '';
                }

                return string.replace(/(<([^>]+)>)/ig, '');
            }
        },
        mounted: function () {
            Work.init();

            let $slideSelector = $('.slide.active'),
                $offset = 2000;

            setTimeout(() => {
                    $slideSelector.addClass('prev_slide');
                }, $offset
            );
        },
    }
</script>
