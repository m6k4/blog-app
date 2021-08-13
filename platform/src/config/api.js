import axios from 'axios';

const API_HEADERS = {};

API_HEADERS['X-Requested-With'] = 'XMLHttpRequest';
API_HEADERS['Access-Control-Allow-Origin'] = true;
API_HEADERS['Access-Token'] = 'token';

export default axios.create({
  baseURL: process.env.VUE_APP_API_URL,
  headers: API_HEADERS,
  timeout: 10000,
  withCredentials: true,
});
