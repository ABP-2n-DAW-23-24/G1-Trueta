import { describe, it, expect, vi } from 'vitest';
import axios from 'axios';
import { fetchaxios } from './users.service';
import { shallowMount } from '@vue/test-utils';
import Index from '@/Components/Footer.vue';

vi.mock('axios', () => {
  return {
    default: {
      post: vi.fn(() => Promise.resolve({ data: 'mocked data' }))
    }
  };
});

describe('fetchaxios', () => {
  it('Test de axios para la get-medication', async () => {
    // Datos de prueba que nuestra función mock retornará
    const MedicationsMock = [{ id: 1, medicationId: 2, dose:"" }];

    axios.post.mockResolvedValue({ data: MedicationsMock });

    const users = await fetchaxios();

    expect(axios.post).toHaveBeenCalledWith('/medication-panel/get-dose-medication/7');
    expect(users).toEqual(MedicationsMock);
  });
});


it('El componente contiene un texto en Footer', async () => {

  // Montar el componente y pasar el usuario como una propiedad
  const wrapper = shallowMount(Index, {
  });
  
  

  await wrapper.vm.$nextTick();
  const componentText = wrapper.text();
  expect(componentText).toContain("Cendrassos");
});