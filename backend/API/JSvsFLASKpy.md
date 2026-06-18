## Comparação: Express (JavaScript) × Flask (Python)

| Conceito           | Express            | Flask               |
|--------------------|--------------------|---------------------|
| Criar servidor     | express()          | Flask(__name__)     |
| JSON no body       | req.body           | request.json        |
| GET                | app.get()          | methods=["GET"]     |
| POST               | app.post()         | methods=["POST"]    |
| PUT                | app.put()          | methods=["PUT"]     |
| DELETE             | app.delete()       | methods=["DELETE"]  |
| Resposta           | res.json()         | jsonify()           |