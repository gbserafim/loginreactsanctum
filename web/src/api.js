import axios from 'axios';

// Definindo a URL base da API
axios.defaults.baseURL = 'http://localhost:8000'; // Substitua pela URL do seu backend

// Função para obter o CSRF token
export const getCsrfCookie = async () => {
  try {
    await axios.get('/sanctum/csrf-cookie');
  } catch (error) {
    console.error('Erro ao obter o CSRF cookie:', error);
  }
};

// Função de login
export const loginUser = async (email, password) => {
  try {
    const response = await axios.post('/api/login', {
      email,
      password,
    });
    return response.data; // Retorna o token ou mensagem
  } catch (error) {
    console.error('Erro no login:', error);
    throw error; // Propaga o erro
  }
};

export default axios;
