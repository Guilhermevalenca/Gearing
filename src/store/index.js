import { createStore } from 'vuex'

export default createStore({
  state: {
    user: {
      username: '',
      email: ''
    },
    subjects: [],
    turns: ''
  },
  mutations: {
    changeUser(state,data) {
      state.user.username = data.username;
      state.user.email = data.email;
      
    },
    addMatter(state,data) {
      state.subjects = data; 
    },
    addTurns(state,data){
      state.turns = data;
    }
  },
  getters: {
  },
  actions: {
    changeUser( {commit}, data) {
      commit('changeUser',data)
    },
    addingTemporaryDataSchedule( {commit}, data) {
      commit('addMatter',data.matter);
      commit('addTurns',data.turns);
    }
  }
})
