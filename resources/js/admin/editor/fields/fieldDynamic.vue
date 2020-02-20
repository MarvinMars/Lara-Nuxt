<template>
    <div class="card">
        <div class="card-body">
            <div class="card" v-if="value"
                 v-for="(row, index) in value">
                <div class="card-header">
                    <button @click.prevent="removeRow(index)" class="btn btn-warning btn-sm">
                        {{ schema.remove_block_label || 'Remove Block' }}
                    </button>
                </div>
                <div class="card-body">
                    <vue-form-generator :schema="schema.schema"
                                        :model="value[index]"
                                        @model-updated="modelUpdated"
                                        :options="formOptions">
                    </vue-form-generator>
                </div>
            </div>
            <button @click.prevent="addRow" class="btn btn-primary btn-sm">
                {{ schema.add_block_label || 'Add Block' }}
            </button>
        </div>
    </div>
</template>

<script>
    import {has as objHas, isObject} from 'lodash';
    import {abstractField} from "vue-form-generator";

    export default {
        mixins: [abstractField],
        methods: {
            getObjectByIndex: function (index) {
                if (objHas(this.value, index)) {
                    return Object.assign({}, this.value[index]);
                }

                return {};
            },
            addRow: function () {
                let default_schema = Object.assign({}, this.schema.default_schema);
                this.value.push(default_schema);
                this.$emit('model-updated', this.value, this.model);
            },
            removeRow: function (i) {
                this.value.splice(i, 1);
                this.$emit('model-updated', this.value, this.model);
            },
            modelUpdated: function (newValue, model) {
                console.log(model, newValue);
                this.$emit('model-updated', newValue, model);
            },
            validated: function (isValid, errors, instance) {
                this.$emit('validated', isValid, errors, instance);
            }
        }
    };

</script>
