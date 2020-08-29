import Vue from 'vue'
import Vuex from 'vuex'
import VueAxios from 'vue-axios';
import axios from 'axios';

Vue.use(Vuex)

const store = new Vuex.Store({
    state: {
        auth: false,
        user: {},
        token : localStorage.getItem('token') || "",
        status : ''
    },
    mutations: {
        auth_request : function (state) {
            state.status = 'loading'
        },
        auth_success : function (state, token, user) {
            state.status = 'finished'
            state.auth = true
            state.user = user 
            state.token = token
        },
        auth_error : function (state) {
            state.status = 'error'
            state.auth = false
        },
        logout : function (state) {
            state.token = ''
            state.status = ''
            state.auth = false
            state.user = {}
        }
    },
    actions : {
        login ({commit}, user) {
            return new Promise((resolve, reject) => {
                commit('auth_request')
                axios({url : 'api', data : user, method : 'POST'})
                .then(response => {
                    const token = response.data.token
                    const user = response.data.user
                    localStorage.setItem('token', token)
                    axios.defaults.headers.common['Authorization'] = token
                    commit('auth_success', token, user)
                    resolve('resp')
                })
                .catch(err => {
                    commit('auth_error')
                    localStorage.removeItem('token')
                    reject('err')
                })
            })
        },
        register ({commit}, user){
            return new Promise((resolve, reject) => {
                commit('auth_request')
                axios({url : 'api', data : user, method : 'POST'})
                .then(response => {
                    const token = response.data.token
                    const user = response.data.user
                    localStorage.setItem('token', token)
                    axios.defaults.headers.common['Authorization'] = token
                    commit('auth_success', token, user)
                    resolve('resp')
                })
                .catch(err => {
                    commit('auth_error')
                    localStorage.removeItem('token')
                    reject('err')
                })
            })
        },
        logout({commit}) {
            return new Promise((resolve, reject) => {
                commit('logout')
                localStorage.removeItem('token')
                delete axios.defaults.headers.common['Authorization']
                resolve()
            })
        }
    },
    getters : {
        isAuth : state => !!state.token ,
        auth_status : state => state.status
    }

})

export default store