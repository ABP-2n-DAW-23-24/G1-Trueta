import axios from 'axios';

export const getQuestions = async (operationId) => {
  try {
    const response = await axios.post(`/get-questions/${operationId}`);
    return response.data;
  } catch (error) {
    throw error;
  }
};