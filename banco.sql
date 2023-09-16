drop database if EXISTS locadora;
CREATE DATABASE IF NOT EXISTS locadora;

USE locadora;

DROP TABLE IF EXISTS filme;

CREATE TABLE filme (
  codigo INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(255),
  valor DECIMAL(10,2),
  quantidadeEstoque INT,
  descricao varchar(255),
  imagem VARCHAR(255)
);

drop database if EXISTS locadora;
CREATE DATABASE IF NOT EXISTS locadora;

USE locadora;

DROP TABLE IF EXISTS filme;

CREATE TABLE filme (
  codigo INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(255),
  valor DECIMAL(10,2),
  quantidadeEstoque INT,
  descricao varchar(255),
  imagem VARCHAR(255)
);

INSERT INTO filme (nome, valor, quantidadeEstoque, imagem, descricao)
VALUES
  ('Besouro Azul', 12.99, 10, 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcTLXZb6z_VGWUc5O-s7iMJ8QVWQNa3b6hp6HawTsbW8dOJ1RQxh', "O adolescente Jaime Reyes ganha superpoderes quando um misterioso escaravelho se prende à sua coluna e lhe fornece uma poderosa armadura alienígena azul."),
  ('Moana: um mar de aventuras', 14.99, 10, 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcQGT5Qbj1vt1y-S1-YgSpwEL2XVSgQ1iNvOeA26qzd2V0bs1tTQ', "Uma jovem parte em uma missão para salvar seu povo. Durante a jornada, Moana conhece o outrora poderoso semideus Maui, que a guia em sua busca para se tornar uma mestre em encontrar caminhos. Juntos, eles navegam pelo oceano em uma viagem incrível."),
  ('Coraline e o Mundo Secreto', 16.99, 5, 'https://uauposters.com.br/media/catalog/product/cache/1/thumbnail/800x930/9df78eab33525d08d6e5fb8d27136e95/2/8/288420220317-uau-posters-coraline-filmes-infantis-10_3.jpg', "Enquanto explora sua nova casa à noite, a pequena Coraline descobre uma porta secreta que contém um mundo parecido com o dela, porém melhor em muitas maneiras. Todos têm botões no lugar dos olhos, os pais são carinhosos e os sonhos de Coraline viram...");

INSERT INTO filme (nome, valor, quantidadeEstoque, imagem, descricao)
VALUES
  ('Star Wars: O Despertar da Força', 15.99, 5, 'https://img.elo7.com.br/product/original/2C25D05/big-poster-filme-star-wars-o-despertar-da-forca-tam-90x60-cm-poster-star-wars.jpg', "A queda de Darth Vader e do Império levou ao surgimento de uma nova força sombria: a Primeira Ordem. Eles procuram o jedi Luke Skywalker, desaparecido. A resistência tenta desesperadamente encontrá-lo antes para salvar a galáxia."),
  ('The Matrix', 13.99, 6, 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcQwLB63Bm8WaqqWPmYLi9_wEXXt47qq1UZBSzw05b9NrXlQyN-O', "O jovem programador Thomas Anderson é atormentado por estranhos pesadelos em que está sempre conectado por cabos a um imenso sistema de computadores do futuro. À medida que o sonho se repete, ele começa a desconfiar da realidade."),
  ('Inception', 14.99, 7, 'https://images-na.ssl-images-amazon.com/images/I/81p%2Bxe8cbnL._AC_SL1500_.jpg', "Dom Cobb é um ladrão com a rara habilidade de roubar segredos do inconsciente, obtidos durante o estado de sono.");

