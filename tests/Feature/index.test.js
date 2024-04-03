import { describe, it, expect, vi } from 'vitest';
import axios from 'axios';
import { getQuestions } from './questions.service';
import { shallowMount } from '@vue/test-utils';
import Logo from '@/Components/Logo.vue';

vi.mock('axios', () => {
  return {
    default: {
      post: vi.fn(() => Promise.resolve({ data: 'mocked data' }))
    }
  };
});

describe('fetchQuestions', () => {
  it('La operació amb id 1 (Recanvi Valvular) conte la pregunta amb id 1(Profilaxi quirúrgica d’elecció)', async () => {
    const questionsMock = [
      {
        id: 1,
        question: "Profilaxi quirúrgica d’elecció"
      },
      {
        id: 2,
        question: "Al·lèrgia a Penicil·lina"
      },
      {
        id: 3,
        question: "Pacients colonitzats per MARSA"
      }
    ];    
    var operationId = 1; //Recanvi Valvular

    axios.post.mockResolvedValue({ data: questionsMock });
    const questions = await getQuestions(operationId);

    expect(axios.post).toHaveBeenCalledWith('/get-questions/' + operationId);
    expect(questions.some(question => question.id === 1)).toBeTruthy();
  });

  it('El Logo contiene un elemento img', async () => {
    const wrapper = shallowMount(Logo);
    await wrapper.vm.$nextTick();
    const adjacentImage = wrapper.html("img");
    expect(adjacentImage).toBeDefined();
  });
});