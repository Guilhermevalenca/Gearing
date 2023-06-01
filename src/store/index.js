import { createStore } from 'vuex'

export default createStore({
  state: {
    user: {
      username: '',
      email: ''
    },
    subjects: []
  },
  mutations: {
    changeUser(state,data) {
      state.user.username = data.username;
      state.user.email = data.email;
      
    },
    addMatter(state,data) {
      state.subjects = data; 
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
