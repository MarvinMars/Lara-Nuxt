<template>
    <div>
        <div id="plekan">
            <arena>
            </arena>
            <blocks-list :type="type">
            </blocks-list>
        </div>
    </div>

</template>

<script>
    import store from '../../store';
    import Arena from './arena';
    import BlocksList from './list';

    import Editor from './editor';

    export default {
        props: ['rows', 'type'],
        components: {
            Arena,
            BlocksList,
            Editor,
        },
        data: function () {
            return {
                store,
            };
        },
        beforeMount: function () {
            if (this.rows) {
                this.store.init('rows', JSON.parse(JSON.stringify(this.rows)));
            }
        },
        created: function () {
            this.store.state.vm = this;
        },
        mounted: function () {
            // this.store.state.editorStart();
            this.$plekanEvent.onInit();
        },
    };
</script>
