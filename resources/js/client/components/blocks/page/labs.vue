<template>
    <section class="lab">
        <div class="container">
            <div class="title">
                <h2>{{title}}</h2>
                <p v-html="description"></p>
            </div>
            <div class="list">
                <div class="row" v-if="projects">
                    <div class="item col-lg-4 col-sm-12 col-xs-12" v-for="(project,index) in projects" :key="index"
                         v-if="project.name">
                        <div class="inner">
                            <div class="thumb" @click="showModal(project.name)">
                                <span class="image"
                                      :style="{ backgroundImage: BackgroundImageUrl(project.image) }"></span>
                            </div>
                            <div class="meta">
                                <template v-if="project.link && project.link !== '#'">
                                    <a v-if="project.link_text" :href="project.link" v-text="project.link_text"></a>
                                </template>
                                <template v-else>
                                    <a v-if="project.link_text" href="javascript:;"
                                       @click.prevent="showModal(project.name)"
                                       v-text="project.link_text"></a>
                                </template>
                                <p v-if="project.description" v-html="project.description"></p>
                            </div>
                        </div>
                        <modal :name="project.name" transition="nice-modal-fade" :adaptive="true" width="80%"
                               height="auto" :scrollable="true">
                            <div class="modal-wrap">
                                <button class="close" @click="hideModal(project.name)">
                                    <span></span>
                                    <span></span>
                                </button>
                                <div class="modal__video" v-if="project.video">
                                    <iframe width="560" height="315" :src="project.video"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                </div>
                                <div class="modal__info">
                                    <h3>{{ project.title }}</h3>
                                    <button v-if="projects.length > 1" class="next"
                                            @click="next( projects , index); hideModal(project.name)">
                                        <span><small data-hover="next video">next video</small></span>
                                    </button>
                                </div>
                            </div>
                        </modal>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import {get as objGet, isArray, isObject} from "lodash";

    export default {
        name: "labs",
        methods: {
            next(projects, index) {
                let next_project = index + 1;
                if (next_project >= projects.length) {
                    next_project = 0;
                }
                let project = projects[next_project];
                this.$modal.show(project.name);
            },
            showModal(name) {
                this.$modal.show(name);
            },
            hideModal(name) {
                this.$modal.hide(name);
            },
            BackgroundImageUrl(url) {
                return 'url("' + url + '")';
            }
        },
        props: {
            data: {
                type: Object,
                default: () => {
                    return {};
                }
            }
        },
        computed: {
            title: function () {
                return objGet(this.data, 'fields.title');
            },
            description: function () {
                return objGet(this.data, 'fields.description');
            },
            projects: function () {
                const projects = objGet(this.data, 'fields.projects') || [];

                if (isArray(projects)) {
                    return projects.filter(project => {
                        return (
                            typeof project.title !== 'undefined' &&
                            typeof project.name !== 'undefined' &&
                            typeof project.image !== 'undefined' &&
                            typeof project.video !== 'undefined' &&
                            typeof project.link !== 'undefined' &&
                            typeof project.link_text !== 'undefined' &&
                            typeof project.description !== 'undefined'
                        );
                    })
                }
                return [];
            },
        }
    }
</script>
