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
                <li @click="lessonCreate">Добавить подпункт к {{contextLesson.label}}</li>
                <li @click="lessonDelete">Удалить пункт {{contextLesson.label}}</li>
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
                "getLayer",
                "createLeaf",
                "deleteLeaf"
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
            },
            lessonCreate(data) {
                console.log(this.contextLesson)
                this.$confirm('Пока этот пункт не работает')
                    .then(_ => {
                        done();
                    })
                    .catch(_ => {});
            },
            lessonDelete(data) {
                // console.log(this.contextLesson)
                this.$confirm('Удалить пункт меню, урок и всё его содержимое?')
                    .then(
                        () => {
                            console.log('deleted')
                            // resolve("done")
                            const lessonIdObject = { id: this.contextLesson.id };
                            this.$store.dispatch('lessons/delete', lessonIdObject)
                            // this.deleteLeaf(this.contextLesson.id)
                                .then(res => {
                                    console.log('message: ' + res)
                                    this.getLeafs()
                                },
                                err => {
                                    сonsole.log('error: ' + err)
                                })
                                // .catch((exc) => {
                                //     console.log('exception: ' + exc)
                                // });
                        },
                        () => {
                            console.log('canceled')
                        }
                    )
                    // .catch(() => {
                    //
                    //     console.log('canceled')
                    // });
            },
        }
    };
</script>
