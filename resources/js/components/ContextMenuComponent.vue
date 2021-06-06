<template>
    <div class="context-menu" v-show="show" :style="style" ref="context" tabindex="0" @blur="close">
        <slot></slot>
    </div>
</template>

<script>
    import Vue from 'vue';

    export default {
        name: 'CmpContextMenu',
        props: {
            display: Boolean, // prop detect if we should show context menu
        },
        data() {
            return {
                left: 0, // left position
                top: 0, // top position
                show: false, // affect display of context menu
            };
        },
        computed: {
            // get position of context menu
            style() {
                return {
                    top: this.top + 'px',
                    left: this.left + 'px',
                };
            },
        },
        methods: {
            // closes context menu
            close() {
                this.show = false;
                this.left = 0;
                this.top = 0;
            },
            open(evt) {
                // updates position of context menu
                this.left = evt.pageX || evt.clientX;
                this.top = evt.pageY || evt.clientY;
                // make element focused
                // @ts-ignore
                Vue.nextTick(() => this.$el.focus());
                this.show = true;
            },
        },
    };
</script>
<style>
    .context-menu {
        position: fixed;
        background: white;
        z-index: 999;
        outline: none;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
        cursor: pointer;
    }
    #right-click-menu{
        background: #FAFAFA;
        border: 1px solid #BDBDBD;
        box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);
        display: block;
        list-style: none;
        margin: 0;
        padding: 0;
        position: absolute;
        width: 250px;
        z-index: 999999;
    }

    #right-click-menu li {
        border-bottom: 1px solid #E0E0E0;
        margin: 0;
        padding: 5px 35px;
    }

    #right-click-menu li:last-child {
        border-bottom: none;
    }

    #right-click-menu li:hover {
        background: #e9f0f5;
        color: #414242;
    }
</style>
