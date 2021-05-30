<template>
    <div>
        <el-button type="success" icon="el-icon-plus" circle size="small"/>
        <el-tree
        :data="allLeafs.data"
        :props="allLeafs.defaultProps"
        @node-click="handleNodeClick"
        >
            <span class="custom-tree-node" slot-scope="{ node, data }">
                <span :class="data.children ? 'el-icon-plus' : 'el-icon-user'"/>
                <span :class="(data.type_id == 1) ? 'el-icon-message-solid' : 'el-icon-bell'"/>
                <span>
                    {{ data.label }}
                </span>
            </span>
        </el-tree>
    </div>
</template>

<script>
    // import {mapState, mapGetters, mapActions, mapMutations} from 'vuex';
    import {mapGetters, mapActions, mapMutations} from 'vuex'
    export default {
        // data() {
        //
        // },
        async mounted() {
            console.log('mounted');
            this.getLeafs();
        },

        computed: mapGetters(["allLeafs"]),

        methods: {
            ...mapActions([
                "getLeafs",
                "getLayer"
            ]),
            ...mapMutations([
                "updateCurrentLesson",
            ]),
            handleNodeClick(data) {
                console.log(data);
                this.updateCurrentLesson(data);
            },
            loadLayer(node, resolve) {
                const $layer = this.getLayer(node.lavel);
                console.log('layer', $layer);
                return resolve($layer);
            }
        }
    };
</script>
