<?php
include ('../Config/Database.php');

class FindMeModels
{
    public $username;
    public $dbh;
    public $profilReq;
    public $user;
    public $interets;
    // SELECT user.username, interests.name FROM user INNER JOIN user_interests ON user.id = user_interests.id_user INNER JOIN interests ON user_interests.id_interest = interests.id WHERE username LIKE "vallery";
    public $genre;
    // SELECT user.username, genre.name FROM user INNER JOIN genre ON user.id_genre = genre.id;
    public $orientation;
    // SELECT user.username, orientation.name FROM user INNER JOIN orientation ON user.id_orientation = orientation.id;
    public function __construct($username, $dbh)
    {
        $this->username = $username;
        $this->dbh = $dbh;
    }

    public function profil() 
    {
        $this->profilReq = "SELECT * FROM user WHERE username LIKE '". $this->username ."';";
        $this->user = $this->dbh->query($this->profilReq);
        return $this->user->fetchAll();
    }

    public function profilGenre() 
    {
        $this->profilReq = "SELECT genre.name FROM user INNER JOIN genre ON user.id_genre = genre.id WHERE username LIKE '" . $this->username . "';";
        $this->genre = $this->dbh->query($this->profilReq);
        return $this->genre->fetch();
    }

    public function profilOrientation() 
    {
        $this->profilReq = "SELECT orientation.name FROM user INNER JOIN orientation ON user.id_orientation = orientation.id WHERE username LIKE '" . $this->username . "';";
        $this->orientation = $this->dbh->query($this->profilReq);
        return $this->orientation->fetch();
    }

    public function profilInterets() 
    {
        $this->profilReq = "SELECT user.username, interests.name FROM user INNER JOIN user_interests ON user.id = user_interests.id_user INNER JOIN interests ON user_interests.id_interest = interests.id WHERE username LIKE '" . $this->username . "';";
        $this->interets = $this->dbh->query($this->profilReq);
        return $this->interets->fetchAll();
    }

    public function user()
    {
        $this->profilReq = "SELECT * FROM user INNER JOIN genre ON user.id_genre = genre.id INNER JOIN orientation ON user.id_orientation = orientation.id INNER JOIN user_img ON user.id = user_img.id_user INNER JOIN img ON user_img.id_img = img.id";
        // SELECT *  FROM user INNER JOIN user_img ON user.id = user_img.id_user INNER JOIN img ON user_img.id_img = img.id
        $this->user = $this->dbh->query($this->profilReq);
        return $this->user->fetchAll();
    }
    
    public function userGenre($genre) {
        $this->profilReq = "SELECT * FROM user INNER JOIN genre ON user.id_genre = genre.id INNER JOIN orientation ON user.id_orientation = orientation.id INNER JOIN user_img ON user.id = user_img.id_user INNER JOIN img ON user_img.id_img = img.id WHERE genre.name LIKE '" . $genre . "'";
        $this->user = $this->dbh->query($this->profilReq);
        return $this->user->fetchAll();
    }

    public function userOrientation($orientation) {
        $this->profilReq = "SELECT * FROM user INNER JOIN genre ON user.id_genre = genre.id INNER JOIN orientation ON user.id_orientation = orientation.id INNER JOIN user_img ON user.id = user_img.id_user INNER JOIN img ON user_img.id_img = img.id WHERE orientation.name LIKE '" . $orientation . "'";
        $this->user = $this->dbh->query($this->profilReq);
        return $this->user->fetchAll();
    }

    public function userCountry($country) {
        $this->profilReq = "SELECT * FROM user INNER JOIN genre ON user.id_genre = genre.id INNER JOIN orientation ON user.id_orientation = orientation.id INNER JOIN user_img ON user.id = user_img.id_user INNER JOIN img ON user_img.id_img = img.id WHERE user.country LIKE '" . $country . "'";
        $this->user = $this->dbh->query($this->profilReq);
        return $this->user->fetchAll();
    }

