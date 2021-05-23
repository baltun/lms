<template>
    <el-tree :data="data" :props="defaultProps" @node-click="handleNodeClick"></el-tree>
</template>

<script>
    export default {
        data() {
            return {
                data: [{
                    label: 'Урок 1',
                    children: [{
                        label: 'Таблица 1-1',
                        children: [{
                            label: 'Диаграмма 1-1-1'
                        }]
                    }]
                }, {
                    label: 'Урок 2',
                    children: [{
                        label: 'Таблица 2-1',
                        children: [{
                            label: 'Диаграмма 2-1-1'
                        }]
                    }, {
                        label: 'Таблица 2-2',
                        children: [{
                            label: 'Задание 2-2-1'
                        }]
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
        },
        methods: {
            handleNodeClick(data) {
                console.log(data);
            }
        }
    };
</script>
