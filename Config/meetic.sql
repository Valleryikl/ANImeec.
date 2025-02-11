DROP DATABASE IF EXISTS meetic;
CREATE DATABASE meetic;

USE meetic;

DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS genre;
DROP TABLE IF EXISTS interests;
DROP TABLE IF EXISTS user_interests;
DROP TABLE IF EXISTS orientation;
DROP TABLE IF EXISTS img;

CREATE TABLE orientation (
    id              INT             NOT NULL AUTO_INCREMENT,
    name            VARCHAR(255)    NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE genre (
    id              INT             NOT NULL AUTO_INCREMENT,
    name            VARCHAR(255)    NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE interests (
    id              INT             NOT NULL AUTO_INCREMENT,
    name            VARCHAR(255)    NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE user (
    id              INT             NOT NULL AUTO_INCREMENT,
    firstname       VARCHAR(255)    NOT NULL,
    lastname        VARCHAR(255)    NOT NULL,
    username        VARCHAR(255)    NOT NULL,
    birthdate       DATE            NOT NULL,
    id_genre        INT             NOT NULL,
    id_orientation  INT             NOT NULL,
    country         VARCHAR(255)    NOT NULL,
    email           VARCHAR(255)    NOT NULL,
    password        VARCHAR(30)     NOT NULL ,
    PRIMARY KEY (id),
    FOREIGN KEY (id_genre) REFERENCES genre(id),
    FOREIGN KEY (id_orientation) REFERENCES orientation(id)
);

CREATE TABLE user_interests (
    id_user         INT             NOT NULL,
    id_interest     INT             NOT NULL,
    FOREIGN KEY (id_user) REFERENCES user(id),
    FOREIGN KEY (id_interest) REFERENCES interests(id)
);

CREATE TABLE img (
    id              INT             NOT NULL AUTO_INCREMENT,
    img_url         VARCHAR(2555)    NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE user_img (
    id_user         INT             NOT NULL,
    id_img          INT             NOT NULL,
    FOREIGN KEY (id_user) REFERENCES user(id),
    FOREIGN KEY (id_img) REFERENCES img(id)
);

INSERT INTO img 
            (img_url)
    VALUES  ('https://www.nautiljon.com/images/perso/00/40/yato_10004.webp'),
            ('https://i.pinimg.com/originals/bf/7f/23/bf7f2361a755e9289f4a2a6957d6081f.jpg'),
            ('https://i.pinimg.com/originals/43/1d/ce/431dce65be3340b9048e54d9ee1fa9e4.png'),
            ('https://i.pinimg.com/736x/38/39/57/3839574086c2725d7925a11494c57f39.jpg'),
            ('https://image.civitai.com/xG1nkqKTMzGDvpLrqFT7WA/ab084fa3-9348-4c5b-93a2-e068747938ee/width=1200/ab084fa3-9348-4c5b-93a2-e068747938ee.jpeg'),
            ('https://th.bing.com/th/id/OIP.juoGVIHZSqRMQsuEVLjFYgAAAA?rs=1&pid=ImgDetMain'),
            ('https://cdn.sanity.io/images/j16akyp2/production/64534c9a22e6829c7d1eb5027ba1549afe98a56c-736x736.jpg'),
            ('https://th.bing.com/th/id/OIP.5WiaEo_aZubnoxtowJM7TAHaHa?rs=1&pid=ImgDetMain'),
            ('https://pbs.twimg.com/media/Fw54SK5WYAE0ZwD?format=jpg&name=large'),
            ('https://th.bing.com/th/id/OIP.dlk9yQ2aU6Ie-4_7HsAZJgHaJ1?rs=1&pid=ImgDetMain'),
            ('https://images.wallpapersden.com/image/download/mikasa-ackerman_a2hubGaUmZqaraWkpJRobWllrWdpZWU.jpg'),
            ('https://i.pinimg.com/originals/1e/46/d7/1e46d76bd56f92be159dcd3aeb0a4bed.jpg'),
            ('https://image.civitai.com/xG1nkqKTMzGDvpLrqFT7WA/2e32af15-61e3-438a-a92e-95f0b82491e2/width=1200/2e32af15-61e3-438a-a92e-95f0b82491e2.jpeg'),
            ('https://th.bing.com/th/id/OIP.k7hoKgQIPd0ufYO1xGxCgAHaFj?rs=1&pid=ImgDetMain'),
            ('https://th.bing.com/th/id/OIP.M0RvZlPhf_jGKPEr2XkwOwHaEK?rs=1&pid=ImgDetMain'),
            ('https://th.bing.com/th/id/OIP.OQDoYej6tUkgYrNHVOIPJgHaJQ?rs=1&pid=ImgDetMain'),
            ('https://i.pinimg.com/originals/ed/33/b8/ed33b830e29832a92b4a311e83cdcacf.jpg'),
            ('https://th.bing.com/th/id/OIP.jicmGOQzzH3khbTEDOMcqgHaD4?w=1200&h=630&rs=1&pid=ImgDetMain'),
            ('https://th.bing.com/th/id/OIP.02PVal404Dzk06B23TzBAAHaLK?rs=1&pid=ImgDetMain'),
            ('https://img.wattpad.com/94c111210033a232a505f53b623f1b23cc75f555/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f776174747061642d6d656469612d736572766963652f53746f7279496d6167652f546e763749666e314d4f375976773d3d2d313032323530363937382e313636313633323064383033323636373235343136343635393231342e6a7067?s=fit&w=720&h=720'),
            ('https://images.alphacoders.com/115/thumb-1920-1154566.jpg'),
            ('https://somoskudasai.com/wp-content/uploads/2023/06/portada_spy-x-family-171.jpg'),
            ('https://i.pinimg.com/originals/79/fb/22/79fb223460cd8cb89c027c87d62ed1e7.jpg'),
            ('https://aniyuki.com/wp-content/uploads/2022/06/aniyuki-loid-forger-42-819x1024.jpg'),
            ('https://i.pinimg.com/originals/dc/b2/7b/dcb27b06639baa9e7cc3c741726ba495.jpg'),
            ('https://preview.redd.it/55i5z5gg2lm11.gif?format=png8&s=f67f3bf9e5bd5cec1512536daa800eb600c0197e'),
            ('https://www.101soundboards.com/storage/board_pictures/698209.jpg?c=1714531646'),
            ('https://th.bing.com/th/id/R.d74f9a53bd3d07ca407377637384e9b9?rik=FaeWnkb6aiQPVA&pid=ImgRaw&r=0'),
            ('https://somoskudasai.com/wp-content/uploads/2020/05/portada_roronoa-zoro-one-piece.jpg'),
            ('https://th.bing.com/th/id/R.5109ba1cf72642b6f68a35f37491b340?rik=K7O6n7sQB%2flV7g&riu=http%3a%2f%2fimages6.fanpop.com%2fimage%2fphotos%2f36800000%2f-Luffy-monkey-d-luffy-36845039-1280-800.jpg&ehk=QePyEB4V6cBr7rKXkraLr1oH9rovNLHvMEn0RG9%2f1ek%3d&risl=&pid=ImgRaw&r=0'),
            ('https://i.pinimg.com/originals/11/91/be/1191be158f7a6c36540f2f576abd3596.jpg'),
            ('https://m.media-amazon.com/images/M/MV5BMTIyNDljZjItNDM2ZS00NWU0LTk3M2YtNGI2NTk1OGEzNzNhXkEyXkFqcGdeQXVyNzgxMzc3OTc@._V1_.jpg'),
            ('https://th.bing.com/th/id/R.4441dd4db58b36e01812a325636e7955?rik=I6B5gsm7MmPsqQ&riu=http%3a%2f%2fimages5.fanpop.com%2fimage%2fphotos%2f29800000%2fSanji-one-piece-29883148-960-720.jpg&ehk=oMJwAdqdxgdICsbe9lPFR7rBoGO4RnlYHAVUN9x3y14%3d&risl=&pid=ImgRaw&r=0'),
            ('https://s3.narvii.com/image/7c4gassyaojjyd5bgetzdikyrdaig5ta_hq.jpg'),
            ('https://pm1.narvii.com/6692/35eac39e289c1db47d137f5ebe6b965f029a6f46_hq.jpg'),
            ('https://i.pinimg.com/736x/9c/68/ab/9c68aba7a5ea2952ffc3bdb8a49eb3c0.jpg'),
            ('https://assets.mycast.io/characters/jinbei-1633183-normal.jpg?1616639171'),
            ('https://vignette.wikia.nocookie.net/champloo/images/3/3c/Mugen.jpg/revision/latest?cb=20120619031006'),
            ('https://i.pinimg.com/originals/6d/77/cc/6d77cc619f60d565c6236ca0db3da20f.jpg'),
            ('https://vignette.wikia.nocookie.net/gurennlagann/images/1/1f/Kaminarox.jpg/revision/latest?cb=20170924234704'),
            ('https://gundam-link.net/wp-content/uploads/2022/09/Simon-adult.jpg'),
            ('https://cdn.wallpapersafari.com/81/52/gSfVCz.jpg'),
            ('https://comicvine.gamespot.com/a/uploads/scale_small/1/11495/253773-34191-lina-inverse.jpg'),
            ('https://th.bing.com/th/id/OIP.pvppZu5XpIq2fE2i6J1C_gHaHa?rs=1&pid=ImgDetMain'),
            ('https://wegotthiscovered.com/wp-content/uploads/2022/08/majin-vegeta.jpg'),
            ('https://i.pinimg.com/originals/7e/05/54/7e05547a9ee1315261d26700de9321c5.jpg'),
            ('https://th.bing.com/th/id/OIP.udEgBrMUyd6Mtd76x56OVAHaHa?w=512&h=512&rs=1&pid=ImgDetMain'),
            ('https://img.freepik.com/premium-photo/piccolo-noble-namekian-warrior-anime-manga_705284-21076.jpg'),
            ('https://assets.mycast.io/actor_images/actor-frieza-174864_large.jpg?1612968726'),
            ('https://wallpaperaccess.com/full/1428136.jpg'),
            ('https://i.pinimg.com/originals/a3/ba/4a/a3ba4a2755b2319db6ab8745f704ada3.jpg'),
            ('https://th.bing.com/th/id/R.1b067538daec4087a6c60078315a7fe7?rik=BXnS8gHuRJuWow&riu=http%3a%2f%2f1.bp.blogspot.com%2f_MVAeQVIdvaM%2fS8xs9tR0-PI%2fAAAAAAAAAA0%2fCNoM884Qan4%2fs1600%2frie.jpg&ehk=EZ%2bG7pT6AWENCNCK4LsV0q651USTeaydOB5GAqGNbRw%3d&risl=&pid=ImgRaw&r=0'),
            ('https://animeargentina.net/wp-content/uploads/2021/08/Mina-sailor-venus-sailor-moon-minako-aino.jpg'),
            ('https://i.pinimg.com/736x/d7/18/a4/d718a4fc599228716883cbfd13f3a6b9.jpg'),
            ('https://th.bing.com/th/id/OIP.bE2OnKia_0wCd2I9ThFHdgHaHa?w=1080&h=1080&rs=1&pid=ImgDetMain'),
            ('https://pbs.twimg.com/media/Fn3FqglXkAAUzwP.jpg'),
            ('https://vignette.wikia.nocookie.net/sailormoonfanon/images/9/96/Haruka-sol.jpg/revision/latest?cb=20190312095707'),
            ('https://th.bing.com/th/id/R.4914d2f5007ba46e17bb4ac0e2cdbc7c?rik=lZNKVx%2fYs9hRLg&riu=http%3a%2f%2ffarm5.static.flickr.com%2f4005%2f4372973420_f7d2a09d8f.jpg&ehk=GMttNKEd5VHQoUeMk5ZT9jD7VwzBEUcrxsaGMBMP7Qs%3d&risl=&pid=ImgRaw&r=0'),
            ('https://th.bing.com/th/id/OIP.7bCfulDWVeXC5IbrrLvc-AHaGI?rs=1&pid=ImgDetMain'),
            ('https://i.pinimg.com/originals/60/d7/64/60d7645784db10316caa9915f112a810.jpg')
;
INSERT INTO orientation 
            (name)
    VALUES  ('Hetero'),
            ('Bi'),
            ('Gay'),
            ('Lezbian')
;

INSERT INTO genre 
            (name)
    VALUES  ('Man'),
            ('Woman'),
            ('Autre')
;

INSERT INTO interests 
            (name)
    VALUES  ('Anime'),
            ('Movie'),
            ('Sport'),
            ('Family'),
            ('Literature'),
            ('Manga'),
            ('Tech'),
            ('Food'),
            ('Travel'),
            ('Music'),
            ('Art'),
            ('Fashion'),
            ('Gaming'),
            ('Fitness'),
            ('Photography'),
            ('Cooking'),
            ('History'),
            ('Politics'),
            ('Science'),
            ('Nature')
;


INSERT INTO user 
            (firstname, lastname, username, birthdate, id_genre, id_orientation, country, email, password)
    VALUES  ('Yabuku', 'God', 'Yato', '1000-08-10', 1, 1, 'Japan', 'yatochan@gmail.com', '090-XXXX'), 
            ('Mao', 'Mao', 'Poison', '2007-03-28', 2, 1, 'China', 'maomao@gmail.com', 'poison'),
            ('Iriina', 'Yerabichi', 'Bitch-Sensei', '2005-10-10', 2, 1, 'Japan', 'yerabichi@gmail.com', 'bitch'),
            ('Karuma', 'Akabane', 'Sadist', '2002-01-25', 1, 1, 'Japan', 'akabane.k@gmail.com', '6969'),
            ('Rei', 'Ayanami', 'Eva', '2001-10-03', 2, 1, 'Japan', 'rei@evangelion.com', '1234'),
            ('Ryo', 'Saeba', 'CityHunter', '1995-12-25', 1, 1, 'Japan', 'ryo@cityhunter.com', 'hunter99'),
            ('Lelouch', 'Vi Britannia', 'Zero', '2000-12-05', 1, 1, 'Japan', 'lelouch@cc.com', 'geass123'),
            ('Makoto', 'Nijima', 'Detective', '1998-04-12', 2, 1, 'Japan', 'makoto@persona.com', 'justice01'),
            ('Naruto', 'Uzumaki', 'Hokage', '1998-10-10', 1, 1, 'Japan', 'naruto@hiddenleaf.com', 'rasengan123'),
            ('Sakura', 'Haruno', 'Chidori', '1999-05-17', 2, 1, 'Japan', 'sakura@hiddenleaf.com', 'hanami98'),
            ('Mikasa', 'Ackerman', 'TitanSlayer', '2000-03-10', 2, 1, 'Japan', 'mikasa@attackontitan.com', 'surveycorps03'),
            ('Erwin', 'Smith', 'Commander', '1996-06-21', 1, 1, 'Japan', 'erwin@attackontitan.com', 'plan123'),
            ('Kagome', 'Higurashi', 'Priestess', '1997-12-19', 2, 1, 'Japan', 'kagome@inuyasha.com', 'shikon123'),
            ('Inuyasha', 'Yashahime', 'HalfDemon', '1996-05-12', 1, 1, 'Japan', 'inuyasha@inuyasha.com', 'ironreaver01'),
            ('Natsu', 'Dragneel', 'DragonSlayer', '1998-02-05', 1, 1, 'Japan', 'natsu@fairytail.com', 'firepower99'),
            ('Lucy', 'Heartfilia', 'Celestial', '2000-07-01', 2, 1, 'Japan', 'lucy@fairytail.com', 'celestiallock01'),
            ('Shinji', 'Ikari', 'Pilot', '2000-02-26', 1, 1, 'Japan', 'shinji@evangelion.com', 'evaunit01'),
            ('Asuka', 'Langley', 'Rei2', '1998-12-04', 2, 1, 'Japan', 'asuka@evangelion.com', 'neonpink03'),
            ('Yuji', 'Itadori', 'Jujutsu', '2003-07-20', 1, 1, 'Japan', 'yuji@jujutsu.com', 'sukuna01'),
            ('Megumi', 'Fushiguro', 'Shikigami', '2003-10-03', 1, 1, 'Japan', 'megumi@jujutsu.com', 'shikigami99'),
            ('Satoru', 'Gojo', 'Limitless', '2000-11-26', 1, 1, 'Japan', 'gojo@jujutsu.com', 'infinity99'),
            ('Yor', 'Forger', 'Assassin', '1996-05-06', 2, 2, 'Japan', 'yor@spyxfamily.com', 'bond04'),
            ('Anya', 'Forger', 'Telepath', '2010-04-16', 2, 2, 'Japan', 'anya@spyxfamily.com', 'spyfamily123'),
            ('Loid', 'Forger', 'Spy', '1999-10-01', 1, 2, 'Japan', 'loid@spyxfamily.com', 'spyworld99'),
            ('Izuku', 'Midoriya', 'Deku', '2000-07-15', 1, 1, 'Japan', 'izuku@myheroacademia.com', 'oneformall22'),
            ('Katsuki', 'Bakugo', 'Kacchan', '1999-04-20', 1, 1, 'Japan', 'bakugo@myheroacademia.com', 'explosion99'),
            ('Ochaco', 'Uraraka', 'ZeroGravity', '1999-12-27', 2, 1, 'Japan', 'ochaco@myheroacademia.com', 'gravity01'),
            ('All Might', 'Toshinori', 'SymbolOfPeace', '1965-06-10', 1, 1, 'Japan', 'allmight@myheroacademia.com', 'plusultra99'),
            ('Roronoa', 'Zoro', 'Swordsman', '1997-11-11', 1, 1, 'Japan', 'zoro@onepiece.com', 'threeblades99'),
            ('Monkey D.', 'Luffy', 'StrawHat', '1996-05-05', 1, 1, 'Japan', 'luffy@onepiece.com', 'rubberboy01'),
            ('Nami', 'Swans', 'Navigator', '1999-07-03', 2, 1, 'Japan', 'nami@onepiece.com', 'cartographer99'),
            ('Usopp', 'Upp', 'Sniper', '2000-04-01', 1, 1, 'Japan', 'usopp@onepiece.com', 'longrange01'),
            ('Sanji', 'Vinsmoke', 'Cook', '1999-03-02', 1, 1, 'Japan', 'sanji@onepiece.com', 'cookbook99'),
            ('Franky', 'Vinsmoke', 'Shipwright', '1998-09-09', 1, 1, 'Japan', 'franky@onepiece.com', 'cyberpunk01'),
            ('Chopper', 'Tony', 'Doctor', '2002-12-24', 1, 1, 'Japan', 'chopper@onepiece.com', 'reindeer99'),
            ('Brook', 'SoulKing', 'Musician', '2001-04-03', 1, 1, 'Japan', 'brook@onepiece.com', 'bones99'),
            ('Jinbei', 'Shirohoshi', 'Helmsman', '1999-07-02', 1, 1, 'Japan', 'jinbei@onepiece.com', 'captain99'),
            ('Mugen', 'Samurai', 'FightingKing', '1995-07-11', 1, 1, 'Japan', 'mugen@samura.champloo.com', 'swordfight99'),
            ('Fuu', 'Champloo', 'Waitress', '1999-02-01', 2, 1, 'Japan', 'fuu@samura.champloo.com', 'peacelover99'),
            ('Kamina', 'Tengan', 'DrillKing', '1997-12-05', 1, 1, 'Japan', 'kamina@gurrenlagann.com', 'spiralpower01'),
            ('Simon', 'Gurren', 'Lagann', '2000-03-09', 1, 1, 'Japan', 'simon@gurrenlagann.com', 'rockon01'),
            ('Yoko', 'Littner', 'Gunner', '2000-10-17', 2, 1, 'Japan', 'yoko@gurrenlagann.com', 'marksman99'),
            ('Lina', 'Inverse', 'Sorceress', '1999-11-20', 2, 1, 'Japan', 'lina@slayers.com', 'magma99'),
            ('Goku', 'Son', 'Saiyan', '1990-09-12', 1, 1, 'Japan', 'goku@dragonball.com', 'kakarot99'),
            ('Vegeta', 'Saiyan', 'Prince', '1989-08-10', 1, 1, 'Japan', 'vegeta@dragonball.com', 'prince99'),
            ('Bulma', 'Briefs', 'Scientist', '1991-03-18', 2, 1, 'Japan', 'bulma@dragonball.com', 'bluehair99'),
            ('Trunks', 'Briefs', 'SwordMaster', '1994-08-09', 1, 1, 'Japan', 'trunks@dragonball.com', 'future99'),
            ('Piccolo', 'Namekian', 'Warrior', '1992-05-09', 1, 1, 'Japan', 'piccolo@dragonball.com', 'greenfist99'),
            ('Frieza', 'Emperor', 'Tyrant', '1989-12-12', 1, 1, 'Japan', 'frieza@dragonball.com', 'ultimate99'),
            ('Majin', 'Buu', 'Fatty', '1995-11-25', 1, 1, 'Japan', 'majinbuu@dragonball.com', 'magic99'),
            ('Sailor', 'Moon', 'Guardian', '1998-02-14', 2, 1, 'Japan', 'sailormoon@bishojo.com', 'crystalgem99'),
            ('Tuxedo', 'Mask', 'Hero', '1997-10-30', 1, 1, 'Japan', 'tuxedomask@bishojo.com', 'tuxedowear99'),
            ('Mina', 'Aino', 'Venus', '1999-12-19', 2, 1, 'Japan', 'mina@bishojo.com', 'pretty99'),
            ('Ami', 'Mizuno', 'Mercury', '2000-02-21', 2, 1, 'Japan', 'ami@bishojo.com', 'wise99'),
            ('Rei', 'Hino', 'Mars', '2000-04-17', 2, 1, 'Japan', 'rei@bishojo.com', 'fire99'),
            ('Makoto', 'Kino', 'Jupiter', '1999-08-10', 2, 1, 'Japan', 'makoto@bishojo.com', 'strength99'),
            ('Haruka', 'Tenoh', 'Uranus', '1997-11-27', 2, 1, 'Japan', 'haruka@bishojo.com', 'speed99'),
            ('Michiru', 'Kaiou', 'Neptune', '1999-05-03', 2, 1, 'Japan', 'michiru@bishojo.com', 'music99'),
            ('Hotaru', 'Tomoe', 'Saturn', '2000-01-06', 2, 1, 'Japan', 'hotaru@bishojo.com', 'death99'),
            ('Chibiusa', 'Tsukino', 'Rini', '2002-06-30', 2, 1, 'Japan', 'chibiusa@bishojo.com', 'pinkhair99')
;

INSERT INTO user_img
            (id_user, id_img)
    VALUES  (1, 1),
            (2, 2),
            (3, 3),
            (5, 5),
            (6, 6),
            (7, 7),
            (8, 8),
            (9, 9),
            (10, 10),
            (11, 11),
            (12, 12),
            (13, 13),
            (14, 14),
            (15, 15),
            (16, 16),
            (17, 17),
            (18, 18),
            (19, 19),
            (20, 20),
            (21, 21),
            (22, 22),
            (23, 23),
            (24, 24),
            (25, 25),
            (26, 26),
            (27, 27),
            (28, 28),
            (29, 29),
            (30, 30),
            (31, 31),
            (32, 32),
            (33, 33),
            (34, 34),
            (35, 35),
            (36, 36),
            (37, 37),
            (38, 38),
            (39, 39),
            (40, 40),
            (41, 41),
            (42, 42),
            (43, 43),
            (44, 44),
            (45, 45),
            (46, 46),
            (47, 47),
            (48, 48),
            (49, 49),
            (50, 50),
            (51, 51),
            (52, 52),
            (53, 53),
            (54, 54),
            (55, 55),
            (56, 56),
            (57, 57),
            (58, 58),
            (59, 59),
            (60, 60)
;
INSERT INTO user_interests 
            (id_user, id_interest) 
            -- Yato (Yabuku God)
    VALUES  (1, 1), (1, 6), (1, 8), (1, 12), (1, 14), (1, 16),
            -- Mao (Poison)
            (2, 4), (2, 5), (2, 8), (2, 18),
            -- Iriina (Bitch-Sensei)
            (3, 1), (3, 5), (3, 6), (3, 14), (3, 17),
            -- Karuma (Sadist)
            (4, 13), (4, 12), (4, 14),
            -- Rei (Ayanami)
            (5, 5), (5, 9), (5, 19),
            -- Ryo (Saeba)
            (6, 3), (6, 6), (6, 12), (6, 16),
            -- Lelouch (Vi Britannia)
            (7, 1), (7, 2), (7, 4), (7, 18),
            -- Makoto (Nijima)
            (8, 13), (8, 12), (8, 14), (8, 3),
            -- Naruto (Uzumaki)
            (9, 3), (9, 4), (9, 9), (9, 12),
            -- Sakura (Haruno)
            (10, 4), (10, 5), (10, 9), (10, 3),
            -- Mikasa (Ackerman)
            (11, 1), (11, 6), (11, 13),
            -- Erwin (Smith)
            (12, 6), (12, 5), (12, 14),
            -- Kagome (Higurashi)
            (13, 6), (13, 4), (13, 17),
            -- Inuyasha (Yashahime)
            (14, 6), (14, 1), (14, 14),
            -- Natsu (Dragneel)
            (15, 13), (15, 6), (15, 9),
            -- Lucy (Heartfilia)
            (16, 9), (16, 12), (16, 8),
            -- Shinji (Ikari)
            (17, 1), (17, 5), (17, 16),
            -- Asuka (Langley)
            (18, 1), (18, 3), (18, 18),
            -- Yuji (Itadori)
            (19, 1), (19, 6), (19, 13),
            -- Megumi (Fushiguro)
            (20, 5), (20, 2), (20, 14),
            -- Satoru (Gojo)
            (21, 3), (21, 9), (21, 2),
            -- Yor (Forger)
            (22, 3), (22, 12), (22, 19),
            -- Anya (Forger)
            (23, 8), (23, 10), (23, 17),
            -- Loid (Forger)
            (24, 2), (24, 6), (24, 14),
            -- Izuku (Midoriya)
            (25, 1), (25, 6), (25, 9),
            -- Katsuki (Bakugo)
            (26, 3), (26, 12), (26, 6),
            -- Ochaco (Uraraka)
            (27, 12), (27, 16), (27, 6),
            -- All Might (Toshinori)
            (28, 19), (28, 3), (28, 6),
            -- Roronoa (Zoro)
            (29, 3), (29, 12), (29, 16),
            -- Monkey D. (Luffy)
            (30, 6), (30, 1), (30, 16),
            -- Nami (Swans)
            (31, 4), (31, 9), (31, 17),
            -- Usopp (Upp)
            (32, 1), (32, 13), (32, 6),
            -- Sanji (Vinsmoke)
            (33, 6), (33, 17), (33, 13),
            -- Franky (Vinsmoke)
            (34, 9), (34, 10), (34, 12),
            -- Chopper (Tony)
            (35, 4), (35, 9), (35, 13),
            -- Brook (SoulKing)
            (36, 6), (36, 1), (36, 5),
            -- Jinbei (Shirohoshi)
            (37, 19), (37, 12), (37, 3),
            -- Mugen (Samurai)
            (38, 13), (38, 3), (38, 14),
            -- Fuu (Champloo)
            (39, 4), (39, 19), (39, 10),
            -- Kamina (Tengan)
            (40, 3), (40, 1), (40, 14),
            -- Simon (Gurren)
            (41, 5), (41, 6), (41, 12),
            -- Yoko (Littner)
            (42, 3), (42, 1), (42, 6),
            -- Lina (Inverse)
            (43, 9), (43, 8), (43, 5),
            -- Goku (Son)
            (44, 3), (44, 6), (44, 1),
            -- Vegeta (Saiyan)
            (45, 12), (45, 6), (45, 14),
            -- Bulma (Briefs)
            (46, 8), (46, 5), (46, 9),
            -- Trunks (Briefs)
            (47, 16), (47, 1), (47, 9),
            -- Piccolo (Namekian)
            (48, 3), (48, 5), (48, 19),
            -- Frieza (Emperor)
            (49, 1), (49, 8), (49, 9),
            -- Majin (Buu)
            (50, 19), (50, 6), (50, 5),
            -- Sailor (Moon)
            (51, 12), (51, 4), (51, 8),
            -- Tuxedo (Mask)
            (52, 19), (52, 9), (52, 5),
            -- Mina (Aino)
            (53, 9), (53, 8), (53, 12),
            -- Ami (Mizuno)
            (54, 3), (54, 9), (54, 17),
            -- Rei (Hino)
            (55, 6), (55, 12), (55, 17),
            -- Makoto (Kino)
            (56, 16), (56, 14), (56, 6),
            -- Haruka (Tenoh)
            (57, 9), (57, 5), (57, 10),
            -- Michiru (Kaiou)
            (58, 14), (58, 8), (58, 3),
            -- Hotaru (Tomoe)
            (59, 19), (59, 6), (59, 9),
            -- Chibiusa (Tsukino)
            (60, 4), (60, 5), (60, 17)
;
