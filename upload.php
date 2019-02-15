<?php
if($_FILES["file"]["error"])
{
    echo $_FILES["file"]["error"];    
}
else
{
    if(($_FILES["file"]["type"]=="image/png" || $_FILES["file"]["type"]=="image/jpeg") && $_FILES["file"]["size"]<1024000)
        {
            //防止文件名重复
            $filename ="./upload/".$_FILES["file"]["name"];
             //检查文件或目录是否存在
            if(file_exists($filename))
            {
                echo '<script type="text/javascript">
                    alert("已收藏该图，好逊！");
                    location.href="index.html"
                    </script>';
            }
            else
            {  
                //保存文件,   move_uploaded_file 将上传的文件移动到新位置  
                move_uploaded_file($_FILES["file"]["tmp_name"],$filename);//将临时地址移动到指定地址  
                echo '<script type="text/javascript">
                    alert("上传成功！");
                    location.href="index.html"
                    </script>';
                exit;  
            }        
    }
    else
    {
        echo '<script type="text/javascript">
                    alert("喂，你发的不是我想要的吧！");
                    location.href="index.html"
                    </script>';
        exit;  
    }
}