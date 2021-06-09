<template>
    <div>
        <div>
            <el-popconfirm @confirm="handleClick"
                title="Ты уверен?"
            >
                <el-button slot="reference">Выбрать урок №42</el-button>
            </el-popconfirm>
        </div>
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
            console.log('buttonChange mounted');
        },

        computed: mapGetters(["currentLesson"]),

        methods: {
            ...mapActions([
            ]),
            ...mapMutations([
                "updateCurrentLesson"
            ]),
            handleClick(data) {
                console.log(data)
                this.updateCurrentLesson({'id' : 42})
                console.log(this.currentLesson)
            }
        }
    };
</script>
