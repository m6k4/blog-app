// Vuex Client module mutations
import {
  FILL_USER_SESSION,
} from './mutations-types';

export default {
  [FILL_USER_SESSION](state, payload) {
    console.log(payload);
    state.userSession = payload.record;
  },
};
