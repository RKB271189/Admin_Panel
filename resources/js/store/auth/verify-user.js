function initialState() {

}
const getters = {

}
const actions = {
    VERIFY_USER_CREDENTIALS({ commit }, params) {
        console.log(params);
    }
}
const mutations = {

}
export default {
    namespaced: true,
    state: initialState,
    getters,
    actions,
    mutations
}