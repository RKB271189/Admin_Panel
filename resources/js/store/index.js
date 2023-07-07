import { createStore } from 'vuex'
import VerifyUser from './auth/verify-user'
import Dashboard from './admin/dashboard'
import Tabular from './admin/tabular'
const store = createStore({
    modules: {
        VerifyUser,
        Dashboard,
        Tabular
    }
})
export default store