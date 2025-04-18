-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2025 at 04:05 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cookie_rookie(4)`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cid` int(11) NOT NULL,
  `cat_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `cat_name`) VALUES
(4, 'Gujarati'),
(7, 'South-Indian'),
(8, 'Punjabi'),
(9, 'Chinese');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `rid` int(11) NOT NULL,
  `uemail` varchar(30) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fid` int(11) NOT NULL,
  `uemail` varchar(30) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `feedback` text NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fid`, `uemail`, `uname`, `feedback`, `date_time`) VALUES
(14, 'parthp582000@gmail.com', 'Parth Patel', 'Nice Work...', '2019-04-11 01:45:23'),
(15, 'patelpreet612@gmail.com', 'Preet Patel', 'Very Good...', '2019-04-11 02:26:52'),
(16, 'aniketkumarsingh@gmail.com', 'ANIKET', 'aldijf', '2025-04-18 16:07:39'),
(17, 'aniket70045@gmail.com', 'ANIKET', 'adjk', '2025-04-18 16:16:40');

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `rid` int(11) NOT NULL,
  `rname` varchar(30) NOT NULL,
  `category` varchar(30) NOT NULL,
  `uemail` varchar(30) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `ingredients` text NOT NULL,
  `recipe` text NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `description` varchar(500) NOT NULL,
  `image` varchar(30) NOT NULL,
  `video` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`rid`, `rname`, `category`, `uemail`, `date`, `ingredients`, `recipe`, `rating`, `description`, `image`, `video`) VALUES
(40, 'Khaman-Dhokla', 'Gujarati', 'pyz@cookieroockie.com', '2019-04-10 23:49:43', '2 cups Gram flour (besan), \r\n1 cup Curd (Dahi),beaten Salt to taste,\r\n1/2 teaspoon Turmeric powder (Haldi),\r\n1/2 teaspoon Green chilli paste\r\n1/2 teaspoon Ginger	, paste\r\n2 teaspoons Cooking oil\r\n1 teaspoon Lemon juice\r\n5 Curry leaves\r\n1 teaspoon Baking soda\r\n', '     1.)	To begin preparing the Khaman Dhokla, 	take gram flour in a bowl, add yogurt, 		lemon juice, 1 teaspoon oil and approximately 1/2 cup of warm water and mix well to avoid lumps. Add salt and mix again.\r\n2.) Leave it aside for 1/2 hour, and then add 		turmeric powder and green chilli-ginger 			paste to the batter.\r\n 3.) Put a stand in a big steamer, add water, 		grease a thali and put inside it, cover it 			and let it steam for a while.\r\n4.)Cover the steamer with the lid and steam 		for ten minutes. \r\n 5.)When the khaman dhokla are a little cool invert it in to a plate and cut into squares.\r\n', 0, 'Khaman-Dhokla is the Famous Gujarati breakfast,can be eaten for breakfast,as a side dish, or as a snack.', '40.jpg', NULL),
(41, 'Methi Thepla ', 'Gujarati', 'pyz@cookieroockie.com', '2019-04-10 23:57:11', '2 cups Whole Wheat Flour\r\n1 teaspoon Turmeric powder (Haldi)\r\n1 teaspoon Red chilli powder\r\n1 teaspoon Cumin powder (Jeera)\r\n1/2 teaspoon Asafoetida (hing)\r\n1/2 cup Methi Leaves,finely chopped\r\n1 Green Chilli,finely chopped\r\nCooking oil	, for cooking the thepla\r\nSalt to taste\r\n', ' 1.)In a large bowl combine all the dry ingredients - whole wheat flour, cumin seeds, turmeric powder, chilli powder,asafoetida powder, fenugreek leaves and mix well.\r\n2.) Add the yogurt to the flour mixture and knead into a firm smooth dough adding little water only if required. Finally add the two tablespoons of oil to coat the dough and knead until it is firm and 	smooth.\r\n 3.)	Divide the thepla dough into equal portions.\r\n 4.)	Dust the thepla dough with flour and roll 		them out into thin circles to approximately 6 inches in diameter.\r\n5.)Heat a skillet on highheat,place the 			rolled out dough on the skillet. After a few seconds you will notice small air pockets popping out. At this point flip the methi thepla.\r\n6.)Remove from heat and place on a flat plate.\r\n', 0, 'Methi Thepla is a flat bread and is a popular gujarati snack', '41.jpg', NULL),
(42, 'Rawa Upma', 'South-Indian', 'pyz@cookieroockie.com', '2019-04-11 00:04:25', '250 Gram Semolina\r\n650 Ml Water\r\n75 Gram Ghee\r\n5 Gram Mustard seeds\r\n2 Gram Black gram dal\r\n2 Gram Bengal gram dal\r\n100 Gram Onions\r\n5 Gram Green chillies\r\n25 Gram Cashew nuts\r\n2 Gram Curry leaves salt', '1. Boil water.\r\n2. Slice onions and cut the chillies lengthwise.\r\n3. Heat a deep pan with ghee. Add mustard, when crackling add the dals and sautÃ© until golden.\r\n4. Add onions, curry leaves, cashew nuts and green chillies. When the onions are translucent add semolina and sautÃ©.\r\n5. Add the boiling water and stir rapidly with the salt. When the moisture is absorbed, the upma is cooked.\r\n6. Mix well and garnish with grated coconut and coriander leaves.', 0, 'A delicious south Indian breakfast dish made with semolina, vegetables and topped with coconut.', '42.jpg', NULL),
(43, 'Medu Vada', 'South-Indian', 'pyz@cookieroockie.com', '2019-04-11 00:08:38', '     1 cup split husked black gram (dhuli urad), soaked for 4-6 hours\r\n    1 tsp salt\r\n    1/4 tsp asafoetida\r\n    1/4 tsp powdered black pepper\r\n    1 Tbsp chopped coriander leaves\r\n    1 tsp finely chopped ginger\r\n    1/2 tsp finely chopped green chillies\r\n    Oil for frying', '    1. Drain the daal and grind to a smooth paste.\r\n    2. Add salt, asafoetida and the black pepper, and beat well to make it light and fluffy.\r\n    3. Mix in coriander leaves, ginger and the green chillies.\r\n    4. Heat oil till a drop of batter dropped in comes up at once.\r\n    5. Shape the daal mixture into flat rounds, make a hole in the center and fry, first over high heat, then over lowered heat till brown and cooked through.\r\n    6. Lift the vadas out of oil and drain on absorbent paper and serve.', 0, 'Crispy and sinful, this urad dal based snack.Spruce it up with some coconut chutney and serve piping hot.', '43.jpg', NULL),
(44, 'Uttapam', 'South-Indian', 'pyz@cookieroockie.com', '2019-04-11 00:12:13', '    360 Gram Rice (parboiled)\r\n    90 Gram Bengal Gram (dhuli urad) (split and husked)\r\n    1/2 tsp Fenugreek seeds\r\n    2 tsp Salt\r\n    Iron griddle or tawa\r\n    To smear the pan Oil ', '1.\r\nSoak rice, daal and methi in water for 5-6 hours.\r\n2.\r\nGrind fine, add salt and enough water to make a dropping consistency and leave to ferment 5-6 hours.\r\n3.\r\nHeat tawa, and brush oil over it. When really hot, splash a little water over it, and pour about 1 cup of batter on to it.\r\n4.\r\nIt will spread a little. When the edges start browning a bit, pour a trail of oil around it.\r\n5.\r\nTurn it over and let it brown on the other side too.', 0, 'A traditional delicacy from down South which literally means \'poured appam\' in Tamil. ', '44.jpg', NULL),
(45, 'Patra', 'Gujarati', 'pyz@cookieroockie.com', '2019-04-11 00:14:24', '150 Gram Gram flour\r\n100 Gram Tamarind pulp\r\n20 Gram Chilli powder\r\n5 Gram Turmeric powder\r\n2 Gram Asafoetida\r\n2 Gram Cumin seeds, roasted\r\n20 Gram Sugar\r\n20 Ml Oil\r\nTo taste Salt', '1.\r\nChop the coriander leaves.\r\n2.\r\nGrate the coconut.\r\n3.\r\nCut off the thick veins and wash the colacasia leaves.\r\n4.\r\nMix the listed ingredients and make a thick batter.\r\n5.\r\nPlace a colacasia leaf on the table and spread a thin layer of the batter on top, place another leaf on top, repeat applying the batter. Fold in the sides of the leaf, then roll lengthwise into a tight roll.', 0, 'A thick gram flour and tamarind batter spread on arbi leaves, rolled, steamed.', '45.jpg', NULL),
(48, 'Baby Corn Manchurian Dry ', 'chinese', 'pyz@cookieroockie.com', '2019-04-11 00:33:00', '    200gm Baby Corns\r\n    1/4 Cup Maida (Plain Flour)\r\n    2 Tablespoons Corn Flour\r\n    1 Teaspoon Ginger-Garlic paste\r\n    1/2 Teaspoon Soy Sauce\r\n    1/2 Teaspoon Black Pepper Powder, or to taste\r\n    1/2 Teaspoon Salt, or to taste\r\n    1/2 Cup Water\r\n    Oil for Frying', 'Wash and rinse the baby corn and cut them into 2 pieces.\r\n\r\nIn a large bowl, mix Maida, Corn Flour, Ginger-Garlic paste, Soy Sauce, Black Pepper Powder and Salt along with some water to make a thick batter of coating consistency.\r\n\r\nAdd the baby corn in the batter and coat them completely.\r\n\r\nDeep fry the baby corn in hot oil till they become crispy and golden brown.\r\n\r\nTo make the sauce, heat oil in a pan or wok.\r\n\r\nAdd finely chopped onions and spring onions and fry till they turn translucent.\r\n\r\nNow add the Soy Sauce, Vinegar, Red Chilli Sauce and Tomato Ketchup.\r\ndd the fried Baby Corn to the sauce and toss to coat them completely.\r\n\r\nSeason the Baby Corn with Salt and Pepper. Mix well and cook for a minute.\r\n\r\nBaby Corn Manchurian is ready. Garnish with Spring Onion Greens and serve it hot.\r\n\r\nAlso see more recipes like Dry Veg Manchurian, Gobi Manchurian (Cauliflower Manchurian), Idli Manchurian and Veg Spring Rolls.', 0, 'Baby Corn Manchurian is a very popular vegetarian dish from Indo-Chinese cuisine which is made from deep fried Baby Corn dumplings tossed in Chinese sauces.', '48.jpg', NULL),
(49, 'Veg Hakka Noodles', 'chinese', 'pyz@cookieroockie.com', '2019-04-11 00:38:50', ' Pack (300 gm) of Hakka Noodles\r\n1/2 Cup Onion, thinly sliced\r\n1/2 Cup Colored Capsicum (Bell Pepper), thinly sliced\r\n1/2 Cup Cabbage, shredded\r\n1/2 Cup Carrots, shredded\r\n3-4 Stems Spring Onions, chopped\r\n3-4 Cloves of Garlic, grated\r\n1 Green Chilli, finely chopped\r\n2 Teaspoons Soy Sauce\r\n1 Teaspoon Vinegar\r\n1 Teaspoon Green Chilli Sauce\r\n1 Teaspoon Red Chilli Sauce\r\n1/2 Teaspoon Salt, or to taste\r\n1/2 Teaspoon Black Pepper Powder\r\n1 Tablespoon Oil', 'Boil 2 cups of water in a vessel. Add 1 teaspoon Oil in the water which will prevent the noodles from sticking to each other. Also add a pinch of Salt so that it gets absorbed in the noodles while cooking. Add the noodles to the water and cook them according to the instructions on the pack till they are tender.\r\nWhen the noodles are cooked, drain the hot water and place them in a colander. Lightly hand toss them to separate the noodle strands and run the noodles under cold water to stop the cooking process, so the noodles do not become mushy.\r\nYou can prepare the gravy while the noodles are cooking. Heat 2 tablespoons of oil in a wok (kadhai). Add grated Garlic & finely chopped Green Chillies and fry them.\r\nThen add thinly sliced Onions and colored Bell Peppers (Capsicum).\r\nAlso add shredded Cabbage and Carrots along with chopped Spring Onion whites.\r\nToss the vegetables lightly for a few minutes, stir frying them on high heat till they are cooked but still crunchy. Do not cook overcook the vegetables.\r\nAdd Soy Sauce, Vinegar, Green Chilli Sauce and Red Chilli Sauce. Also add Black Pepper Powder and Salt to taste.\r\nToss lightly to mix the sauces with the vegetables.\r\nAdd boiled noodles to the vegetables and toss to coat the noodles.\r\nAdd boiled noodles to the vegetables and toss to coat the noodles.\r\nFinally add some finely chopped Spring Onion Greens for garnish.\r\nveg Hakka Noodles are ready. They can be served as a standalone meal or with a side dish like Veg Manchurian or Gobi Manchurian.', 0, 'Veg Hakka Noodles is an Indo-Chinese preparation that is made by tossing boiled noodles and stir fried vegetables in Chinese sauces.', '49.jpg', NULL),
(50, 'Veg Manchurian ', 'chinese', 'pyz@cookieroockie.com', '2019-04-11 00:51:42', '    1 Cup Shredded Cabbage\r\n    1/2 Cup Shredded or Grated Carrot\r\n    1/4 Cup Capsicum, finely chopped\r\n    1/2 Cup Onion, finely chopped\r\n    1/4 Cup Spring Onions, finely chopped\r\n    1/2 Tablespoon Ginger-Garlic Paste\r\n    2 Tablespoon Cornstarch or Cornflour\r\n    1/4 Cup All purpose Flour (Maida)\r\n    1 Teaspoon Salt, or to taste\r\n    1/2 Teaspoon Black Pepper\r\n    1 Teaspoon Soy Sauce\r\n    Oil for Frying', '\r\n    Boil /steam finely chopped minced vegetables then strain the excess water (i.e., veg stock) and keep aside.\r\n    Then bind by adding salt, ajinomoto, chopped green chilies, pepper powder, ginger, soya sauce, chili paste, spring onion, boiled rice, corn flour.\r\n    Later, make small lumps with it in the size of a ping-pong ball. Roll in corn flour and deep fry in hot oil.\r\n    Add corn flour, pepper powder, chopped garlic, ginger, a pinch of salt, water accordingly to make a fine batter.\r\n    Now, dip the cauliflower florets and deep fry in hot oil. Keep aside.\r\n\r\nFor the preparation of Sauce:\r\n\r\n    Make a paste of corn flour with water.\r\n    Add cumin seeds, 2 tablespoons of chopped garlic, chopped ginger, chopped onion, soya sauce,pepper,chili paste, spring onion,ajinamoto, sweet sauce or sugar stock and cook by thickening with cornflour mixture adding very little at a time.\r\n    At last, add fried dumpling or cauliflower.\r\n    Serve hot with noodles or rice.\r\n', 0, 'Veg Manchurian is a widely popular Indo-Chinese dish across India. This dish is made of deep fried mixed vegetable dumplings tossed in Chinese sauces.', '50.jpg', NULL),
(51, 'Chole Bhature', 'Punjabi', 'pyz@cookieroockie.com', '2019-04-11 00:56:55', '2 cup chickpeas (channas)\r\n2 tsp oil\r\n1 Bbay leaf (tej patta)\r\n1 Cinnamon stick (dalchini)\r\n3-4 Cloves (laung)\r\n1 tsp whole pepper corns (sabut kali mirch)\r\n3 Green cardamom (choti elaichi)\r\n2 Black cardamom (badi elaichi)\r\n1 tsp rurmeric powder (haldi)\r\n1 tsp chili powder (lal mirch powder)\r\n1 tsp coriander powder (dhaniya powder)\r\n1 tsp cumin powder (zeera powder)\r\n1 tsp cumin seeds (zeera)\r\n1/2 tsp asafoetida (heeng)\r\nto taste salt\r\n1 cup onions, chopped\r\n1 cup tomatoes, chopped\r\n1 tsp ginger, chopped\r\n1 tsp garlic, chopped\r\n1 tsp ajwain\r\n1 tsp lime juice\r\n1 green chili, chopped\r\n1 Tea bag\r\n1 tbsp butter', '1.\r\nIn a pan add oil, bay leaf, cinnamon, cumin seeds, cloves, whole pepper corns, green and black cardamom.\r\n2.\r\nAfter it gets brown add chopped onions and saute it. Now add chopped ginger and garlic.\r\n3.\r\nFollowed by turmeric, chili powder, coriander powder, cumin powder, asafoetida and salt, fry the ingredients together well.\r\n4.\r\nFor de glazing the pan add a little water.\r\n5.\r\nNow add the chole (soaked overnight and pressure cooked) to the masala.\r\n6.\r\nAfter stirring well add tomatoes, little sugar and salt to the chole.\r\n7.\r\nNow add ajwain, chopped green chilies and water for the base.\r\n8.\r\nTo get the color in the chole, add a tea bag to the masala.\r\n9.\r\nSimmer the chole gently for an hour and cover it.\r\n10.\r\nAdd lime juice and a dollop of butter to it.\r\n11.\r\nGarnish the chole with coriander and butter and serve them hot with bhaturas.', 0, 'The quintessential North Indian dish, relished by one and all can now be easily cooked at home. Straight from a Punjabi kitchen ', '51.jpg', NULL),
(52, 'Dal Makhani ', 'Punjabi', 'pyz@cookieroockie.com', '2019-04-11 00:59:25', '2 Cups Sabut urad dal\r\n8 cups Water\r\n2 tbsp Salt\r\n1 tbsp Ginger, sliced\r\n2 tbsp Butter\r\n1 tbsp Oil\r\n2 tsp Shahi jeera\r\n1 tsp Kasoori meethi\r\n2 cups Tomato puree\r\n1 tsp Chilli powder\r\n1 tsp Sugar\r\n1/2 cups Cream', '1.\r\nTo the dal, add water, 1 Tbsp salt and ginger. Cook until dal becomes tender.\r\n2.\r\nIn a heavy based pan, heat butter and oil. Add shahi jeera and kasoori methi. When they begin to splutter, add tomato puree, remaining salt, chilli powder and sugar.\r\n3.\r\nStir-fry over high flame, till the oil separates.\r\n4.\r\nAdd cooked dal and bring to boil. The consistency should be such that the dal should move around freely when stirred, otherwise add a little water.\r\n5.\r\nLeave to simmer, uncovered, till well blended. Stir-in cream and once it gets heated through, serve immediately, garnished with green chillies', 0, ' Dal Makhani is the absolute favorite recipe that can easily be cooked to perfection at home.', '52.jpg', NULL),
(53, 'Paneer Tikka', 'Punjabi', 'pyz@cookieroockie.com', '2019-04-11 01:01:46', '    1/2 Kg paneer\r\n    1 tomato\r\n    1 onion\r\n    1 capsicum\r\n    Marinade for paneer tikka:\r\n    1/2 tbsp cumin seeds\r\n    1/2 tbsp coriander seeds\r\n    1 brown cardamom\r\n    10 green cardamom\r\n    1/2 tbsp cloves\r\n    1/2 tbsp black pepper\r\n    2 pcs star anise\r\n    1/2 tbsp shahee zeera\r\n    3 tbsp ginger-garlic paste\r\n    2 tsp turmeric powder\r\n    2 tsp red chilli powder\r\n    2 tsp coriander powder\r\n    Salt\r\n    2 tsp kashmiri chilli powder\r\n    2 tbsp refined oil\r\n    1/2 lime\r\n    1/2 tbsp dry mango powder\r\n    1/2 tbsp chaat masala\r\n    2 green chilli, chopped\r\n    100 gms curd (whisked)\r\n    1/2 tbsp garam masala\r\n    coriander leaves, chopped\r\n    mint leaves, chopped', '    Marination for paneer tikka:\r\n    1.\r\n    Dry roast and pound cumin seeds, coriander seeds, brown cardamom, green cardamom, cloves, black pepper, star anise and shahee zeera in a mortar and pestle.\r\n    2.\r\n    In a bowl add ginger garlic paste, turmeric powder, red chilli powder, coriander powder, salt, kashmiri chilli powder, refined oil, coriander leaves chopped, mint leaves chopped, lime, dry mango powder, chaat masala, green chilli, whisked curd and hara masala. Mix them all.\r\n    For grilling paneer tikka:\r\n    1.\r\n    In a tray spread some paneer cubes, julienne onion, capsicum and tomatoes.\r\n    2.\r\n    Mix the masala in the tray. Marinate the paneer cubes.\r\n    3.\r\n    Skewer the tikkas for roasting.\r\n    4.\r\n    Now keep the marinated paneer tikkas in the fridge for 45 minutes.\r\n    5.\r\n    Then grill the tikkas till cooked.\r\n    6.\r\n    Serve the paneer tikka hot.', 0, 'Paneer Tikka flavoured with tangy spices. Every lavish Indian dinner party is sure to have some tikkas. Paneer, capsicum and onions marinated in a yogurt based marinade. ', '53.jpg', NULL),
(54, ' Khichu', 'Gujarati', 'pyz@cookieroockie.com', '2019-04-11 01:06:15', '5 cup Water\r\n2 cup Rice flour\r\nSalt to taste\r\nÂ¼ tsp Baking Soda\r\n2 green chili (fine chopped)\r\n1 tsp Cumin seeds\r\nAchar Methi masala according to taste\r\n1 tbsp oil ', 'Heat water and add cumin seeds, green chili, baking soda and salt in it.\r\nBoil water in a pan for 10-15 minutes at medium to slow flame.\r\nNow mix flour slowly and stir continuously using wooden spoon to prevent again lump.\r\nLid pan and keep this pan on a stove for 1 -2 minutes at slow flame.\r\nMix it every 15-20 seconds.\r\nServe in a dish and pour methi masala and oil in it.\r\nKhichu is ready for serve. ', 0, 'Khichu is simple, easy to made, spicy and delicious healthy Gujarati Snacks. This steamed rice flour street food is very famous in Gujarat. Khichu is also known as Papdi no lot, which is dough to make traditional rice papad.', '54.jpg', NULL),
(55, ' Khandvi', 'Gujarati', 'pyz@cookieroockie.com', '2019-04-11 01:08:42', '    60 Gram Besan (gram flour)\r\n    60 Gram Khatta dahi (sour yogurt)\r\n    375 Ml Water\r\n    1/2 tsp Ginger paste\r\n    1/2 tsp Green chilli paste\r\n    1/2 tsp Red chilli powder\r\n    1 tsp Salt\r\n    1/8 tsp Heeng (asafoetida)\r\n    1/8 tsp Haldi (turmeric)\r\n    For tempering:\r\n    2 tsp Oil\r\n    1/2 tsp Sarson (mustard seeds)\r\n    2 Sabut lal mirch (dried whole red pepper)\r\n    4-5 Kadhi patta (curry leaves)\r\n    1 Tbsp Hara dhania (coriander leaves) chopped fine\r\n    1/4 Cup Coconut, grated', '    1.\r\n    Place flour in a deep, heavy based pan (the pan should be large, as there is a lot of spurting while cooking).\r\n    2.\r\n    Add ginger-chilli paste, chilli powder, salt, heeng and haldi, and mix. Now add the yogurt, a little at a time, so as to form a smooth paste, without any lumps, and then the water.\r\n    3.\r\n    Place the pan over high heat, and bring to a boil, stirring all the time (to avoid scorching).\r\n    4.\r\n    Keep cooking and stirring till you reach a paste like consistency, increasing or decreasing the heat according to your ability to avoid scorching.\r\n    5.\r\n    It is cooked enough, when you separate a portion of it from the rest with a stirrer and you can see the bottom of the pan, which gets covered gradually (if it gets covered immediately, it is too thin). Another test is to spread a tsp of the batter on to an ungreased surface, when cool, it should come off clean.\r\n    6.\r\n    With the help of a rubber spatula spread the mixture onto an ungreased surface, in as thin a layer as possible and leave to cool.\r\n    7.\r\n    Heat the oil in a small pan and add the sarson, kadhi patta and sabut lal mirch. Stir a few times and then spread over the layer. Sprinkle all but 1 tbsp of the coriander and 1tbsp of the coconut over it, and pick up the lal mirch and keep aside.\r\n    8.\r\n    Cut this layer into strips roll up each strip like a scroll, as firmly as you can, without breaking them.\r\n    9.\r\n    Arrange them on to a serving dish. Garnish with the rest of the coriander, coconut and peppers. Serve.', 0, 'One of the much-loved Gujarati snacks, khandvi is also known as Patuli or Dahivadi and made with gram flour.', '55.jpg', NULL),
(56, 'Fafda', 'Gujarati', 'pyz@cookieroockie.com', '2019-04-11 01:10:28', '     2 cups besan (chick-pea flour)\r\n    1/4 tsp baking soda\r\n    1/4 tsp ajwain (thymol)\r\n    1/4 tsp haldi (turmeric)\r\n    1 Tbsp oil\r\n    1/2 tsp salt tsp or to taste\r\n    Oil to deep-fry', '    1.\r\n    Mix the besan, soda, ajwain, haldi, 1 tbsp oil and salt together.\r\n    2.\r\n    Add water and knead into a soft dough.\r\n    3.\r\n    Take a portion of the dough and place it on a greased surface.\r\n    4.\r\n    With base of your palm, drag the dough in a straight line, holding the dough at the starting point with the other hand.\r\n    5.\r\n    This will form a strip.\r\n    6.\r\n    Fry these strips over medium heat till crisp.', 0, ' Fafda is a popular Gujarati snack made with gram flour, turmeric and carom seeds. It is fried crisp and served with chutney.', '56.jpg', NULL),
(67, 'sdf', 'Gujarati', 'aniket70045@gmail.com', '2025-04-18 18:58:39', 'sf', 'sdf', 0, 'sf', '19.png', '19_video.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `requested_recipe`
--

CREATE TABLE `requested_recipe` (
  `rid` int(11) NOT NULL,
  `rname` varchar(30) NOT NULL,
  `uemail` varchar(30) NOT NULL,
  `category` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `recipe` text NOT NULL,
  `ingredients` text NOT NULL,
  `image` varchar(30) NOT NULL,
  `video` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(30) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `uname`, `contact`, `password`) VALUES
('aniket70045@gmail.com', 'ANIKET', '7004545150', 'QW5pa2V0QDcwMDQ1'),
('arpitpatel27071997@gmail.com', 'Arpit Patel', '7016941415', 'QXJwaXQxMjM0'),
('paddss@sgsg.ddo', 'Parth', '949+59+59+', 'UGFydGhANTg='),
('parthp582000@gmail.com', 'Parth', '9727254298', 'UGFydGg1ODIw'),
('patelpreet612@gmail.com', 'Preet Patel', '9265602997', 'UHJlZXQxMjk='),
('rajpanchal544@gmail.com', 'Raj Panchal', '7874716190', 'UmFqNTEy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD KEY `comment_rid_constraint` (`rid`),
  ADD KEY `comment_email_constraint` (`uemail`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `requested_recipe`
--
ALTER TABLE `requested_recipe`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `requested_recipe`
--
ALTER TABLE `requested_recipe`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comment_email_constraint` FOREIGN KEY (`uemail`) REFERENCES `user` (`email`),
  ADD CONSTRAINT `comment_rid_constraint` FOREIGN KEY (`rid`) REFERENCES `recipe` (`rid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
