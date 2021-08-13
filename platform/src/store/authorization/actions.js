// Vuex Authorization module actions
// import moment from 'moment';
import API from '../../config/api';

import {
  FILL_USER_SESSION,
} from './mutations-types';

export default {
  async loginToPlatform(context, params) {
    try {
      await API.post('/authorization/loginToPlatform', params);
      // document.cookie = `Token=${response.data.data};${moment().add(1, 'd').valueOf()};path=/`;
      // console.log(response);
    } catch (err) {
      console.log(err);
    }
  },
  async checkIfUserSessionExists({ commit }) {
    try {
      const result = API.get('/authorization/checkIfUserSessionExists');
      commit(FILL_USER_SESSION, result);
    } catch (err) {
      console.log(err);
    }
  },
  async logoutFromPlatform() {
    try {
      await API.delete('/authorization/logoutFromPlatform');
      // document.cookie = `Token=${response.data.data};${moment().add(1, 'd').valueOf()};path=/`;
      // console.log(response);
    } catch (err) {
      console.log(err);
    }
  },
};
