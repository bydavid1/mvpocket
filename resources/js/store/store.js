import Vue from 'vue'
import Vuex from 'vuex'
import VueAxios from 'vue-axios';
import axios from 'axios';

Vue.use(Vuex)

const store = new Vuex.Store({
    state: {
        auth: false,
        token : localStorage.getItem('token') || "",
        status : ''
    },
    mutations: {
        auth_request : function (state) {
            state.status = 'loading'
        },
        auth_success : function (state, token) {
            state.status = 'finished'
            state.auth = true
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
        }
    },
    actions : {
        login ({commit}, user) {
            return new Promise((resolve, reject) => {
                commit('auth_request')
                axios.post('/api/auth/login', user)
                .then(response => {
                    const token = response.data.access_token
                    localStorage.setItem('token', token)
                    axios.defaults.headers.common['Authorization'] = "Bearer" + token
                    commit('auth_success', token)
                    resolve('resp')
                })
                .catch(error => {
                    commit('auth_error')
                    localStorage.removeItem('token')
                    reject(error.response.data.message)
                })
            })
        },
        register ({commit}, user){
            return new Promise((resolve, reject) => {
                commit('auth_request')
                axios({url : '/api/auth/register', data : user, method : 'POST'})
                .then(response => {
                    console.log(response)
                    const token = response.headers.authorization
                    localStorage.setItem('token', token)
                    axios.defaults.headers.common['Authorization'] = "Bearer" + token
                    commit('auth_success', token)
                    resolve('resp')
                })
                .catch(error => {
                    commit('auth_error')
                    localStorage.removeItem('token')
                    reject(error.response.data.message)
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
        isAuth : state => state.token,
        auth_status : state => state.status,
    }

})

export default store