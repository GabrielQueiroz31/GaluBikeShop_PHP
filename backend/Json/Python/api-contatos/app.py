#importa o flask para criar API
from flask import Flask, jsonify, request

#importar o módulo json
import json
import os

#cria a aplicação Flask

app = Flask(__name__)

#Chama o arquivo contato.json



ARQUIVO = os.path.join(os.path.dirname(__file__), "contato.json")

#Função ler os dados

def ler_dados():
    with open(ARQUIVO, "r", encoding="utf-8") as arquivo:
        return json.load(arquivo)

def salvar_dados(dados):
    #Recebe um dicionário e salva os dados no arquivo
    with open(ARQUIVO, "w", encoding="utf-8") as arquivo:
        json.dump(dados, arquivo, ensure_ascii=False, indent=2)

#Rota para listar contatos (GET)
@app.route("/contatos/<grupo>", methods=["GET"])
def listar_contatos(grupo):
    dados = ler_dados()
    #Verifica se o grupo existe
    if grupo not in dados:
        return jsonify({"erro": "Grupo não encontrado"}), 404
    return jsonify(dados[grupo])

#Rota para adicionar um contato (POST - Adiciona)
@app.route("/contatos/<grupo>", methods=["POST"])
def adicionar_contato(grupo):
    dados = ler_dados()
    if grupo not in dados:
        return jsonify({"erro": "Grupo não encontrado"}), 404

    #Obtém o JSON enviado no corpo da requisição
    corpo = request.json

    if not corpo or "nome" not in corpo or "telefone" not in corpo:
        return jsonify({"erro": "Dados inválidos"}), 400
    
    novo_contato = {
        "nome": corpo["nome"],
        "telefone": corpo["telefone"]
    }
    dados[grupo].append(novo_contato)
    salvar_dados(dados)

    return jsonify({
        "mensagem": "Contato adicionado com sucesso", 
        "contato":novo_contato
    }), 201

@app.route("/contatos/<grupo>/<int:indice>", methods=["PUT"])
def atualizar_contato(grupo, indice):
    dados = ler_dados()

    if grupo not in dados:
        return jsonify({"erro": "Grupo não encontrado"}), 404

    #Verifica se o índice existe
    if indice < 0 or indice >= len(dados[grupo]):
        return jsonify({"erro": "Índice inválido"}), 404
    
    corpo = request.json

    if not corpo or "nome" not in corpo or "telefone" not in corpo:
        return jsonify({"erro": "Dados inválidos"}), 400
    
    dados[grupo][indice] = {
        "nome": corpo["nome"],
        "telefone": corpo["telefone"]
    
    }

    salvar_dados(dados)
    return jsonify({
        "mensagem": "Contato atualizado com sucesso",  # era "adicionado"
        "contato": dados[grupo][indice]
    }), 200  # era 201 (Created), PUT deve retornar 200

@app.route("/contatos/<grupo>/<int:indice>", methods=["DELETE"])

def deletar_contato(grupo, indice):
    dados = ler_dados()

    if grupo not in dados:
        return jsonify({"erro": "Grupo não encontrado"}), 404

    if indice < 0 or indice >= len(dados[grupo]):
        return jsonify({"erro": "Índice inválido"}), 404

    contato_removido = dados[grupo].pop(indice)  
    salvar_dados(dados)
    return jsonify({"mensagem": "Contato removido", "contato": contato_removido}), 200  

if __name__ == "__main__":
    print("API Rodando em http://localhost:3000/contatos")
    app.run(host="0.0.0.0", port=3000, debug=True)

