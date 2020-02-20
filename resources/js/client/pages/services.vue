<template>
    <section class="services">
        <template v-if="typeof(page.blocks) !== 'undefined' && page.blocks.length">
            <full-page ref="fullpage" :options="options" id="fullpage">
                <div v-for="(component,id) in page.blocks"
                     class="section"
                     :data-component="component.name"
                     :id="component.name + '-' + id"
                     v-if="isComponentExists(component.name)">
                    <component :is="component.name"
                               v-if="isServicesBlock(component.type)"
                               :data="component">
                    </component>
                </div>
            </full-page>
        </template>
    </section>
</template>

<script>
    import Swiper from 'swiper';
    import {isComponentExists} from '../mixins/isComponentExistsMixin';
    import servicesHero from '~/components/blocks/page/heroBanner.vue';
    import servicesRightImageBlock from '~/components/blocks/services/servicesRightImageBlock.vue';
    import servicesLeftImageBlock from '~/components/blocks/services/servicesLeftImageBlock.vue';
    import servicesAreas from '~/components/blocks/services/servicesAreas.vue';
    import servicesBottom from '~/components/blocks/services/servicesBottom.vue';

    export default {
        layout: 'home',
        components: {
            servicesHero,
            servicesRightImageBlock,
            servicesLeftImageBlock,
            servicesAreas,
            servicesBottom,
        },
        async asyncData({app, store}) {
            let menus = await app.$axios.$get('api/menus');
            let data = await app.$axios.$get('api/services/services');
            let settings = await app.$axios.$get('api/settings');
            store.commit('addSettings', settings.settings);
            store.commit('addMenus', menus.menus);
            store.commit('addPage', data.data);
            store.commit('changeLayoutClass', 'wrapper inner_page');
        },
        mixins: [
            isComponentExists
        ],
        computed: {
            page() {
                return this.$store.state.page || {}
            },
        },
        head() {
            return {
                titleTemplate: this.page.title || 'Our Services',
                meta: this.page.meta,
                bodyAttrs: {
                    class: this.bodyClasses.join(' '),
                }
            }
        },
        data() {
            return {
                options: {
                    licenseKey: '57C70471-DDC24C46-B44C3A1A-5B9EBEC9',
                    keyboardScrolling: false,
                    navigation: true,
                    navigationPosition: 'right',
                    afterLoad: this.afterLoad,
                    onLeave: this.onLeave,
                    css3: true,
                },
                classesToRemove: [],
                animationTimer: null,
                animationFinished: true,
                bodyClasses: [],
            }
        },
        mounted: function () {
            this.addBodyClass('services_page');
        },
        methods: {
            isServicesBlock: function (type) {
                return type === 'services';
            },
            addBodyClass: function (className) {
                this.bodyClasses.push(className);
                // this.bodyClasses = [new Set(this.bodyClasses)];
            },
            removeBodyClass: function (className) {
                this.bodyClasses = this.bodyClasses.filter((current) => {
                    return current !== className;
                })
            },
            //After fullpage load logic.
            afterLoad(origin, destination, direction) {
                // console.log('afterLoad');
                fullpage_api.reBuild();

                let previousComponent;

                if (origin) {
                    previousComponent = origin.item;
                }

                let currentComponent = destination.item,
                    currentComponentId = currentComponent.dataset.component;

                //Previous slide style logic.
                if (previousComponent) {
                    this.classesToRemove.forEach((classToRemove) => {
                        previousComponent.classList.remove(classToRemove);
                    });

                    previousComponent.classList.remove('animated');
                }

                //Current slide style logic.
                currentComponent.classList.add('animated');

                //Component specified logic.
                if (typeof this[currentComponentId + 'AfterLoad'] === 'function') {
                    return this[currentComponentId + 'AfterLoad'](currentComponent, origin, destination, direction);
                }
            },
            onLeave(origin, destination, direction) {
                // console.log('onLeave', origin, destination, direction);
                let currentComponent,
                    currentComponentId;

                // console.log(direction);

                if (origin) {
                    currentComponent = origin.item;
                    currentComponentId = currentComponent.dataset.component;
                }

                let nextComponent = destination.item;

                if (currentComponent) {
                    currentComponent.classList.add('out');
                }

                nextComponent.classList.remove('out');

                //Component specified logic.
                if (currentComponent && typeof this[currentComponentId + 'OnLeave'] === 'function') {
                    this[currentComponentId + 'OnLeave'](currentComponent, origin, destination, direction);
                }

                return this.animationFinished;
            },
            servicesHeroAfterLoad: function () {
                this.removeBodyClass('whitebg');
            },
            servicesBottomAfterLoad: function () {
                this.removeBodyClass('whitebg');
            },
            //Specified slide logic.
            servicesAreasAfterLoad: function (element, origin, destination, direction) {
                this.removeBodyClass('whitebg');
                // console.log('services areas');
                let listSelector = '#' + element.id + ' .areasList',
                    list = document.querySelector(listSelector),
                    scrolling = true,
                    delta = 0,
                    eventsCount = 0,
                    lastScrollTime = new Date().getTime(),
                    scrollTimer,
                    floodTimer;


                if (!list) {
                    return true;
                }

                fullpage_api.setAllowScrolling(false);

                let newList = list.cloneNode(true);

                list.parentNode.replaceChild(newList, list);

                let slideSwiper = new Swiper(listSelector, {
                    init: false,
                    slideClass: 'item',
                    slideActiveClass: 'item-active',
                    slideNextClass: 'item-next',
                    slidePrevClass: 'item-prev',
                    wrapperClass: 'inner',
                    direction: 'vertical',
                    mousewheel: false,
                });

                const wheelEvent = (event) => {
                    delta += Math.abs(event.wheelDelta);
                    eventsCount++;

                    if (delta < 120) {
                        console.log('awaiting for delta', delta);
                        return;
                    } else {
                        delta = 0;
                    }

                    if (eventsCount > 2) {
                        console.log('events flooding');
                        clearTimeout(floodTimer);
                        floodTimer = setTimeout(() => {
                            eventsCount = 0;
                        }, 30);
                        return;
                    }

                    if ((new Date().getTime() - lastScrollTime > 60) && scrolling === false && !slideSwiper.animating) {
                        scrolling = true;
                        if (event.deltaY < 0) {
                            console.log('scrolling up');
                            slideSwiper.slidePrev();
                        } else {
                            console.log('scrolling down');
                            slideSwiper.slideNext();
                        }
                    }

                    lastScrollTime = new Date().getTime();
                };

                window.addEventListener('wheel', wheelEvent);

                slideSwiper.on('init', () => {
                    slideSwiper.slideTo(1, 500, false);

                });

                slideSwiper.on('change', () => {
                    if (lastScrollTime > new Date().getTime()) lastScrollTime = new Date().getTime();
                });

                slideSwiper.on('transitionEnd', () => {
                    console.log('transition ended');
                    clearTimeout(scrollTimer);
                    scrollTimer = setTimeout(() => {
                        console.log('not scrolling');
                        scrolling = false;
                        eventsCount = 0;
                        if (lastScrollTime > new Date().getTime()) lastScrollTime = new Date().getTime();
                    }, 300)
                });

                slideSwiper.init();
                fullpage_api.reBuild();

                slideSwiper.on('reachBeginning', () => {
                    element.classList.remove('slide-completed');
                    fullpage_api.moveSectionUp();
                    setTimeout(() => {
                        slideSwiper.destroy(true, true);
                        window.removeEventListener('wheel', wheelEvent);
                        fullpage_api.setAllowScrolling(true);
                    }, 300);
                });

                slideSwiper.on('reachEnd', () => {
                    element.classList.add('slide-completed');
                    this.classesToRemove.push('slide-completed');
                    setTimeout(() => {
                        slideSwiper.destroy(true, true);
                        window.removeEventListener('wheel', wheelEvent);
                        fullpage_api.setAllowScrolling(true);
                    }, 2000);
                });

                return true;
            },
            servicesRightImageBlockAfterLoad: function () {
                this.simpleServicesItemAnimationStart();
            },
            servicesLeftImageBlockAfterLoad: function () {
                this.simpleServicesItemAnimationStart();
            },
            servicesRightImageBlockOnLeave: function (element, origin, destination, direction) {
                return this.simpleServicesItemAnimation(destination, direction)
            },
            servicesLeftImageBlockOnLeave: function (element, origin, destination, direction) {
                return this.simpleServicesItemAnimation(destination, direction)
            },
            simpleServicesItemAnimationStart: function () {
                fullpage_api.reBuild();
                this.addBodyClass('whitebg');
                this.animationFinished = false;
            },
            simpleServicesItemAnimation: function (destination, direction) {
                clearTimeout(this.animationTimer);

                this.animationTimer = setTimeout(() => {
                    this.animationFinished = true;
                    fullpage_api.moveTo(destination.index + 1);
                }, 1);

                // console.log(this.animationFinished);

                return this.animationFinished;
            }
        }
    }
</script>
