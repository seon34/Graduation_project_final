<?php
//폼이 제출됐는지 확인
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //폰트 이름 받기
    $fontName = $_POST['fontname'];

    //각각의 업로드 파일 세기
    $fileCount = count($_FILES['fontfile']['name']);

    for ($i = 0; $i < $fileCount; $i++) {
        //파일 상세내역
        $fileName = $_FILES['fontfile']['name'][$i];
        $fileTmpName = $_FILES['fontfile']['tmp_name'][$i];
        $fileType = $_FILES['fontfile']['type'][$i];
        $fileSize = $_FILES['fontfile']['size'][$i];
        $fileError = $_FILES['fontfile']['error'][$i];

        //uploads 디렉토리에 저장
        $targetDir = "uploads/";
        $targetFile = $targetDir . $fileName;

        if ($fileError == UPLOAD_ERR_OK) {
            move_uploaded_file($fileTmpName, $targetFile);

            //파일 업로드 성공
            echo "File $fileName uploaded successfully.<br>";
        } else {
            //오류메세지 호출
            echo "Error uploading file $fileName. Error code: $fileError.<br>";
        }
    }
    echo "Font Name: $fontName";
}
?>