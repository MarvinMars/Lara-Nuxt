<template lang="pug">
    .wrapper(v-attributes="'wrapper'")
        .input-group
            input.form-control(
                :id="getFieldID(schema)"
                :name="schema.inputName",
                :readonly="schema.readonly",
                @input="onInput",
                :required="schema.required",
                :placeholder="schema.placeholder",
                :value="value")
            .input-group-append
                label.btn.btn-outline-secondary() Browse
                    input(
                        type="file",
                        :id="getFieldID(schema) + '_file'",
                        :name="schema.inputName + '_file'",
                        @change="onChange",
                        :accept="schema.accept",
                        :multiple="schema.multiple",
                        :readonly="schema.readonly",
                        :required="schema.required",
                        :disabled="disabled",
                        hidden="hidden"
                        v-attributes="'input'")
        template(
                v-if="value && isImage(value)"
            )
                img.img-thumbnail.mx-auto.d-block.chessboard(
                    style="max-height: 200px;"
                    :src="value"
                )

</template>

<script>
    import {abstractField} from "vue-form-generator";

    export default {
        mixins: [abstractField],
        methods: {
            onChange: function ($event) {
                if (typeof this.schema.onChanged === 'function') {
                    this.schema.onChanged.call(this, this.model, this.schema, $event, this);
                }
            },
            isImage: function (maybeImage) {
                return (maybeImage && maybeImage.match(/\.(jpeg|jpg|gif|png|svg)$/) != null);
            },
            onInput($event) {
                if ($event.target) {
                    this.value = $event.target.value;
                }

            },
        }
    };
</script>

<style lang="scss">
    .vue-form-generator .field-input {
        .wrapper {
            width: 100%;
        }
        .helper {
            margin: auto 0.5em;
        }
    }

    img {
        &.chessboard {
            background-image: linear-gradient(45deg, #808080 25%, transparent 25%), linear-gradient(-45deg, #808080 25%, transparent 25%), linear-gradient(45deg, transparent 75%, #808080 75%), linear-gradient(-45deg, transparent 75%, #808080 75%);
            background-size: 20px 20px;
            background-position: 0 0, 0 10px, 10px -10px, -10px 0px;
        }
    }
</style>
