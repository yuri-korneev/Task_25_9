<div class="main">
    
<h2>
    Форма загрузки картинок для авторизованных пользователей
</h2>

<input type="file" multiple id="upload">
 
 <div id="result">
     
 </div>

<br>

<div class="container-fluid">
<div class="row">
    
    <?php

    function excess($files) {

        $result = array();
        
        for ($i = 0; $i < count($files); $i++) {
        
        if ($files[$i] != "." && $files[$i] != "..") $result[] = $files[$i];
        
        }
        
        return $result;
    
    }
    
        //вывод изображений
        $dir = GALLERY_SMALL; // Путь к директории, в которой лежат малые изображения
        $dir_big = GALLERY_BIG; // Путь к директории, в которой лежат большые изображения
        $files = scandir($dir); // Получаем список файлов из этой директории
        $files = excess($files); // Удаляем лишние файлы c '.' ...
    
        for ($i = 0; $i < count($files); $i++)
        {
        ?>
        
                    <div class="col-lg-4 col-md-4 col-xs-4 thumb">
                    <div class = "card mx-auto text-center">
                       
        
                        <div class="image">
                        <a href="<?=$dir_big . $files[$i]?>"><img class = "card-img-top" src="<?=$dir . $files[$i]?>"></a>             
                        </div>
                        <div class="card-action">
                            <a href="<?=$dir_big . $files[$i]?>">Просмотр</a>                          
                        </div>
                        <div class="card-delete">
                            <a href="<?=$dir_big . $files[$i]?>">Удалить</a>                        
                        </div> 
                    
                    </div>
                    </div>                
    
        <?php
        }
        ?>

</div>
</div>

</div>

<br> 
<br> 

