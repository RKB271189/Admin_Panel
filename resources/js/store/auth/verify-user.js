function initialState() {
    return {
        hasError: false,
        errorMessage: {},
        hasSuccess: false,
        successMessage: {},
        passportToken: null
    }
}
const getters = {
    hasError: state => state.hasError,
    errorMessage: state => state.errorMessage,
    hasSuccess: state => state.hasSuccess,
    successMessage: state => state.successMessage,
    passportToken: state => state.passportToken,
}
const actions = {
    async VERIFY_USER_CREDENTIALS({ commit }, params) {
        commit('RESET_RESPONSE_FLAG')
        try {
            let res = await axios.post('/verify-user', params)
            if (res.status === 200) {
                commit('SET_PASSPORT_TOKEN', res.data.token)
            }
        } catch (error) {
            commit('SET_ERROR', error.response.data)
        }
    },
}
const mutations = {
    RESET_RESPONSE_FLAG(state) {
        state.hasError = false
        state.hasSuccess = false
    },
    SET_ERROR(state, value) {
        state.hasError = true
        state.errorMessage = value
    },
    SET_SUCCESS(state, value) {
        state.hasSuccess = true
        state.successMessage = value
    },
    SET_PASSPORT_TOKEN(state, value) {
        state.passportToken = value
    }
}
export default {
    namespaced: true,
    state: initialState,
    getters,
    actions,
    mutations
}