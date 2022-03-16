import axios from 'axios';

const MERCAZONA_API_BASE_URL = process.env.REACT_APP_API_URL;
const MERCAZONA_API_TIMEOUT = 120000;

export const axios = axios.create({
    timeout: MERCAZONA_API_TIMEOUT,
    baseURL: MERCAZONA_API_BASE_URL,
    headers: {
        Accept: 'application/json'
    }
});
