import json
import os

CAMINHO = r"C:\Users\2DevSESI\Documents\LuanBasani\backend\Jorge\json\Python\dados.json"

def carregarDados():
    if not os.path.exists(CAMINHO):
        return []
    with open(CAMINHO, "r", encoding="utf-8") as arquivo:
        return json.load(arquivo)

def salvar_dados(dados):
    with open(CAMINHO, "w", encoding="utf-8") as arquivo:
        json.dump(dados, arquivo, indent=4, ensure_ascii=False)
    
def criar_pessoa(nome,idade):
    dados = carregarDados()

    #gera um id simples
    novo_id = 1
    if dados:
        novo_id = dados[-1]["id"] + 1
    pessoa = {
        "id": novo_id,
        "nome": nome,
        "idade": idade
    }

    dados.append(pessoa)
    salvar_dados(dados)
    print("Pessoa cadastrada com sucesso!")

def listar_pessoas():
    dados = carregarDados()

    if not dados:
        print("Nenhuma pessoa cadastrada.")
        return
    
    for pessoa in dados:
        print(f"ID: {pessoa['id']} | Nome: {pessoa['nome']} | Idade: {pessoa['idade']}  ")


def atualizar_pessoa(id, novo_nome, nova_Idade):
    dados = carregarDados()

    for pessoa in dados:
        if pessoa["id"] == id:
            pessoa["nome"] = novo_nome
            pessoa["idade"] = nova_Idade
            salvar_dados(dados)
            print("Pessoa atualizada com sucesso!")
            return
    print("ID não encontrada.")

def deletar_pessoa(id):
    dados = carregarDados()
    #cria nova lista sem o id informado
    dados = [pessoa for pessoa in dados if pessoa ["id"] != id]
    salvar_dados(dados)
    print("Pessoa deletada com sucesso!")

def main():
    while True:
        print("\nEscolha uma opção:")
        print("\n1 - Cadastrar Pessoa")
        print("2 - Listar Pessoas")
        print("3 - Atualizar Pessoa")
        print("4 - Deletar Pessoa")
        print("0 - Sair")

        opcao = input("Escolha: ")
        if opcao == "1":
            nome = input("Nome: ")
            idade = int(input("Idade: "))
            criar_pessoa(nome,idade)

        elif opcao == "2":
            listar_pessoas()

        elif opcao == "3":
            id = int(input("ID da pessoa a ser atualizada: "))
            novo_nome = input("Novo nome: ")
            nova_idade = int(input("Nova idade: "))
            atualizar_pessoa(id, novo_nome, nova_idade)

        elif opcao == "4":
            id = int(input("ID da pessoa a ser deletada: "))
            deletar_pessoa(id)

        elif opcao == "0":
            print("Saindo do programa...")
            break

        else:
            print("Opção inválida. Tente novamente.")

if __name__ == "__main__":
    main()