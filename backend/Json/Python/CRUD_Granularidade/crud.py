import json

# menu principal
def menu():
    print("\n--- Menu ---")
    print("1. Cadastrar Pessoa")
    print("2. Listar Pessoas")
    print("3. Atualizar Pessoa")
    print("4. Deletar Pessoa")
    print("0. Sair")

def escolher_grupo():
    # pergunta ao usuario o grupo que deseja retornar
    print("\nTipo de contato: ")
    print("1. Aluno")
    print("2. Professor")

    opcao = input("Escolha o grupo: ")
    if opcao == "1":
        return "alunos"
    elif opcao == "2":
        return "professores"
    else:
        print("Opção inválida!")
        return None
    
def ler_dados():
    try:
        with open("contatos.json", "r", encoding="utf-8") as arquivo:
            return json.load(arquivo)
    except FileNotFoundError:
        return {"alunos": [], "professores": []}
    
def salvar_dados(dados):
    with open("contatos.json", "w", encoding="utf-8") as arquivo:
        json.dump(dados, arquivo, indent=2, ensure_ascii=False)

def adicionar():
    grupo = escolher_grupo()
    
    if not grupo:
        return

    nome = input("Nome: ")
    telefone = input("Telefone: ")

    dados = ler_dados()
    dados[grupo].append({
        "nome": nome, 
        "telefone": telefone
    })
    salvar_dados(dados)
    print("Contato adicionado com sucesso!")

def listar():
    grupo = escolher_grupo()
    if not grupo:
        return
    
    dados = ler_dados()

    print(f"\nLista de {grupo.upper()}: ")

    for index, contato in enumerate(dados[grupo], start=1):
        print(f"{index}. {contato['nome']} - {contato['telefone']}")

def atualizar():
    grupo = escolher_grupo()
    if not grupo:
        return
    
    dados = ler_dados()

    try:
        index = int(input("Index do contato: ")) - 1

        if 0 <= index < len(dados[grupo]):
            nome = input("Novo nome: ")
            telefone = input("Novo telefone: ")
            
            dados[grupo][index] = {
                "nome": nome,
                "telefone": telefone
            }
            salvar_dados(dados)
            print("Contato atualizado com sucesso!")
        else:
            print("Index inválido!")
    except ValueError:
        print("Por favor, digite um número válido.")

def deletar():
    grupo = escolher_grupo()
    if not grupo:
        return
    
    dados = ler_dados()

    try:
        index = int(input("Index do contato: ")) - 1
        if 0 <= index < len(dados[grupo]):
            del dados[grupo][index]
            salvar_dados(dados)
            print("Contato deletado com sucesso!")
        else:
            print("Index inválido!")
    except ValueError:
        print("Por favor, digite um número válido.")

def main():
    while True:
        menu() 
        
        opcao = input("Escolha uma opção: ")
        if opcao == "1":
            adicionar()
        elif opcao == "2":
            listar()
        elif opcao == "3":
            atualizar()
        elif opcao == "4":
            deletar()
        elif opcao == "0":
            print("Saindo...")
            break
        else:
            print("Opção inválida!")

if __name__ == "__main__":
    main()