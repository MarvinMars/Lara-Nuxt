<template>
    <div class="_plekan_list animated active">
        <span class="_plekan_list_title">Component List</span>
        <button type="button"
                @click="openModuleList"
                class="plekan-open-module-list">
            <i class="fa fa-angle-left"></i>
        </button>
        <div id="plekan-module-sortable-list" v-if="list.length">
            <div class="plekan-list-item"
                 v-for="(l,key) in list"
                 @click.prevent="addRow(key)"
                 v-bind:data-index="key">
                <h6>{{ l.title || l.name }}</h6>
                <img class="plekan-move-row"
                     :src="$plekanutils.makeUrl(l.thumbnail)"/>
            </div>
        </div>
        <div v-else-if="!type">
            <strong>Please select type of the post first.</strong>
        </div>
        <div v-else>
            <strong>No blocks available for selected type.</strong>
        </div>
    </div>
</template>

<script>
    import store from '../../store';
    import Sortable from 'sortablejs';
    import {listSortableOptions} from '../../core/sortable_options';

    export default {
        props: {
            type: {
                type: String,
            }
        },
        data() {
            return {
                store,
            };
        },
        mounted: function () {
            this.initDragDropBlock();
        },
        computed: {
            list: function () {
                return this.store.state.moduleList.filter(module => {
                    return typeof module.type === 'undefined' || module.type === this.type;
                });
            },
        },
        methods: {
            initDragDropBlock: function () {
                const el = document.getElementById('plekan-module-sortable-list');

                if (el) {
                    Sortable.create(el, {
                        ...listSortableOptions,
                        onRemove: (e) => {
                            const index = e.clone.dataset.index;
                            this.addRow(index, e.newIndex);
                            this.attachEvent();
                        },
                    });
                }
            },
            openModuleList: function () {
                document.querySelector('._plekan_list').classList.toggle('active');
                document.querySelector('._plekan_list').classList.toggle('deactive');
            },
            addRow: function (rowindex, sortindex) {
                const tmprow = this.list[rowindex];
                this.store.addRow(tmprow, sortindex);
            },
        },
    };

</script>
