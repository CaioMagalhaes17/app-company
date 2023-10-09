#  Documentação da API ao APP de orçamentos para concertos de celulares (Empresa)

>## Recursos autenticados 

>Enviar o access_token durante as requisições através do parâmetro header, juntamente com o prefixo 'Authorization: Bearer '.
Rotas Autenticados terão o seguinte icon :lock:

>##### headers
- Accept application/json
- content-type application/json

- ### API 1.0

Icones:
- :lock: Rotas Autenticadas 
- :house: Rotas que não são necessárias autenticação
      - [:house: `Logar com Token`](./docs/v1/Auth/generateToken.md)
      - [:house: `Logar com Usuário e Senha`](./docs/v1/Auth/generateTokenByUserCredentials.md)
      - [:house: `Deslogar`](./docs/v1/Auth/generateTokenByUserCredentials.md)
      - [:house: `Registrar`](./docs/v1/Auth/generateTokenByUserCredentials.md)
- :coffee: Orçamentos
      - [:lock: `Criar um orçamento`](./docs/v1/budget/register.md)
      - [:lock: `Editar um orçamento`](./docs/v1/budget/update.md)
      - [:lock: `Deletar um orçamento`](./docs/v1/budget/delete.md)
      - [:lock: `Listar um orçamento`](./docs/v1/problem/register.md)
      - [:lock: `Listar todos os orçamentos do usuário autenticado`](./docs/v1/problem/getAll.md)
- :coffee: Problemas
      - [:lock: `Listar problemas disponíveis para orçamentos`](./docs/v1/budget/acceptBudget.md)

  
