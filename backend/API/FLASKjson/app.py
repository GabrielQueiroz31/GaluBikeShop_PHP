# Importa o flask para criar API
from flask import Flask, request, jsonify

# Importa o módulo json
import json

# Cria a aplicação Flask
app = Flask(__name__)

# Nome do arquivo JSON
ARQUIVO = "contatos.json"

# Função para ler os dados
def ler_dados():
    with open(ARQUIVO, "r", encoding="utf-8") as arquivo:
        dados = json.load(arquivo)
    return dados

# Função para salvar os dados
def salvar_dados(dados):
    with open(ARQUIVO, "w", encoding="utf-8") as arquivo:
        json.dump(dados, arquivo, ensure_ascii=False, indent=2)

# Rota para listar contatos (GET)
@app.route("/contatos/<grupo>", methods=["GET"])
def listar_contatos(grupo):
    dados = ler_dados()

    if grupo not in dados:
        return jsonify({"erro": "Grupo não encontrado"}), 404

    return jsonify(dados[grupo])

# Rota para adicionar contato (POST)
@app.route("/contatos/<grupo>", methods=["POST"])
def adicionar_contato(grupo):
    dados = ler_dados()

    if grupo not in dados:
        return jsonify({"erro": "Grupo não encontrado"}), 404

    corpo = request.get_json()

    if not corpo or "nome" not in corpo or "telefone" not in corpo:
        return jsonify({"erro": "Campos 'nome' e 'telefone' são obrigatórios"}), 400

    novo_contato = {
        "nome": corpo["nome"],
        "telefone": corpo["telefone"]
    }

    dados[grupo].append(novo_contato)
    salvar_dados(dados)

    return jsonify({
        "mensagem": "Contato adicionado com sucesso",
        "contato": novo_contato
    }), 201

# Rota para atualizar contato (PUT)
@app.route("/contatos/<grupo>/<int:indice>", methods=["PUT"])
def atualizar_contato(grupo, indice):
    dados = ler_dados()

    if grupo not in dados:
        return jsonify({"erro": "Grupo não encontrado"}), 404

    if indice < 0 or indice >= len(dados[grupo]):
        return jsonify({"erro": "Contato não encontrado"}), 404

    corpo = request.get_json()

    if not corpo or "nome" not in corpo or "telefone" not in corpo:
        return jsonify({"erro": "Campos 'nome' e 'telefone' são obrigatórios"}), 400

    dados[grupo][indice] = {
        "nome": corpo["nome"],
        "telefone": corpo["telefone"]
    }

    salvar_dados(dados)

    return jsonify({
        "mensagem": "Contato atualizado com sucesso",
        "contato": dados[grupo][indice]
    }), 200

# Rota para deletar contato (DELETE)
@app.route("/contatos/<grupo>/<int:indice>", methods=["DELETE"])
def deletar_contato(grupo, indice):
    dados = ler_dados()

    if grupo not in dados:
        return jsonify({"erro": "Grupo não encontrado"}), 404

    if indice < 0 or indice >= len(dados[grupo]):
        return jsonify({"erro": "Contato não encontrado"}), 404

    contato_removido = dados[grupo].pop(indice)
    salvar_dados(dados)

    return jsonify({
        "mensagem": "Contato excluído com sucesso",
        "contato": contato_removido
    }), 200

# Inicia o servidor
if __name__ == "__main__":
    print("API rodando em http://localhost:3000/contatos")
    app.run(host="0.0.0.0", port=3000, debug=True)