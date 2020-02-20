<template>
    <div class="plekan-area">
        <div class="plekan-container">
            <h2>Page Builder</h2>
            <arena-column :rows="rows"
                          :type="type"
                          :editAsHTMLRow="editAsHTMLRow">
            </arena-column>
            <modal :show="!!editRow.row"
                   class="edit-modal">
                <header slot="header">
                    <div class="plekan-modal-title">Edit As Html</div>
                </header>
                <div slot="body"
                     class="plekan-edit-as-html-modal-body">
                    <textarea v-model="editRow.html"></textarea>
                </div>
                <footer slot="footer"
                        class="plekan-clearfix">
                    <button type="button"
                            @click.prevent="saveEditAsHtml">Save HTML
                    </button>
                </footer>
            </modal>
        </div>
        <div class="plekan-container">
            <div class="plekan-footer">
                <button v-for="b in $plekan_buttons"
                        type="button"
                        :class="b.class"
                        @click="b.callback(returnStoreRows)">
                    {{b.text}}
                </button>
            </div>
        </div>
    </div>
</template>
<script>

    import store from '../../store';
    import modal from './modal.vue';
    import arenaColumn from './arenaColumn.vue';
    import Sortable from 'sortablejs';
    import {arenaSortableOptions} from '@core/sortable_options';

    export default {
        props: ['type'],
        data: function () {
            return {
                store,
                editRow: {
                    html: null,
                    index: null,
                    row: null,
                },
            };
        },
        components: {
            modal,
            arenaColumn,
        },
        computed: {
            returnStoreRows: function () {
                return JSON.parse(JSON.stringify(this.store.state.rows));
            },
            rows: function () {
                return this.store.state.rows;
            },
            list: function () {
                return this.store.state.moduleList;
            },
        },
        mounted() {
            const el = document.getElementById('plekan-sortable-list');

            if (el) {
                Sortable.create(el, {
                    ...arenaSortableOptions,
                    onAdd: this.onAdd,
                    onEnd: this.onEnd,
                });
            }

            document.addEventListener('requestHiddenModal', () => {
                if (this.editRow.row) {
                    Object.keys(this.editRow).map((e) => this.editRow[e] = null);
                }
            }, false);
        },
        methods: {
            editAsHTMLRow: function (row, index) {
                this.editRow.row = JSON.parse(JSON.stringify(row));
                this.editRow.index = index;
                this.editRow.html = this.editRow.row.html;
            },
            saveEditAsHtml: function () {
                this.editRow.row.html = this.editRow.html;
                this.store.updateRows(this.editRow.index, this.editRow.row);
                Object.keys(this.editRow).map(e => this.editRow[e] = null);
            },
            onAdd: function (evt) {
                evt.item.remove();
            },
            onEnd: function (evt) {
                console.log(evt.newIndex, evt.oldIndex);
                this.store.sortRows(evt.newIndex, evt.oldIndex);
            },
        },
    };
</script>
