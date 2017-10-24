-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 24 Octobre 2017 à 21:57
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `quiz_test_php`
--

-- --------------------------------------------------------

--
-- Structure de la table `options`
--

CREATE TABLE `options` (
  `id_option` int(3) NOT NULL,
  `libele` varchar(256) DEFAULT NULL,
  `question` int(8) DEFAULT NULL,
  `next_question` int(11) DEFAULT NULL,
  `weight` int(3) DEFAULT NULL,
  `point` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `options`
--

INSERT INTO `options` (`id_option`, `libele`, `question`, `next_question`, `weight`, `point`) VALUES
(1, 'Acheter un grattoir à vitre chez un garagiste', 1, 2, 1, 0),
(2, 'Acheter une boite d\'allumette dans un tabac', 1, 2, 2, 0),
(3, 'Acheter un jeu à gratter dans une épicerie', 1, 2, 3, 1),
(4, 'Il n\'a pas apprécié son repas', 2, 3, NULL, 0),
(5, 'Il a détesté son repas', 2, 3, NULL, 0),
(6, 'Ça dépend, si il le dit en souriant il a apprécié, sinon il a détesté', 2, 3, NULL, 1),
(7, 'Elle est bien polie mais pourquoi me souhaiter la bienvenue alors que je quitte le magasin ?', 3, 4, NULL, 0),
(8, 'Elle se fout de ma gueule, non?', 3, 4, NULL, 0),
(9, 'Ok, tout va bien et je lui réponds « Merci, bonne journée »', 3, 4, NULL, 1),
(10, 'Non merci, c\'est un peu tôt pour l\'apéro !', 4, 5, NULL, 0),
(11, 'Ok, je prendrai bien un GET27', 4, 5, NULL, 0),
(12, 'Ok, je prendrai bien un Pepsy', 4, 5, NULL, 1),
(13, 'Heu, en plus d\'être alcooliques, ils sont complètement obsédés dans cette boite !', 5, 6, NULL, 0),
(14, 'Sympas, à tout à l\'heure alors.', 5, 6, NULL, 1),
(15, 'Où est la sortie ?!!', 5, 6, NULL, 0),
(16, 'Votre interlocuteur souhaite vous offrir à boire', 6, 7, NULL, 0),
(17, 'Votre interlocuteur souhaite vous raccompagner chez vous', 6, 7, NULL, 1),
(18, 'Votre interlocuteur souhaite vous présenter à des amis', 6, 7, NULL, 0),
(19, 'Votre interlocuteur souhaite vous emmener au cinémas', 6, 7, NULL, 0),
(20, 'Qu\'il est mort de froid', 7, 8, NULL, 0),
(21, 'Qu\'il est sous l\'emprise de drogue', 7, 8, NULL, 1),
(22, 'Qu\'il est très fatigué', 7, 8, NULL, 0),
(23, 'Qu\'il est tétanisé', 7, 8, NULL, 0),
(24, 'Qu\'elle est enceinte', 8, 9, NULL, 0),
(25, 'Qu\'elle est en colère', 8, 9, NULL, 1),
(26, 'Qu\'elle est malade', 8, 9, NULL, 0),
(27, 'Qu\'elle est en détresse ', 8, 9, NULL, 0),
(28, 'Vous avez encore la trace de l\'oreiller sur la joue', 9, 10, NULL, 0),
(29, 'Que vous portez votre chemise à l\'envers', 9, 10, NULL, 0),
(30, 'Que vous avez mal dormi la nuit dernière et que ça se voit', 9, 10, NULL, 1),
(31, 'Que vous portez les mêmes vêtements que la veille', 9, 10, NULL, 0),
(32, 'Ok, c\'est un pays de fous, je cours à l\'aéroport !', 10, NULL, NULL, 0),
(33, 'Oh ? Ok, je pense qu\'on parle d\'un déguisement pour Halloween.', 10, NULL, NULL, 0),
(34, 'Pas de problèmes, j\'en magasine à toutes les fins de semaines des camisoles !', 10, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE `questions` (
  `id_question` int(3) NOT NULL,
  `libele` varchar(256) DEFAULT NULL,
  `question_type` varchar(16) NOT NULL DEFAULT 'radiobutton',
  `feedback` varchar(512) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `questions`
--

INSERT INTO `questions` (`id_question`, `libele`, `question_type`, `feedback`) VALUES
(1, 'Si on vous demande d\'aller <br/><span class="color-white">« acheter un gratteux au dépanneur »</span><br/>vous comprenez que vous devez :', 'multichoise', 'Et oui, un gratteux est un jeu à gratter (ou une personne radine dans certains cas). Un dépanneur est une épicerie de quartier.'),
(2, 'Si à la fin d\'un repas, un convive s\'écrit « c\'était écœurant », vous comprenez que :', 'multichoise', 'Le mot écœurant peut effectivement décrire quelque chose de fabuleux, comme quelque chose de dégoûtant. C\'est le contexte et l\'intonation qui vous donnera des indices sur le sens de la phrase.'),
(3, 'Après avoir payé, la caissière vous dit « bienvenue et bonjour », vous vous dites :', 'multichoise', 'Et oui... Au Québec, bienvenue est directement calqué sur l\'anglais "you\'re welcome" et signifie "de rien". <br/>Tandis que "bonjour" se souhaite à la fin d\'un conversation dans le sens de "bonne journée".'),
(4, 'Si lors de votre premier entretien d\'embauche a 9:00 du matin on vous propose « une liqueur ? », vous répondez :', 'multichoise', 'Effectivement, le mot "liqueur" est utilisé au Québec comme synonyme de boisson gazeuse.'),
(5, 'Lors de votre premier jour de travail, si un ou une collègue vous dis : « Hey, t\'as l\'air bien hot, mais j\'ai le feu au cul, mieux vaut qu\'on se reparle tout à l\'heure ». Vous vous dites :', 'multichoise', 'Il n\'y a pas matière à s\'offusquer ici, votre interlocuteur est simplement sympathique :<br/>- Avoir l\'air bien hot : sembler agréable ou compétent.<br/>- Avoir le feu au cul : au Québec, c\'est être très occupé.'),
(6, 'Un québécois vous dit "Embarque, j\'te paie un lift", cela signifie que :', 'multichoise', 'Au Québec, on entend souvent l\'expression "payer un lift" qui signifie ramener quelqu\'un, généralement en voiture.'),
(7, 'Un québécois vous dit « je suis complètement gelé », cela signifie :', 'multichoise', 'Malgré les températures glaciales du Québec, être gelé signifie être sous l\'emprise de la drogue.'),
(8, 'Une québécoise vous dit qu\'elle a « une montée de lait », cela signifie :', 'multichoise', 'Au Québec, les hommes aussi peuvent avoir des montées de lait : il s\'agit d\'une expression pour exprimer la colère.'),
(9, 'Si quelqu\'un vous demande si vous avez « passé la nuit sur la corde à linge», cela signifie que :', 'multichoise', 'Avoir passé la nuit sur la corde à linge signifie « avoir passé une mauvaise nuit, avoir mal ou peu dormi ». On demande à quelqu’un s’il a passé la nuit sur la corde à linge pour dire qu’il a les traits tirés, qu’il ne semble pas dans son assiette.'),
(10, 'Si une amie vous invite chez lui pour essayer une camisole, vous vous dites :', 'multichoise', 'Ça peut surprendre, mais au Québec c\'est le mot le plus commun pour parler d\'un tee-shirt!');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id_option`),
  ADD KEY `question` (`question`);

--
-- Index pour la table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id_question`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `options`
--
ALTER TABLE `options`
  MODIFY `id_option` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT pour la table `questions`
--
ALTER TABLE `questions`
  MODIFY `id_question` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
