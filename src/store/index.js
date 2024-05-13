import { createStore } from 'vuex'

export default createStore({
  state: {
    user: {
      username: '',
      email: '',
      auth: false
    },
    schedule: {
      editTitle: ''
    },
    req: {
      api: 'https://ec2-3-145-96-182.us-east-2.compute.amazonaws.com/Gearing/api',
      webSocket: 'http://localhost:5000'
    }
  },
  mutations: {
    changeUser(state,data) {
      state.user.username = data.username;
      state.user.email = data.email;
      state.user.auth = data.auth;
    },
    changeSchedule(state,data) {
      state.schedule.editTitle = data;
    }
  },
  getters: {
  },
  actions: {
    changeUser( {commit}, data) {
      commit('changeUser',data);
    },
    changeSchedule( {commit}, data) {
      commit('changeSchedule',data);
    }
  }
})
