export const isComponentExists = {
    methods: {
        isComponentExists: function (componentName) {
            return componentName in this.$options.components;
        }
    }
};
