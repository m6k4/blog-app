// Vuex Authorization module

import actions from './actions';
import mutations from './mutations';

const INITIAL_STATE = {
  userSession: {},
};

const getters = {
  userSession: (state) => state.userSession,
};

// VUEX MODULE /////////////////////////////////////////////////////////////////
const Module = {
  namespaced: true,
  state: INITIAL_STATE,
  mutations,
  actions,
  getters,
};

export default Module;
