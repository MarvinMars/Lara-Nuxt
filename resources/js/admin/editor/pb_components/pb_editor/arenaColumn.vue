<template>
    <div class="plekan-translate-mode-column">
        <div class="plekan-row-list"
             id="plekan-sortable-list">
            <div class="plekan-row-item animated fadeIn transition-component"
                 v-for="(r,key) in rows"
                 :key="r.index">
                <div class="plekan-tools">
                    <span class="plekan-move-row"><i class="fa fa-hand-grab-o"></i></span>
                    <span @click="deleteRow(r,key)"><i class="fa fa-trash-o"></i></span>
                    <span @click="duplicateRow(r,key)"><i class="fa fa-copy"></i></span>
                </div>
                <section>
                    <component :is="r.name"
                               v-if="isComponentExists(r.name)"
                               :index="key"
                               :data="r"
                               :store="store">
                    </component>
                </section>
            </div>
        </div>
    </div>
</template>

<script>
    import store from '../../store';

    export default {
        props: ['rows', 'editAsHTMLRow', 'type'],
        data() {
            return {
                store,
            };
        },
        methods: {
            openModuleList() {
                document.querySelector('._plekan_list').classList.toggle('active');
                document.querySelector('._plekan_list').classList.toggle('deactive');
            },
            deleteRow(row, index) {
                if (confirm('Are you sure?')) {
                    this.store.deleteRow(row, index);
                }
            },
            duplicateRow(row, index) {
                this.store.duplicateRow(row, index);
            },
            isComponentExists: function (componentName) {
                return componentName in this.$options.components;
            }
        },
    };
</script>