    public function userYears($years) {

        if($years >= 18 && $years <= 25) {
            $this->profilReq = "SELECT * FROM user INNER JOIN genre ON user.id_genre = genre.id INNER JOIN orientation ON user.id_orientation = orientation.id INNER JOIN user_img ON user.id = user_img.id_user INNER JOIN img ON user_img.id_img = img.id WHERE (YEAR(CURDATE()) - YEAR(birthdate)) BETWEEN 18 AND 25";
            $this->user = $this->dbh->query($this->profilReq);
            return $this->user->fetchAll();
        }elseif($years >= 25 && $years <= 35) {
            $this->profilReq = "SELECT * FROM user INNER JOIN genre ON user.id_genre = genre.id INNER JOIN orientation ON user.id_orientation = orientation.id INNER JOIN user_img ON user.id = user_img.id_user INNER JOIN img ON user_img.id_img = img.id WHERE (YEAR(CURDATE()) - YEAR(birthdate)) BETWEEN 25 AND 35";
            $this->user = $this->dbh->query($this->profilReq);
            return $this->user->fetchAll();
        }elseif($years >= 35 && $years <= 45) {
            $this->profilReq = "SELECT * FROM user INNER JOIN genre ON user.id_genre = genre.id INNER JOIN orientation ON user.id_orientation = orientation.id INNER JOIN user_img ON user.id = user_img.id_user INNER JOIN img ON user_img.id_img = img.id WHERE (YEAR(CURDATE()) - YEAR(birthdate)) BETWEEN 35 AND 45";
            $this->user = $this->dbh->query($this->profilReq);
            return $this->user->fetchAll();
        }elseif($years > 45) {
            $this->profilReq = "SELECT * FROM user INNER JOIN genre ON user.id_genre = genre.id INNER JOIN orientation ON user.id_orientation = orientation.id INNER JOIN user_img ON user.id = user_img.id_user INNER JOIN img ON user_img.id_img = img.id WHERE (YEAR(CURDATE()) - YEAR(birthdate)) > 45";
            $this->user = $this->dbh->query($this->profilReq);
            return $this->user->fetchAll();
        }

    }
}


