Site baseado no Pinterest

Feito com HTML5, CSS3, Bootstrap, JavaScript e PHP.

Utilizado MySQL Workbench 8.0.18 para o Banco de Dados.

Site com Login de Usuario e Cadastro de Usuario (com validação de dados), Recuperação de Senha por e-mail que será enviado uma senha aleatória e validando no banco de dados(atualizando ela) para assim efetuar o login. Não consegue abrir nenhuma página sem estar logado, e também nem recuperar a senha se não tiver um e-mail válido(e-mail de um usuário cadastrado).

Na página inicial onde se tem acesso as imagens cadastradas no banco de dados. Permite o usuario acessar o perfil onde se tem as seguintes opções;

- Usuarios Cadastrados = Permite vizualisar os usuarios cadastrados, dando a opção de alterar e excluir o usuario.

- Cadastrar Imagem = Consegue cadastrar imagem na página inicial, inserindo ela em um input juntamente com um comentário que irá aparecer na pagina inicial. Onde só pode inserir imagens png e jpg, com um tamanho limite para upload.

- Imagens Cadastradas = Mostra uma lista com as imagens cadastradas no site e no fim dessa lista mostra uma mensagem com a quantidade de imagens cadastradas no total. 

- Sair = Faz logoff(sai do usuario atual) da página e retorna a página de login.

- Usuario = Mostra o nome do login que foi logado.

Nas imagens cadastradas, estão divididas em várias divs automaticamente por PHP e CSS, com tamanhos diferentes das divs de acordo com o tamanho da imagem. Formando 4 colunas no total e ficando em 2 colunas em uma tela menor (tablet, celular ou notebook). Mostrando o usuario que postou a imagem juntamente com o comentário postado.
