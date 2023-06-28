import { createStore } from 'vuex'
import VerifyUser from './auth/verify-user'
const store = createStore({
    modules: {
        VerifyUser
    }
})
export default store