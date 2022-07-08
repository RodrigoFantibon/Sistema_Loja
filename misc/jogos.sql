-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Jun-2022 às 20:27
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `loja`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogos`
--

CREATE TABLE `jogos` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  `url` varchar(50) DEFAULT NULL,
  `dateCreated` datetime DEFAULT NULL,
  `dateUpdated` datetime DEFAULT NULL,
  `price` double DEFAULT NULL,
  `rating` enum('1','2','3','4','5') DEFAULT NULL,
  `sinopse` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `jogos`
--

INSERT INTO `jogos` (`id`, `name`, `categoria`, `url`, `dateCreated`, `dateUpdated`, `price`, `rating`, `sinopse`) VALUES
(1, 'Zelda Breath Of The Wild', 'GAMES DIVERSOS ORIGINAIS!', '../img/vitrine_zelda.png', '2022-06-18 14:34:17', '2022-06-18 14:34:17', 89.22, '3', 'Esqueça tudo que você sabe sobre os jogos da série The Legend of Zelda. Entre em um mundo de descobertas, exploração e aventura em The Legend of Zelda: Breath of the Wild, o novo jogo da famosa série que veio para romper barreiras. Viaje pelos vastos campos, florestas e montanhas enquanto descobre o que aconteceu com o reino de Hyrule nesta deslumbrante aventura a céu aberto. E agora no Nintendo Switch, a sua jornada tem mais liberdade do que nunca. Leve o seu console para qualquer lugar e viva aventuras na pele de Link da maneira que quiser.'),
(2, 'Metroid Dread', 'GAMES DIVERSOS ORIGINAIS!', '../img/vitrine_metroid.png', '2022-06-18 14:39:10', '2022-06-18 14:39:10', 67.78, '5', 'Junte-se à caçadora de recompensas Samus Aran enquanto ela tenta escapar de um mundo alienígena mortal atormentado por uma ameaça mecânica.Ao investigar uma transmissão misteriosa no planeta ZDR, Samus enfrenta um inimigo misterioso que a aprisiona neste mundo perigoso. O planeta remoto foi invadido por cruéis formas de vida alienígenas e robôs assassinos chamados E.M.M.I.Cace ou seja caçado enquanto abre caminho através de um labirinto de inimigos na aventura de deslocamento lateral mais intensa de Samus.'),
(3, 'Super Mario 3D World', 'GAMES DIVERSOS ORIGINAIS!', '../img/vitrine_mario3d.png', '2022-06-18 14:39:11', '2022-06-18 14:39:11', 98.75, '4', 'Salte e escale por dezenas de fases coloridas! Multiplique a diversão juntando-se ou competindo contra amigos localmente* ou online** para alcançar o objetivo de cada fase. Trabalhem juntos para explorar e descobrir itens colecionáveis ou competir pela coroa ganhando a maior pontuação, criando um frenesi amistoso! Mario (e seus amigos) podem usar uma variedade de itens power-up como o Super Bell, que concede habilidades de gato, como escalar e arranhar. Aproveite as vantagens extras para completar as fases e conquistar a coroa!'),
(4, 'Pokémon Legends Arceus', 'GAMES DIVERSOS ORIGINAIS!', '../img/vitrine_pokemonarceus.png', '2022-06-18 14:39:11', '2022-06-18 14:39:11', 199.88, '5', 'Prepare-se para uma nova grande aventura Pokémon em Pokémon™ Legends: Arceus, um jogo totalmente novo da Game Freak que combina ação e exploração com as raízes de RPG da série Pokémon. Embarque em missões de pesquisa na antiga região de Hisui. Explore extensões naturais para capturar Pokémon selvagens, aprendendo seu comportamento, aproximando-se sorrateiramente e jogando uma Poké Ball™ bem direcionada. Você também pode jogar a Poké Ball contendo seu Pokémon aliado perto de um Pokémon selvagem para entrar na batalha sem problemas. Viaje por terra, mar e céus nas costas de Pokémon para explorar cada canto da região de Hisui.'),
(5, 'Pokémon Sword', 'GAMES DIVERSOS ORIGINAIS!', '../img/vitrine_pokemonsword.png', '2022-06-18 14:39:11', '2022-06-18 14:39:11', 199.88, '1', 'Uma nova geração Pokémon está chegando para o console Nintendo Switch™. Comece a sua aventura como Treinador Pokémon escolhendo um desses três novos parceiros Pokémon: Grookey, Scorbunny ou Sobble. Em seguida, embarque em uma jornada pela nova região de Galar, onde você irá desafiar os encrenqueiros da Equipe Yell enquanto desvenda os mistérios por trás dos lendários Pokémon Zacian e Zamazenta! Explore a Área Wild, um vasto território onde o jogador pode controlar a câmera livremente. Junte-se a três outros jogadores localmente ou online no novo modo multijogador cooperativo Max Raid Battles*, no qual jogadores enfrentam Pokémon extremamente imponentes em tamanho e força, afetados pela transformação Dynamax.'),
(6, 'Animal Crossing: New Horizons', 'GAMES DIVERSOS ORIGINAIS!', '../img/vitrine_animalcrossing.jpg', '2022-06-18 14:39:11', '2022-06-18 14:39:11', 199.88, '3', 'Escape para uma ilha deserta e crie o seu próprio paraíso enquanto explora, cria e customiza em Animal Crossing: New Horizons. A sua ilha traz uma variedade incrível de recursos naturais que podem ser usados para criar de tudo, desde objetos para o seu conforto a ferramentas. Você pode caçar insetos ao amanhecer, decorar o seu paraíso durante o dia ou desfrutar do pôr do sol na praia enquanto pesca no oceano. A hora do dia e as estações do ano correspondem à realidade, então aproveite a oportunidade de conferir a sua ilha a cada dia para encontrar novas surpresas durante o ano todo.'),
(7, 'Mario Kart 8', 'GAMES DIVERSOS ORIGINAIS!', '../img/vitrine_mariokart.jpg', '2022-06-18 14:39:11', '2022-06-18 14:39:11', 77.88, '5', 'Acelere nesta versão definitiva do jogo Mario Kart 8 e jogue a qualquer hora, em qualquer lugar! Participe de corridas com seus amigos ou compita com eles em um modo de batalha revisado, em pistas de batalha que estão de volta, ou pistas completamente novas. Jogue com a comunicação local sem fio em multijogador para até quatro jogadores em 1080p ao jogar no modo TV. Todas as pistas da versão para o Wii U, incluindo conteúdo extra, estão de volta. Além disso, Inklings aparecem como novos personagens convidados, junto com favoritos que estão de volta, como Rei Bu, Quebra-ossos e Bowser Jr.!'),
(8, 'Yoshi', 'GAMES DIVERSOS ORIGINAIS!', '../img/vitrine_yoshi.jpg', '2022-06-18 14:39:11', '2022-06-18 14:39:11', 132.85, '4', 'Entre numa nova aventura do Yoshi em um mundo feito de objetos do dia a dia – como caixas e copos de papel! Jogando como o Yoshi, você saltará alto, engolirá inimigos e sairá à caça de tesouros para encontrar todos os diferentes itens colecionáveis. Por outro lado, as fases podem ser jogadas de trás para frente, abrindo novas perspectivas a serem exploradas e novas maneiras de se encontrar alguns itens que foram escondidos com mais cuidado!'),
(9, 'Hyrule Warriors', 'GAMES DIVERSOS ORIGINAIS!', '../img/vitrine_hyrule.png', '2022-06-18 14:39:11', '2022-06-18 14:39:11', 157.96, '2', 'Vivencie os conflitos que desolaram Hyrule. Aprenda mais sobre Zelda, os quatro campeões, o rei de Hyrule e mais em cenas dramáticas enquanto eles tentam salvar o reino da calamidade. O jogo Hyrule Warriors: Age of Calamity é a única maneira de ver em primeira mão o que aconteceu 100 anos atrás.Dos bárbaros Bokoblins aos enormes Lynels, monstros ameaçadores surgiram em massa. Além de Link e Zelda, jogue com personagens como os quatro campeões e a jovem Impa. Use suas habilidades distintas para abrir caminho entre centenas de inimigos e salvar Hyrule da calamidade eminente.'),
(10, 'Kirby', 'GAMES DIVERSOS ORIGINAIS!', '../img/vitrine_kirby.jpg', '2022-06-18 14:39:11', '2022-06-18 14:39:11', 45.58, '5', 'Embarque em uma aventura totalmente nova como a poderosa bolinha, Kirby. Explore livremente em fases 3D enquanto descobre um mundo misterioso com estruturas abandonadas de uma civilização passada - como um shopping center?! Copie as habilidades dos inimigos, como o novo Drill e Ranger, e use-as para atacar, explorar seus arredores e salvar os Waddle Dees sequestrados do feroz Beast Pack ao lado do misterioso Elfilin. Espero que esteja faminto(a) por uma aventura inesquecível!'),
(11, 'Bayonetta 2', 'GAMES DIVERSOS ORIGINAIS!', '../img/vitrine_bayonetta.jpg', '2022-06-18 14:39:11', '2022-06-18 14:39:11', 259.64, '3', 'Bayonetta está de volta e mais poderosa do que nunca. Empunhe armas fascinantes e execute golpes mortais, como o poderoso Umbran Climax, para derrotar anjos e demônios nesse empolgante jogo de ação. Você pode até se juntar a amigos em lutas cooperativas para dois jogadores online ou pela comunicação local sem fio (acessórios adicionais necessários no modo multijogador, vendidos separadamente). Bayonetta é uma bruxa destemida e avassaladora que usa armas incríveis como pistolas, martelos, lança-chamas e flechas envenenadas. Mas não apenas sua força nos encanta... Também o seu estilo! Bayonetta é mortal, mas elegante, com golpes como Witch Time, que diminui a velocidade do tempo, e o novo Umbran Climax, um ataque mágico especial que evoca demônios infernais para dizimar inimigos. O jogo Bayonetta™ 2 também conta com um novo modo cooperativo online para dois jogadores, onde você aposta halos em seu desempenho e trabalha com amigos para aumentar o seu atrevimento, causar destruição e juntar riquezas.'),
(12, 'Fire Emblem Warriors', 'GAMES DIVERSOS ORIGINAIS!', '../img/vitrine_emblem.jpg', '2022-06-18 14:39:11', '2022-06-18 14:39:11', 147.54, '2', 'Assuma o papel de Shez, enquanto conhece Edelgard, Dimitri, Claude e outros personagens de Fire Emblem: Three Houses e luta pelo futuro de Fóblan. Tenha um líder como aliado para construir e comandar um exército em batalhas estratégicas de 1 contra 1.000. A casa que escolher levará você a uma das três histórias emocionantes, cada uma com um final diferente. Cada personagem de Fire Emblem: Three Houses que você recrutar nessas jornadas tem um conjunto distinto de combos impressionantes e poderosos capazes de atravessar hordas de inimigos.');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `jogos`
--
ALTER TABLE `jogos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `jogos`
--
ALTER TABLE `jogos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
