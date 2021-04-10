import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const store = new Vuex.Store({
    state: {
        user: '',
        message: []
    },
    mutations: {
        getUserMessage(state, payroll) {
            state.user = payroll.user,
                state.message = payroll.messages;
        },
        sendNewMessage(state, payroll) {
            if (state.message.length === 0) {
                state.message = payroll.message;
            } else {
                state.message.push(payroll.message);
            }

        },
        updateNewMessage(state, payroll) {
            if (state.message.length === 0) {
                state.message = payroll;
            } else {
                state.message.push(payroll);
            }

        }
    }
});
export default store;