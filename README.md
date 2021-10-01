# Teste JN2  

API desenvolvida com Laravel + Docker.  
  
Para rodar o projeto pela primeira vez, execute `docker-compose up -d --build`.  

Após execucação do comando acima, o projeto pode ser visualizado rodando em `http://localhost:8088`  

# Consulta dos Endpoints  
  
- `POST` `http://localhost:8088/api/cliente`
- `GET` `http://localhost:8088/api/cliente/{id}`
- `DELETE` `http://localhost:8088/api/cliente/{id}`
- `PUT` `http://localhost:8088/api/cliente/{id}`
- `GET` `http://localhost:8088/api/consulta/final-placa/{number}`

# Modelo de json pra inserção e edição de um cliente

```json
{
    "name" : "Fulano",
    "phone": "123456789",
    "cpf": "111.222.333-55",
    "license": "III3333"
}
```

Obs: Não requisições em que se utiliza o json, não esquece de no HEADERS colocar `Accept` o valor `application/json`.