import { createStore } from 'vuex'

export default createStore({
  state: {
    user: {
      username: '',
      email: ''
    }
  },
  mutations: {
    changeUser(state,data){
      state.user = data;
    }
  },
  getters: {
  },
  actions: {
    changeUser( {commit}, data) {
      commit('changeUser',data)
    },
    signOutOfAccount( {commit}){
      commit('changeUser',{
        user: {
          username: '',
          email: ''
        }
      })
    }
  }
})
