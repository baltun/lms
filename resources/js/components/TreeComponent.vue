<template>
    <div>
        <el-button type="success" icon="el-icon-plus" circle size="small"/>

        <el-tree
        :data="allLeafs.data"
        :props="defaultProps"
        @node-click="handleNodeClick"
        @node-contextmenu="openContextMenu"
        >
            <span class="custom-tree-node" slot-scope="{ node, data }">
                <span :class="data.children ? 'el-icon-plus' : 'el-icon-user'"/>
                <span :class="(data.type_id == 1) ? 'el-icon-message-solid' : 'el-icon-bell'"/>
                <span>
                    {{ data.label }}
                </span>
            </span>
        </el-tree>

        <context-menu :display="showContextMenu" ref="menu">
            <ul id="right-click-menu">
                <li><a>Добавить подпункт к {{contextLesson.label}}</a></li>
                <li><a>Удалить пункт {{contextLesson.label}}</a></li>
            </ul>
        </context-menu>
    </div>
</template>

<script>
    // import {mapState, mapGetters, mapActions, mapMutations} from 'vuex';
    import {mapGetters, mapActions, mapMutations} from 'vuex'
    import ContextMenuComponent from './ContextMenuComponent'

    export default {
        components: {
            ContextMenuComponent,
        },
        data() {
            return {
                showContextMenu: false,
                defaultProps: {

                }
            }
        },

        async mounted() {
            console.log('mounted');
            this.getLeafs();
        },

        computed: mapGetters([
            "allLeafs",
            "currentLesson",
            "contextLesson"
        ]),

        methods: {
            ...mapActions([
                "getLeafs",
                "getLayer"
            ]),
            ...mapMutations([
                "updateCurrentLesson",
                "updateContextLesson"
            ]),
            handleNodeClick(data) {
                console.log(data);
                this.updateCurrentLesson(data);
            },
            loadLayer(node, resolve) {
                const $layer = this.getLayer(node.lavel);
                console.log('layer', $layer);
                return resolve($layer);
            },
            openContextMenu(e, node, data) {
                console.log('menu');
                console.log('node:', node);
                console.log('data:', data);
                console.log('e:', e);
                this.updateContextLesson(node);
                this.$refs.menu.open(e);
            }
        }
    };
</script>
