function initialState() {
    return {
        hasError: false,
        errorMessage: {},
        hasSuccess: false,
        successMessage: null,
        tabData: []
    }
}
const getters = {
    hasError: state => state.hasError,
    errorMessage: state => state.errorMessage,
    hasSuccess: state => state.hasSuccess,
    successMessage: state => state.successMessage,
    tabData: state => state.tabData
}
const actions = {
    async GET_TABLE_DETAILS({ commit }, params) {
        try {
            commit('RESET_RESPONSE_FLAG')
            let res = await axios.get('get-table-details', params);
            if (res.status == 200) {
                commit('SET_SUCCESS', res.data.message)
                commit('SET_TAB_DETAILS', res.data.details)
            }
        } catch (error) {
            commit('SET_ERROR', error.response.data)
        }
    }
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
    SET_TAB_DETAILS(state, value) {
        state.tabData = value
    }
}
export default {
    namespaced: true,
    state: initialState,
    getters,
    actions,
    mutations
}