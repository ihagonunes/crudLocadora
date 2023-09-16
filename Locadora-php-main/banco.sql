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
  ('Planeta dos Macacos', 12.99, 2, 'https://i.pinimg.com/originals/c3/75/04/c37504d59ef60f537ae76033a9af0f76.jpg', 'Astronauta viaja para o planeta Terra, mas encontra macacos que falam e agem socialmente'),
  ('O Senhor dos Anéis', 14.99, 3, 'https://img.elo7.com.br/product/original/269274A/poster-o-senhor-dos-aneis-a-sociedade-do-anel-lo04-90x60-cm-presente-geek.jpg', 'Best seller de J. R. R. Tolkien adaptado para um filme'),
  ('Harry Potter', 16.99, 4, 'https://http2.mlstatic.com/D_NQ_NP_672586-MLB27566127405_062018-O.webp', 'Um jovem descobre que é um bruxo e vai para uma escola de bruxos'),
  ('Star Wars', 15.99, 5, 'https://img.elo7.com.br/product/original/2C25D05/big-poster-filme-star-wars-o-despertar-da-forca-tam-90x60-cm-poster-star-wars.jpg', 'Jedi, Sith e luta entre o bem e o mal. Tudo pode ser encontrado na série de filmes de grande sucesso'),
  ('The Matrix', 13.99, 6, 'https://images-na.ssl-images-amazon.com/images/I/51EG732BV3L._AC_.jpg', 'Um hacker descobre que vive em uma simulação e é o salvador'),
  ('Inception', 14.99, 7, 'https://images-na.ssl-images-amazon.com/images/I/81p%2Bxe8cbnL._AC_SL1500_.jpg', 'Um invasor de sonhos ganha sua última missão. (Vencedor dos Oscars de Efeitos Visuais, Som, Edição de Som e Fotografia)');
