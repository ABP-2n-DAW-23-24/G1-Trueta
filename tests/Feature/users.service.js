import axios from 'axios';

export const fetchUsers = async () => {
  try {
    const response = await axios.post('/getUsers');
    return response.data;
  } catch (error) {
    throw error;
  }
};

export const fetchaxios = async () => {
  try {
    const response = await axios.post('/medication-panel/get-dose-medication/7');
    return response.data;
  } catch (error) {
    throw error;
  }
};