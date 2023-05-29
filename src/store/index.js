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
      state.user.username = data.username;
      state.user.email = data.email;
      
    }
  },
  getters: {
  },
  actions: {
    changeUser( {commit}, data) {
      commit('changeUser',data)
    }
  }
})
