const http = require('http');

const hostname = '127.0.0.1';
const port = 3000;

//Função para manipular requisições
const requestHandler = (req, res) => {
    res.statusCode = 200;
    res.setHeader('Content-Type', 'application/json');

    //Definir a lógica da rota
    if (req.url === '/hello' && req.method === 'GET'){
        res.end(JSON.stringify({
            message: "Olá Mundo"
        }));
    }else{
        res.statusCode = 404;
        res.end(JSON.stringify({
            error: "Rota não encontrada"
        }));
    }
};

const server = http.createServer(requestHandler);

//Iniciando servidor
server.listen(port, hostname, () => {
    console.log(`Servidor rodando em http://${hostname}:${port}/`)
});
