import Vue from 'vue'
import Vuex from 'vuex'
import lessonsTree from './modules/lessonsTreeState'

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        lessonsTree
    }

})
