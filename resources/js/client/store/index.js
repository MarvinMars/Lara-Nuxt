export const state = () => ({
    menus: {},
    layout_class: 'wrapper',
    page: {},
    settings: {},
    isMenuOpen: false,
    verticalLayout: false,
});

export const mutations = {
    addMenus(state, menus) {
        state.menus = menus
    },
    addSettings(state, settings) {
        state.settings = settings
    },
    changeLayoutClass(state, layout_class) {
        state.layout_class = layout_class;
    },
    menuState(state) {
        state.isMenuOpened = state;
    },
    addPage(state, page) {
        state.page = page || {};
    },
    toggleVerticalLayoutState: function (state) {
        state.verticalLayout = !state.verticalLayout;
    }
};
