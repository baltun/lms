<template>
    <div>
        ID выбранного урока: {{getCurrentLesson.id}}
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
            console.log('lesson mounted');
        },

        computed: mapGetters(["getCurrentLesson"]),

        methods: {
            ...mapActions([
            ]),
            ...mapMutations([
            ]),
        }
    };
</script>
