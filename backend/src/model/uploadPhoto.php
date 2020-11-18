<?php
    function uploadPhoto($objFile){
        if ($objFile['size'] > 0 && $objFile['type'] !="" ) {
            $directoryFile = "../files/";

            $filePermitted = array("image/jpeg", "image/jpg", "image/png");
            $maxFileSize = 5120;

            $uploadFile = $objFile;

            $tempFile = $uploadFile['tmp_name'];

            $fileSize = round($uploadFile['size']/1024);

            $fileExtension = $uploadFile['type']; 

            if (in_array($fileExtension, $filePermitted)) {
                if ($fileSize <= $maxFileSize) {
                    
                    $fileName = pathinfo($uploadFile['name'], PATHINFO_FILENAME);
                    $extension = pathinfo($uploadFile['name'], PATHINFO_EXTENSION);

                    $encryptedFileName = md5($fileName.uniqid(time()));
                    
                    $photo = $encryptedFileName.".".$extension;

                    if (move_uploaded_file($tempFile, $directoryFile.$photo))
                       $statusUpload = true;
                    else
                        $statusUpload = false;

                }else{
                    echo
                    ("
                        <script> 
                            alert('Tamanho do arquivo maior do que ".$maxFileSize."Kb'); 
                            location.href = '../view/index.php';
                            window.history.back();
                        </script>"
                    );
                }
            } else {
                echo("
                    <script> 
                        alert('Extensão de arquivo não permitida.');
                        location.href = '../view/index.php';
                        window.history.back();
                    </script>
                ");
            }

        }
        if ($statusUpload) {
            return $photo;
        }
        else {
            return "no-photo.jpg";
        }
    }