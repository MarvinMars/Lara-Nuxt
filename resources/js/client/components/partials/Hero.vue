<template>
    <section>
        <section class="home" id="home">
            <section class="slides" ref="slides"
                     v-touch:swipe.left="moveNextSlide"
                     v-touch:swipe.right="movePrevSlide">
                <template v-if="projects">
                    <section v-for="(project, index) of projects"
                             :class="[isActive(index) ? activeSlideClasses : '', isPrevious(index) ? previousSlideClasses : '']"
                             :style="currentSlideStyle">
                        <div class="project">
                            <div class="project__hero">
                                <div class="background_image"
                                     :style="projectBackgroundStyle(project)">
                                </div>
                                <div class="meta">
                                    <div class="pagination-fraction">
                                        <span>{{ index + 1 }}/{{ projects.length }}</span>
                                    </div>
                                    <template v-if="project.fields.title">
                                        <nuxt-link :to="project.fields.project_link">
                                            <h2 v-html="project.fields.title"></h2>
                                        </nuxt-link>
                                    </template>
                                    <template v-if="project.fields.description">
                                        <div class="project_description">
                                            <p v-html="project.fields.description"></p>
                                        </div>
                                    </template>
                                    <nuxt-link v-if="project.fields.project_link"
                                               :to="project.fields.project_link"
                                               :key="project.fields.project_link3"
                                               class="view-project">
                                        <span><small data-hover="View Project">View Project</small></span>
                                    </nuxt-link>
                                </div>
                            </div>
                        </div>
                    </section>
                </template>
                <section
                        :class="[isActive(projects.length) ? activeSlideClasses : '', isPrevious(projects.length) ? previousSlideClasses : '']"
                        :style="currentSlideStyle">
                    <div class="services">
                        <div class="services__hero">
                            <div class="background_image" style="background-color: #e7524e"></div>
                            <div class="meta">
                                <p>
                                     partners with forward-thinking brands to build digital platforms, reimagine
                                    e-commerce,
                                    design new products and challenge normal.
                                </p>
                                <a href="/services" class="view-project">
                                <span>
                                    <small data-hover="view our services">view our services</small>
                                </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
            </section>
        </section>
        <footer class="footer">
            <div class="footer__controls">
                <div class="next_link">
                    <button @click.prevent="moveNextSlide">
                        <span data-hover="Next">Next</span>
                    </button>
                </div>
                <div class="pagination">
                    <ul v-if="projects">
                        <li v-for="(item, index) in paginationNum"
                            @click.prevent="moveToSlide(index)"
                            :class="[activePaginationElement === index ? 'current' : '', isPrevious(index) ? 'previous' : '']">
                            <a @click.prevent :style="paginationItemStyles"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>
    </section>
</template>
<script>

    import {has as objHas, isArray, isObject} from 'lodash';

    const ANIMATION_TIME = 5000;
    const TRANSITION_DELAY = 2000;

    export default {
        name: 'homeHero',
        computed: {
            projects: function () {
                if (isObject(this.$store.state.page)
                    && objHas(this.$store.state.page, 'hero.slides')
                    && isArray(this.$store.state.page.hero.slides)) {
                    return this.$store.state.page.hero.slides;
                }

                return [];
            },
            paginationNum: function () {
                return this.projects.length + 1;
            },
            paginationItemStyles: function () {
                return {
                    transitionDuration: ANIMATION_TIME + TRANSITION_DELAY + 'ms'
                };
            },
            activeSlideClasses: function () {
                let classes = [
                    'slide',
                    'active',
                    'animation_repeat',
                ];

                if (this.direction === 'left') {
                    classes.push('left');
                }

                return classes;
            },
            previousSlideClasses: function () {
                let classes = [
                    'slide',
                    'animation_out',
                    'prev_slide'
                ];

                if (this.direction === 'left') {
                    classes.push('left');
                }

                return classes;
            },
            currentSlideStyle: function () {
                if (!this.previousSlide) {
                    return {};
                }

                return {
                    'animation-delay': TRANSITION_DELAY
                };
            },
        },
        mounted() {
            this.setupTimer();

            //Initial animation of the pagination
            setTimeout(() => {
                this.activePaginationElement = 0;
            })
        },
        beforeDestroy: function () {
            this.resetTimer();
        },
        data: function () {
            return {
                direction: 'right',
                activeSlide: 0,
                activePaginationElement: null,
                previousSlide: null,
                nextSlide: null,
                sliderTimer: null,
                animationFinished: true,
            }
        },
        watch: {},
        methods: {
            isPrevious: function (index) {
                return this.previousSlide === index;
            },
            isActive: function (index) {
                return this.activeSlide === index;
            },
            status(id) {
                if (id === 0) return 'active animation_repeat';
                else return '';
            },
            projectBackgroundStyle: function (project) {
                let style = {};

                if (project.fields.image) {
                    style.backgroundImage = `url('${project.fields.image}')`;
                }

                style.backgroundColor = project.fields.background_color || '#191921';

                return style;
            },
            moveToSlide: function (index) {
                this.resetTimer();
                if (!this.animationFinished) {
                    console.log('animation not yet finished');
                    return;
                }
                this.animationFinished = false;
                this.direction = index > this.activeSlide ? 'right' : 'left';
                this.previousSlide = this.activeSlide;
                this.activeSlide = null;
                setTimeout(() => {
                    this.activeSlide = index;
                    this.activePaginationElement = this.activeSlide;
                    this.animationFinished = true;

                    this.setupTimer();
                }, TRANSITION_DELAY);
            },
            moveNextSlide: function () {
                console.log('move to next slide');

                if (this.activeSlide < this.projects.length) {
                    this.moveToSlide(this.activeSlide + 1);
                } else {
                    this.moveToSlide(0);
                }
            },
            movePrevSlide: function () {
                console.log('move to prev slide');
                if (this.activeSlide === 0) {
                    this.moveToSlide(this.projects.length);
                } else {
                    this.moveToSlide(this.activeSlide - 1);
                }
            },
            setupTimer: function () {
                console.log('timer setup');
                this.sliderTimer = setTimeout(() => {
                    console.log('running by timer');
                    this.moveNextSlide();
                }, ANIMATION_TIME);

            },
            resetTimer: function () {
                if (this.sliderTimer) {
                    console.log('timer cleared');
                    clearTimeout(this.sliderTimer);
                }
            },
        },
    }
</script>