// INSERT INTO img 
//             (img_url)
//     VALUES  ('https://www.nautiljon.com/images/perso/00/40/yato_10004.webp'),
//             ('https://i.pinimg.com/originals/bf/7f/23/bf7f2361a755e9289f4a2a6957d6081f.jpg'),
//             ('https://i.pinimg.com/originals/43/1d/ce/431dce65be3340b9048e54d9ee1fa9e4.png'),
//             ('https://i.pinimg.com/736x/38/39/57/3839574086c2725d7925a11494c57f39.jpg'),
//             ('https://image.civitai.com/xG1nkqKTMzGDvpLrqFT7WA/ab084fa3-9348-4c5b-93a2-e068747938ee/width=1200/ab084fa3-9348-4c5b-93a2-e068747938ee.jpeg'),
//             ('https://th.bing.com/th/id/OIP.juoGVIHZSqRMQsuEVLjFYgAAAA?rs=1&pid=ImgDetMain'),
//             ('https://cdn.sanity.io/images/j16akyp2/production/64534c9a22e6829c7d1eb5027ba1549afe98a56c-736x736.jpg'),
//             ('https://th.bing.com/th/id/OIP.5WiaEo_aZubnoxtowJM7TAHaHa?rs=1&pid=ImgDetMain'),
//             ('https://pbs.twimg.com/media/Fw54SK5WYAE0ZwD?format=jpg&name=large'),
//             ('https://th.bing.com/th/id/OIP.dlk9yQ2aU6Ie-4_7HsAZJgHaJ1?rs=1&pid=ImgDetMain'),
//             ('https://images.wallpapersden.com/image/download/mikasa-ackerman_a2hubGaUmZqaraWkpJRobWllrWdpZWU.jpg'),
//             ('https://i.pinimg.com/originals/1e/46/d7/1e46d76bd56f92be159dcd3aeb0a4bed.jpg'),
//             ('https://image.civitai.com/xG1nkqKTMzGDvpLrqFT7WA/2e32af15-61e3-438a-a92e-95f0b82491e2/width=1200/2e32af15-61e3-438a-a92e-95f0b82491e2.jpeg'),
//             ('https://th.bing.com/th/id/OIP.k7hoKgQIPd0ufYO1xGxCgAHaFj?rs=1&pid=ImgDetMain'),
//             ('https://th.bing.com/th/id/OIP.M0RvZlPhf_jGKPEr2XkwOwHaEK?rs=1&pid=ImgDetMain'),
//             ('https://th.bing.com/th/id/OIP.OQDoYej6tUkgYrNHVOIPJgHaJQ?rs=1&pid=ImgDetMain'),
//             ('https://i.pinimg.com/originals/ed/33/b8/ed33b830e29832a92b4a311e83cdcacf.jpg'),
//             ('https://th.bing.com/th/id/OIP.jicmGOQzzH3khbTEDOMcqgHaD4?w=1200&h=630&rs=1&pid=ImgDetMain'),
//             ('https://th.bing.com/th/id/OIP.02PVal404Dzk06B23TzBAAHaLK?rs=1&pid=ImgDetMain'),
//             ('https://img.wattpad.com/94c111210033a232a505f53b623f1b23cc75f555/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f776174747061642d6d656469612d736572766963652f53746f7279496d6167652f546e763749666e314d4f375976773d3d2d313032323530363937382e313636313633323064383033323636373235343136343635393231342e6a7067?s=fit&w=720&h=720'),
//             ('https://images.alphacoders.com/115/thumb-1920-1154566.jpg'),
//             ('https://somoskudasai.com/wp-content/uploads/2023/06/portada_spy-x-family-171.jpg'),
//             ('https://i.pinimg.com/originals/79/fb/22/79fb223460cd8cb89c027c87d62ed1e7.jpg'),
//             ('https://aniyuki.com/wp-content/uploads/2022/06/aniyuki-loid-forger-42-819x1024.jpg'),
//             ('https://i.pinimg.com/originals/dc/b2/7b/dcb27b06639baa9e7cc3c741726ba495.jpg'),
//             ('https://preview.redd.it/55i5z5gg2lm11.gif?format=png8&s=f67f3bf9e5bd5cec1512536daa800eb600c0197e'),
//             ('https://www.101soundboards.com/storage/board_pictures/698209.jpg?c=1714531646'),
//             ('https://th.bing.com/th/id/R.d74f9a53bd3d07ca407377637384e9b9?rik=FaeWnkb6aiQPVA&pid=ImgRaw&r=0'),
//             ('https://somoskudasai.com/wp-content/uploads/2020/05/portada_roronoa-zoro-one-piece.jpg'),
//             ('https://th.bing.com/th/id/R.5109ba1cf72642b6f68a35f37491b340?rik=K7O6n7sQB%2flV7g&riu=http%3a%2f%2fimages6.fanpop.com%2fimage%2fphotos%2f36800000%2f-Luffy-monkey-d-luffy-36845039-1280-800.jpg&ehk=QePyEB4V6cBr7rKXkraLr1oH9rovNLHvMEn0RG9%2f1ek%3d&risl=&pid=ImgRaw&r=0'),
//             ('https://i.pinimg.com/originals/11/91/be/1191be158f7a6c36540f2f576abd3596.jpg'),
//             ('https://m.media-amazon.com/images/M/MV5BMTIyNDljZjItNDM2ZS00NWU0LTk3M2YtNGI2NTk1OGEzNzNhXkEyXkFqcGdeQXVyNzgxMzc3OTc@._V1_.jpg'),
//             ('https://th.bing.com/th/id/R.4441dd4db58b36e01812a325636e7955?rik=I6B5gsm7MmPsqQ&riu=http%3a%2f%2fimages5.fanpop.com%2fimage%2fphotos%2f29800000%2fSanji-one-piece-29883148-960-720.jpg&ehk=oMJwAdqdxgdICsbe9lPFR7rBoGO4RnlYHAVUN9x3y14%3d&risl=&pid=ImgRaw&r=0'),
//             ('https://s3.narvii.com/image/7c4gassyaojjyd5bgetzdikyrdaig5ta_hq.jpg'),
//             ('https://pm1.narvii.com/6692/35eac39e289c1db47d137f5ebe6b965f029a6f46_hq.jpg'),
//             ('https://i.pinimg.com/736x/9c/68/ab/9c68aba7a5ea2952ffc3bdb8a49eb3c0.jpg'),
//             ('https://assets.mycast.io/characters/jinbei-1633183-normal.jpg?1616639171'),
//             ('https://vignette.wikia.nocookie.net/champloo/images/3/3c/Mugen.jpg/revision/latest?cb=20120619031006'),
//             ('https://i.pinimg.com/originals/6d/77/cc/6d77cc619f60d565c6236ca0db3da20f.jpg'),
//             ('https://vignette.wikia.nocookie.net/gurennlagann/images/1/1f/Kaminarox.jpg/revision/latest?cb=20170924234704'),
//             ('https://gundam-link.net/wp-content/uploads/2022/09/Simon-adult.jpg'),
//             ('https://cdn.wallpapersafari.com/81/52/gSfVCz.jpg'),
//             ('https://comicvine.gamespot.com/a/uploads/scale_small/1/11495/253773-34191-lina-inverse.jpg'),
//             ('https://th.bing.com/th/id/OIP.pvppZu5XpIq2fE2i6J1C_gHaHa?rs=1&pid=ImgDetMain'),
//             ('https://wegotthiscovered.com/wp-content/uploads/2022/08/majin-vegeta.jpg'),
//             ('https://i.pinimg.com/originals/7e/05/54/7e05547a9ee1315261d26700de9321c5.jpg'),
//             ('https://th.bing.com/th/id/OIP.udEgBrMUyd6Mtd76x56OVAHaHa?w=512&h=512&rs=1&pid=ImgDetMain'),
//             ('https://img.freepik.com/premium-photo/piccolo-noble-namekian-warrior-anime-manga_705284-21076.jpg'),
//             ('https://assets.mycast.io/actor_images/actor-frieza-174864_large.jpg?1612968726'),
//             ('https://wallpaperaccess.com/full/1428136.jpg'),
//             ('https://i.pinimg.com/originals/a3/ba/4a/a3ba4a2755b2319db6ab8745f704ada3.jpg'),
//             ('https://th.bing.com/th/id/R.1b067538daec4087a6c60078315a7fe7?rik=BXnS8gHuRJuWow&riu=http%3a%2f%2f1.bp.blogspot.com%2f_MVAeQVIdvaM%2fS8xs9tR0-PI%2fAAAAAAAAAA0%2fCNoM884Qan4%2fs1600%2frie.jpg&ehk=EZ%2bG7pT6AWENCNCK4LsV0q651USTeaydOB5GAqGNbRw%3d&risl=&pid=ImgRaw&r=0'),
//             ('https://animeargentina.net/wp-content/uploads/2021/08/Mina-sailor-venus-sailor-moon-minako-aino.jpg'),
//             ('https://i.pinimg.com/736x/d7/18/a4/d718a4fc599228716883cbfd13f3a6b9.jpg'),
//             ('https://th.bing.com/th/id/OIP.bE2OnKia_0wCd2I9ThFHdgHaHa?w=1080&h=1080&rs=1&pid=ImgDetMain'),
//             ('https://pbs.twimg.com/media/Fn3FqglXkAAUzwP.jpg'),
//             ('https://vignette.wikia.nocookie.net/sailormoonfanon/images/9/96/Haruka-sol.jpg/revision/latest?cb=20190312095707'),
//             ('https://th.bing.com/th/id/R.4914d2f5007ba46e17bb4ac0e2cdbc7c?rik=lZNKVx%2fYs9hRLg&riu=http%3a%2f%2ffarm5.static.flickr.com%2f4005%2f4372973420_f7d2a09d8f.jpg&ehk=GMttNKEd5VHQoUeMk5ZT9jD7VwzBEUcrxsaGMBMP7Qs%3d&risl=&pid=ImgRaw&r=0'),
//             ('https://th.bing.com/th/id/OIP.7bCfulDWVeXC5IbrrLvc-AHaGI?rs=1&pid=ImgDetMain'),
//             ('https://i.pinimg.com/originals/60/d7/64/60d7645784db10316caa9915f112a810.jpg')
// ;