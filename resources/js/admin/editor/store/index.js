const uuid = require('uuid');

export default {
    debug: true,
    state: {
        moduleList: [],
        rows: [],
        vm: null,
        editorStart: null,
        selo: null,
        editorElement: null,
        editorElementDynamic: null,
        editorElementStable: null,
    },
    init: function (type, data) {
        this.state[type] = data;
    },
    addRow: function (r, i) {
        const tmp = JSON.parse(JSON.stringify(r));
        tmp.index = uuid.v1();
        if (isNaN(i)) {
            this.state.rows.push(tmp);
        } else {
            this.state.rows.splice(i, 0, tmp);
        }

        this.state.vm.$plekanEvent.onAdd(tmp);
    },
    updateRows: function (index, row) {
        const tmp = JSON.parse(JSON.stringify(this.state.rows)) || {};
        tmp[index] = row;
        this.state.rows = tmp;
        this.state.vm.$plekanEvent.onUpdate(tmp, index);
    },
    deleteRow: function (r, i) {
        const tmp = this.state.rows.splice(i, 1);
        this.state.vm.$plekanEvent.onDelete(tmp, i);
    },
    duplicateRow: function (r, i) {
        this.addRow(r, i);
        this.state.vm.$plekanEvent.onDuplicate(r, i);
    },
    sortRows: function (_new, old) {
        this.state.rows.move(old, _new);
        this.state.vm.$plekanEvent.onSort(_new, old);
    },
};
