# Teste de Desenvolvimento - Noweb

Imagine o seguinte cenário:
Temos uma site de eventos onde o dono(que chamarei de cliente), através do painel de controle protegido por senha, poderá inserir, editar, visualizar e excluir os eventos. O visitante por sua vez visualizará os eventos que estão ativos e que ainda não ocorreram.

- O cliente deverá ter um painel simples, mas protegido por usuário e senha;

- O cliente, no painel de controle, poderá visualizar todos os eventos, cadastrar novos, editá-los ou exclui-los.

- Quando o cliente for inserir um evento ele deverá preencher:
Titulo, descrição, data/horário, imagem e Status(publicado/rascunho)

O teste deverá então possuir os seguintes elementos:
- Página de login para o painel do cliente;
- Página listando todos os eventos ordenados por data, e com opção de exclusão e edição de cada evento;
- Página de cadastro de evento;
- Página de edição de evento;
- Página index do site exibindo, para o visitante, todos os eventos que ainda não ocorreram e ordenados por data.

Obs. Utilizar PHP e MySQL e nos enviar além dos arquivos php o arquivo sql. Todo conhecimento que tiver e achar útil colocar no sistema, será avaliado.

Um diferencial seria desenvolver no Framework CodeIgniter.
