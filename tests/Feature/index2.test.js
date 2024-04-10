import axios from 'axios';

const URL = 'https://trueta.ignorelist.com/medication-panel/get-medication';

test('Obtenir medicaments', async () => {
  try {
    const response = await axios.get(URL);

    expect(response.status).toBe(200);

    expect(response.data).toBeDefined();
    expect(Array.isArray(response.data)).toBe(true);
  } catch (error) {
    console.error(error);
  }
});


test('Comprovar si ID 8 és METRONIDAZOL', async () => {
  try {
    const response = await axios.get(URL);

    const medication = response.data.find(med => med.id === 8);

    expect(medication).toBeDefined();

    expect(medication.name).toBe('METRONIDAZOL');
  } catch (error) {
    console.error(error);
  }
});

