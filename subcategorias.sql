SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `catalogos_subcategorias` (
  `id` int(11) NOT NULL,
  `imagem` varchar(250) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` varchar(250) NOT NULL,
  `valor` double NOT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `disponivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `catalogos_subcategorias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);


ALTER TABLE `catalogos_subcategorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

ALTER TABLE `catalogos_subcategorias`
  ADD CONSTRAINT `subcategorias_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`);
COMMIT;

