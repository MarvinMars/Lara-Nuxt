<template>
    <div class="card">
        <div class="card-header">
            Labs Block
        </div>
        <div class="card-body">
            <vue-form-generator :schema="schema" :model="model" @model-updated="_modelUpdated">
            </vue-form-generator>

            <div class="card">
                <div class="card-header">
                    Projects
                </div>
                <div class="card-body">
                    <div class="card" v-if="model.projects" v-for="(project, index) in model.projects">
                        <div class="card-header">
                            <button @click.prevent="removeProject(index)" class="btn btn-warning btn-sm">
                                Remove Project
                            </button>
                        </div>
                        <div class="card-body">
                            <vue-form-generator :schema="projectsSchema"
                                                :model="project"
                                                @model-updated="_modelUpdated">
                            </vue-form-generator>
                        </div>
                    </div>
                    <button @click.prevent="addProject" class="btn btn-primary">
                        Add Project
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Labs',
        data: function () {
            return {
                defaults: {
                    title: 'Lab',
                    description: 'We are always running, for the thrill of it, thrill of It. <br>Always pushing up the hill.',
                    projects: [
                        {
                            title: 'Project Soli',
                            name: 'modalVideoSoli',
                            image: '/img/lab-image1.jpg',
                            video: 'https://www.youtube.com/embed/0QNiZfSsPc0',
                            link: '#',
                            link_text: 'Project Soli',
                            description: 'Project Soli is developing a new interaction sensor using radar technology. The sensor can track sub-millimeter motions at high speed and accuracy. It fits onto a chip, can be produced at scale and built into small devices and everyday objects.',
                        },
                        {
                            title: 'Project Ara',
                            name: 'modalVideoAra',
                            image: '/img/lab-image2.jpg',
                            video: 'https://www.youtube.com/embed/intua_p4kE0',
                            link: '#',
                            link_text: 'Project Ara',
                            description: 'The smartphone is one of the most empowering and intimate objects in our lives. Yet most of us have little say in how the device is made, what it does, and how it looks. And 5 billion of us don’t have one. What if you could make thoughtful choices about exactly what your phone does, and use it as a creative canvas to tell your own story?',
                        },
                        {
                            title: 'Project Tango',
                            name: 'modalVideoTango',
                            image: '/img/lab-image3.jpg',
                            video: 'https://www.youtube.com/embed/intua_p4kE0',
                            link: '#',
                            link_text: 'Project Tango',
                            description: 'Over the past 18 months, Project Tango has been collaborating with robotics laboratories from around the world to concentrate the past decade of research and computer vision into a new class of mobile device.',
                        },
                    ],
                },
                schema: {
                    fields: [
                        {
                            type: 'input',
                            inputType: 'text',
                            label: 'Title',
                            model: 'title',
                        },
                        {
                            type: 'wysiwyg',
                            inputType: 'text',
                            label: 'Description',
                            model: 'description',
                        },
                    ]
                },
                projectsSchema: {
                    fields: [
                        {
                            type: 'input',
                            inputType: 'text',
                            label: 'Title',
                            model: 'title',
                        },
                        {
                            type: 'input',
                            inputType: 'text',
                            label: 'Unique Name',
                            model: 'name',
                        },
                        {
                            type: 'mediaUpload',
                            onChanged: this._uploadMedia,
                            label: 'Image',
                            model: 'image',
                        },
                        {
                            type: 'input',
                            inputType: 'text',
                            label: 'Video link',
                            model: 'video',
                        },
                        {
                            type: 'input',
                            inputType: 'text',
                            label: 'Link',
                            model: 'link',
                        },
                        {
                            type: 'input',
                            inputType: 'text',
                            label: 'Link text',
                            model: 'link_text',
                        },
                        {
                            type: 'wysiwyg',
                            inputType: 'text',
                            label: 'Description',
                            model: 'description',
                        },
                    ]
                }
            };
        },
        methods: {
            addProject: function () {
                this.model.projects.push({
                    title: null,
                    name: null,
                    image: null,
                    video: null,
                    link: null,
                    link_text: null,
                    description: null,
                });
                this._updateModel();
            },
            removeProject: function (indexToRemove) {
                this.model.projects = this.model.projects.filter((project, index) => {
                    return index !== indexToRemove;
                });

                this._updateModel();
            }
        }
    }
</script>
