<template lang="pug">
    .wrapper
        wysiwyg(
            v-model="value",
            :config="wysiwygConfig",
            :name="schema.inputName",
            :readonly="schema.readonly")
</template>
<script>
    import {abstractField} from "vue-form-generator";

    export default {
        mixins: [abstractField],
        computed: {
            wysiwygConfig: function () {
                const defaults = {
                    autogrow: true,
                    btnsDef: {
                        align: {
                            dropdown: ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                            ico: 'justifyLeft'
                        }
                    },
                    btns: [
                        ['viewHTML'],
                        ['formatting', 'removeformat'],
                        ['strong', 'em', 'del'],
                        ['align'],
                        ['unorderedList', 'orderedList', 'table'],
                        ['foreColor', 'backColor'],
                        ['link', 'noembed', 'image'],

                    ],
                    tagsToRemove: ['script'],
                    tagsToKeep: ['div', 'div[class]', 'p[class]', 'hr', 'img', 'embed', 'iframe', 'input', 'i'],
                    removeformatPasted: true
                };

                return Object.assign({}, defaults, this.schema.wysiwygConfig);
            },
        }
    };
</script>
