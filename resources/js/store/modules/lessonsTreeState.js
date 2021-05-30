import axios from 'axios'
export default {
    state: {
        tree: []
    },

    getters: {
        allLeafs(state) {
            console.log(state.tree)
            return state.tree
        }
    },

    mutations: {
        updateLeafs(state, tree) {
            state.tree = tree
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
            const leafs = {
                data: [{
                    label: 'Урок 1',
                    leaf: 'yes',
                    children: [{
                        label: 'Таблица 1-1',
                        leaf: 'yes',
                        children: [{
                            label: 'Диаграмма 1-1-1'
                        }],
                        id: 1
                    }]
                }, {
                    label: 'Урок 2',
                    leaf: 'no',
                    children: [{
                        label: 'Таблица 2-1',
                        leaf: 'yes',
                        children: [{
                            label: 'Диаграмма 2-1-1'
                        }],
                        id: 2,
                    }, {
                        label: 'Таблица 2-2',
                        leaf: 'yes',
                        children: [{
                            label: 'Задание 2-2-1'
                        }],
                        leaf: 1
                    }]
                }, {
                    label: 'Урок 3',
                    children: [{
                        label: 'Диаграмма 3-1',
                        children: [{
                            label: 'Таблица 3-1-1'
                        }]
                    }, {
                        label: 'Таблица 3-2',
                        children: [{
                            label: 'Диаграмма 3-2-1'
                        }]
                    }]
                }],
                defaultProps: {
                    children: 'children',
                    label: 'label'
                }
            };
            axios
                .get('http://twi.lo/api/lessons/tree')
                .then(res => {
                    const leafs = res.data
                    console.log('leafs: '.leafs)
                    ctx.commit('updateLeafs', leafs)
                })
                .catch()
        }
    },
}
