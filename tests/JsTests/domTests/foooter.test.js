import { describe, it, expect, vi } from 'vitest';
import axios from 'axios';
import { shallowMount } from '@vue/test-utils';
import Index from '@/Components/Footer.vue';




it('El componente contiene un texto en Footer', async () => {

  // Montar el componente y pasar el usuario como una propiedad
  const wrapper = shallowMount(Index, {
  });
  
  

  await wrapper.vm.$nextTick();
  const componentText = wrapper.text();
  expect(componentText).toContain("Cendrassos");
});