import axios from 'axios';
import 'babel-polyfill';
import {loadProgressBar} from 'axios-progress-bar';


/**
 * Secure Api
 */
const apiSecure = axios.create({
    baseURL: 'http://localhost:8000/api/'
});

apiSecure.interceptors.request.use(async config => {
    return config;
});


apiSecure.interceptors.response.use(function (response) {
    return response.data;
}, function (error) {
    return Promise.reject(error);
});
loadProgressBar(null, apiSecure);

export default apiSecure;
