<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Principais Notícias</title>
<style>
    body {
        padding: 0;
        margin: 0;
        background-color: #f0f0f0;
        font-family: Arial, sans-serif;
    }

    .navbar {
        width: 100%;
        height: 100px;
        background-color: #333;
        color: #fff;
        display: flex;
        align-items: center;
    }

    .navbar h1 {
        margin-left: 20px;
    }

    .noticia {
        width: 90%;
        margin: 20px auto;
        border: 1px solid #ccc;
        border-radius: 10px;
        background-color: #fff;
        overflow: hidden;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
    }

    .noticia:hover {
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
    }

    .itens {
        display: flex;
        align-items: center;
    }

    .imagem img {
        
        object-fit: cover;
        border-radius: 10px 0 0 10px;
    }

    .textos {
        padding: 20px;
    }

    .textos h1 {
        margin-bottom: 5px;
        font-size: 1.5em;
    }

    .textos p {
        margin-bottom: 10px;
        font-size: 1.1em;
        color: #666;
    }

    .textos b {
        color: #333;
    }

   
</style>
</head>
<body>
    <div class="navbar">
        <h1>Principais Notícias</h1>
    </div>

    <?php 
        function api(){
            $url = "https://www.vagalume.com.br/news/index.js";
            $noticia = json_decode(file_get_contents($url));
    
            foreach($noticia->news as $noticias){
                $imagem = "https://www.vagalume.com.br/" . $noticias->pic_src;
                echo "<div class='noticia'>
                        <div class='itens'>
                            <div class='imagem'>
                                <a href='$noticias->url'><img src='$imagem'/></a>
                            </div>
                            <div class='textos'>
                                <h1>$noticias->headline</h1>
                                <p>$noticias->kicker</p>
                                <b>$noticias->inserted</b>
                            </div>
                        </div>
                      </div>";
            }
        }

        api();
    ?>
</body>
</html>
