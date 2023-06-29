function initialState() {
    return {
        hasError: false,
        errorMessage: {},
        successMessage: {}
    }
}
const getters = {
    hasError: state => state.hasError,
    errorMessage: state => state.errorMessage
}
const actions = {
    async VERIFY_USER_CREDENTIALS({ commit }, params) {
        try {
            let res = await axios.post('/verify-user', params)
            if (res.status === 200) {
            }            
        } catch (error) {
            commit('SET_ERROR', error);
        }
    }
}
const mutations = {
    SET_ERROR(state, value) {
        state.hasError = true
        state.errorMessage = value
    }
}
export default {
    namespaced: true,
    state: initialState,
    getters,
    actions,
    mutations
}