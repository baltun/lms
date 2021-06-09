import Vue from 'vue'
import Vuex from 'vuex'
import lessonsTree from './modules/lessonsTreeState'
import { mapResourceModules } from '@reststate/vuex';
import api from "./modules/api";

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        lessonsTree,
        ...mapResourceModules({
            names: [
                'lessons',
            ],
            httpClient: api
        }),
    }

})
