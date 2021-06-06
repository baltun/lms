import axios from 'axios'
export default {
    state: {
        tree: [],
        lessonCurrent: [],
        lessonContext: []
    },

    getters: {
        allLeafs(state) {
            console.log(state.tree)
            return state.tree
        },
        currentLesson(state) {
            return state.lessonCurrent
        },
        contextLesson(state) {
            return state.lessonContext
        }
    },

    mutations: {
        updateLeafs(state, tree) {
            state.tree = tree
        },
        updateCurrentLesson(state, lesson) {
            state.lessonCurrent = lesson
        },
        updateContextLesson(state, lesson) {
            state.lessonContext = lesson
        }
    },

    actions: {
        getLayer(ctx, level) {
            // const $layer = getLessonsTreeLayer(level);
            const $layer = [{
                    label: 'урок',
                    leaf: 'no',
                    id: 1,
                },
                {
                    label: 'урок 2',
                    leaf: 'no',
                    id: 2,
                }
            ];
            return $layer;
        },
        getLeafs(ctx) {
            axios
                .get('/api/lessons/tree')
                .then(res => {
                    const leafs = res.data
                    console.log('leafs: '.leafs)
                    ctx.commit('updateLeafs', leafs)
                })
                .catch()
        }
    },
}
