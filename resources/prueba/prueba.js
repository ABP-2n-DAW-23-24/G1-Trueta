// api.js
import axios from 'axios';

export function fetchData(url) {
  return axios.get(url)
    .then(response => response.data)
    .catch(error => {
      throw error;
    });
}