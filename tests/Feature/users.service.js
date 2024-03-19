import axios from 'axios';

export const fetchUsers = async () => {
  try {
    const response = await axios.post('/getUsers');
    return response.data;
  } catch (error) {
    throw error;
  }
};