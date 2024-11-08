import React, { useEffect } from 'react';
import ReactDOM from 'react-dom';
import App from './App';
import { getCsrfCookie } from './api'; // Importa a função para pegar o CSRF token

const Root = () => {
  useEffect(() => {
    // Chama a função para pegar o CSRF token assim que a aplicação for carregada
    getCsrfCookie();
  }, []);

  return <App />;
};

ReactDOM.render(<Root />, document.getElementById('root'));
