import axios from 'axios';
import React, { useState } from 'react';

function Login() {
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');
    const [message, setMessage] = useState('');

    const handleLogin = async (e) => {
        e.preventDefault();
        try {
            // Enviando a requisição de login
            const response = await axios.post('http://localhost:8000/api/login', {
                email,
                senha: password,  // Como o campo no banco de dados é 'senha', usamos 'senha' aqui
            }, { withCredentials: true });

            // Se o login for bem-sucedido, salve o token no localStorage
            localStorage.setItem('token', response.data.token);

            setMessage('Login bem-sucedido');
            console.log(response.data);
        } catch (error) {
            setMessage('Login falhou');
            console.error('Erro no login:', error);
        }
    };

    return (
        <div>
            <h2>Login</h2>
            <form onSubmit={handleLogin}>
                <input 
                    type="email" 
                    value={email} 
                    onChange={(e) => setEmail(e.target.value)} 
                    placeholder="Email" 
                />
                <input 
                    type="password" 
                    value={password} 
                    onChange={(e) => setPassword(e.target.value)} 
                    placeholder="Senha" 
                />
                <button type="submit">Login</button>
            </form>
            <p>{message}</p>
        </div>
    );
}

export default Login;
