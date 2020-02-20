<template>
    <section class="plekan-editor-arena">
        <div class="plekan-editor">
            <editor-list cname="dynamic-editor"
                         :list="editorButtons.stick"
                         :custom="stickyCustomButtons">
                <li class="create-link"
                    slot="link">
                    <input v-model="linktext"
                           placeholder="http://www.example.com">
                    <button type="button"
                            @click="createLink">
                        <i class="fa fa-check"></i>
                    </button>
                </li>
            </editor-list>
            <editor-list cname="stable-editor"
                         :list="editorButtons.stable"
                         :custom="stableCustomButtons">
            </editor-list>
        </div>
        <button type="button"
                class="plekan-editable-elements-button"
                @click="openEditElement">Edit
        </button>
        <editelement :element="editableModalElement"
                     :shown="editableModal">
        </editelement>

        <color-modal :shown="showColorModal"
                     :close="toogleColorModal">
        </color-modal>
        <file-upload-modal v-if="$plekanEvent.onFileUpload"
                           :shown="showFileUploadModal"
                           :close="toggleFileUploadModal">
        </file-upload-modal>
    </section>
</template>
<script>

    import editelement from '../../pb_components/pb_editor/editelement';
    import editorButtons from '../../constant/editor-buttons.json';
    import editorList from '../../pb_components/pb_editor/editorList';
    import colorModal from '../../pb_components/pb_editor/colorModal';
    import fileUploadModal from '../../pb_components/pb_editor/fileUploadModal';
    import {exec, hasParent} from '../../helper';
    import store from '../../store';


    export default {
        props: [],
        data() {
            return {
                editableModal: false,
                showColorModal: false,
                showFileUploadModal: false,

                editableModalElement: null,
                linktext: '',

                editorButtons,

                store,
            };
        },
        components: {
            editelement,
            editorList,
            colorModal,
            fileUploadModal,
        },
        computed: {
            stableCustomButtons() {
                return this.$customEditorButtons.filter(b => b.type === 'stable');
            },
            stickyCustomButtons() {
                return this.$customEditorButtons.filter(b => b.type === 'sticky');
            },
        },
        mounted() {
            const editableTag = ['IFRAME', 'IMG', 'A'];

            const editButton = document.querySelector('.plekan-editable-elements-button');
            const editButtonWidth = editButton.clientWidth;
            const editButtonHeight = editButton.clientHeight;

            let target;
            let tagname;
            let calc;
            let parents;
            let editorIsVisible;
            document.addEventListener('mouseover', (e) => {
                editorIsVisible =
                    this.store.state.editorElementDynamic.className.indexOf('active') !== -1;

                if (editorIsVisible) return;

                target = e.target;
                tagname = target.tagName;
                calc = target.getBoundingClientRect();

                if (editableTag.indexOf(tagname) !== -1) {
                    parents = hasParent(e.target, 'plekan-row-item');

                    if (parents) {
                        const st = document.getElementById('plekan').scrollTop;
                        this.editableModalElement = target;
                        editButton.style.display = 'block';
                        editButton.style.visibility = 'visible';
                        editButton.style.top = `${calc.height / 2 + st + calc.top - editButtonHeight / 2}px`;
                        editButton.style.left = `${calc.width / 2 + calc.left - editButtonWidth / 2}px`;
                    }
                } else if (target.parentNode !== editButton && target !== editButton) {
                    editButton.style.display = 'none';
                }
            });

            const editorItems = document.querySelectorAll('.plekan-editor a');

            Object.keys(editorItems).map((e) => {
                editorItems[e].addEventListener('click', (item) => {
                    item.preventDefault();
                    const cmd = item.target.dataset.type;
                    switch (cmd) {
                        case 'createLink':
                            document.querySelector('.create-link').classList.add('active');
                            break;
                        case 'custom':
                            const customButton = this.$customEditorButtons[
                                e.target.dataset.index
                                ];
                            customButton.callback({
                                target: e.target,
                                execCommand: exec,
                                selection: this.store.state.selo,
                                savedSelection: this.store.state.sel,
                            });
                            break;
                        case 'color':
                            this.toogleColorModal();
                            break;
                        case 'fileUpload':
                            this.toggleFileUploadModal();
                            break;
                        case 'formatBlock':
                            exec('formatBlock', e.target.dataset.value);
                            break;
                        default:
                            exec(cmd);
                            break;
                    }
                    this.store.state.sel = this.store.state.selo.saveSelection();
                });

                return true;
            });

            document.addEventListener(
                'domupdated',
                () => {
                    this.editableModal = false;
                },
                false,
            );

            document.addEventListener(
                'requestHiddenModal',
                () => {
                    this.showColorModal = false;
                    this.editableModal = false;
                    this.showFileUploadModal = false;
                },
                false,
            );
        },
        methods: {
            toogleColorModal() {
                this.showColorModal = !this.showColorModal;
            },

            toggleFileUploadModal() {
                this.showFileUploadModal = !this.showFileUploadModal;
            },

            openEditElement() {
                this.editableModal = true;
            },

            createLink() {
                exec('createLink', this.linktext);
                this.linktext = '';
                document.querySelector('.create-link').classList.remove('active');
            },
        },
    };
</script>
