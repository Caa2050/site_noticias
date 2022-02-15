-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Fev-2022 às 19:18
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `banco_noticia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL,
  `categorias` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `categorias`) VALUES
(1, 'Politica'),
(2, 'Educação'),
(3, 'Saúde'),
(4, 'Esportes'),
(8, 'Economia'),
(9, 'Lazer');

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

CREATE TABLE `noticias` (
  `idnoticia` int(11) NOT NULL,
  `nome` text NOT NULL,
  `categoriafk` int(11) NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `noticias`
--

INSERT INTO `noticias` (`idnoticia`, `nome`, `categoriafk`, `descricao`) VALUES
(2, 'Juiz autoriza o arrombamento do apartamento de Ronaldo Giovanelli', 4, 'A Justiça paulista autorizou o arrombamento com força policial de um apartamento duplex do ex-goleiro Ronaldo Giovanelli localizado no Tatuapé, na zona leste de São Paulo A autorização foi dada pelo juiz Cláudio Pereira França para garantir a entrega do imóvel, de 145,5 metros quadrados, ao vencedor de um leilão realizado no ano passado'),
(3, 'Mario Frias insinua que Paulo Gustavo não morreu de covid', 3, 'Mario Frias, secretário especial de Cultura do governo Bolsonaro, insinuou que Paulo Gustavo não morreu vítima do coronavírus. A declaração foi dada numa live que foi ao ar no Youtube na noite desta segunda (14).  Frias disse que telefonou para uma amiga do comediante quando ele ainda estava internado na UTI, no ano passado, e que ela teria dito ao secretário que o problema dele não era Covid há muito tempo. Ainda segundo ele, o presidente Jair Bolsonaro teria entrado em contato com a família do ator e se colocado à disposição para ajudar.'),
(4, 'Mercado de ações americanas', 8, 'Os mercados de ações dos EUA devem abrir em alta acentuada mais tarde, aliviados com as notícias da Rússia, mas permanecerão sensíveis ao fluxo contínuo de ganhos corporativos.  Às 08h56, os futuros da Nasdaq 100 avançam 2,21%, enquanto os da S&P 500 e da Dow Jones sobem 1,55% e 1,16%, respectivamente.  É um dia movimentado para balanços, com Marriott, Ecolab (NYSE:ECL) e Iqvia, todos com relatórios antecipados, juntamente com a Fidelity National Info (NYSE:FIS). Os resultados mais empolgantes, sem dúvida, vêm após o fechamento, com Airbnb (NASDAQ:ABNB) (SA:AIRB34), Devon Energy (NYSE:DVN), CF Industries (NYSE:CF) e Wynn Resorts (NASDAQ:WYNN) todos para dar sua opinião sobre temas desde os altos preços do petróleo até a recuperação nas indústrias de viagens e entretenimento.'),
(5, 'Auxílio emergencial em tem novo pagamento LIBERADO para 2023', 1, 'O auxílio emergencial tem um novo pagamento do auxílio emergencial confirmado para este ano de 2022. Embora o benefício tenha sido encerrado no ano passado, um novo lote foi disponibilizado a um novo grupo. Para saber se foi contemplado com a nova parcela consulte o site da Dataprev.');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Índices para tabela `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`idnoticia`),
  ADD KEY `categoriafk` (`categoriafk`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `noticias`
--
ALTER TABLE `noticias`
  MODIFY `idnoticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `noticias_ibfk_1` FOREIGN KEY (`categoriafk`) REFERENCES `categoria` (`idcategoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
