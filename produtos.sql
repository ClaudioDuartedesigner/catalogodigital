
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `catalogos_produtos` (
  `id` int(11) NOT NULL,
  `imagem` varchar(250) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` varchar(250) NOT NULL,
  `local` varchar(255) NOT NULL,
  `id_subcategoria` int(11) NOT NULL,
  `disponivel` int(11) NOT NULL,
  `whatsapp` varchar(255) NOT NULL,
  `link_catalogo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_subcategoria` (`id_subcategoria`);


ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

ALTER TABLE `produtos`
  ADD CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`id_subcategoria`) REFERENCES `subcategorias` (`id`);
COMMIT;
