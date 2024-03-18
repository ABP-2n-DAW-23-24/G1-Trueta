// MyComponent.test.js
import { mount } from '@vue/test-utils';
import { describe, it, expect, vi } from 'vitest';
import ListUsers from '@/Components/ListUsers.vue';

// Importar la librería o componente que ejecuta el fetch
import { useFetch } from '@vueuse/core';

// Si es necesario, realiza mock a los composables o librerías usadas
vi.mock('@vueuse/core', () => ({
  useFetch: vi.fn(),
}));

describe('ListUsers', () => {
  it('should display data when fetched', async () => {
    // Configura el mock de useFetch() para que devuelva datos simulados
    useFetch.mockReturnValue({
      execute: vi.fn(() => Promise.resolve({ data: 'mocked data' })),
    });

    const wrapper = mount(ListUsers);

    // Espera a que se resuelva la lógica del componente
    await wrapper.vm.$nextTick();

    // Verifica que el texto de 'mocked data' esté presente en el componente
    expect(wrapper.text()).toContain('mocked data');
  });
});