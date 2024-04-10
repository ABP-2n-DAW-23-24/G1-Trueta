import { describe, it, expect, vi } from 'vitest';
import axios from 'axios';
import { shallowMount } from '@vue/test-utils';
import Logo from '@/Components/Logo.vue';



describe('fetchQuestions', () => {
  

  it('El Logo contiene un elemento img', async () => {
    const wrapper = shallowMount(Logo);
    await wrapper.vm.$nextTick();
    const adjacentImage = wrapper.html("img");
    expect(adjacentImage).toBeDefined();
  });
});