import { createStore } from 'vuex'

export default createStore({
  state: {
    user: {
      username: '',
      email: ''
    },
    subject: []
  },
  mutations: {
    changeUser(state,data) {
      state.user.username = data.username;
      state.user.email = data.email;
      
    },
    addMatter(state,data) {
      state.subject = data; 
    }
  },
  getters: {
  },
  actions: {
    changeUser( {commit}, data) {
      commit('changeUser',data)
    },
    addMatter( {commit}, data) {
      commit('addMatter',data)
    }
  }
})
