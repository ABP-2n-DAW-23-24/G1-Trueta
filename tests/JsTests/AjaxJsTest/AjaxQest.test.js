import { beforeAll, test, describe } from 'vitest';
import axios from 'axios';

const BEFORE_ALL_TIMEOUT = 30000;

describe('fetchQuestions', () => {
  let response;
  const operationId = 1; //Recanvi Valvular

  beforeAll(async () => {
    try {
      response = await axios.get(`/get-questions-test/${operationId}`);
    } catch (error) {
      console.error(error);
    }
  }, BEFORE_ALL_TIMEOUT);

  test('La operació Recanvi Valvular conte la pregunta Profilaxi quirúrgica d’elecció', () => {
    expect(response.status).toBe(200);
    const questionsOperation = response.data.questionsOperation;
    const questionExists = questionsOperation.some(question => question.id === 1);
    expect(questionExists).toBeTruthy();
  });
});
