import {childOf, hasParent} from '../helper';

const DEFAULT_CONTENT = '<div contenteditable="true">DEFAULT</div>';
export default {
    props: ['store', 'index'],
    data() {
        return {
            DEFAULT_CONTENT,
            _updatable: null,
        };
    },
    computed: {

        me() {
            return this.store.state.rows[this.index];
        },
        _content() {
            const c = this.me.html;
            return c || this.DEFAULT_CONTENT;
        },
    },
    mounted() {
        // Enable content editable
        const ct = this.$el.querySelectorAll('[contenteditable]');
        Object.keys(ct).map((e) => {
            ct[e].contentEditable = true;
            return true;
        });

        /**
         * Initial html content
         */
        try {
            const html = this.me.html;
            this.me.html = html || this.DEFAULT_CONTENT;
        } catch (e) {
            const tmp = JSON.parse(JSON.stringify(this.me));

            tmp.html = this.DEFAULT_CONTENT;
            tmp.fields = {};
            this.store.updateRows(this.index, tmp);
        }

        /**
         * Editable arena event set
         */
        this._setEditable();

        document.addEventListener('mousedown', (e) => {
            const target = e.target;
            const isModalElement = !!hasParent(target, 'plekan-modal');

            this._updatable =
                childOf(target, this.store.state.editorElement) ||
                isModalElement ||
                target.className === 'editor';
        });

        document.addEventListener('mouseup', () => {
            this._updatable = null;
        });

        // this.attachEvent()
        document.addEventListener(
            'domupdated',
            () => {
                this._updateHTML();
            },
            false,
        );
    },
    updated() {
        this._setEditable();
    },
    methods: {
        _setEditable() {
            this.$el.onfocus = () => {
                this.store.state.editorElementStable.classList.add('active');
            };

            this.$el.onblur = () => {
                if (!this._updatable) {
                    this._updateHTML();
                    this.store.state.editorElementDynamic.classList.remove('active');
                    this.store.state.editorElementStable.classList.remove('active');
                    // Link content
                }
            };
        },
        _updateHTML() {
            this.me.html = this.$el.innerHTML.trim();
        },
    },
};
