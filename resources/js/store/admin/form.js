import { commonInitialState, commonGetters, commonMutations } from "../common"
function initialState() {
    return {
        ...commonInitialState,
        formData: {}
    }
}

const getters = {
    ...commonGetters,
    formData: state => state.formData
}

const actions = {

}

const mutations = {
    ...commonMutations
}

export default {
    namespaced: true,
    state: initialState,
    getters,
    actions,
    mutations
}