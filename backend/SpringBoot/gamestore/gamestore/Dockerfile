## Estágio de Compilação
## Usa uma imagem do Linux para compilar o projeto
FROM ubuntu:latest AS build

## instalar o JAVA 21
RUN apt-get update
RUN apt-get install -y openjdk-21-jdk

## instalar o maven
RUN apt-get install -y maven

## COPY do projeto para dentro do container
COPY . .

## compilar o projeto com o maven
RUN mvn clean install -DskipTests

## Execução do Projeto
FROM eclipse-temurin:21-jdk-jammy

# Expor a porta 8080
EXPOSE 8080

## Copiar o arquivo JAR da cmpilação para o container de Execução
COPY --from=build /target/gamestore-0.0.1-SNAPSHOT.jar app.jar

## Definir o comando de inicialização do container
ENTRYPOINT ["java", "-jar", "app.jar"]